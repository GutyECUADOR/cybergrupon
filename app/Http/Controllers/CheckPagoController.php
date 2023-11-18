<?php

namespace App\Http\Controllers;

use App\Models\Packages;
use App\Models\RecargaSaldo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckPagoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $packages = Packages::all();
        return view('check-pago.index', compact('packages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $order_ID = $this->generateUniqueCode();

        $request->request->add(['user_id' => Auth::user()->id]);
        $request->request->add(['orderID_interno' => $order_ID]);
        $data = $request->all();
        $request->validate([
            'package' => ['exists:packages,id']
        ]);

        $client = new \UniPayment\Client\UniPaymentClient();
        $client->getConfig()->setClientId(env('UNIPAYMENT_CLIENT_ID'));
        $client->getConfig()->setClientSecret(env('UNIPAYMENT_CLIENT_SECRET'));

        $createInvoiceRequest = new \UniPayment\Client\Model\CreateInvoiceRequest();
        $createInvoiceRequest->setAppId(env('UNIPAYMENT_CLIENT_APPID'));
        $createInvoiceRequest->setPriceAmount($request->valor);
        $createInvoiceRequest->setPriceCurrency("USD");
        $createInvoiceRequest->setNotifyUrl("https://cybergrupon.com/api/notify");
        $createInvoiceRequest->setRedirectUrl("https://cybergrupon.com/recargasaldo");
        $createInvoiceRequest->setOrderId($order_ID);
        $createInvoiceRequest->setTitle("Recarga de saldo");
        $createInvoiceRequest->setDescription("Recarga de saldo");


        $client = new \UniPayment\Client\UniPaymentClient();
        $client->getConfig()->setClientId(env('UNIPAYMENT_CLIENT_ID'));
        $client->getConfig()->setClientSecret(env('UNIPAYMENT_CLIENT_SECRET'));


        if ( $create_invoice_response = json_decode($client->createInvoice($createInvoiceRequest))) {

            RecargaSaldo::create([
                'user_id' => Auth::user()->id,
                'valor' => $request->valor,
                'gateway' => $request->gateway,
                'orderID_interno' => $order_ID,
                'orderID_gateway' => $create_invoice_response->data->invoice_id
            ]);

            return redirect()->to($create_invoice_response->data->invoice_url);
        }

        return redirect()->back()->withErrors(['message' => 'No se pudo generar el link de pago, contacte a soporte']);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

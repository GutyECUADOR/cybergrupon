<?php

namespace App\Http\Controllers;

use App\Models\RecargaSaldo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RecargaSaldoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $linksPublicidad = AdvertisingHelperController::getlinksPublicidad();
        return view('recarga-saldo.index', compact('linksPublicidad'));
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
            'valor' => 'required|numeric|min:20',
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

            return redirect()->away($create_invoice_response->data->invoice_url);
        }

        return redirect()->back()->withErrors(['message' => 'No se pudo generar el link de pago, contacte a soporte']);

    }

    private function generateUniqueCode($limit=10) {
        return strtoupper(substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, $limit));
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RecargaSaldo  $recargaSaldo
     * @return \Illuminate\Http\Response
     */
    public function show(RecargaSaldo $recargaSaldo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RecargaSaldo  $recargaSaldo
     * @return \Illuminate\Http\Response
     */
    public function edit(RecargaSaldo $recargaSaldo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RecargaSaldo  $recargaSaldo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RecargaSaldo $recargaSaldo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RecargaSaldo  $recargaSaldo
     * @return \Illuminate\Http\Response
     */
    public function destroy(RecargaSaldo $recargaSaldo)
    {
        //
    }
}

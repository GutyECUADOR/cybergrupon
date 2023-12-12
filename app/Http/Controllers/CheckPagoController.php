<?php

namespace App\Http\Controllers;

use App\Models\Comision;
use App\Models\Compra;
use App\Models\Packages;
use App\Models\RecargaSaldo;
use App\Models\User;
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

        $package = Packages::findOrFail($request->package);
        //dd($request->all());

        $client = new \UniPayment\Client\UniPaymentClient();
        $client->getConfig()->setClientId(env('UNIPAYMENT_CLIENT_ID'));
        $client->getConfig()->setClientSecret(env('UNIPAYMENT_CLIENT_SECRET'));

        $createInvoiceRequest = new \UniPayment\Client\Model\CreateInvoiceRequest();
        $createInvoiceRequest->setAppId(env('UNIPAYMENT_CLIENT_APPID'));
        $createInvoiceRequest->setPriceAmount($package->PrecioAcumuladoWithOutID);
        $createInvoiceRequest->setPriceCurrency("USD");
        $createInvoiceRequest->setPayCurrency("USDT");
        /* $createInvoiceRequest->setNetwork("NETWORK_TRX"); */
        $createInvoiceRequest->setNotifyUrl("https://cybergrupon.com/api/notify_pago");
        $createInvoiceRequest->setRedirectUrl("https://cybergrupon.com/dashboard");
        $createInvoiceRequest->setOrderId($order_ID);
        $createInvoiceRequest->setTitle("Compra de paquete");
        $createInvoiceRequest->setDescription("Compra de paquete - ". $package->name);


        if ( $create_invoice_response = json_decode($client->createInvoice($createInvoiceRequest))) {

            // IPN PagoUnipayment actualiza los status a Complete
            Compra::create([
                'user_id' => Auth::user()->id,
                'package_id' => $request->package,
                'valor' => $package->PrecioAcumuladoWithOutID,
                'gateway' => $request->gateway,
                'orderID_interno' => $order_ID,
                'orderID_gateway' => $create_invoice_response->data->invoice_id,
                'status' => 'pending',
            ]);

            RecargaSaldo::create([
                'user_id' => Auth::user()->id,
                'valor' => $package->PrecioAcumuladoWithOutID,
                'gateway' => $request->gateway,
                'orderID_interno' => $order_ID,
                'orderID_gateway' => $create_invoice_response->data->invoice_id,
                'status' => 'pending',
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

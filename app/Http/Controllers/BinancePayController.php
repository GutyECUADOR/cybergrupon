<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use ExplorerCash\PaymentRequest;

use \UniPayment\Client\UniPaymentClient;

class BinancePayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      /*   $client_id='9c80218f-8b9e-4d34-af75-1ae19e317784';
        $client_secret='Q1kKtfukhCdmCQmSV9JsMGXfpny7iCmmC';
        $app_id = '29b6c199-5c7f-4df3-9eab-fa91eb9b5d20';

        $client = new \UniPayment\Client\UniPaymentClient();
        $client->getConfig()->setClientId($client_id);
        $client->getConfig()->setClientSecret($client_secret);

        $response = $client->getInvoiceById("KbMiKuGTFMaJXKJLTdS56M");
        dd($response); */

        /* $client = new \UniPayment\Client\UniPaymentClient();
        $client->getConfig()->setClientId(env('UNIPAYMENT_CLIENT_ID'));
        $client->getConfig()->setClientSecret(env('UNIPAYMENT_CLIENT_SECRET'));
        $client->getConfig()->setIsSandbox(true);

        $createInvoiceRequest = new \UniPayment\Client\Model\CreateInvoiceRequest();
        $createInvoiceRequest->setAppId(env('UNIPAYMENT_CLIENT_APPID'));
        $createInvoiceRequest->setPriceAmount("10");
        $createInvoiceRequest->setPriceCurrency("USD");
        $createInvoiceRequest->setNotifyUrl("https://cybergrupon.com/notify");
        $createInvoiceRequest->setRedirectUrl("https://cybergrupon.com/recargasaldo");
        $createInvoiceRequest->setOrderId("#123456");
        $createInvoiceRequest->setTitle("Paquete 20USDT");
        $createInvoiceRequest->setDescription("Paquete de pruebas");


        $client = new \UniPayment\Client\UniPaymentClient();
        $client->getConfig()->setClientId(env('UNIPAYMENT_CLIENT_ID'));
        $client->getConfig()->setClientSecret(env('UNIPAYMENT_CLIENT_SECRET'));

        $create_invoice_response = json_decode($client->createInvoice($createInvoiceRequest));
        return($create_invoice_response->data); */

        /* $notify='{"ipn_type":"invoice","event":"invoice_created","app_id":"de5076a5-71aa-4a4a-a35f-bdb424af5658","invoice_id":"XjwyQQanwVVUtJXVMGXtCe","order_id":"#0001","price_amount":10,"price_currency":"USD","network":null,"address":null,"pay_currency":"USDT","pay_amount":0,"exchange_rate":0,"paid_amount":0,"confirmed_amount":0,"refunded_price_amount":0,"create_time":"2023-05-05T03:54:29.5708901Z","expiration_time":"2023-05-05T15:54:29.5708934Z","status":"New","error_status":"None","ext_args":null,"transactions":null,"notify_id":"714c8f9e-b06d-49b9-9ebc-203f7cadcaa0","notify_time":"2023-05-05T03:55:49.1566646Z"}';

        $client = new \UniPayment\Client\UniPaymentClient();
        $client->getConfig()->setClientId(env('UNIPAYMENT_CLIENT_ID'));
        $client->getConfig()->setClientSecret(env('UNIPAYMENT_CLIENT_SECRET'));
        //$client->getConfig()->setIsSandbox(true);

        $response = $client->checkIpn($notify);
        dd($response); */


        $client = new \UniPayment\Client\UniPaymentClient();
        $client->getConfig()->setClientId(env('UNIPAYMENT_CLIENT_ID'));
        $client->getConfig()->setClientSecret(env('UNIPAYMENT_CLIENT_SECRET'));
        /* $client->getConfig()->setIsSandbox(true); */


        $createWithdrawRequest = new \UniPayment\Client\Model\CreateWithdrawalRequest();
        $createWithdrawRequest->setNetwork('NETWORK_TRX');
        $createWithdrawRequest->setAddress('TQu8XqRU8H7EfT1q31yLzG5nRAcgc4fwkc');
        $createWithdrawRequest->setAssetType('USDT');
        $createWithdrawRequest->setAmount('2');
        $createWithdrawRequest->setNotifyUrl('https://cybergrupon.com/api/notify_withdrawal');


        $create_withdraw_response = $client->createWithdrawal($createWithdrawRequest);
        return ($create_withdraw_response);

    }

    public function callbackpay() {
        return 'callback';
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $id;
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

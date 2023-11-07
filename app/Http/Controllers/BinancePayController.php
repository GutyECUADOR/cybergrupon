<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BinancePayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Generate nonce string
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $nonce = '';
        for($i=1; $i <= 32; $i++)
        {
            $pos = mt_rand(0, strlen($chars) - 1);
            $char = $chars[$pos];
            $nonce .= $char;
        }
        $ch = curl_init();
        $timestamp = round(microtime(true) * 1000);
        // Request body
            $request = array(
            "env" => array(
                    "terminalType" => "APP"
                ),
            "merchantTradeNo" => mt_rand(982538,9825382937292),
            "orderAmount" => 25.17,
            "currency" => "USDT",
            "goods" => array(
                    "goodsType" => "02",
                    "goodsCategory" => "Z000",
                    "referenceGoodsId" => "7876763A3BASDASD",
                    "goodsName" => "Ice Cream",
                    "goodsDetail" => "Greentea ice cream cone"
                    )
        );

        $json_request = json_encode($request);
        $payload = $timestamp."\n".$nonce."\n".$json_request."\n";
        $binance_pay_key = 'kjn7s5zfpynudkqrfmfawcygxq5bia01pxmgcg76cezmusvdli7cnqmeg46bzrs9';
        $binance_pay_secret = '6injualy9gq5hwpodskmfiv6b6ov3k8pqf8yul0irxnec6wncjbxazbsx0bs4i1a';
        $signature = strtoupper(hash_hmac('SHA512',$payload,$binance_pay_secret));
        $headers = array();
        $headers[] = "Content-Type: application/json";
        $headers[] = "BinancePay-Timestamp: $timestamp";
        $headers[] = "BinancePay-Nonce: $nonce";
        $headers[] = "BinancePay-Certificate-SN: $binance_pay_key";
        $headers[] = "BinancePay-Signature: $signature";

        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_URL, "https://bpay.binanceapi.com/binancepay/openapi/v2/order");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json_request);

        $result = curl_exec($ch);
        if (curl_errno($ch)) { echo 'Error:' . curl_error($ch); }
        curl_close ($ch);


        return $result;

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

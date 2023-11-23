<?php

namespace App\Http\Controllers;

use App\Models\Pago;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PagoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pagos.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, User $user)
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
    {
        // Validar que usuario tenga saldo
        if (Auth::user()->SaldoActual < $request->valor) {
            return redirect()->route('pagos.index')->withErrors(['message' => 'No tienes saldo suficiente, tu saldo actual es de:'. Auth::user()->SaldoActual]);
        }

        $request->request->add(['user_id' => Auth::user()->id]);
        $request->request->add(['network' => 'NETWORK_TRX']);
        $request->request->add(['currency' => 'USDT']);
        $request->request->add(['gateway' => 'UniPayment']);
        $data = $request->all();
        //dd($data);
        $request->validate([
            'wallet' => 'required',
            'valor' => 'required|numeric|min:100',
            'network' => 'required',
            'currency' => 'required',

        ]);

        $client = new \UniPayment\Client\UniPaymentClient();
        $client->getConfig()->setClientId(env('UNIPAYMENT_CLIENT_ID'));
        $client->getConfig()->setClientSecret(env('UNIPAYMENT_CLIENT_SECRET'));

        $createWithdrawRequest = new \UniPayment\Client\Model\CreateWithdrawalRequest();
        $createWithdrawRequest->setNetwork($request->network);
        $createWithdrawRequest->setAddress($request->wallet);
        $createWithdrawRequest->setAssetType($request->currency);
        $createWithdrawRequest->setAmount($request->valor);
        $createWithdrawRequest->setNotifyUrl('https://cybergrupon.com/api/notify_withdrawal');

        if (  $create_withdraw_response = json_decode($client->createWithdrawal($createWithdrawRequest))) {

            if($create_withdraw_response->code === 'OK')
            {
                //dd($create_withdraw_response);
                Pago::create([
                    'user_id' => Auth::user()->id,
                    'wallet' => $request->wallet,
                    'currency' => $request->currency,
                    'valor' => $request->valor,
                    'network' => $request->network,
                    'gateway' => $request->gateway,
                    'orderID_gateway' => $create_withdraw_response->data->id
                ]);
            }else{
                return redirect()->back()->withErrors(['message' => 'No se pudo generar el pago, contacte a soporte. '.$create_withdraw_response->msg]);
            }

            return redirect()->back()->with('status', 'La solicitud de retiro se registro correctamente, el pago será realizado en un plazo no mayor de 72 horas. Su numero de orden es #'.$create_withdraw_response->data->id);
        }

        return redirect()->back()->withErrors(['message' => 'No se pudo generar el pago, contacte a soporte']);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function show(Pago $pago)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function edit(Pago $pago)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pago $pago)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pago $pago)
    {
        //
    }
}

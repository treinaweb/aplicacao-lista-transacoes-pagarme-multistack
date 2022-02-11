<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Route;
use PagarMe\Client;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $pagarmeSDK = new Client('ak_test_nE14ZiG433nQG0D3aR0XhpzCj4iPkR');

    $transacoes = $pagarmeSDK->transactions()->getList([
        'count' => 15
    ]);

    return view('transacoes.index', [
        'transacoes' => $transacoes
    ]);
});

function status(string $status): string
{
    if ('refunded' == $status) {
        return "Reembolsado";
    }

    if ('paid' == $status) {
        return "Pago";
    }

    if ('refused' == $status) {
        return "Recusado";
    }
}

function valor(int $valor): string
{
    $valor = $valor / 1000;

    return number_format($valor, 2, ',', '.');
}

function data(string $data): string
{
    $data = Carbon::parse($data);

    return $data->format('d/m/Y h:i:s');
}

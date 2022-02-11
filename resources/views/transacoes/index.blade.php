@extends('app')

@section('conteudo')
    <div class="container">
        <h1>Lista de transações</h1>
        <table class="table">
        <thead>
            <tr>
                <th scope="col">ID Transação</th>
                <th scope="col">Status</th>
                <th scope="col">Cliente</th>
                <th scope="col">Valor</th>
                <th scope="col">Valor Reembolsado</th>
                <th scope="col">Data</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($transacoes as $transacao)
                <tr>
                    <th scope="row">{{ $transacao->id }}</th>
                    <td>{{ status($transacao->status) }}</td>
                    <td>{{ $transacao->card_holder_name }}</td>
                    <td>{{ valor($transacao->paid_amount) }}</td>
                    <td>{{ valor($transacao->refunded_amount) }}</td>
                    <td>{{ data($transacao->date_created) }}</td>
                </tr>
            @empty
                <tr>
                    <th scope="row"></th>
                    <td></td>
                    <td>Nenhuma transação encontrada</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            @endforelse
        </tbody>
        </table>
    </div>
@endsection
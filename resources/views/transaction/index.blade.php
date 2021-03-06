@extends('app')
@section('content')
    <div class="row">
        <div class="col-md-6 center-block">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Transaction History</h3>
                </div>
                <div class="panel-body table-responsive">
                    <table id="transaction_history" class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <td class="col-md-3">Transaction</td>
                            <td>In/Out</td>
                            <td>Person</td>
                            <td>Serial #</td>
                            <td>Type</td>
                            <td>Date</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($transactions as $transaction)
                            <tr>
                                <td>{{ $transaction->transaction_id }}</td>
                                <td>{{ $transaction->in_or_out == 'IN' ? 'IN' : 'OUT' }}</td>
                                <td><a href=" {{ URL::route('person.show',
                                                array($transaction->person->id)) }}">
                                        {{ $transaction->person->first_name . ' ' . $transaction->person->last_name }}
                                    </a></td>
                                <td><a href="{{ URL::route('inventory.show',
                                                array($transaction->equipment_id)) }}">
                                    {{ $transaction->equipment->serial }}</a></td>
                                <td>{{ $transaction->equipment->type }}</td>
                                <td>{{ $transaction->created_at->toDateString() }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop
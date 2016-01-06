@extends('app')

@section('content')
    <div class="row">
        <div class="col-sm-3 col-md-3 center-block">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Serial: {{ $item->serial }}</h3>
                </div>
                <div class="col-sm-offset-2 panel-body">
                    <dl class="dl-horizontal">
                        <dt>Make:</dt>
                        <dd>{{ $item->make }}</dd>
                        <dt>Model:</dt>
                        <dd>{{ $item->model }}</dd>
                        <dt>Purchase Date:</dt>
                        <dd>{{ $item->purchase_date->toDateString() }}</dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class=" col-sm-6 col-md-4 center-block">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Transaction History</h3>
                </div>
                <div class="panel-body table-responsive">
                    <table id="current_inventory" class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <td>Transaction</td>
                            <td>In/Out</td>
                            <td>Date</td>
                            <td>Person</td>
                        </tr>
                        </thead>
                        <tbody>
                        @if(!$transactions->isEmpty())
                        @foreach($transactions as $transaction)
                            <tr>
                                <td>{{ $transaction->transaction_id }}</td>
                                <td>{{ $transaction->in_or_out == 'IN' ? 'IN' : 'OUT' }}</td>
                                <td>{{ $transaction->created_at->toDateString() }}</td>
                                <td><a href=" {{ URL::route('person.show',
                                                array($transaction->person->id)) }}">
                                    {{ $transaction->person->first_name . ' ' . $transaction->person->last_name }}
                                    </a></td>
                            </tr>
                        @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <a href="{{ URL::route('inventory.edit', array($item->id)) }}"
           class="btn btn-primary btn-circle btn-bottomright">
            <span class="glyphicon glyphicon-cog"></span>
        </a>
    </div>
@stop
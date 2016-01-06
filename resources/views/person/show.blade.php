@extends('app')

@section('content')
    <div class="row">
        <div class="col-sm-4 col-md-3 center-block">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">{{ $person->first_name . ' ' . $person->last_name }}</h3>
                </div>
                <div class="panel-body">
                    <dl class="dl-horizontal">
                        <dt>Address:</dt>
                        <dd>{{ $person->displayAddress($person) }}</dd>
                        <dt>Phone Number:</dt>
                        <dd>{{ phone_format($person->phone_number, 'US', 'RFC3966') }}</dd>
                        <dt>Email:</dt>
                        <dd>{{ $person->email }}</dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 center-block">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Transaction History</h3>
                </div>
                <div class="panel-body table-responsive">
                    <table id="current_inventory" class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <td>Transaction ID</td>
                            <td>In/Out</td>
                            <td>Date</td>
                            <td>Item</td>
                        </tr>
                        </thead>
                        <tbody>
                        @if(!$transactions->isEmpty())
                            @foreach($transactions as $transaction)
                                <tr>
                                    <td>{{ $transaction->transaction_id }}</td>
                                    <td>{{ $transaction->in_or_out == 'IN' ? 'IN' : 'OUT' }}</td>
                                    <td>{{ $transaction->created_at->toDateString() }}</td>
                                    <td><a href=" {{ URL::route('inventory.show',
                                                            array($transaction->equipment_id)) }}">
                                            {{ $transaction->equipment->serial }}</a></td>
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
        <a href="{{ URL::route('person.edit', array($person->id)) }}"
           class="btn btn-primary btn-circle btn-bottomright">
            <span class="glyphicon glyphicon-cog"></span>
        </a>
    </div>
@stop
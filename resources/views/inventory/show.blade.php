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
    @include('partials.transactionhistory', ['showPerson' => 'true'])
    <div class="row">
        <a href="{{ URL::route('inventory.edit', array($item->id)) }}"
           class="btn btn-primary btn-circle btn-bottomright">
            <span class="glyphicon glyphicon-cog"></span>
        </a>
    </div>
@stop
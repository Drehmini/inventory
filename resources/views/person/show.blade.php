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
    @include('partials.transactionhistory', ['showPerson' => false])
    <div class="row">
        <a href="{{ URL::route('person.edit', array($person->id)) }}"
           class="btn btn-primary btn-circle btn-bottomright">
            <span class="glyphicon glyphicon-cog"></span>
        </a>
    </div>
@stop
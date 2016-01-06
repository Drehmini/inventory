@extends('App')

@section('content')
    {{ session()->flash('view_from', $item->id) }}
    {!! Form::model($item, ['route' => ['inventory.transactions.checkout', $item->id],
                            'method' => 'POST', 'class' => 'form-horizontal']) !!}
    @include('partials.transactionform', ['panelTitle' => 'Check Out: ' . $item->serial,
                                        'submitButtonText' => 'Check Out', 'item' => $item,
                                        'people' => $people] )
    {!! Form::close() !!}
@stop
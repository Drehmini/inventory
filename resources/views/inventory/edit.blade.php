@extends('app')

@section('content')
    {!! Form::model($item, ['method' => 'PATCH', 'route' => ['inventory.update', $item->id],
                    'class' => 'form-horizontal']) !!}
    @include('partials.inventoryform', ['submitButtonText' => 'Update', 'panelTitle' => 'Update ' . $item->serial])
    {!! Form::close() !!}
    @include('errors.list')
@stop
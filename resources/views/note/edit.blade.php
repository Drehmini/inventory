@extends('app')

@section('content')
    {!! Form::model(['note' => $note->note, $item],
        ['route' => ['inventory.note.update', $note->id], 'method' => 'PATCH', 'class' => 'form-horizontal']) !!}
    @include('partials.noteform', ['submitButtonText' => 'Edit Note', 'panelTitle' => 'Edit Note'])
    {!! Form::close() !!}

@stop
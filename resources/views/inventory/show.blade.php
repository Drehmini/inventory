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
                    <a href="{{ URL::route('inventory.note.create', array($item->id)) }}"
                       class="btn btn-primary btn-circle btn-circle-xs pull-right">
                        <span class="glyphicon glyphicon-comment"></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    @if(!$notes->isEmpty())
    <div class="row">
        <div class="col-sm-4 center-block">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Notes</h3>
                </div>
                <div class="panel-body">
                    @foreach($notes as $note)
                        <div class="well-sm">
                            {{ $note->note }}<br>
                            <div class="pull-right">
                                {{ $note->user->name }} - <abbr
                                        title="{{ $note->created_at }}">{{ $note->created_at->diffForHumans() }}</abbr>
                                {{ ($note->created_at == $note->updated_at) ? "" : " (Edited) "  }}
                                @if($note->user_id == Auth::id())
                                    <div class="btn-group">
                                        <a href="#" data-toggle="dropdown"
                                           aria-haspopup="true" aria-expanded="false">
                                            <span class="glyphicon glyphicon-option-vertical"></span></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="{{ URL::route('inventory.note.edit',
                                            ['id' => $note->id]) }}">Edit</a></li>
                                            <li>
                                                {!! Form::open(['route' => ['inventory.note.destroy', $note->id],
                                                    'method' => 'delete', 'id' => 'note_delete']) !!}
                                                <a href="#"
                                                   onclick="document.getElementById('note_delete').submit()">Delete</a>
                                                {!! Form::close() !!}
                                            </li>
                                        </ul>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @endif
    @include('partials.transactionhistory', ['showPerson' => 'true'])
    <div class="row">
        <a href="{{ URL::route('inventory.edit', array($item->id)) }}"
           class="btn btn-primary btn-circle btn-bottomright">
            <span class="glyphicon glyphicon-cog"></span>
        </a>
    </div>
@stop
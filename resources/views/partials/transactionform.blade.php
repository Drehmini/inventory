<div class="row">
    <div class="col-md-4 center-block">
        @include('errors.list')
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">{{ $panelTitle }}</h3>
            </div>
            <div class="panel-body">
                <div class="form-group form-inline">
                    {!! Form::text('equipment_id', $item->id, ['hidden']) !!}
                    <div class="col-sm-offset-2">
                        <!-- Person Form Dropdown -->
                        {!! Form::label('person_id', 'Person: ', ['class' => 'control-label col-sm-3']) !!}
                        {!! Form::select('person_id', $people, null, ['class' => 'form-control span-sm-3']) !!}
                        <a href="{{ URL::route('person.create') }}" style="padding-left: 2%;">
                            <span class="glyphicon glyphicon-plus"></span></a>
                    </div>
                </div>
                <div class="form-group form-inline">
                    <div class="col-sm-offset-2">
                        <!-- Due Date Form Input -->
                        {!! Form::label('due_date', 'Due Date: ', ['class' => 'control-label col-sm-3']) !!}
                        {!! Form::date('due_date', \Carbon\Carbon::now()->addDays(3),
                                        ['class' => 'form-control span-sm-3']) !!}
                    </div>
                </div>
                <div style="padding-top: 5%;">
                    <div class="col-sm-offset-4">
                        {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary']) !!}
                        {!! Form::reset('Reset', ['class' => 'btn btn-danger']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
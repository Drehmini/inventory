<div class="row">
    <div class="col-md-3 center-block">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">{{ $panelTitle }}</h3>
            </div>
            <div class="panel-body">
                {!! Form::hidden('equipment_id', $item->id) !!}
                <div class="form-group well-lg">
                    <!-- note Form Input -->
                    {!! Form::textarea('note', null,
                        ['class' => 'form-control', 'rows' => '3', 'placeholder' => 'Write note here']) !!}
                </div>
                <div>
                    <!-- Add Note Form Input -->
                    <div  style="padding-left: 30%;">
                        {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary']) !!}
                        {!! Form::reset('Reset', ['class' => 'btn btn-danger']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
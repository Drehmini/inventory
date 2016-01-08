<div class="row">
    <div class="col-md-5 center-block">
        @include('errors.list')
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">{{ $panelTitle }}</h3>
            </div>
            <div class="panel-body col-sm-offset-2">
                <div class="form-group">
                    <!-- serial Form Input -->
                    {!! Form::label('serial', 'Serial Number:',  ['class' => 'control-label col-sm-4']) !!}
                    <div class="col-sm-4">
                        {!! Form::text('serial', null, ['class' => 'form-control', 'placeholder' => 'Serial Number']) !!}
                    </div>
                </div>
                <div class="form-group">
                    <!-- make Form Input -->
                    {!! Form::label('make', 'Make:', ['class' => 'control-label col-sm-4']) !!}
                    <div class="col-sm-4">
                        {!! Form::text('make', null, ['class' => 'form-control', 'placeholder' => 'Make']) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('model', 'Model:', ['class' => 'control-label col-sm-4']) !!}
                    <!-- Model Form Input -->
                    <div class="col-sm-4">
                        {!! Form::text('model', null, ['class' => 'form-control', 'placeholder' => 'model']) !!}
                    </div>
                </div>
                <div class="form-group">
                    <!-- Purchase Date Form Input -->
                    {!! Form::label('purchase_date', 'Purchase Date:', ['class' => 'control-label col-sm-4']) !!}
                    <div class="col-sm-4">
                        {!! Form::input('date', 'purchase_date', date('Y-m-d'), ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('type', 'Type:', ['class' => 'control-label col-sm-4']) !!}
                    <div class="col-sm-4">
                        {!! Form::select('type', array('laptop' => 'Laptop', 'projector' => 'Projector',
                                                        'srojector screen' => 'Projector screen',
                                                        'tablet' => 'Tablet' ), null, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div style="padding-top: 5%;">
                    <!-- Add Item Form Input -->
                    <div class="col-sm-offset-3">
                        {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary']) !!}
                        {!! Form::reset('Reset', ['class' => 'btn btn-danger']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
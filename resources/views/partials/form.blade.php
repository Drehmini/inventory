<!-- Serial number Form Input -->
<div class="form-group">
    {!! Form::label('serial', 'Serial Number:') !!}
    {!! Form::text('serial', null, ['class' => 'form-control']) !!}
</div>
<!-- Make Form Input -->
<div class="form-group">
    {!! Form::label('make', 'Make:') !!}
    {!! Form::text('make', null, ['class' => 'form-control']) !!}
</div>
<!-- Model Form Input -->
<div class="form-group">
    {!! Form::label('model', 'Model:') !!}
    {!! Form::text('model', null, ['class' => 'form-control']) !!}
</div>
<!-- Purchase_date Form Input -->
<div class="form-group">
    {!! Form::label('purchase_date', 'Purchase Date:') !!}
    {!! Form::input('date', 'purchase_date', date('Y-m-d'), ['class' => 'form-control']) !!}
</div>
<!-- Add Item Form Input -->
<div class="form-group">
    {!! Form::submit($submitButtonText, null, ['class' => 'btn btn-primary form-control']) !!}
</div>
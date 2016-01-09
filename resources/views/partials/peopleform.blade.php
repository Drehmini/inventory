<div class="row">
    <div class="col-md-5 center-block">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">{{ $panelTitle }}</h3>
            </div>
            <div class="panel-body">
                <div class="form-group form-inline">
                    <!-- First_name Form Input -->
                    <div class="col-sm-offset-2 col-sm-4">
                        {!! Form::text('first_name', null, ['class' => 'form-control', 'placeholder' => 'First Name']) !!}
                    </div>
                    <!-- Last_name Form Input -->
                    <div class="col-sm-4">
                        {!! Form::text('last_name', null, ['class' => 'form-control', 'placeholder' => 'Last Name']) !!}
                    </div>
                </div>
                <div class="form-group form-inline">
                    <!-- Address Form Input -->
                    <div class="col-sm-offset-2 col-sm-4">
                        {!! Form::text('address', null, ['class' => 'form-control', 'placeholder' => 'Address']) !!}
                    </div>
                    <!-- Address_2 Form Input -->
                    <div class="col-sm-4">
                        {!! Form::text('address_2', null, ['class' => 'form-control', 'placeholder' => 'Address']) !!}
                    </div>
                </div>
                <div class="form-group form-inline">
                    <!-- City Form Input -->
                    <div class="col-sm-offset-1 col-sm-4">
                        {!! Form::text('city', null, ['class' => 'form-control', 'placeholder' => 'City']) !!}
                    </div>
                    <!-- State Form Dropdown -->
                    <div class="col-sm-2">
                        {!! Form::select('state', $states, 49, ['class' => 'form-control']) !!}
                    </div>
                    <!-- Zip_code Form Input -->
                    <div class="col-sm-2">
                        {{ Form::text('zip_code', null, ['class' => 'form-control', 'placeholder' => 'Zip code']) }}
                    </div>
                </div>
                <div class="form-group form-inline">
                    <div class="col-sm-offset-2 col-sm-4">
                        <!-- Email Form Input -->
                        {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Email Address']) !!}
                    </div>
                    <div class="col-sm-4">
                        <!-- Phone Number Form Input -->
                        {!! Form::text('phone_number', null,
                                        ['class' => 'form-control', 'placeholder' => 'Phone Number']) !!}
                    </div>
                </div>
                <div style="padding-top: 5%;">
                    <!-- Add Person Form Input -->
                    <div class="col-sm-offset-4">
                        {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary']) !!}
                        {!! Form::reset('Reset', ['class' => 'btn btn-danger']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
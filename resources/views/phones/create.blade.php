@extends('layouts.app')

@section('content')  

    <div class="container">
        {!! Form::open(['action' => 'PhoneController@store']) !!}
            <div class="form-group row">
                 {!! Form::text('phone',null,['class' => 'form-control','placeholder' => 'phone number' ]) !!};
            </div>
            {!! Form::submit('Add',['class' => 'btn btn-success btn-block']) !!}
        {!! Form::close() !!}
    </div>
@endsection

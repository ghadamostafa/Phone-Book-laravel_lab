@extends('layouts.app')

@section('content')  

    <div class="container">
        {!! Form::model($phone,['action' =>['PhoneController@update',$phone],'method' => 'PUT' ]) !!}
            <div class="form-group row">
                 {!! Form::text('phone',null,['class' => 'form-control','placeholder' => 'phone number' ]) !!};
            </div>
            {!! Form::submit('Update',['class' => 'btn btn-primary btn-block']) !!}
        {!! Form::close() !!}
    </div>
@endsection

@extends('layouts.app')

@section('content')  

    <div class="container">
        {!! Form::model($user,['action' =>['UserController@update',$user],'method' => 'PUT' ]) !!}
            <div class="form-group row">
                 {!! Form::text('address',null,['class' => 'form-control','placeholder' => 'Address' ]) !!};
            </div>
            {!! Form::submit('Update',['class' => 'btn btn-primary btn-block']) !!}
        {!! Form::close() !!}
    </div>
@endsection

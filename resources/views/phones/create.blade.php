@extends('layouts.app')

@section('content')  
        
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container">
        {!! Form::open(['action' => 'PhoneController@store']) !!}
            <div class="form-group row">
                 {!! Form::text('phone',null,['class' => 'form-control','placeholder' => 'phone number' ]) !!};
            </div>
            {!! Form::submit('Add',['class' => 'btn btn-success btn-block']) !!}
        {!! Form::close() !!}
    </div>
@endsection

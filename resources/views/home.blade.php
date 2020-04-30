@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <ul>
                        @forelse($phones as $phone)
                            <li>{{ $phone->phone }}  
                            <a href={{ route('phones.edit',$phone) }} class='btn btn-secondary ' >Update</a>
                            {!! Form::model($phone,['action' =>['PhoneController@destroy',$phone],'method' => 'delete' ]) !!}
                                {!! Form::submit('Delete',['class' => 'btn btn-danger ']) !!}
                            {!! Form::close() !!}
                            </li>
                        @empty
                            <p>No Phones</p>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

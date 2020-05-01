@extends('layouts.app')



@section('content')

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@elseif (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <h3>My phones</h3>
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
                <h3>My contacts</h3>
                <a href={{ route('contacts.create') }} class='btn btn-success '>Add New contact</a>
                <div class="card-body">
                    <table class="table ">
                        <thead>
                            <th >Name</th>
                            <th>Phones</th>
                            <th>Operations</th>
                        </thead>
                        <tbody>

                            @forelse($contacts as $contact)
                                 <tr>
                                    <th>{{ $contact->name }}</th>

                                    <th>
                                    <ul>
                                    @foreach ($contact->phones as $phone)
                                            <li>{{ $phone->phone }}</li>
                                    @endforeach
                                    </ul>
                                    </th>

                                    <th>
                                    {!! Form::model($contact,['action' =>['ContactController@destroy',$contact],'method' => 'delete' ]) !!}
                                        {!! Form::submit('Delete',['class' => 'btn btn-danger ']) !!}
                                    {!! Form::close() !!}
                                    </th>
                                </tr>
                            @empty
                                <p>No Contacts</p>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

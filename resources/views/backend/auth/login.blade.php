@extends('backend.auth.layout.master')
@section('page_title', 'Login ')
    
@section('content')
    {!! Form::open([]) !!}
    {!! Form::label('email', 'Email') !!}
    {!! Form::email('email', null, ['class'=>'form-control form-control-sm']) !!}
    {!! Form::label('password', 'Password', ['class'=>'mt-3']) !!}
    {!! Form::password('password', ['class'=>'form-control form-control-sm']) !!}
    <div class="d-grid">
      {!! Form::button('Login', ['type'=>'submit', 'class'=>'btn btn-info mt-3']) !!}  
    </div>
    
    {!! Form::close([]) !!}
    <p class="mt-2">Fotgotten password? <a href="{{ route('password.request') }}">Reset Password</a></p>
    <p>Haven't account? <a href="{{ route('register') }}">Register</a></p>
   
@endsection

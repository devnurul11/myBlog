@extends('backend.auth.layout.master')
@section('page_title', 'Register ')
    
@section('content')
    {!! Form::open([]) !!}
    {!! Form::label('name', 'Name') !!}
    {!! Form::text('name', null, ['class'=>'form-control form-control-sm']) !!}
    {!! Form::label('email', 'Email', ['class'=>'mt-3'] ) !!}
    {!! Form::email('email', null, ['class'=>'form-control form-control-sm']) !!}
    {!! Form::label('password', 'Password', ['class'=>'mt-3']) !!}
    {!! Form::password('password', ['class'=>'form-control form-control-sm']) !!}
    {!! Form::label('password_confirmation', 'Confirm Password', ['class'=>'mt-3']) !!}
    {!! Form::password('password_confirmation', ['class'=>'form-control form-control-sm']) !!}
    <div class="d-grid">
      {!! Form::button('Login', ['type'=>'submit', 'class'=>'btn btn-info mt-3']) !!}  
    </div>
    
    {!! Form::close([]) !!}
    
    <p>Have account? <a href="{{ route('login') }}">Register</a></p>
   
@endsection

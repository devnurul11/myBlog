@extends('backend.auth.layout.master')
@section('page_title', 'Login ')
  
@section('content')
    {!! Form::open([]) !!}
    {!! Form::label('email', 'Email') !!}
    {!! Form::email('email', null, ['class'=> $errors->has('email') ?'is-invalid form-control form-control-sm':'form-control form-control-sm']) !!}
    @error('email')
        <p class="text-danger m-0">{{ $message }}</p>
    @enderror
    {!! Form::label('password', 'Password', ['class'=>'mt-3']) !!}
    {!! Form::password('password', ['class'=> $errors->has('email') ?'is-invalid form-control form-control-sm':'form-control form-control-sm']) !!}
    @error('email')
        <p class="text-danger m-0">{{ $message }}</p>
    @enderror
    <div class="d-grid">
      {!! Form::button('Login', ['type'=>'submit', 'class'=>'btn btn-info mt-3']) !!}  
    </div>
    
    {!! Form::close([]) !!}
    <p class="m-0" >Fotgotten password? <a href="{{ route('password.request') }}">Reset Password</a></p>
    <p class="m-0">Haven't account? <a href="{{ route('register') }}">Register</a></p>
   
@endsection

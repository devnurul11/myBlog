@extends('backend.auth.layout.master')
@section('page_title', 'Reset Password')
  
@section('content')
  
    {!! Form::open(['methor'=>'post', 'route'=>'password.email']) !!}
    {!! Form::label('email', 'Email') !!}
    {!! Form::email('email', null, ['class'=> $errors->has('email') ?'is-invalid form-control form-control-sm':'form-control form-control-sm']) !!}
    @error('email')
        <p class="text-danger m-0">{{ $message }}</p>
    @enderror
    <div class="d-grid">
      {!! Form::button('CLick To get password reset link', ['type'=>'submit', 'class'=>'btn btn-info mt-3']) !!}  
    </div>
    
    {!! Form::close([]) !!}
   
    <p class="m-0">Haven't account? <a href="{{ route('register') }}">Register</a></p>
   
@endsection

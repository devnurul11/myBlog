@extends('backend.auth.layout.master')
@section('page_title', 'Reset Password ')
    
@section('content')
    {!! Form::open(['methor'=>'put', 'route'=>'password.update']) !!}

    {!! Form::label('email', 'Email', ['class'=>'mt-3'] ) !!}
    {!! Form::email('email', $request->email, ['class'=> $errors->has('email') ?'is-invalid form-control form-control-sm':'form-control form-control-sm']) !!}
    @error('email')
        <p class="text-danger m-0">{{ $message }}</p>
    @enderror
    {!! Form::hidden('token', $request->route('token')) !!}

    {!! Form::label('password', 'New Password', ['class'=>'mt-3']) !!}
    {!! Form::password('password', ['class'=> $errors->has('password') ?'is-invalid form-control form-control-sm':'form-control form-control-sm']) !!}
    @error('password')
        <p class="text-danger m-0">{{ $message }}</p>
    @enderror
    {!! Form::label('password_confirmation', 'Confirm Password', ['class'=>'mt-3']) !!}
    {!! Form::password('password_confirmation', ['class'=> $errors->has('password_confirmation') ?'is-invalid form-control form-control-sm':'form-control form-control-sm']) !!}
    <div class="d-grid">
      {!! Form::button('Update Password', ['type'=>'submit', 'class'=>'btn btn-info mt-3']) !!}  
    </div>
    
    {!! Form::close([]) !!}
    
    <p>Have account? <a href="{{ route('login') }}">Register</a></p>
   
@endsection

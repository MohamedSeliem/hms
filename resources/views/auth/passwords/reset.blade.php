@extends('layouts.app')

@section('content')
@if (session('status'))
  <div class="notification is-success">
     {{ session('status') }}
  </div>
@endif
<div class="columns">
    <div class="column is-one-third is-offset-one-third m-t-100">
        <div class="card">
            <div class="card-content">
                <h1 class="title">Reset your Password</h1>
                <form action="{{route(''password.request')}}" method="POST" role="form">
                   {{csrf_field()}}
                <input type="hidden" name="token" value="{{ $token }}">
                <div class="field">
                    <label for="name" class="label">Name</label>
                    <p class="control">
                        <input class="input {{$errors->has('name')?'is-danger':''}}" type="text" name="name" id="name" placeholder="Mohamed Seliem" value="{{old('name')}}" required>
                    </p>
                    @if($errors->has('name'))
                        <p class="help is-danger">{{$errors->first('name')}}</p>
                    @endif
                </div>
                <div class="field">
                    <label for="email" class="label">Email address</label>
                    <p class="control">
                        <input class="input {{$errors->has('email')?'is-danger':''}}" type="text" name="email" id="email" placeholder="name@example.com" value="{{old('email')}}" required>
                    </p>
                    @if($errors->has('email'))
                        <p class="help is-danger">{{$errors->first('email')}}</p>
                    @endif
                </div>
                <div class="field">
                    <label for="password " class="label">New Password</label>
                    <p class="control">
                        <input class="input {{$errors->has('password')?'is-danger':''}}" type="password" name="password" id="password" required>
                    </p>
                    @if($errors->has('password'))
                        <p class="help is-danger">{{$errors->first('password')}}</p>
                    @endif
                </div>
                <div class="field">
                    <label for="password-confirmation" class="label">Confirm your New Password</label>
                    <p class="control">
                        <input class="input {{$errors->has('password-confirmation')?'is-danger':''}}" type="password" name="password-confirmation" id="password-confirmation" required>
                    </p>
                    @if($errors->has('password-confirmation'))
                        <p class="help is-danger">{{$errors->first('password-confirmation')}}</p>
                    @endif
                    <button class="button is-primary is-outlined is-fullwidth m-t-30">Reset Password</button>
                </div>
                </form>
            </div>
        </div>
        <h5 class="has-text-centered m-t-20"><a href="{{route('login')}}" class="is-muted">Login?</a></h5>
    </div>
</div>

@endsection

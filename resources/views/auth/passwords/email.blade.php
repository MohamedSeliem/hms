
@extends('layouts.app')

@section('content')
<div class="columns">
    <div class="column is-one-third is-offset-one-third m-t-100">
        <div class="card">
            <div class="card-content">
                <h1 class="title">Reset Password</h1>
                @if (session('status'))
                   <div class="notification is-success">
                    {{ session('status') }}
                   </div>
                @endif

                <form action="{{route('password.email')}}" method="POST" role="form">
                   {{csrf_field()}}
                <div class="field">
                    <label for="email" class="label">Email address</label>
                    <p class="control">
                        <input class="input {{$errors->has('email')?'is-danger':''}}" type="text" name="email" id="email" placeholder="name@example.com" value="{{old('email')}}">
                    </p>
                    @if($errors->has('email'))
                        <p class="help is-danger">{{$errors->first('email')}}</p>
                    @endif
                    <button class="button is-success is-outlined is-fullwidth m-t-30">submit</button>
                </div>
                </form>
            </div>
        </div>
        <h5 class="has-text-centered m-t-20"><a href="{{route('login')}}" class="is-muted"><i class="fa fa-caret-left r-m-10"> Back to Login</i></a></h5>
    </div>
</div>

@endsection

@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="container is-fluid">
            <div class="columns">

                <div class="column is-half is-offset-one-quarter">

                    @if(session('status'))
                        <div class="notification is-success">
                            {{session('status')}}
                        </div>
                    @endif

                    <h3 class="title">Reset Password</h3>
                    <form action="{{route('password.email')}}"  method="post" action="post" class="form">
                        {{ csrf_field() }}
                        <div class="field">
                            <label class="label">Email</label>
                            <p class="control">
                                <input type="email" name="email" id="email" placeholder="e.g sunny@hearts.com"
                                       class="input {{$errors->has('email')?' is-danger':''}}" value="{{old('email')}}">
                            </p>
                            @if($errors->has('email'))
                                <p class="help is-danger">
                                    {{$errors->first('email')}}
                                </p>
                            @endif
                        </div>

                        <div class="field">
                            <p class="control">
                                <button class="button is-primary" type="submit">Send Reset Link</button>
                            </p>

                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
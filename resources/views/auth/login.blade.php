@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="container is-fluid">
            <div class="columns">
                <div class="column is-half is-offset-one-quarter">
                    <h3 class="title">Sign In</h3>
                    <form action="{{ URL('/login') }}"  method="post" action="post" class="form">
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
                            <label class="label">Passowrd</label>
                            <p class="control">
                                <input type="password" name="password" id="password" placeholder="Choose Password"  class="input {{$errors->has('password')?' is-danger':''}}" value="{{old('password')}}">
                            </p>
                            @if($errors->has('password'))
                                <p class="help is-danger">
                                    {{$errors->first('password')}}
                                </p>
                            @endif
                        </div>
                        <div class="field">
                            <p class="control">
                                <label for="remember" class="checkout">
                                    <input type="checkbox" name="remember" id="remember">
                                    Remember Me
                                </label>
                            </p>

                        </div>


                        <div class="field is-grouped">
                            <p class="control">
                                <button class="button is-primary" type="submit">Sign In</button>
                            </p>
                            <p>
                                <a href="{{URL('password/reset')}}">Forgot Your Password?</a>
                            </p>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
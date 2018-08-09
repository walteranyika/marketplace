@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="container is-fluid">
            <div class="columns">
                <div class="column is-half is-offset-one-quarter">
                    <h3 class="title">Let's get you ready for selling</h3>
                    <form action="{{ route('register') }}"  method="post" action="post" class="form">
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
                            <label class="label">Names</label>
                            <p class="control">
                                <input type="text" name="name" id="name" placeholder="e.g Simon Owen"
                                       class="input {{$errors->has('name')?' is-danger':''}}" value="{{old('name')}}">
                            </p>
                            @if($errors->has('name'))
                                <p class="help is-danger">
                                    {{$errors->first('name')}}
                                </p>
                            @endif
                        </div>

                        <div class="field">
                            <label class="label">Passowrd</label>
                            <p class="control">
                                <input type="password" name="password" id="password" placeholder="Choose Password"
                                       class="input {{$errors->has('password')?' is-danger':''}}" value="{{old('password')}}">
                            </p>
                            @if($errors->has('password'))
                                <p class="help is-danger">
                                    {{$errors->first('password')}}
                                </p>
                            @endif
                        </div>

                        <div class="field">
                            <label class="label">Confirm Password</label>
                            <p class="control">
                                <input type="password" name="password_confirmation" id="confirm-password" placeholder="Confirm Password" class="input">
                            </p>
                        </div>

                        <div class="field">
                            <p class="control">
                                <button class="button is-primary" type="submit">Register</button>
                            </p>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
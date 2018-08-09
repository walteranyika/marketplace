@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="container is-fluid">
            <div class="columns">
                <div class="column is-half is-offset-one-quarter">
                    <h3 class="title">Reset New Password</h3>
                    <form action="{{ route('password.request') }}"  method="post" action="post" class="form">
                        {{ csrf_field() }}

                        <input type="hidden" name="token" value="{{$token}}">
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
                            <label class="label">New Passowrd</label>
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
                            <label class="label">Confirm New Password</label>
                            <p class="control">
                                <input type="password" name="password_confirmation" id="confirm-password" placeholder="Confirm Password" class="input">
                            </p>
                        </div>


                        <div class="field">
                            <p class="control">
                                <button class="button is-primary" type="submit">Change Password</button>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
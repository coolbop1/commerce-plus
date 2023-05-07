@extends('layouts.app')
@section('content')
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v16.0&appId=169498022736637&autoLogAppEvents=1" nonce="N99A1JgR"></script>
<br>&nbsp;<br>
<div class="row">
    <div class="col-xxl-4 col-xl-5 col-lg-6 col-md-8 mx-auto">
        <div class="card">
            <div class="text-center pt-4">
                <h1 class="h4 fw-600">
                   {{ $user_id ? 'Activate your account' : 'Login to your account.'}}
                </h1>
            </div>

            <div class="px-4 py-3 py-lg-4">
                <div class="">
                    <form class="form-default" role="form" onsubmit="return submitForm(this, url = '/api/login', 'POST', 'login-button')">
                        <span id="validate-email" class="alert-danger"></span>
                        <div class="form-group">
                            @if ($user_id)
                                <input type="hidden" value="{{ $user_id }}" name="user_id" id="user_id">
                            @endif
                            <input type="email" class="form-control" value="" placeholder="Email" name="email" id="email" autocomplete="off">
                         </div>
                         <span id="validate-password" class="alert-danger"></span>
                        <div class="form-group">
                            <input type="password" class="form-control " placeholder="Password" name="password" id="password">
                        </div>

                        <div class="fb-login-button" data-width="" data-size="" data-button-type="" data-layout="" data-auto-logout-link="false" data-use-continue-as="false"></div>
                        @if (!$user_id)
                            <div class="row mb-2">
                                <div class="col-6">
                                    <label class="aiz-checkbox">
                                        <input type="checkbox" name="remember">
                                        <span class="opacity-60">Remember Me</span>
                                        <span class="aiz-square-check"></span>
                                    </label>
                                </div>
                                <div class="col-6 text-right">
                                    <a href="/password/reset" class="text-reset opacity-60 fs-14">Forgot password?</a>
                                </div>
                            </div>
                        @endif
                        

                        <div class="mb-5">
                            <button id="login-button" type="submit" class="btn btn-primary btn-block fw-600">{{ $user_id ? 'Verify Account' : 'Login'}}</button>
                        </div>
                    </form>

                </div>
                @if (!$user_id)
                    <div class="text-center">
                        <p class="text-muted mb-0">Dont have an account?</p>
                        <a href="register">Register Now</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
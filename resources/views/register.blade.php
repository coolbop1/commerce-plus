@extends('layouts.app')

@section('content')
<br>&nbsp;<br>
<div class="row">
  <div class="col-xxl-4 col-xl-5 col-lg-6 col-md-8 mx-auto">
      <div class="card">
          <div class="text-center pt-4">
              <h1 class="h4 fw-600">
                  Create an account.
              </h1>
          </div>
          <div class="px-4 py-3 py-lg-4">
            <div class="">
              <form id="reg-form" class="form-default" role="form" onsubmit="return registerUser(this, url = '/api/register')">
                  <span id="validate-name" class="alert-danger"></span>                                       
                  <div class="form-group">
                      <input type="text" class="form-control" value="" placeholder="Full Name" name="name">
                  </div>
                  <span id="validate-phone" class="alert-danger"></span> 
                  <div class="form-group">
                      <input type="tel" class="form-control" value="" placeholder="Phone" name="phone">
                  </div>
                  <span id="validate-email" class="alert-danger"></span> 
                  <div class="form-group">
                      <input type="email" class="form-control " value="" placeholder="Email" name="email" autocomplete="off">
                  </div>
                  <span id="validate-password" class="alert-danger"></span> 
                  <div class="form-group">
                      <input type="password" class="form-control" placeholder="Password" name="password">
                  </div>
                  <span id="validate-c_password" class="alert-danger"></span> 
                  <div class="form-group">
                      <input type="password" class="form-control" placeholder="Confirm Password" name="c_password">
                  </div>
                  <div class="mb-3">
                      <label class="aiz-checkbox">
                          <input type="checkbox" name="checkbox_example_1" required="">
                          <span class="opacity-60">By signing up you agree to our terms and conditions.</span>
                          <span class="aiz-square-check"></span>
                      </label>
                  </div>
                  <div class="mb-5">
                      <button id="reg-button" type="submit" class="btn btn-primary btn-block fw-600">Create Account</button>
                  </div>
              </form>
          </div>
          <div class="text-center">
              <p class="text-muted mb-0">Already have an account?</p>
              <a href="login">Log In</a>
          </div>
        </div>
      </div>
  </div>

</div>
@endsection
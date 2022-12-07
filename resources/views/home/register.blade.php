@extends('layouts.master')
@section('Title','About')
@section('css')
<style>
body{
    background-color: #ccc;
}

</style>
@stop()
@section('main')
<div class="main-container col1-layout">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-xs-12">
          <article class="col-main">
            <div class="account-login">
              <div class="page-title">
                <h2>Create New Account</h2>
              </div>
              <fieldset class="col2-set">
                <div class="col-1 new-users">
                  <div class="content">
                    <ul class="form-list">
                      <li>
                        <label for="email">First Name <span class="required">*</span></label>
                        <input type="text" title="First Name" class="input-text required-entry" id="First Name" value="" name="login[First Name]">
                      </li>
                      <li>
                        <label for="email">Last Name <span class="required">*</span></label>
                        <input type="text" title="Email Address" class="input-text required-entry" id="Last Name" value="" name="login[Last Name]">
                      </li>
                      <li>
                        <label for="email">Email Address <span class="required">*</span></label>
                        <input type="text" title="Email Address" class="input-text required-entry" id="email" value="" name="login[username]">
                      </li>
                   
                      <li>
                        <label for="pass">Password <span class="required">*</span></label>
                        <input type="password" title="Password" id="pass" class="input-text required-entry validate-password" name="login[password]">
                      </li>
                      <li>
                        <label for="pass">Confirm Password <span class="required">*</span></label>
                        <input type="password" title="Password" id="pass" class="input-text required-entry validate-password" name="login[password]">
                      </li>
                    </ul>
                    <div class="buttons-set">
                      
                      <button class="button create-account" type="button"><span>Sign Up</span></button>
                    </div><br>
                    <div class="form-group">
                      <div class="users">Already have an account? <a href="{{ route('home.login')}}">Sign In</a></div>
                    </div>
                  </div>
                </div>
              </fieldset>
            </div>
          </article>
          <!--	///*///======    End article  ========= //*/// --> 
        </div>
      </div>
    </div>
  </div>

@stop()


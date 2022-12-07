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
    @if (!auth('cus')->check())
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-xs-12">
          <article class="col-main">
            <div class="account-login">
              <div class="page-title">
                <h2>Login or Create an Account</h2>
              </div>
              <fieldset class="col2-set">
                <div class="col-1 new-users"><strong>New Customers</strong>
                  <div class="content">
                    <p>By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.</p>
                    <div class="buttons-set">
                      <button onclick="window.location='{{ route('home.register')}}';" class="button create-account" type="button"><span>Create an Account</span></button>
                    </div>
                  </div>
                </div>
                
                <form action="" method="POST">
                    @csrf
                    <div class="col-2 registered-users"><strong>Registered Customers</strong>
                        
                        <div class="content">
                          <p>If you have an account with us, please log in.</p>
                          <ul class="form-list">
                            <li>
                              <label for="email">Email Address <span class="required">*</span></label>
                              <input type="email" title="Email Address" class="input-text required-entry" id="email" value="" name="email">
                            </li>
                            <li>
                              <label for="pass">Password <span class="required">*</span></label>
                              <input type="password" title="Password" id="pass" class="input-text required-entry validate-password" name="password">
                            </li>
                          </ul>
                          <p class="required">* Required Fields</p>
                          <div class="buttons-set">
                            <button id="send2" name="send" type="submit" class="button login"><span>Login</span></button>
                            <a class="forgot-word" href="#">Forgot Your Password?</a> </div>
                         
                            @if (Session::has('error'))
                            <div style="width:80%" class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                               {{Session::get('error')}}
                            </div>
                            @endif
                    
                          
                           
                        </div>
                      </div>
                      
                </form>
                
              </fieldset>
            </div>
          </article>
          <!--	///*///======    End article  ========= //*/// --> 
        </div>
      </div>
    </div>
    @else
       My account
    @endif
  </div>

@stop()


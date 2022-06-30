<form class="bravo-form-login" method="POST" action="{{ route('login') }}">
   <input type="hidden" name="redirect" value="{{request()->query('redirect')}}">
   @csrf
   <div class="sign-in-wrapper">
      @if(setting_item('facebook_enable') or setting_item('google_enable'))
      @if(setting_item('facebook_enable'))
      <a href="{{url('/social-login/facebook')}}" class="social_bt facebook" data-channel="facebook">Login with
         Facebook</a>
      @endif
      @if(setting_item('google_enable'))
      <a href="{{url('social-login/google')}}" class="social_bt google" data-channel="google">Login with Google</a>
      @endif
      @endif
      <div class="divider"><span>Or</span></div>
      <div class="form-group">
         <label>Email</label>
         <input type="email" autocomplete="off" class="form-control" name="email" id="email">
         <i class="icon_mail_alt"></i>
         <!-- <span class="invalid-feedback error error-email"></span> -->
      </div>
      <div class="form-group">
         <label>Password</label>
         <input type="password" autocomplete="off" class="form-control" name="password" id="password" value="">
         <i class="icon_lock_alt"></i>
         <!-- <span class="invalid-feedback error error-password"></span> -->
      </div>
      <div class="clearfix add_bottom_15">
         <div class="checkboxes float-start">
            <label for="remember-me" class="container_check">Remember me
               <input type="checkbox" name="remember" id="remember-me" value="1">
               <span class="checkmark"></span>
            </label>
         </div>
         <div class="float-end mt-1"><a id="forgot" href="{{ route("password.request") }}">Forgot Password?</a></div>
      </div>
      <div class="text-center"><input type="submit" value="Log In" class="btn_1 full-width">
      </div>
      <!-- <button class="btn btn-primary form-submit" type="submit">
            {{ __('Login') }}
            <span class="spinner-grow spinner-grow-sm icon-loading" role="status" aria-hidden="true"></span>
        </button> -->
      <div class="text-center">
         Don’t have an account? <a href="" data-target="#register" data-toggle="modal">{{__('Sign Up')}}</a>
      </div>
      <div id="forgot_pw">
         <div class="form-group">
            <label>Please confirm login email below</label>
            <input type="email" class="form-control" name="email_forgot" id="email_forgot">
            <i class="icon_mail_alt"></i>
         </div>
         <p>You will receive an email containing a link allowing you to reset your password to a new preferred
            one.
         </p>
         <div class="text-c enter"><input type="submit" value="Reset Password" class="btn_1"></div>
      </div>
   </div>
</form>
<!--form -->

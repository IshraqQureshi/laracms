<div id="auth">

  <div class="row h-100">
      <div class="col-lg-5 col-12">
          <div id="auth-left">
              <div class="auth-logo">
                  <a href="index.html"><img src="{{ config('constants.__SITECONTROL_ASSETS') }}images/logo/logo.png" alt="Logo"></a>
              </div>
              <h1 class="auth-title">Log in.</h1>
              <p class="auth-subtitle mb-5">Log in with your data that you entered during registration.</p>

                  {!! Form::open(['url' => route('getLogin'), 'method' => 'post']) !!}
                  @error('message')
                    <div class="alert alert-danger" role="alert">
                        {{ $errors->first('message') }}
                    </div>
                  @enderror
                  <div class="form-group position-relative has-icon-left mb-4">
                      {{ Form::text('email', old('email'), array('class' => 'form-control form-control-xl', 'placeholder' => 'Enter email address')) }}
                      <div class="form-control-icon">
                          <i class="bi bi-person"></i>
                      </div>
                      @error('email')
                        <p class="text-danger mt-2">{{ $errors->first('email') }}</p>
                      @enderror
                  </div>

                  <div class="form-group position-relative has-icon-left mb-4">
                      {{ Form::password('password', array('class' => 'form-control form-control-xl', 'placeholder' => 'Enter password')) }}
                      <div class="form-control-icon">
                          <i class="bi bi-shield-lock"></i>
                      </div>
                      @error('password')
                        <p class="text-danger mt-2">{{ $errors->first('password') }}</p>
                      @enderror
                  </div>

                  <div class="form-check form-check-lg d-flex align-items-end">
                      {{ Form::checkbox('remember_me', '1', false, array('id' => 'flexCheckDefault', 'class' => 'form-check-input me-2')) }}
                      <label class="form-check-label text-gray-600" for="flexCheckDefault">
                          Keep me logged in
                      </label>
                  </div>
                  
                  {{ Form::submit('Login', array('class' => 'btn btn-primary btn-block btn-lg shadow-lg mt-5')) }}
              {!! Form::close() !!}
              <div class="text-center mt-5 text-lg fs-4">
                  <p class="text-gray-600">Don't have an account? <a href="auth-register.html"
                          class="font-bold">Sign
                          up</a>.</p>
                  <p><a class="font-bold" href="auth-forgot-password.html">Forgot password?</a>.</p>
              </div>
          </div>
      </div>
      <div class="col-lg-7 d-none d-lg-block">
          <div id="auth-right">

          </div>
      </div>
  </div>

</div>
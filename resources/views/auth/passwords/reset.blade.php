@include('layouts.script')
<body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="../../index2.html"><b>Admin</b>LTE</a>
      </div>
      <!-- /.login-logo -->
      <div class="card">
        <div class="card-body login-card-body">
          <div class="card-header">{{ __('Reset Password') }}</div>

          <div class="card-body">
            <form method="POST" action="{{ route('password.update') }}">
              @csrf

              <input type="hidden" name="token" value="{{ $token }}">

              <div class="input-group mb-3">
                <input type="email" class="form-control" placeholder="Email" id="email" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                  </div>
                </div>
              </div>
              @error('email')
                <div class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </div>
              @enderror

              <div class="input-group mb-3">
                <input type="password" class="form-control" placeholder="Password" id="password" name="password" required autocomplete="new-password">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                  </div>
                </div>
              </div>
              @error('password')
                <div class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </div>
              @enderror

              <div class="input-group mb-3">
                <input type="password" class="form-control" placeholder="Confirm Password" id="password-confirm" name="password_confirmation" required autocomplete="new-password">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-12">
                  <button type="submit" class="btn btn-primary btn-block">{{ __('Reset Password') }}</button>
                </div>
                <!-- /.col -->
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- /.login-box -->
</body>

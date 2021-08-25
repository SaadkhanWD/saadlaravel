<x-guest-layout>
<main>
    <div class="container">
      <div class="row">
        <div class="col-sm-6 login-section-wrapper">
          <div class="brand-wrapper">
            <!--<img src="{{asset ('images/logo.svg')}}" alt="logo" class="logo">-->
          </div>
          <div class="login-wrapper my-auto">
            <h1 class="login-title">Log in</h1>
            <x-jet-validation-errors class="mb-4" />
            <form action="{{route('login')}}" method="POST">
                @csrf
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="email@example.com" :value="old('email')" required autofocus>
              </div>
              <div class="form-group mb-4">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="enter your passsword" required autocomplete="current-password">
              </div>
              <input name="submit" id="login" class="btn btn-block login-btn" type="submit" value="Login">
              <input name="remember" id="rememberme" value="forever" type="checkbox"><span class="ml-1">Remember me</span>
            </form><br>
            <a href="{{route('password.request')}}" class="forgot-password-link">Forgot password?</a>
            <p class="login-wrapper-footer-text">Don't have an account? <a href="/register" class="text-reset">Register here</a></p>
          </div>
        </div>
        <div class="col-sm-6 px-0 d-none d-sm-block">
          <img src="{{asset('images/login.jpg')}}" alt="login image" class="login-img">
        </div>
      </div>
    </div>
  </main>
</x-guest-layout>

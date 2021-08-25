
<x-guest-layout>
    <main>
        <div class="container">
          <div class="row">
            <div class="col-sm-6 login-section-wrapper">
              <div class="brand-wrapper">
                <!--<img src="{{asset ('images/logo.svg')}}" alt="logo" class="logo">-->
              </div>
              <div class="login-wrapper my-auto">
                <h1 class="login-title">Forgot Password</h1>
                @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
                @endif
                <x-jet-validation-errors class="mb-4" />
                <form action="{{route('password.email')}}" method="POST">
                    @csrf
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="email@example.com" :value="old('email')" required autofocus>
                  </div>
                  <input name="submit" id="login" class="btn btn-primary login-btn btn-sm" type="submit" value="Email Password Reset Link">
                </form><br>
              </div>
            </div>
            <div class="col-sm-6 px-0 d-none d-sm-block">
              <img src="{{asset('images/login.jpg')}}" alt="login image" class="login-img">
            </div>
          </div>
        </div>
      </main>
</x-guest-layout>



<x-guest-layout>
        <div class="container">
      <div class="row">
        <div class="col-sm-6 login-section-wrapper">
          <div class="brand-wrapper">
            <!--<img src="{{asset ('images/logo.svg')}}" alt="logo" class="logo">-->
          </div>
          <div class="login-wrapper my-auto">
            <h1 class="login-title">Create an Account</h1>
            <x-jet-validation-errors class="mb-4" />
            <form action="{{route('register')}}" method="POST">
                @csrf
              <div class="form-group">
                <label for="email">Name</label>
                <input type="text" name="name" class="form-control" :value="name" placeholder="Enter Your Name" required autofocus autocomplete="name">
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Email@Example.com" :value="email" required autofocus>
              </div>
              <div class="form-group mb-4">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Enter Your passsword" required autocomplete="new-password">
              </div>
              <div class="form-group mb-4">
                <label for="password">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password" class="form-control" placeholder="Confirm Passsword" required autocomplete="new-password">
              </div>
              <input name="register" class="btn btn-block login-btn" type="submit" value="Register">
            </form>
          </div>
        </div>
        <div class="col-sm-6 px-0 d-none d-sm-block">
          <img src="{{asset('images/login.jpg')}}" alt="login image" class="login-img">
        </div>
      </div>
    </div>
  </main>
</x-guest-layout>

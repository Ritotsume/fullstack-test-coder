@extends('auth.layouts.login')

@section('panel-content')
  <div class="container">

    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">{{ __('Login') }}</h1>

                    @if ($errors->any())
                      <div class="alert alert-danger" role="alert">
                        @foreach ($errors->all() as $error)
                          {{ $error }}
                        @endforeach
                      </div>
                    @endif

                  </div>
                  <form class="user" action="{{ route('login') }}" method="post">
                    @csrf
                    <div class="form-group">
                      <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror"
                        id="email" aria-describedby="emailHelp" name="email" value="{{ old('email') }}" required
                        autocomplete="email" autofocus placeholder="Enter Email Address...">
                    </div>
                    <div class="form-group">
                      <input type="password"
                        class="form-control form-control-user @error('password') is-invalid @enderror" id="password"
                        name="password" required autocomplete="current-password" placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                      {{ __('Login') }}
                    </button>
                  </form>
                  <hr>
                  <div class="text-center">
                    @if (Route::has('password.request'))
                      <a class="small" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                      </a>
                    @endif
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>
@endsection

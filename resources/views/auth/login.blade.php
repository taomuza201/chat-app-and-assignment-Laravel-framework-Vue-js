@extends('layouts.appchat')

@section('content')
<div class="container">
    <div class="row align-items-center justify-content-center min-vh-100 gx-0">

        <div class="col-12 col-md-5 col-lg-4">
            <div class="card card-shadow border-0">
                <form method="POST" action="{{ route('login') }}">
                    @csrf



                    <div class="card-body">
                        <div class="row g-6">
                            <div class="col-12">
                                <div class="text-center">
                                    <h3 class="fw-bold mb-2">Sign In</h3>
                                    <p>Login to your account</p>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="email" class="form-control" id="signin-email" placeholder="Email"
                                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <label for="signin-email">Email</label>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="password" class="form-control" id="signin-password" name="password"
                                        name="password" required autocomplete="current-password" placeholder="Password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                    <label for="signin-password">Password</label>
                                </div>
                            </div>

                            <div class="col-12">
                                <button class="btn btn-block btn-lg btn-primary w-100" type="submit">Sign In</button>
                            </div>
                        </div>
                    </div>
            </div>
            </form>
            <!-- Text -->
            <div class="text-center mt-8">
                <p>Don't have an account yet? <a href="{{ route('register') }}">Sign up</a></p>
                {{-- <p><a href="password-reset.html">Forgot Password?</a></p> --}}
            </div>
        </div>
    </div> <!-- / .row -->
</div>
@endsection

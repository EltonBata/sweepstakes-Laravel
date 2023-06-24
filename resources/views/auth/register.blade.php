@extends('auth.layout')
@section('title', 'Register')
@section('content')
    <div class="container ">
        <div class="row justify-content-center">
            <div class="col-md-8 main2 ">
                <div class="card login" style="border-color: #dee2e6;">
                    <div class="card-header fw-bold text-center p-3 text-danger"
                        style="font-size: 20px;border-color: #dee2e6;">{{ __('Registar-se') }}
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-floating mb-3">
                                <input class="form-control rounded-pill" type="text" name="username" 
                                    placeholder="Username" value="{{ old('username') }}" />
                                <label class="">Username</label>
                                @error('username')
                                    <span class="text-danger ms-3">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>

                            <div class="form-floating mb-3">
                                <input class="form-control rounded-pill" type="email" name="email" 
                                    placeholder="Email" value="{{ old('email') }}" />
                                <label class="">Email</label>
                                @error('email')
                                    <span class="text-danger ms-3">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>

                            <div class="form-floating mb-3">
                                <input class="form-control rounded-pill" id="inputPassword" type="password" name="password"
                                     placeholder="Password" maxlength="8" minlength="4" />
                                <label for="inputPassword">Password</label>
                                @error('password')
                                    <span class="text-danger ms-3">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>

                            <div class="form-floating mb-3">
                                <input class="form-control rounded-pill" id="inputPassword" type="password"
                                    name="passwordConfirmation"  placeholder="Password Confirmation" maxlength="8"
                                    minlength="4" />
                                <label for="inputPassword">Password Confirmation</label>
                                @error('passoword')
                                    <span class="text-danger ms-3">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>


                            <div class="container d-flex justify-content-center my-4">
                                <button class="btn btn-danger rounded-pill">Registar</button>
                            </div>

                            <div class="d-flex justify-content-center mt-5">
                                <a href="{{ route('login') }}" class="btn text-danger text-center">Possui uma conta? Faca
                                    Login</a>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

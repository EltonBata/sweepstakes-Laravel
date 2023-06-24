@extends('auth.layout')
@section('title', 'Login')
@section('content')
    <div class="container ">
        <div class="row justify-content-center">
            <div class="col-md-8 main2 ">
                <div class="card login" style="border-color: #dee2e6;">
                    <div class="card-header fw-bold text-center p-3 text-danger"
                        style="font-size: 20px;border-color: #dee2e6; color: #dee2e6">{{ __('Login') }}
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            @error('email')
                                <div class="alert alert-danger alert-dismissible mx-auto my-3">
                                    <button class="btn-close" data-bs-dismiss='alert'></button>
                                    {{ $message }}
                                </div>
                            @enderror


                            <div class="form-floating my-3">
                                <input class="form-control rounded-pill" type="email" name="email" 
                                    placeholder="Email" />
                                <label class="">Email</label>
                            </div>
       

                            <div class="form-floating mb-3">
                                <input class="form-control rounded-pill" id="inputPassword" type="password" name="password"
                                     placeholder="Password" maxlength="8" minlength="4" />
                                <label for="inputPassword">Password</label>
                            </div>


                            <div class="container d-flex justify-content-center my-4">
                                <button class="btn btn-danger rounded-pill">Logon</button>
                            </div>

                            <div class="mt-5 clearfix">
                                <a href="" class="btn text-danger float-start">Esqueceu-se da Password?</a>
                                <a href="{{ route('register') }}" class="btn text-danger float-end">Registrar-se</a>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

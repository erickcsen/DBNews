<?php $title_page = "Login" ?>
@extends("visitors.container.main")
@section("container")
    {{-- Tampilan Desktop dan Mobile --}}
    <div id="content" class="col-12 
    {{-- d-none d-lg-inline-block --}}
    ">
        <div class="col-12 px-2">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-3 col-lg-4"></div>
                    <div class="col-12 col-md-6 col-lg-4 border rounded p-0 overflow-hidden">
                        {{-- <x-guest-layout> --}}
                            <!-- Session Status -->
                            {{-- <x-auth-session-status class="mb-4" :status="session('status')" /> --}}

                            <div class="col-12 text-center bgcolor4a25a9 py-3 d-none d-lg-inline-block">
                                <img src="/images/logo_dbnews.png" alt="" height="30">
                            </div>
                            <div class="col-12 text-center py-4">
                                <h4>Login</h4>
                            </div>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="col-12 px-3">
                                    <div class="position-absolute bg-white border rounded-start py-1 pb-2 text-center" style="width: 40px">
                                        <i class="fa fa-envelope text-muted"></i>
                                    </div>
                                    <x-text-input id="email" class="form-control ps-5" placeholder="Email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                                    <div class="mb-3 text-danger" style="font-size: 10pt;">
                                        <x-input-error :messages="$errors->get('email')" style="list-style-type: none;margin:0;padding:0;" />
                                    </div>
                                </div>
                                <div class="col-12 px-3">
                                    <div class="position-absolute bg-white border rounded-start py-1 pb-2 text-center" style="width: 40px">
                                        <i class="fa fa-key text-muted"></i>
                                    </div>
                                    
                                    <x-text-input id="password" class="form-control ps-5 pe-5"
                                        type="password"
                                        name="password"
                                        placeholder="Password"
                                        required autocomplete="current-password" />

                                    <button id="button_eye_slash" type="button" class="btn btn-light border float-end" style="margin-top: -36px;margin-right:3px" onclick="button_eye.hidden=false;password.type='password'">
                                        <i class="fa fa-eye-slash"></i>
                                    </button>
                                    <button id="button_eye" type="button" class="btn btn-light border float-end" style="margin-top: -36px;margin-right:3px" onclick="this.hidden=true;password.type='text'">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                    <div class="mb-3 text-danger" style="font-size: 10pt;">
                                        <x-input-error :messages="$errors->get('password')" style="list-style-type: none;margin:0;padding:0;" />
                                    </div>
                                </div>
                                <div class="col-12 px-3 mb-3" style="font-size: 10pt">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" name="remember" class="form-check-input">
                                                    Ingat Saya
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-6 text-end">
                                            <a href="/forgot-password" class="nolink">
                                                Lupa Password ?
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 px-3 mb-4">
                                    <button class="btn btn-primary form-control">
                                        Masuk
                                    </button>
                                </div>
                                <div class="col-12 text-center mb-4" style="font-size: 10pt">
                                    Belum memiliki akun ? <a href="/register">Register sekarang</a> 
                                </div>
                                <div class="col-12 text-center" style="font-size: 10pt;height:15px;">
                                    <div class="col-12 px-3">
                                        <div class="position-absolute d-inline z-1 px-2" style="background: white;margin-top:-10px;margin-left:-70px">
                                            Atau masuk dengan 
                                        </div>
                                        <hr>
                                        <div class="col-12 px-3">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 text-center mt-3">
                                    <div class="col-12 px-3">
                                        <a href="{{ url('auth/google') }}" class="btn btn-light border w-100">
                                            <img src="https://cdn-icons-png.flaticon.com/256/720/720255.png" height="25px" alt="" class="border rounded-circle"> Google
                                        </a>
                                    </div>
                                </div>
                            </form>
                            <div class="col-12 mb-4"></div>
                        {{-- </x-guest-layout> --}}
                    </div>
                    <div class="col-12 col-md-3 col-lg-4"></div>
                    <div class="col-12 pb-5"></div>
                </div>
            </div>
        </div>
    </div>
@endsection

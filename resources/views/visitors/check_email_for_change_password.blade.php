<?php $title_page = "Forgot Password" ?>
@extends("visitors.container.main")
@section("container")
    <div id="content" class="col-12">
        <div class="col-12 px-2">
            <div class="container">
                <div class="row">
                    <div class="col-12 pb-5 d-none d-lg-inline-block"></div>
                    <div class="col-12 col-md-3 col-lg-4"></div>
                    <div class="col-12 col-md-6 col-lg-4 border rounded p-0 overflow-hidden">
                        <form action="{{ route('password.email') }}" method="post">
                            @csrf
                            <div class="col-12 text-center bgcolor4a25a9 py-3 d-none d-lg-inline-block">
                                <img src="/images/logo_dbnews.png" alt="" height="30">
                            </div>
                            <div class="col-12 text-center py-4">
                                <h4>Lupa Password</h4>
                            </div>
                            <div class="col-12 px-3">
                                <div class="position-absolute bg-white border rounded-start py-1 pb-2 text-center" style="width: 40px">
                                    <i class="fa fa-envelope text-muted"></i>
                                </div>
                                <x-text-input type="email" class="form-control ps-5" name="email" placeholder="Email" :value="old('email')" required autofocus />
                                <div class="mb-2 text-danger" style="font-size: 10pt;max-height:30px;overflow:hidden">
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" style="list-style-type: none;margin:0;padding:0;"/>
                                    <div class="text-success">
                                        <!-- Session Status -->
                                        <x-auth-session-status class="mb-4" :status="session('status')" style="list-style-type: none;margin:0;padding:0;" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 px-3 mb-4">
                                <x-primary-button class="btn btn-info text-white form-control">Kirim Tautan Reset Kata Sandi</x-primary-button>
                            </div>
                            <div class="col-12 text-center px-3" style="font-size: 10pt;">
                                <span class="bg-white px-2 position-absolute z-1" style="margin-top: -10px; margin-left:-25px ">
                                    Atau
                                </span>
                                <hr>
                            </div>
                            <div class="col-12 text-center px-3 pt-3 mb-4" style="font-size: 10pt">
                                Sudah punya akun ? <a href="/login">Masuk</a>
                            </div>
                            <div class="col-12 mb-3"></div>
                        </form>
                    </div>
                    <div class="col-12 col-md-3 col-lg-4"></div>
                    <div class="col-12 pb-5"></div>
                </div>
            </div>
        </div>
    </div>
@endsection
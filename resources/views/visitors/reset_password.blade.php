<?php $title_page = "Reset Password" ?>
@extends("visitors.container.main")
@section("container")
    {{-- Tampilan Desktop dan Mobile --}}
    <div id="content" class="col-12 
    {{-- d-none d-lg-inline-block --}}
    ">
        <div class="col-12 px-2">
            <div class="container">
                <div class="row">
                    <div class="col-12 pb-5 d-none d-lg-inline-block"></div>
                    <div class="col-12 col-md-3 col-lg-4"></div>
                    <div class="col-12 col-md-6 col-lg-4 border rounded p-0 overflow-hidden">
                        <form action="{{ route('password.store') }}" method="post">
                            @csrf
                            <!-- Password Reset Token -->
                            <input type="hidden" name="token" value="{{ $request->route('token') }}">

                            <div class="col-12 text-center bgcolor4a25a9 py-3 d-lg-inline-block d-none">
                                <img src="/images/logo_dbnews.png" alt="" height="30">
                            </div>
                            <div class="col-12 text-center py-4">
                                <h4>Ubah Password</h4>
                            </div>
                            <div class="col-12 px-3" style="font-size: 10pt;">
                                <!-- Email Address -->
                                <div class="col-12">
                                    <div class="position-absolute bg-white border rounded-start py-1 pb-2 text-center" style="width: 40px">
                                        <i class="fa fa-envelope text-muted"></i>
                                    </div>
                                    <x-text-input style="font-size: 10pt" id="email" class="form-control ps-5" placeholder="Masukkan Email" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
                                    <div class="mb-3 text-danger">
                                        <x-input-error :messages="$errors->get('email')" class="mt-2" style="list-style-type: none;margin:0;padding:0;" />
                                    </div>
                                </div>

                                <!-- Password -->
                                <div class="col-12">
                                    <div class="position-absolute bg-white border rounded-start py-1 pb-2 text-center" style="width: 40px">
                                        <i class="fa fa-key text-muted"></i>
                                    </div>
                                    <x-text-input style="font-size: 10pt" id="password" class="form-control ps-5" type="password" name="password" required autocomplete="new-password" placeholder="Masukkan Password" />
                                    <div class="mb-3 text-danger">
                                        <x-input-error :messages="$errors->get('password')" class="mt-2" style="list-style-type: none;margin:0;padding:0;" />
                                    </div>
                                </div>

                                <!-- Confirm Password -->
                                <div class="col-12">
                                    <div class="position-absolute bg-white border rounded-start py-1 pb-2 text-center" style="width: 40px">
                                        <i class="fa fa-key text-muted"></i>
                                    </div>
                                    <x-text-input style="font-size: 10pt" id="password_confirmation" class="form-control ps-5"
                                        type="password" placeholder="Masukkan Ulang Password"
                                        name="password_confirmation" required autocomplete="new-password" />
                                    <div class="mb-3 text-danger">
                                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" style="list-style-type: none;margin:0;padding:0;" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 px-3 mb-4">
                                <button class="btn btn-info text-white form-control">Ubah Password</button>
                            </div>
                        </form>
                        <div class="col-12 mb-3"></div>
                    </div>
                    <div class="col-12 col-md-3 col-lg-4"></div>
                    <div class="col-12 pb-5"></div>
                </div>
            </div>
        </div>
    </div>
@endsection
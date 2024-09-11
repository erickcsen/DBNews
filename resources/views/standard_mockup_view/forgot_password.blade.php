<?php $title_page = "Forgot Password" ?>
@extends("standard_mockup_view.container.main")
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
                        <div class="col-12 text-center bgcolor4a25a9 py-3">
                            <img src="/images/logo_dbnews.png" alt="" height="30">
                        </div>
                        <div class="col-12 text-center py-4">
                            <h4>Lupa Password</h4>
                        </div>
                        <div class="col-12 px-3">
                            <div class="position-absolute bg-white border rounded-start py-1 pb-2 text-center" style="width: 40px">
                                <i class="fa fa-envelope text-muted"></i>
                            </div>
                            <input type="text" class="form-control ps-5" placeholder="Email">
                            <div class="mb-3"></div>
                        </div>
                        <div class="col-12 px-3 mb-4">
                            <a href="/reset_password" class="btn btn-info text-white form-control">Kirim Tautan Reset Kata Sandi</a>
                        </div>
                        <div class="col-12 text-center px-3">
                            <span class="bg-white px-2 position-absolute z-1" style="margin-top: -15px; margin-left:-25px ">
                                Atau
                            </span>
                            <hr>
                        </div>
                        <div class="col-12 text-center px-3 pt-3 mb-4">
                            Sudah punya akun ? <a href="/sign_in">Masuk</a>
                        </div>
                        <div class="col-12 mb-3"></div>
                    </div>
                    <div class="col-12 col-md-3 col-lg-4"></div>
                    <div class="col-12 pb-5"></div>
                </div>
            </div>
        </div>
    </div>
@endsection

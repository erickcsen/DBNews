<?php $title_page = "Reset Password" ?>
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
                            <h4>Ubah Password</h4>
                        </div>
                        <div class="col-12 px-3">
                            <div class="position-absolute bg-white border rounded-start py-1 pb-2 text-center" style="width: 40px">
                                <i class="fa fa-key text-muted"></i>
                            </div>
                            <input type="text" class="form-control ps-5" placeholder="Masukkan Password">
                            <div class="mb-3"></div>
                        </div>
                        <div class="col-12 px-3">
                            <div class="position-absolute bg-white border rounded-start py-1 pb-2 text-center" style="width: 40px">
                                <i class="fa fa-key text-muted"></i>
                            </div>
                            <input type="text" class="form-control ps-5" placeholder="Masukkan Password Ulang">
                            <div class="mb-3"></div>
                        </div>
                        <div class="col-12 px-3 mb-4">
                            <a href="/sign_in" class="btn btn-info text-white form-control">Ubah Password</a>
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

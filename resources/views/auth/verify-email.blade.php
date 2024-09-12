<?php $title_page = "Verifikasi Email" ?>
@extends("visitors.container.main")
@section("container")
    <div id="content" class="container">
        <div class="row">
            <div class="col-12 col-md-3 col-lg-4"></div>
            <div class="col-12 col-md-6 col-lg-4 mb-5 border rounded p-0 overflow-hidden p-0">
                <div class="col-12 text-center bgcolor4a25a9 py-3 d-none d-lg-inline-block">
                    <img src="/images/logo_dbnews.png" alt="" height="30">
                </div>
                <div class="col-12 px-3 py-3">
                    <div class="mb-4" style="font-size:10pt">
                        Kami telah mengirimi Anda email untuk memverifikasi Anda. 
                        Jika Anda belum menerima email tersebut kami dapat mengirimkannya lagi dengan tombol "kirim ulang email verifikasi".
                    </div>
                    @if (session('status') == 'verification-link-sent')
                        <div id="message" class="position-absolute top-0 start-0 end-0">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12 col-md-2 col-lg-3"></div>
                                    <div class="col-12 col-md-8 col-lg-6">
                                        <div class="alert alert-success alert-dismissible fade show z-3" style="margin-top: 50px;font-size:10pt"  role="alert">
                                            <span>
                                                Tautan verifikasi baru telah dikirim ke alamat email Anda.
                                            </span>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style="font-size: 13px;"></button>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-2 col-lg-3"></div>
                                </div>
                            </div>
                        </div>
                    @endif
        
                    <div class="mt-4 flex items-center justify-between">
                        <form method="POST" action="{{ route('verification.send') }}">
                            @csrf
        
                            <div>
                                <button class="btn btn-primary">
                                    Kirim Ulang Verifikasi Email
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-3 col-lg-4"></div>
        </div>
    </div>
@endsection
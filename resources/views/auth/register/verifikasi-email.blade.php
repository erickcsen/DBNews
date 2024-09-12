<?php $title_page = "Register - Verifikasi Email" ?>
@extends("visitors.container.main")
@section("container")
    <div id="content" class="col-12">
        <div class="col-12 px-2">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-2 col-12"></div>
                    <div class="col-lg-6 col-md-8 col-12 border overflow-hidden rounded mb-5 p-0">
                        <div class="col-12 text-center bgcolor4a25a9 py-3 d-none d-lg-inline-block ">
                            <img src="/images/logo_dbnews.png" alt="" height="30">
                        </div>
                        <div class="col-12 text-center py-4">
                            <h4>Verifikasi Email</h4>
                        </div>
                        <form id="form_submit" method="POST" action="{{ route('register.verify_email_execute') }}" onsubmit="return submit_form()">
                            @csrf
                            <div class="col-12 px-3 mb-3">
                                <label for="email" style="font-size:10pt">Email</label>
                                <input type="email" class="form-control" value="{{$user["email"]}}" name="email" placeholder="Masukkan Email">
                            </div>
                            <div class="col-12 px-3">
                                <label for="email" style="font-size:10pt">Kode Verifikasi</label>
                                <input type="text" class="form-control" name="kode_verifikasi" placeholder="Masukkan kode verifikasi">
                                <div class="mb-3 text-danger" style="font-size: 10pt;" id="pesan_kode_verifikasi">
                                    @session('pesan')
                                        {{session("pesan")}}
                                    @endsession
                                </div>
                            </div>
                            <div class="col-12 px-3">
                                <input type="hidden" class="form-control" value="{{$user["name"]}}" name="name" placeholder="name">
                                <input type="hidden" class="form-control" value="{{$user["password"]}}" name="password" placeholder="password">
                            </div>
                            <div class="col-12 px-3 mb-2">
                                <button class="btn btn-primary form-control">
                                    Verifikasi Email
                                </button>
                            </div>
                            <div class="col-12 text-center" style="font-size: 10pt;height:15px;">
                                <div class="col-12 px-3">
                                    <div class="position-absolute d-inline z-1 px-2" style="background: white;margin-top:-10px;margin-left:-20px">
                                        Atau 
                                    </div>
                                    <hr>
                                    <div class="col-12 px-3">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 px-3 mb-2">
                                <button name="kirim_ulang" value="true" class="btn btn-light border w-100">
                                    Kirim Ulang
                                </button>
                            </div>
                        </form>
                        <script>
                            function submit_form(){
                                if (opsi_password_filled == true && opsi_can_submit == false){
                                    password_message.innerHTML = "Password must strong";
                                    return false;
                                } else {
                                    return true;
                                }
                            }
                        </script>
                        <div class="col-12 mb-4"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
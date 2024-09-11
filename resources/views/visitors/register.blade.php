<?php $title_page = "Register" ?>
@extends("visitors.container.main")
@section("container")
    {{-- Tampilan Desktop dan Mobile --}}
    <div id="content" class="col-12 
    {{-- d-none d-lg-inline-block --}}
    ">
        <div class="col-12 px-2">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-2 col-lg-2"></div>
                    <div class="col-12 col-md-8 col-lg-8 border rounded p-0 overflow-hidden">
                        {{-- <x-guest-layout> --}}
                            <!-- Session Status -->
                            {{-- <x-auth-session-status class="mb-4" :status="session('status')" /> --}}

                            <div class="col-12 text-center bgcolor4a25a9 py-3 d-none d-lg-inline-block">
                                <img src="/images/logo_dbnews.png" alt="" height="30">
                            </div>
                            <div class="col-12 text-center py-4">
                                <h4>Register</h4>
                            </div>
                            <form id="form_submit" method="POST" action="{{ route('register') }}" onsubmit="return submit_form()">
                                @csrf
                                <div class="col-12 px-3">
                                    <label for="nama" style="font-size:10pt">Nama Lengkap</label>
                                    <x-text-input id="nama" class="form-control" placeholder="Masukkan nama lengkap (Sesuai E-KTP)" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                                    <div class="mb-3 text-danger" style="font-size: 10pt;" id="pesan_nama">
                                        <x-input-error :messages="$errors->get('name')" style="list-style-type: none;margin:0;padding:0;" />
                                    </div>
                                </div>
                                <div class="col-12 px-3">
                                    <label for="email" style="font-size:10pt">Email</label>
                                    <x-text-input id="email" class="form-control" placeholder="Masukkan Email" type="email" name="email" :value="old('email')" required autocomplete="username"  />
                                    <div class="mb-3 text-danger" style="font-size: 10pt;" id="pesan_email">
                                        <x-input-error :messages="$errors->get('email')" style="list-style-type: none;margin:0;padding:0;" />
                                    </div>
                                </div>
                                <div class="col-12 px-3">
                                    <label for="password" style="font-size:10pt">Buat Password</label>
                                    <x-text-input id="password" class="form-control pe-5" placeholder="Masukkan Password" 
                                        type="password"
                                        name="password"
                                        required autocomplete="new-password" onkeyup="Password_Checked(this)" />
                                    <button id="button_eye_slash" type="button" class="btn btn-light border float-end" style="margin-top: -36px;margin-right:3px" onclick="button_eye.hidden=false;password.type='password'">
                                        <i class="fa fa-eye-slash"></i>
                                    </button>
                                    <button id="button_eye" type="button" class="btn btn-light border float-end" style="margin-top: -36px;margin-right:3px" onclick="this.hidden=true;password.type='text'">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                    <div class="mb-3 text-danger" style="font-size: 10pt;" id="pesan_password">
                                        <x-input-error :messages="$errors->get('password')" style="list-style-type: none;margin:0;padding:0;" />
                                        <div id="password_message" class="text-danger">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 px-3 mb-3">
                                    <label for="password2" style="font-size:10pt">Kekuatan Password</label>
                                    <div class="row px-3">
                                        <div id="progress1" class="col-6 my-2" style="background: silver;height:2px;"></div>
                                        <div id="progress2" class="col-6 my-2" style="background: silver;height:2px;"></div>
                                    </div>
                                    <div id="status_password_strength" class="float-end" style="font-size:10pt;margin-top:-30px">-</div>
                                    <div class="me-4 d-lg-inline d-block">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" height="10pt">
                                            <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                            <path id="icon_big_letter" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 48c110.5 0 200 89.5 200 200 0 110.5-89.5 200-200 200-110.5 0-200-89.5-200-200 0-110.5 89.5-200 200-200m140.2 130.3l-22.5-22.7c-4.7-4.7-12.3-4.7-17-.1L215.3 303.7l-59.8-60.3c-4.7-4.7-12.3-4.7-17-.1l-22.7 22.5c-4.7 4.7-4.7 12.3-.1 17l90.8 91.5c4.7 4.7 12.3 4.7 17 .1l172.6-171.2c4.7-4.7 4.7-12.3 .1-17z"/>
                                        </svg>
                                        <span id="text_big_letter" style="font-size:10pt">
                                            Huruf Besar
                                        </span>
                                    </div>
                                    <div class="me-4 d-lg-inline d-block">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" height="10pt">
                                            <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                            <path id="icon_number" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 48c110.5 0 200 89.5 200 200 0 110.5-89.5 200-200 200-110.5 0-200-89.5-200-200 0-110.5 89.5-200 200-200m140.2 130.3l-22.5-22.7c-4.7-4.7-12.3-4.7-17-.1L215.3 303.7l-59.8-60.3c-4.7-4.7-12.3-4.7-17-.1l-22.7 22.5c-4.7 4.7-4.7 12.3-.1 17l90.8 91.5c4.7 4.7 12.3 4.7 17 .1l172.6-171.2c4.7-4.7 4.7-12.3 .1-17z"/>
                                        </svg>
                                        <span id="text_number" style="font-size:10pt">
                                            Mengandung Angka
                                        </span>
                                    </div>
                                    <div class="me-4 d-lg-inline d-block">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" height="10pt">
                                            <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                            <path id="icon_lower_letter" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 48c110.5 0 200 89.5 200 200 0 110.5-89.5 200-200 200-110.5 0-200-89.5-200-200 0-110.5 89.5-200 200-200m140.2 130.3l-22.5-22.7c-4.7-4.7-12.3-4.7-17-.1L215.3 303.7l-59.8-60.3c-4.7-4.7-12.3-4.7-17-.1l-22.7 22.5c-4.7 4.7-4.7 12.3-.1 17l90.8 91.5c4.7 4.7 12.3 4.7 17 .1l172.6-171.2c4.7-4.7 4.7-12.3 .1-17z"/>
                                        </svg>
                                        <span id="text_lower_letter" style="font-size:10pt">
                                            Huruf Kecil
                                        </span>
                                    </div>
                                    <div class="me-4 d-lg-inline d-block">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" height="10pt">
                                            <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                            <path id="icon_length_8" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 48c110.5 0 200 89.5 200 200 0 110.5-89.5 200-200 200-110.5 0-200-89.5-200-200 0-110.5 89.5-200 200-200m140.2 130.3l-22.5-22.7c-4.7-4.7-12.3-4.7-17-.1L215.3 303.7l-59.8-60.3c-4.7-4.7-12.3-4.7-17-.1l-22.7 22.5c-4.7 4.7-4.7 12.3-.1 17l90.8 91.5c4.7 4.7 12.3 4.7 17 .1l172.6-171.2c4.7-4.7 4.7-12.3 .1-17z"/>
                                        </svg>
                                        <span id="text_length_8" style="font-size:10pt">
                                            Min 8 Karakter
                                        </span>
                                    </div>
                                    <script>
                                        let opsi_password_filled = false;
                                        let opsi_can_submit = false;
                                        function containsDigit(str) {
                                            return /\d/.test(str);
                                        }
                                        function containsUpperCase(str) {
                                            return /[A-Z]/.test(str);
                                        }

                                        function containsUpperCase(str) {
                                            return /[A-Z]/.test(str);
                                        }

                                        function containsLowerCase(str) {
                                            return /[a-z]/.test(str);
                                        }

                                        function containsSpecialSymbols(str) {
                                            // Cek apakah string mengandung karakter simbol khusus
                                            return /[!@#$%^&*(),.?":{}|<>]/.test(str);
                                        }

                                        function Password_Checked(element){
                                            let opsi_number = 0;
                                            if (element.value == ""){
                                                opsi_password_filled = false;
                                            } else {
                                                opsi_password_filled = true;
                                            }
                                            
                                            if (containsUpperCase(element.value)){
                                                icon_big_letter.style.fill = "green";
                                                text_big_letter.style.color = "green";
                                                text_big_letter.style.fontWeight = "bold";
                                                opsi_number+=1;
                                            } else {
                                                icon_big_letter.style.fill = "black";
                                                text_big_letter.style.color = "black";
                                                text_big_letter.style.fontWeight = "initial";
                                            }

                                            if (containsLowerCase(element.value)){
                                                icon_lower_letter.style.fill = "green";
                                                text_lower_letter.style.color = "green";
                                                text_lower_letter.style.fontWeight = "bold";
                                                opsi_number+=1;
                                            } else {
                                                icon_lower_letter.style.fill = "black";
                                                text_lower_letter.style.color = "black";
                                                text_lower_letter.style.fontWeight = "initial";
                                            }

                                            if (containsDigit(element.value)){
                                                icon_number.style.fill = "green";
                                                text_number.style.color = "green";
                                                text_number.style.fontWeight = "bold";
                                                opsi_number+=1;
                                            } else {
                                                icon_number.style.fill = "black";
                                                text_number.style.color = "black";
                                                text_number.style.fontWeight = "initial";
                                            }

                                            if ((element.value+"").length >= 8){
                                                icon_length_8.style.fill = "green";
                                                text_length_8.style.color = "green";
                                                text_length_8.style.fontWeight = "bold";
                                                opsi_number+=1;
                                            } else {
                                                icon_length_8.style.fill = "black";
                                                text_length_8.style.color = "black";
                                                text_length_8.style.fontWeight = "initial";
                                            }

                                            if (opsi_number==4){
                                                progress1.style.background = "orange";
                                                progress2.style.background = "silver";
                                                status_password_strength.innerHTML = "Lemah"
                                                if (containsSpecialSymbols(element.value)){
                                                    progress1.style.background = "green";
                                                    progress2.style.background = "green";
                                                    status_password_strength.innerHTML = "Kuat"
                                                } 
                                                opsi_can_submit = true;
                                            } 
                                            else {
                                                progress1.style.background = "silver";
                                                progress2.style.background = "silver";
                                                status_password_strength.innerHTML = "-"
                                            }
                                        }
                                    </script>
                                </div>
                                <div class="col-12 px-3">
                                    <label for="password2" style="font-size:10pt">Konfirmasi Password</label>
                                    <x-text-input id="password2" class="form-control pe-5" placeholder="Masukkan Konfirmasi Password" 
                                        type="password"
                                        name="password_confirmation" required autocomplete="new-password" />
                                    <button id="button_eye2_slash" type="button" class="btn btn-light border float-end" style="margin-top: -36px;margin-right:3px" onclick="button_eye2.hidden=false;password2.type='password'">
                                        <i class="fa fa-eye-slash"></i>
                                    </button>
                                    <button id="button_eye2" type="button" class="btn btn-light border float-end" style="margin-top: -36px;margin-right:3px" onclick="this.hidden=true;password2.type='text'">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                    <div class="mb-3 text-danger" style="font-size: 10pt;" id="pesan_kpassword">
                                        <x-input-error :messages="$errors->get('password_confirmation')" style="list-style-type: none;margin:0;padding:0;" />
                                    </div>
                                </div>
                                <div class="col-12 px-3 mb-2">
                                    <button class="btn btn-primary form-control">
                                        Register
                                    </button>
                                </div>
                                <div class="col-12 text-center mb-3">
                                    <div class="col-12 px-3">
                                        <a href="{{ url('auth/google') }}" class="btn btn-light border w-100">
                                            <img src="https://cdn-icons-png.flaticon.com/256/720/720255.png" height="25px" alt="" class="border rounded-circle"> Google
                                        </a>
                                    </div>
                                </div>
                                <div class="col-12 text-center" style="font-size: 10pt;height:15px;">
                                    Sudah punya akun ? 
                                    <a href="/login">Login</a>
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
                        {{-- </x-guest-layout> --}}
                    </div>
                    <div class="col-12 col-md-2 col-lg-2"></div>
                    <div class="col-12 pb-5"></div>
                </div>
            </div>
        </div>
    </div>
    {{-- Tampilan Desktop dan Mobile --}}
@endsection
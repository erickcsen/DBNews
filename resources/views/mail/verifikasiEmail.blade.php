<?php $title_page = "Login" ?>
@extends("mail.container.main")
@section("container")
    <table width="100%">
        <tr>
            <td class="bgcolor4a25a9" style="padding:10px;border-radius:5px;text-align:center">
                <img src="https://news.dbklik.co.id/images/logo_dbnews.png" alt="" height="30">
            </td>
        </tr>
        <tr>
            <td>
                <center>
                    <b>Verifikasi Email Anda</b>
                </center>
            </td>
        </tr>
        <tr>
            <td>
                <center>
                    <div style="height: 10px"></div>
                </center>
            </td>
        </tr>
        <tr>
            <td>
                <center>
                    <span>Kirim kode konfirmasi dibawah ini.</span>
                </center>
            </td>
        </tr>
        <tr>
            <td>
                <center>
                    <div style="height: 10px"></div>
                </center>
            </td>
        </tr>
        <tr>
            <td>
                <center>
                    <b style="font-size: 18pt">
                        {{$kode_verification}}
                    </b>
                </center>
            </td>
        </tr>
        <tr>
            <td>
                <center>
                    <div style="height: 10px"></div>
                </center>
            </td>
        </tr>
        <tr>
            <td>
                <center>
                    <span style="font-size:10pt">
                        Harap kirim kode konfirmasi sebelum 30 menit
                    </span>
                </center>
            </td>
        </tr>
    </table>
@endsection
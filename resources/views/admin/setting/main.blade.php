@if(auth()->check())
@extends('admin.layouts.main')
@section('content')
    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">    
                <div>
                    <h2 class="text-white pb-2 fw-bold">Setting Account</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- Card -->
    <div class="page-inner mt--">
        @include('sweetalert::alert')
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="card card-stats card-primary card-round">
                    <div class="card-body">
                        <p class="text-white">Username: {{ auth()->user()->name }}</p>
                        <p class="text-white">Email: {{ auth()->user()->email }}</p>
                        <a href="{{ route('setting.edit', auth()->user()->id) }}" class="btn btn-danger btn-sm">Edit User Information</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@endif

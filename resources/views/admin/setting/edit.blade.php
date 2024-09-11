@extends('admin.layouts.main')

@section('content')
<div class="page-inner">
    <div class="row">
        <div class="col-md-12">
            <div class="card full-height">
                <div class="card-header">
                    <div class="card-head-row">
                        <div class="card-title">
                            Edit User Information
                        </div>
                        <a href="{{ route('setting.index') }}" class="btn btn-primary btn-sm ml-auto">Back</a>
                    </div>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('setting.update', $setting->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Username</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name', $setting->name) }}" placeholder="Username">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" value="{{ old('email', $setting->email) }}" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label for="password">Password (leave blank to keep current)</label>
                            <input type="password" class="form-control" name="password" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">Confirm Password</label>
                            <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password">
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('admin.layouts.main')
@section('content')

<div class="page-inner">
    <div class="row">
        <div class="col-md-12">
            <div class="card full-height">
                <div class="card-header">
                    <div class="card-head-row">
                        <div class="card-title">sport Data</div>
                        <a href="{{ route('sport.index') }}" class="btn btn-primary btn-sm ml-auto">Back</a>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('sport.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="first_team">First Team</label>
                                <input type="text" class="form-control" name="first_team" placeholder="first team..">
                            </div>
                            <div class="form-group">
                                <label for="second_team">Second Team</label>
                                <input type="text" class="form-control" name="second_team" placeholder="second team..">
                            </div>
                            <div class="form-group">
                                <label for="date">Datetime</label>
                                <input type="datetime-local" class="form-control" name="date">
                            </div>
                            <div class="form-group">
                                <label for="first_img">First Team Image</label>
                                <input type="file" class="form-control" name="first_img">
                            </div>
                            <div class="form-group">
                                <label for="second_img">Second Team Image</label>
                                <input type="file" class="form-control" name="second_img">
                            </div>

                            <div class="form-group">
                                <button class="btn btn-primary btn-sm" type="submit">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@extends('admin.layouts.main')
@section('content')
<div class="page-inner">
    <div class="row">
        <div class="col-md-12">
            <div class="card full-height">
                <div class="card-header">
                    <div class="card-head-row">
                        <div class="card-title">
                            Edit sport
                        </div>
                        <a href="{{route('sport.index')}}" class="btn btn-primary btn-sm ml-auto">Back</a>
                    </div>
                </div>
    
                <div class="card-body">
                    <form method="post" action="{{ route('sport.update', $sports->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="first_team">First Team</label>
                            <input type="text" class="form-control" name="first_team" value="{{ old('first_team', $sports->first_team) }}" placeholder="first team..">
                        </div>
                        <div class="form-group">
                            <label for="second_team">Second Team</label>
                            <input type="text" class="form-control" name="second_team" value="{{ old('second_team', $sports->second_team) }}" placeholder="second team..">
                        </div>
                        <div class="form-group">
                            <label for="date">date</label>
                            <input type="date" class="form-control" name="date" value="{{ old('date', $sports->date) }}">
                        </div>
                        <div class="form-group">
                            <label for="first_img">First Team</label>
                            <input type="file" class="form-control" name="first_img">
                            @if ($sports->first_img)
                                <img src="{{ asset('storage/images/sport/' . basename($sports->first_img)) }}" alt="sport Image" width="100" class="mt-2">
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="second_img">Second Team</label>
                            <input type="file" class="form-control" name="second_img">
                            @if ($sports->second_img)
                                <img src="{{ asset('storage/images/sport/' . basename($sports->second_img)) }}" alt="sport Image" width="100" class="mt-2">
                            @endif
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary btn-sm" type="submit">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

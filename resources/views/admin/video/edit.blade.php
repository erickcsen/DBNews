@extends('admin.layouts.main')
@section('content')
<div class="page-inner">
    <div class="row">
        <div class="col-md-12">
            <div class="card full-height">
                <div class="card-header">
                    <div class="card-head-row">
                        <div class="card-title">
                            Edit Video
                        </div>
                        <a href="{{route('video.index')}}" class="btn btn-primary btn-sm ml-auto">Back</a>
                    </div>
                </div>
    
                <div class="card-body">
                    <form method="post" action="{{ route('video.update', $video->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="title">video Title</label>
                            <input type="text" class="form-control" name="title" value="{{ old('title', $video->title) }}" placeholder="video title..">
                        </div>
                        <div class="form-group">
                            <label for="link">video link</label>
                            <input type="text" class="form-control" name="link" value="{{ old('link', $video->link) }}" placeholder="video link..">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" name="description" placeholder="video description...">{{ old('description', $video->description) }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="category_id">Category</label>
                            <select class="form-control" name="category_id">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ $category->id == $video->category_id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group d-none">
                            <label for="is_active">Status</label>
                            <select class="form-control" name="is_active">
                                <option value="publish" {{ $video->is_active == 'publish' ? 'selected' : '' }}>Publish</option>
                                <option value="draft" {{ $video->is_active == 'draft' ? 'selected' : '' }}>Draft</option>
                            </select>
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

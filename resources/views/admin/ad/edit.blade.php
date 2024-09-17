@extends('admin.layouts.main')
@section('content')
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card full-height">
                    <div class="card-header">
                        <div class="card-head-row">
                            <div class="card-title">
                                AD Data
                            </div>
                            <a href="{{ route('ad.index') }}" class="btn btn-primary btn-sm ml-auto">Back</a>
                        </div>
                        <div class="card-body">
                            <form method="post" action="{{ route('ad.update', $ad->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="title">AD Title</label>
                                    <input type="text" class="form-control" value="{{ old('title', $ad->title) }}"
                                        name="title" placeholder="ad..">
                                </div>
                                <div class="form-group">
                                    <label for="link">Link</label>
                                    <input type="text" class="form-control" name="link"
                                        value="{{ old('link', $ad->link) }}" placeholder="link..">
                                </div>
                                <div class="form-group">
                                    <label for="position">AD Position</label>
                                    <select class="form-control" name="position" hidden>
                                        <option value="side" {{ $ad->position == 'side' ? 'selected' : '' }}>Side</option>
                                        <option value="bottom" {{ $ad->position == 'bottom' ? 'selected' : '' }}>Bottom
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="is_active">status</label>
                                    <select class="form-control" name="is_active">
                                        <option value="publish" {{ $ad->is_active == 'publish' ? 'selected' : '' }}>Publish
                                        </option>
                                        <option value="draft" {{ $ad->is_active == 'draft' ? 'selected' : '' }}>Draft
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="ad_img">Image</label>
                                    <input type="file" class="form-control" name="ad_img">
                                    @if ($ad->ad_img)
                                        <img src="{{ asset('storage/images/ad/' . basename($ad->ad_img)) }}" alt="ad Image"
                                            width="100" class="mt-2">
                                    @endif
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

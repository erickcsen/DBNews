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
                            <label for="title">Video Title</label>
                            <input type="text" class="form-control" name="title" value="{{ old('title', $video->title) }}" placeholder="video title..">
                        </div>
                        <div class="form-group">
                            <label for="link">Video link</label>
                            <input type="text" class="form-control" name="link" value="{{ old('link', $video->link) }}" placeholder="video link..">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="txtarea" name="description" placeholder="video description...">{{ old('description', $video->description) }}</textarea>
                        </div>
                        <div class="form-group">
                            <div class="col-12 p-0">
                                <label for="kata_kunci_meta">Kata Kunci Meta (Tags)</label>
                                <input name="kata_kunci_meta" id="kata_kunci_meta" onkeyup="tags_event(this)"
                                    class="form-control" placeholder="Masukkan Kata Kunci" value="{{$video->kata_kunci_meta}}"
                                    style="resize: none" />
                                <script>
                                    window.addEventListener('load', function() {
                                        tags_event(kata_kunci_meta)
                                    });
                                </script>
                            </div>
                            <div id="tags" class="col-12 p-0 pt-3 text-capitalize">
                                <div class="d-none">
                                    <div class="d-inline">
                                        <div class="d-inline rounded-start px-2 py-1 fw-bold text-white"
                                            style="background: gray; width:fit-content;">
                                            Home
                                        </div>
                                        <div class="d-inline">
                                            <svg width="23" height="31" xmlns="http://www.w3.org/2000/svg"
                                                style="margin-top: -3.3px;margin-left:-1.5px">
                                                <!-- Menggambar segitiga sama kaki dengan rotasi 30 derajat -->
                                                <polygon points="15.5,10 30,30 1,30" fill="gray"
                                                    transform="rotate(90, 15.5, 15.5)" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="d-inline" style="margin-left:-20px;">
                                        <div class="d-inline rounded-start px-2 py-1 fw-bold text-white"
                                            style="background: gray; width:fit-content;">
                                            Home
                                        </div>
                                        <div class="d-inline">
                                            <svg width="23" height="31" xmlns="http://www.w3.org/2000/svg"
                                                style="margin-top: -3.3px;margin-left:-1.5px">
                                                <!-- Menggambar segitiga sama kaki dengan rotasi 30 derajat -->
                                                <polygon points="15.5,10 30,30 1,30" fill="gray"
                                                    transform="rotate(90, 15.5, 15.5)" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <script>
                                function tags_event(e) {
                                    let txt = e.value;
                                    let arry_txt = txt.split("#");
                                    arry_txt = (arry_txt.length == 0)?txt.split(","):arry_txt;
                                    tags.innerHTML = '';
                                    for (let i = 0; i < arry_txt.length; i++) {
                                        const txt = arry_txt[i];
                                        tags.innerHTML += (txt != "") ? `
                                        <div class="d-inline-block mb-2 me-0 ms-0">
                                            <div class="d-inline rounded px-2 py-1 fw-bold text-white" style="background: gray; width:fit-content;">
                                                ` + txt + `
                                            </div>
                                        </div>
                                    ` : "";
                                    }
                                }
                            </script>
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

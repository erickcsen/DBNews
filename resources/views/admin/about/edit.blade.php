@extends('admin.layouts.main')
@section('content')

<div class="page-inner">
	<div class="row">
		<div class="col-md-12">
			<div class="card full-height">
				<div class="card-header">
					<div class="card-head-row">
						<div class="card-title">
							About Data
						</div>
						<a href="{{route('about.index')}}" class="btn btn-primary btn-sm ml-auto">Back</a>
					</div>
					<div class="card-body">
                        <form method="post" action="{{route('about.update', $abt->id)}}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="form-group col-12">
                                    <label for="title">Nama Perusahaan</label>
                                    <input type="text" class="form-control" value="{{ old('title', $abt->title) }}"  name="title" placeholder="About">
                                </div>
                                <div class="form-group col-6">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" class="form-control" value="{{ old('alamat', $abt->alamat) }}"  name="alamat" placeholder="Alamat">
                                </div>
                                <div class="form-group col-6">
                                    <label for="telepon">Telepon</label>
                                    <input type="text" class="form-control" value="{{ old('telepon', $abt->telepon) }}"  name="telepon" placeholder="Telepon">
                                </div>
                            </div>
                            <div class="row d-none">
                                <div class="form-group col-3">
                                    <label for="audience">Audience</label>
                                    <input type="text" class="form-control" value="{{ old('audience', $abt->audience) }}"  name="audience" placeholder="Audience">
                                </div>
                                <div class="form-group col-3">
                                    <label for="reader">Reader</label>
                                    <input type="text" class="form-control" value="{{ old('reader', $abt->reader) }}"  name="reader" placeholder="Reader">
                                </div>
                                <div class="form-group col-3">
                                    <label for="top_article">Top Article</label>
                                    <input type="text" class="form-control" value="{{ old('top_article', $abt->top_article) }}"  name="top_article" placeholder="op Article">
                                </div>
                                <div class="form-group col-3">
                                    <label for="visitor">Visitor</label>
                                    <input type="text" class="form-control" value="{{ old('visitor', $abt->visitor) }}"  name="visitor" placeholder="visitor">
                                </div>
                            </div>

                                <div class="row">
                                    <div class="form-group col-3">
                                        <label for="instagram">Instagram</label>
                                        <input type="text" class="form-control" value="{{ old('instagram', $abt->instagram) }}"  name="instagram" placeholder="Instagram">
                                    </div>
                                    <div class="form-group col-3">
                                        <label for="facebook">Facebook</label>
                                        <input type="text" class="form-control" value="{{ old('facebook', $abt->facebook) }}"  name="facebook" placeholder="Facebook">
                                    </div>
                                    <div class="form-group col-3">
                                        <label for="tiktok">Tiktok</label>
                                        <input type="text" class="form-control" value="{{ old('tiktok', $abt->tiktok) }}"  name="tiktok" placeholder="Tiktok">
                                    </div>
                                    <div class="form-group col-3">
                                        <label for="x">X</label>
                                        <input type="text" class="form-control" value="{{ old('x', $abt->x) }}"  name="x" placeholder="C">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" id="txtarea" name="description" placeholder="Description">{{ old('description', $abt->description) }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="commitment">Commitment</label>
                                    <textarea class="form-control" name="commitment" placeholder="Commitment">{{ old('commitment', $abt->commitment) }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="about_img">Image</label>
                                    <input type="file" class="form-control" name="about_img">
                                    @if ($abt->about_img)
                                        <img src="{{ asset('storage/images/about/' . basename($abt->about_img)) }}" alt="About Image" width="100" class="mt-2">
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
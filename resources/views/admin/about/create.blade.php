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
                        <form method="post" action="{{route('about.store')}}" enctype="multipart/form-data">
                            @csrf
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label for="title">Nama Perusahaan</label>
                                        <input type="text" class="form-control" name="title" placeholder="Nama Perusahaan">
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="alamat">Alamat</label>
                                        <input type="text" class="form-control" name="alamat" placeholder="Alamat Perusahaan">
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="telepon">Telepon</label>
                                        <input type="tel" class="form-control" name="telepon" placeholder="Telepon"  pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}">
                                    </div>
                                </div>
                                <div class="row d-none">
                                    <div class="form-group col-3">
                                        <label for="audience">Audience</label>
                                        <input type="text" class="form-control" name="audience" placeholder="Audience" value="0">
                                    </div>
                                    <div class="form-group col-3">
                                        <label for="reader">Reader</label>
                                        <input type="text" class="form-control" name="reader" placeholder="Reader" value="0">
                                    </div>
                                    <div class="form-group col-3">
                                        <label for="top_article">Top Article</label>
                                        <input type="text" class="form-control" name="top_article" placeholder="Top Article">
                                    </div>
                                    <div class="form-group col-3">
                                        <label for="visitor">Visitor</label>
                                        <input type="text" class="form-control" name="visitor" placeholder="Visitor">
                                    </div>
                                </div>

                            <div class="row">
                                <div class="form-group col-3">
                                    <label for="instagram">Instagram</label>
                                    <input type="text" class="form-control" name="instagram" placeholder="Instagram">
                                </div>
                                <div class="form-group col-3">
                                    <label for="facebook">Facebook</label>
                                    <input type="text" class="form-control" name="facebook" placeholder="Facebook">
                                </div>
                                <div class="form-group col-3">
                                    <label for="tiktok">Tiktok</label>
                                    <input type="text" class="form-control" name="tiktok" placeholder="Tiktok">
                                </div>
                                <div class="form-group col-3">
                                    <label for="x">X</label>
                                    <input type="text" class="form-control" name="x" placeholder="X">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" name="description" id="txtarea" placeholder="Description"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="commitment">Commitment</label>
                                <textarea class="form-control" name="commitment" placeholder="Commitment"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="name">Image</label>
                                <input type="file" class="form-control" name="about_img" >
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
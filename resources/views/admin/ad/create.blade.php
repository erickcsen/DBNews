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
						<a href="{{route('ad.index')}}" class="btn btn-primary btn-sm ml-auto">Back</a>
					</div>
					<div class="card-body">
                        <form method="post" action="{{route('ad.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="title">AD Title</label>
                                <input type="text" class="form-control" name="title" placeholder="ad..">
                            </div>
                            <div class="form-group">
                                <label for="link">Link</label>
                                <input type="text" class="form-control" name="link" placeholder="link..">
                            </div>
                            <div class="form-group">
                                <label for="position">AD Position</label>
                                <select class="form-control" name="position">
                                    <option value="side">side</option>
                                    <option value="bottom">bottom</option>
                                </select>
                            </div>
                            <div class="form-group d-none">
                                <label for="is_active">status</label>
                                    <select class="form-control" name="is_active">
                                        <option value="publish">publish</option>
                                        <option value="draft">draft</option>
                                    </select>
                            </div>
                            <div class="form-group">
                                <label for="name">Image</label>
                                <input type="file" class="form-control" name="ad_img" >
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
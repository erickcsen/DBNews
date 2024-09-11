@extends('admin.layouts.main')
@section('content')

<div class="page-inner">
	<div class="row">
		<div class="col-md-12">
			<div class="card full-height">
				<div class="card-header">
					<div class="card-head-row">
						<div class="card-title">
							Video Data
						</div>
						<a href="{{route('video.index')}}" class="btn btn-primary btn-sm ml-auto">Back</a>
					</div>
					<div class="card-body">
                        <form method="post" action="{{route('video.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="title">video Title</label>
                                <input type="text" class="form-control" name="title" placeholder="video..">
                            </div>
                            <div class="form-group">
                                <label for="link">link</label>
                                <input type="text" class="form-control" name="link" placeholder="link video..">
                            </div>
                            <div class="form-group">
                                <label for="name">Description</label>
                                <textarea class="form-control" name="description" placeholder="video description..."></textarea>
                            </div>
                            <div class="form-group row">
                                <div class="col-6">
                                    <label for="category_id">Category Name</label>
                                    <select class="form-control" name="category_id">
                                        @foreach ($cat as $c)
                                        <option value="{{$c->id}}">{{$c->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-6 d-none">
                                    <label for="is_active">status</label>
                                    <select class="form-control" name="is_active">
                                        <option value="publish">publish</option>
                                        <option value="draft">draft</option>
                                    </select>
                                </div>
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
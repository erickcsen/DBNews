@extends('admin.layouts.main')
@section('content')
<div class="page-inner">
	<div class="row">
		<div class="col-md-12">
			<div class="card full-height">
				<div class="card-header">
					<div class="card-head-row">
						<div class="card-title">
							Update Category
						</div>
						<a href="{{route('category.index')}}" class="btn btn-primary btn-sm ml-auto">Back</a>
					</div>
	
					<div class="card-body">
                        <form method="post" action="{{route('category.update', $cat->id)}}">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name">Category Name</label>
                                <input type="text" class="form-control" name="name" id="name" value="{{$cat->name}}">
                            </div>
							<div class="form-group d-none">
								<label for="is_active">Status</label>
								<select class="form-control" name="is_active">
									<option value="publish" {{ $cat->is_active == 'publish' ? 'selected' : '' }}>Publish</option>
									<option value="draft" {{ $cat->is_active == 'draft' ? 'selected' : '' }}>Draft</option>
								</select>
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
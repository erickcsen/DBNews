@extends('admin.layouts.main')
@section('content')

<div class="page-inner">
	<div class="row">
		<div class="col-md-12">
			<div class="card full-height">
				<div class="card-header">
					<div class="card-head-row">
						<div class="card-title">
							Add Category
						</div>
						<a href="{{route('category.index')}}" class="btn btn-primary btn-sm ml-auto">Back</a>
					</div>
					<div class="card-body">
                        <form method="post" action="{{route('category.store')}}">
                            @csrf
                            <div class="form-group">
                                <label for="name">Category Name</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="name category">
                            </div>
							<div class="form-group d-none">
								<label for="is_active">status</label>
                                    <select class="form-control" name="is_active">
                                        <option value="publish">publish</option>
                                        <option value="draft">draft</option>
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
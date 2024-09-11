@extends('admin.layouts.main')
@section('content')
<div class="page-inner">
	<div class="row">
		<div class="col-md-12">
			<div class="card full-height">
				<div class="card-header">
					<div class="card-head-row">
						<div class="card-title">
							Update Sub Category
						</div>
						<a href="{{route('subcategory.index')}}" class="btn btn-primary btn-sm ml-auto">Back</a>
					</div>
	
					<div class="card-body">
                        <form method="post" action="{{route('subcategory.update', $scat->id)}}">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name">Sub Category Name</label>
                                <input type="text" class="form-control" name="name" id="name" value="{{$scat->name}}">
                            </div>
							<div class="form-group">
                                <label for="category_id">Category</label>
                                <select class="form-control" name="category_id">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ $category->id == $scat->category_id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
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
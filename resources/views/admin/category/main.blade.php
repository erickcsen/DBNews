@extends('admin.layouts.main')

@section('content')
<div class="page-inner">
	<div class="row">
		<div class="col-md-12">
			<div class="card full-height">
				<div class="card-header">
					<div class="card-head-row">
						<div class="card-title">
							Data Category
						</div>
						<a href="{{route('category.create')}}" class="btn btn-primary btn-sm ml-auto">Add Category</a>
					</div>
					<!-- Form pencarian -->
					<form id="search-form" method="GET" action="{{ route('category.index') }}" class="mt-2">
						<div class="input-group">
							<input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
							<div class="input-group-append">
								<button class="btn btn-primary" type="submit">Search</button>
							</div>
						</div>
					</form>
					<div class="card-body">
						@include('sweetalert::alert')
						<div class="table-responsive">
							<table class="table table-head-bg-primary mt-4">
								<thead>
									<tr>
										<th scope="col">No</th>
										<th scope="col">Category</th>
										<th scope="col">Sub Category</th>
										<th scope="col">Slug</th>
										<th scope="col">Author</th>
										<th scope="col">Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($cats as $cat)
									<tr>
										<td >{{ $loop->iteration + ($cats->currentPage() - 1) * $cats->perPage() }}</td>
										<td class="text-uppercase">{{$cat->name}}</td>
										<td>
                                            <ul>
                                                @foreach ($cat->subcategories as $subcategory)
                                                    <li>{{ $subcategory->name }}</li>
                                                @endforeach
                                            </ul>
                                        </td>
										<td>{{$cat->slug}}</td>
										<td>{{$cat->user->name}}</td>
										<td>
											<a href="{{route('category.edit',$cat->id)}}" class="btn btn-warning btn-sm">Edit</a>
											<form action="{{ route('category.destroy', $cat->id) }}" method="POST" style="display:inline;" class="delete-form">
												@csrf
												@method('DELETE')
												<button type="button" class="btn btn-danger btn-sm btn-delete" >Delete</button>
											</form>
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>

							<!-- Pagination Links -->
                            <div class="pagination justify-content-center mt-4">
								{{ $cats->links('pagination::bootstrap-4') }}
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
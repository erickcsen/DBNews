@extends('admin.layouts.main')

@section('content')
<div class="page-inner">
	<div class="row">
		<div class="col-md-12">
			<div class="card full-height">
				<div class="card-header">
					<div class="card-head-row">
						<div class="card-title">
							Data Sub Category
						</div>
						<a href="{{route('subcategory.create')}}" class="btn btn-primary btn-sm ml-auto">Add Sub Category</a>
					</div>
				<!-- Form pencarian -->
				<form id="search-form" method="GET" action="{{ route('subcategory.index') }}" class="mt-2">
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
										<th scope="col">Sub Category</th>
										<th scope="col">Category</th>
										<th scope="col">Author</th>
										<th scope="col">Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($scats as $scat)
									<tr>
										<td >{{ $loop->iteration + ($scats->currentPage() - 1) * $scats->perPage() }}</td>
										<td>{{$scat->name}}</td>
                                        <td class="text-uppercase">{{$scat->category->name}}</td>
										<td>{{$scat->user->name}}</td>
										<td>
											<a href="{{route('subcategory.edit',$scat->id)}}" class="btn btn-warning btn-sm">Edit</a>
											<form action="{{ route('subcategory.destroy', $scat->id) }}" method="POST" style="display:inline;" class="delete-form">
												@csrf
												@method('DELETE')
												<button type="button" class="btn btn-danger btn-sm btn-delete">Delete</button>
											</form>
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>

							<!-- Pagination Links -->
                            <div class="pagination justify-content-center mt-4">
								{{ $scats->links('pagination::bootstrap-4') }}
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
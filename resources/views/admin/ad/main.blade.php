@extends('admin.layouts.main')
@section('content')
<div class="page-inner">
	<div class="row">
		<div class="col-md-12">
			<div class="card full-height">
				<div class="card-header">
					<div class="card-head-row">
						<div class="card-title">
							Data AD
						</div>
						<a href="{{route('ad.create')}}" class="btn btn-primary btn-sm ml-auto">Add Ad</a>
					</div>
					<!-- Form pencarian -->
				<form id="search-form" method="GET" action="{{ route('ad.index') }}" class="mt-2">
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
										<th scope="col">Title</th>
										<th scope="col">Position</th>
										<th scope="col">Link</th>
										<th scope="col">Image</th>
										<th scope="col">Author</th>
										<th scope="col">action</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($ads as $ad)
									<tr>
										<td >{{ $loop->iteration + ($ads->currentPage() - 1) * $ads->perPage() }}</td>
										<td>{{ Str::limit($ad->title, 20) }}</td>
										<td>{{$ad->position}}</td>
										<td>
											<a href="{{$ad->link}}" class="text-dark" target="_blank">{{$ad->link}}</a>
										</td>
										<td><img src="{{ asset('storage/images/ad/' . basename($ad->ad_img)) }}" alt="video Image" width="50"></td>
										<td>{{$ad->user->name}}</td>
										<td>
											<a href="{{route('ad.edit',$ad->id)}}" class="btn btn-warning btn-sm">Edit</a>
											<form action="{{ route('ad.destroy', $ad->id) }}" method="POST" style="display:inline;" class="delete-form">
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
								{{ $ads->links('pagination::bootstrap-4') }}
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
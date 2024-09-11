@extends('admin.layouts.main')
@section('content')
<div class="page-inner">
	<div class="row">
		<div class="col-md-12">
			<div class="card full-height">
				<div class="card-header">
					<div class="card-head-row">
						<div class="card-title">
							Data About
						</div>
						<a href="{{route('about.create')}}" class="btn btn-primary btn-sm ml-auto">Add About</a>
					</div>
					<!-- Form pencarian -->
					{{-- <form id="search-form" method="GET" action="{{ route('about.index') }}" class="mt-2">
						<div class="input-group">
							<input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
							<div class="input-group-append">
								<button class="btn btn-primary" type="submit">Search</button>
							</div>
						</div>
					</form> --}}
					<div class="card-body">
						@include('sweetalert::alert')
						<div class="table-responsive">
							<table class="table table-head-bg-primary mt-4">
								<thead>
									<tr>
										<th scope="col">No</th>
										<th scope="col">Title</th>
										<th scope="col">Image</th>
										<th scope="col">Description</th>
										<th scope="col">action</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($abts as $abt)
									<tr>
										<td >{{ $loop->iteration + ($abts->currentPage() - 1) * $abts->perPage() }}</td>
										<td>{{$abt->title}}</td>
										<td><img src="{{ asset('storage/images/about/' . basename($abt->about_img)) }}" alt="video Image" width="50"></td>
										<td>{{$abt->description}}</td>
										<td>
											<a href="{{route('about.edit',$abt->id)}}" class="btn btn-warning btn-sm">Edit</a>
											<form action="{{ route('about.destroy', $abt->id) }}" method="POST" style="display:inline;" class="delete-form">
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
								{{ $abts->links('pagination::bootstrap-4') }}
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
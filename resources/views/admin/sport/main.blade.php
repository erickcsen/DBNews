@extends('admin.layouts.main')
@section('content')
<div class="page-inner">
	<div class="row">
		<div class="col-md-12">
			<div class="card full-height">
				<div class="card-header">
					<div class="card-head-row">
						<div class="card-title">
							Data Sport
						</div>
						<a href="{{route('sport.create')}}" class="btn btn-primary btn-sm ml-auto">Add Sport</a>
					</div>
					<!-- Form pencarian -->
				<form id="search-form" method="GET" action="{{ route('sport.index') }}" class="mt-2">
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
										<th scope="col">First Team</th>
										<th scope="col">Second Team</th>
										<th scope="col">Date</th>
										<th scope="col">Time</th>
										<th scope="col">First Team</th>
										<th scope="col">Second Team</th>
										<th scope="col">Author</th>
										<th scope="col">action</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($sports as $sport)
									<tr>
										<td>{{ $loop->iteration + ($sports->currentPage() - 1) * $sports->perPage() }}</td>
										<td>{{$sport->first_team}}</td>
										<td>{{$sport->second_team}}</td>
										{{-- <td>{{ \Carbon\Carbon::parse($sport->date)->format('d-m-Y') }}</td> --}}
										<td>{{ \Carbon\Carbon::parse($sport->date)->timezone('Asia/Jakarta')->translatedFormat('d F Y') }}</td>
										<td>{{ \Carbon\Carbon::parse($sport->date)->timezone('Asia/Jakarta')->translatedFormat('H:i') }} WIB</td>
										<td><img src="{{ asset('storage/images/sport/' . basename($sport->first_img)) }}" alt="first team" width="50"></td>
										<td><img src="{{ asset('storage/images/sport/' . basename($sport->second_img)) }}" alt="second team" width="50"></td>
                                        <td>{{$sport->user->name}}</td>
										<td>
											<a href="{{route('sport.edit',$sport->id)}}" class="btn btn-warning btn-sm">Edit</a>
											<form action="{{ route('sport.destroy', $sport->id) }}" method="POST" style="display:inline;" class="delete-form">
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
								{{ $sports->links('pagination::bootstrap-4') }}
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
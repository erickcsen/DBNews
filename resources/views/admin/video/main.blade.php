@extends('admin.layouts.main')
@section('content')
<div class="page-inner">
	<div class="row">
		<div class="col-md-12">
			<div class="card full-height">
				<div class="card-header">
					<div class="card-head-row">
						<div class="card-title">
							Data video
						</div>
						<a href="{{route('video.create')}}" class="btn btn-primary btn-sm ml-auto">Add Video</a>
					</div>
					<!-- Form pencarian -->
				<form id="search-form" method="GET" action="{{ route('video.index') }}" class="mt-2">
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
										<th scope="col">Slug</th>
										{{-- <th scope="col">Description</th> --}}
										<th scope="col">Video</th>
										<th scope="col">Author</th>
										<th scope="col">Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($vids as $vid)
									<tr>
										<td>{{ $loop->iteration + ($vids->currentPage() - 1) * $vids->perPage() }}</td>
										<td>{{ Str::limit($vid->title, 30) }}</td>
										<td>{{ Str::limit($vid->slug, 30) }}</td>
										{{-- <td>{{$vid->description}}</td> --}}
										<td>
											<iframe class="d-none" width="220" height="80" src="{{$vid->link}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
											@php
												$link = substr($vid->link, strlen("https://youtu.be/"), strlen($vid->link));
												$link = substr($link, 0, strpos($link,"?"));
											@endphp
											<img src="https://img.youtube.com/vi/{{$link}}/hqdefault.jpg" width="100px" >
										</td>
										<td>{{$vid->user->name}}</td>
										<td>
											<a href="{{route('video.edit',$vid->id)}}" class="btn btn-warning btn-sm">Edit</a>
											<form action="{{ route('video.destroy', $vid->id) }}" method="POST" style="display:inline;" class="delete-form">
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
								{{ $vids->links('pagination::bootstrap-4') }}
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
@extends('admin.layouts.main')
@section('content')
<div class="page-inner">
	<div class="row">
		<div class="col-md-12">
			<div class="card full-height">
				<div class="card-header">
					<div class="card-head-row">
						<div class="card-title">
							Data Article
						</div>
						<a href="{{route('article.create')}}" class="btn btn-primary btn-sm ml-auto">Add Article</a>
					</div>
					<!-- Form pencarian -->
					<form id="search-form" method="GET" action="{{ route('article.index') }}" class="mt-2">
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
										<th scope="col">Article</th>
										<th scope="col">Category</th>
										<th scope="col">Sub Cat</th>
										<th class="d-none" scope="col">Author</th>
										<th scope="col">Image</th>
										<th scope="col">Views</th>
										<th scope="col">action</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($arts as $art)
									<tr>
										<td>{{ $loop->iteration + ($arts->currentPage() - 1) * $arts->perPage() }}</td>
										<td>{{$art->title}}</td>
										<td>{{$art->category->name}}</td>
										<td>{{ optional($art->subcategory)->name }}</td>
										<td class="d-none">{{$art->user->name}}</td>
										<td><img src="{{ asset('storage/images/article/' . basename($art->article_img)) }}" alt="Article Image" width="50"></td>
										<td><a href="/article/{{$art->id}}" class="btn btn-sm btn-light border">Lihat Kunjungan</a></td>
										<td>
											<a href="{{route('article.edit',$art->id)}}" class="btn btn-warning btn-sm">Edit</a>
											<form action="{{ route('article.destroy', $art->id) }}" method="POST" style="display:inline;" class="delete-form">
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
								{{ $arts->links('pagination::bootstrap-4') }}
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
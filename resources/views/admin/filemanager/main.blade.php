@extends('admin.layouts.main')
@section('content')
<div class="page-inner">
	<div class="row">
		<div class="col-md-12">
			<div class="card full-height">
				<div class="card-header">
					<div class="card-head-row">
						<div class="card-title">
							File Manager
						</div>
						<a href="{{route('filemanager.create')}}" class="btn btn-primary btn-sm ml-auto">Add Photos</a>
					</div>
					<!-- Form pencarian -->
					<form id="search-form" method="GET" action="{{ route('filemanager.index') }}" class="mt-2">
						<div class="input-group">
							<input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
							<div class="input-group-append">
								<button class="btn btn-primary" type="submit">Search</button>
							</div>
						</div>
					</form>
					<div class="card-body p-0 pt-2">
						@include('sweetalert::alert')
						<div class="row">
							@foreach ($data as $item)
								<div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 pe-0">
									<a href="{{route("filemanager.show", $item->id)}}" style="text-decoration:none;">
										<div class="col-12 border p-0">
											<div class="col-12 p-0 border-bottom-0">
												<img src="{{asset($item->path)}}" alt="{{$item->name}}" width="100%">
											</div>
											<div class="col-12">
												<span class="text-muted">
													@if (strlen($item->name) > 20)
														{{substr($item->name, 0, 20).'...'}} 
													@else
														{{$item->name}}
													@endif <br>
													<sup>
														{{$item->size_txt}}
													</sup>
												</span>
											</div>
										</div>
									</a>
								</div>
							@endforeach
						</div>
						<div class="pagination justify-content-center mt-4">
							{{ $data->links('pagination::bootstrap-4') }}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
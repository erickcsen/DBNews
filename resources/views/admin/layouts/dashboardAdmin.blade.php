

@if(auth()->check())
@extends('admin.layouts.main')
@section('content')
	<div class="panel-header bg-primary-gradient">
		<div class="page-inner py-5">
			<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">	
				<div>
					<h2 class="text-white pb-2 fw-bold">Dashboard DB News</h2>
				</div>
			</div>
		</div>
	</div>
	<!-- Card -->
	<div class="page-inner mt--">		
			<div class="row">
				<div class="col-sm-6 col-md-3 col-lg-4">
					<div class="card card-stats card-primary card-round">
						<div class="card-body">
							<div class="row">
								<div class="col-5">
									<div class="icon-big text-center">
										<i class="flaticon-users"></i>
									</div>
								</div>
								<div class="col-7 col-stats">
									<div class="numbers">
										<p class="card-category">User</p>
										<h4 class="card-title">{{$userCount}}</h4>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-md-3 col-lg-4">
					<div class="card card-stats card-info card-round">
						<div class="card-body">
							<div class="row">
								<div class="col-5">
									<div class="icon-big text-center">
										<i class="flaticon-interface-6"></i>
									</div>
								</div>
								<div class="col-7 col-stats">
									<div class="numbers">
										<p class="card-category">Article</p>
										<h4 class="card-title">{{$articleCount}}</h4>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-md-3 col-lg-4">
					<div class="card card-stats card-warning card-round">
						<div class="card-body">
							<div class="row">
								<div class="col-5">
									<div class="icon-big text-center">
										<i class="flaticon-price-tag"></i>
									</div>
								</div>
								<div class="col-7 col-stats">
									<div class="numbers">
										<p class="card-category">Sub Category</p>
										<h4 class="card-title">{{$scatCount}}</h4>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-md-3 col-lg-4">
					<div class="card card-stats card-success card-round">
						<div class="card-body ">
							<div class="row">
								<div class="col-5">
									<div class="icon-big text-center">
										<i class="flaticon-folder"></i>
									</div>
								</div>
								<div class="col-7 col-stats">
									<div class="numbers">
										<p class="card-category">Category</p>
										<h4 class="card-title">{{$categoryCount}}</h4>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-md-3 col-lg-4">
					<div class="card card-stats card-secondary card-round">
						<div class="card-body ">
							<div class="row">
								<div class="col-5">
									<div class="icon-big text-center">
										<i class="flaticon-youtube"></i>
									</div>
								</div>
								<div class="col-7 col-stats">
									<div class="numbers">
										<p class="card-category">Video</p>
										<h4 class="card-title">{{$videoCount}}</h4>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-md-3 col-lg-4">
					<div class="card card-stats card-danger card-round">
						<div class="card-body ">
							<div class="row">
								<div class="col-5">
									<div class="icon-big text-center">
										<i class="flaticon-web"></i>
									</div>
								</div>
								<div class="col-7 col-stats">
									<div class="numbers">
										<p class="card-category">Ad</p>
										<h4 class="card-title">{{$adCount}}</h4>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-md-3 col-lg-4">
					<div class="card card-stats card-info card-round">
						<div class="card-body ">
							<div class="row">
								<div class="col-5">
									<div class="icon-big text-center">
										<i class="flaticon-agenda"></i>
									</div>
								</div>
								<div class="col-7 col-stats">
									<div class="numbers">
										<p class="card-category">Sport</p>
										<h4 class="card-title">{{$sportCount}}</h4>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
	</div>
@endsection
		@endif
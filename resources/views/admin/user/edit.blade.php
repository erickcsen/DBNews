@extends('admin.layouts.main')
@section('content')
<div class="page-inner mt-5">
	<div class="row">
		<div class="col-md-12">
			<div class="card full-height">
				<div class="card-header">
					<div class="card-head-row">
						<div class="card-title">
							Edit Users
						</div>
						<a href="{{route('user.index')}}" class="btn btn-primary btn-sm ml-auto">Back</a>
					</div>
	
					<div class="card-body">
                        <form method="post" action="{{route('user.update', $use->id)}}">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name">username</label>
                                <input type="text" class="form-control" name="name" id="name" value="{{$use->name}}">
                            </div>
                            <div class="form-group">
                                <label for="role">Role</label>
                                <select class="form-control" name="role" id="role">
                                    <option value="0" {{ $use->role == 0 ? 'selected' : '' }}>User</option>
                                    <option value="1" {{ $use->role == 1 ? 'selected' : '' }}>Admin</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="email">email</label>
                                <input type="email" class="form-control" name="email" id="email" value="{{$use->email}}">
                            </div>
                            <div class="form-group">
                                <label for="name">password (leave blank to keep current)</label>
                                <input type="password" class="form-control" name="password" id="password">
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
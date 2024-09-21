@extends('admin.layouts.main')
@section('content')

<div class="page-inner">
	<div class="row">
		<div class="col-md-12">
			<div class="card full-height">
				<div class="card-header">
					<div class="card-head-row">
						<div class="card-title">
							About Data
						</div>
						<a href="{{route('about.index')}}" class="btn btn-primary btn-sm ml-auto">Back</a>
					</div>
					<div class="card-body">
                        <form method="post" action="{{route('about.update', $abt->id)}}">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" id="txtarea" name="description" placeholder="Description">{{ old('description', $abt->description) }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="commitment">Commitment</label>
                                <textarea class="form-control" name="commitment" placeholder="Commitment">{{ old('commitment', $abt->commitment) }}</textarea>
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
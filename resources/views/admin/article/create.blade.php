@extends('admin.layouts.main')
@section('content')

<div class="page-inner">
    <div class="row">
        <div class="col-md-12">
            <div class="card full-height">
                <div class="card-header">
                    <div class="card-head-row">
                        <div class="card-title">Article Data</div>
                        <a href="{{ route('article.index') }}" class="btn btn-primary btn-sm ml-auto">Back</a>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('article.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="title">Article Title</label>
                                <input type="text" class="form-control" name="title" placeholder="article..">
                            </div>
                            <div class="form-group">
                                <label for="name">Description</label>
                                <textarea class="form-control" id="txtarea" name="description" placeholder="Article description..."></textarea>
                            </div>
                            <div class="form-group row">
                                <div class="col-4">
                                    <label for="category_id">Category Name</label>
                                    <select class="form-control" name="category_id" id="category_id">
                                        @foreach ($category as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-4">
                                    <label for="subcategory_id">Subcategory</label>
                                    <select class="form-control" name="subcategory_id" id="subcategory_id">
                                        <option value="">None Subcategory</option>
                                        @foreach ($subcategory as $subcategory)
                                        <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-4 d-none">
                                    <label for="is_active">Status</label>
                                    <select class="form-control" name="is_active">
                                        <option value="publish">Publish</option>
                                        <option value="draft">Draft</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name">Image</label>
                                <input type="file" class="form-control" name="article_img">
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


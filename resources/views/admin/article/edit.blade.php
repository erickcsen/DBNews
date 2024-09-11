@extends('admin.layouts.main')
@section('content')
<div class="page-inner">
    <div class="row">
        <div class="col-md-12">
            <div class="card full-height">
                <div class="card-header">
                    <div class="card-head-row">
                        <div class="card-title">
                            Edit Article
                        </div>
                        <a href="{{route('article.index')}}" class="btn btn-primary btn-sm ml-auto">Back</a>
                    </div>
                </div>
    
                <div class="card-body">
                    <form method="post" action="{{ route('article.update', $article->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="title">Article Title</label>
                            <input type="text" class="form-control" name="title" value="{{ old('title', $article->title) }}" placeholder="Article title..">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="txtarea" name="description" placeholder="Article description...">{{ old('description', $article->description) }}</textarea>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="category_id">Category</label>
                                    <select class="form-control" name="category_id">
                                        @foreach ($category as $category)
                                        <option value="{{ $category->id }}" {{ $category->id == $article->category_id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="category_id">Sub Category</label>
                                    <select class="form-control" name="subcategory_id">
                                        <option value="">None Subcategory</option>
                                        @foreach ($subcategory as $category)
                                            <option value="{{ $category->id }}" {{ $category->id == $article->category_id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group d-none">
                            <label for="is_active">Status</label>
                            <select class="form-control" name="is_active">
                                <option value="publish" {{ $article->is_active == 'publish' ? 'selected' : '' }}>Publish</option>
                                <option value="draft" {{ $article->is_active == 'draft' ? 'selected' : '' }}>Draft</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="article_img">Image</label>
                            <input type="file" class="form-control" name="article_img">
                            @if ($article->article_img)
                                <img src="{{ asset('storage/images/article/' . basename($article->article_img)) }}" alt="Article Image" width="100" class="mt-2">
                            @endif
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary btn-sm" type="submit">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@extends('admin.layouts.main')
@section('content')
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12 p-0">
                <div class="card full-height">
                    <div class="card-header">
                        <div class="card-head-row">
                            <div class="card-title">Detail Gambar</div>
                            <a href="{{ route('filemanager.index') }}" class="btn btn-primary btn-sm ml-auto">Back</a>
                        </div>
                        <div class="card-body p-0">
                            <div class="col-12 border p-0">
                                <div class="col-12 p-0 border-bottom">
                                    <center>
                                        <img id="imageToCopy" src="{{asset(str_replace('public','storage',$data->path))}}" alt="{{$data->name}}" style="max-height:400px;max-width:100%">
                                    </center>
                                </div>
                                <div class="col-12">
                                    <span class="text-muted">
                                        @if (strlen($data->name) > 20)
                                            {{substr($data->name, 0, 20).'...'}} 
                                        @else
                                            {{$data->name}}
                                        @endif <br>
                                        <sup>
                                            {{$data->size_txt}}
                                        </sup>
                                    </span>
                                </div>
                            </div>
                            <div class="col-12 p-0 pt-3 text-center">
                                <form action="{{route("filemanager.destroy", $data->id)}}" method="POST" style="display:inline;" class="delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button id="copyButton" class="btn btn-danger">
                                        <i class="fa fa-trash"></i> | 
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('admin.layouts.main')
@section('content')
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card full-height">
                    <div class="card-header">
                        <div class="card-head-row">
                            <div class="card-title">
                                Detail View - Article
                            </div>
                        </div>
                        <div class="card-head-row">
                            Jumlah Orang : 
                            @if (count($arts) > 0)
                                {{$arts[0]->views}}
                            @endif
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @for ($i = 0; $i < count($views); $i++)
                                <div class="col-6 col-md-4 col-lg-3 p-0 px-1">
                                    <div class="col-12 border p-0 border rounded">
                                        <div class="text-center py-3">
                                            <i class="fa fa-user" style="font-size: 30px"></i> 
                                        </div>
                                        <div class="border-top text-center py-2">
                                            @if ($views[$i]->email != null)
                                                @foreach ($users as $user)
                                                    @if ($views[$i]->email==$user->email)
                                                        <b class="text-uppercase">
                                                            {{$user->name}} 
                                                        </b>
                                                        <br>
                                                        <span class="text-lowercase">
                                                            {{$user->email}} <br>
                                                        </span>
                                                        <span class="text-capitalize">
                                                            {{date_format($views[$i]->created_at,'d M Y')}} - 
                                                            {{date_format($views[$i]->created_at,'H:i')}} 
                                                        </span>
                                                    @endif
                                                @endforeach
                                            @else
                                                <b class="text-uppercase">
                                                    Anonymous 
                                                </b>
                                                <br>
                                                <span class="text-capitalize">
                                                    IP Address : {{$views[$i]->ip_address}}
                                                </span> <br>
                                                <span class="text-capitalize">
                                                    {{date_format($views[$i]->created_at,'d M Y')}} - 
                                                    {{date_format($views[$i]->created_at,'H:i')}} 
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endfor
                        </div>
                        <div class="row">
                            <!-- Pagination Links -->
                            <div class="pagination justify-content-center mt-4">
								{{ $views->links('pagination::bootstrap-4') }}
							</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
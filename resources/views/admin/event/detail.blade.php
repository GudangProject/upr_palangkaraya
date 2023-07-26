@section('title')
    {{ $data->judul }} -
@endsection
<x-master-layouts>
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">Detail Seminar</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item active"><a href="{{ route('prosiding.seminar') }}">Seminar</a>
                                    </li>
                                    <li class="breadcrumb-item active">Detail</a>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-header-right text-md-right col-md-5 col-12">

                </div>
            </div>
            <div class="content-body">
                <!-- Blog Detail -->
                <div class="blog-detail-wrapper">
                    <div class="row">
                        <!-- Blog -->
                        <div class="col-12">
                            <div class="card">
                                <img src="{{ $data->image ? asset('storage/pictures').'/event/4_3/mid/'.$data->image : asset('assets').'/images/banner/banner-12.jpg' }}" class="img-fluid card-img-top" alt="Blog Detail Pic" />
                                <div class="card-body">
                                    <h4 class="card-title">{!! $data->judul !!}</h4>
                                    <div class="media">
                                        <div class="avatar mr-50">
                                            <img src="{{ asset('storage/images/users').'/'.$data->getUser->profile_photo_path }}" alt="Avatar" width="24" height="24" />
                                        </div>
                                        <div class="media-body">
                                            <small class="text-muted mr-25">by</small>
                                            <small><a href="javascript:void(0);" class="text-body">{{ $data->getUser->name }}</a></small>
                                            <span class="text-muted ml-50 mr-25">|</span>
                                            <small class="text-muted">{{ \Carbon\Carbon::parse($data->created_at)->isoFormat('dddd, D MMMM Y | H:m') }}</small>
                                        </div>
                                    </div>
                                    <div class="my-1 py-25">
                                        <a href="#">
                                            @if ($data->type == 1)
                                                <span class="badge badge-light-success">nasional</span>
                                            @elseif($data->type == 2)
                                                <span class="badge badge-light-danger">internasional</span>
                                            @else
                                                <span class="badge badge-light-dark">lainnya</span>
                                            @endif
                                        </a>
                                    </div>
                                    <p class="card-text mb-2">
                                        {!! $data->keterangan !!}
                                    </p>

                                    <hr class="my-2" />
                                    {{-- <div class="d-flex justify-content-end">

                                        <div class="dropdown blog-detail-share">
                                            <i data-feather="share-2" class="font-medium-5 text-body cursor-pointer" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="javascript:void(0);" class="dropdown-item py-50 px-1">
                                                    <i data-feather="github" class="font-medium-3"></i>
                                                </a>
                                                <a href="javascript:void(0);" class="dropdown-item py-50 px-1">
                                                    <i data-feather="gitlab" class="font-medium-3"></i>
                                                </a>
                                                <a href="javascript:void(0);" class="dropdown-item py-50 px-1">
                                                    <i data-feather="facebook" class="font-medium-3"></i>
                                                </a>
                                                <a href="javascript:void(0);" class="dropdown-item py-50 px-1">
                                                    <i data-feather="twitter" class="font-medium-3"></i>
                                                </a>
                                                <a href="javascript:void(0);" class="dropdown-item py-50 px-1">
                                                    <i data-feather="linkedin" class="font-medium-3"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                        <!--/ Blog -->
                    </div>
                </div>
                <!--/ Blog Detail -->

            </div>
        </div>
    </div>
</x-master-layouts>

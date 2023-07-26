@extends('admin.users.profile.master')
@section('profile-page')
<section id="profile-info">
    <div class="row">
        <div class="col-lg-3 col-12 order-2 order-lg-1">
            <div class="card">
                <div class="card-body">
                    <h5 class="mb-75">About</h5>
                    <p class="card-text">
                        {!! auth()->user()->bio !!}
                    </p>
                    <div class="mt-2">
                        <h5 class="mb-75">Joined:</h5>
                        <p class="card-text">{{ \Carbon\Carbon::parse(auth()->user()->created_at)->format('l, d M Y') }}</p>
                    </div>
                    <div class="mt-2">
                        <h5 class="mb-75">Lives:</h5>
                        <p class="card-text">{{ auth()->user()->address }}</p>
                    </div>
                    <div class="mt-2">
                        <h5 class="mb-75">Email:</h5>
                        <p class="card-text">{{ auth()->user()->email }}</p>
                    </div>
                    <div class="mt-2">
                        <h5 class="mb-50">Gender:</h5>
                        <p class="card-text mb-0">{{ strtoupper(auth()->user()->gender)  }}</p>
                    </div>
                </div>
            </div>
        </div>

        @if (isset($post))
            <div class="col-lg-6 col-12 order-1 order-lg-2">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-start align-items-center mb-1">
                            <div class="profile-user-info">
                                <h3 class="mb-0">{{ \Illuminate\Support\Str::title($post->title) }}</h3>
                                <small class="text-muted">{{ $post->date }}</small>
                            </div>
                        </div>
                        <p class="card-text">
                            {!! $post->content !!}
                        </p>

                        <img class="img-fluid rounded mb-75" src="{{ asset(config('app.POST_MID')) }}/{{ $post->image }}" alt="avatar img" />

                        <div class="row d-flex justify-content-start align-items-center flex-wrap pb-50">
                            <div class="col-sm-6 d-flex justify-content-between justify-content-sm-start mb-2">
                                <a href="javascript:void(0)" class="d-flex align-items-center text-muted text-nowrap">
                                    <i data-feather="heart" class="profile-likes font-medium-3 mr-50"></i>
                                    <span>1.25k</span>
                                </a>

                                <div class="d-flex align-items-center">
                                    <div class="avatar-group ml-1">
                                        <div data-toggle="tooltip" data-popup="tooltip-custom" data-placement="bottom" data-original-title="Trina Lynes" class="avatar pull-up">
                                            <img src="{{ asset('assets') }}/images/portrait/small/avatar-s-1.jpg" alt="Avatar" height="26" width="26" />
                                        </div>
                                        <div data-toggle="tooltip" data-popup="tooltip-custom" data-placement="bottom" data-original-title="Lilian Nenez" class="avatar pull-up">
                                            <img src="{{ asset('assets') }}/images/portrait/small/avatar-s-2.jpg" alt="Avatar" height="26" width="26" />
                                        </div>
                                        <div data-toggle="tooltip" data-popup="tooltip-custom" data-placement="bottom" data-original-title="Alberto Glotzbach" class="avatar pull-up">
                                            <img src="{{ asset('assets') }}/images/portrait/small/avatar-s-3.jpg" alt="Avatar" height="26" width="26" />
                                        </div>
                                        <div data-toggle="tooltip" data-popup="tooltip-custom" data-placement="bottom" data-original-title="George Nordic" class="avatar pull-up">
                                            <img src="{{ asset('assets') }}/images/portrait/small/avatar-s-5.jpg" alt="Avatar" height="26" width="26" />
                                        </div>
                                        <div data-toggle="tooltip" data-popup="tooltip-custom" data-placement="bottom" data-original-title="Vinnie Mostowy" class="avatar pull-up">
                                            <img src="{{ asset('assets') }}/images/portrait/small/avatar-s-4.jpg" alt="Avatar" height="26" width="26" />
                                        </div>
                                    </div>
                                    <a href="javascript:void(0)" class="text-muted text-nowrap ml-50">+140 more</a>
                                </div>
                            </div>

                            <div class="col-sm-6 d-flex justify-content-between justify-content-sm-end align-items-center mb-2">
                                <a href="javascript:void(0)" class="text-nowrap">
                                    <i data-feather="message-square" class="text-body font-medium-3 mr-50"></i>
                                    <span class="text-muted mr-1">1.25k</span>
                                </a>

                                <a href="javascript:void(0)" class="text-nowrap">
                                    <i data-feather="share-2" class="text-body font-medium-3 mx-50"></i>
                                    <span class="text-muted">1.25k</span>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        @endif

        <div class="col-lg-3 col-12 order-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="mb-0">Latest Photos</h5>
                    <div class="row">
                        <div class="col-md-4 col-6 profile-latest-img">
                            <a href="javascript:void(0)">
                                <img src="{{ asset('assets') }}/images/profile/user-uploads/user-13.jpg" class="img-fluid rounded" alt="avatar img" />
                            </a>
                        </div>
                        <div class="col-md-4 col-6 profile-latest-img">
                            <a href="javascript:void(0)">
                                <img src="{{ asset('assets') }}/images/profile/user-uploads/user-02.jpg" class="img-fluid rounded" alt="avatar img" />
                            </a>
                        </div>
                        <div class="col-md-4 col-6 profile-latest-img">
                            <a href="javascript:void(0)">
                                <img src="{{ asset('assets') }}/images/profile/user-uploads/user-03.jpg" class="img-fluid rounded" alt="avatar img" />
                            </a>
                        </div>
                        <div class="col-md-4 col-6 profile-latest-img">
                            <a href="javascript:void(0)">
                                <img src="{{ asset('assets') }}/images/profile/user-uploads/user-04.jpg" class="img-fluid rounded" alt="avatar img" />
                            </a>
                        </div>
                        <div class="col-md-4 col-6 profile-latest-img">
                            <a href="javascript:void(0)">
                                <img src="{{ asset('assets') }}/images/profile/user-uploads/user-05.jpg" class="img-fluid rounded" alt="avatar img" />
                            </a>
                        </div>
                        <div class="col-md-4 col-6 profile-latest-img">
                            <a href="javascript:void(0)">
                                <img src="{{ asset('assets') }}/images/profile/user-uploads/user-06.jpg" class="img-fluid rounded" alt="avatar img" />
                            </a>
                        </div>
                        <div class="col-md-4 col-6 profile-latest-img">
                            <a href="javascript:void(0)">
                                <img src="{{ asset('assets') }}/images/profile/user-uploads/user-07.jpg" class="img-fluid rounded" alt="avatar img" />
                            </a>
                        </div>
                        <div class="col-md-4 col-6 profile-latest-img">
                            <a href="javascript:void(0)">
                                <img src="{{ asset('assets') }}/images/profile/user-uploads/user-08.jpg" class="img-fluid rounded" alt="avatar img" />
                            </a>
                        </div>
                        <div class="col-md-4 col-6 profile-latest-img">
                            <a href="javascript:void(0)">
                                <img src="{{ asset('assets') }}/images/profile/user-uploads/user-09.jpg" class="img-fluid rounded" alt="avatar img" />
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ right profile info section -->
    </div>
</section>
@endsection


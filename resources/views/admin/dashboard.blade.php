@section('title')
    PROSIDING -
@endsection
<x-master-layouts>
@include('sweetalert::alert')

<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <section class="app-user-list">
                <div class="row match-height">
                    <div class="col-12">
                        <div class="card card-congratulations">
                            <div class="card-body text-center">
                                <img src="{{ asset('assets') }}/images/elements/decore-left.png" class="congratulations-img-left" alt="card-img-left" />
                                <img src="{{ asset('assets') }}/images/elements/decore-right.png" class="congratulations-img-right" alt="card-img-right" />
                                <div class="avatar avatar-xl bg-primary shadow">
                                    <div class="avatar-content">
                                        <img class="round" src="{{ asset('storage/images/users').'/'.auth()->user()->profile_photo_path }}" alt="avatar" height="60" width="60">
                                    </div>
                                </div>
                                <div class="text-center">
                                    <h1 class="mb-1 text-white">Selamat datang {{ ucwords(auth()->user()->name) }}</h1>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8 col-md-6 col-12">
                        @include('admin.widget.home', ['data' => $data['home']])
                    </div>

                    <div class="col-lg-4 col-md-6 col-12">
                        {{-- @role('peserta') --}}
                        @include('admin.widget.customer-care', ['data' => $customerCare])
                        {{-- @include('admin.widget.add_friends', ['users' => $friendListAdd]) --}}
                    </div>

                </div>
            </section>

        </div>
    </div>
</div>
</x-master-layouts>

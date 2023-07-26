<x-master-layouts>

@include('sweetalert::alert')

    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">Profile</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/dashboard">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active">Profile
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <div id="user-profile">
                    @include('admin.users.profile.header')

                    @yield('profile-page')
                </div>

            </div>
        </div>
    </div>


@push('page-css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/css/pages/page-profile.css">
@endpush
@push('page-js')
<script src="{{ asset('assets') }}/js/scripts/pages/page-profile.js"></script>
@endpush

</x-master-layouts>

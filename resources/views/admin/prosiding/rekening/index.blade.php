@section('title')
    Rekening -
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
                            <h2 class="content-header-title float-left mb-0">Rekening</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item">Prosiding
                                    </li>
                                    <li class="breadcrumb-item"><a href="{{ route('prosiding.pembayaran') }}">Pembayaran</a>
                                    </li>
                                    <li class="breadcrumb-item active">Rekening
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
                <div class="blog-list-wrapper">
                    @livewire('prosiding.rekening')
                </div>
            </div>
        </div>
    </div>
</x-master-layouts>

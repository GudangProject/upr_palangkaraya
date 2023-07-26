@section('title')
    Upload Naskah -
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
                            <h2 class="content-header-title float-left mb-0">Upload Power Point File</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item active">Prosiding
                                    </li>
                                    <li class="breadcrumb-item active"><a href="{{ route('prosiding.upload-naskah') }}">Naskah</a>
                                    </li>
                                    <li class="breadcrumb-item active">Upload PPT
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <div class="row" id="basic-table">
                    <div class="col-12">
                        <div class="card p-1">
                            <div class="content-body">
                                <div class="row" id="basic-table">
                                    <div class="col-12">
                                        <div class="card">
                                            <form action="{{ route('prosiding.save-ppt') }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label><h5>Upload Your Power Point (ppt/pptx File) </h5></label>
                                                        <input type="hidden" name="id" value="{{ $id }}">
                                                        <input type="file" name="ppt" accept=".ppt,.pptx" class="form-control">
                                                    </div>
                                                    <button type="submit" class="btn btn-primary mt-2"><i data-feather="save"></i> SAVE</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @push('vendor-css')
                            <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/vendors/css/vendors.min.css">
                            <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/vendors/css/forms/select/select2.min.css">
                            @endpush
                            @push('page-vendor')
                            <script src="{{ asset('assets') }}/vendors/js/forms/select/select2.full.min.js"></script>
                            @endpush
                            @push('page-js')
                            <script src="{{ asset('assets') }}/js/scripts/forms/form-select2.js"></script>

                                <script>
                                    window.addEventListener('addNaskah', event => {
                                        $("#create-modal").modal('show');
                                    })

                                    window.addEventListener('closeModal', event => {
                                        $("#create-modal").modal('hide');
                                    })

                                    window.addEventListener('iconLoad', event => {
                                        if (feather) {
                                            feather.replace({
                                                width: 14,
                                                height: 14
                                            });
                                        }
                                    })
                                </script>
                            @endpush
                        </div>
                    </div>
                </div>
                @include('admin.modals.alert')
            </div>
        </div>
    </div>
</x-master-layouts>

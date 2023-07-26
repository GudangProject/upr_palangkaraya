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
                            <h2 class="content-header-title float-left mb-0">Upload Naskah Prosiding</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item active">Prosiding
                                    </li>
                                    <li class="breadcrumb-item active"><a href="{{ route('prosiding.upload-naskah') }}">Naskah</a>
                                    </li>
                                    <li class="breadcrumb-item active">Upload
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
                                            <form action="{{ route('upload-naskah.store') }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label><h5>Bidang Ilmu</h5></label>
                                                        <select class="select2 form-control form-control-lg select2-hidden-accessible" name="bidang_ilmu">
                                                            <option selected>--- Pilih ---</option>
                                                            @foreach ($bidangIlmu as $item)
                                                                <option value="{{ $item->id }}">{{ $item->judul }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label><h5>Judul</h5></label>
                                                        <input type="text" name="judul" class="form-control" placeholder="Judul Naskah" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label><h5>Abstrak</h5></label>
                                                        <textarea class="form-control" name="abstrak" placeholder="Abstrak Naskah" rows="5" required></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label><h5>Naskah Peserta (Tipe File doc/docx)</h5></label>
                                                        <input type="file" name="document" accept=".doc,.docx,.pdf" class="form-control">
                                                    </div>
                                                    <button type="submit" class="btn btn-primary mt-2"><i data-feather="arrow-up-circle"></i> UPLOAD</button>
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

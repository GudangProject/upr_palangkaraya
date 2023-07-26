@section('title')
    Upload Sertifikat -
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
                            <h2 class="content-header-title float-left mb-0">Upload Sertifikat</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item active">Prosiding
                                    </li>
                                    <li class="breadcrumb-item active"><a href="{{ route('certificate.index') }}">Sertifikat</a>
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
                                            <form action="{{ route('certificate.store') }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="card-body">

                                                    <div class="form-group">
                                                        <label><h5>Penerima Sertifikat</h5></label>
                                                        <select class="select2 form-control form-control-lg select2-hidden-accessible" name="user_id" id="user_id">
                                                            <option selected>--- Pilih ---</option>
                                                            @foreach ($users as $item)
                                                                <option value="{{ $item->id }}">{{ ucwords($item->name) }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label><h5>Model</h5></label>
                                                        <select class="form-control form-control-lg" name="model" id="model">
                                                            <option value="naskah">Makalah/Naskah</option>
                                                            <option value="seminar">Seminar</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group" id="naskah">
                                                        <label><h5>Makalah/Naskah</h5></label>
                                                        <select class="select2 form-control form-control-lg select2-hidden-accessible" name="naskah">
                                                            <option value="0" selected>--- Pilih ---</option>
                                                            @foreach (\App\Models\Prosiding\ProsidingNaskah::where('status',true)->get() as $item)
                                                                <option value="{{ $item->id }}">{{ ucwords($item->judul) }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group" id="seminar">
                                                        <label><h5>Seminar</h5></label>
                                                        <select class="select2 form-control form-control-lg select2-hidden-accessible" name="seminar">
                                                            <option value="0" selected>--- Pilih ---</option>
                                                            @foreach (\App\Models\Prosiding\Event::where('status',true)->get() as $item)
                                                                <option value="{{ $item->id }}">{{ ucwords($item->judul) }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label><h5>Link Sertifikat</h5></label>
                                                        <input type="url" name="url" class="form-control">
                                                    </div>
                                                    {{-- <div class="form-group">
                                                        <label><h5>Sertifikat Peserta (Tipe File PDF)</h5></label>
                                                        <input type="file" name="document" accept=".pdf" class="form-control">
                                                    </div> --}}
                                                    <button type="submit" class="btn btn-primary mt-2"><i data-feather="save"></i> SIMPAN</button>
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
                                window.addEventListener('addSertifikat', event => {
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
                            <script>
                                $('#seminar').hide();
                                $('#model').on('change', function () {
                                    if (this.value == 'seminar') {
                                        $('#naskah').hide();
                                        $('#seminar').show();
                                    } else if(this.value == 'naskah') {
                                        $('#naskah').show();
                                        $('#seminar').hide();
                                    }
                                });
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

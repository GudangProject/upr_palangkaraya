@section('title')
    Upload Bukti Pembayaran -
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
                            <h2 class="content-header-title float-left mb-0">Upload Bukti Pembayaran Prosiding</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item active">Prosiding
                                    </li>
                                    <li class="breadcrumb-item active"><a href="{{ route('prosiding.bukti-pembayaran') }}">Bukti Pembayaran</a>
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
                                            <form action="{{ route('upload-pembayaran.store') }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label><h5>Kategori Pembayaran</h5></label>
                                                        <select class="select2 form-control form-control-lg select2-hidden-accessible" id="category" name="category">
                                                            <option value="" disabled selected>--- Pilih ---</option>
                                                            <option value="1">Non Pemakalah</option>
                                                            <option value="2">Pemakalah</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group" id="naskah">
                                                        <label><h5>Naskah</h5> Berikut adalah data naskah dengan status <b>Menunggu Pembayaran</b></label>
                                                        <select class="select2 form-control form-control-lg select2-hidden-accessible" name="naskah">
                                                            <option value="" disabled selected>--- Pilih ---</option>
                                                            @foreach ($dataNaskah as $item)
                                                                <option value="{{ $item->id }}">{{ $item->judul }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label><h5>Nomor Transaksi</h5></label>
                                                        <input type="text" name="no_transaksi" class="form-control" placeholder="Nomor Transaksi Dari Bank" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label><h5>Tanggal Bayar</h5></label>
                                                        <input type="date" name="tanggal_bayar" class="form-control" placeholder="Tanggal Bayar" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label><h5>Jumlah Bayar RP</h5></label>
                                                        <input type="text" name="jumlah_bayar" class="form-control" placeholder="0" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label><h5>Nama Pengirim</h5></label>
                                                        <input type="text" name="nama_pengirim" class="form-control" placeholder="Cth: Andi Mahendra" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label><h5>Bank Pengirim</h5></label>
                                                        <input type="text" name="bank_pengirim" class="form-control" placeholder="Cth: Mandiri" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label><h5>Rekening Tujuan</h5></label>
                                                        <select class="select2 form-control form-control-lg select2-hidden-accessible" name="rekening_tujuan">
                                                            <option value="" disabled selected>--- Pilih ---</option>
                                                            @foreach ($dataRekening as $rekening)
                                                                <option value="{{ $rekening->id }}">{{ $rekening->bank }} - {{ $rekening->rekening }} a/n {{ $rekening->nama }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label><h5>Keterangan</h5></label>
                                                        <textarea class="form-control" name="keterangan" placeholder="Cth: Biaya pendaftaran ..." rows=3" required></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label><h5>Bukti Bayar</h5></label>
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" name="photo" id="customFile" />
                                                            <label class="custom-file-label" for="customFile">Pilih File</label>
                                                        </div>
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
                                <script>
                                    $('#naskah').hide();
                                    $('#category').on('change', function () {
                                        if (this.value == 2) {
                                            $('#naskah').show();
                                        }else{
                                            $('#naskah').hide();
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

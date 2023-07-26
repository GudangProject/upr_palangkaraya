<div>
    <div class="content-body">
        <div class="row" id="basic-table">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6 col-sm-12">

                            </div>
                            <div class="col-lg-4 col-sm-12 d-flex justify-content-end">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon-search1"><i data-feather="search"></i></span>
                                    </div>
                                    <input type="text" wire:model="search" class="form-control" placeholder="Cari nama" aria-label="Search..." aria-describedby="basic-addon-search1" />
                                </div>
                            </div>
                            <div class="col-lg-2 col-sm-12 d-flex justify-content-end">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon-search1">Page</i></span>
                                    </div>
                                    <select class="form-control" wire:model="changeLimitPage" id="">
                                        <option value="10">10</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <a href="{{ route('upload-naskah.create') }}" class="btn-icon btn btn-primary btn-round"><i data-feather="plus-circle"></i> Upload Naskah</a>
                        {{-- <div wire:ignore.self class="modal fade text-left" id="create-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel16" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="myModalLabel16">Upload Naskah</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form wire:submit.prevent='upload' enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label><h5>Bidang Ilmu</h5></label>
                                                <select class="form-control form-control-lg" wire:model='bidang_ilmu'>
                                                    <option selected>--- Pilih ---</option>
                                                    @foreach ($bidang_ilmu_data as $item)
                                                        <option value="{{ $item->id }}">{{ $item->judul }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label><h5>Judul</h5></label>
                                                <input type="text" wire:model.defer='judul' class="form-control" placeholder="Judul Naskah" required>
                                            </div>
                                            <div class="form-group">
                                                <label><h5>Naskah Peserta (Tipe File doc/docx)</h5></label>
                                                <input type="file" wire:model='file_naskah' accept=".doc,.docx,.pdf" class="form-control">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary"><i data-feather="arrow-up-circle"></i> UPLOAD</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div> --}}
                        <a href="https://regprosiding.stekom.ac.id/images/template.doc" class="btn-icon btn btn-secondary btn-round"><i data-feather="book"></i> Format Naskah</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    @if (count($selectData) > 0)
                                    <th colspan="6">
                                        <p class="card-text">
                                            {{ count($selectData) }} data selected, <button wire:click="unselectedJobs()" class="btn btn-sm btn-primary">Cancel</button>
                                            <div class="btn-group">
                                                <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Actions
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton6">
                                                    <a class="dropdown-item" href="javascript:void(0);" wire:click="deleteSelected()">Hapus</a>
                                                </div>
                                            </div>
                                        </p>
                                    </th>
                                    @endif
                                </tr>
                                <tr>
                                    <th><input type="checkbox" wire:click="selectAll()" wire:model="selectAll"></th>
                                    {{-- <th>Nama</th> --}}
                                    {{-- <th>Institusi</th> --}}
                                    <th>Title</th>
                                    <th>Knowledge</th>
                                    <th>Submit Date</th>
                                    <th>Document</th>
                                    <th>PPT</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($data as $row)
                                    <tr>
                                        <td>
                                            <input type="checkbox" value="{{ $row->id }}" wire:model="selectData" id="a">
                                        </td>
                                        {{-- <td>{{ $row->getUser->name }}</td> --}}
                                        {{-- <td>{{ $row->getUser->company }}</td> --}}
                                        <td>{{ $row->judul }}</td>
                                        <td>{{ $row->getBidangIlmu->judul }}</td>
                                        <td>{{ $row->tanggalSubmit }}</td>
                                        <td><a href="{{ $row->document }}" class="badge badge-glow badge-primary"> FILE NASKAH</a></td>
                                        <td>
                                            @if ($row->status == 1)
                                                @if ($row->ppt_file == null)
                                                    <a href="{{ route('prosiding.upload-ppt', $row->id) }}" class="badge badge-warning"> UPLOAD PPT</a>
                                                @else
                                                    <a href="{{ $row->pptView }}" class="badge badge-glow badge-primary"> VIEW</a>
                                                @endif
                                            @endif
                                        </td>
                                        <td>
                                            @if ($row->status == 1)
                                                <span class="badge badge-glow badge-success">Accept</span>
                                            @elseif ($row->status == 2)
                                                <span class="badge badge-glow badge-warning">Article is Empty</span>
                                            @elseif ($row->status == 3)
                                                <span class="badge badge-glow badge-dark">it is not</span>
                                            @elseif ($row->status == 4)
                                                <span class="badge badge-glow badge-danger">Rejected</span>
                                            @elseif ($row->status == 5)
                                                <span class="badge badge-glow badge-primary">Waiting for Payment</span>
                                            @elseif ($row->status == 0)
                                                <span class="badge badge-glow badge-secondary">Waiting</span>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                <tr>
                                    <td colspan="9" class="pt-2 pb-1 text-center"><h4>Data tidak ditemukan !</h5></td>
                                </tr>
                                @endforelse

                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center mt-2">
                            {{ $data->links() }}
                        </div>
                    </div>
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

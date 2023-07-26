<div>
    <div class="content-body">
        <div class="row" id="basic-table">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6 col-sm-12">
                                <button class="btn-icon btn btn-primary btn-round" data-toggle="modal" data-target="#create-modal-bidangilmu"><i data-feather="plus-circle"></i> Tambah Rekening</button>
                                <div wire:ignore.self class="modal fade text-left" id="create-modal-bidangilmu" tabindex="-1" role="dialog" aria-labelledby="myModalLabel16" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel16">Rekening Baru</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form wire:submit.prevent='createRekening' enctype="multipart/form-data">
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label><h5>Bank</h5></label>
                                                        <input type="text" wire:model='bank' class="form-control" placeholder="cth: BCA" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label><h5>No Rekening</h5></label>
                                                        <input type="number" wire:model='no_rekening' class="form-control" placeholder="cth:998282xx17" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label><h5>a.n Nama</h5></label>
                                                        <input type="text" wire:model='nama' class="form-control" placeholder="cth:Jarwonozt" required>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary"><i data-feather="save"></i> Simpan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-12 d-flex justify-content-end">

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
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                @if (count($selectData) > 0)
                                <tr>
                                    <th colspan="10">
                                        <p class="card-text">
                                            {{ count($selectData) }} data selected, <button wire:click="unselectedJobs()" class="btn btn-sm btn-primary">Cancel</button>
                                            <div class="btn-group">
                                                <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Actions
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton6">
                                                    <a class="dropdown-item" href="javascript:void(0);" wire:click="updateStatus(0)">Hidden</a>
                                                    <a class="dropdown-item" href="javascript:void(0);" wire:click="updateStatus(1)">Show</a>
                                                    <a class="dropdown-item" href="javascript:void(0);" wire:click="deleteSelected()">Delete</a>
                                                </div>
                                            </div>
                                        </p>
                                    </th>
                                </tr>
                                @endif
                                <tr>
                                    <th><input type="checkbox" wire:click="selectAll()" wire:model="selectAll"></th>
                                    <th>BANK</th>
                                    <th>NO REKENING</th>
                                    <th>NAMA</th>
                                    <th>STATUS</th>
                                    <th>OPSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($data as $row)
                                    <tr>
                                        <td>
                                            <input type="checkbox" value="{{ $row->id }}" wire:model="selectData" id="a">
                                        </td>
                                        <td>{{ $row->bank }}</td>
                                        <td>{{ $row->rekening }}</td>
                                        <td>{{ $row->nama }}</td>
                                        <td class="text-center">
                                            @if ($row->status == 1)
                                                <span class="badge badge-glow badge-success">active</span>
                                            @else
                                                <span class="badge badge-glow badge-danger">hidden</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Pilih
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    {{-- <a class="dropdown-item" href="javascript:void(0);"wire:click=''>Detail</a> --}}
                                                    <a class="dropdown-item" href="#" wire:click='editRekening({{ $row->id }})'>Edit</a>
                                                    <a class="dropdown-item" href="javascript:void(0);" wire:click='deleteSingleSelected({{ $row->id }})'>Delete</a>
                                                </div>
                                            </div>
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

    <div class="modal fade text-left modal-primary" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel160" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel16">Edit Rekening</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label><h5>Bank</h5></label>
                        <input type="text" wire:model.defer='bank' class="form-control" placeholder="cth: BCA" required>
                    </div>
                    <div class="form-group">
                        <label><h5>No Rekening</h5></label>
                        <input type="number" wire:model.defer='no_rekening' class="form-control" placeholder="cth:998282xx17" required>
                    </div>
                    <div class="form-group">
                        <label><h5>a.n Nama</h5></label>
                        <input type="text" wire:model.defer='nama' class="form-control" placeholder="cth:Jarwonozt" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" wire:click.prevent="update()"><i data-feather="save"></i> Simpan</button>
                </div>
            </div>
        </div>
    </div>
    @push('vendor-css')
        <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/vendors/css/vendors.min.css">
    @endpush
    @push('page-js')
        <script>

            window.addEventListener('closeModalAddRekening', event => {
                $("#create-modal-bidangilmu").modal('hide');
            })

            window.addEventListener('openEditRekening', event => {
                $("#modal-edit").modal('show');
            })

            window.addEventListener('closeEditRekening', event => {
                $("#modal-edit").modal('hide');
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

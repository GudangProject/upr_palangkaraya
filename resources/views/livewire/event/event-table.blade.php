<div>
    <div class="content-body">
        <div class="row" id="basic-table">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6 col-sm-12">
                                <a href="{{ route('event.create') }}" class="btn-icon btn btn-primary btn-round"><i data-feather="plus-circle"></i> Tambah Event</a>
                            </div>
                            <div class="col-lg-4 col-sm-12 d-flex justify-content-end">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon-search1"><i data-feather="search"></i></span>
                                    </div>
                                    <input type="text" wire:model="search" class="form-control" placeholder="Search..." aria-label="Search..." aria-describedby="basic-addon-search1" />
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
                                    <th>Judul</th>
                                    <th>Kategori</th>
                                    <th>Waktu <span class="badge badge-light-primary">mulai</span> - <span class="badge badge-light-dark">selesai</span></th>
                                    <th>Created By</th>
                                    <th>Status</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($data as $row)
                                    <tr>
                                        <td>
                                            <input type="checkbox" value="{{ $row->id }}" wire:model="selectData" id="a">
                                        </td>
                                        <td>{{ \Illuminate\Support\Str::words($row->judul, 5) }}</td>
                                        <td>
                                            @if ($row->type == 1)
                                                <span class="badge badge-light-success">nasional</span>
                                            @elseif($row->type == 2)
                                                <span class="badge badge-light-danger">internasional</span>
                                            @else
                                                <span class="badge badge-light-dark">lainnya</span>
                                            @endif
                                        </td>
                                        <td>
                                            <span class="badge badge-light-primary">{{ \Carbon\Carbon::parse($row->date_start)->isoFormat('dddd, D MMMM Y') }}</span> - <span class="badge badge-light-dark">{{ \Carbon\Carbon::parse($row->date_end)->isoFormat('dddd, D MMMM Y') }} </span><br>
                                            <span class="badge badge-light-warning">Pukul</span>&nbsp;&nbsp;<span class="badge badge-light-success">{{ \Carbon\Carbon::parse($row->date_start)->format('h:i') }} - {{ \Carbon\Carbon::parse($row->date_end)->format('h:i') }} </span>
                                        </td>
                                        <td>{{ $row->getUser->name }}</td>
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
                                                    <a class="dropdown-item" href="{{ route('event.edit', $row->id) }}">Edit</a>
                                                    <a class="dropdown-item" href="javascript:void(0);"wire:click=''>Delete</a>
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
    @push('vendor-css')
        <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/vendors/css/vendors.min.css">
    @endpush
    @push('page-js')
        <script>
            window.addEventListener('openFormModal', event => {
                $("#create-modal").modal('show');
            })

            window.addEventListener('closeFormModal', event => {
                $("#create-modal").modal('hide');
            })

            window.addEventListener('closeEditModal', event => {
                let id = event.detail.id;
                $("#modal-edit"+id).modal('hide');
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

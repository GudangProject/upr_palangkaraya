<div>
    <div class="content-body">
        <div class="row" id="basic-table">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6 col-sm-12 mt-1">
                                <a href="{{ route('customer-care.create') }}" class="btn-icon btn btn-primary btn-round"><i data-feather="plus-circle"></i> Tambah Kontak</a>
                                <button class="btn-icon btn btn-dark btn-round"  data-toggle="modal" data-target="#create-modal-cs"><i data-feather="link-2"></i> Group Link</button>
                                <div wire:ignore.self class="modal fade text-left" id="create-modal-cs" tabindex="-1" role="dialog" aria-labelledby="myModalLabel16" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel16">Edit Link Group</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form wire:submit.prevent='createGroupLink' enctype="multipart/form-data">
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label><h5>link WA/Telegram</h5></label>
                                                        <input type="url" wire:model.defer='url' class="form-control" placeholder="https://linkgroup.com" required>
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
                            <div class="col-lg-4 col-sm-12 d-flex justify-content-end mt-1">

                            </div>
                            <div class="col-lg-2 col-sm-12 d-flex justify-content-end mt-1">
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
                                @if (count($selectJobs) > 0)
                                <tr>
                                    <th colspan="5">
                                        <p class="card-text">
                                            {{ count($selectJobs) }} data selected, <button wire:click="unselectedJobs()" class="btn btn-sm btn-primary">Cancel</button>
                                            <div class="btn-group">
                                                <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Actions
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton6">
                                                    <a class="dropdown-item" href="javascript:void(0);" wire:click="updateStatus(0)">Hidden</a>
                                                    <a class="dropdown-item" href="javascript:void(0);" wire:click="updateStatus(1)">Show</a>
                                                    <a class="dropdown-item" href="javascript:void(0);" wire:click="deleteSelectedConfirm()">Delete</a>
                                                </div>
                                            </div>
                                        </p>
                                    </th>
                                </tr>
                                @endif
                                <tr>
                                    <th colspan="2">Link Group</th>
                                    <td colspan="3" class="bg-primary text-white">
                                        @php
                                            $json = file_get_contents('JSON/group-cs.json');
                                            $group = json_decode($json, true);
                                        @endphp
                                        @if ($group != null)
                                            <a href="{{ $group['data']['group'][0]['url'] }}" class="badge badge-dark">
                                                <b>
                                                    {{ $group['data']['group'][0]['url'] }}
                                                </b>
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th><input type="checkbox" wire:click="selectAll()" wire:model="selectAll"></th>
                                    <th>Nama</th>
                                    <th>Nomor HP/WA</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($data as $row)
                                    <tr>
                                        <td>
                                            <input type="checkbox" value="{{ $row->id }}" wire:model="selectJobs" id="a">
                                        </td>
                                        <td>
                                            <span class="font-weight-bold">{{ $row->getUser->name }}</span>
                                            @if ($row->status < 1)
                                                <i class="text-danger" data-feather="eye-off"></i>
                                            @endif
                                        </td>
                                        <td>{{ $row->getUser->phone }}</td>
                                        <td>
                                            @if ($row->status == true)
                                                <span class="badge badge-light-success mr-1"> active</span>
                                            @else
                                                <span class="badge badge-light-danger mr-1"> hidden</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Select
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton6">
                                                    <a class="dropdown-item" wire:click="deleteSingleSelected({{ $row->id }})">Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="pt-2 pb-1"><strong>Data not found !</strong></td>
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
    <div class="modal fade text-left modal-primary" id="category-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel160" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel160">Edit Bidang Ilmu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="text" class="form-control" wire:model.defer="title">
                </div>
                <div class="modal-footer">
                    <button wire:click.prevent="updateJobsCategory()" type="button" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    @push('vendor-css')
        <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/vendors/css/vendors.min.css">
    @endpush
    @push('page-js')
        <script src="{{ asset('assets') }}/ckeditorx/ckeditor.js"></script>

        <script type="text/javascript">
            $(document).ready(function () {
                $('.ckeditor').ckeditor();
            });
        </script>
        <script>
            window.addEventListener('openCategoryModal', event => {
                $("#category-modal").modal('show');
            })

            window.addEventListener('closeCategoryModal', event => {
                $("#category-modal").modal('hide');
            })

            window.addEventListener('closeModalBidangIlmu', event => {
                $("#create-modal-cs").modal('hide');
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

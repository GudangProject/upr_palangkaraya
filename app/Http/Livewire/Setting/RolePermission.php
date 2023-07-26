<?php

namespace App\Http\Livewire\Setting;

use App\Models\Jobs\JobsCategory;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Str;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermission extends Component
{
    use WithPagination, LivewireAlert;
    protected $paginationTheme = 'bootstrap';

    public $selectRole = [];
    public $selectAll = false;
    public $bulkDisabled = true;
    public $statusSelected = false;
    public $search, $limitPerPage = 10, $changeLimitPage;
    public $roleId, $name;
    public $dataPermission, $permission;

    protected $queryString = ['search' => ['except' => '']];
    protected $listeners = [
        'deleteConfirmed',
        'deleteSelected',
        'jobs-table' => 'jobsCategoryTable'
    ];

    public function jobsCategoryTable(){
        $this->limitPerPage = $this->limitPerPage + 6;
    }

    public function mount(){
        $this->dataPermission = Permission::all();
    }

    public function render()
    {
        if(!empty($this->changeLimitPage)){
            $this->limitPerPage = $this->changeLimitPage;
        }

        $data = Role::orderByDesc('created_at')->paginate($this->limitPerPage);
        if($this->search != null){
            $data = Role::where('name', 'like', '%'.$this->search.'%')->orderByDesc('created_at')->paginate($this->limitPerPage);
        }

        $this->emit('postStore');
        $this->dispatchBrowserEvent('iconLoad');

        $this->bulkDisabled = count($this->selectRole) < 1;
        return view('livewire.setting.role-permission', [
            'data' => $data,
        ]);
    }

    public function selectAll(){
        if($this->selectAll == true){
            $this->selectRole = Role::pluck('id');
            $this->statusSelected = true;
        }else{
            $this->selectRole = [];
        }
    }

    public function unselectedJobs(){
        $this->selectRole = [];
        $this->selectAll = false;
        $this->statusSelected = false;

    }

    public function deleteSelectedConfirm(){
        $this->alert('question', 'Yakin data akan dihapus?', [
            'showConfirmButton' => true,
            'showCancelButton' => true,
            'confirmButtonText' => 'Hapus',
            'onConfirmed' => 'deleteSelected',
            'position' => 'center',
            'timer' => null,
        ]);

    }

    public function deleteSelected(){
        Role::query()
            ->whereIn('id', $this->selectRole)
            ->delete();
        $this->selectRole = [];
        $this->selectAll = false;
    }

    public function deleteSingleSelected($id){
        $this->selected_id = $id;

        $this->alert('question', 'Yakin data akan dihapus?', [
            'showConfirmButton' => true,
            'showCancelButton' => true,
            'confirmButtonText' => 'Hapus',
            'onConfirmed' => 'deleteConfirmed',
            'position' => 'center',
            'timer' => null,
        ]);
    }

    public function deleteConfirmed(){
        Role::findOrFail($this->selected_id)->delete();
        $this->alert('success', 'Data berhasil dihapus', [
            'position' => 'center',
        ]);
    }

    public function createRole(){
        $this->dispatchBrowserEvent('openCreateRoleModal');
    }

    public function saveCreateRole(){
        Role::create(['name' => $this->name]);

        $this->alert('success', 'Role berhasil ditambahkan...', [
            'position' => 'center',
        ]);

        $this->dispatchBrowserEvent('closeRoleModal');
    }

    public function editRole($id){
        $data = Role::findOrFail($id);
        $this->roleId = $id;
        $this->name = $data->name;

        $this->dispatchBrowserEvent('openRoleModal');
    }

    public function updateRole(){
        dd($this->permission);
        $save = Role::findOrFail($this->roleId);
        $save->givePermissionTo($this->permission);
        $save->name = $this->name;
        $save->save();

        $this->alert('success', 'Role permission update successfully...', [
            'position' => 'center',
        ]);

        $this->dispatchBrowserEvent('closeRoleModal');
    }

    // Create Permission
    public function createPermission(){
        $this->dispatchBrowserEvent('openPermissionModal');
    }

    public function saveCreatePermission(){
        Permission::create(['name' => $this->name]);

        $this->alert('success', 'Permission berhasil ditambahkan...', [
            'position' => 'center',
        ]);

        $this->dispatchBrowserEvent('closePermissionModal');
    }

}

<?php
namespace App\Http\Livewire\Prosiding;

use Livewire\Component;
use Livewire\WithPagination;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use App\Models\User;
use App\Models\Prosiding\Rekening as RekeningModel;
use Exception;

class Rekening extends Component
{
    use WithPagination, LivewireAlert;
    protected $paginationTheme = 'bootstrap';

    public $selectData = [];
    public $selectAll = false;
    public $bulkDisabled = true;
    public $statusSelected = false;
    public $search, $limitPerPage = 10, $changeLimitPage;
    public $selected_id, $bank, $no_rekening, $nama;

    protected $queryString = ['search' => ['except' => '']];
    protected $listeners = [
        'deleteConfirmed',
        'jobs-table' => 'jobsTable'
    ];

    public function jobsTable(){
        $this->limitPerPage = $this->limitPerPage + 6;
    }

    public function render()
    {
        if(!empty($this->changeLimitPage)){
            $this->limitPerPage = $this->changeLimitPage;
        }

        $data = RekeningModel::orderByDesc('created_at')->paginate($this->limitPerPage);

        $this->emit('postStore');
        $this->dispatchBrowserEvent('iconLoad');

        $this->bulkDisabled = count($this->selectData) < 1;
        return view('livewire.prosiding.rekening', [
            'data' => $data,
        ]);
    }

    public function deleteSelected(){
        RekeningModel::query()
            ->whereIn('id', $this->selectData)
            ->delete();
        $this->selectData = [];
        $this->selectAll = false;
    }

    public function selectAll(){
        if($this->selectAll == true){
            $this->selectData = RekeningModel::pluck('id');
            $this->statusSelected = true;
        }else{
            $this->selectData = [];
        }
    }

    public function unselectedJobs(){
        $this->selectData = [];
        $this->selectAll = false;
        $this->statusSelected = false;

    }

    public function updateStatus($value){
        RekeningModel::query()
            ->whereIn('id', $this->selectData)
            ->update([
                'status' => $value
            ]);

        $this->selectData = [];
        $this->selectAll = false;
        $this->statusSelected = false;
    }

    public function updateStatusPembayaran($value, $id){
        RekeningModel::query()
            ->where('id', $id)
            ->update([
                'status' => $value
            ]);

        $this->selectData = [];
        $this->selectAll = false;
        $this->statusSelected = false;
        $this->dispatchBrowserEvent('closeEditModal', ['id' => $id]);
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
        RekeningModel::findOrFail($this->selected_id)->delete();
        $this->alert('success', 'Data berhasil dihapus', [
            'position' => 'center',
        ]);
    }

    public function createRekening(){
        try {
            $save = new RekeningModel();
            $save->bank = $this->bank;
            $save->rekening = $this->no_rekening;
            $save->nama = $this->nama;
            $save->status = 1;
            $save->save();

            $this->alert('success', 'Rekening berhasil ditambahkan', [
                'position' => 'center',
            ]);

            $this->dispatchBrowserEvent('closeModalAddRekening');


        } catch (Exception $error) {
            $this->alert('error', $error->getMessage(), [
                'position' => 'center',
            ]);
        }
    }

    public function editRekening($id){
        // dd($id);
        $data = RekeningModel::findOrFail($id);
        $this->selected_id = $id;
        $this->bank = $data->bank;
        $this->no_rekening = $data->rekening;
        $this->nama = $data->nama;

        $this->dispatchBrowserEvent('openEditRekening');

    }

    public function update(){

        $save = RekeningModel::findOrFail($this->selected_id);
        $save->bank = $this->bank;
        $save->rekening = $this->no_rekening;
        $save->nama = $this->nama;
        $save->status = 1;
        $save->save();

        $this->alert('success', 'Rekening berhasil diupdate', [
            'position' => 'center',
        ]);

        $this->dispatchBrowserEvent('closeEditRekening');
    }
}

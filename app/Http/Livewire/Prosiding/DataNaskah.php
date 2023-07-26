<?php

namespace App\Http\Livewire\Prosiding;

use Livewire\Component;
use App\Models\Jobs\Jobs;
use Livewire\WithPagination;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use App\Models\Prosiding\ProsidingNaskah;
use App\Models\User;

class DataNaskah extends Component
{
    use WithPagination, LivewireAlert;
    protected $paginationTheme = 'bootstrap';

    public $selectData = [];
    public $selectAll = false;
    public $bulkDisabled = true;
    public $statusSelected = false;
    public $search, $limitPerPage = 10, $changeLimitPage;
    public $totalNaskah;

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

        $data = ProsidingNaskah::orderByDesc('created_at')->paginate($this->limitPerPage);
        $this->totalNaskah = ProsidingNaskah::orderByDesc('created_at')->count();
        if($this->search != null){
            $data = ProsidingNaskah::where('judul', 'like', '%'.$this->search.'%')->orderByDesc('created_at')->paginate($this->limitPerPage);
            $this->totalNaskah = $data->count();
        }

        $peserta = ProsidingNaskah::where('status', true)
                    ->selectRaw('count(id) as total_user, user_id')
                    ->groupBy('user_id')
                    ->get();

        $this->emit('postStore');
        $this->dispatchBrowserEvent('iconLoad');

        $this->bulkDisabled = count($this->selectData) < 1;
        return view('livewire.prosiding.data-naskah', [
            'data'      => $data,
            'pesertas'  => $peserta
        ]);
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
        ProsidingNaskah::query()
            ->whereIn('id', $this->selectData)
            ->delete();
        $this->selectData = [];
        $this->selectAll = false;
    }

    public function selectAll(){
        if($this->selectAll == true){
            $this->selectData = ProsidingNaskah::pluck('id');
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
        ProsidingNaskah::query()
            ->whereIn('id', $this->selectData)
            ->update([
                'status' => $value
            ]);

        $this->selectData = [];
        $this->selectAll = false;
        $this->statusSelected = false;
    }

    public function updateStatusSingle($value, $id){
        ProsidingNaskah::query()
            ->where('id', $id)
            ->update([
                'status' => $value
            ]);

        $this->selectData = [];
        $this->selectAll = false;
        $this->statusSelected = false;
    }


    public function deleteConfirmed(){
        ProsidingNaskah::findOrFail($this->selected_id)->delete();
        $this->alert('success', 'Data berhasil dihapus', [
            'position' => 'center',
        ]);
    }
}

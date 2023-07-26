<?php

namespace App\Http\Livewire\Jobs;

use App\Models\Jobs\Jobs;
use Livewire\Component;
use Livewire\WithPagination;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class JobsTable extends Component
{
    use WithPagination, LivewireAlert;
    protected $paginationTheme = 'bootstrap';

    public $selectJobs = [];
    public $selectAll = false;
    public $bulkDisabled = true;
    public $statusSelected = false;
    public $jobTitle, $jobRole, $jobType, $jobExperience, $jobLocation, $jobBudgetMin, $jobBudgetMax, $jobDescription;
    public $search, $limitPerPage = 10, $changeLimitPage;

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

        $data = Jobs::orderByDesc('created_at')->paginate($this->limitPerPage);
        if($this->search != null){
            $data = Jobs::where('title', 'like', '%'.$this->search.'%')->orderByDesc('created_at')->paginate($this->limitPerPage);
        }

        $this->emit('postStore');
        $this->dispatchBrowserEvent('iconLoad');

        $this->bulkDisabled = count($this->selectJobs) < 1;
        return view('livewire.jobs.jobs-table', [
            'data' => $data,
        ]);
    }

    public function deleteSelected(){
        Jobs::query()
            ->whereIn('id', $this->selectJobs)
            ->delete();
        $this->selectJobs = [];
        $this->selectAll = false;
    }

    public function selectAll(){
        if($this->selectAll == true){
            $this->selectJobs = Jobs::pluck('id');
            $this->statusSelected = true;
        }else{
            $this->selectJobs = [];
        }
    }

    public function unselectedJobs(){
        $this->selectJobs = [];
        $this->selectAll = false;
        $this->statusSelected = false;

    }

    public function updateStatus($value){
        Jobs::query()
            ->whereIn('id', $this->selectJobs)
            ->update([
                'status' => $value
            ]);

        $this->selectJobs = [];
        $this->selectAll = false;
        $this->statusSelected = false;
    }

    public function createJobsModal()
    {
        $this->dispatchBrowserEvent('openFormModal');
    }

    public function saveJobs(){
        dd($this->jobTitle.$this->jobRole.$this->jobType.$this->jobExperience.$this->jobLocation.$this->jobBudgetMin.$this->jobBudgetMax.$this->jobDescription);
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
        Jobs::findOrFail($this->selected_id)->delete();
        $this->alert('success', 'Data berhasil dihapus', [
            'position' => 'center',
        ]);
    }
}

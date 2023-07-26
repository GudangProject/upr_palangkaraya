<?php

namespace App\Http\Livewire\Jobs;

use App\Models\Jobs\JobsCategory;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Str;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class JobsCategoryTable extends Component
{
    use WithPagination, LivewireAlert;
    protected $paginationTheme = 'bootstrap';

    public $selectJobs = [];
    public $selectAll = false;
    public $bulkDisabled = true;
    public $statusSelected = false;
    public $search, $limitPerPage = 10, $changeLimitPage;
    public $categoryId, $title;

    protected $queryString = ['search' => ['except' => '']];
    protected $listeners = [
        'deleteConfirmed',
        'deleteSelected',
        'jobs-table' => 'jobsCategoryTable'
    ];

    public function jobsCategoryTable(){
        $this->limitPerPage = $this->limitPerPage + 6;
    }

    public function render()
    {
        if(!empty($this->changeLimitPage)){
            $this->limitPerPage = $this->changeLimitPage;
        }

        $data = JobsCategory::orderByDesc('created_at')->paginate($this->limitPerPage);
        if($this->search != null){
            $data = JobsCategory::where('title', 'like', '%'.$this->search.'%')->orderByDesc('created_at')->paginate($this->limitPerPage);
        }

        $this->emit('postStore');
        $this->dispatchBrowserEvent('iconLoad');

        $this->bulkDisabled = count($this->selectJobs) < 1;
        return view('livewire.jobs.jobs-category-table', [
            'data' => $data,
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
        JobsCategory::query()
            ->whereIn('id', $this->selectJobs)
            ->delete();
        $this->selectJobs = [];
        $this->selectAll = false;
    }

    public function editJobsCategory($id){
        $data = JobsCategory::findOrFail($id);
        $this->categoryId = $id;
        $this->title = $data->title;

        $this->dispatchBrowserEvent('openCategoryModal');
    }

    public function updateJobsCategory(){
        $save = JobsCategory::findOrFail($this->categoryId);
        $save->title = $this->title;
        $save->slug = Str::slug($this->title);
        $save->save();

        $this->alert('success', 'Category update successfully...', [
            'position' => 'center',
        ]);

        $this->dispatchBrowserEvent('closeCategoryModal');
    }

    public function selectAll(){
        if($this->selectAll == true){
            $this->selectJobs = JobsCategory::pluck('id');
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
        JobsCategory::query()
            ->whereIn('id', $this->selectJobs)
            ->update([
                'status' => $value
            ]);

        $this->selectJobs = [];
        $this->selectAll = false;
        $this->statusSelected = false;
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
        JobsCategory::findOrFail($this->selected_id)->delete();
        $this->alert('success', 'Data berhasil dihapus', [
            'position' => 'center',
        ]);
    }
}

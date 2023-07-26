<?php

namespace App\Http\Livewire\Prosiding;

use App\Models\Jobs\JobsCategory;
use App\Models\Prosiding\BidangIlmu as BidangIlmuModel;
use Exception;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Str;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class BidangIlmu extends Component
{
    use WithPagination, LivewireAlert;
    protected $paginationTheme = 'bootstrap';

    public $selectJobs = [];
    public $selectAll = false;
    public $bulkDisabled = true;
    public $statusSelected = false;
    public $search, $limitPerPage = 10, $changeLimitPage;
    public $categoryId, $title, $keterangan;

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

        $data = BidangIlmuModel::orderByDesc('created_at')->paginate($this->limitPerPage);
        if($this->search != null){
            $data = BidangIlmuModel::where('judul', 'like', '%'.$this->search.'%')->orderByDesc('created_at')->paginate($this->limitPerPage);
        }

        $this->emit('postStore');
        $this->dispatchBrowserEvent('iconLoad');

        $this->bulkDisabled = count($this->selectJobs) < 1;
        return view('livewire.prosiding.bidang-ilmu', [
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
        BidangIlmuModel::query()
            ->whereIn('id', $this->selectJobs)
            ->delete();
        $this->selectJobs = [];
        $this->selectAll = false;
    }

    public function editJobsCategory($id){
        $data = BidangIlmuModel::findOrFail($id);
        $this->categoryId = $id;
        $this->title = $data->judul;

        $this->dispatchBrowserEvent('openCategoryModal');
    }

    public function updateJobsCategory(){
        $save = BidangIlmuModel::findOrFail($this->categoryId);
        $save->judul = $this->title;
        // $save->slug = Str::slug($this->title);
        $save->save();

        $this->alert('success', 'Category update successfully...', [
            'position' => 'center',
        ]);

        $this->dispatchBrowserEvent('closeCategoryModal');
    }

    public function selectAll(){
        if($this->selectAll == true){
            $this->selectJobs = BidangIlmuModel::pluck('id');
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
        BidangIlmuModel::query()
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
        BidangIlmuModel::findOrFail($this->selected_id)->delete();
        $this->alert('success', 'Data berhasil dihapus', [
            'position' => 'center',
        ]);
    }

    public function createBidangIlmu(){
        try{
            $save = new BidangIlmuModel();
            $save->judul = $this->title;
            $save->keterangan = $this->keterangan;
            $save->status = 1;
            $save->created_by = auth()->user()->id;
            $save->save();

            $this->alert('success', 'Bidang Ilmu berhasil ditambahkan !', [
                'position' => 'center',
            ]);

        $this->dispatchBrowserEvent('closeModalBidangIlmu');

        }catch(Exception $error){
            $this->alert('error', $error->getMessage(), [
                'position' => 'center',
            ]);
        }
    }
}

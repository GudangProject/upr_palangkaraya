<?php

namespace App\Http\Livewire\Prosiding;

use App\Models\Prosiding\BidangIlmu as BidangIlmuModel;
use Exception;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Str;
use App\Models\Prosiding\CustomerCare as CS;
use Carbon\Carbon;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class CustomerCare extends Component
{
    use WithPagination, LivewireAlert;
    protected $paginationTheme = 'bootstrap';

    public $selectJobs = [];
    public $selectAll = false;
    public $bulkDisabled = true;
    public $statusSelected = false;
    public $search, $limitPerPage = 10, $changeLimitPage;
    public $categoryId, $title, $keterangan, $url;

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

        $data = CS::orderByDesc('created_at')->paginate($this->limitPerPage);
        if($this->search != null){
            $data = CS::where('title', 'like', '%'.$this->search.'%')->orderByDesc('created_at')->paginate($this->limitPerPage);
        }

        $this->emit('postStore');
        $this->dispatchBrowserEvent('iconLoad');

        $this->bulkDisabled = count($this->selectJobs) < 1;
        return view('livewire.prosiding.customer-care', [
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
        CS::query()
            ->whereIn('id', $this->selectJobs)
            ->delete();
        $this->selectJobs = [];
        $this->selectAll = false;
    }

    public function editJobsCategory($id){
        $data = CS::findOrFail($id);
        $this->categoryId = $id;
        $this->title = $data->title;

        $this->dispatchBrowserEvent('openCategoryModal');
    }

    public function updateJobsCategory(){
        $save = CS::findOrFail($this->categoryId);
        $save->title = $this->title;
        // $save->slug = Str::slug($this->title);
        $save->save();

        $this->alert('success', 'Category update successfully...', [
            'position' => 'center',
        ]);

        $this->dispatchBrowserEvent('closeCategoryModal');
    }

    public function selectAll(){
        if($this->selectAll == true){
            $this->selectJobs = CS::pluck('id');
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
        CS::query()
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
        CS::findOrFail($this->selected_id)->delete();
        $this->alert('success', 'Data berhasil dihapus', [
            'position' => 'center',
        ]);
    }

    public function createGroupLink(){
        try{
            // dd($this->url);
            $data['group'] = array([
                'url' => $this->url,
                'created_by' => auth()->user()->name,
                'created_at' => Carbon::now()->format('D, d M Y - H:i:s')
            ]);
            $json = json_encode(array('data' => $data));
            //write json to file
            if (file_put_contents("JSON/group-cs.json", $json)){
                $msg = 'Group berhasil ditambahkan';
            }else{
                $msg = 'Error saat menambahkan group';
            }

            $this->alert('success', $msg, [
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

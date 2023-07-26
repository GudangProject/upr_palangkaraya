<?php

namespace App\Http\Livewire\Article;

use App\Models\Tag;
use Illuminate\Support\Str;
use Exception;
use Livewire\Component;
use Livewire\WithPagination;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Tags extends Component
{
    use WithPagination, LivewireAlert;
    protected $paginationTheme = 'bootstrap';

    public $selectTags = [];
    public $selectAll = false;
    public $bulkDisabled = true;
    public $statusSelected = false;
    public $title, $tagId;
    public $tagTitle, $tagRole, $tagType, $tagExperience, $tagLocation, $tagBudgetMin, $tagBudgetMax, $tagDescription;
    public $search, $limitPerPage = 10, $changeLimitPage;

    protected $queryString = ['search' => ['except' => '']];
    protected $listeners = [
        'deleteConfirmed',
        'tags-table' => 'tagsTable'
    ];

    public function tagsTable(){
        $this->limitPerPage = $this->limitPerPage + 6;
    }

    public function render()
    {
        if(!empty($this->changeLimitPage)){
            $this->limitPerPage = $this->changeLimitPage;
        }

        $data = Tag::orderByDesc('created_at')->paginate($this->limitPerPage);
        if($this->search != null){
            $data = Tag::where('title', 'like', '%'.$this->search.'%')->orderByDesc('created_at')->paginate($this->limitPerPage);
        }

        $this->emit('postStore');
        $this->dispatchBrowserEvent('iconLoad');

        $this->bulkDisabled = count($this->selectTags) < 1;
        return view('livewire.article.tags', [
            'data' => $data,
        ]);
    }

    // tags baru
    public function newTags(){
        $this->title = null;
        $this->dispatchBrowserEvent('openModalNewTag');
    }

    // tags save
    public function saveTags(){
        $this->dispatchBrowserEvent('closeModalNewTag');

        try {
            $save = new Tag();
            $save->title        = $this->title;
            $save->slug         = Str::slug($this->title);
            $save->status       = 1;
            $save->created_by   = auth()->user()->id;
            $save->save();

            $this->alert('success', 'Tags added successfully !');
        } catch (Exception $error) {
            $this->alert('error', $error->getMessage());
        }
    }

    // tags baru
    public function editTags($id){
        $tag = Tag::findOrFail($id);
        $this->title = $tag->title;
        $this->tagId = $id;
        $this->dispatchBrowserEvent('openModalEditTag');
    }

    // tags save
    public function saveEditTags(){
        $this->dispatchBrowserEvent('closeModalEditTag');

        try {
            $save = Tag::findOrFail($this->tagId);
            $save->title        = $this->title;
            $save->slug         = Str::slug($this->title);
            $save->status       = 1;
            $save->created_by   = auth()->user()->id;
            $save->save();

            $this->alert('success', 'Tags added successfully !');
        } catch (Exception $error) {
            $this->alert('error', $error->getMessage());
        }
    }

    public function deleteSelected(){
        Tag::query()
            ->whereIn('id', $this->selectTags)
            ->delete();
        $this->selectTags = [];
        $this->selectAll = false;
    }

    public function selectAll(){
        if($this->selectAll == true){
            $this->selectTags = Tag::pluck('id');
            $this->statusSelected = true;
        }else{
            $this->selectTags = [];
        }
    }

    public function unselectedTags(){
        $this->selectTags = [];
        $this->selectAll = false;
        $this->statusSelected = false;

    }

    public function updateStatus($value){
        Tag::query()
            ->whereIn('id', $this->selectTags)
            ->update([
                'status' => $value
            ]);

        $this->selectTags = [];
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
        Tag::findOrFail($this->selected_id)->delete();
        $this->alert('success', 'Data berhasil dihapus', [
            'position' => 'center',
        ]);
    }
}

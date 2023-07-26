<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Tag;
use Livewire\Component;
use RobertSeghedi\News\Models\Article;
use Livewire\WithPagination;

class Articles extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $tag;

    public function render()
    {
        if($this->tag != null){
            $tag  = Tag::where('slug', $this->tag)->first()->id;
            $data = Article::where('tags', 'like', '%' . $tag . '%')->orderByDesc('created_at')->paginate(6);
        }else{
            $data = Article::where('status', true)->orderByDesc('created_at')->paginate(6);
        }
        return view('livewire.frontend.articles', [
            'data' => $data,
        ]);
    }
}

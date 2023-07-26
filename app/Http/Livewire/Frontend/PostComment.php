<?php

namespace App\Http\Livewire\Frontend;

use Exception;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use RobertSeghedi\News\Models\News;
use RobertSeghedi\News\Models\Comment;
use Livewire\WithPagination;

class PostComment extends Component
{
    use LivewireAlert, WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $article_id, $reply_id;
    public $selected_id;
    public $comment, $reply;

    public function mount(){

    }

    protected $rules = [
        'comment' => 'required',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    // delete comment
    public function deleteComment($id){
        News::delete_comment($id);
        $this->alert('success', 'Your comment deleted...');
    }

    public function saveComment(){
        $this->validate();
        News::comment($this->article_id, $this->comment);
        $this->comment = '';
    }


    public function saveٌReply(){
        // dd($this->reply);
        News::reply($this->article_id, $this->reply_id, $this->reply);
        $this->reply = '';
    }

    public function render()
    {
        return view('livewire.frontend.post-comment', [
            'comments' => Comment::where('article_id', $this->article_id)->where('reply_id', null)->orderByDesc('created_at')->paginate(10),
        ]);
    }
}

<?php

namespace App\Http\Livewire\Article;

use Exception;
use Livewire\Component;
use RobertSeghedi\News\Models\News;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use RobertSeghedi\News\Models\Comment;

class ReplayCommentArticle extends Component
{
    use LivewireAlert;

    public $articleId, $commentId, $replyContent;

    public function render()
    {
        return view('livewire.article.replay-comment-article', [
            'comments' => Comment::where('article_id', $this->articleId)->where('reply_id', null)->orderByDesc('created_at')->get(),
        ]);
    }

    public function saveReplay($id){
        try {
            News::reply($this->articleId, $id, $this->replyContent);
            $this->alert('success', 'success replay comment');
        } catch (Exception $error) {
            $this->alert('error', $error->getMessage(), [
                'timer' => false
            ]);
        }

    }
}

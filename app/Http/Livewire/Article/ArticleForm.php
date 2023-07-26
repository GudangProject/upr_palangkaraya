<?php

namespace App\Http\Livewire\Article;

use Livewire\Component;
use Illuminate\Support\Str;

class ArticleForm extends Component
{
    public $categories;
    public $title, $slug, $category, $status, $content;

    public function submit(){
        dd($this->content);
    }

    public function render()
    {
        return view('livewire.article.article-form');
    }
}

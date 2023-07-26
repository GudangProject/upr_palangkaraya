<?php

namespace App\Http\Livewire\Frontend\Event;

use App\Models\Prosiding\Event;
use App\Models\Tag;
use Livewire\Component;
use RobertSeghedi\News\Models\Article;
use Livewire\WithPagination;

class Internasional extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $tag;

    public function render()
    {
        $data = Event::where('type', 2)->where('status', true)->orderByDesc('created_at')->paginate(6);
        return view('livewire.frontend.event.internasional', [
            'data' => $data,
        ]);
    }
}

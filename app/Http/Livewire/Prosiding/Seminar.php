<?php
namespace App\Http\Livewire\Prosiding;

use App\Models\Prosiding\Event;
use Livewire\Component;
use RobertSeghedi\News\Models\Article;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithPagination;

class Seminar extends Component
{
    use WithPagination, LivewireAlert;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $data = Event::where('status', true)->orderByDesc('created_at')->paginate(12);
        return view('livewire.prosiding.seminar', [
            'data' => $data
        ]);
    }
}


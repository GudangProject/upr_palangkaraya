<?php

namespace App\Http\Livewire\Article;

use Livewire\Component;
use RobertSeghedi\News\Models\Category;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use RobertSeghedi\News\Models\News;

class CategoryForm extends Component
{
    use LivewireAlert;

    public $name;

    protected $rules = [
        'name' => 'required|unique:categories',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function saveCategory()
    {
        $validatedData = $this->validate();
        // dd($validatedData);
        News::category($this->name);

        $this->alert('success', 'Category add successfully');
        $this->dispatchBrowserEvent('loadModalCreate');
    }

    public function render()
    {
        return view('livewire.article.category-form');
    }
}

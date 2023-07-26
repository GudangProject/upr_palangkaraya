<?php

namespace App\Http\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\ButtonGroupColumn;use App\Models\Image;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;
use App\Models\Image as ImageModel;

class ImageTable extends DataTableComponent
{
    protected $model = Image::class;

    public $selected_id;
    public $title;

    public $columnSearch = [
        'title' => null,
    ];

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setDefaultSort('created_at', 'desc');
        $this->setSearchDisabled();
    }

    public function columns(): array
    {
        return [
            Column::make('ID', 'id'),
            Column::make('Title'),
            Column::make('Category', 'category_id')
            ->format(function($value, $column, $row) {
                return Str::upper($column->getCategory->name);
            }),
            // Column::make('Publish','created_at')->sortable(),
            Column::make('Author', 'created_by')
            ->format(function($value, $column, $row) {
                return $column->getAdd->name;
            }),
            Column::make('Status')
            ->format(function($value, $column, $row) {
                if($column->status == 1){
                    $data = "<button class='btn btn-sm btn-icon btn-primary' wire:click='updateStatus($column->id, 0)'>aktif</button>";
                }else{
                    $data = "<button class='btn btn-sm btn-icon btn-danger' wire:click='updateStatus($column->id, 1)'>nonaktif</button>";
                }
                return $data;
            })->html(),
            ButtonGroupColumn::make('Actions')
            ->unclickable()
            ->buttons([
                // LinkColumn::make('Detail') // make() has no effect in this case but needs to be set anyway
                //     ->title(fn($row) => 'Detail ')
                //     ->location(fn($row) => route('articles.show', $row->id))
                //     ->attributes(function($row) {
                //         return [
                //             'class' => 'btn btn-sm btn-icon btn-primary',
                //         ];
                //     }),
                LinkColumn::make('Edit')
                    ->title(fn($row) => 'Edit')
                    ->location(fn($row) => route('images.edit', $row->id))
                    ->attributes(function($row) {

                        return [
                            'class' => 'btn btn-sm btn-icon btn-success',
                        ];
                    }),
                LinkColumn::make('Delete')
                    ->title(fn($row) => 'Delete')
                    ->location(fn($row) => '#')
                    ->attributes(function($row) {
                        return [
                            'class' => 'btn btn-sm btn-icon btn-danger',
                            'wire:click' => "deleteModal($row->id)",
                        ];
                    }),
            ])
        ];
    }

    public function builder(): Builder
    {
        return ImageModel::query()
            ->when($this->columnSearch['title'] ?? null, fn ($query, $title) => $query->where('images.title', 'like', '%' . $title . '%'));
    }

    public array $bulkActions = [
        'delete' => 'Delete',
    ];

    public function export()
    {
        $articles = $this->getSelected();
        $this->clearSelected();

    }

    public function deleteModal($id)
    {
        $this->selected_id = $id;
        $this->dispatchBrowserEvent('openModalDelete');
    }

    public function deleteStatus(){
        $this->model::findOrFail($this->selected_id)->delete();
        $this->dispatchBrowserEvent('closeModalDelete');
    }

    public function delete(){
        $this->model::whereIn('id', $this->getSelected())->delete();
        $message = 'Image deleted successfully !';
        $this->dispatchBrowserEvent('success', ['message' => $message]);
    }

    public function updateStatus($id, $value){
        $this->model::where('id', $id)->update([
            'status' => $value
        ]);

        $message = 'Image deleted successfully !';
        $this->dispatchBrowserEvent('success', ['message' => $message]);
    }

    public function customView(): string
    {
        return 'admin.images.modal';
    }
}

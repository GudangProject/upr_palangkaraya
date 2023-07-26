<?php

namespace App\Http\Livewire;

use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Columns\BooleanColumn;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\ImageColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\ButtonGroupColumn;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\MultiSelectFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\DateFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\TextFilter;
use App\Exports\UsersExport;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class UserTable extends DataTableComponent
{
    public array $users1 = [];

    public $columnSearch = [
        'name' => null,
        'email' => null,
    ];

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable()
                ->format(fn($value, $row, Column $column) =>
                "<span class='badge badge-light-dark'>".$value."</span>
                <span class='badge badge-light-primary'>".$row->roles->pluck('name')->implode(',')."</span>"
            )->html(),
            Column::make('Name')
            ->searchable(),
            Column::make('Email')
            ->searchable(),
            Column::make("Created at", "created_at")
                ->sortable(),
            ButtonGroupColumn::make('Actions')
            ->unclickable()
            ->buttons([
                LinkColumn::make('Edit')
                    ->title(fn($row) => 'Edit')
                    ->location(fn($row) => route('users.edit', $row->id))
                    ->attributes(function($row) {
                        return [
                            'class' => 'btn btn-icon btn-success',
                        ];
                    }),
                LinkColumn::make('Delete')
                ->title(fn($row) => 'Delete')
                ->location(fn($row) => '#')
                ->attributes(function($row) {
                    return [
                        'class' => 'btn btn-icon btn-danger',
                        'wire:click' => "deleteModal($row->id)",
                    ];
                }),
            ])
        ];
    }


    public array $bulkActions = [
        'export' => 'Export',
        'activate' => 'Activate',
        'deactivate' => 'Deactivate',
        'resetPassword' => 'Reset Password',
        'delete' => 'Delete',
    ];

    public function export()
    {
        $users = $this->getSelected();

        $this->clearSelected();

        return Excel::download(new UsersExport($users), 'users.xlsx');
    }

    public function activate()
    {
        User::whereIn('id', $this->getSelected())->update(['status' => 1]);

        $this->clearSelected();
    }

    public function deactivate()
    {
        User::whereIn('id', $this->getSelected())->update(['status' => 0]);

        $this->clearSelected();
    }

    public function resetPassword(){
        // User::whereIn('id', $this->getSelected())->delete();
        User::where('id', $this->getSelected())->update([
            'password' => Hash::make('12345678')
        ]);
        $message = 'Password reset successfully, default password = 12345678';
        $this->dispatchBrowserEvent('success', ['message' => $message]);
    }

    public function delete(){
        User::whereIn('id', $this->getSelected())->delete();
        $message = 'User successfully deleted !';
        $this->dispatchBrowserEvent('success', ['message' => $message]);
    }

    public function restore(){
        User::withTrashed()->whereIn('id', $this->getSelected())->restore();
        $message = 'User successfully restored';
        $this->dispatchBrowserEvent('openModalRestore', ['message' => $message]);
    }

    public function deleteModal($id)
    {
        $this->selected_id = $id;
        $this->dispatchBrowserEvent('openModalDelete');
    }

    public function deleteStatus(){
        User::findOrFail($this->selected_id)->delete();
        $this->dispatchBrowserEvent('closeModalDelete');
    }

    public function builder(): Builder
    {
        return User::query()
            ->orderBy('created_at', 'desc')
            ->when($this->columnSearch['name'] ?? null, fn ($query, $name) => $query->where('users.name', 'like', '%' . $name . '%'))
            ->when($this->columnSearch['email'] ?? null, fn ($query, $email) => $query->where('users.email', 'like', '%' . $email . '%'));
    }

    public function customView(): string
    {
        return 'admin.users.modal';
    }

}

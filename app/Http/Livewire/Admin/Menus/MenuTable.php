<?php

namespace App\Http\Livewire\Admin\Menus;

use App\Http\Livewire\LivewireHelpers;
use App\Models\Menu;
use Livewire\Component;
use Livewire\WithPagination;

class MenuTable extends Component
{
    use WithPagination, LivewireHelpers;

    public $addFormVisible = false;
    public $newMenu = [
        'name' => ''
    ];
    protected $listeners = [
        'editSuccess' => 'editSuccess',
        'resetEditId' => 'resetEditId',
    ];

    public function toggleAddForm()
    {
        $this->addFormVisible = !$this->addFormVisible;
    }

    public function addMenu()
    {
        $rules = [
            'newMenu.name' => 'required|string|unique:menus,name'
        ];

        $this->validate($rules);
        $menu = new Menu();
        $menu->name = $this->newMenu['name'];
        $menu->save();
        $this->reset('newMenu');
    }

    public function render()
    {
        return view('admin.livewire.menus.menu-table', [
            'menus' => Menu::where('name', 'LIKE', "%{$this->search}%")
            ->orderBy($this->orderField, $this->orderDirection)
            ->paginate(10)
        ]);
    }
}

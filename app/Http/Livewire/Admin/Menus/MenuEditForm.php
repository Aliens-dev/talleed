<?php


namespace App\Http\Livewire\Admin\Menus;

use App\Models\Menu;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class MenuEditForm extends Component
{
    public Menu $menu;
    public $menuId;
    public function mount()
    {
        $this->menuId = $this->menu->id;
    }

    protected function rules()
    {
        return  [
            'menu.name' => "required|unique:menus,name" . $this->menuId,
        ];
    }

    public function editMenu()
    {
        $this->validate();
        $this->menu->save();
        $this->emit('editSuccess');
    }

    public function cancelEdit()
    {
        if($this->menu->isDirty()) {
            $this->menu->refresh();
        }
        $this->emit('resetEditId');
    }

    public function render()
    {
        return view('admin.livewire.menus.menu-edit-form');
    }
}

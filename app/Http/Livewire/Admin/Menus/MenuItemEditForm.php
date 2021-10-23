<?php

namespace App\Http\Livewire\Admin\Menus;

use App\Models\MenuItem;
use Livewire\Component;

class MenuItemEditForm extends Component
{
    public MenuItem $menuItem;
    public $menuItemId;

    public function mount()
    {
        $this->menuItemId = $this->menuItem->id;
    }

    protected function rules()
    {
        return  [
            'menuItem.title' => "required|unique:menu_items,title" . $this->menuItemId,
            'menuItem.url' => "required"
        ];
    }
    public function editMenu()
    {
        $this->validate();
        $this->menuItem->save();
        $this->emit('editSuccess');
    }

    public function cancelEdit()
    {
        if($this->menuItem->isDirty()) {
            $this->menuItem->refresh();
        }
        $this->emit('resetEditId');
    }

    public function render()
    {
        return view('admin.livewire.menus.menu-item-edit-form');
    }
}

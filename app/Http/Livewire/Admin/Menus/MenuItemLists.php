<?php

namespace App\Http\Livewire\Admin\Menus;

use App\Http\Livewire\LivewireHelpers;
use App\Models\Menu;
use App\Models\MenuItem;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Livewire\WithPagination;


class MenuItemLists extends Component
{
    use WithPagination;
    use LivewireHelpers;

    public $addFormVisible = false;
    public Menu $menu;

    public $newItem = [
        'title' => '',
        'order' => 0,
        'url' => '',
    ];

    protected $listeners = [
        'editSuccess' => 'editSuccess',
        'resetEditId' => 'resetEditId',
    ];

    public function mount($menuId)
    {
        $this->menu = Menu::where('id',$menuId)->first();
    }

    public function deleteCategories() {
        MenuItem::destroy($this->selected);
        $this->reset('selected');
        Session::flash('success', 'تم الحذف بنجاح');
    }

    public function toggleAddForm() {
        $this->addFormVisible = !$this->addFormVisible;
        $this->reset('newItem');
    }

    public function addItem()
    {
        $rules = [
            'newItem.title' => 'required|string|unique:menu_items,title',
            'newItem.url' => 'required|string',
        ];

        $this->validate($rules);

        $menuItem = new MenuItem();
        $menuItem->title = $this->newItem['title'];
        $menuItem->order = $this->menu->items()->count() > 0 ? $this->menu->items()->orderBy('order','DESC')->first()->order + 1 : 0;
        $menuItem->menu_id = $this->menu->id;
        $menuItem->url = $this->newItem['url'];
        $menuItem->save();

        $this->reset('newItem','addFormVisible');
    }

    public function updateTaskOrder($items)
    {
        for($i=0;$i<count($items); $i++) {
            $m = MenuItem::find($items[$i]['value']);
            $m->order = $i;
            $m->save();
        }
    }

    public function render()
    {
        return view('admin.livewire.menus.menu-item-lists', [
            'items' => $this->menu->items()
                ->orderBy($this->orderField,$this->orderDirection)
                ->paginate(10)
        ]);
    }
}

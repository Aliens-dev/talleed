<?php

namespace App\Http\Livewire\Admin\Contact;

use App\Http\Livewire\LivewireHelpers;
use App\Models\Contact;
use App\Models\Post;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Livewire\WithPagination;

class ContactTable extends Component
{
    use LivewireHelpers;
    use WithPagination;


    public function deleteContact() {
        Contact::destroy($this->selected);
        $this->selected = [];
        Session::flash('success', 'تم الحذف بنجاح');
    }

    public function render()
    {
        return view('admin.livewire.contact.contact-table',
        [
            'contact' => Contact::where('subject','LIKE', "%{$this->search}%")
                ->orWhere('email', 'LIKE',"%{$this->search}%")
                ->orWhere('type', 'LIKE',"%{$this->search}%")
                ->orderBy($this->orderField,$this->orderDirection)
                ->paginate(10)
        ]);
    }
}

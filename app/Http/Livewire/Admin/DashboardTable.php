<?php

namespace App\Http\Livewire\Admin;

use App\Http\Livewire\LivewireHelpers;
use App\Models\Visitor;
use Livewire\Component;
use Livewire\WithPagination;

class DashboardTable extends Component
{
    use WithPagination;
    use LivewireHelpers;

    public function render()
    {
        return view(
            'admin.livewire.dashboard-table',[
                'visitors' => Visitor::
                where('visitor_ip', 'LIKE' ,"%{$this->search}%")
                    ->orderBy($this->orderField, $this->orderDirection)
                    ->paginate(10)
            ]
        );
    }
}

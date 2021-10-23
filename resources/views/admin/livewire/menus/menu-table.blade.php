<div>
    @if(session()->has('success'))
        <div class="pr-3 pl-3 message is-success">
            <div class="message-header">
                {{ session()->get('success') }}
                <span wire:click="closeMessage()" class="delete"></span>
            </div>
        </div>
    @endif
    <div class="table p-3">
        <div class="search">
            <label for="search" class="is-block is-bold mb-3 title is-5">بحث</label>
            <div class="is-flex">
                <input placeholder="ابحث عن قائمة" class="input" id="search" name="search" type="text" wire:model.debounce.500ms="search" />
                <div wire:click="toggleAddForm()" class="button is-primary mr-2">
                    @if($addFormVisible)
                        الغاء
                    @else
                        اضافة قائمة
                    @endif
                </div>
                @if(count($selected))
                    <button wire:click="deleteCategories()" class="button is-danger mr-2">
                        حذف
                    </button>
                @endif
            </div>
        </div>
        @if($addFormVisible)
            <div class="card p-5 mt-2">
                <div class="field is-grouped">
                    <label for="name">اسم القائمة</label>
                    <div class="control">
                        <input id="name" class="input" wire:model="newMenu.name" />
                    </div>
                    <div class="field is-grouped">
                        <div class="control">
                            <button wire:click="addMenu()" class="button is-link">اضافة</button>
                        </div>
                        <div class="control">
                            <button wire:click="toggleAddForm()" class="button is-link is-light mr-2">الغاء</button>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        @if(count($menus))
            <table class="mt-2">
                <thead>
                <th>#</th>
                <x-table-header class="is-hoverable" :orderBy="$orderField" :direction="$orderDirection" name="id">رقم</x-table-header>
                <x-table-header :orderBy="$orderField" :direction="$orderDirection" name="name">الاسم</x-table-header>
                <x-table-header :orderBy="$orderField" :direction="$orderDirection" name="created_at">تاريخ الانشاء</x-table-header>
                <th>تعديل</th>
                </thead>
                <tbody>
                @foreach($menus as $index=>$menu)
                    <tr wire:key="{{ $menu->id }}">
                        <td>
                            <input type="checkbox" wire:model="selected" value="{{ $menu->id }}">
                        </td>
                        <td>{{ $menu->id }}</td>
                        <td>{{ $menu->name }}</td>
                        <td>{{ $menu->created_at->locale('ar')->diffForHumans() }}</td>
                        <td>
                            <button class="button is-success" wire:click="setEditId('{{ $menu->id }}')">تعديل</button>
                            <a href="{{ route('admin.menu.show', $menu) }}" class="button is-primary">العناصر</a>
                        </td>
                    </tr>
                    @if($editId == $menu->id)
                        <tr>
                            <livewire:admin.menus.menu-edit-form :menu="$menu" wire:key="{{ $menu->id }}" />
                        </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
        @else
            <p>لا توجد اية قوائم</p>
        @endif
    </div>
    {{ $menus->links('admin.layouts.pagination') }}
</div>

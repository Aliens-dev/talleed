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
                <input placeholder="ابحث عن عنصر" class="input" id="search" name="search" type="text" wire:model.debounce.500ms="search" />
                <div wire:click="toggleAddForm()" class="button is-primary mr-2">
                    @if($addFormVisible)
                        الغاء
                    @else
                        اضافة عنصر
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
                    <label for="name">اسم العنصر</label>
                    <div class="control">
                        <input id="title" class="input" wire:model="newItem.title" />
                    </div>
                    <label for="name">عنوان URL</label>
                    <div class="control">
                        <input id="url" class="input" wire:model="newItem.url" />
                    </div>
                    <div class="field is-grouped">
                        <div class="control">
                            <button wire:click="addItem()" class="button is-link">اضافة</button>
                        </div>
                        <div class="control">
                            <button wire:click="toggleAddForm()" class="button is-link is-light mr-2">الغاء</button>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        @if(count($items))
            <table class="mt-2">
                <thead>
                <th>#</th>
                <x-table-header class="is-hoverable" :orderBy="$orderField" :direction="$orderDirection" name="id">ID</x-table-header>
                <x-table-header class="is-hoverable" :orderBy="$orderField" :direction="$orderDirection" name="order">الترتيب</x-table-header>
                <x-table-header :orderBy="$orderField" :direction="$orderDirection" name="title">اسم العنصر</x-table-header>
                <x-table-header :orderBy="$orderField" :direction="$orderDirection" name="url">عنوان URL</x-table-header>
                <x-table-header :orderBy="$orderField" :direction="$orderDirection" name="created_at">تاريخ الانشاء</x-table-header>
                <th>تعديل</th>
                </thead>
                <tbody wire:sortable="updateTaskOrder">
                @foreach($items as $index=>$item)
                    <tr wire:sortable.item="{{ $item->id }}" wire:key="{{ $item->id }}">
                        <td>
                            <input type="checkbox" wire:model="selected" value="{{ $item->id }}">
                        </td>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->order }}</td>
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->url }}</td>
                        <td>{{ $item->created_at->locale('ar')->diffForHumans() }}</td>
                        <td>
                            <button class="button is-success" wire:click="setEditId('{{ $item->id }}')">تعديل</button>
                        </td>
                    </tr>
                    @if($editId == $item->id)
                        <tr>
                            <livewire:admin.menus.menu-item-edit-form :menuItem="$item" wire:key="{{ $item->id }}" />
                        </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
        @else
            <p>لا توجد اية قوائم</p>
        @endif
    </div>
    {{ $items->links('admin.layouts.pagination') }}
</div>

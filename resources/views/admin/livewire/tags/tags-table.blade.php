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
                <input placeholder="ابحث عن كلمة مفتاحية" class="input"
                       id="search" name="search" type="text"
                       wire:model.debounce.500ms="search"
                />
                <div wire:click="toggleAddForm()" class="button is-primary mr-2">
                    @if($addFormVisible)
                        الغاء
                    @else
                        اضافة كلمة مفتاحية
                    @endif
                </div>
                @if(count($selected))
                    <button wire:click="deleteTags()" class="button is-danger mr-2">
                        حذف
                    </button>
                @endif
            </div>
        </div>

        @if($addFormVisible)
            <div class="card p-5 mt-2">
                <div class="field is-grouped">
                    <label for="name">الكلمة المفتاحية</label>
                    <div class="control">
                        <input id="name" class="input" wire:model="newTag.name" />
                    </div>
                    <div class="field is-grouped">
                        <div class="control">
                            <button wire:click="addTag()" class="button is-link">اضافة</button>
                        </div>
                        <div class="control">
                            <button wire:click="toggleAddForm()" class="button is-link is-light mr-2">الغاء</button>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if(count($tags))
            <table class="mt-2">
                <thead>
                <th>#</th>
                <x-table-header class="is-hoverable" :orderBy="$orderField" :direction="$orderDirection" name="id">رقم</x-table-header>
                <x-table-header :orderBy="$orderField" :direction="$orderDirection" name="name">الاسم</x-table-header>
                <x-table-header :orderBy="$orderField" :direction="$orderDirection" name="created_at">تاريخ الانشاء</x-table-header>
                <th>تعديل</th>
                </thead>
                <tbody>
                @foreach($tags as $tag)
                    <tr wire:key="{{ $tag->id }}">
                        <td>
                            <input type="checkbox" wire:model="selected" value="{{ $tag->id }}">
                        </td>
                        <td>{{ $tag->id }}</td>
                        <td>{{ $tag->name }}</td>
                        <td>{{ $tag->created_at->locale('ar')->diffForHumans() }}</td>
                        <td>
                            <button class="button is-success" wire:click="setEditId('{{ $tag->id }}')">تعديل</button>
                        </td>
                    </tr>
                    @if($editId == $tag->id)
                        <tr>
                            <livewire:admin.tag.tags-edit-form :tag="$tag" wire:key="{{ $tag->id }}" />
                        </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
        @else
            <p class="p-2">لا توجد اية كلمات مفتاحية</p>
        @endif
    </div>
        {{ $tags->links('admin.layouts.pagination') }}
</div>

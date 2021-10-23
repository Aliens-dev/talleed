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
                <input placeholder="ابحث عن مجال" class="input" id="search" name="search" type="text" wire:model.debounce.500ms="search" />
                <div wire:click="toggleAddForm()" class="button is-primary mr-2">
                    @if($addFormVisible)
                        الغاء
                    @else
                        اضافة مجال
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
                    <label for="name">المجال</label>
                    <div class="control">
                        <input id="name" class="input" wire:model="newCategory.name" />
                    </div>
                    <div class="mr-2 ml-2"></div>
                    <label for="slug">عنوان المجال</label>
                    <div class="control">
                        <input id="slug" class="input" wire:model="newCategory.slug" />
                    </div>
                    <div class="field is-grouped">
                        <div class="control">
                            <button wire:click="addCategory()" class="button is-link">اضافة</button>
                        </div>
                        <div class="control">
                            <button wire:click="toggleAddForm()" class="button is-link is-light mr-2">الغاء</button>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        @if(count($categories))
            <table class="mt-2">
                <thead>
                <th>#</th>
                <x-table-header class="is-hoverable" :orderBy="$orderField" :direction="$orderDirection" name="id">رقم</x-table-header>
                <x-table-header :orderBy="$orderField" :direction="$orderDirection" name="name">الاسم</x-table-header>
                <x-table-header :orderBy="$orderField" :direction="$orderDirection" name="slug">عنوان المجال</x-table-header>
                <x-table-header :orderBy="$orderField" :direction="$orderDirection" name="created_at">تاريخ الانشاء</x-table-header>
                <th>تعديل</th>
                </thead>
                <tbody>
                @foreach($categories as $index=>$category)
                    <tr wire:key="{{ $category->id }}">
                        <td>
                            <input type="checkbox" wire:model="selected" value="{{ $category->id }}">
                        </td>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->slug }}</td>
                        <td>{{ $category->created_at->locale('ar')->diffForHumans() }}</td>
                        <td>
                            <button class="button is-success" wire:click="setEditId('{{ $category->id }}')">تعديل</button>
                            <a
                                href="{{ route('category.posts.index', $category->slug) }}"
                               class="button is-primary" wire:click="setEditId('{{ $category->id }}')">
                                مشاهدة
                            </a>
                        </td>
                    </tr>
                    @if($editId == $category->id)
                        <tr>
                            <livewire:admin.category.categories-edit-form :category="$category" wire:key="{{ $category->id }}" />
                        </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
        @else
            <p>لا توجد اية مجالات</p>
        @endif
    </div>
    {{ $categories->links('admin.layouts.pagination') }}
</div>

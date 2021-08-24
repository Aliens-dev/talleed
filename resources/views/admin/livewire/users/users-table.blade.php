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
                <input placeholder="ابحث عن مستخدم" class="input" id="search" name="search" type="text" wire:model.debounce.500ms="search" />
                @if(count($selected))
                    <button wire:click="deleteUsers()" class="button is-danger mr-2">
                        حذف
                    </button>
                @endif
            </div>
        </div>
        <table class="mt-2">
            <thead>
                <th>#</th>
                <x-table-header class="is-hoverable" :orderBy="$orderField" :direction="$orderDirection" name="id">رقم</x-table-header>
                <x-table-header :orderBy="$orderField" :direction="$orderDirection" name="fname">الاسم</x-table-header>
                <x-table-header :orderBy="$orderField" :direction="$orderDirection" name="lname">اللقب</x-table-header>
                <x-table-header :orderBy="$orderField" :direction="$orderDirection" name="username">اسم المستخدم</x-table-header>
                <th>الصورة</th>
                <x-table-header :orderBy="$orderField" :direction="$orderDirection" name="email">الايميل</x-table-header>
                <th>الدور</th>
                <x-table-header :orderBy="$orderField" :direction="$orderDirection" name="created_at">تاريخ التسجيل</x-table-header>
                <th>تعديل</th>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>
                        <input type="checkbox" wire:model="selected" value="{{ $user->id }}">
                    </td>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->fname }}</td>
                    <td>{{ $user->lname }}</td>
                    <td>{{ $user->username }}</td>
                    <td>
                        @if(\Illuminate\Support\Facades\Storage::exists($user->user_image))
                            <img src="{{ \Illuminate\Support\Facades\Storage::url($user->user_image) }}" width="45" height="45" alt="{{$user->fname}}" />
                        @else
                            <img src="/uploads/author.PNG" width="45" height="45" alt="{{$user->fname}}" />
                        @endif
                    </td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role->name }}</td>
                    <td>{{ $user->created_at->locale('ar')->diffForHumans() }}</td>
                    <td>
                        <button class="button is-success" wire:click="setEditId('{{ $user->id }}')">تعديل</button>
                        <a href="{{ route('admin.users.show', $user->id) }}"
                           class="button is-info"
                           wire:click="setEditId('{{ $user->id }}')"
                        >
                            مزيد
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
        {{ $users->links('admin.layouts.pagination') }}
</div>

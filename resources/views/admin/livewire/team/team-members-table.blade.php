<div>
    @if(session()->has('success'))
        <div class="pr-3 pl-3 message is-success">
            <div class="message-header">
                {{ session()->get('success') }}
                <span wire:click="closeMessage()" class="delete"></span>
            </div>
        </div>
    @endif
    @if(session()->has('error'))
        <div class="pr-3 pl-3 message is-danger">
            <div class="message-header">
                {{ session()->get('error') }}
                <span wire:click="closeMessage()" class="delete"></span>
            </div>
        </div>
    @endif
    <div class="table p-3">
        <div class="search">
            <label for="search" class="is-block is-bold mb-3 title is-5">بحث</label>
            <div class="is-flex">
                <input placeholder="ابحث عن عضو" class="input" id="search" name="search" type="text" wire:model.debounce.500ms="search" />
                <div wire:click="toggleAddForm()" class="button is-primary mr-2">
                    @if($addFormVisible)
                        الغاء
                    @else
                        اضافة عنصر
                    @endif
                </div>
                @if(count($selected))
                    <button wire:click="deleteUserFromTeam()" class="button is-danger mr-2">
                        حذف
                    </button>
                @endif
            </div>
        </div>
        @if($addFormVisible)
            <div class="card p-5 mt-2">
                <div class="field is-grouped">
                    <label for="name">اسم المستخدم</label>
                    <div class="control">
                        <input id="username" class="input" wire:model="user.username" />
                    </div>
                    <div class="field is-grouped">
                        <div class="control">
                            <button wire:click="addUserToTeam()" class="button is-link">اضافة</button>
                        </div>
                        <div class="control">
                            <button wire:click="toggleAddForm()" class="button is-link is-light mr-2">الغاء</button>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        @if(count($users))
            <table class="mt-2">
                <thead>
                <th>#</th>
                <x-table-header class="is-hoverable" :orderBy="$orderField" :direction="$orderDirection" name="id">ID</x-table-header>
                <x-table-header class="is-hoverable" :orderBy="$orderField" :direction="$orderDirection" name="username">اسم المستخدم</x-table-header>
                <th>الصورة</th>
                <x-table-header :orderBy="$orderField" :direction="$orderDirection" name="created_at">تاريخ الانشاء</x-table-header>
                </thead>
                <tbody wire:sortable="updateTaskOrder">
                @foreach($users as $index=>$user)
                    <tr wire:sortable.item="{{ $user->id }}" wire:key="{{ $user->id }}">
                        <td>
                            <input type="checkbox" wire:model="selected" value="{{ $user->id }}">
                        </td>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->username }}</td>
                        <td>
                            @if(\Illuminate\Support\Facades\Storage::exists($user->user_image))
                                <img src="{{ \Illuminate\Support\Facades\Storage::url($user->user_image) }}"
                                     style="width:45px;height:45px"
                                     alt="{{$user->fname}}"
                                />
                            @else
                                <img src="/uploads/author.PNG" width="45" height="45" alt="{{$user->fname}}" />
                            @endif
                        </td>
                        <td>{{ $user->created_at->locale('ar')->diffForHumans() }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <p>لا يوجد اي مستخدمين</p>
        @endif
    </div>
    {{ $users->links('admin.layouts.pagination') }}
</div>

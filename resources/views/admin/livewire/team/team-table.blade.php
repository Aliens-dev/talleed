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
                <input placeholder="ابحث عن فريق" class="input" id="search" name="search" type="text" wire:model.debounce.500ms="search" />
                <div wire:click="toggleAddForm()" class="button is-primary mr-2">
                    @if($addFormVisible)
                        الغاء
                    @else
                        اضافة فريق
                    @endif
                </div>
                @if(count($selected))
                    <button wire:click="deleteTeams()" class="button is-danger mr-2">
                        حذف
                    </button>
                @endif
            </div>
        </div>
        @if($addFormVisible)
            <div class="card p-5 mt-2">
                <div class="field is-grouped">
                    <label for="name">اسم الفريق</label>
                    <div class="control">
                        <input id="name" class="input" wire:model="newTeam.name" />
                    </div>
                    <div class="field is-grouped">
                        <div class="control">
                            <button wire:click="addTeam()" class="button is-link">اضافة</button>
                        </div>
                        <div class="control">
                            <button wire:click="toggleAddForm()" class="button is-link is-light mr-2">الغاء</button>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        @if(count($teams))
            <table class="mt-2">
                <thead>
                <th>#</th>
                <x-table-header class="is-hoverable" :orderBy="$orderField" :direction="$orderDirection" name="id">رقم</x-table-header>
                <x-table-header :orderBy="$orderField" :direction="$orderDirection" name="name">اسم الفريق</x-table-header>
                <x-table-header :orderBy="$orderField" :direction="$orderDirection" name="created_at">تاريخ الانشاء</x-table-header>
                <th>تعديل</th>
                </thead>
                <tbody>
                @foreach($teams as $index=>$team)
                    <tr wire:key="{{ $team->id }}">
                        <td>
                            <input type="checkbox" wire:model="selected" value="{{ $team->id }}">
                        </td>
                        <td>{{ $team->id }}</td>
                        <td>{{ $team->name }}</td>
                        <td>{{ $team->created_at->locale('ar')->diffForHumans() }}</td>
                        <td>
                            <button class="button is-success" wire:click="setEditId('{{ $team->id }}')">تعديل</button>
                            <a href="{{ route('admin.team.show', $team->id) }}" class="button is-primary">اعضاء الفريق</a>
                        </td>
                    </tr>
                    @if($editId == $team->id)
                        <tr>
                            <livewire:admin.teams.team-edit-form :team="$team" wire:key="{{ $team->id }}" />
                        </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
        @else
            <p>لا توجد اية فرق</p>
        @endif
    </div>
    {{ $teams->links('admin.layouts.pagination') }}
</div>

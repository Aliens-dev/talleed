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
                <input placeholder="ابحث عن رسالة" class="input" id="search" name="search" type="text" wire:model.debounce.500ms="search" />
                @if(count($selected))
                    <button wire:click="deleteContact()" class="button is-danger mr-2">
                        حذف
                    </button>
                @endif
            </div>
        </div>
        @if(count($contact))
            <table class="mt-2">
                <thead>
                <th>#</th>
                <x-table-header class="is-hoverable" :orderBy="$orderField" :direction="$orderDirection" name="id">رقم</x-table-header>
                <x-table-header :orderBy="$orderField" :direction="$orderDirection" name="email">ايميل المرسل</x-table-header>
                <x-table-header :orderBy="$orderField" :direction="$orderDirection" name="subject">عنوان الرسالة</x-table-header>
                <x-table-header :orderBy="$orderField" :direction="$orderDirection" name="type">نوع الرسالة</x-table-header>
                <x-table-header :orderBy="$orderField" :direction="$orderDirection" name="created_at">تاريخ الارسال</x-table-header>
                <th>المزيد</th>
                </thead>
                <tbody>
                @foreach($contact as $index=>$con)
                    <tr wire:key="{{ $con->id }}">
                        <td>
                            <input type="checkbox" wire:model="selected" value="{{ $con->id }}">
                        </td>
                        <td>{{ $con->id }}</td>
                        <td>{{ $con->email }}</td>
                        <td>{{ $con->subject }}</td>
                        <td>{{ $con->type }}</td>
                        <td>{{ $con->created_at->locale('ar')->diffForHumans() }}</td>
                        <td>
                            <a href="{{ route('admin.contact.show', $con->id) }}" class="button is-success">مشاهدة الرسالة</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <p>لا توجد اية رسائل</p>
        @endif
    </div>
    {{ $contact->links('admin.layouts.pagination') }}
</div>

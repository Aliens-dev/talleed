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
                <input placeholder="ابحث عن مقال" class="input" id="search" name="search" type="text" wire:model.debounce.500ms="search" />
                @if(count($selected))
                    <button wire:click="deletePosts()" class="button is-danger mr-2">
                        حذف
                    </button>
                @endif
                <div>

                </div>
            </div>
        </div>
        <table class="mt-2">
            <thead>
                <th>#</th>
                <x-table-header class="is-hoverable" :orderBy="$orderField" :direction="$orderDirection" name="id">رقم</x-table-header>
                <x-table-header :orderBy="$orderField" :direction="$orderDirection" name="title">العنوان</x-table-header>
                <th>الكاتب</th>
                <th>المجال</th>
                <th>عدد الزوار</th>
                <th>تاريخ النشر</th>
                <x-table-header :orderBy="$orderField" :direction="$orderDirection" name="status">الحالة</x-table-header>
                <th>تعديل</th>
            </thead>
            <tbody>
            @foreach($posts as $post)
                <tr>
                    <td>
                        <input type="checkbox" wire:model="selected" value="{{ $post->id }}">
                    </td>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->user->fullname }}</td>
                    <td>{{ $post->category->name }}</td>
                    <td>{{ $post->visitors()->count() }}</td>
                    <td>{{ $post->created_at->locale('ar')->diffForHumans() }}</td>
                    <td>
                        <div class="select">
                            <select value="{{$post->status}}" wire:change="updateStatus($event.target.value,'{{$post->id}}')">
                                @foreach($availableStatus as $status=>$value)
                                    <option
                                        value="{{$status}}"
                                        @if($status == $post->status)
                                            selected
                                        @endif
                                    >
                                        {{ $value }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </td>
                    <td>
                        <button class="button is-success" wire:click="setEditId('{{ $post->id }}')">تعديل</button>
                        <a class="button is-primary" href="{{ route('posts.show', $post->slug) }}" >مشاهدة</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
        {{ $posts->links('admin.layouts.pagination') }}
</div>

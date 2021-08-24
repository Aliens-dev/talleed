<div>
    <div class="is-flex is-justify-content-center mr-auto ml-auto mt-2">
        <div class="v-card">
            <div class="v-icon">
                <img src="/assets/img/user.svg" width="50" height="50" alt="Users">
            </div>
            <div class="v-card-body">
                <div>عدد المدونين</div>
                <div class="bold">
                    {{ \App\Models\User::count() }}
                </div>
                <div class="progress">
                    <div></div>
                </div>
            </div>
        </div>
        <div class="v-card">
            <div class="v-icon">
                <img src="/assets/img/post.svg" width="50" height="50" alt="Users">
            </div>
            <div class="v-card-body">
                <div>عدد المقالات</div>
                <div class="bold">
                    {{ \App\Models\Post::count() }}
                </div>
                <div class="progress">
                    <div></div>
                </div>
            </div>
        </div>
        <div class="v-card">
            <div class="v-icon">
                <img src="/assets/img/group.svg" width="50" height="50" alt="Users">
            </div>
            <div class="v-card-body">
                <div>عدد الزوار</div>
                <div class="bold">
                    {{ \App\Models\Visitor::count() }}
                </div>
                <div class="progress">
                    <div></div>
                </div>
            </div>
        </div>
    </div>
    <div class="table p-3">
        <div class="search">
            <label for="search" class="is-block is-bold mb-3 title is-5">بحث</label>
            <div class="is-flex">
                <input placeholder="ابحث" class="input" id="search"
                       name="search" type="text" wire:model.debounce.500ms="search"
                />
                @if(count($selected))
                    <button wire:click="deletePosts()" class="button is-danger mr-2">
                        حذف
                    </button>
                @endif
            </div>
        </div>
        <table class="mt-2">
            <thead>
                <x-table-header class="is-hoverable" :orderBy="$orderField" :direction="$orderDirection" name="id">رقم</x-table-header>
                <x-table-header :orderBy="$orderField" :direction="$orderDirection" name="title">الايبي</x-table-header>
                <th>البلد</th>
                <x-table-header :orderBy="$orderField" :direction="$orderDirection" name="created_at">تاريخ الزيارة</x-table-header>
            </thead>
            <tbody>
            @foreach($visitors as $visitor)
                @php
                    $data = \Illuminate\Support\Facades\Http::get('http://www.geoplugin.net/json.gp?ip='.$visitor->visitor_ip)->collect();
                @endphp
                <tr>
                    <td>{{ $visitor->id }}</td>
                    <td>{{ $visitor->visitor_ip }}</td>
                    <td>
                        @if($data['geoplugin_countryName'])
                            {{ $data['geoplugin_countryName'] }}
                        @else
                            N/A
                        @endif
                    </td>
                    <td>{{ $visitor->created_at->locale('ar')->diffForHumans() }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    {{ $visitors->links('admin.layouts.pagination') }}
</div>

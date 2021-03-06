<div class="user-sidebar">
    <div class="user-details mb-3">
        <div class="my-card no-box-shadow is-full is-flex is-align-items-center">
            <div class="user-profile-picture is-two-fifths">
                <figure class="image is-96x96">
                    @if(\Illuminate\Support\Facades\Storage::exists($user->user_image))
                        <img class="is-rounded"
                             src="{{ \Illuminate\Support\Facades\Storage::url($user->user_image) }}" alt="{{ $user->username }}"
                        />
                    @else
                        <img class="is-rounded"
                             src="/uploads/author.PNG" alt="{{ $user->username }}"
                        />
                    @endif
                </figure>
            </div>
            <div class="user-profile-info is-three-fifths pr-5">
                <h5 class="title is-5">
                    {{ $user->fullname }}
                </h5>
                <p class="subtitle is-6">{{ $user->speciality }}</p>
            </div>
        </div>
    </div>
    @can('view', request()->route('user'))
        <div class="divider-h"></div>
        <div class="user-options mt-5">
            <div class="my-card no-box-shadow">
                <a
                    href="{{ route('users.profile', $user->id) }}"
                    class="card-header pt-3 pb-3 is-flex is-justify-content-space-between"
                >
                    <div class="card-title is-flex is-align-items-center">
                    <span>
                        <img class="image is-20x20" src="/assets/img/file.svg" alt="blog posts">
                    </span>
                        <div class="card-text mr-2">
                            عدد التدوينات
                        </div>
                    </div>
                    <div class="card-snippet is-rounded has-background-primary">
                        {{ $user->posts()->published()->count() }}
                    </div>
                </a>
            </div>
            <div class="my-card no-box-shadow">
                <a href="{{ route('users.pending', $user->id) }}" class="card-header pt-3 pb-3 is-flex is-justify-content-space-between">
                    <div class="card-title is-flex is-align-items-center">
                    <span>
                        <img class="image is-20x20" src="/assets/img/clock.svg" alt="blog posts">
                    </span>
                        <div class="card-text mr-2">
                            التدوينات المعلقة
                        </div>
                    </div>
                    <div class="card-snippet is-rounded has-background-success">
                        {{ $user->posts()->pending()->count() }}
                    </div>
                </a>
            </div>
            <div class="my-card no-box-shadow">
                <a href="{{ route('users.notifications', $user->id) }}" class="card-header pt-3 pb-3  is-flex is-justify-content-space-between">
                    <div class="card-title is-flex is-align-items-center">
                    <span>
                        <img class="image is-20x20" src="/assets/img/notification.svg" alt="blog posts">
                    </span>
                        <div class="card-text mr-2">
                            الاشعارات
                        </div>
                    </div>
                    <div class="card-snippet is-rounded has-background-info">
                        {{ $user->unreadnotifications()->count() }}
                    </div>
                </a>
            </div>
            <div class="my-card no-box-shadow">
                <a href="{{ route('users.draft', $user->id) }}" class="card-header pt-3 pb-3 is-flex is-justify-content-space-between">
                    <div class="card-title is-flex is-align-items-center">
                    <span>
                        <img class="image is-20x20" src="/assets/img/notes.svg" alt="blog posts">
                    </span>
                        <div class="card-text mr-2">
                            المسودات
                        </div>
                    </div>
                    <div class="card-snippet is-rounded has-background-danger">
                        {{ $user->posts()->draft()->count() }}
                    </div>
                </a>
            </div>
        </div>
        <div class="user-edit is-flex is-flex-direction-column is-align-items-center mt-6 mb-4">
            {{ $slot }}
        </div>
    @endcan

</div>

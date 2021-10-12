@can('update',$post)
    <div class="settings">
        <div class="dropdown">
            <div class="dropdown-trigger">
                <button class="button" aria-haspopup="true" aria-controls="dropdown">
                    <div></div>
                    <div></div>
                    <div></div>
                </button>
            </div>
            <div class="dropdown-menu" id="dropdown" role="menu">
                <div class="dropdown-content">
                    <a href="{{ route('posts.edit',$post->id) }}" class="dropdown-item">
                        تعديل
                    </a>
                    <hr class="dropdown-divider">
                    <a href="#" class="dropdown-item delete-item" data-id="{{ $post->id }}" >حذف</a>
                </div>
            </div>
        </div>
    </div>
    @section('js')
        <script>
            const deleteItems = document.querySelectorAll('.delete-item')
            deleteItems.forEach(deleteItem => {
                deleteItem.addEventListener('click', function(e) {
                    e.preventDefault()
                    id = e.target.getAttribute('data-id')
                    axios.delete(`/posts/${id}`)
                    .then(()=> {
                        location.href = '/'
                    })
                });
            })
        </script>
    @endsection
@endcan

@extends('layouts.app')

@section("content")
    <form action="{{ route('posts.update', $post->id) }}" method="POST" class="post-create" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="container">
            <x-post-sidebar>
                <div class="mb-2">
                    <button id="add-post" class="button min-w-140 is-primary is-rounded">حفظ التعديلات</button>
                </div>
                <div class="mt-2">
                    <button id="add-draft" class="button min-w-140 is-link is-rounded">حفظ كمسودة</button>
                </div>
            </x-post-sidebar>
            <div class="post-content card">
                <div>
                    <input type="hidden" name="status" value="pending" id="status">
                </div>
                <div class="col">
                    <div class="input-container">
                        <label for="title">العنوان</label>
                        <input
                            type="text" name="title" id="title" value="{{ old('title', $post->title) }}"
                        />
                        @error('title')
                        <div class="notification is-flex is-danger mt-1 mb-1 p-2">
                            <span class="delete"></span>
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col">
                    <div class="input-container">
                        <label for="field" class="mb-2">المجال</label>
                        <div class="select">
                            <select id="field" name="field">
                                <?php
                                $categories = \App\Models\Category::all();
                                ?>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('field')
                        <div class="notification is-flex is-danger mt-1 mb-1 p-2">
                            <span class="delete"></span>
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col">
                    <div class="input-container">
                        <label for="thumbnail" class="mb-2">صورة المقال</label>
                        <div id="file-js-example" class="file has-name">
                            <label class="file-label" for="thumbnail">
                                <span class="file-name">
                                </span>
                                <input class="file-input" id="thumbnail" type="file" accept="image/png, image/jpeg" name="thumbnail">
                                <span class="file-cta">
                                    <span class="file-icon">
                                        <i class="fas fa-upload"></i>
                                    </span>
                                    <span class="file-label">
                                        اختر صورة للمقال
                                    </span>
                                </span>
                            </label>
                        </div>
                        @error('thumbnail')
                        <div class="notification is-flex is-danger mt-1 mb-1 p-2">
                            <span class="delete"></span>
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <script>
                        const fileInput = document.querySelector('#file-js-example input[type=file]');
                        fileInput.onchange = () => {
                            if (fileInput.files.length > 0) {
                                const fileName = document.querySelector('#file-js-example .file-name');
                                fileName.textContent = fileInput.files[0].name;
                            }
                        }
                    </script>
                </div>
                <div class="col">
                    <div class="input-container">
                        <label for="excerpt">مقتطف المقال</label>
                        <textarea class="textarea" id="excerpt" name="excerpt">{{ $post->excerpt }}</textarea>
                        @error('excerpt')
                            <div class="notification is-flex is-danger mt-1 mb-1 p-2">
                                <span class="delete"></span>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="col">
                    <div class="input-container">
                        <label for="body">المقال</label>
                        <textarea name="body" id="body">{{ $post->body }}</textarea>
                        @error('body')
                        <div class="notification is-flex is-danger mt-1 mb-1 p-2">
                            <span class="delete"></span>
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col">
                    <div class="input-container">
                        <label for="tags">الكلمات المفتاحية</label>
                        <div class="tags-container" id="tags-container">
                            @foreach($post->tags as $tag)
                                <div class="tag-btn" >
                                    <input type="text" readonly="true" name="tags[]" value="{{ $tag->name }}">
                                    <span class="delete">X</span>
                                </div>
                            @endforeach
                            <input id="tags-input" />
                        </div>
                        @error('tags')
                            <div class="notification is-flex is-danger mt-1 mb-1 p-2">
                                <span class="delete"></span>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
@section('js')
    <script src="https://cdn.tiny.cloud/1/ksvwozf043d52zjtlx7d72k43r3fj6vor8vna73n9i49u71y/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        const tagsInput = document.getElementById("tags-input")
        const tags = document.getElementById("tags")
        const tagsContainer = document.getElementById("tags-container")
        let cats = [];
        tagsInput.addEventListener('keydown', function (e) {
            if(e.code !== 'Enter') {
                return;
            }
            e.preventDefault()
            if(tagsInput.value === '') {
                return;
            }
            // create the tag div
            const newDiv = document.createElement('div')
            newDiv.setAttribute('class','tag-btn')
            // create the input for the tag
            const myInput =  document.createElement('input')
            myInput.setAttribute('name', 'tags[]')
            myInput.setAttribute('type', 'text')
            myInput.setAttribute('readonly', true)
            myInput.setAttribute('value', e.target.value)
            myInput.style.width = (e.target.value.length) + 2 + "ch"
            newDiv.appendChild(myInput)

            // create the close Span
            const closeSpan = document.createElement('span')
            closeSpan.textContent = "X"
            closeSpan.setAttribute('class','delete')
            closeSpan.addEventListener('click', function() {
                tagsContainer.removeChild(newDiv)
            })
            newDiv.appendChild(closeSpan)
            // append to tag container
            tagsContainer.insertBefore(newDiv, this);

            tagsInput.value = ''
        })

        tinymce.init({
            selector: '#body',
            height:350,
            plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
            menu: {
                file: { title: 'File', items: 'newdocument restoredraft | preview | print ' },
                edit: { title: 'Edit', items: 'undo redo | cut copy paste | selectall | searchreplace' },
                view: { title: 'View', items: 'code | visualaid visualchars visualblocks | spellchecker | preview fullscreen' },
                insert: { title: 'Insert', items: 'image link media template codesample inserttable | charmap emoticons hr | pagebreak nonbreaking anchor toc | insertdatetime' },
                format: { title: 'Format', items: 'bold italic underline strikethrough superscript subscript codeformat | formats blockformats fontformats fontsizes align lineheight | forecolor backcolor | removeformat' },
                tools: { title: 'Tools', items: 'spellchecker spellcheckerlanguage | code wordcount' },
                table: { title: 'Table', items: 'inserttable | cell row column | tableprops deletetable' },
                help: { title: 'Help', items: 'help' }
            },
            toolbar_mode: 'floating',
        });
        const addForm = document.querySelector('.post-create')
        const addDraft = document.querySelector('#add-draft')
        const postStatus = document.querySelector('#status')

        addDraft.addEventListener('click', function(e) {
            postStatus.value = "draft"
        });
    </script>
@endsection


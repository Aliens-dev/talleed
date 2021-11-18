@extends("layouts.auth")

@section('title', 'تسجيل مستخدم جديد')

@section('content')

    @if(session()->has('success'))
        <div class="modal is-active">
            <div class="modal-background"></div>
            <div class="modal-content">
                <x-my-divider :line="false">
                    <a href="{{route('index')}}">العودة الى الرئيسية</a>
                </x-my-divider>
                <div class="modal-image">
                    <img src="/assets/img/logo-invert.svg" alt="taleed Logo" />
                </div>
                <div class="modal-message">
                    تم التسجيل بنجاح, من فضلك تفقد ايميلك لتفعيل الحساب
                </div>
            </div>
            <button class="modal-close is-large" aria-label="close"></button>
        </div>
    @endif
    <div class="register-page">
        <x-my-divider :line="true">
            <a href="{{route('index')}}">العودة الى الرئيسية</a>
        </x-my-divider>
        <div class="container">
            <form action="{{ route('register.post') }}" method="POST" class="register-form" enctype="multipart/form-data">
                @csrf
                <div class="input-side">
                    <div class="form-title">
                        التسجيل
                    </div>
                    <div class="col">
                        <div class="input-container">
                            <label for="fname">الاسم</label>
                            <input
                                type="text" name="fname" id="fname" value="{{ old('fname') }}"
                            />
                            @error('fname')
                                <div class="notification is-flex is-danger mt-1 mb-1 p-2">
                                    <span class="delete"></span>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="input-container">
                            <label for="lname">اللقب</label>
                            <input
                                type="text" name="lname" id="lname" value="{{ old('lname') }}"
                            />
                            @error('lname')
                                <div class="notification is-flex is-danger mt-1 mb-1 p-2">
                                    <span class="delete"></span>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="input-container">
                            <label for="field">المجال</label>
                            <div class="select is-flex">
                                <select id="field" name="field_id" class="is-flex is-100">
                                    @foreach(\App\Models\Category::all() as $cat)
                                        <option value="{{ $cat->id }}"> {{ $cat->name }}</option>
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
                        <div class="input-container">
                            <label for="speciality">تخصصك</label>
                            <input id="speciality" name="speciality" value="{{ old('speciality') }}"
                                placeholder="باحث, عالم ..."
                            >
                            @error('speciality')
                                <div class="notification is-flex is-danger mt-1 mb-1 p-2">
                                    <span class="delete"></span>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="input-container">
                            <label for="username">اسم المستخدم</label>
                            <input
                                type="text" name="username" id="username" value="{{ old('username') }}"
                            />
                            @error('username')
                            <div class="notification is-flex is-danger mt-1 mb-1 p-2">
                                <span class="delete"></span>
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="input-container">
                            <label for="about_me">نبذة عنك</label>
                            <textarea class="textarea" name="about_me" placeholder="اخبرنا عنك" id="about_me">{{ old('about_me') }}</textarea>
                            @error('about_me')
                                <div class="notification is-flex is-danger mt-1 mb-1 p-2">
                                    <span class="delete"></span>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="input-container">
                            <label for="social_media_account">حساب التواصل الاجتماعي</label>
                            <input
                                type="text" name="social_media_account" id="social_media_account" value="{{ old('social_media_account') }}"
                                placeholder="فيسبوك,تويتر او انستغرام"
                            />
                            @error('social_media_account')
                                <div class="notification is-flex is-danger mt-1 mb-1 p-2">
                                    <span class="delete"></span>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="input-container">
                            <label for="email">الايميل</label>
                            <input
                                type="text" name="email" id="email" value="{{ old('email') }}"
                            />
                            @error('email')
                            <div class="notification is-flex is-danger mt-1 mb-1 p-2">
                                <span class="delete"></span>
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="input-container">
                            <label for="password">كلمة المرور</label>
                            <input
                                type="password" name="password" id="password"
                            />
                            @error('password')
                                <div class="notification is-flex is-danger mt-1 mb-1 p-2">
                                    <span class="delete"></span>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="input-container">
                            <label for="password_confirmation">تاكيد كلمة المرور</label>
                            <input
                                type="password" name="password_confirmation" id="password_confirmation"
                            />
                            @error('password_confirmation')
                                <div class="notification is-flex is-danger mt-1 mb-1 p-2">
                                    <span class="delete"></span>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="input-container">
                            <div class="is-flex is-align-items-center">
                                <input
                                    type="checkbox" name="policy" id="policy"
                                />
                                <label for="policy" class="pr-2 mb-2">
                                    قرات و اوافق على <a href="#" id="policy-rules">الشروط</a>
                                </label>
                            </div>
                            <div class="modal" id="policy-modal">
                                <div class="modal-background"></div>
                                <div class="modal-content" style="width:800px">
                                    <div class="modal-image">
                                        <img src="/assets/img/logo-invert.svg" alt="taleed Logo" />
                                    </div>
                                    <div class="modal-message">
                                        <div class="modal-message-policy">
                                            <div>
                                                <span>1-</span>
                                                <div>للإدارة كل الحق في قبول تسجيلكم أو رفضه حسب المعلومات التي قمتم بإرسالها ومدى صحتها.</div>
                                            </div>
                                            <div>
                                                <span>2-</span>
                                                <div>يجب أن تكون المعلومات المُدرجة حقيقية إنطلاقاً من الإسم الكامل، الصورة وكذلك نبذة عن المدون وحساب التواصل الإجتماعي الخاص به.</div>
                                            </div>
                                            <div>
                                                <span>3-</span>
                                                <div>بعد قبولكم من طرف الإدارة سيكون بإمكانكم التدوين في مجالات إختصاصكم وإهتمامكم بشرط أن يكون المقال مرفق بمصادر (مواقع موثوقة، كتب، سند شرعي في حالة كان المقال دينيا) تثبت صحة مضمونه.</div>
                                            </div>
                                            <div>
                                                <span>4-</span>
                                                <div>الصور المضافة مع المقال يجب أن تكون ذات جودة جيدة وإلا سيتم إستبدالها من طرف المدققين.</div>
                                            </div>
                                            <div>
                                                <span>5-</span>
                                                <div>نظراً لأهمية SEO، فيمكن أن تطرأ تغييرات على بعض الكلمات في عنوان المقال الذي تود نشره أو في المقتطف أو في  المقال بحد ذاته.</div>
                                            </div>
                                            <div>
                                                <span>6-</span>
                                                <div>أي مقال مخالف للقوانين المذكورة أعلاه لا يمر.</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button class="modal-close is-large" aria-label="close"></button>
                            </div>
                            @error('policy')
                                <div class="notification is-flex is-danger mt-1 mb-1 p-2">
                                    <span class="delete"></span>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="input-container control">
                            <button class="button">التسجيل</button>
                        </div>
                    </div>
                    <div class="col">
                        <a href="{{route('login')}}" class="underline text-sm text-gray-600 hover:text-gray-900">
                            لديك حساب ؟
                        </a>
                    </div>
                </div>
                <div class="form-side">
                    <div class="wrapper"></div>
                    <div class="image-container">
                        <div class="user-image" >
                            <img id="user_icon" src="/assets/img/user-icon.png" alt="user_image" />
                        </div>
                        <input class="is-hidden" type="file" name="user_image" id="user_image" />
                        <label for="user_image">قم باختيار صورتك الشخصية</label>
                        @error('user_image')
                            <div class="notification is-flex is-danger mt-1 mb-1 p-2">
                                <span class="delete"></span>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="auth-brand">
                        <div class="auth-col-social">
                            <a href="">
                                <img src="/assets/img/twitter.svg" style="width:35px;height: 35px" alt="twitter taleed" />
                            </a>
                            <a href="">
                                <img src="/assets/img/youtube.svg" style="width:35px;height: 35px"  alt="youtube taleed" />
                            </a>
                            <a href="">
                                <img src="/assets/img/instagram.svg" style="width:30px;height: 35px"  alt="instagram taleed" />
                            </a>
                            <a href="">
                                <img src="/assets/img/facebook.svg" style="width:30px;height: 35px"  alt="facebook taleed" />
                            </a>
                            <a href="">
                                <img src="/assets/img/telegram.svg" style="width:35px;height: 35px"  alt="telegram taleed" />
                            </a>
                        </div>
                        <div class="auth-logo">
                            <img src="{{ asset('./assets/img/logo.svg') }}" alt="taleed" />
                        </div>
                        <div class="auth-rights">
                            جميع الحقوق محفوظة @ 2021 موقع تليد
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('js')
    <script>
        const policy = document.getElementById('policy-rules');
        const policyModal = document.getElementById('policy-modal');
        policy.addEventListener('click', function(e) {
            e.preventDefault();
            policyModal.classList.add('is-active');
        })
    </script>
@endsection

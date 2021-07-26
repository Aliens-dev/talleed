
<div class="admin-sidebar">
    <div class="sidebar-back"></div>
    <div class="sidebar-header">
        <div class="image">
            <img src="/uploads/man.svg" alt="admin-taleed" />
        </div>
        <span class="title">Taleed</span>
    </div>
    <div class="divider"></div>
    <div class="sidebar-body">
        <div class="sidebar-items">
            <a href="{{ route('admin.dashboard') }}" class="sidebar-item ripple">
                <div class="icon">
                    <img src="/assets/img/dashboard.svg" width="20" height="20" alt="">
                </div>
                <div class="text">لوحة التحكم</div>
            </a>
            <a  href="{{ route('admin.users.index') }}" class="sidebar-item ripple">
                <div class="icon">
                    <img src="/assets/img/group.svg" width="20" height="20" alt="">
                </div>
                <div class="text">المستخدمين</div>
            </a>
            <a  href="{{ route('admin.posts.index') }}" class="sidebar-item ripple">
                <div class="icon">
                    <img src="/assets/img/post.svg" width="20" height="20" alt="">
                </div>
                <div class="text">المقالات</div>
            </a>
            <a  href="{{ route('admin.categories.index') }}" class="sidebar-item ripple">
                <div class="icon">
                    <img src="/assets/img/list.svg" width="20" height="20" alt="">
                </div>
                <div class="text">المجالات</div>
            </a>
            <a  href="{{ route('admin.tags.index') }}" class="sidebar-item ripple">
                <div class="icon">
                    <img src="/assets/img/tag.svg" width="20" height="20" alt="">
                </div>
                <div class="text">الكلمات المفتاحية</div>
            </a>
            <a  href="{{ route('admin.account.index') }}" class="sidebar-item ripple">
                <div class="icon">
                    <img src="/assets/img/user.svg" width="20" height="20" alt="">
                </div>
                <div class="text">حسابي</div>
            </a>
            <a href="#" class="sidebar-item ripple">
                <div class="icon">
                    <img src="/assets/img/settings.svg" width="20" height="20" alt="">
                </div>
                <div class="text">الاعدادات</div>
            </a>
        </div>
    </div>
</div>

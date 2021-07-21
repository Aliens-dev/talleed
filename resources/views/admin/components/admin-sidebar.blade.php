
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
                    <i class="fa fa-dashboard"></i>
                </div>
                <div class="text">لوحة التحكم</div>
            </a>
            <a  href="{{ route('admin.users.index') }}" class="sidebar-item ripple">
                <div class="icon">
                    <i class="fa fa-users"></i>
                </div>
                <div class="text">المستخدمين</div>
            </a>
            <a  href="{{ route('admin.posts.index') }}" class="sidebar-item ripple">
                <div class="icon">
                    <i class="fa fa-users"></i>
                </div>
                <div class="text">المقالات</div>
            </a>
            <a  href="{{ route('admin.categories.index') }}" class="sidebar-item ripple">
                <div class="icon">
                    <i class="fa fa-users"></i>
                </div>
                <div class="text">المجالات</div>
            </a>
            <a  href="{{ route('admin.tags.index') }}" class="sidebar-item ripple">
                <div class="icon">
                    <i class="fa fa-users"></i>
                </div>
                <div class="text">الكلمات المفتاحية</div>
            </a>
            <a  href="{{ route('admin.users.index') }}" class="sidebar-item ripple">
                <div class="icon">
                    <i class="fa fa-users"></i>
                </div>
                <div class="text">حسابي</div>
            </a>
            <a href="#" class="sidebar-item ripple">
                <div class="icon">
                    <i class="fa fa-cog"></i>
                </div>
                <div class="text">الاعدادات</div>
            </a>
        </div>
    </div>
</div>

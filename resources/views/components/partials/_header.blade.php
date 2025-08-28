<!--start top header-->
<header class="top-header">
    <nav class="navbar navbar-expand">
        <div class="mobile-toggle-icon d-xl-none">
            <i class="bi bi-list"></i>
        </div>
        <div class="top-navbar-right ms-auto">
            <form action="{{ route('logout') }}" method="post">
                @method('delete')
                @csrf
                <button type="submit" class="user-setting d-flex align-items-center gap-1">
                    <div class="user-img d-flex align-items-center justify-content-center">
                        <i class="bi bi-power" style="font-size: 20px; font-weight: bold;"></i>
                    </div>
                    <div class="user-name d-none d-sm-block">Keluar</div>
                </button>
            </form>
        </div>
    </nav>
</header>
<!--end top header-->
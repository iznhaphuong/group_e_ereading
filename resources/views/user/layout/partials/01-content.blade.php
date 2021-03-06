<div class="type-01">
    <div class="container py-3">
        <nav class="navbar navbar-expand-lg bg-white">
          <a href="{{ url('/') }}"><img style="width:240px;" src="{{ asset('images/header.png') }}" alt=""></a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-lg-0 d-flex">
                    <li class="nav-item me-2">
                        <a class="nav-link sign-in" href="{{ url('dang-nhap') }}">Đăng nhập</a>
                    </li>
                    <li class="nav-item me-2">
                        <a class="nav-link sign-up" href="{{ url('dang-ki') }}">Đăng kí</a>
                    </li>
                    <li class="nav-item me-2">
                        <a class="nav-link user" href="#"><i class="fa-solid fa-user-large pe-1"></i>Thành
                            viên</a>
                    </li>
                    <li class="nav-item me-2">
                        <a class="nav-link sign-out" href="#"><i
                                class="fa-solid fa-right-from-bracket"></i>Thoát</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>

@push('footer-js')
    <script src="js/script-02.js"></script>
@endpush

<div class="type-02">
    <nav class="navbar navbar-expand-lg bg-white nav-light nav-bd-y">
        <div class="container">
            <button class="navbar-toggler cl-black" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <img style="width: 30px" src="{{ asset('images/hamburger-icon-menu.png') }}" alt="menu">
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ url('/') }}">Trang chủ</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Danh sách
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ url('chi-tiet/1') }}">Chi tiết</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Truyện HOT</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Mới cập nhật</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Top lượt xem</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Đã hoàn thành</a></li>

                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Thể loại
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Hành động</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Lịch sử</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Hài hước</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Bí ẩn</a></li>
                        </ul>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="{{ url('dang-theo-doi') }}">Theo dõi</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="{{ url('lich-su') }}">Lịch sử</a>
                    </li>
                </ul>
                <form action="" class="d-flex">
                    <div class="search-box">
                        <button class="btn-search"><i class="fas fa-search"></i></button>
                        <input type="text" class="input-search" placeholder="Nhập từ khóa...">
                    </div>
                </form>
            </div>
        </div>
    </nav>
</div>

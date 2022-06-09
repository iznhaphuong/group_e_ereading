<?php
$url_host = 'http://' . $_SERVER['HTTP_HOST'];
$pattern_document_root = addcslashes(realpath($_SERVER['DOCUMENT_ROOT']), '\\');
$pattern_uri = '/' . $pattern_document_root . '(.*)$/';

preg_match_all($pattern_uri, __DIR__, $matches);
$url_path = $url_host . $matches[1][0];
$url_path = str_replace('\\', '/', $url_path);
?>

<div class="type-23">
    <div class="container">
        <div class="my-5 browsing">Lịch sử</div>
        <div class="row wrap-23">
            <div class="col-md-3 col-sm-12">
                <div class="container">
                    <!-- Sort -->
                    <select class="mb-3 form-select form-select-sm" aria-label=".form-select-sm example">
                        <option disabled selected>Sắp xếp theo</option>
                        <option value="1">Cũ nhất</option>
                        <option value="2">Mới nhất</option>
                        <option value="3">A-Z</option>
                    </select>
                    <!-- Search box -->
                    <div id="search-box" class="d-flex justify-content-end mb-3">
                        <form action="">
                            <div class="search-box">
                                <button class="btn-search"><i class="fas fa-search"></i></button>
                                <input type="text" class="input-search" placeholder="Nhập từ khóa...">
                            </div>
                        </form>
                    </div>
                    <!-- Clear button -->
                    <button class="btn-clear">Clear All <i class="fa-solid fa-trash-can"></i></a></button>
                </div>
            </div>
            <div class="col-md-9 col-sm-12">
                <!-- Content -->
                <div class="row row-cols-2 row-cols-md-4 g-3">
                    <div class="col">
                        <div class="card text-white">
                            <img src="./images/thandaodanton.jpg" class="card-img" alt="...">
                            <div class="card-img-overlay">
                                <div class="m-group-button">
                                    <ul>
                                        <li class="button-item"><a href="#" title="Đọc tiếp"><i class="fa-solid fa-book-open"></i></a></li>
                                        <li class="button-item"><a href="#" title="Xóa"><i class="fa-solid fa-trash-can"></i></a></li>
                                    </ul>
                                </div>
                                <div class="m-wrap-infor">
                                    <h5 class="card-title text-capitalize pb-2">Thiên đạo thần tôn</h5>
                                    <div class="card-text d-flex justify-content-between pb-4"><span class="text-capitalize">Cô
                                            đơn
                                            địa phi
                                            - </span>5 ngày trước<span class="comment "><i class="fa-solid fa-comment"></i>
                                            3</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card text-white">
                            <img src="./images/thandaodanton.jpg" class="card-img" alt="...">
                            <div class="card-img-overlay">
                                <div class="m-group-button">
                                    <ul>
                                        <li class="button-item"><a href="#" title="Đọc tiếp"><i class="fa-solid fa-book-open"></i></a></li>
                                        <li class="button-item"><a href="#" title="Xóa"><i class="fa-solid fa-trash-can"></i></a></li>
                                    </ul>
                                </div>
                                <div class="m-wrap-infor">
                                    <h5 class="card-title text-capitalize pb-2">Thiên đạo thần tôn</h5>
                                    <div class="card-text d-flex justify-content-between pb-4"><span class="text-capitalize">Cô
                                            đơn
                                            địa phi
                                            - </span>5 ngày trước<span class="comment"><i class="fa-solid fa-comment"></i>
                                            3</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card text-white">
                            <img src="./images/thandaodanton.jpg" class="card-img" alt="...">
                            <div class="card-img-overlay">
                                <div class="m-group-button">
                                    <ul>
                                        <li class="button-item"><a href="#" title="Đọc tiếp"><i class="fa-solid fa-book-open"></i></a></li>
                                        <li class="button-item"><a href="#" title="Xóa"><i class="fa-solid fa-trash-can"></i></a></li>
                                    </ul>
                                </div>
                                <div class="m-wrap-infor">
                                    <h5 class="card-title text-capitalize pb-2">Thiên đạo thần tôn</h5>
                                    <div class="card-text d-flex justify-content-between pb-4"><span class="text-capitalize">Cô
                                            đơn
                                            địa phi
                                            - </span>5 ngày trước<span class="comment"><i class="fa-solid fa-comment"></i>
                                            3</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card text-white">
                            <img src="./images/thandaodanton.jpg" class="card-img" alt="...">
                            <div class="card-img-overlay">
                                <div class="m-group-button">
                                    <ul>
                                        <li class="button-item"><a href="#" title="Đọc tiếp"><i class="fa-solid fa-book-open"></i></a></li>
                                        <li class="button-item"><a href="#" title="Xóa"><i class="fa-solid fa-trash-can"></i></a></li>
                                    </ul>
                                </div>

                                <div class="m-wrap-infor">
                                    <h5 class="card-title text-capitalize pb-2">Thiên đạo thần tôn</h5>
                                    <div class="card-text d-flex justify-content-between pb-4"><span class="text-capitalize">Cô
                                            đơn
                                            địa phi
                                            - </span>5 ngày trước<span class="comment"><i class="fa-solid fa-comment"></i>
                                            3</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Pagination -->
    <div class="mt-5 d-flex justify-content-center ">
        <nav aria-label="Pagination">
            <ul class="pagination">
                <li class="page-item active"><a class="page-link" href="#"><i class="fa-solid fa-angle-left"></i></a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#"><i class="fa-solid fa-angle-right"></i></a></li>
            </ul>
        </nav>
    </div>
</div>
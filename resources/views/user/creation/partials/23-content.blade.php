{{-- My CSS File --}}
@push('head-css')
    <link name="style-23" rel="stylesheet" href="{{ asset('css/style-23.css') }}">
@endpush

{{-- My JS File --}}
@push('footer-js')
    <script src="{{ asset('js/script-23.js') }}"></script>
@endpush

<div class="type-23">
    <div class="container mb-5">
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
                    <button class="btn-clear">Dọn dẹp <i class="fa-solid fa-trash-can"></i></a></button>
                </div>
            </div>
            <div class="col-md-9 col-sm-12">
                <!-- Content -->
                <div class="row row-cols-2 row-cols-md-4 g-3" id="creation-show">
                </div>
            </div>
        </div>
    </div>
</div>

{{-- My CSS File --}}
@push('head-css')
    <link name="style-23" rel="stylesheet" href="{{ asset('css/style-24.css') }}">
@endpush

{{-- My JS File --}}
@push('footer-js')
    <script src="{{ asset('js/script-24.js') }}"></script>
@endpush

<div class="type-24">
    <div class="container">
        <div class="my-5 browsing">Đang theo dõi</div>
        <div class="row wrap-23">
            <div class="col-md-3 col-sm-12">
                <div class="container">
                    <!-- Sort -->
                    <form action="{{ url('dang-theo-doi') }}" method="get">
                        @csrf
                        <select name="sort"
                            data-select="@isset($sort) {{ $sort }}@else{{ 0 }} @endisset"
                            class="mb-3 form-select form-select-sm" aria-label=".form-select-sm example">
                            <option value="0" disabled>Sắp xếp theo</option>
                            <option value="1">Mới thêm gần đây</option>
                            <option value="2">A-Z</option>
                            <option value="3">Z-A</option>
                        </select>
                        <input id="q_clone" type="hidden" name="q"
                            value="@isset($keyword){{ $keyword }}@endisset">
                        <!-- Filter button -->
                        <button class="btn-clear w-100 mb-3">Lọc<i class="fa-solid fa-filter"></i></a></button>
                    </form>
                    <!-- Search box -->
                    <form action="{{ url('dang-theo-doi') }}" method="get">
                        @csrf
                        <div id="search-box" class="d-flex justify-content-end mb-3">
                            <div class="search-box">
                                <button class="btn-search" type="submit"><i class="fas fa-search"></i></button>
                                <input onkeyup="updatefield()"
                                    value="@isset($keyword){{ $keyword }}@endisset"
                                    name="q" id="keyword-following" type="text" class="input-search"
                                    placeholder="Nhập từ khóa...">
                            </div>
                        </div>
                    </form>
                    @isset($message)
                        <i style="color:green">{{ $message }}</i>
                    @endisset
                </div>
            </div>
            <div class="col-md-9 col-sm-12">
                <!-- Content -->
                <div class="row row-cols-2 row-cols-md-4 g-3" id="content-following">
                    @foreach ($creations as $creation)
                        <div class="col">
                            <div class="card text-white">
                                <img src="{{ asset('images/covers/' . $creation->image) }}" class="card-img"
                                    alt="...">
                                <div class="card-img-overlay">
                                    <div class="m-group-button">
                                        <ul>
                                            @php
                                                $id = md5($creation->id . $creation->name);
                                            @endphp
                                            <li class="button-item"><a href="{{ url('chi-tiet/' . $id) }}"
                                                    title="Đọc tiếp"><i class="fa-solid fa-book-open"></i></a></li>
                                            <li class="unfollow"
                                                data-url={{ url()->current() }}
                                                data-id="{{ $creation->id }}"
                                                data-name="{{ $creation->name }}"
                                                class="button-item"><a
                                                data-bs-toggle="modal" data-bs-target="#notice"
                                                title="Bỏ theo dõi"><i class="fa-solid fa-heart-crack"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="m-wrap-genre">
                                        @if ($creation->status == 1)
                                            <div class="genre-item full"></div>
                                        @endif
                                        {{-- <div class="genre-item new"></div> --}}
                                        {{-- <div class="genre-item hot"></div> --}}
                                    </div>
                                    <div class="m-wrap-infor">
                                        <h5 class="card-title text-capitalize pb-2">{{ $creation->name }}</h5>
                                        <div class="card-text d-flex justify-content-between pb-4"><span
                                                class="text-capitalize">{{ $creation->author }}</span>5 ngày
                                            trước
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    {{ $creations->links('default.pagination') }}

    <!-- Modal -->
    <form action="{{ url()->current() }}" method="POST" class="modal fade" id="notice" tabindex="-1"
        aria-labelledby="notice-title" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="notice-title"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="notice-body">
                </div>
                @csrf
                <input type="hidden" id="id_hidden" name="id">
                <input type="hidden" id="url_hidden" name="url" value="{{ url()->current() }}">
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                    <button id="delete" type="submit" class="btn btn-primary">Bỏ theo dõi</button>
                </div>
            </div>
        </div>
    </form>
</div>

{{-- My CSS File --}}
@push('head-css')
    <link name="style-09" rel="stylesheet" href="{{ asset('css/style-09.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
@endpush

@push('footer-js')
    <script src="{{ asset('js/script-09.js') }}"></script>
@endpush

<div class="type-09">
    <div class="container">
        <div class="text-uppercase my-5 browsing">{{ $creation->name }}</div>
        <hr class="pb-3">
        <div class="card my-3">
            <div class="row g-0 mt-3">
                <div class="col-md-3">
                    <div class="card-image">
                        <img src="{{ asset('images/covers/' . $creation->image) }}" class="img-card rounded"
                            alt="">
                        </a>
                    </div>
                </div>
                <div class="col-md-9">
                    <h3 class="card-title text-uppercase pb-2 ps-4">{{ $creation->name }}</h3>
                    <ul class="pl-0 detail-content">
                        <li class="row">
                            <p class="col-2"><i style="font-weight: bold;" class="fa fa-user"></i> Tác giả</p>
                            <p class="col-10">{{ $creation->author }}</p>
                        </li>
                        <li class="row">
                            <p class="col-2"><i style="font-weight: bold;" class="fa fa-tag"></i> Thể loại</p>
                            <div class="col-10">
                                <a href="#">Cổ đại -</a>
                                <a href="#">Kiếm hiệp -</a>
                                <a href="#">Bi kịch</a>
                            </div>
                        </li>

                        <li class="row">
                            <p class="col-2">
                                @if ($creation->status == 0)
                                    <i class="fa-solid fa-toggle-off" style="color:red"></i>
                                    Trạng thái
                            </p>
                            <p class="col-10" style="color:red">Chưa hoàn thành</p>
                        @elseif ($creation->status == 1)
                            <i class="fa-solid fa-toggle-on" style="color:green"></i>
                            Trạng thái</p>
                            <p class="col-10" style="color:green">Đã hoàn thành</p>
                            @endif
                        </li>
                        <li class="row">
                            <p class="col-2"><i style="font-weight: bold;" class="fa fa-clock"></i> Số chương</p>
                            <p class="col-10">28/??</p>
                        </li>
                        <li class="row">
                            <p class="col-2"><i style="font-weight: bold;" class="fa fa-eye"></i> Lượt xem</p>
                            <p class="col-10">{{ $creation->view }}</p>
                        </li>
                        <li class="row">
                            <p class="col-12">
                                <a id="read_story" href="{{ url('reading/1/chapter/1') }}"
                                    class="btn btn-success text-white read-first-chap">Đoc Từ Đầu</a>
                                <a id="read_new_story" href="#"
                                    class="btn btn-primary text-white read-new-chap">Đọc Mới Nhất</a>
                                @if ($is_followed == 1)
                                    <a id="unfollow" data-id="{{ $creation->id }}" data-name="{{ $creation->name }}"  data-bs-toggle="modal" data-bs-target="#notice" class="unfollow-link btn btn-warning"><i class="fa-solid fa-heart-crack"></i> Bỏ theo dõi</a>
                                @else
                                    <a class="follow-link btn btn-danger text-white"><i class="fa-solid fa-heart"></i>
                                        Theo dõi</a>
                                @endif
                            </p>
                        </li>
                        <li class="me-0">
                            <!-- Rating bar -->

                            <!-- <form action="{{ url('add-rating') }}" method="POST">
                            @csrf
                                <div class="stars">
                                    <input type="radio" name="star" class="star-1" id="star-1" />
                                    <label class="star-1" for="star-1">1</label>
                                    <input type="radio" name="star" class="star-2" id="star-2" />
                                    <label class="star-2" for="star-2">2</label>
                                    <input type="radio" name="star" class="star-3" id="star-3" />
                                    <label class="star-3" for="star-3">3</label>
                                    <input type="radio" name="star" class="star-4" id="star-4" />
                                    <label class="star-4" for="star-4">4</label>
                                    <input type="radio" name="star" class="star-5" id="star-5" />
                                    <label class="star-5" for="star-5">5</label>
                                    <span></span>
                                </div>
                            </form> -->

                        </li>
                    </ul>
                    <hr>
                    <div id="rateYo"></div>

                    <form action="{{ route('rating') }}" method="POST" class="form-inline" id="formRating"
                        role="form">
                        @csrf
                        <div class="from-group">
                            <input class="form-control" name="star" id="star" />
                            <input class="form-control" name="creation_id" id="creation_id"
                                value="{{ $creation->id }}" />
                            <input class="form-control" name="user_id" id="user_id" value="1" />
                        </div>
                    </form>
                </div>
            </div>
            <!-- Description -->
            <div class="wrap-description mt-5 mb-0">
                <p class="title-list text-uppercase"><i class='fa fa-book'></i> danh sách chương</p>
                <hr>
                <p>{{ $creation->description }}</p>
            </div>
            <!-- Chapter list -->
            <div id="chapters" class="mt-4">
                <p class="title-list text-uppercase"><i class='fa fa-list'></i> danh sách chương</p>
                <hr class="pb-3">
                <ul class="chapters v0">
                    <li><a class="py-2" href="#" title="Chương 1 - Tây Sơn biệt viện">Chương 1 - Tây Sơn biệt
                            viện</a></li>
                    <li><a class="py-2" href="#" title="Chương 2 - Ôn Tuyện thuy trượt">Chương 2 - Ôn Tuyện
                            thuy trượt</a></li>
                </ul>
            </div>
        </div>

        <!-- Pagination -->
        <div class="my-5 d-flex justify-content-center ">
            <nav aria-label="Pagination">
                <ul class="pagination">
                    <li class="page-item"><a class="page-link" href="#"><i
                                class="fa-solid fa-angle-left"></i></a></li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#"><i
                                class="fa-solid fa-angle-right"></i></a></li>
                </ul>
            </nav>
        </div>
        <!-- Modal -->
        <form action="{{ url()->current() }}" method="POST" class="modal fade" id="notice"
            tabindex="-1" aria-labelledby="notice-title" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="notice-title"></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
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
</div>

@push('footer-js')
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
    {{-- <script>
        $(function() {
            let ratingAvg = '{{ $ratingAvg }}';
            $("#rateYo").rateYo({
                rating: ratingAvg,
                fullStar: true,
                numStars: 5
            }).on("rateyo.set", function(e, data) {
                $('#star').val(data.rating);
                $('#formRating').submit();
            });
            //  $("#rateYo-log").rateYo({
            //    rating: 3,
            //    fullStar: true,
            //    numStars: 5
            //  }).on("rateyo.set", function(e,data){
            //     // $('#rating-star').val(data.rating);
            //     alert("Vui lòng đăng nhập để đánh giá");
            //  })
        });
        // Getter
        var normalFill = $("#rateYo").rateYo("option", "fullStar"); //returns true

        // Setter
        $("#rateYo").rateYo("option", "fullStar", true); //returns a jQuery Element
    </script> --}}
@endpush

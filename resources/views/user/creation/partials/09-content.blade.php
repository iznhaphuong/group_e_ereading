{{-- My CSS File --}}
@push('head-css')
<link name="style-09" rel="stylesheet" href="{{ asset('css/style-09.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
@endpush

@push('footer-js')
<script src="{{ asset('js/script-09.js') }}"></script>
@endpush
<?php

use App\Http\Controllers\Controller;

$controller = new Controller();
$userId = $controller->getUUID();


?>
<div class="type-09">
    <div class="container">
        <div class="text-uppercase my-5 browsing">{{ $creation->name }}</div>
        <hr class="pb-3">
        <div class="card my-3">
            <div class="row g-0 mt-3">
                <div class="col-md-3">
                    <div class="card-image">
                        <img src="{{ asset('images/covers/' . $creation->image) }}" class="img-card rounded" alt="">
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
                                @php
                                $id = md5($creation->id . $creation->name);
                                @endphp
                                <a id="read_story" href="{{ route('chapter.show', $id) }}" class="btn btn-success text-white read-first-chap">Đọc Từ Đầu</a>
                                <a id="read_new_story" href="#" class="btn btn-primary text-white read-new-chap">Đọc Mới Nhất</a>
                                <span id="wrap-follow">
                                    @if ($is_followed == 1)
                                    <span id="unfollow" onclick="unfollow()" data-id="{{ $creation->id }}" data-name="{{ $creation->name }}" data-url="{{ url()->current() }}" data-bs-toggle="modal" data-bs-target="#notice" class="unfollow-link btn btn-warning"><i class="fa-solid fa-heart-crack"></i> Bỏ theo dõi</span>
                                    @else
                                    <span onclick="followCreation()" id="follow" data-id="{{ $creation->id }}" data-name="{{ $creation->name }}" data-url="{{ url()->current() }}" class="follow-link btn btn-danger text-white"><i class="fa-solid fa-heart"></i>
                                        Theo dõi</span>
                                    @endif
                                </span>
                            </p>
                        </li>

                    </ul>
                    <hr>
                    <!-- Rating -->
                    <div class="rating-star" style="display:flex">
                        <div id="rateYo"></div>
                        <h4 id="star-avg"></h4>
                    </div>
                    @if (session('messFail'))
                    <div class="alert alert-success">
                        {{ session('messFail') }}
                    </div>
                    @endif
                    @if (session('messSuc'))
                    <div class="alert alert-success">
                        {{ session('messSuc') }}
                    </div>
                    @endif
                    <form action="{{route('rating')}}" method="POST" class="form-inline" id="formRating" role="form">
                        @csrf

                        <div class="from-group">
                            <input type="hidden" class="form-control" name="star" id="star" />
                            <input type="hidden" class="form-control" name="creation_id" id="creation_id" value="{{ $creation->id }}" />
                            <input type="hidden" class="form-control" name="user_id" id="user_id" value="{{$userId}}" />
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
                    <li class="page-item"><a class="page-link" href="#"><i class="fa-solid fa-angle-left"></i></a></li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#"><i class="fa-solid fa-angle-right"></i></a></li>
                </ul>
            </nav>
        </div>
        <!-- Modal -->
        <form action="{{ url()->current() }}" method="POST" class="modal fade" id="notice" tabindex="-1" aria-labelledby="notice-title" aria-hidden="true">
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
</div>

@push('footer-js')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
<script>
    // const dataID = document.getElementById('data-id');
    // function checkRating() {
    //     if (localStorage.getItem('isLiked ' + dataID.value) !== null) {
    //         btnLike.disabled = true
    //     }
    // }
    // checkRating();
    $(function() {

        let ratingAvg = parseFloat('{{$ratingAvg}}').toFixed(2);
        $('#star-avg').text(ratingAvg + "/5.00");
        $("#rateYo").rateYo({
            rating: ratingAvg,
            fullStar: true,
            numStars: 5
        }).on("rateyo.set", function(e, data) {
            $('#star').val(data.rating);
            if ($('#mess').val() != null) {
                alert($('#mess').val());
            }
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
</script>
@endpush
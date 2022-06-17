{{-- My CSS File --}}
@push('head-css')
    <link name="style-09" rel="stylesheet" href="{{ asset('css/style-09.css') }}">
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
                            <p class="col-2"><i style="font-weight: bold;" class="fa fa-clock"></i> Cập nhật</p>
                            <p class="col-10">6 tháng trước</p>
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
                                <a id="read_story" href="#" class="btn btn-success text-white read-first-chap">Đoc
                                    Từ Đầu</a>
                                <a id="read_new_story" href="#"
                                    class="btn btn-primary text-white read-new-chap">Đọc Mới Nhất</a>
                                <a class="follow-link btn btn-danger text-white"><i class="fa-solid fa-heart"></i> Theo
                                    dõi</a>
                                <a class="unfollow-link btn btn-warning"><i class="fa-solid fa-heart-crack"></i> Bỏ theo
                                    dõi</a>
                            </p>
                        </li>
                        <li class="me-0">
                            <!-- Rating bar -->
                            <form>
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
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- Description -->
            <div class="wrap-description mt-5 mb-0">
                <p class="title-list text-uppercase"><i class='fa fa-book'></i> danh sách chương</p>
                <hr>
                <p>Trong Luận ngữ, Khổng Tử có nói: "nhân chi sinh dã trực, võng chi sinh dã, hạnh nhi miễn" (Lẽ sống là
                    phải ngay thẳng, chẳng ngay thẳng mà sống thì ấy là nhờ may mắn tránh khỏi tai họa mà thôi).

                    Nhân vật chính Tào Bằng trong truyện là một cảnh sát, sau khi phá án được vinh danh anh hùng, không
                    ngờ kẻ phản bội trong vụ án đó lại chính là bạn thân mình, rồi bị bắn chết. Hắn trọng sinh vào nhà
                    họ Tào thời Tam Quốc. Thử hỏi, như Khổng Tử nói thì có nên tiếp tục sống làm kẻ chính trực như kiếp
                    trước rồi bị phản bội bởi kẻ thân, hay được trọng sinh vào thời loạn lạc là một may mắn cần phải
                    biết nắm giữ?

                    Giữa thời tam quốc với bao anh hùng hào kiệt, nhân sĩ mưu cao, tác giả khắc họa nhân vật Tào Bằng
                    chỉ là một kẻ tầm thường: văn không đặc biệt mà võ cũng không xuất chúng. Hắn không phải là một kẻ
                    dũng mãnh vô địch vì đã có Lữ Bố, Triệu Vân, ai có thể hơn ; hắn không phải là một kẻ thông minh
                    xuất chúng mưu lược tài giỏi vì đã có Khổng Minh, Bàng Thống, ai có thể bằng ; cũng không phải kẻ
                    tham vọng lập bá nghiệp vì đã có Lưu Bị, Tào Tháo. Hắn chỉ có một điểm hơn bất kỳ ai thời ấy, một kẻ
                    biết trước tất cả. Chính nhờ cái hơn người đó mà hắn đã từng bước đưa bản thân mình ngoi lên vị trí
                    cao trong thời đại loạn lạc đó.</p>
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
    </div>
</div>

{{-- My CSS File --}}
@push('head-css')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link name="style-11" rel="stylesheet" href="{{ asset('css/style-11.css') }}">
@endpush

<div class="type-11">
    <div class="container my-5">
        <div class="header-top ">
            <div class="post_meta_item">
                <div class="title_name">
                    <span><a href="#">{{$creation->name }}</a></span>
                </div>
                <h2 class="title_post_name">{{$chapter->chapter_name}}</h2>
                <div class="post_meta_name">
                    <span class="meta-item post-author">
                        <span>Tác giả:</span>
                        {{$creation->author}}
                    </span>

                </div>
            </div>
            <div class="chapter_pagination">
                <a class="pre-page m-3 pagi" href="#">
                    <i class="fa-solid fa-angle-left"></i>
                    <span>Chương trước</span>
                </a>

                <select class="form-select select-page m-3" aria-label="Default select example">
                    <option selected>Chương 1</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>

                <a class="next-page m-3 pagi" href="#">
                    <span>Chương sau</span>
                    <i class="fa-solid fa-angle-right"></i>

                </a>
            </div>

        </div>

        <div class="content">
            <p class="chapter-content">{{$chapter->chapter_content}}</p>
        </div>
    </div>
</div>
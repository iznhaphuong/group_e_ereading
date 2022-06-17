{{-- My CSS File --}}
@push('head-css')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


@push('footer-js')

<link name="style-11" rel="stylesheet" href="{{ asset('css/style-11.css') }}">
@endpush
@section('title', $creation->name . '-Chương ' . $chapter->chapter_number)

<div class="type-11">
    <div class="container my-5">
        <div class="header-top ">
            <div class="post_meta_item">
                <div class="title_name">
                    <span><a href="#">{{$creation->name }}</a></span>
                </div>
                <h2 class="title_post_name" id="title" data-creation-id="{{ $creation->id }}">{{$chapter->chapter_name}}</h2>
                <div class="post_meta_name">
                    <span class="meta-item post-author">
                        <span>Tác giả:</span>
                        {{$creation->author}}
                    </span>

                </div>
            </div>

            <div class="chapter_pagination">
                @php
                $prevId = md5($creation->id . $chapter->chapter_number-1);

                $nextId = md5($creation->id . $chapter->chapter_number+1);

                @endphp
                @if($chapter->chapter_number == 1)
                <a class="pre-page m-3 pagi " style="display: none;" href="{{  url('reading-' . $prevId) }}">
                    <i class="fa-solid fa-angle-left"></i>
                    <span>Chương trước</span>
                </a>
                @else
                <a class="pre-page m-3 pagi " href="{{  url('reading-' . $prevId) }}">
                    <i class="fa-solid fa-angle-left"></i>
                    <span>Chương trước</span>
                </a>
                @endif
                <select class="form-select select-page m-3" id="select-chapter" name="select-chapter" aria-label="Default select example">
                    <option selected>Chương {{$chapter->chapter_number}}</option>
                    @foreach($chapterList as $chap)
                    @if($chap->chapter_number != $chapter->chapter_number)
                    <a href="{{  url('reading-' . $chap->chapter_number) }}">
                        <option value="{{$chap->chapter_number}}">Chương {{$chap->chapter_number}}</option>
                    </a>
                    @endif
                    @endforeach
                </select>

                @if ($chapter->chapter_number == $endChapter->chapter_number)
                <a class="next-page m-3 pagi" style="display: none;" id="next-chapter" href="{{  url('reading-' . $nextId) }}">
                    <span>Chương sau</span>
                    <i class="fa-solid fa-angle-right"></i>
                </a>
                @else
                <a class="next-page m-3 pagi" id="next-chapter" href="{{  url('reading-' . $nextId) }}">
                    <span>Chương sau</span>
                    <i class="fa-solid fa-angle-right"></i>
                </a>
                @endif
            </div>

        </div>
        <div class="content">
            <p class="chapter-content" id="chapter-content" data-chapter-id="{{ $chapter->id }}">{{$chapter->chapter_content}}</p>
        </div>
    </div>
</div>
@push('footer-js')
<script src="{{ asset('js/script-11.js') }}"></script>
@endpush
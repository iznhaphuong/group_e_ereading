{{-- My CSS File --}}
@push('head-css')
    <link name="style-07" rel="stylesheet" href="{{ asset('css/style-07.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
@endpush

@push('footer-js')
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script src="{{ asset('js/script-07.js') }}"></script>
@endpush

<div class="type-07">
  <!-- Slider main container -->
  <p class="title-list text-uppercase">Truyện mới cập nhật</p>
  <hr class="pb-3">
  <div class="swiper mySwiper">
    <div class="swiper-wrapper">
      <div class="swiper-slide">
        <img src="{{ asset('images/covers/chugioitantheonlinengaytancuathegioi.jpg') }}" alt="..." />
      </div>
      <div class="swiper-slide">
        <img src="{{ asset('images/covers/dai-thoi-dai-1958.jpg') }}" alt="..." />
      </div>
      <div class="swiper-slide">
        <img src="{{ asset('images/covers/dao-si-kinh-ky.jpg') }}" alt="..." />
      </div>
      <div class="swiper-slide">
        <img src="{{ asset('images/covers/phongluuvotrangnguyen.jpg') }}" alt="..." />
      </div>
      <div class="swiper-slide">
        <img src="{{ asset('images/covers/quyenthan.jpg') }}" alt="..." />
      </div>
      <div class="swiper-slide">
        <img src="{{ asset('images/covers/taotac.jpg') }}" alt="..." />
      </div>
      <div class="swiper-slide">
        <img src="{{ asset('images/covers/thandaodanton.jpg') }}" alt="..." />
      </div>
      <div class="swiper-slide">
        <img src="{{ asset('images/covers/toicuongthanthoaidehoang.jpg') }}" alt="..." />
      </div>
      <div class="swiper-slide">
        <img src="{{ asset('images/covers/tro-choi-vuong-quyen.jpg') }}" alt="..." />
      </div>

    </div>
    <div class="swiper-pagination"></div>
  </div>
</div>
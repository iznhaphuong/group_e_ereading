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
                    <span><a href="#">Tên truyện</a></span>
                </div>
                <h1 class="title_post_name">{{$chapter->chapter_name}}</h1>
                <div class="post_meta_name">
                    <span class="meta-item post-author">
                        <span>By </span>
                        Author
                    </span>
                    <span class="meta-item date">09/06/2022</span>
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
            <p class="chapter-content">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente deserunt dolor eius explicabo repellat delectus labore consequuntur commodi suscipit placeat laboriosam ducimus illum similique amet, perferendis libero, blanditiis id recusandae.
                In aliquid vero id veritatis nihil animi iusto nulla similique enim? Laboriosam nostrum cum tempora quisquam omnis excepturi numquam quidem! Nostrum veniam maxime sunt animi, veritatis modi dignissimos nemo quos?
                Cum eligendi numquam reiciendis, in porro hic fugiat rem facilis tenetur rerum facere, vitae ad. Ea adipisci modi earum nisi a fuga odit quidem nesciunt laborum facere, iusto inventore tempore?
                Quidem provident earum odit incidunt laborum, natus, eum vitae veniam tenetur, fuga libero sunt voluptatum veritatis? Architecto, tempore nesciunt. Voluptatum doloremque sit quos accusamus ad nam aut libero quod repellat?
                Corrupti, cumque minima! Earum consequatur debitis voluptatibus id ex eveniet natus, aut itaque, molestias rem corporis quos consectetur dolore repellendus assumenda unde. Ducimus nulla beatae deserunt sunt vero sequi quaerat!
                Accusantium ipsa voluptas assumenda molestiae architecto ipsum! Sequi molestiae non distinctio cum aut. Culpa, inventore! Nihil nemo reprehenderit doloribus, neque in consequuntur maiores quia corporis vitae error nesciunt ipsum cupiditate.
                Eos ipsum quibusdam nisi delectus mollitia animi consequatur eligendi, necessitatibus, ipsam a pariatur fugit odio? Vero error nemo recusandae nihil voluptatem tempore reiciendis exercitationem consequuntur doloribus, eligendi distinctio eveniet omnis.
                Nulla ab esse quasi corrupti voluptatum saepe veniam similique aliquid in. Provident magni maiores aut soluta aliquam quam labore beatae culpa quos doloribus similique unde, deserunt saepe, accusantium deleniti ea?
                Error qui, inventore repellendus ipsam, reiciendis assumenda fugit eius distinctio aspernatur eos amet non libero animi labore optio velit iusto ut reprehenderit iure ullam asperiores. Adipisci, quo! Quidem, soluta illum!
                Dolorum, vel? Similique repellendus fugit nulla asperiores ut, excepturi incidunt quidem ipsum quod perspiciatis ex dolor nam totam cum! Dignissimos eaque non obcaecati sunt unde repellat quo sit adipisci quam!</p>
        </div>
    </div>
</div>
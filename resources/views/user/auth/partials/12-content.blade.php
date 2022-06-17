{{-- My CSS File --}}
@push('head-css')
    <script src="https://cdn.tailwindcss.com"></script>
@endpush

@push('footer-js')
<script src="{{ asset('js/script-12.js') }}"></script>
@endpush

<div class="style-12">
    <section class="h-screen">
        <div class="px-6 h-full text-gray-800">
            <div class="flex xl:justify-center lg:justify-between justify-center items-center flex-wrap h-full g-6">
                <div class="grow-0 shrink-1 md:shrink-0 basis-auto xl:w-6/12 lg:w-6/12 md:w-9/12 mb-12 md:mb-0">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
                        class="w-full" alt="Sample image" />
                </div>
                <div class="xl:ml-20 xl:w-5/12 lg:w-5/12 md:w-8/12 mb-12 md:mb-0">
                    <form action="{{ route('register.custom') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="flex flex-row items-center justify-center lg:justify-start">
                            <p class="text-lg mb-0 mx-auto">Đăng ký</p>
                        </div>
                        <!-- Upload img -->
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="default_size">Default size</label>
                        <input name="user_avatar" class="block mb-3 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="default_size" type="file">
                        <!-- End Upload img -->

                        <!-- Name input -->
                        <div class="mb-6">
                            <input type="text"
                                name="user_name"
                                class="form-control block w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                id="name" placeholder="Tên" />
                        </div>

                        <!-- Email input -->
                        <div class="mb-6">
                            <input type="text"
                                name="user_email"
                                class="form-control block w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                id="email" placeholder="Email" />
                        </div>

                        <!-- Username input -->
                        <div class="mb-6">
                            <input type="text"
                                name="user_username"
                                class="form-control block w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                id="username" placeholder="Tài khoản" />
                        </div>

                        <!-- Password input -->
                        <div class="mb-6">
                            <input type="password"
                                name="user_password"
                                class="form-control block w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                id="password" placeholder="Mật khẩu" />
                        </div>

                        <!-- Repassword input -->
                        <div class="mb-6">
                            <input type="password"
                                name="user_repassword"
                                class="form-control block w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                id="repassword" placeholder="Nhập lại mật khẩu" />
                        </div>

                        <div class="text-center lg:text-left">
                            <button type="submit"
                                class="inline-block px-7 py-3 bg-default text-white font-medium text-sm leading-snug uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
                                Đăng ký
                            </button>
                            <p class="text-sm font-semibold mt-2 pt-1 mb-0">
                                Bạn đã có tài koản?
                                <a href="#!"
                                    class="text-red-600 hover:text-red-700 focus:text-red-700 transition duration-200 ease-in-out">Đăng
                                    nhập</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

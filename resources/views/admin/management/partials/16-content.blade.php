{{-- My CSS File --}}
@push('head-css')
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="{{ asset('js/script-16.js') }}"></script>
@endpush

<div id="style-16">
    <!-- Index Post -->
    <div class="container max-w-7xl mx-auto mt-8">
        <div class="mb-4">
            <h1 class="font-serif text-3xl font-bold underline decoration-gray-400"> Quản lý người dùng</h1>
            <div class="flex justify-end">
                <button type="button" data-bs-toggle="modal" data-bs-target="#createModal" class="px-4 py-2 rounded-md bg-default text-default-text border-2 border-default-border hover:text-default hover:bg-default-hover add-user">Thêm người dùng
                </button>
            </div>
        </div>
        <div class="flex flex-col">
            <div class="overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                <div
                    class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-200 shadow sm:rounded-lg">
                    <table class="min-w-full">
                        <thead>
                        <tr>
                            <th
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border border-b border-gray-200 bg-gray-50">
                                ID
                            </th>
                            <th
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border border-b border-gray-200 bg-gray-50">
                                Avatar
                            </th>
                            <th
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border border-b border-gray-200 bg-gray-50">
                                Tên người dùng
                            </th>
                            <th
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border border-b border-gray-200 bg-gray-50">
                                Tên đăng nhập
                            </th>
                            <th
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border border-b border-gray-200 bg-gray-50">
                                Email
                            </th>

                            <th
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border border-b border-gray-200 bg-gray-50">
                                Mật khẩu
                            </th>

                            <th
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border border-b border-gray-200 bg-gray-50">
                                Loại tài khoản
                            </th>
                            <th
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border border-b border-gray-200 bg-gray-50">
                                Kinh nghiệm`
                            </th>
                            <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border border-b border-gray-200 bg-gray-50"
                                colspan="3">
                                Action
                            </th>
                        </tr>
                        </thead>

                        <tbody class="bg-white">
                        <tr>
                            <td class="px-6 py-4 whitespace-no-wrap border border-b border-gray-200">
                                <div class="flex items-center">
                                    1
                                </div>

                            </td>

                            <td class="px-6 py-4 whitespace-no-wrap border border-b border-gray-200">
                                <img src="https://dbk.vn/uploads/ckfinder/images/1-content/anh-dep-1.jpg" alt="dep"
                                     class="w-14 h-14">
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap border border-b border-gray-200">
                                <div class="text-sm leading-5 text-gray-900">User
                                </div>
                            </td>

                            <td class="px-6 py-4 whitespace-no-wrap border border-b border-gray-200">
                                <div class="text-sm leading-5 text-gray-900">user
                                </div>
                            </td>

                            <td class="px-6 py-4 whitespace-no-wrap border border-b border-gray-200">
                                <div class="text-sm leading-5 text-gray-900">email
                                </div>
                            </td>

                            <td class="px-6 py-4 whitespace-no-wrap border border-b border-gray-200">
                                <div class="text-sm leading-5 text-gray-900">123123
                                </div>
                            </td>

                            <td class="px-6 py-4 whitespace-no-wrap border border-b border-gray-200">
                                <p>Nguời dùng</p>
                            </td>

                            <td class="px-6 py-4 text-sm leading-5 text-gray-500 whitespace-no-wrap border border-b border-gray-200">
                                <span>12/20</span>
                            </td>

                            <td class="text-sm font-medium leading-5 text-center whitespace-no-wrap border-b border-gray-200 ">
                                <button type="button" data-bs-toggle="modal" data-bs-target="#editModal" class="text-indigo-600 hover:text-indigo-900">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                                         viewBox="0 0 24 24"
                                         stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                    </svg>
                                </button>
                            </td>
                            <td class="text-sm font-medium leading-5 text-center whitespace-no-wrap border-b border-gray-200 ">
                                <a href="#" class="text-gray-600 hover:text-gray-900">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                                         viewBox="0 0 24 24"
                                         stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                </a>

                            </td>
                            <td class="text-sm font-medium leading-5 whitespace-no-wrap border-b border-gray-200 ">
                                <a href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                         class="w-6 h-6 text-red-600 hover:text-red-800"
                                         fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                    </svg>
                                </a>

                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Creation Form Modal -->
    <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm Người Dùng</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="py-1">
                        <form class="form" novalidate="">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Tên người dùng</label>
                                        <input class="form-control" type="text" name="name" placeholder=""
                                               value="">
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Tên đăng nhập</label>
                                                <input class="form-control" type="text" name="name" placeholder=""
                                                       value="">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input class="form-control" type="text" name="author" placeholder=""
                                                       value="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Mật khẩu</label>
                                            <input class="form-control" type="text" name="type" placeholder="">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label style="display: block;" for="status">Loại tài khoản</label>
                                                <select id="status" name="status">
                                                    <option value="0">Người dùng</option>
                                                    <option value="1">Quản lý</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Kinh nghiệm</label>
                                                <input class="form-control" type="text" name="source" placeholder=""
                                                       value="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-sm-6 mb-3">
                                    <input type="file" name="image">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col d-flex justify-content-end">
                                    <button type="button" class="btn btn-secondary me-2 text-default-text bg-default" data-bs-dismiss="modal">Close
                                    </button>
                                    <button class="btn btn-primary text-default-text bg-default" type="submit">Thêm</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Form Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm Người Dùng</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="py-1">
                        <form class="form" novalidate="">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Tên người dùng</label>
                                        <input class="form-control" type="text" name="name" placeholder=""
                                               value="">
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Tên đăng nhập</label>
                                                <input class="form-control" type="text" name="name" placeholder=""
                                                       value="">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input class="form-control" type="text" name="author" placeholder=""
                                                       value="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Mật khẩu</label>
                                            <input class="form-control" type="text" name="type" placeholder="">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label style="display: block;" for="status">Loại tài khoản</label>
                                                <select id="status" name="status">
                                                    <option value="0">Người dùng</option>
                                                    <option value="1">Quản lý</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Kinh nghiệm</label>
                                                <input class="form-control" type="text" name="source" placeholder=""
                                                       value="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-sm-6 mb-3">
                                    <input type="file" name="image">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col d-flex justify-content-end">
                                    <button type="button" class="btn btn-secondary me-2 text-default-text bg-default" data-bs-dismiss="modal">Close
                                    </button>
                                    <button class="btn btn-primary text-default-text bg-default" type="submit">Sửa</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


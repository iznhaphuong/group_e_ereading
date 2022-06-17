{{-- My CSS File --}}
@push('head-css')
    <script src="https://cdn.tailwindcss.com"></script>
@endpush

<div id="style-16">
    <!-- Index Post -->
    <div class="container max-w-7xl mx-auto mt-8">
        <div class="mb-4">
            <h1 class="font-serif text-3xl font-bold underline decoration-gray-400"> Quản lý người dùng</h1>
            <div class="flex justify-end">
                <button type="button" data-bs-toggle="modal" data-bs-target="#createModal"
                        class="px-4 py-2 rounded-md bg-default text-default-text border-2 border-default-border hover:text-default hover:bg-default-hover add-user">
                    Thêm người dùng
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
                        @foreach($users as $user)
                            <tr>
                                <td class="px-6 py-4 whitespace-no-wrap border border-b border-gray-200">
                                    <div class="flex items-center">
                                        {{ $user->id }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap border border-b border-gray-200">
                                    <img src="{{asset('images/' . $user->user_avatar)}}" alt="{{$user->user_name}}"
                                         class="w-14 h-14">
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap border border-b border-gray-200">
                                    <div class="text-sm leading-5 text-gray-900">
                                        {{ $user->user_name }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap border border-b border-gray-200">
                                    <div class="text-sm leading-5 text-gray-900">
                                        {{ $user->user_username }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap border border-b border-gray-200">
                                    <div class="text-sm leading-5 text-gray-900">
                                        {{ $user->user_email }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap border border-b border-gray-200">
                                    <p>{{$user->user_type == 0 ? 'Quản lý' : 'Người dùng'}}</p>
                                </td>
                                <td class="px-6 py-4 text-sm leading-5 text-gray-500 whitespace-no-wrap border border-b border-gray-200">
                                    <span>{{$user->user_exp}}</span>
                                </td>

                                <td class="text-sm font-medium leading-5 text-center whitespace-no-wrap border-b border-gray-200">
                                <button type="button" data-bs-toggle="modal" data-bs-target="#editModal"
                                        data-id="{{ $hash->encodeHex($user->id + $salt) }}" data-version="{{ $hash->encodeHex($user->user_version + $salt)  }}"
                                        class="text-indigo-600 hover:text-indigo-900 editModel">
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
                        @endforeach
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
                        <form method="post" action="{{ route('user.create') }}" class="form" novalidate=""
                              enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Tên người dùng</label>
                                        <input class="form-control" type="text" name="user_name" placeholder=""
                                               value="" required>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Tên đăng nhập</label>
                                                <input class="form-control" type="text" name="user_username"
                                                       placeholder=""
                                                       value="" required>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input class="form-control" type="text" name="user_email" placeholder=""
                                                       value="" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Mật khẩu</label>
                                            <input class="form-control" type="password" name="user_password"
                                                   placeholder="" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label style="display: block;" for="status">Loại tài khoản</label>
                                                <select id="status" name="user_type" required>
                                                    <option value="1">Người dùng</option>
                                                    <option value="0">Quản lý</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Kinh nghiệm</label>
                                                <input class="form-control" type="text" name="user_exp" placeholder=""
                                                       value="" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-sm-6 mb-3">
                                    <input accept=".jpg, .jpeg, .png" type="file" class="form-control" name="user_avatar" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col d-flex justify-content-end">
                                    <button type="button" class="btn btn-secondary me-2 text-default-text bg-default"
                                            data-bs-dismiss="modal">Close
                                    </button>
                                    <button class="btn btn-primary text-default-text bg-default" type="submit">Thêm
                                    </button>
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
                        <form method="post" action="{{ route('category.update') }}" class="form" novalidate="" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <input type="text" id="inputId" name="id" class="hidden">
                                        <input type="text" id="inputUserVersion" name="version" class="hidden">
                                        <label>Tên người dùng</label>
                                        <input class="form-control" type="text" name="user_name" placeholder=""
                                               value="" required id="inputUserName">
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Tên đăng nhập</label>
                                                <input class="form-control" type="text" name="user_username"
                                                       placeholder=""
                                                       id="inputUserUserName"
                                                       value="" required>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input class="form-control" type="text" name="user_email" placeholder=""
                                                       id="inputUserEmail"
                                                       value="" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Mật khẩu</label>
                                            <input class="form-control" type="password" name="user_password"
                                                   id="inputUserPassword"
                                                   placeholder="">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label style="display: block;" for="statusTypes">Loại tài khoản</label>
                                                <select id="statusTypes" name="user_type">
                                                    <option id="inputUserType0" value="1">Người dùng</option>
                                                    <option id="inputUserType1" value="0">Quản lý</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Kinh nghiệm</label>
                                                <input class="form-control" type="text" name="user_exp" placeholder=""
                                                       id="inputUserExp"
                                                       value="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-sm-6 mb-3">
                                    <input id="userAvatar" type="file" name="user_avatar" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col d-flex justify-content-end">
                                    <button type="button" class="btn btn-secondary me-2 text-default-text bg-default"
                                            data-bs-dismiss="modal">Close
                                    </button>
                                    <button id="btn-edit" class="btn btn-primary text-default-text bg-default" type="submit">Sửa
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/script-16.js') }}"></script>

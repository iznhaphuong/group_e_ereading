{{-- My CSS File --}}
@push('head-css')
    <script src="https://cdn.tailwindcss.com"></script>
@endpush
<div id="style-17">
    <!-- Index Post -->
    <div class="container max-w-7xl mx-auto mt-8">
        <div class="mb-4">
            <h1 class="font-serif text-3xl font-bold underline decoration-gray-400"> Quản lý danh mục</h1>
            <div class="flex justify-end">
                <button type="button" data-bs-toggle="modal" data-bs-target="#createModal"
                        class="px-4 py-2 rounded-md bg-default text-default-text border-2 border-default-border hover:text-default hover:bg-default-hover add-user">
                    Thêm danh mục
                </button>
            </div>
        </div>
        <div class="flex flex-col">
            <div class="overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                <div
                    class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-200 shadow sm:rounded-lg">
                    <table class="min-w-full table-auto">
                        <thead>
                        <tr>
                            <th
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border border-b border-gray-200 bg-gray-50"
                                width="5%">
                                ID
                            </th>
                            <th
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border border-b border-gray-200 bg-gray-50">
                                Tên danh mục
                            </th>
                            <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border border-b border-gray-200 bg-gray-50"
                                colspan="3" width="10%">
                                Action
                            </th>
                        </tr>
                        </thead>

                        <tbody class="bg-white">
                        @foreach($categories as $category)
                            <tr>
                                <td class="px-6 py-4 whitespace-no-wrap border border-b border-gray-200">
                                    <div class="flex items-center">
                                        {{ $category->id }}
                                    </div>

                                </td>

                                <td class="px-6 py-4 text-sm leading-5 text-gray-500 whitespace-no-wrap border border-b border-gray-200">
                                    <span>{{ $category->name }}</span>
                                </td>

                                <td class="text-sm font-medium leading-5 text-center whitespace-no-wrap border-b border-gray-200 ">
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#editModal"
                                            class="text-indigo-600 hover:text-indigo-900 editModel"
                                            data-id="{{ $hash->encodeHex($category->id + $salt) }}"
                                            data-version="{{ $hash->encodeHex($category->version  + $salt) }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                                             viewBox="0 0 24 24"
                                             stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                        </svg>
                                    </button>
                                </td>
                                <td class="text-sm font-medium leading-5 text-center whitespace-no-wrap border-b border-gray-200 ">
                                    <button type="button" class="text-gray-600 hover:text-gray-900">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                                             viewBox="0 0 24 24"
                                             stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                        </svg>
                                    </button>

                                </td>
                                <td class="text-sm font-medium leading-5 whitespace-no-wrap border-b border-gray-200 ">
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#deleteModal"
                                            data-id="{{ $hash->encodeHex($category->id + $salt) }}"
                                            class="delete-category">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             class="w-6 h-6 text-red-600 hover:text-red-800"
                                             fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                        </svg>
                                    </button>

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
                    <h5 class="modal-title" id="exampleModalLabel">Thêm Danh Mục</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="py-1">
                        <form method="post" action="{{ route('category.create') }}" class="form" novalidate="">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Tên danh mục</label>
                                        <input class="form-control mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400
      focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500 invalid:border-pink-500 invalid:text-pink-600 focus:invalid:border-pink-500 focus:invalid:ring-pink-500"
                                               type="text" name="name" placeholder=""
                                               value="" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col d-flex justify-content-end mt-3">
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
                    <h5 class="modal-title" id="exampleModalLabel">Thêm Danh Mục</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="py-1">
                        <form class="form" novalidate="">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Tên danh mục</label>
                                        <input id="inputNameCategory" class="form-control mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400
      focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500 invalid:border-pink-500 invalid:text-pink-600 focus:invalid:border-pink-500 focus:invalid:ring-pink-500"
                                               type="text" name="name" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col d-flex justify-content-end mt-3">
                                    <button type="button" class="btn btn-secondary me-2 text-default-text bg-default"
                                            data-bs-dismiss="modal">Close
                                    </button>
                                    <button id="btn-edit" class="btn btn-primary text-default-text bg-default"
                                            data-bs-dismiss="modal"
                                            type="button">Sửa
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Form Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Xóa Danh Mục</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="py-1">
                        <form class="form" novalidate="">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <div id="delete-text"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col d-flex justify-content-end mt-3">
                                    <button type="button" class="btn btn-secondary me-2 text-default-text bg-default"
                                            data-bs-dismiss="modal">Đóng
                                    </button>
                                    <button type="button" data-bs-dismiss="modal" id="btn-delete"
                                            class="btn btn-primary text-default-text me-2 bg-default">Xóa
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
<script src="{{ asset('js/script-17.js') }}"></script>

{{-- My CSS File --}}
@push('head-css')
<link name="style-18" rel="stylesheet" href="{{ asset('css/style-18.css') }}">
@endpush


<div class="type-18">
  <div class="row flex-lg-nowrap">
    <div class="col">
      <div class="e-tabs mb-3 px-3">
        <ul class="nav nav-tabs">
          <li class="nav-item"><a class="nav-link active" href="#">Quản lý Truyện</a></li>
        </ul>
      </div>

      <div class="row flex-lg-nowrap">
        <div class="col mb-3">
          <div class="e-panel card">
            <div class="card-body">
              <div class="card-title" style="position: relative;">
                @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block" style="position: absolute;left: 0;">
                  <strong>{{ $message }}</strong>
                </div>
                @endif
                <!-- <h6 class="mr-2"><span>Users</span><small class="px-1">Be a wise leader</small> -->
                <button class="btn btn-add" style="float: right;margin-bottom:15px;" type="button" data-bs-toggle="modal" data-bs-target="#createModal">Thêm Truyện</button>
                </h6>
              </div>
              <div class="e-table">
                <div class="table-responsive table-lg mt-3">
                  <table id="datatable" class="table table-bordered">
                    <thead>
                      <tr>
                        <th width="3%">id</th>
                        <th width="14%">Hình ảnh bìa</th>
                        <th width="12%" class="max-width">Tên tác phẩm</th>
                        <th width="8%" class="sortable">Tác giả</th>
                        <th width="12%">Thể loại </th>
                        <th width="10%">Trạng thái </th>
                        <th width="21%">Mô tả tác phẩm </th>
                        <th width="10%">Lượt đọc </th>
                        <th width="10%">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($dataCreations as $value)
                      <tr>
                        <td class="align-middle">{{ $value->id }}</td>
                        <td class="text-center align-middle">
                          <img src="{{ asset('images/covers/'.$value->image) }}" alt="ảnh" style="width: 80px;">
                        </td>
                        <!-- text-nowrap -->
                        <td class="text-center align-middle">{{ $value->name }}</td>
                        <td class="text-center align-middle"><span>{{ $value->author }}</span></td>
                        <td class="text-center align-middle">
                          @foreach($value->categories as $category)
                          {{ $category->name }},
                          @endforeach
                        </td>
                        <td class="text-center align-middle">{{ $value->status }}</td>
                        <td>
                          <p class="collum-description">{{ $value->description }}</p>
                        </td>
                        <td class="text-center align-middle">{{ $value->view }}</td>
                        <td class="text-center align-middle">
                          <div class="btn-group align-top">
                            <button class="btn btn-action btn-sm badge editModel" type="button" data-bs-toggle="modal" data-bs-target="#editModal1" data-id="<?php
                                $key = config('key.key');

                                $idMaHoa = $crypt::encryptString($value->id);

                                echo $idMaHoa;
                          ?>" data-version="{{ $value->version }}" data-url="{{ asset('images/covers/') }}"><i class="fa-solid fa-pen-to-square"></i></button>

                            <button class="btn-delete btn btn-action btn-sm badge" type="button" data-bs-target="#deleteModal" data-name="{{ $value->name }}" 
                            data-id="<?php
                                $key = config('key.key');

                                $idMaHoa = $crypt::encryptString($value->id);

                                echo $idMaHoa;
                          ?>" data-bs-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete"><i class="fa fa-trash"></i></button>
                          </div>
                        </td>
                        <!-- Dữ liệu Nguồn -->
                        <input type="hidden" class="source" name="source" value="{{ $value->source }}">
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
                <!-- Pagination -->
                <div class="my-5 d-flex justify-content-center ">
                  <nav aria-label="Pagination">
                    <ul class="pagination">
                      <li class="page-item"><a class="page-link" href="#"><i class="fa-solid fa-angle-left"></i></a>
                      </li>
                      <li class="page-item active"><a class="page-link" href="#">1</a></li>
                      <li class="page-item"><a class="page-link" href="#">2</a></li>
                      <li class="page-item"><a class="page-link" href="#">3</a></li>
                      <li class="page-item"><a class="page-link" href="#"><i class="fa-solid fa-angle-right"></i></a></li>
                    </ul>
                  </nav>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Creation Form Modal -->
      <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Thêm Truyện</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="py-1">
                <form class="form" active="{{ route('admin.store') }}" method="POST" novalidate="" enctype="multipart/form-data">
                  @csrf
                  <div class="row">
                    <div class="col">
                      <div class="row">
                        <div class="col">
                          <div class="form-group" enctype="multipart/form-data">
                            <label>Tên tác phẩm</label>
                            <input class="form-control" type="text" name="name" placeholder="" value="" required>
                          </div>
                        </div>
                        <div class="col">
                          <div class="form-group">
                            <label>Tác giả</label>
                            <input class="form-control" type="text" name="author" placeholder="" value="" required>
                          </div>
                        </div>
                      </div>
                      <div class="row" style="align-items: center;margin-top: 20px;">
                        <div class="col">
                          <div class="form-group">
                            <label>Nguồn</label>
                            <input class="form-control" type="text" name="source" placeholder="" value="" required>
                          </div>
                        </div>
                        <div class="col">
                          <!-- <div class="form-group"> -->
                          <label style="display: block;" for="statusadd">Trạng thái</label>
                          <select id="statusadd" name="status" required>
                            <option value="0">Chưa Hoàn thành</option>
                            <option value="1">Hoàn thành</option>
                          </select>
                          <!-- </div> -->
                        </div>
                        <div class="col" style="display: flex;align-items: center;">
                          <label for="typeCategory" style="padding-right: 10px;">Thể loại: </label>
                          <select name="types[]" id="typeCategory" multiple required>
                            @foreach($dataCategories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col mb-3">
                          <div class="form-group">
                            <label>Mô tả truyện</label>
                            <textarea class="form-control" rows="5" name="description" placeholder="" required></textarea>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12 col-sm-6 mb-3">
                      <input type="file" name="image" required>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col d-flex justify-content-end">
                      <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">Close</button>
                      <button class="btn btn-primary text-white" type="submit">Thêm</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Edit Form Modal -->
      <div class="modal fade" id="editModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Sửa Truyện</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="py-1">
                <form class="form" id="editForm" method="post" action="{{ route('admin.update') }}" novalidate="" enctype="multipart/form-data">
                  <!-- {{ csrf_field() }} -->
                  <!-- {{ method_field('POST') }} -->
                  @csrf
                  <input type="hidden" id="idEdit" name="idEdit" value="">
                  <!-- Dữ liệu Version -->
                  <input type="hidden" id="versionEdit" class="version" name="version" value="{{ $value->version }}">
                  <div class="row">
                    <div class="col">
                      <div class="row">
                        <div class="col">
                          <div class="form-group">
                            <label>Tên tác phẩm</label>
                            <input class="form-control" id="edit_name" type="text" name="name" placeholder="" value="" required>
                          </div>
                        </div>
                        <div class="col">
                          <div class="form-group">
                            <label>Tác giả</label>
                            <input class="form-control" id="edit_author" type="text" name="author" placeholder="" value="" required>
                          </div>
                        </div>
                      </div>
                      <div class="row" style="align-items: center;margin-top: 20px;">
                        <div class="col">
                          <div class="form-group">
                            <label>Nguồn</label>
                            <input class="form-control" id="edit_source" type="text" name="source" placeholder="" value="" required>
                          </div>
                        </div>
                        <div class="col">
                          <!-- <div class="form-group"> -->
                          <label style="display: block;" for="status">Trạng thái</label>
                          <select id="edit_status" name="status" required>
                            <option value="0">Chưa Hoàn thành</option>
                            <option value="1">Hoàn thành</option>
                          </select>
                          <!-- </div> -->
                        </div>
                        <div class="col" style="display: flex;align-items: center;">
                          <label for="types" style="padding-right: 10px;">Thể loại: </label>
                          <select name="types[]" multiple required id="types">
                            @foreach($dataCategories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                          </select>
                          <input type="text" id="edit_types">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col mb-3">
                          <div class="form-group">
                            <label>Mô tả truyện</label>
                            <textarea class="form-control" id="edit_description" rows="5" name="description" placeholder="" required></textarea>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12 col-sm-6 mb-3">
                      <input type="file" name="image" id="image" required>
                      <img id="edit_image" src="" alt="">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col d-flex justify-content-end">
                      <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">Close</button>
                      <button class="btn btn-primary text-white" id="btn-edit" type="submit">Sửa</button>
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
              <h5 class="modal-title" id="exampleModalLabel">Xóa Truyện</h5> 
            </div>
            <div class="modal-body">
              <div class="py-1">
                <form class="form" action="{{ route('admin.destroy') }}">
                  {{ method_field('Delete') }}
                  @csrf
                  <div class="row">
                    <div class="col">
                      <div class="form-group">
                        <input type="hidden" name="idDelete1" id="idDelete">
                        <div id="delete-text" style="text-align: center;"></div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col d-flex justify-content-end mt-3">
                      <button type="button" class="btn btn-secondary me-2 text-default-text bg-default" data-bs-dismiss="modal">Đóng
                      </button>
                      <button type="submit"  class="btn btn-primary text-default-text me-2 bg-default">Xóa
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
  </div>
</div>
<script src="{{ asset('js/script-18.js') }}"></script>
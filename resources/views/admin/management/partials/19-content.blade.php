{{-- My CSS File --}}
@push('head-css')
    <link name="style-19" rel="stylesheet" href="{{ asset('css/style-19.css') }}">
@endpush


<div class="type-19">
  <div class="row flex-lg-nowrap">

    <div class="col">
      <div class="e-tabs mb-3 px-3">
        <ul class="nav nav-tabs">
          <li class="nav-item"><a class="nav-link active" href="#">Quản lý Chương Truyện</a></li>
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
                <button class="btn btn-add" style="float: right;margin-bottom:15px;" type="button" data-bs-toggle="modal" data-bs-target="#createModal">Thêm chương truyện</button>
                </h6>
              </div>
              <div class="e-table">
                <div class="table-responsive table-lg mt-3">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th width="5%">id</th>
                        <th width="15%">Tên chương</th>
                        <th width="60%">Mô tả tác phẩm </th>
                        <th width="10%">Mã tác phẩm </th>
                        <th width="10%">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($chapter as $value)
                      <tr>
                        <td class="align-middle">{{ $value->id }}</td>
                        <td class="text-nowrap align-middle">{{ $value->chapter_name }}</td>
                        <td>
                          <div class="colum-description">{{ $value->chapter_content	 }}</div>
                        </td>
                        <td class="text-nowrap align-middle"><span>{{ $value->creation_id }}</span></td>
                        <td class="text-center align-middle">
                          <div class="btn-group align-top">
                          <button class="btn btn-action btn-sm badge" type="button" data-bs-toggle="modal" data-bs-target="#editModal"><i class="fa-solid fa-pen-to-square"></i></button>
                            <button class="btn btn-action btn-sm badge" type="button"><i class="fa fa-trash"></i></button>
                          </div>
                        </td>
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
              <h5 class="modal-title" id="exampleModalLabel">Thêm chương truyện</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="py-1">
                <form class="form" action="{{ route('chapter.store') }}" method="post" novalidate="">
                @csrf
                  <div class="row">
                    <div class="col">
                      <div class="row">
                        <div class="col">
                          <div class="form-group">
                            <label>Tên Chương</label>
                            <input class="form-control" type="text" name="name" placeholder="">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col">
                          <div class="form-group">
                            <label style="display: block;" for="id">Thuộc mã tác phẩm</label>
                            <select class="form-control" id="id" name="creation_id">
                                @foreach($creation as $value)                       
                                <option value="{{ $value->id }}">{{ $value->name }}</option>
                                @endforeach
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col mb-3">
                          <div class="form-group">
                            <label>Mô tả chương</label>
                            <textarea class="form-control" rows="5" name="content" placeholder=""></textarea>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col d-flex justify-content-end">
                      <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">Close</button>
                      <button class="btn btn-primary" type="submit">Thêm</button>
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
              <h5 class="modal-title" id="exampleModalLabel">Sửa chương truyện</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="py-1">
                <form class="form" novalidate="">
                  <div class="row">
                    <div class="col">
                      <div class="row">
                        <div class="col">
                          <div class="form-group">
                            <label>Tên Chương</label>
                            <input class="form-control" type="text" name="name" placeholder="">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col">
                          <div class="form-group">
                            <label style="display: block;" for="id">Thuộc mã tác phẩm</label>
                            <select class="form-control" id="id" name="creation_id">
                              <!-- <option value="0">Chưa Hoàn thành</option>
                            <option value="1">Hoàn thành</option> -->
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col">
                          <div class="form-group">
                            <label>Số chương</label>
                            <input class="form-control" type="text" name="total" placeholder="">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col mb-3">
                          <div class="form-group">
                            <label>Mô tả chương</label>
                            <textarea class="form-control" rows="5" name="content" placeholder=""></textarea>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col d-flex justify-content-end">
                      <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">Close</button>
                      <button class="btn btn-primary text-white" type="submit">Sửa</button>
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
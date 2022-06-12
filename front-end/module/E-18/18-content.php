
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
            <div class="card-title">
              <!-- <h6 class="mr-2"><span>Users</span><small class="px-1">Be a wise leader</small> -->
              <button class="btn btn-primary border-light rounded-0" style="float: right;margin-bottom:15px;" type="button" data-bs-toggle="modal" data-bs-target="#createModal">Thêm Truyện</button>
            </h6>
            </div>
            <div class="e-table">
              <div class="table-responsive table-lg mt-3">
                <table class="table table-bordered">
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
                    <tr>
                      <td class="align-middle">
                        1
                      </td>
                      <td class="text-center align-middle">
                        <div class="bg-light d-inline-flex justify-content-center align-items-center align-top" style="width: 35px; height: 35px; border-radius: 3px;"><i class="fa fa-fw fa-photo" style="opacity: 0.8;"></i></div>
                      </td>
                      <!-- text-nowrap -->
                      <td class="text-center align-middle">Letizia Puncher</td>
                      <td class="text-center align-middle"><span>Author</span></td>
                      <td class="text-center align-middle">Viễn cổ</td>
                      <td class="text-center align-middle">Đang cập nhật</td>
                      <td> <p class="collum-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Commodi, in ipsam soluta voluptates deleniti labore ut. Et nesciunt tempore, autem quo porro commodi consequatur dolorem sit ut provident odit nam. Aspernatur quod reiciendis rerum id? Nam fugit officia illum officiis omnis nesciunt harum, sed molestias, totam laudantium at eum ratione nulla quo?</p></td>
                      <td class="text-center align-middle">1200</td>
                      <td class="text-center align-middle">
                        <div class="btn-group align-top">
                            <button class="btn btn-sm btn-outline-secondary badge" type="button" data-bs-toggle="modal" data-bs-target="#editModal">Edit</button>
                            <button class="btn btn-sm btn-outline-secondary badge" type="button"><i class="fa fa-trash"></i></button>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="d-flex justify-content-center">
                <ul class="pagination mt-3 mb-0">
                  <li class="disabled page-item"><a href="#" class="page-link">‹</a></li>
                  <li class="active page-item"><a href="#" class="page-link">1</a></li>
                  <li class="page-item"><a href="#" class="page-link">2</a></li>
                  <li class="page-item"><a href="#" class="page-link">3</a></li>
                  <li class="page-item"><a href="#" class="page-link">4</a></li>
                  <li class="page-item"><a href="#" class="page-link">5</a></li>
                  <li class="page-item"><a href="#" class="page-link">›</a></li>
                  <li class="page-item"><a href="#" class="page-link">»</a></li>
                </ul>
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
              <form class="form" novalidate="">
                <div class="row">
                  <div class="col">
                    <div class="row">
                      <div class="col">
                        <div class="form-group">
                          <label>Tên tác phẩm</label>
                          <input class="form-control" type="text" name="name" placeholder="" value="">
                        </div>
                      </div>
                      <div class="col">
                        <div class="form-group">
                          <label>Tác giả</label>
                          <input class="form-control" type="text" name="author" placeholder="" value="">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col">
                        <div class="form-group">
                          <label>Thể loại</label>
                          <input class="form-control" type="text" name="type" placeholder="">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col">
                        <div class="form-group">
                          <label>Nguồn</label>
                          <input class="form-control" type="text" name="source" placeholder="link" value="">
                        </div>
                      </div>
                      <div class="col">
                        <div class="form-group">
                          <label style="display: block;" for="status">Trạng thái</label>
                          <select id="status" name="status">
                            <option value="0">Chưa Hoàn thành</option>
                            <option value="1">Hoàn thành</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col mb-3">
                        <div class="form-group">
                          <label>Mô tả truyện</label>
                          <textarea class="form-control" rows="5" name="description" placeholder=""></textarea>
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
          <h5 class="modal-title" id="exampleModalLabel">Thêm Truyện</h5>
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
                          <label>Tên tác phẩm</label>
                          <input class="form-control" type="text" name="name" placeholder="" value="">
                        </div>
                      </div>
                      <div class="col">
                        <div class="form-group">
                          <label>Tác giả</label>
                          <input class="form-control" type="text" name="author" placeholder="" value="">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col">
                        <div class="form-group">
                          <label>Thể loại</label>
                          <input class="form-control" type="text" name="type" placeholder="">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col">
                        <div class="form-group">
                          <label>Nguồn</label>
                          <input class="form-control" type="text" name="source" placeholder="link" value="">
                        </div>
                      </div>
                      <div class="col">
                        <div class="form-group">
                          <label style="display: block;" for="status">Trạng thái</label>
                          <select id="status" name="status">
                            <option value="0">Chưa Hoàn thành</option>
                            <option value="1">Hoàn thành</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col mb-3">
                        <div class="form-group">
                          <label>Mô tả truyện</label>
                          <textarea class="form-control" rows="5" name="description" placeholder=""></textarea>
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

  </div>
</div>
</div>


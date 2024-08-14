<?php
    require_once("../../config/config.php");
    require_once("../../config/function.php");
    $title = 'Website | '.$PNH->site('tenweb');
    CheckLogin();
    CheckAdmin();
    require_once("../../public/admin/Header.php");
    require_once("../../public/admin/Sidebar.php");

if(!empty($getUser['permi'])): $qtv = explode(",", $getUser['permi']); if (in_array("quanlytk", $qtv)):

    if(isset($_POST['Locktk']) )
    {
        $id = check_string($_POST['id']);
        $row = $PNH->get_row("SELECT * FROM `users` WHERE `id` = '$id' ");
        if(!$row)
        {
            msg_error2("ID cần xóa không tồn tại trong hệ thống !");
        }
        if($PNH->site('status_demo') == 'ON')
        {
            admin_msg_warning("Chức năng này không khả dụng trên trang web DEMO!", "", 2000);
        }
        $PNH->update("users", array(
            'banned' => '1',
        ), " `id` = '".check_string($_POST['id'])."' ");
        admin_msg_success("Lưu thành công", '', 500);
    }
      
    if(isset($_POST['Xoatk']) )
    {
        $id = check_string($_POST['id']);
        $row = $PNH->get_row("SELECT * FROM `users` WHERE `id` = '$id' ");
        if(!$row)
        {
            msg_error2("ID cần xóa không tồn tại trong hệ thống !");
        }
        if($PNH->site('status_demo') == 'ON')
        {
            admin_msg_warning("Chức năng này không khả dụng trên trang web DEMO!", "", 2000);
        }
        // GHI LOG
        $file = @fopen('../../logs/Users.txt', 'a');
        if ($file)
        {
            $data = "[LOG] Tài khoản ".$row['fullname']." đã bị xóa khỏi hệ thống vào lúc ".gettime().PHP_EOL;
            fwrite($file, $data);
            fclose($file);
        }
        $PNH->remove("users", " `id` = '$id' ");
        admin_msg_success("Lưu thành công", '', 500);
    }
?>

<?php
if(isset($_POST['LuuChuyenMuc']) )
{
    if($PNH->site('status_demo') == 'ON')
    {
        admin_msg_warning("Chức năng này không khả dụng trên trang web DEMO!", "", 2000);
    }
    $PNH->update("users", array(
        'fullname' => check_string($_POST['fullname']),
        'email'   => check_string($_POST['email']),
        'level'   => check_string($_POST['level']),
    ), " `id` = '".check_string($_POST['id'])."' ");
  	if($_POST['password'] != ''){
    	$PNH->update("users", array(
            'password' => TypePassword(check_string($_POST['password'])),
        ), " `id` = '".check_string($_POST['id'])."' ");
    }
    admin_msg_success("Lưu thành công", '', 500);
}
if(isset($_POST['Themuser'])  )
{
    if($PNH->site('status_demo') == 'ON')
    {
        admin_msg_warning("Chức năng này không khả dụng trên trang web DEMO!", "", 2000);
    }
    $PNH->insert("users", array(
        'fullname' => check_string($_POST['ten']),
     	'email' => check_string($_POST['email']),
      	'level' => check_string($_POST['level']),		
      	'banned' => '0',
      	'total_money' => '0',
        'password' => TypePassword(check_string($_POST['password'])),
        'createdate' => gettime(),
    ));
    admin_msg_success("Thêm thành công", '', 500);
}
?>

<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-2">
                    <button type="button" class="btn btn-block btn-primary addnew">Thêm mới</button>
                </div>
                <div class="card card-outline card-primary">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Họ và tên</th>
                                        <th>Vai trò</th>
                                        <th>Trạng thái</th>
                                        <th>Last Login</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    foreach($PNH->get_list(" SELECT * FROM `users` WHERE `level` != 'member' ORDER BY id DESC ") as $row){
                                    ?>
                                    <tr>
                                        <td><?=$row['id'];?></td>
                                        <td><?=$row['fullname'];?><br><?=$row['email'];?></td>
                                        <td><?=$row['level'];?></td>
                                        <td><?php if($row['banned'] == 0): echo '<span class="badge badge-success">Hoạt động</span>'; else: echo '<span class="badge badge-danger">Banned</span>'; endif; ?></td>
                                        <td><span class="badge badge-dark"><?=$row['createdate'];?></span></td>
                                        <td>
                                            <a type="button" class="btn btn-primary btnEdit" data-id="<?=$row['id'];?>" data-fullname="<?=$row['fullname'];?>"
                                               data-level="<?=$row['level'];?>" data-email="<?=$row['email'];?>"><i class="fas fa-edit"></i></a>
                                            <a type="button" class="btn btn-danger btnLock" data-id="<?=$row['id'];?>"><i class="fas fa-ban"></i></a>
                                            <a type="button" class="btn btn-danger btnDel" data-id="<?=$row['id'];?>"><i class="fas fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                    <?php }?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- Modal -->
<div class="modal fade" id="staticBackdrop" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Sửa tài khoản</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Họ và tên</label>
                        <div class="col-sm-8">
                            <div class="form-line">
                              <input type="text" name="id" id="id" hidden>
                                <input type="text" name="fullname" id="fullname" class="form-control" required>
                            </div>
                        </div>
                    </div>
                   <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Email</label>
                        <div class="col-sm-8">
                            <div class="form-line">
                                <input type="text" name="email" id="email" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Vai trò</label>
                        <div class="col-sm-8">
                            <div class="form-line">
                                <select class="form-control select2" name="level" id="level" style="width: 100%;">
                                    <?php foreach($PNH->get_list(" SELECT * FROM `vaitro` ") as $row2){ ?>
                                      <option value="<?=$row2['ten'];?>"><?=$row2['ten'];?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Mật khẩu</label>
                        <div class="col-sm-8">
                            <div class="form-line">
                                <input type="text" name="password" class="form-control" >
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="LuuChuyenMuc" class="btn btn-danger">Lưu ngay</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal -->
<!-- Modal -->
<div class="modal fade" id="staticBackdrop2" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Thêm mới tài khoản</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Tên</label>
                        <div class="col-sm-8">
                            <div class="form-line">
                                <input type="text" name="ten"  class="form-control" required>
                            </div>
                        </div>
                    </div>
                  <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Email</label>
                        <div class="col-sm-8">
                            <div class="form-line">
                                <input type="text" name="email"  class="form-control" >
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Vai trò</label>
                        <div class="col-sm-8">
                            <div class="form-line">
                                <select class="form-control select2" name="level" id="level" style="width: 100%;">
                                    <?php foreach($PNH->get_list(" SELECT * FROM `vaitro` ") as $row2){ ?>
                                      <option value="<?=$row2['ten'];?>"><?=$row2['ten'];?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                  <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Mật khẩu</label>
                        <div class="col-sm-8">
                            <div class="form-line">
                                <input type="text" name="password"  class="form-control" >
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="Themuser" class="btn btn-danger">Lưu ngay</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal -->

<script>
$(function() {
$(document).on("click",".addnew",function(e) {  
   $("#staticBackdrop2").modal();
   return false;
});
$(document).on("click",".btnLock",function(e) {   
    Swal.fire({
        title: 'Xác nhận khóa tài khoản',
        text: "Bạn có chắc chắn khóa tài khoản này không ?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'KHÓA NGAY',
        cancelButtonText: 'HỦY'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "<?=BASE_URL("public/admin/Users.php");?>",
                method: "POST",
                data: {
                    Locktk: true,
                    id: $(this).attr("data-id")
                },
                success: function(response) {
                    $("#thongbao").html(response);
                }
            });
        }
    })
});  
$(document).on("click",".btnDel",function(e) {  
    Swal.fire({
        title: 'Xác nhận xóa tài khoản',
        text: "Bạn có chắc chắn xóa tài khoản này không ?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'XÓA NGAY',
        cancelButtonText: 'HỦY'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "<?=BASE_URL("public/admin/Users.php");?>",
                method: "POST",
                data: {
                    Xoatk: true,
                    id: $(this).attr("data-id")
                },
                success: function(response) {
                    $("#thongbao").html(response);
                }
            });
        }
    })
});   
    $(document).on("click",".btnEdit",function(e) {
        var btn = $(this);
        $("#email").val(btn.attr("data-email"));
        $("#fullname").val(btn.attr("data-fullname"));
        $("#level").val(btn.attr("data-level"));
        $("#id").val(btn.attr("data-id"));
        $("#staticBackdrop").modal();
        return false;
    });  
    $("#datatable").DataTable({
        "responsive": true,
        "autoWidth": false,
    });
});
</script>

<?php 
endif; endif;
    require_once("../../public/admin/Footer.php");
?>
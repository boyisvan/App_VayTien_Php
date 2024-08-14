<?php
    require_once("../../config/config.php");
    require_once("../../config/function.php");
    $title = 'Website | '.$PNH->site('tenweb');
    CheckLogin();
    CheckAdmin();
    require_once("../../public/admin/Header.php");
    require_once("../../public/admin/Sidebar.php");

if(!empty($getUser['permi'])): $qtv = explode(",", $getUser['permi']); if (in_array("dsnv", $qtv)):

    if(isset($_POST['Xoadsnv']) )
    {
        $id = check_string($_POST['id']);
        $row = $PNH->get_row("SELECT * FROM `cskh` WHERE `id` = '$id' ");
        if(!$row)
        {
            msg_error2("ID cần xóa không tồn tại trong hệ thống !");
        }
        // GHI LOG
        $file = @fopen('../../logs/cskh.txt', 'a');
        if ($file)
        {
            $data = "[LOG] cskh ".$row['ten']." đã bị xóa khỏi hệ thống vào lúc ".gettime().PHP_EOL;
            fwrite($file, $data);
            fclose($file);
        }
        $PNH->remove("cskh", " `id` = '$id' ");
        admin_msg_success("Xóa thành công !", "", 1000);
    }
?>

<?php 
if(isset($_POST['Stopcskh'])){
    $id = check_string($_POST['id']);
    $row = $PNH->get_row("SELECT * FROM `cskh` WHERE `id` = '$id' ");
    if(!$row)
    {
        msg_error2("ID cần xóa không tồn tại trong hệ thống !");
    }
  	$status = $row['status'];
    if($status == '1'){
      $PNH->update("cskh", array(
          'status' => '0',
      ), " `id` = '".check_string($_POST['id'])."' ");
    }else{
      $PNH->update("cskh", array(
          'status' => '1',
      ), " `id` = '".check_string($_POST['id'])."' ");
    }
    admin_msg_success("Thay đổi thành công", '', 500);
}
if(isset($_POST['ThemChuyenMuc']) )
{
    if($PNH->site('status_demo') == 'ON')
    {
        admin_msg_warning("Chức năng này không khả dụng trên trang web DEMO!", "", 2000);
    }
    $PNH->insert("cskh", array(
        'ten' => check_string($_POST['ten']),
        'cskhiphone'   => check_string($_POST['cskhiphone']),
        'cskhandroid'   => check_string($_POST['cskhandroid']),
      	'status' => '1',
        'createdate'   => gettime(),
    ));
    admin_msg_success("Thêm thành công", '', 500);
}
if(isset($_POST['LuuChuyenMuc'])  )
{
    if($PNH->site('status_demo') == 'ON')
    {
        admin_msg_warning("Chức năng này không khả dụng trên trang web DEMO!", "", 2000);
    }
    $PNH->update("cskh", array(
        'ten' => check_string($_POST['ten']),
        'cskhiphone'   => check_string($_POST['cskhiphone']),
        'cskhandroid'   => check_string($_POST['cskhandroid']),
    ), " `id` = '".check_string($_POST['id'])."' ");
    admin_msg_success("Lưu thành công", '', 500);
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
                                        <th>Tên nhân viên</th>
                                        <th>Link cskh (Iphone)</th>
                                        <th>Link cskh (Android)</th>
                                        <th>Số lượng khách hàng</th>
                                      	<th>Trạng thái</th>
                                        <th>Thời gian tạo</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    foreach($PNH->get_list(" SELECT * FROM `cskh` ORDER BY id DESC ") as $row){
                                    ?>
                                    <tr>
                                        <td><?=$i;?></td>
                                        <td><?=$row['ten'];?></td>
                                        <td><?=$row['cskhiphone'];?></td>
                                        <td><?=$row['cskhandroid'];?></td>
                                        <td><?=format_cash($PNH->num_rows(" SELECT * FROM `danhsachcskh` WHERE `nhanviencskh` = '".$row['ten']."' AND `createdate` >= DATE(NOW()) AND `createdate` < DATE(NOW()) + INTERVAL 1 DAY "));?></td>
                                        <td><?php if($row['status'] == '1'): echo "Hoạt động"; else: echo "Không hoạt động"; endif; ?></td>
                                        <td><?=$row['createdate'];?></td>
                                        <td>
                                            <a type="button" data-id="<?=$row['id'];?>" data-ten="<?=$row['ten'];?>" data-cskhiphone="<?=$row['cskhiphone'];?>" data-cskhandroid="<?=$row['cskhandroid'];?>"
                                                class="btn btn-primary btnEdit"><i class="fas fa-edit"></i></a>
                                            <a type="button" id="Xoadsnv" data-id="<?=$row['id'];?>"
                                                class="btn btn-danger btnDel"><i class="fas fa-ban"></i></a>
                                            <a type="button" id="Stop" data-id="<?=$row['id'];?>"
                                                class="btn btn-warning"><i class="fas fa-shield-alt"></i></a> 
                                        </td>
                                    </tr>
                                    <?php $i++; }?>
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
                <h5 class="modal-title" id="staticBackdropLabel">Thêm nhân viên</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Tên nhân viên</label>
                        <div class="col-sm-8">
                            <div class="form-line">
                                <input type="text" name="ten" placeholder="Tên nhân viên" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Link nhân viên (Iphone)</label>
                        <div class="col-sm-8">
                            <div class="form-line">
                                <input type="text" name="cskhiphone" placeholder="Link nhân viên (Iphone)" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Link nhân viên (Android)</label>
                        <div class="col-sm-8">
                            <div class="form-line">
                                <input type="text" name="cskhandroid" placeholder="Link nhân viên (Android)" class="form-control" >
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="ThemChuyenMuc" class="btn btn-danger">Lưu ngay</button>
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
                <h5 class="modal-title" id="staticBackdropLabel">Sửa nhân viên</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Tên nhân viên</label>
                        <div class="col-sm-8">
                            <div class="form-line">
                            <input type="text" name="id" id="id"  hidden>
                                <input type="text" name="ten"  id="ten" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Link nhân viên (Iphone)</label>
                        <div class="col-sm-8">
                            <div class="form-line">
                                <input type="text" name="cskhiphone" id="cskhiphone" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Link nhân viên (Android)</label>
                        <div class="col-sm-8">
                            <div class="form-line">
                                <input type="text" name="cskhandroid" id="cskhandroid" class="form-control" >
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


<script>
$(function() {
$(document).on("click","#Xoadsnv",function(e) {
    Swal.fire({
        title: 'Xác nhận xóa nhân viên',
        text: "Bạn có chắc chắn xóa nhân viên này không ?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'XÓA NGAY',
        cancelButtonText: 'HỦY'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "<?=BASE_URL("public/admin/Cskhmanage.php");?>",
                method: "POST",
                data: {
                    Xoadsnv: true,
                    id: $(this).attr("data-id")
                },
                success: function(response) {
                    $("#thongbao").html(response);
                }
            });
        }
    })
});
  
    $(document).on("click","#Stop",function(e) {
       $.ajax({
          url: "<?=BASE_URL("public/admin/Cskhmanage.php");?>",
          method: "POST",
          data: {
              Stopcskh: true,
              id: $(this).attr("data-id")
          },
          success: function(response) {
              $("#thongbao").html(response);
          }
      });
    });
    $(document).on("click",".addnew",function(e) {
        $("#staticBackdrop").modal();
        return false;
    });
    $(document).on("click",".btnEdit",function(e) {
        var btn = $(this);
        $("#ten").val(btn.attr("data-ten"));
        $("#cskhiphone").val(btn.attr("data-cskhiphone"));
        $("#cskhandroid").val(btn.attr("data-cskhandroid"));
        $("#id").val(btn.attr("data-id"));
        $("#staticBackdrop2").modal();
        return false;
    });
    $("#datatable").DataTable({
        "responsive": true,
        "autoWidth": false,
    });
});
</script>
<?php endif; endif; ?>
<?php 
    require_once("../../public/admin/Footer.php");
?>
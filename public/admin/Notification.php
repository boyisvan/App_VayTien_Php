<?php
    require_once("../../config/config.php");
    require_once("../../config/function.php");
    $title = 'Website | '.$PNH->site('tenweb');
    CheckLogin();
    CheckAdmin();
    require_once("../../public/admin/Header.php");
    require_once("../../public/admin/Sidebar.php");
?>

<?php
if(!empty($getUser['permi'])): $qtv = explode(",", $getUser['permi']); if (in_array("qltk", $qtv)):

if(isset($_POST['ThemChuyenMuc']) )
{
    if($PNH->site('status_demo') == 'ON')
    {
        admin_msg_warning("Chức năng này không khả dụng trên trang web DEMO!", "", 2000);
    }
    $PNH->insert("thongbao", array(
        'ten' => check_string($_POST['ten']),
        'content'   => $_POST['content'],
        'phone'   => check_string($_POST['phone']),
        'createdate'   => gettime()
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
                                        <th>Tiêu đề</th>
                                        <th>Nội dung</th>
                                        <th>Số điện thoại</th>
                                        <th>Thời gian </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    foreach($PNH->get_list(" SELECT * FROM `thongbao` ORDER BY id DESC ") as $row){
                                    ?>
                                    <tr>
                                        <td><?=$i;?></td>
                                        <td><?=$row['ten'];?></td>
                                        <td><?=$row['content'];?></td>
                                        <td><?=$row['phone'];?></td>
                                        <td><?=$row['createdate'];?></td>
                                       
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
                <h5 class="modal-title" id="staticBackdropLabel">Tạo thông báo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Tiêu đề</label>
                        <div class="col-sm-8">
                            <div class="form-line">
                                <input type="text" name="ten"  class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Nội dung</label>
                        <div class="col-sm-8">
                            <div class="form-line">
                                <input type="text" name="content"  class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Số điện thoại</label>
                        <div class="col-sm-8">
                            <div class="form-line">
                                <input type="text" name="phone"  class="form-control" >
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


<script>
$(function() {
    $('.addnew').on('click', function(e) {
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
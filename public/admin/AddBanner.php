<?php
    require_once("../../config/config.php");
    require_once("../../config/function.php");
    CheckLogin();
    CheckAdmin();
    $title = 'THÊM BANNER | '.$PNH->site('tenweb');
    require_once(__DIR__."/Header.php");
    require_once(__DIR__."/Sidebar.php");

    if(isset($_POST['XoaChuyenMuc']) && $getUser['level'] == 'admin' )
    {
        $id = check_string($_POST['id']);
        $row = $PNH->get_row("SELECT * FROM `bannerhome` WHERE `id` = '$id' ");
        if(!$row)
        {
            msg_error2("ID cần xóa không tồn tại trong hệ thống !");
        }
        // GHI LOG
        $file = @fopen('../../logs/XoaCategory.txt', 'a');
        if ($file)
        {
            $data = "[LOG] Bannerhome ".$row['title']." đã bị xóa khỏi hệ thống vào lúc ".gettime().PHP_EOL;
            fwrite($file, $data);
            fclose($file);
        }
        $PNH->remove("bannerhome", " `id` = '$id' ");
        admin_msg_success("Xóa thành công !", "", 1000);
    }
?>

<?php
if(isset($_POST['ThemChuyenMuc']) && $getUser['level'] == 'admin' )
{
    if($PNH->site('status_demo') == 'ON')
    {
        admin_msg_warning("Chức năng này không khả dụng trên trang web DEMO!", "", 2000);
    }
    $rand = random("QWERTYUIOPASDFGHJKLZXCVBNM0123456789", 12);
    if(check_img('img') == true)
    {
        $uploads_dir = '../../assets/storage/images';
        $tmp_name = $_FILES['img']['tmp_name'];
        $url_img = "/category_".$rand.".png";
        $create = move_uploaded_file($tmp_name, $uploads_dir.$url_img);
    }
    $PNH->insert("bannerhome", array(
        'img'       => '/assets/storage/images'.$url_img,
        'link'  => check_string($_POST['link']),
        'title'     => check_string($_POST['title']),
    ));
    admin_msg_success("Thêm thành công", '', 500);
}
if(isset($_POST['LuuChuyenMuc']) && $getUser['level'] == 'admin' )
{
    if($PNH->site('status_demo') == 'ON')
    {
        admin_msg_warning("Chức năng này không khả dụng trên trang web DEMO!", "", 2000);
    }
    if(check_img('img') == true)
    {
        $rand = random("QWERTYUIOPASDFGHJKLZXCVBNM0123456789", 12);
        $uploads_dir = '../../assets/storage/images';
        $tmp_name = $_FILES['img']['tmp_name'];
        $url_img = "/category_".$rand.".png";
        $create = move_uploaded_file($tmp_name, $uploads_dir.$url_img);
        $PNH->update("bannerhome", array(
            'img'       => '/assets/storage/images'.$url_img
        ), " `id` = '".check_string($_POST['id'])."' ");
    }
    $PNH->update("bannerhome", array(
        'link'  => check_string($_POST['link']),
        'title'     => check_string($_POST['title']),
    ), " `id` = '".check_string($_POST['id'])."' ");
    admin_msg_success("Lưu thành công", '', 500);
}
?>


<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>BANNER</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">THÊM BANNER</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                    class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Tên banner</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="text" name="title" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Link</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input class="form-control" name="link" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Icon</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="form-control" id="exampleInputFile" name="img"
                                                    required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" name="ThemChuyenMuc" class="btn btn-primary btn-block">
                                <span>THÊM NGAY</span></button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">DANH SÁCH BANNER</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                    class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="thongbao"></div>
                        <div class="table-responsive">
                            <table id="datatable1" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>ICON</th>
                                        <th>TÊN BANNER</th>
                                        <th>LINK</th>
                                        <th>THAO TÁC</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1; foreach($PNH->get_list(" SELECT * FROM `bannerhome` ORDER BY id DESC ") as $row){ ?>
                                    <tr>
                                        <td><?=$i;?></td>
                                        <td width="5%"><img width="100%" src="<?=BASE_URL($row['img']);?>" /></td>
                                        <td><?=$row['title'];?></td>
                                        <td><?=$row['link'];?></td>
                                        <td>
                                            <button class="btn btn-primary btnEdit" data-title="<?=$row['title'];?>" data-link='<?=$row['link'];?>'
                                             data-id="<?=$row['id'];?>"><i
                                                    class="fas fa-edit"></i>
                                                <span>EDIT</span>
                                            </button>
                                            <button class="btn btn-danger btnDelete" id="XoaChuyenMuc" data-id="<?=$row['id'];?>"><i
                                                    class="fas fa-trash"></i>
                                                <span>DELETE</span>
                                            </button>
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
<div class="modal fade" id="staticBackdrop" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">EDIT BANNER</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Tên banner</label>
                        <div class="col-sm-8">
                            <div class="form-line">
                                <input type="hidden" name="id" id="id" class="form-control" required>
                                <input type="text" name="title" id="title" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Link</label>
                        <div class="col-sm-8">
                            <div class="form-line" id="description2">
                                <input type="text" name="link" id="link" class="form-control" required>
                            </div>
                        </div>
                    </div>   
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Icon</label>
                        <div class="col-sm-8">
                            <div class="form-line">
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="form-control" id="exampleInputFile" name="img">
                                    </div>
                                </div>
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


<script type="text/javascript">
$(".btnDelete").on("click", function() {
    Swal.fire({
        title: 'Xác nhận xóa banner',
        text: "Bạn có chắc chắn xóa banner này không ?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'XÓA NGAY',
        cancelButtonText: 'HỦY'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "<?=BASE_URL("public/admin/AddBanner.php");?>",
                method: "POST",
                data: {
                    XoaChuyenMuc: true,
                    id: $(this).attr("data-id")
                },
                success: function(response) {
                    $("#thongbao").html(response);
                }
            });
        }
    })
});
</script>

<script type="text/javascript">
$('.btnEdit').on('click', function(e) {
    var btn = $(this);
    $("#title").val(btn.attr("data-title"));
    $("#link").val(btn.attr("data-link"));
    $("#id").val(btn.attr("data-id"));
    $("#staticBackdrop").modal();
    return false;
});
</script>
<script>
$(function() {
    $("#datatable").DataTable({
        "responsive": true,
        "autoWidth": false,
    });
    $("#datatable1").DataTable({
        "responsive": true,
        "autoWidth": false,
    });
    $("#datatable2").DataTable({
        "responsive": true,
        "autoWidth": false,
    });
});
</script>



<?php 
    require_once(__DIR__."/Footer.php");
?>
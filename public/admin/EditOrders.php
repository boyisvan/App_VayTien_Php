<?php
    require_once("../../config/config.php");
    require_once("../../config/function.php");
    require_once('../../class/PHPMailerAutoload.php');
    require_once('../../class/class.phpmailer.php');
    $title = 'CHỈNH SỬA TRẠNG THÁI ORDER | '.$PNH->site('tenweb');
    CheckLogin();
    CheckAdmin();
    require_once("../../public/admin/Header.php");
    require_once("../../public/admin/Sidebar.php");
?>
<?php 
if(isset($_GET['id']) && $getUser['level'] == 'admin')
{
    $row = $PNH->get_row(" SELECT * FROM `orders` WHERE `id` = '".check_string($_GET['id'])."'  ");
    if(!$row)
    {
        admin_msg_error("Orders không hợp lệ", BASE_URL(''), 500);
    }
}
else
{
    admin_msg_error("Orders không hợp lệ", BASE_URL(''), 0);
}

if( isset($_POST['btnSubmit']) && isset($_POST['trangthai']) )
{
    if($PNH->site('status_demo') == 'ON')
    {
        admin_msg_error("Chức năng này không khả dụng trên trang web DEMO!", "", 2000);
    }
    if($getUser['level'] != 'admin')
    {
        admin_msg_error('Chức năng này chỉ dành cho Admin.', '', 1000);
    }
    $row = $PNH->get_row(" SELECT * FROM `orders` WHERE `id` = '".check_string($_GET['id'])."' ");
    if(!$row)
    {
        admin_msg_error("Orders không hợp lệ", BASE_URL(''), 500);
    }
    $trangthai = check_string($_POST['trangthai']);
    $keyrandom = random('qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM', 7).time();
    if($trangthai == 'Đã thanh toán'){
        $liskh = explode(',',$row['title']);
        $keykhoahoc = generate_license($keyrandom);
        foreach($liskh as $key => $value){
            if($value == ''){
            }else{
                $PNH->insert("licensekhoahoc", array(
                    'idkhoahoc'   => $PNH->get_row(" SELECT id FROM `khoahoc` WHERE `title` = '" . $value . "' ")['id'],
                    'username'    => $row['username'],
                    'keylicense'  => $keykhoahoc
                ));
                sendCSM($row['username'],'Gửi mail','Bạn đã thanh toán Khóa học thành công','Chào bạn, <br><br>Mã kích hoạt khóa học của bạn:'.$keykhoahoc.'<br><br>Bạn vui lòng mã khóa học tại Website.<br><br>Cảm ơn bạn đã quan tâm tới Khóa học của chúng tôi.','Khóa học online');
            }
        }
        $create = $PNH->update("orders", array(
            'trangthai'        => $trangthai,
        ), " `id` = '".check_string($_GET['id'])."' ");
    }else{
        $create = $PNH->update("orders", array(
            'trangthai'        => $trangthai,
        ), " `id` = '".check_string($_GET['id'])."' ");
    }
    if($create)
    {
        admin_msg_success("Thay đổi thông tin Orders thành công", "", 1000);
    }
    else
    {
       admin_msg_error("Không thể lưu, vui lòng thử lại sau.", "", 2000);
    }
}
?>



<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Chỉnh sửa Orders</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">EDIT ORDERS</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                    class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                        
                            
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Trạng thái</label>
                                <div class="col-sm-9">
                                  	<select class="form-control" name="trangthai" required>
                                        <option value="<?=$row['trangthai']; ?>"><?=$row['trangthai']; ?></option>
                                        <option value="Chờ thanh toán">Chờ thanh toán</option>
                                      	<option value="Đã thanh toán">Đã thanh toán</option>
                                    </select>
                                </div>
                            </div>
                            <button type="submit" name="btnSubmit" class="btn btn-primary btn-block waves-effect">
                                <span>LƯU</span>
                            </button>
                            <a type="button" href="<?=BASE_URL('Admin/Orders');?>"
                                class="btn btn-danger btn-block waves-effect">
                                <span>TRỞ LẠI</span>
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


<script>
$(function() {
    $("#datatable").DataTable({
        "responsive": true,
        "autoWidth": false,
    });
});
</script>

<script>
$(function() {
    // Summernote
    $('.textarea').summernote()
})
</script>
<?php 
    require_once("../../public/admin/Footer.php");
?>
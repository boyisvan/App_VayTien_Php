<?php
require_once("../../config/config.php");
require_once("../../config/function.php");
$title = 'DASHBROAD | ' . $PNH->site('tenweb');
require_once("../../public/admin/Header.php");
require_once("../../public/admin/Sidebar.php");

if(isset($_POST['btndeltk'])  )
{
    $id = check_string($_POST['id']);
    $row = $PNH->get_row("SELECT * FROM `users` WHERE `id` = '$id' ");
    if(!$row)
    {
        msg_error2("ID cần xóa không tồn tại trong hệ thống !");
    }
    // GHI LOG
    $file = @fopen('../../logs/cskh.txt', 'a');
    if ($file)
    {
        $data = "[LOG] users ".$row['ten']." đã bị xóa khỏi hệ thống vào lúc ".gettime().PHP_EOL;
        fwrite($file, $data);
        fclose($file);
    }
    $PNH->remove("users", " `id` = '$id' ");
    admin_msg_success("Xóa tài khoản thành công !", "", 1000);
}
if(isset($_POST['duyetvay'])   )
{
    $id = check_string($_POST['id']);
    $row = $PNH->get_row("SELECT * FROM `orders` WHERE `id` = '$id' ");
    if(!$row)
    {
        msg_error2("ID cần xóa không tồn tại trong hệ thống !");
    }
    $PNH->update("orders", array(
        'trangthai' => 'Chấp nhận',
    ), " `id` = '".check_string($_POST['id'])."' ");
     $create = $PNH->cong("users", "total_money", $_POST['tien'], " `phone` = '".$row['phone']."' ");
      if($create){
          admin_msg_success("Lưu thành công", '', 500);
      }else{
          msg_error2("Lỗi vui lòng liên hệ Admin !");
      }
}
if(isset($_POST['tuchoivay'])  )
{
    $id = check_string($_POST['id']);
    $row = $PNH->get_row("SELECT * FROM `orders` WHERE `id` = '$id' ");
    if(!$row)
    {
        msg_error2("ID cần xóa không tồn tại trong hệ thống !");
    }
    $username = $row['phone'];
    $PNH->update("orders", array(
        'trangthai' => 'Từ chối',
    ), " `id` = '".check_string($_POST['id'])."' ");
  	$create = $PNH->update("users", array(
        'lenhthongbao' => 'Từ chối khoản vay !',
    ), " `username` = '".$username."' ");
    if($create){
		admin_msg_success("Lưu thành công", '', 500);
    }
}
if(isset($_POST['Naptienthem'])  )
{
    if($PNH->site('status_demo') == 'ON')
    {
        admin_msg_warning("Chức năng này không khả dụng trên trang web DEMO!", "", 2000);
    }
    $create = $PNH->insert("dongtien", array(
        'sotienthaydoi' => check_string($_POST['sotiennew']),
        'noidung'   => check_string($_POST['lydonew']),
        'username'   => check_string($_POST['phonenew']),
        'thoigian'   => gettime(),
        'hanhdong'  => 'Nap'
    ));
    $PNH->cong("users", "total_money", $_POST['sotiennew'], " `username` = '".$_POST['phonenew']."' ");
    if($create){
      admin_msg_success("Nạp tiền thành công", '', 500);
    }else{
      msg_error2("Lỗi vui lòng liên hệ Admin !");
    }
}
if(isset($_POST['Ruttienthem']) )
{
    if($PNH->site('status_demo') == 'ON')
    {
        admin_msg_warning("Chức năng này không khả dụng trên trang web DEMO!", "", 2000);
    }
    $create = $PNH->insert("dongtien", array(
        'sotienthaydoi' => check_string($_POST['sotiennew']),
        'noidung'   => check_string($_POST['lydonew']),
        'username'   => check_string($_POST['phonenew']),
        'thoigian'   => gettime(),
        'hanhdong'  => 'Rut'
    ));
    $PNH->tru("users", "total_money", $_POST['sotiennew'], " `username` = '".$_POST['phonenew']."' ");
    if($create){
      admin_msg_success("Rút tiền thành công", '', 500);
    }else{
      msg_error2("Lỗi vui lòng liên hệ Admin !");
    }
}
if(isset($_POST['Changepass'])  )
{
    if($PNH->site('status_demo') == 'ON')
    {
        admin_msg_warning("Chức năng này không khả dụng trên trang web DEMO!", "", 2000);
    }
    $PNH->update("users", array(
        'password' => TypePassword(check_string($_POST['password']))
    ), " `id` = '".check_string($_POST['id'])."' ");
    admin_msg_success("Lưu mật khẩu thành công", '', 500);
}
if(isset($_POST['changethongbao'])  )
{
    if($PNH->site('status_demo') == 'ON')
    {
        admin_msg_warning("Chức năng này không khả dụng trên trang web DEMO!", "", 2000);
    }
    $PNH->update("users", array(
        'lenhthongbao' => check_string($_POST['qltb']),
    ), " `id` = '".check_string($_POST['id'])."' ");    
    msg_success2("Thay đổi thành công !");
}
if(isset($_POST['Changethongbaouser'])){
	if($PNH->site('status_demo') == 'ON')
    {
        admin_msg_warning("Chức năng này không khả dụng trên trang web DEMO!", "", 2000);
    }
    $PNH->update("users", array(
        'lenhthongbao' => check_string($_POST['lenhthongbao']),
    ), " `username` = '".check_string($_POST['username'])."' "); 
    admin_msg_success("Lưu mật khẩu thành công", '', 500);
}
if(isset($_POST['LuuChuyenMuc'])  )
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
        $url_img = "/cmndmt_".$rand.".png";
        $create = move_uploaded_file($tmp_name, $uploads_dir.$url_img);
        $PNH->update("users", array(
            'image'       => '/assets/storage/images'.$url_img
        ), " `phone` = '".check_string($_POST['phone'])."' ");
    }
    if(check_img('img2') == true)
    {
        $rand = random("QWERTYUIOPASDFGHJKLZXCVBNM0123456789", 12);
        $uploads_dir = '../../assets/storage/images';
        $tmp_name = $_FILES['img2']['tmp_name'];
        $url_img = "/cmndms_".$rand.".png";
        $create = move_uploaded_file($tmp_name, $uploads_dir.$url_img);
        $PNH->update("users", array(
            'image2'       => '/assets/storage/images'.$url_img
        ), " `phone` = '".check_string($_POST['phone'])."' ");
    }
    if(check_img('img3') == true)
    {
        $rand = random("QWERTYUIOPASDFGHJKLZXCVBNM0123456789", 12);
        $uploads_dir = '../../assets/storage/images';
        $tmp_name = $_FILES['img3']['tmp_name'];
        $url_img = "/cmndchandung_".$rand.".png";
        $create = move_uploaded_file($tmp_name, $uploads_dir.$url_img);
        $PNH->update("users", array(
            'image3'       => '/assets/storage/images'.$url_img
        ), " `phone` = '".check_string($_POST['phone'])."' ");
    }
    $create = $PNH->update("users", array(
        'fullname' => check_string($_POST['fullname']),
        'gioitinh' => check_string($_POST['sex']),
        'dob' => check_string($_POST['dob']),
        'nghenghiep' => check_string($_POST['job']),
        'thunhap' => check_string($_POST['thunhap']),
        'mucdichvay' => check_string($_POST['mucdich']),
        'cmnd' => check_string($_POST['cmnd']),
        'address' => check_string($_POST['address']),
        'sdtngthan' => check_string($_POST['sdtngthan']),
        'moiquanhengthan' => check_string($_POST['moiquanhengthan']),
        'tennganhang' => check_string($_POST['tennganhang']),
        'tenchubank' => check_string($_POST['tenchubank']),
        'stkbank' => check_string($_POST['stkbank']),
    ), " `phone` = '".check_string($_POST['phone'])."' ");
    $PNH->update("users", array(
        'sotien' => check_string($_POST['sotienvay']),
        'thoigianvay' => check_string($_POST['sothang']),
    ), " `phone` = '".check_string($_POST['phone'])."' ");
    if($create){
        admin_msg_success("Thay đổi thông báo tài khoản thành công", '', 500);
    }else{
        msg_error2("Lỗi vui lòng liên hệ Admin !");
    }
}
?>
<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-12 col-sm-12">
                <div class="card card-primary card-outline card-outline-tabs">
                    <div class="card-header p-0 border-bottom-0">
                        <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">Thông tin khoản vay</a>
                            </li>
                           <?php if(!empty($getUser['permi'])): $qtv = explode(",", $getUser['permi']); if (in_array("naptien", $qtv)):  ?>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">Nạp tiền</a>
                            </li>
                           <?php endif; endif; ?>
                          <?php if (in_array("quanlytk2", $qtv)):  ?>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-four-messages-tab" data-toggle="pill" href="#custom-tabs-four-messages" role="tab" aria-controls="custom-tabs-four-messages" aria-selected="false">Quản lý tài khoản</a>
                            </li>
                          <?php endif; ?>
                          <?php if (in_array("tbnaptien", $qtv)):  ?>
                            <li class="nav-item">
                                <a class="nav-link " id="custom-tabs-four-settings-tab" data-toggle="pill" href="#custom-tabs-four-settings" role="tab" aria-controls="custom-tabs-four-settings" aria-selected="false">Thông báo nạp tiền</a>
                            </li>
                          <?php endif; ?>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="custom-tabs-four-tabContent">
                            <div class="tab-pane fade active show" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                                <div class="row">
                                    <div class="col-md-3 col-sm-6 col-12">
                                        <div class="info-box">
                                            <span class="info-box-icon bg-info"><i class="far fa-envelope"></i></span>
                                            <div class="info-box-content">
                                                <span class="info-box-text">Tổng số khoản vay</span>
                                                <span class="info-box-number"><?=format_cash($PNH->num_rows("SELECT * FROM `orders` WHERE `trangthai` IS NOT NULL "));?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6 col-12">
                                        <div class="info-box">
                                            <span class="info-box-icon bg-success"><i class="far fa-flag"></i></span>
                                            <div class="info-box-content">
                                                <span class="info-box-text">Khoản vay chờ duyệt</span>
                                                <span class="info-box-number"><?=format_cash($PNH->num_rows("SELECT * FROM `orders` WHERE `trangthai` = 'Đang chờ duyệt' "));?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6 col-12">
                                        <div class="info-box">
                                            <span class="info-box-icon bg-warning"><i class="far fa-copy"></i></span>
                                            <div class="info-box-content">
                                                <span class="info-box-text">Khoản vay đã duyệt</span>
                                                <span class="info-box-number"><?=format_cash($PNH->num_rows("SELECT * FROM `orders` WHERE `trangthai` = 'Chấp nhận' "));?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6 col-12">
                                        <div class="info-box">
                                            <span class="info-box-icon bg-danger"><i class="far fa-star"></i></span>
                                            <div class="info-box-content">
                                                <span class="info-box-text">Khoản vay từ chối</span>
                                                <span class="info-box-number"><?=format_cash($PNH->num_rows("SELECT * FROM `orders` WHERE `trangthai` = 'Từ chối' "));?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-6">
                                                        </div>
                                                        <div class="col-sm-12 col-md-6">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <table id="example1" class="table table-bordered table-striped dataTable dtr-inline">
                                                                <thead>
                                                                    <tr>
                                                                        <th>ID</th>
                                                                        <th>Mã khoản vay</th>
                                                                        <th>Họ và tên</th>
                                                                        <th>Số điện thoại</th>
                                                                        <th>Số tiền vay</th>
                                                                        <th>Số tháng</th>
                                                                        <th>Chữ ký</th>
                                                                        <th>Trạng thái</th>
                                                                        <th>Thời gian</th>
                                                                        <th>Hành động</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php
                                                                    $i = 1;
                                                                    foreach ($PNH->get_list(" SELECT * FROM `orders` WHERE `trangthai` IS NOT NULL ORDER BY id DESC ") as $row) {
                                                                    ?>
                                                                        <tr>
                                                                            <td><?= $i; ?></td>
                                                                            <td><?= $row['code']; ?></td>
                                                                            <td><?php $rowuser = $PNH->get_row(" SELECT * FROM `users` WHERE `phone` = '" . $row['phone'] . "' ");
                                                                                echo $rowuser['fullname']; ?></td>
                                                                            <td><?= $row['phone']; ?></td>
                                                                            <td><?=number_format($row['sotien']); ?> VNĐ</td>
                                                                            <td><?= $row['thoigianvay']; ?></td>
                                                                            <td>
                                                                                <img width="40%" src="<?= $row['chuky']; ?>" alt="">
                                                                            </td>
                                                                            <td><span style="color:rgb(235, 141, 1)"><?= $row['trangthai']; ?></span></td>
                                                                            <td><?= date('d-m-Y H:i:s', $row['time']); ?></td>
                                                                            <td>
                                                                                <a type="button" data-fullname="<?= $rowuser['fullname']; ?>" data-phone="<?= $row['phone']; ?>" data-sotien="<?= $row['sotien']; ?>" data-thoigianvay="<?= $row['thoigianvay']; ?>" data-gioitinh="<?= $rowuser['gioitinh']; ?>" data-dob="<?= $rowuser['dob']; ?>" data-nghenghiep="<?= $rowuser['nghenghiep']; ?>" data-thunhap="<?= $rowuser['thunhap']; ?>" data-mucdichvay="<?= $rowuser['mucdichvay']; ?>" data-cmnd="<?= $rowuser['cmnd']; ?>" data-address="<?= $rowuser['address']; ?>" data-sdtngthan="<?= $rowuser['sdtngthan']; ?>" data-moiquanhengthan="<?= $rowuser['moiquanhengthan']; ?>" data-stkbank="<?= $rowuser['stkbank']; ?>" data-tenchubank="<?= $rowuser['tenchubank']; ?>" data-tennganhang="<?= $rowuser['tennganhang']; ?>" class="btn btn-primary btnEdit"><i class="fas fa-edit"></i></a>
                                                                                <a type="button" class="btn btn-success duyet" data-id="<?=$row['id']; ?>" data-sotien="<?= $row['sotien']; ?>"><i class="far fa-check-circle"></i></a>
                                                                                <a type="button" class="btn btn-danger tuchoi" data-id="<?=$row['id']; ?>"><i class="fas fa-ban"></i></a>
                                                                                <a type="button" data-img="<?= $rowuser['image']; ?>" data-img2="<?= $rowuser['image2']; ?>" data-img3="<?= $rowuser['image3']; ?>" data-fullname="<?= $rowuser['fullname']; ?>" data-phone="<?= $row['phone']; ?>" data-sotien="<?= $row['sotien']; ?>" data-thoigianvay="<?= $row['thoigianvay']; ?>" data-gioitinh="<?= $rowuser['gioitinh']; ?>" data-dob="<?= $rowuser['dob']; ?>" data-nghenghiep="<?= $rowuser['nghenghiep']; ?>" data-thunhap="<?= $rowuser['thunhap']; ?>" data-mucdichvay="<?= $rowuser['mucdichvay']; ?>" data-cmnd="<?= $rowuser['cmnd']; ?>" data-address="<?= $rowuser['address']; ?>" data-sdtngthan="<?= $rowuser['sdtngthan']; ?>" data-moiquanhengthan="<?= $rowuser['moiquanhengthan']; ?>" data-stkbank="<?= $rowuser['stkbank']; ?>" data-tenchubank="<?= $rowuser['tenchubank']; ?>" data-tennganhang="<?= $rowuser['tennganhang']; ?>" class="btn btn-primary btnView"><i class="far fa-eye"></i></a>
                                                                            </td>
                                                                        </tr>
                                                                    <?php $i++;
                                                                    } ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php if (in_array("naptien", $qtv)):  ?>
                            <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                                    <div class="row">
                                                        <div class="col-sm-2 mb-2">
                                                            <button type="button" class="btn btn-block btn-primary naptiennew">Nạp tiền</button>
                                                        </div>
                                                        <div class="col-sm-2 mb-2">
                                                            <button type="button" class="btn btn-block btn-danger ruttiennew">Rút tiền</button>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <table id="example2" class="table table-bordered table-striped dataTable dtr-inline">
                                                                <thead>
                                                                    <tr>
                                                                        <th>ID</th>
                                                                        <th>Số điện thoại</th>
                                                                        <th>Lý do</th>
                                                                        <th>Số tiền nạp/rút</th>
                                                                        <th>Thời gian</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php
                                                                    $i = 1;
                                                                    foreach ($PNH->get_list(" SELECT * FROM `dongtien` WHERE `username` IS NOT NULL ORDER BY id DESC ") as $row) {
                                                                    ?>
                                                                        <tr>
                                                                            <td><?= $i; ?></td>
                                                                            <td><?= $row['username']; ?></td>
                                                                            <td><?= $row['noidung']; ?></td>
                                                                            <td><?php if($row['hanhdong'] == 'Nap'): echo '+ '.number_format($row['sotienthaydoi']); else: echo '- '.number_format($row['sotienthaydoi']); endif; ?> VNĐ</td>
                                                                            <td><?= $row['thoigian']; ?></td>
                                                                        </tr>
                                                                    <?php $i++;
                                                                    } ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>
                            <?php if (in_array("quanlytk2", $qtv)):  ?>
                            <div class="tab-pane fade" id="custom-tabs-four-messages" role="tabpanel" aria-labelledby="custom-tabs-four-messages-tab">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-6">
                                                        </div>
                                                        <div class="col-sm-12 col-md-6">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <table id="example3" class="table table-bordered table-striped dataTable dtr-inline">
                                                                <thead>
                                                                    <tr>
                                                                        <th>ID</th>
                                                                        <th>Số điện thoại</th>
                                                                        <th>Số dư tài khoản</th>
                                                                        <th>Loại thông báo</th>
                                                                        <th>Thời gian đăng ký</th>
                                                                        <th>Hành động</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php
                                                                    $i = 1;
                                                                    foreach ($PNH->get_list(" SELECT * FROM `users` WHERE `level` = 'member' ORDER BY id DESC ") as $row) {
                                                                    ?>
                                                                        <tr>
                                                                            <td><?= $i; ?></td>
                                                                            <td><?= $row['phone']; ?></td>
                                                                            <th><?=number_format($row['total_money']); ?> VND</th>
                                                                            <td>
                                                                                <select class="form-control select2" id="quanlythongbao" data-id="<?=$row['id']; ?>" style="width: 100%;">
                                                                                    <option value="<?= $row['lenhthongbao']; ?>" selected="selected"><?= $row['lenhthongbao']; ?></option>
                                                                                    <option value="Sai thông tin liên kết ví !" >Sai thông tin liên kết ví !</option>
                                                                                    <option value="Điểm tín dụng quá thấp !">Điểm tín dụng quá thấp !</option>
                                                                                    <option value="Hồ sơ đã đươc tạo chờ xử lý trong 2 giờ !">Hồ sơ đã đươc tạo chờ xử lý trong 2 giờ !</option>
                                                                                    <option value="Đóng Băng Tài Khoản !">Đóng Băng Tài Khoản !</option>
                                                                                    <option value="Số tiền rút vi phạm hợp đồng vay. Vui lòng liên hệ cskh !">Số tiền rút vi phạm hợp đồng vay. Vui lòng liên hệ cskh !</option>
                                                                                    <option value="Yêu Cầu Đóng Bảo Hiểm. Để Nhận Khoản Vay !">Yêu Cầu Đóng Bảo Hiểm. Để Nhận Khoản Vay !</option>
                                                                                </select>
                                                                            </td>
                                                                            <td><?=$row['createdate']; ?></td>
                                                                            <td>
                                                                                <a type="button" class="btn btn-primary btnchangepassword" data-idmatkhau="<?=$row['id']; ?>"><i class="fas fa-edit"></i></a>
                                                                                <a type="button" class="btn btn-danger btndeltk" data-id="<?=$row['id']; ?>"><i class="fas fa-ban"></i></a></td>
                                                                        </tr>
                                                                    <?php $i++;
                                                                    } ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>
                            <?php if (in_array("tbnaptien", $qtv)):  ?>
                            <div class="tab-pane fade " id="custom-tabs-four-settings" role="tabpanel" aria-labelledby="custom-tabs-four-settings-tab">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-6">
                                                        </div>
                                                        <div class="col-sm-12 col-md-6">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <h3>Thông báo mặc định</h3>
                                                            <table id="example33" class="table table-bordered table-striped dataTable dtr-inline">
                                                                <thead>
                                                                    <tr>
                                                                        <th>ID</th>
                                                                        <th>Nội dung</th>
                                                                        <th>Số điện thoại</th>
                                                                        <th>Loại thông báo</th>
                                                                        <th>Thời gian</th>
                                                                        <th>Hành động</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                        <tr>
                                                                            <td>1</td>
                                                                            <td><?=$PNH->site('thongbao_admin');?></td>
                                                                            <th>Tất cả</th>
                                                                            <td>Thất bại (Mặc định)</td>
                                                                            <td><?=$row['createdate']; ?></td>
                                                                            <td><a type="button"  class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                                                        </tr>
                                                                </tbody>
                                                            </table>

                                                            <h3>Danh sách thông báo</h3>
                                                            <table id="example5" class="table table-bordered table-striped dataTable dtr-inline">
                                                                <thead>
                                                                    <tr>
                                                                        <th>ID</th>
                                                                        <th>Nội dung</th>
                                                                        <th>Số điện thoại</th>
                                                                        <th>Loại thông báo</th>
                                                                        <th>Thời gian</th>
                                                                        <th>Hành động</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php
                                                                    $i = 1;
                                                                    foreach ($PNH->get_list(" SELECT * FROM `users` ORDER BY id DESC ") as $row) {
                                                                    ?>
                                                                        <tr>
                                                                            <td><?= $i; ?></td>
                                                                            <td><?= $row['phone']; ?></td>
                                                                            <th><?=number_format($row['total_money']); ?> VND</th>
                                                                            <td>
                                                                                <select class="form-control select2" id="quanlythongbao" data-id="<?=$row['id']; ?>" style="width: 100%;">
                                                                                    <option value="<?=$row['lenhthongbao'] ;?>" selected="selected"><?=$row['lenhthongbao'] ;?></option>
                                                                                    <option value="Sai thông tin liên kết ví !">Sai thông tin liên kết ví !</option>
                                                                                    <option value="Điểm tín dụng quá thấp !">Điểm tín dụng quá thấp !</option>
                                                                                    <option value="Hồ sơ đã đươc tạo chờ xử lý trong 2 giờ !">Hồ sơ đã đươc tạo chờ xử lý trong 2 giờ !</option>
                                                                                    <option value="Đóng Băng Tài Khoản !">Đóng Băng Tài Khoản !</option>
                                                                                    <option value="Số tiền rút vi phạm hợp đồng vay. Vui lòng liên hệ cskh !">Số tiền rút vi phạm hợp đồng vay. Vui lòng liên hệ cskh !</option>
                                                                                    <option value="Yêu Cầu Đóng Bảo Hiểm. Để Nhận Khoản Vay !">Yêu Cầu Đóng Bảo Hiểm. Để Nhận Khoản Vay !</option>
                                                                                </select>
                                                                            </td>
                                                                            <td><?= $row['createdate']; ?></td>
                                                                            <td><a type="button" class="btn btn-primary btneditthongbaouser" data-id="<?=$row['username']; ?>"><i class="fas fa-edit"></i></a>
                                                                                <a type="button" class="btn btn-danger"><i class="fas fa-ban"></i></a></td>
                                                                        </tr>
                                                                    <?php $i++;
                                                                    } ?>
                                                                </tbody>
                                                            </table>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- Modal -->
<div class="modal fade" id="staticBackdrop" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Sửa thông tin khoản vay</h5>
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
                                <input type="hidden" name="phone" id="phone" class="form-control" required>
                                <input type="text" name="fullname" id="fullname" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Số tiền vay</label>
                        <div class="col-sm-8">
                            <div class="form-line">
                                <input type="text" name="sotienvay" id="sotienvay" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Số tháng</label>
                        <div class="col-sm-8">
                            <div class="form-line">
                                <input type="text" name="sothang" id="sothang" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Giới tính</label>
                        <div class="col-sm-8">
                            <div class="form-line">
                                <input type="text" name="sex" id="sex" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Ngày/Tháng/Năm sinh</label>
                        <div class="col-sm-8">
                            <div class="form-line">
                                <input type="text" name="dob" id="dob" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Loại hình công việc</label>
                        <div class="col-sm-8">
                            <div class="form-line">
                                <input type="text" name="job" id="job" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Thu nhập hàng tháng</label>
                        <div class="col-sm-8">
                            <div class="form-line">
                                <input type="text" name="thunhap" id="thunhap" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Mục đích sử dụng</label>
                        <div class="col-sm-8">
                            <div class="form-line">
                                <input type="text" name="mucdich" id="mucdich" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Số CMND/CCCD</label>
                        <div class="col-sm-8">
                            <div class="form-line">
                                <input type="text" name="cmnd" id="cmnd" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Địa chỉ</label>
                        <div class="col-sm-8">
                            <div class="form-line">
                                <input type="text" name="address" id="address" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <h4 style="color: red;">Người liên quan</h4>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Số điện thoại người thân</label>
                        <div class="col-sm-8">
                            <div class="form-line">
                                <input type="text" name="sdtngthan" id="sdtngthan" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Mối quan hệ với người thân</label>
                        <div class="col-sm-8">
                            <div class="form-line">
                                <input type="text" name="moiquanhengthan" id="moiquanhengthan" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <h4 style="color: red;">Tài khoản ngân hàng</h4>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Tài khoản ngân hàng</label>
                        <div class="col-sm-8">
                            <div class="form-line">
                                <select class="form-control select2" name="tennganhang" id="tennganhang" style="width: 100%;">
                                    <option value="BIDV-Ngân hàng Đầu tư và Phát triển Việt Nam">BIDV-Ngân hàng Đầu tư và Phát triển Việt Nam</option>
                                    <option value="ACB-Ngân hàng Á Châu">ACB-Ngân hàng Á Châu</option>
                                    <option value="MB-Ngân hàng Quân Đội">MB-Ngân hàng Quân Đội</option>
                                    <option value="VPBank-Ngân hàng Thương mại cổ phần Việt Nam Thịnh Vượng">VPBank-Ngân hàng Thương mại cổ phần Việt Nam Thịnh Vượng</option>
                                    <option value="TPBank-Ngân hàng Tiên Phong TPBank">TPBank-Ngân hàng Tiên Phong TPBank</option>
                                    <option value="Vietinbank-Ngân hàng công thương Việt Nam">Vietinbank-Ngân hàng công thương Việt Nam</option>
                                    <option value="Agribank-Ngân hàng NN và PTNT VN">Agribank-Ngân hàng NN và PTNT VN</option>
                                    <option value="Techcombank-Ngân hàng Kỹ thương Việt Nam">Techcombank-Ngân hàng Kỹ thương Việt Nam</option>
                                    <option value="Vietcombank-Ngân hàng TMCP Ngoại Thương">Vietcombank-Ngân hàng TMCP Ngoại Thương</option>
                                    <option value="ABBank-Ngân hàng An Bình">ABBank-Ngân hàng An Bình</option>
                                    <option value="Baoviet Bank-Ngân hàng TMCP Bảo Việt">Baoviet Bank-Ngân hàng TMCP Bảo Việt</option>
                                    <option value="CIMB-Ngân hàng TNHH MTV CIMB Việt Nam">CIMB-Ngân hàng TNHH MTV CIMB Việt Nam</option>
                                    <option value="Eximbank-Ngân hàng Xuất nhập khẩu Việt Nam">Eximbank-Ngân hàng Xuất nhập khẩu Việt Nam</option>
                                    <option value="GP Bank-Ngân hàng Dầu khí Toàn cầu">GP Bank-Ngân hàng Dầu khí Toàn cầu</option>
                                    <option value="HDBank-Ngân hàng Phát triển TP HCM">HDBank-Ngân hàng Phát triển TP HCM</option>
                                    <option value="HLO-Ngân hàng Hong Leong Viet Nam">HLO-Ngân hàng Hong Leong Viet Nam</option>
                                    <option value="Kienlongbank-Ngân hàng Kiên Long">Kienlongbank-Ngân hàng Kiên Long</option>
                                    <option value="Lienvietbank-Ngan hàng TMCP Bưu điện Liên Việt">Lienvietbank-Ngan hàng TMCP Bưu điện Liên Việt</option>
                                    <option value="MSB-Ngân hàng Hàng Hải Việt Nam">MSB-Ngân hàng Hàng Hải Việt Nam</option>
                                    <option value="Nam A Bank-Ngân hàng Nam Á">Nam A Bank-Ngân hàng Nam Á</option>
                                    <option value="NASBank-Ngân hàng Bắc Á">NASBank-Ngân hàng Bắc Á</option>
                                    <option value="NCB-Ngân hàng Quoc Dan">NCB-Ngân hàng Quoc Dan</option>
                                    <option value="OCBC-Oversea - Chinese Bank">OCBC-Oversea - Chinese Bank</option>
                                    <option value="Ocean Bank-Ngân hàng Đại Dương">Ocean Bank-Ngân hàng Đại Dương</option>
                                    <option value="OCB-Ngân hàng Phương Đông">OCB-Ngân hàng Phương Đông</option>
                                    <option value="PG Bank-Ngân hàng Xăng dầu Petrolimex">PG Bank-Ngân hàng Xăng dầu Petrolimex</option>
                                    <option value="PVcombank-NH TMCP Đại Chúng Viet Nam">PVcombank-NH TMCP Đại Chúng Viet Nam</option>
                                    <option value="QTDCS-Quỹ tín dụng cơ sở">QTDCS-Quỹ tín dụng cơ sở</option>
                                    <option value="Sacombank-Ngân hàng Sài Gòn Thương Tín">Sacombank-Ngân hàng Sài Gòn Thương Tín</option>
                                    <option value="Saigonbank-Ngân hàng Sài Gòn Công Thương">Saigonbank-Ngân hàng Sài Gòn Công Thương</option>
                                    <option value="SCB-Ngân hàng TMCP Sài Gòn">SCB-Ngân hàng TMCP Sài Gòn</option>
                                    <option value="SCBank-Ngân hàng Standard Chartered Bank Việt Nam">SCBank-Ngân hàng Standard Chartered Bank Việt Nam</option>
                                    <option value="SCBank HN-Ngân hàng Standard Chartered Bank HN">SCBank HN-Ngân hàng Standard Chartered Bank HN</option>
                                    <option value="SCSB-The Shanghai Commercial Savings Bank CN Đồng Nai">SCSB-The Shanghai Commercial Savings Bank CN Đồng Nai</option>
                                    <option value="SeABank-Ngân hàng TMCP Đông Nam Á">SeABank-Ngân hàng TMCP Đông Nam Á</option>
                                    <option value="SHB-Ngân hàng Sài Gòn - Hà Nội">SHB-Ngân hàng Sài Gòn - Hà Nội</option>
                                    <option value="Shinhan Bank-Ngân hàng TNHH MTV Shinhan Việt Nam">Shinhan Bank-Ngân hàng TNHH MTV Shinhan Việt Nam</option>
                                    <option value="SIAM-Ngân hàng The Siam Commercial Public">SIAM-Ngân hàng The Siam Commercial Public</option>
                                    <option value="SMBC-Sumitomo Mitsui Banking Corporation HCM">SMBC-Sumitomo Mitsui Banking Corporation HCM</option>
                                    <option value="SMBC HN-Sumitomo Mitsui Banking Corporation HN">SMBC HN-Sumitomo Mitsui Banking Corporation HN</option>
                                    <option value="SPB-Ngân hàng SinoPac">SPB-Ngân hàng SinoPac</option>
                                    <option value="TFCBHN-Taipei Fubon Commercial Bank Ha Noi">TFCBHN-Taipei Fubon Commercial Bank Ha Noi</option>
                                    <option value="TFCBTPHCM-Taipei Fubon Commercial Bank TP Ho Chi Minh">TFCBTPHCM-Taipei Fubon Commercial Bank TP Ho Chi Minh</option>
                                    <option value="VBSP-Ngân hàng Chính sách xã hội Việt Nam">VBSP-Ngân hàng Chính sách xã hội Việt Nam</option>
                                    <option value="VDB-Ngân hàng Phát triển Việt Nam">VDB-Ngân hàng Phát triển Việt Nam</option>
                                    <option value="VIB-Ngân hàng Quốc tế">VIB-Ngân hàng Quốc tế</option>
                                    <option value="VID public-Ngân hàng VID Public">VID public-Ngân hàng VID Public</option>
                                    <option value="Viet Hoa Bank-Ngân hàng Việt Hoa">Viet Hoa Bank-Ngân hàng Việt Hoa</option>
                                    <option value="VietA Bank-Ngân hàng Việt Á">VietA Bank-Ngân hàng Việt Á</option>
                                    <option value="Vietbank-Ngân hàng Việt Nam Thương Tín">Vietbank-Ngân hàng Việt Nam Thương Tín</option>
                                    <option value="VietCapital Bank-NHTMCP Bản Việt">VietCapital Bank-NHTMCP Bản Việt</option>
                                    <option value="VNCB-NH TMCP Xây dựng Việt Nam">VNCB-NH TMCP Xây dựng Việt Nam</option>
                                    <option value="VRB-Ngân hàng Liên doanh Việt Nga">VRB-Ngân hàng Liên doanh Việt Nga</option>
                                    <option value="Vung Tau-Ngân hàng Vũng Tàu">Vung Tau-Ngân hàng Vũng Tàu</option>
                                    <option value="WHHCM-NH Woori HCM">WHHCM-NH Woori HCM</option>
                                    <option value="WHHN-WOORI BANK Hà Nội">WHHN-WOORI BANK Hà Nội</option>
                                    <option value="Dong A Bank-Ngân hàng Đông Á">Dong A Bank-Ngân hàng Đông Á</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Tên chủ tài khoản</label>
                        <div class="col-sm-8">
                            <div class="form-line">
                                <input type="text" name="tenchubank" id="tenchubank" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Số tài khoản</label>
                        <div class="col-sm-8">
                            <div class="form-line">
                                <input type="text" name="stkbank" id="stkbank" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Ảnh CMND/CCCD mặt trước</label>
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
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Ảnh CMND/CCCD mặt sau</label>
                        <div class="col-sm-8">
                            <div class="form-line">
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="form-control" id="exampleInputFile" name="img2">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Ảnh chân dung</label>
                        <div class="col-sm-8">
                            <div class="form-line">
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="form-control" id="exampleInputFile" name="img3">
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
<!-- Modal -->
<div class="modal fade" id="staticBackdrop2" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Sửa thông tin khoản vay</h5>
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
                                <input type="hidden" name="phone" id="phone2" class="form-control" required>
                                <input type="text" name="fullname" id="fullname2" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Số tiền vay</label>
                        <div class="col-sm-8">
                            <div class="form-line">
                                <input type="text" name="sotienvay" id="sotienvay2" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Số tháng</label>
                        <div class="col-sm-8">
                            <div class="form-line">
                                <input type="text" name="sothang" id="sothang2" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Giới tính</label>
                        <div class="col-sm-8">
                            <div class="form-line">
                                <input type="text" name="sex" id="sex2" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Ngày/Tháng/Năm sinh</label>
                        <div class="col-sm-8">
                            <div class="form-line">
                                <input type="text" name="dob" id="dob2" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Loại hình công việc</label>
                        <div class="col-sm-8">
                            <div class="form-line">
                                <input type="text" name="job" id="job2" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Thu nhập hàng tháng</label>
                        <div class="col-sm-8">
                            <div class="form-line">
                                <input type="text" name="thunhap" id="thunhap2" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Mục đích sử dụng</label>
                        <div class="col-sm-8">
                            <div class="form-line">
                                <input type="text" name="mucdich" id="mucdich2" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Số CMND/CCCD</label>
                        <div class="col-sm-8">
                            <div class="form-line">
                                <input type="text" name="cmnd" id="cmnd2" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Địa chỉ</label>
                        <div class="col-sm-8">
                            <div class="form-line">
                                <input type="text" name="address" id="address2" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <h4 style="color: red;">Người liên quan</h4>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Số điện thoại người thân</label>
                        <div class="col-sm-8">
                            <div class="form-line">
                                <input type="text" name="sdtngthan" id="sdtngthan2" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Mối quan hệ với người thân</label>
                        <div class="col-sm-8">
                            <div class="form-line">
                                <input type="text" name="moiquanhengthan" id="moiquanhengthan2" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <h4 style="color: red;">Tài khoản ngân hàng</h4>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Tài khoản ngân hàng</label>
                        <div class="col-sm-8">
                            <div class="form-line">
                                <select class="form-control select2" name="tennganhang" id="tennganhang2" style="width: 100%;">
<option value="BIDV-Ngân hàng Đầu tư và Phát triển Việt Nam">BIDV-Ngân hàng Đầu tư và Phát triển Việt Nam</option>
<option value="ACB-Ngân hàng Á Châu">ACB-Ngân hàng Á Châu</option>
<option value="MB-Ngân hàng Quân Đội">MB-Ngân hàng Quân Đội</option>
<option value="VPBank-Ngân hàng Thương mại cổ phần Việt Nam Thịnh Vượng">VPBank-Ngân hàng Thương mại cổ phần Việt Nam Thịnh Vượng</option>
<option value="TPBank-Ngân hàng Tiên Phong TPBank">TPBank-Ngân hàng Tiên Phong TPBank</option>
<option value="Vietinbank-Ngân hàng công thương Việt Nam">Vietinbank-Ngân hàng công thương Việt Nam</option>
<option value="Agribank-Ngân hàng NN và PTNT VN">Agribank-Ngân hàng NN và PTNT VN</option>
<option value="Techcombank-Ngân hàng Kỹ thương Việt Nam">Techcombank-Ngân hàng Kỹ thương Việt Nam</option>
<option value="Vietcombank-Ngân hàng TMCP Ngoại Thương">Vietcombank-Ngân hàng TMCP Ngoại Thương</option>
<option value="ABBank-Ngân hàng An Bình">ABBank-Ngân hàng An Bình</option>
<option value="Baoviet Bank-Ngân hàng TMCP Bảo Việt">Baoviet Bank-Ngân hàng TMCP Bảo Việt</option>
<option value="CIMB-Ngân hàng TNHH MTV CIMB Việt Nam">CIMB-Ngân hàng TNHH MTV CIMB Việt Nam</option>
<option value="Eximbank-Ngân hàng Xuất nhập khẩu Việt Nam">Eximbank-Ngân hàng Xuất nhập khẩu Việt Nam</option>
<option value="GP Bank-Ngân hàng Dầu khí Toàn cầu">GP Bank-Ngân hàng Dầu khí Toàn cầu</option>
<option value="HDBank-Ngân hàng Phát triển TP HCM">HDBank-Ngân hàng Phát triển TP HCM</option>
<option value="HLO-Ngân hàng Hong Leong Viet Nam">HLO-Ngân hàng Hong Leong Viet Nam</option>
<option value="Kienlongbank-Ngân hàng Kiên Long">Kienlongbank-Ngân hàng Kiên Long</option>
<option value="Lienvietbank-Ngan hàng TMCP Bưu điện Liên Việt">Lienvietbank-Ngan hàng TMCP Bưu điện Liên Việt</option>
<option value="MSB-Ngân hàng Hàng Hải Việt Nam">MSB-Ngân hàng Hàng Hải Việt Nam</option>
<option value="Nam A Bank-Ngân hàng Nam Á">Nam A Bank-Ngân hàng Nam Á</option>
<option value="NASBank-Ngân hàng Bắc Á">NASBank-Ngân hàng Bắc Á</option>
<option value="NCB-Ngân hàng Quoc Dan">NCB-Ngân hàng Quoc Dan</option>
<option value="OCBC-Oversea - Chinese Bank">OCBC-Oversea - Chinese Bank</option>
<option value="Ocean Bank-Ngân hàng Đại Dương">Ocean Bank-Ngân hàng Đại Dương</option>
<option value="OCB-Ngân hàng Phương Đông">OCB-Ngân hàng Phương Đông</option>
<option value="PG Bank-Ngân hàng Xăng dầu Petrolimex">PG Bank-Ngân hàng Xăng dầu Petrolimex</option>
<option value="PVcombank-NH TMCP Đại Chúng Viet Nam">PVcombank-NH TMCP Đại Chúng Viet Nam</option>
<option value="QTDCS-Quỹ tín dụng cơ sở">QTDCS-Quỹ tín dụng cơ sở</option>
<option value="Sacombank-Ngân hàng Sài Gòn Thương Tín">Sacombank-Ngân hàng Sài Gòn Thương Tín</option>
<option value="Saigonbank-Ngân hàng Sài Gòn Công Thương">Saigonbank-Ngân hàng Sài Gòn Công Thương</option>
<option value="SCB-Ngân hàng TMCP Sài Gòn">SCB-Ngân hàng TMCP Sài Gòn</option>
<option value="SCBank-Ngân hàng Standard Chartered Bank Việt Nam">SCBank-Ngân hàng Standard Chartered Bank Việt Nam</option>
<option value="SCBank HN-Ngân hàng Standard Chartered Bank HN">SCBank HN-Ngân hàng Standard Chartered Bank HN</option>
<option value="SCSB-The Shanghai Commercial Savings Bank CN Đồng Nai">SCSB-The Shanghai Commercial Savings Bank CN Đồng Nai</option>
<option value="SeABank-Ngân hàng TMCP Đông Nam Á">SeABank-Ngân hàng TMCP Đông Nam Á</option>
<option value="SHB-Ngân hàng Sài Gòn - Hà Nội">SHB-Ngân hàng Sài Gòn - Hà Nội</option>
<option value="Shinhan Bank-Ngân hàng TNHH MTV Shinhan Việt Nam">Shinhan Bank-Ngân hàng TNHH MTV Shinhan Việt Nam</option>
<option value="SIAM-Ngân hàng The Siam Commercial Public">SIAM-Ngân hàng The Siam Commercial Public</option>
<option value="SMBC-Sumitomo Mitsui Banking Corporation HCM">SMBC-Sumitomo Mitsui Banking Corporation HCM</option>
<option value="SMBC HN-Sumitomo Mitsui Banking Corporation HN">SMBC HN-Sumitomo Mitsui Banking Corporation HN</option>
<option value="SPB-Ngân hàng SinoPac">SPB-Ngân hàng SinoPac</option>
<option value="TFCBHN-Taipei Fubon Commercial Bank Ha Noi">TFCBHN-Taipei Fubon Commercial Bank Ha Noi</option>
<option value="TFCBTPHCM-Taipei Fubon Commercial Bank TP Ho Chi Minh">TFCBTPHCM-Taipei Fubon Commercial Bank TP Ho Chi Minh</option>
<option value="VBSP-Ngân hàng Chính sách xã hội Việt Nam">VBSP-Ngân hàng Chính sách xã hội Việt Nam</option>
<option value="VDB-Ngân hàng Phát triển Việt Nam">VDB-Ngân hàng Phát triển Việt Nam</option>
<option value="VIB-Ngân hàng Quốc tế">VIB-Ngân hàng Quốc tế</option>
<option value="VID public-Ngân hàng VID Public">VID public-Ngân hàng VID Public</option>
<option value="Viet Hoa Bank-Ngân hàng Việt Hoa">Viet Hoa Bank-Ngân hàng Việt Hoa</option>
<option value="VietA Bank-Ngân hàng Việt Á">VietA Bank-Ngân hàng Việt Á</option>
<option value="Vietbank-Ngân hàng Việt Nam Thương Tín">Vietbank-Ngân hàng Việt Nam Thương Tín</option>
<option value="VietCapital Bank-NHTMCP Bản Việt">VietCapital Bank-NHTMCP Bản Việt</option>
<option value="VNCB-NH TMCP Xây dựng Việt Nam">VNCB-NH TMCP Xây dựng Việt Nam</option>
<option value="VRB-Ngân hàng Liên doanh Việt Nga">VRB-Ngân hàng Liên doanh Việt Nga</option>
<option value="Vung Tau-Ngân hàng Vũng Tàu">Vung Tau-Ngân hàng Vũng Tàu</option>
<option value="WHHCM-NH Woori HCM">WHHCM-NH Woori HCM</option>
<option value="WHHN-WOORI BANK Hà Nội">WHHN-WOORI BANK Hà Nội</option>
<option value="Dong A Bank-Ngân hàng Đông Á">Dong A Bank-Ngân hàng Đông Á</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Tên chủ tài khoản</label>
                        <div class="col-sm-8">
                            <div class="form-line">
                                <input type="text" name="tenchubank" id="tenchubank2" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Số tài khoản</label>
                        <div class="col-sm-8">
                            <div class="form-line">
                                <input type="text" name="stkbank" id="stkbank2" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Ảnh CMND/CCCD mặt trước</label>
                        <div class="col-sm-8">
                            <div class="form-line">
                                <div class="input-group">
                                        <img width="30%" src="" alt="" id="exampleInputFile11">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Ảnh CMND/CCCD mặt sau</label>
                        <div class="col-sm-8">
                            <div class="form-line">
                                <div class="input-group">
                                    <img width="30%" src="" alt="" id="exampleInputFile22">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Ảnh chân dung</label>
                        <div class="col-sm-8">
                            <div class="form-line">
                                <div class="input-group">
                                    <img width="30%" src="" alt="" id="exampleInputFile33">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal -->
<!-- Modal -->
<div class="modal fade" id="staticBackdrop3" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Nạp tiền</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Số tiền cần nạp</label>
                        <div class="col-sm-8">
                            <div class="form-line">
                                <input type="text" name="sotiennew" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Lý do</label>
                        <div class="col-sm-8">
                            <div class="form-line">
                                <textarea type="text" name="lydonew" class="form-control" ></textarea>
                            </div>
                        </div>
                    </div> 
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Số điện thoại</label>
                        <div class="col-sm-8">
                            <div class="form-line">
                                <input type="text" name="phonenew" class="form-control" required>
                            </div>
                        </div>
                    </div>                   
                </div>
                <div class="modal-footer">
                    <button type="submit" name="Naptienthem" class="btn btn-danger">Lưu ngay</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal -->
<!-- Modal -->
<div class="modal fade" id="staticBackdrop4" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Rút tiền</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Số tiền cần rút</label>
                        <div class="col-sm-8">
                            <div class="form-line">
                                <input type="text" name="sotiennew" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Lý do</label>
                        <div class="col-sm-8">
                            <div class="form-line">
                                <textarea type="text" name="lydonew" class="form-control" ></textarea>
                            </div>
                        </div>
                    </div> 
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Số điện thoại</label>
                        <div class="col-sm-8">
                            <div class="form-line">
                                <input type="text" name="phonenew" class="form-control" required>
                            </div>
                        </div>
                    </div>                   
                </div>
                <div class="modal-footer">
                    <button type="submit" name="Ruttienthem" class="btn btn-danger">Lưu ngay</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal -->
<!-- Modal -->
<div class="modal fade" id="staticBackdrop5" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Thay đổi mật khẩu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Mật khẩu</label>
                        <div class="col-sm-8">
                            <div class="form-line">
                                <input type="text" name="id" id="idmatkhau" hidden>
                                <input type="text" name="password" class="form-control" required>
                            </div>
                        </div>
                    </div>                                    
                </div>
                <div class="modal-footer">
                    <button type="submit" name="Changepass" class="btn btn-danger">Lưu ngay</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal -->
<!-- Modal -->
<div class="modal fade" id="staticBackdrop6" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Thay đổi thông báo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Lệnh thông báo</label>
                        <div class="col-sm-8">
                            <div class="form-line">
                                <input type="text" name="username" id="idthongbao" hidden>
                                <input type="text" name="lenhthongbao" class="form-control" required>
                            </div>
                        </div>
                    </div>                                    
                </div>
                <div class="modal-footer">
                    <button type="submit" name="Changethongbaouser" class="btn btn-danger">Lưu ngay</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal -->
<script type="text/javascript">
$(document).ready(function() {
$(document).on("click",".duyet",function(e) {      
    Swal.fire({
        title: 'Xác nhận cho vay',
        text: "Bạn có chắc chắn cho người này vay không ?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'DUYỆT VAY',
        cancelButtonText: 'HỦY'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "<?=BASE_URL("public/admin/Home.php");?>",
                method: "POST",
                data: {
                    duyetvay: true,
                    id: $(this).attr("data-id"),
                    tien: $(this).attr("data-sotien"),
                },
                success: function(response) {
                    $("#thongbao").html(response);
                }
            });
        }
    })
});
$(document).on("click",".tuchoi",function(e) {       
    Swal.fire({
        title: 'Xác nhận từ chối vay',
        text: "Bạn có chắc chắn từ chối cho người này vay không ?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'XÓA NGAY',
        cancelButtonText: 'HỦY'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "<?=BASE_URL("public/admin/Home.php");?>",
                method: "POST",
                data: {
                    tuchoivay: true,
                    id: $(this).attr("data-id")
                },
                success: function(response) {
                    $("#thongbao").html(response);
                }
            });
        }
    })
});
$(document).on("click",".btndeltk",function(e) {    
    Swal.fire({
        title: 'Xác nhận từ xóa tài khoản',
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
                url: "<?=BASE_URL("public/admin/Home.php");?>",
                method: "POST",
                data: {
                    btndeltk: true,
                    id: $(this).attr("data-id")
                },
                success: function(response) {
                    $("#thongbao").html(response);
                }
            });
        }
    })
});

        $(document).on("click",".btnchangepassword",function(e) {
            var btn = $(this);
            $("#idmatkhau").val(btn.attr("data-idmatkhau"));
            $("#staticBackdrop5").modal();
            return false;
        });
        $(document).on("change", "#quanlythongbao", function () {
            const qltb = $(this).val();
            $.ajax({
                url: "<?=BASE_URL("public/admin/Home.php");?>",
                method: "POST",
                data: {
                    changethongbao: true,
                    id: $(this).attr("data-id"),
                    qltb: qltb
                },
                success: function(response) {
                    $("#thongbao").html(response);
                }
            });
        });
        $(document).on("click",".ruttiennew",function(e) {  
            $("#staticBackdrop4").modal();
            return false;
        });
        $(document).on("click",".naptiennew",function(e) {  
            $("#staticBackdrop3").modal();
            return false;
        });
        $(document).on("click",".btnView",function(e) {
            var btn = $(this);
            $("#phone2").val(btn.attr("data-phone"));
            $("#fullname2").val(btn.attr("data-fullname"));
            $("#sotienvay2").val(btn.attr("data-sotien"));
            $("#sothang2").val(btn.attr("data-thoigianvay"));
            $("#sex2").val(btn.attr("data-gioitinh"));
            $("#dob2").val(btn.attr("data-dob"));
            $("#job2").val(btn.attr("data-nghenghiep"));
            $("#thunhap2").val(btn.attr("data-thunhap"));
            $("#mucdich2").val(btn.attr("data-mucdichvay"));
            $("#cmnd2").val(btn.attr("data-cmnd"));
            $("#address2").val(btn.attr("data-address"));
            $("#sdtngthan2").val(btn.attr("data-sdtngthan"));
            $("#moiquanhengthan2").val(btn.attr("data-moiquanhengthan"));
            $("#tennganhang2").val(btn.attr("data-tennganhang"));
            $("#tenchubank2").val(btn.attr("data-tenchubank"));
            $("#stkbank2").val(btn.attr("data-stkbank"));
            $('#exampleInputFile11').attr("src", btn.attr("data-img"));
            $('#exampleInputFile22').attr("src", btn.attr("data-img2"));
            $('#exampleInputFile33').attr("src", btn.attr("data-img3"));
            $("#staticBackdrop2").modal();
            return false;
        });
        $(document).on("click",".btnEdit",function(e) {   
            var btn = $(this);
            $("#phone").val(btn.attr("data-phone"));
            $("#fullname").val(btn.attr("data-fullname"));
            $("#sotienvay").val(btn.attr("data-sotien"));
            $("#sothang").val(btn.attr("data-thoigianvay"));
            $("#sex").val(btn.attr("data-gioitinh"));
            $("#dob").val(btn.attr("data-dob"));
            $("#job").val(btn.attr("data-nghenghiep"));
            $("#thunhap").val(btn.attr("data-thunhap"));
            $("#mucdich").val(btn.attr("data-mucdichvay"));
            $("#cmnd").val(btn.attr("data-cmnd"));
            $("#address").val(btn.attr("data-address"));
            $("#sdtngthan").val(btn.attr("data-sdtngthan"));
            $("#moiquanhengthan").val(btn.attr("data-moiquanhengthan"));
            $("#tennganhang").val(btn.attr("data-tennganhang"));
            $("#tenchubank").val(btn.attr("data-tenchubank"));
            $("#stkbank").val(btn.attr("data-stkbank"));
            $("#staticBackdrop").modal();
            return false;
        });
    });
    $(document).on("click",".btneditthongbaouser",function(e) { 
        var btn = $(this);
        $("#idthongbao").val(btn.attr("data-id"));
		$("#staticBackdrop6").modal();
        return false;
    });
    function showlog() {
        $('#modal-default').modal({
            keyboard: true,
            show: true
        });
    }
</script>
<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
        $("#example2").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
        $("#example3").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
        $("#example4").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
      $("#example5").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
    });
</script>
<?php
require_once("../../public/admin/Footer.php");
?>
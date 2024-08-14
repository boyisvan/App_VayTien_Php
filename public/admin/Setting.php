<?php
    require_once("../../config/config.php");
    require_once("../../config/function.php");
    $title = 'CẤU HÌNH | '.$PNH->site('tenweb');
    CheckLogin();
    CheckAdmin();
    require_once("../../public/admin/Header.php");
    require_once("../../public/admin/Sidebar.php");
?>
<?php
if(isset($_POST['btnSaveOption']) && $getUser['level'] == 'admin')
{
    if($PNH->site('status_demo') == 'ON')
    {
        admin_msg_error("Chức năng này không khả dụng trên trang web DEMO!", "", 2000);
    }
    $tenweb = check_string($_POST['tenweb']);
    $mota = check_string($_POST['mota']);
    $tukhoa = check_string($_POST['tukhoa']);
    $logo = check_string($_POST['logo']);
    $favicon = check_string($_POST['favicon']);
    $anhbia = check_string($_POST['anhbia']);
    $theme = check_string($_POST['theme']);
    $fanpage = check_string($_POST['fanpage']);
    $phone = check_string($_POST['phone']);
    $emailct = check_string($_POST['emailct']);
    $right_panel = check_string($_POST['right_panel']);
    $stt_giaodichao = check_string($_POST['stt_giaodichao']);
    $baotri = check_string($_POST['baotri']);
    $TypePassword = check_string($_POST['TypePassword']);
    $thongbao = $_POST['thongbao'];
    $chinhsach_baohanh = $_POST['chinhsach_baohanh'];
    $contact = check_string($_POST['contact']);
    $script = check_string($_POST['script']);
    $motabank = $_POST['motabank'];
    $email = check_string($_POST['email']);
    $pass_email = check_string($_POST['pass_email']);
    $youtube = check_string($_POST['youtube']);
    $PNH->update("options", array(
        'value' => $youtube
    ), " `name` = 'youtube' ");
    $PNH->update("options", array(
        'value' => $email
    ), " `name` = 'email' ");
    $PNH->update("options", array(
        'value' => $pass_email
    ), " `name` = 'pass_email' ");
        $PNH->update("options", array(
            'value' => $motabank
        ), " `name` = 'motabank' ");
        $PNH->update("options", array(
            'value' => $tenweb
        ), " `name` = 'tenweb' ");
        $PNH->update("options", array(
            'value' => $mota
        ), " `name` = 'mota' ");
        $PNH->update("options", array(
            'value' => $tukhoa
        ), " `name` = 'tukhoa' ");
        $PNH->update("options", array(
            'value' => $logo
        ), " `name` = 'logo' ");
        $PNH->update("options", array(
            'value' => $favicon
        ), " `name` = 'favicon' ");
        $PNH->update("options", array(
            'value' => $anhbia
        ), " `name` = 'anhbia' ");
        $PNH->update("options", array(
            'value' => $theme
        ), " `name` = 'theme' ");
        $PNH->update("options", array(
            'value' => $fanpage
        ), " `name` = 'fanpage' ");
        $PNH->update("options", array(
            'value' => $phone
        ), " `name` = 'phone' ");
       $create =  $PNH->update("options", array(
            'value' => $emailct
        ), " `name` = 'emailct' ");
        $PNH->update("options", array(
            'value' => $right_panel
        ), " `name` = 'right_panel' ");
        $PNH->update("options", array(
            'value' => $stt_giaodichao
        ), " `name` = 'stt_giaodichao' ");
        $PNH->update("options", array(
            'value' => $baotri
        ), " `name` = 'baotri' ");
        $PNH->update("options", array(
            'value' => $TypePassword
        ), " `name` = 'TypePassword' ");
        $PNH->update("options", array(
            'value' => $script
        ), " `name` = 'script' ");
        $PNH->update("options", array(
            'value' => $thongbao
        ), " `name` = 'thongbao' ");
        $PNH->update("options", array(
            'value' => $chinhsach_baohanh
        ), " `name` = 'chinhsach_baohanh' ");
        $PNH->update("options", array(
            'value' => $contact
        ), " `name` = 'contact' ");
        
    if($create)
    {
        admin_msg_success("Lưu thành công!", "", 2000);
    }
    else
    {
        admin_msg_error("Vui lòng liên hệ kỹ thuật Zalo ", "", 12000);
    }

}
?>


<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Cấu hình</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">CẤU HÌNH THÔNG TIN WEBSITE</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                    class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                          <?php
                          foreach($PNH->get_list(" SELECT * FROM `options` ") as $row){
                            if($row['id'] == 1):
                          ?>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Tên website</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="text" name="tenweb" value="<?php if($row['id'] == 1): echo $row['value']; endif; ?>"
                                            class="form-control">
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>
                            <?php if($row['id'] == 2): ?>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Mô tả website</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="text" name="mota" value="<?php echo $row['value'];  ?>"
                                            class="form-control">
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>
                            <?php if($row['id'] == 3) : ?>
                                <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Từ khóa tìm kiếm</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="text" name="tukhoa" value="<?=$row['value'];?>"
                                            class="form-control">
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>
                            <?php if($row['id'] == 4) : ?>
                                <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Logo website</label>
                                <div class="col-sm-4">
                                    <div class="form-line">
                                        <input type="text" name="logo" value="<?=$row['value'];?>"
                                            class="form-control">
                                    </div>
                                    <i>Upload ảnh lên <a target="_blank" href="https://imgur.com/upload?beta">đây</a>, sau đó copy địa chỉ hình ảnh dán vào ô trên.</i>
                                </div>
                                <div class="col-sm-5">
                                    <img width="200px" src="<?=$row['value'];?>">
                                </div>
                            </div>
                            <?php endif; ?>
                            <?php  if($row['id'] == 14) : ?>
                                <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Favicon website</label>
                                <div class="col-sm-4">
                                    <div class="form-line">
                                        <input type="text" name="favicon" value="<?=$row['value'];?>"
                                            class="form-control">
                                    </div>
                                    <i>Upload ảnh lên <a target="_blank" href="https://imgur.com/upload?beta">đây</a>, sau đó copy địa chỉ hình ảnh dán vào ô trên.</i>
                                </div>
                                <div class="col-sm-5">
                                    <img width="200px" src="<?=$row['value'];?>">
                                </div>
                            </div>
                            <?php endif; ?>
                            <?php  if($row['id'] == 13) : ?>
                                <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Ảnh giới thiệu website</label>
                                <div class="col-sm-4">
                                    <div class="form-line">
                                        <input type="text" name="anhbia" value="<?=$row['value'];?>"
                                            class="form-control">
                                    </div>
                                    <i>Upload ảnh lên <a target="_blank" href="https://imgur.com/upload?beta">đây</a>, sau đó copy địa chỉ hình ảnh dán vào ô trên.</i>
                                </div>
                                <div class="col-sm-5">
                                    <img width="200px" src="<?=$row['value'];?>">
                                </div>
                            </div>
                            <?php endif; ?>
                            <?php  if($row['id'] == 24) : ?>
                                <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Theme color</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input class="form-control" type="color"
                                            value="<?=$row['value'];?>" name="theme_color">
                                    </div>
                                    <i>Điều chỉnh màu của website.</i>
                                </div>
                            </div>
                            <?php endif; ?>
                            <?php  if($row['id'] == 21) : ?>
                                <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Theme Home Page</label>
                                <div class="col-sm-9">
                                    <select class="form-control show-tick" name="theme">
                                        <option value="<?=$row['value'];?>"><?=$row['value'];?>
                                        </option>
                                        <option value="Trafalgar">Trafalgar</option>
                                        <option value="JoBest">JoBest</option>
                                        <option value="">Tắt</option>
                                    </select>
                                </div>
                            </div>
                            <?php endif; ?>
                            <?php  if($row['id'] == 36) : ?>
                                <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Fanpage</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="url" name="fanpage" value="<?=$row['value'];?>"
                                            class="form-control">
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>
                            <?php  if($row['id'] == 51) : ?>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Phone</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="text" name="phone" value="<?=$row['value'];?>"
                                            class="form-control">
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>
                            <?php  if($row['id'] == 52) : ?>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="text" name="emailct" value="<?=$row['value'];?>"
                                            class="form-control">
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>
                            <?php  if($row['id'] == 46) : ?>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">ON/OFF Panel bên phải</label>
                                <div class="col-sm-9">
                                    <select class="form-control show-tick" name="right_panel" required>
                                        <option value="<?=$row['value'];?>">
                                            <?=$row['value'];?>
                                        </option>
                                        <option value="ON">ON</option>
                                        <option value="OFF">OFF</option>
                                    </select>
                                </div>
                            </div>
                            <?php endif; ?>
                            <?php  if($row['id'] == 43) : ?>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">ON/OFF Tạo giao dịch ảo</label>
                                <div class="col-sm-9">
                                    <select class="form-control show-tick" name="stt_giaodichao" required>
                                        <option value="<?=$row['value'];?>">
                                            <?=$row['value'];?>
                                        </option>
                                        <option value="ON">ON</option>
                                        <option value="OFF">OFF</option>
                                    </select>
                                    <i>Hệ thống tự tạo giao dịch mua tài khoản ảo để tạo uy tín cho website.</i>
                                </div>
                            </div>
                            <?php endif; ?>
                            <?php  if($row['id'] == 17) : ?>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">ON/OFF Website</label>
                                <div class="col-sm-9">
                                    <select class="form-control show-tick" name="baotri" required>
                                        <option value="<?=$row['value'];?>"><?=$row['value'];?>
                                        </option>
                                        <option value="ON">ON</option>
                                        <option value="OFF">OFF</option>
                                    </select>
                                    <i>Khi chọn OFF website sẽ bật chế độ bảo trì.</i>
                                </div>
                            </div>
                            <?php endif; ?>
                            <?php  if($row['id'] == 48) : ?>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Type Password <i>(Vui lòng không thay đổi tránh
                                        hậu quả đáng tiếc)</i></label>
                                <div class="col-sm-9">
                                    <select class="form-control show-tick" name="TypePassword">
                                        <option value="<?=$row['value'];?>">
                                            <?=$row['value'];?>
                                        </option>
                                        <option value="md5">md5</option>
                                        <option value="sha1">sha1</option>
                                        <option value="">không mã hóa</option>
                                    </select>
                                    <i>Không tự ý thay đổi khi chưa có sự đồng ý của nhà phát triển/</i>
                                </div>
                            </div>
                            <?php endif; ?>
                            <?php  if($row['id'] == 53) : ?>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Chèn JavaScripts (Live Chat, Hiệu ứng website
                                    v.v)</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <textarea class="form-control" name="script"
                                            rows="6"><?=$row['value'];?></textarea>
                                    </div>
                                    <i>Có thể chèn đoạn sciprt quảng cáo, live chat, css trang trí website...</i>
                                </div>
                            </div>
                            <?php endif; ?>
                            <?php  if($row['id'] == 12) : ?>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Thông báo</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <textarea class="textarea" name="thongbao"
                                            rows="6"><?=$row['value'];?></textarea>
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>
                            <?php  if($row['id'] == 28) : ?>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Chế độ bảo hành</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <textarea class="textarea" name="chinhsach_baohanh"
                                            rows="6"><?=$row['value'];?></textarea>
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>
                            <?php  if($row['id'] == 49) : ?>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Liên hệ</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <textarea class="textarea" name="contact"
                                            rows="6"><?=$row['value'];?></textarea>
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>
                            <?php  if($row['id'] == 54) : ?>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Mô tả bank</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <textarea class="textarea" name="motabank"
                                            rows="6"><?=$row['value'];?></textarea>
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>
                            <?php  if($row['id'] == 5) : ?>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Email gửi mail</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="text" name="email" value="<?=$row['value'];?>"
                                            class="form-control">    
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>
                            <?php  if($row['id'] == 6) : ?>
                            <!--<div class="form-group row">
                                <label class="col-sm-3 col-form-label">Pass Email gửi mail</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="text" name="pass_email" value="<?=$row['value'];?>"
                                            class="form-control">    
                                    </div>
                                </div>
                            </div>-->
                            <?php endif; ?>
                            <?php  if($row['id'] == 52) : ?>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Youtube</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="text" name="youtube" value="<?=$row['value'];?>"
                                            class="form-control">    
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>
                           <?php } ?>
                            <button type="submit" name="btnSaveOption" class="btn btn-primary btn-block">
                                <span>LƯU</span></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
$(function() {
    // Summernote
    //$('.textarea').summernote()
})
</script>

<?php 
    require_once("../../public/admin/Footer.php");
?>
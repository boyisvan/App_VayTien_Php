<?php
require_once("../../config/config.php");
require_once("../../config/function.php");
$title = 'Website | ' . $PNH->site('tenweb');
CheckLogin();
CheckAdmin();
require_once("../../public/admin/Header.php");
require_once("../../public/admin/Sidebar.php");

if(!empty($getUser['permi'])): $qtv = explode(",", $getUser['permi']); if (in_array("qltk", $qtv)):

if(isset($_POST['btnSaveOption']))
{
    if($PNH->site('status_demo') == 'ON')
    {
        admin_msg_error("Chức năng này không khả dụng trên trang web DEMO!", "", 2000);
    }
    $hopdong = $_POST['hopdong'];
    $create = $PNH->update("options", array(
        'value' => $hopdong
    ), " `name` = 'hopdong' ");
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
                            if($row['id'] == '58'): ?>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Hợp đồng</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <textarea class="textarea" name="hopdong" rows="25"><?=$row['value'];?></textarea>
                                    </div>
                                </div>
                            </div>
                            <?php endif;
                            } ?>
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
    //Summernote
    $('.textarea').summernote()
})
</script>
<?php
endif; endif;
require_once("../../public/admin/Footer.php");
?>
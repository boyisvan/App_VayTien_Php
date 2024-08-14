<?php
    require_once("../../config/config.php");
    require_once("../../config/function.php");
    $title = 'Website | '.$PNH->site('tenweb');
    CheckLogin();
    CheckAdmin();
    require_once("../../public/admin/Header.php");
    require_once("../../public/admin/Sidebar.php");

if(!empty($getUser['permi'])): $qtv = explode(",", $getUser['permi']); if (in_array("khoanvaygiaingan", $qtv)):

    if(isset($_POST['duyetvay'])  )
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

?>

<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-2">
                </div>
                <div class="card card-outline card-primary">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Số điện thoại</th>
                                        <th>Số tiền giải ngân</th>
                                        <th>Số dư tài khoản</th>
                                        <th>Trạng thái</th>
                                        <th>Lý do</th>
                                        <th>Thời gian</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    foreach($PNH->get_list(" SELECT * FROM `orders` WHERE `trangthai` IS NOT NULL ORDER BY id DESC ") as $row){
                                    ?>
                                    <tr>
                                        <td><?=$i;?></td>
                                        <td><?=$row['phone'];?></td>
                                        <td><?=number_format($row['sotien']);?> VNĐ</td>
                                        <td><?php $rowuser = $PNH->get_row(" SELECT * FROM `users` WHERE `phone` = '" . $row['phone'] . "' ");
                                                                                echo number_format($rowuser['total_money']); ?> VNĐ</td>
                                        <td><?=$row['trangthai'];?></td>
                                        <td></td>
                                        <td><?= date('d-m-Y H:i:s', $row['time']); ?></td>
                                        <td>
                                            <a type="button" data-id="<?=$row['id'];?>" data-tien="<?=$row['sotien'];?>" class="btn btn-success duyet"><i class="far fa-check-circle"></i></a>
                                            <a type="button" data-id="<?=$row['id'];?>" class="btn btn-danger tuchoi"><i class="fas fa-ban"></i></a>    
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



<script>
$(function() {
$('body').on('click', '.duyet', function(e) {     
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
                url: "<?=BASE_URL("public/admin/Loadinfouser.php");?>",
                method: "POST",
                data: {
                    duyetvay: true,
                    id: $(this).attr("data-id"),
                    tien: $(this).attr("data-tien"),
                },
                success: function(response) {
                    $("#thongbao").html(response);
                }
            });
        }
    })
}); 
$('body').on('click', '.tuchoi', function(e) {       
    Swal.fire({
        title: 'Xác nhận từ chối vay',
        text: "Bạn có chắc chắn từ chối cho người này vay không ?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'TỪ CHỐI',
        cancelButtonText: 'HỦY'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "<?=BASE_URL("public/admin/Loadinfouser.php");?>",
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
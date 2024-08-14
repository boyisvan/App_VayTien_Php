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
if(!empty($getUser['permi'])): $qtv = explode(",", $getUser['permi']); if (in_array("dscskh", $qtv)):
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
                                        <th>Khách hàng</th>
                                        <th>Nhân viên CSKH</th>
                                        <th>Thời gian</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    foreach($PNH->get_list(" SELECT * FROM `danhsachcskh` ORDER BY id DESC ") as $row){
                                    ?>
                                    <tr>
                                        <td><?=$i;?></td>
                                        <td><?=$row['phone'];?></td>
                                        <td><?=$row['nhanviencskh'];?></td>
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



<script>
$(function() {
   
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
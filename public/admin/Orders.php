<?php
    require_once("../../config/config.php");
    require_once("../../config/function.php");
    $title = 'DANH SÁCH ĐƠN HÀNG | '.$PNH->site('tenweb');
    CheckLogin();
    CheckAdmin();
    require_once("../../public/admin/Header.php");
    require_once("../../public/admin/Sidebar.php");
?>


<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Quản lý đơn hàng</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">DANH SÁCH ĐƠN HÀNG</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                    class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable" class="table table-bordered table-striped table-hover">
                            <thead>
                        <tr>
                            <th>STT</th>
                            <th>MÃ GD</th>
                            <th>USERNAME</th>
                            <th>NGÀY TẠO</th>
                            <th>TÊN KHÓA HỌC</th>
                            <th>TỔNG TIỀN</th>
                            <th>THANH TOÁN</th>
                            <th>PHONE</th>
                            <th>TRẠNG THÁI</th>
                            <th>THAO TÁC</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach($PNH->get_list(" SELECT * FROM `orders` ORDER BY id DESC ") as $row){
                        ?>
                        <tr>
                            <td><?=$i++;?></td>
                            <td><?=$row['code'];?></td>
                            <td><a href="<?=BASE_URL('Admin/User/Edit/'.$PNH->getUser($row['username'])['id']);?>"><?=$row['username'];?></a></td>
                            <td><?=$row['thoigian'];?></td>
                            <td><?=$row['title'];?></td>
                            <td><?=$row['sotien'];?></td>
                            <td><span class="badge badge-danger"><?=$row['payment'];?></span></td>
                            <td><?=$row['phone'];?></td>
                            <td><?=$row['trangthai'];?></td>
                            <td>
                                   <a type="button" href="<?=BASE_URL('Admin/Orders/Edit/');?><?=$row['id'];?>" class="btn bg-black">
                                    <span>EDIT</span></a>
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



<script>
$(function() {
    $("#datatable").DataTable({
        "responsive": true,
        "autoWidth": false,
    });
});
</script>



<?php 
    require_once("../../public/admin/Footer.php");
?>
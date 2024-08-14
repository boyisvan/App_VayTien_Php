<?php
    require_once("../../config/config.php");
    require_once("../../config/function.php");
    CheckLogin();
    CheckAdmin();
    $title = 'Thông tin nạp rút tiền | '.$PNH->site('tenweb');
    require_once("../../public/admin/Header.php");
    require_once("../../public/admin/Sidebar.php");
    if(isset($_POST['XoaSanPham']) && ($getUser['level'] == 'admin' || $getUser['level'] == 'sup') )
    {
        $id = check_string($_POST['id']);
        $row = $PNH->get_row("SELECT * FROM `ruttien` WHERE `id` = '$id' ");
        if(!$row)
        {
            msg_error2("ID cần xóa không tồn tại trong hệ thống !");
        }
        // GHI LOG
        $file = @fopen('../../logs/Xoanaprut.txt', 'a');
        if ($file)
        {
            $data = "[LOG] Sản phẩm ID ".$row['id']." đã bị xóa khỏi hệ thống vào lúc ".gettime().PHP_EOL;
            fwrite($file, $data);
            fclose($file);
        }
        $PNH->remove("ruttien", " `id` = '$id' ");
        admin_msg_success("Xóa thành công !", "", 1000);
    }

?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Nạp rút tiền</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Nạp rút tiền</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                    class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                    <div id="thongbao"></div>
                        <div class="table-responsive">
                            <table id="datatable" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>NGÀY TẠO</th>
                                        <th>TÊN TÀI KHOẢN</th>
                                        <th>NGÂN HÀNG</th>
                                        <th>STK</th>
                                        <th>TÊN TK</th>
                                        <th>KIỂU GD</th>
                                        <th>SỐ TIỀN</th>
                                        <th>SỐ TIỀN KM</th>
                                        <th>SĐT</th>
                                        <th>TRẠNG THÁI</th>
                                        <th>GHI CHÚ</th>
                                        <th>MÃ GD</th>
                                        <th>THAO TÁC</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1; foreach($PNH->get_list(" SELECT * FROM `ruttien` ORDER BY id DESC ") as $row){ ?>
                                    <tr>
                                        <td><?=$i++;?></td>
                                        
                                        <td><b><?=$row['thoigian'];?></b></td>
                                        <td><b><?=$row['username'];?></b></td>
                                        <td><?=$row['ngan_hang'];?></td>
                                        <td><?=$row['stk'];?></td>
                                        <td><?=$row['chu_tai_khoan'];?></td>
                                        <td><?=$row['kieugd'];?></td>
                                        <td><span class="badge badge-danger"><?=number_format($row['sotien']);?></span></td>
                                        <?php if($row['kieugd'] == 'Nạp tiền'): ?>
                                        <td><span class="badge badge-success"><?=number_format($row['sotienkm']);?></span></td>
                                        <?php else: ?>
                                        <td><span class="badge badge-success"></span></td>
                                        <?php endif; ?>
                                        <td><?=$row['stk'];?></td>
                                        <td><?=$row['trangthai'];?></td>
                                        <td><?=$row['ghichu'];?></td>
                                        <td><?=$row['code'];?></td>
                                        <td>
                                            <a type="button" href="<?=BASE_URL('Admin/Napruttien/Edit/');?><?=$row['id'];?>"
                                                class="btn bg-black">
                                                <span>EDIT</span></a>
                                            <button class="btn btn-danger btnDelete" id="XoaSanPham" data-id="<?=$row['id'];?>"><i
                                                    class="fas fa-trash"></i>
                                                <span>DELETE</span>
                                            </button>
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
    </section>
</div>


<script type="text/javascript">
$(".btnDelete").on("click", function() {
    Swal.fire({
        title: 'Xác nhận xóa sản phẩm',
        text: "Bạn có chắc chắn xóa sản phẩm này không ?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'XÓA NGAY',
        cancelButtonText: 'HỦY'
    }).then((result) => {
        if (result.isConfirmed) {

            $.ajax({
                url: "<?=BASE_URL("Admin/Napruttien");?>",
                method: "POST",
                data: {
                    XoaSanPham: true,
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
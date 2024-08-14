<?php
require_once("../../config/config.php");
require_once("../../config/function.php");
$title = 'Website | ' . $PNH->site('tenweb');
CheckLogin();
CheckAdmin();
require_once("../../public/admin/Header.php");
require_once("../../public/admin/Sidebar.php");
if(!empty($getUser['permi'])): 
    $qtv = explode(",", $getUser['permi']); if (in_array("dscskh", $qtv)):     
?>
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
<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-2">
                    <button type="button" class="btn btn-block btn-primary updatepermission">Cập nhật</button>
                </div>
              <div id="thongbao"> </div>
                <div class="card card-outline card-primary">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable2" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th width="120">Chăm sóc khách hàng</th>
                                        <th>Quản trị viên</th>
                                        <th>TBP Nội dung</th>
                                        <th>TBP Kinh doanh</th>
                                        <th>Biên tập viên Nội dung</th>
                                        <th>Nhân viên Kinh doanh</th>
                                        <th>Chăm Sóc Khách Hàng</th>
                                        <th>Hồ Sơ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <?php $row = $PNH->get_row(" SELECT * FROM `users` WHERE `level` = 'Quản trị viên' GROUP BY level "); if(!empty($row['level'])): $premi = $row['permi']; endif; ?>
                                        <?php $row2 = $PNH->get_row(" SELECT * FROM `users` WHERE `level` = 'TBP Nội dung' GROUP BY level "); if(!empty($row2['level'])): $TBPnd = $row2['permi']; endif; ?>
                                        <?php $row3 = $PNH->get_row(" SELECT * FROM `users` WHERE `level` = 'TBP Kinh doanh' GROUP BY level "); if(!empty($row3['level'])): $TBPkd = $row3['permi']; endif; ?>
                                        <?php $row4 = $PNH->get_row(" SELECT * FROM `users` WHERE `level` = 'Biên tập viên Nội dung' GROUP BY level "); if(!empty($row4['level'])): $btvnd = $row4['permi']; endif; ?>
                                        <?php $row5 = $PNH->get_row(" SELECT * FROM `users` WHERE `level` = 'Nhân viên Kinh doanh' GROUP BY level "); if(!empty($row5['level'])): $nvkd = $row5['permi']; endif; ?>
                                        <?php $row6 = $PNH->get_row(" SELECT * FROM `users` WHERE `level` = 'Chăm Sóc Khách Hàng' GROUP BY level "); if(!empty($row6['level'])): $cskh = $row6['permi']; endif; ?>
                                        <?php $row7 = $PNH->get_row(" SELECT * FROM `users` WHERE `level` = 'Hồ Sơ' GROUP BY level "); if(!empty($row7['level'])): $hoso = $row7['permi']; endif; ?>
                                        <td>Danh sách CSKH</td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="dscskh" id="qtv" <?php if(!empty($premi)): $qtv = explode(",", $premi); if (in_array("dscskh", $qtv)): echo 'checked'; endif; endif; ?> >
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="dscskh" id="TBPnd" <?php if(!empty($TBPnd)): $TBPnd = explode(",", $TBPnd); if (in_array("dscskh", $TBPnd)): echo 'checked'; endif; endif; ?>>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="dscskh" id="TBPkd" <?php if(!empty($TBPkd)): $TBPkd = explode(",", $TBPkd); if (in_array("dscskh", $TBPkd)): echo 'checked'; endif; endif; ?>>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="dscskh" id="btvnd" <?php if(!empty($btvnd)): $btvnd = explode(",", $btvnd); if (in_array("dscskh", $btvnd)): echo 'checked'; endif; endif; ?>>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="dscskh" id="nvkd" <?php if(!empty($nvkd)): $nvkd = explode(",", $nvkd); if (in_array("dscskh", $nvkd)): echo 'checked'; endif; endif; ?>>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="dscskh" id="cskh" <?php if(!empty($cskh)): $cskh = explode(",", $cskh); if (in_array("dscskh", $cskh)): echo 'checked'; endif; endif; ?>>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="dscskh" id="hoso" <?php if(!empty($hoso)): $hoso = explode(",", $hoso); if (in_array("dscskh", $hoso)): echo 'checked'; endif; endif; ?>>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Danh sách nhân viên</td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="dsnv" id="qtv" <?php if(!empty($premi)):  if (in_array("dsnv", $qtv)): echo 'checked'; endif; endif; ?> > 
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="dsnv" id="TBPnd" <?php if(!empty($TBPnd)):  if (in_array("dsnv", $TBPnd)): echo 'checked'; endif; endif; ?>> 
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="dsnv" id="TBPkd" <?php if(!empty($TBPkd)):if (in_array("dsnv", $TBPkd)): echo 'checked'; endif; endif; ?> >
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="dsnv" id="btvnd" <?php if(!empty($btvnd)):  if (in_array("dsnv", $btvnd)): echo 'checked'; endif; endif; ?> >
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="dsnv" id="nvkd"  <?php if(!empty($nvkd)):   if (in_array("dsnv", $nvkd)): echo 'checked'; endif; endif; ?> >
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="dsnv" id="cskh"  <?php if(!empty($cskh)):   if (in_array("dsnv", $cskh)): echo 'checked'; endif; endif; ?>  >
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="dsnv" id="hoso"  <?php if(!empty($hoso)):   if (in_array("dsnv", $hoso)): echo 'checked';  endif; endif; ?>  >
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table id="datatable2" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th width="120">Tài khoản</th>
                                        <th>Quản trị viên</th>
                                        <th>TBP Nội dung</th>
                                        <th>TBP Kinh doanh</th>
                                        <th>Biên tập viên Nội dung</th>
                                        <th>Nhân viên Kinh doanh</th>
                                        <th>Chăm Sóc Khách Hàng</th>
                                        <th>Hồ Sơ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Quản lý tài khoản</td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="qltk" id="qtv" <?php if(!empty($premi)):  if (in_array("qltk", $qtv)): echo 'checked'; endif; endif; ?> >
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="qltk" id="TBPnd" <?php if(!empty($TBPnd)):  if (in_array("qltk", $TBPnd)): echo 'checked'; endif; endif; ?> >
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="qltk" id="TBPkd" <?php if(!empty($TBPkd)):  if (in_array("qltk", $TBPkd)): echo 'checked'; endif; endif; ?> >
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="qltk" id="btvnd" <?php if(!empty($btvnd)):  if (in_array("qltk", $btvnd)): echo 'checked'; endif; endif; ?> >
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="qltk" id="nvkd"  <?php if(!empty($nvkd)):  if (in_array("qltk", $nvkd)): echo 'checked'; endif; endif; ?>  >
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="qltk" id="cskh"  <?php if(!empty($cskh)):  if (in_array("qltk", $cskh)): echo 'checked'; endif; endif;?>  >
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="qltk" id="hoso"  <?php if(!empty($hoso)):  if (in_array("qltk", $hoso)): echo 'checked';  endif; endif;?> >
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Cấu hình website</td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="cauhinhweb" id="qtv" <?php if(!empty($premi)): if (in_array("cauhinhweb", $qtv)): echo 'checked'; endif; endif; ?>>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="cauhinhweb" id="TBPnd" <?php if(!empty($TBPnd)):  if (in_array("cauhinhweb", $TBPnd)): echo 'checked'; endif;endif; ?>>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="cauhinhweb" id="TBPkd" <?php if(!empty($TBPkd)):  if (in_array("cauhinhweb", $TBPkd)): echo 'checked'; endif;endif; ?>>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="cauhinhweb" id="btvnd" <?php if(!empty($btvnd)):  if (in_array("cauhinhweb", $btvnd)): echo 'checked'; endif;endif; ?>>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="cauhinhweb" id="nvkd"  <?php if(!empty($nvkd)): if (in_array("cauhinhweb", $nvkd)): echo 'checked'; endif;endif; ?> >
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="cauhinhweb" id="cskh"  <?php if(!empty($cskh)): if (in_array("cauhinhweb", $cskh)): echo 'checked'; endif;endif; ?> >
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="cauhinhweb" id="hoso"  <?php if(!empty($hoso)): if (in_array("cauhinhweb", $hoso)): echo 'checked';  endif;endif; ?>>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table id="datatable2" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th width="120">Tài khoản</th>
                                        <th>Quản trị viên</th>
                                        <th>TBP Nội dung</th>
                                        <th>TBP Kinh doanh</th>
                                        <th>Biên tập viên Nội dung</th>
                                        <th>Nhân viên Kinh doanh</th>
                                        <th>Chăm Sóc Khách Hàng</th>
                                        <th>Hồ Sơ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Quản lý tài khoản</td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="quanlytk" id="qtv" <?php if(!empty($premi)): if (in_array("quanlytk", $qtv)): echo 'checked'; endif; endif; ?> >
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="quanlytk" id="TBPnd" <?php if(!empty($TBPnd)): if (in_array("quanlytk", $TBPnd)): echo 'checked'; endif; endif;?>>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="quanlytk" id="TBPkd" <?php if(!empty($TBPkd)):  if (in_array("quanlytk", $TBPkd)): echo 'checked'; endif; endif;?>>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="quanlytk" id="btvnd" <?php if(!empty($btvnd)):  if (in_array("quanlytk", $btvnd)): echo 'checked'; endif; endif;?>>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="quanlytk" id="nvkd"  <?php if(!empty($nvkd)): if (in_array("quanlytk", $nvkd)): echo 'checked'; endif; endif;?> >
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="quanlytk" id="cskh" <?php if(!empty($cskh)): if (in_array("quanlytk", $cskh)): echo 'checked'; endif; endif;?>  >
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="quanlytk" id="hoso" <?php if(!empty($hoso)): if (in_array("quanlytk", $hoso)): echo 'checked';  endif; endif;?> >
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Quản lý vai trò	</td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="quanlyvaitro" id="qtv" <?php if(!empty($premi)):  if (in_array("quanlyvaitro", $qtv)): echo 'checked'; endif; endif; ?> >
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="quanlyvaitro" id="TBPnd" <?php if(!empty($TBPnd)):  if (in_array("quanlyvaitro", $TBPnd)): echo 'checked'; endif;endif; ?>>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="quanlyvaitro" id="TBPkd" <?php if(!empty($TBPkd)):  if (in_array("quanlyvaitro", $TBPkd)): echo 'checked'; endif;endif; ?>>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="quanlyvaitro" id="btvnd" <?php if(!empty($btvnd)):  if (in_array("quanlyvaitro", $btvnd)): echo 'checked'; endif;endif; ?>>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="quanlyvaitro" id="nvkd"  <?php if(!empty($nvkd)):     if (in_array("quanlyvaitro", $nvkd)): echo 'checked'; endif;endif; ?> >
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="quanlyvaitro" id="cskh"  <?php if(!empty($cskh)):     if (in_array("quanlyvaitro", $cskh)): echo 'checked'; endif;endif; ?> >
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="quanlyvaitro" id="hoso"  <?php if(!empty($hoso)):    if (in_array("quanlyvaitro", $hoso)): echo 'checked';  endif;endif; ?>>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Quản lý quyền hạn</td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="quanlyper" id="qtv" <?php if(!empty($premi)):  if (in_array("quanlyper", $qtv)): echo 'checked'; endif; endif; ?> >
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="quanlyper" id="TBPnd" <?php if(!empty($TBPnd)): if (in_array("quanlyper", $TBPnd)): echo 'checked'; endif; endif;?>>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="quanlyper" id="TBPkd" <?php if(!empty($TBPkd)): if (in_array("quanlyper", $TBPkd)): echo 'checked'; endif; endif;?>>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="quanlyper" id="btvnd" <?php if(!empty($btvnd)): if (in_array("quanlyper", $btvnd)): echo 'checked'; endif; endif;?>>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="quanlyper" id="nvkd"  <?php if(!empty($nvkd)):    if (in_array("quanlyper", $nvkd)): echo 'checked'; endif; endif;?> >
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="quanlyper" id="cskh"  <?php if(!empty($cskh)):    if (in_array("quanlyper", $cskh)): echo 'checked'; endif; endif;?> >
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="quanlyper" id="hoso"  <?php if(!empty($hoso)):    if (in_array("quanlyper", $hoso)): echo 'checked';  endif; endif;?>>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table id="datatable2" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th width="120">Tài khoản</th>
                                        <th>Quản trị viên</th>
                                        <th>TBP Nội dung</th>
                                        <th>TBP Kinh doanh</th>
                                        <th>Biên tập viên Nội dung</th>
                                        <th>Nhân viên Kinh doanh</th>
                                        <th>Chăm Sóc Khách Hàng</th>
                                        <th>Hồ Sơ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Khoản vay chờ giải ngân</td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="khoanvaygiaingan" id="qtv" <?php if(!empty($premi)):  if (in_array("khoanvaygiaingan", $qtv)): echo 'checked'; endif; endif; ?> >
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="khoanvaygiaingan" id="TBPnd" <?php if(!empty($TBPnd)): if (in_array("khoanvaygiaingan", $TBPnd)): echo 'checked'; endif;endif; ?>>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="khoanvaygiaingan" id="TBPkd" <?php if(!empty($TBPkd)): if (in_array("khoanvaygiaingan", $TBPkd)): echo 'checked'; endif;endif; ?>>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="khoanvaygiaingan" id="btvnd" <?php if(!empty($btvnd)): if (in_array("khoanvaygiaingan", $btvnd)): echo 'checked'; endif;endif; ?>>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="khoanvaygiaingan" id="nvkd"  <?php if(!empty($nvkd)):    if (in_array("khoanvaygiaingan", $nvkd)): echo 'checked'; endif; endif;?> >
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="khoanvaygiaingan" id="cskh"  <?php if(!empty($cskh)):    if (in_array("khoanvaygiaingan", $cskh)): echo 'checked'; endif; endif;?> >
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="khoanvaygiaingan" id="hoso"  <?php if(!empty($hoso)):   if (in_array("khoanvaygiaingan", $hoso)): echo 'checked';  endif; endif;?>>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Nạp tiền	</td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="naptien" id="qtv" <?php if(!empty($premi)):  if (in_array("naptien", $qtv)): echo 'checked'; endif; endif; ?>>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="naptien" id="TBPnd" <?php if(!empty($TBPnd)):  if (in_array("naptien", $TBPnd)): echo 'checked'; endif;endif; ?>>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="naptien" id="TBPkd" <?php if(!empty($TBPkd)):  if (in_array("naptien", $TBPkd)): echo 'checked'; endif; endif;?>>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="naptien" id="btvnd" <?php if(!empty($btvnd)):  if (in_array("naptien", $btvnd)): echo 'checked'; endif;endif; ?>>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="naptien" id="nvkd"  <?php if(!empty($nvkd)):     if (in_array("naptien", $nvkd)): echo 'checked'; endif; endif;?> >
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="naptien" id="cskh"  <?php if(!empty($cskh)):     if (in_array("naptien", $cskh)): echo 'checked'; endif; endif;?> >
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="naptien" id="hoso"  <?php if(!empty($hoso)):    if (in_array("naptien", $hoso)): echo 'checked';  endif; endif;?>>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Thông báo nạp tiền</td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="tbnaptien" id="qtv" <?php if(!empty($premi)):  if (in_array("tbnaptien", $qtv)): echo 'checked'; endif; endif; ?>>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="tbnaptien" id="TBPnd" <?php if(!empty($TBPnd)): if (in_array("tbnaptien", $TBPnd)): echo 'checked'; endif; endif;?>>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="tbnaptien" id="TBPkd" <?php if(!empty($TBPkd)): if (in_array("tbnaptien", $TBPkd)): echo 'checked'; endif; endif;?>>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="tbnaptien" id="btvnd" <?php if(!empty($btvnd)): if (in_array("tbnaptien", $btvnd)): echo 'checked'; endif; endif;?>>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="tbnaptien" id="nvkd" <?php if(!empty($nvkd)):    if (in_array("tbnaptien", $nvkd)): echo 'checked'; endif; endif;?>  >
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="tbnaptien" id="cskh"  <?php if(!empty($cskh)):    if (in_array("tbnaptien", $cskh)): echo 'checked'; endif; endif;?> >
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="tbnaptien" id="hoso"  <?php if(!empty($hoso)):   if (in_array("tbnaptien", $hoso)): echo 'checked';  endif; endif;?>>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Quản lý tài khoản</td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="quanlytk2" id="qtv" <?php if(!empty($premi)):  if (in_array("quanlytk2", $qtv)): echo 'checked'; endif; endif; ?>>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="quanlytk2" id="TBPnd" <?php if(!empty($TBPnd)): if (in_array("quanlytk2", $TBPnd)): echo 'checked'; endif; endif;?>>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="quanlytk2" id="TBPkd" <?php if(!empty($TBPkd)): if (in_array("quanlytk2", $TBPkd)): echo 'checked'; endif; endif;?>>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="quanlytk2" id="btvnd" <?php if(!empty($btvnd)): if (in_array("quanlytk2", $btvnd)): echo 'checked'; endif; endif;?>>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="quanlytk2" id="nvkd"  <?php if(!empty($nvkd)):    if (in_array("quanlytk2", $nvkd)): echo 'checked'; endif; endif;?> >
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="quanlytk2" id="cskh"  <?php if(!empty($cskh)):    if (in_array("quanlytk2", $cskh)): echo 'checked'; endif; endif;?> >
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="quanlytk2" id="hoso"  <?php if(!empty($hoso)):   if (in_array("quanlytk2", $hoso)): echo 'checked';  endif; endif;?>>
                                            </div>
                                        </td>
                                    </tr>
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
$('.updatepermission').click(function(){
  var qtv = [];
  $('input[id=qtv]').each(function() {
     if ($(this).is(":checked")) {
         qtv.push($(this).attr('name'));
     }
  });
  var TBPnd = [];
  $('input[id=TBPnd]').each(function() {
     if ($(this).is(":checked")) {
         TBPnd.push($(this).attr('name'));
     }
  });
  var TBPkd = [];
  $('input[id=TBPkd]').each(function() {
     if ($(this).is(":checked")) {
         TBPkd.push($(this).attr('name'));
     }
  });
  var btvnd = [];
  $('input[id=btvnd]').each(function() {
     if ($(this).is(":checked")) {
         btvnd.push($(this).attr('name'));
     }
  });
  var nvkd = [];
  $('input[id=nvkd]').each(function() {
     if ($(this).is(":checked")) {
         nvkd.push($(this).attr('name'));
     }
  });
  var cskh = [];
  $('input[id=cskh]').each(function() {
     if ($(this).is(":checked")) {
         cskh.push($(this).attr('name'));
     }
  });
  var hoso = [];
  $('input[id=hoso]').each(function() {
     if ($(this).is(":checked")) {
         hoso.push($(this).attr('name'));
     }
  });
  $.ajax({
    url: "<?= BASE_URL("assets/ajaxs/AdminAuth.php"); ?>",
    method: "POST",
    data: {
      type: 'Saveper',
      qtv: qtv,
      TBPnd: TBPnd,
      TBPkd: TBPkd,
      btvnd: btvnd,
      nvkd: nvkd,
      cskh: cskh,
      hoso: hoso,
    },
    beforeSend: function() {},
    success: function(response) {
      $('#thongbao').html(response);
    }
  });
});  

</script>
<?php
endif; endif;
require_once("../../public/admin/Footer.php");
?>
      <!-- jQuery 3 -->
      <script src="<?= BASE_URL('template') ?>/bower_components/jquery/dist/jquery.min.js"></script>
      <!-- jQuery UI 1.11.4 -->
      <script src="<?= BASE_URL('template') ?>/bower_components/jquery-ui/jquery-ui.min.js"></script>
      <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
      <script>
         $.widget.bridge('uibutton', $.ui.button);
      </script>
      <!-- Bootstrap 3.3.7 -->
      <script src="<?= BASE_URL('template') ?>/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
      <!-- Morris.js charts -->
      <script src="<?= BASE_URL('template') ?>/bower_components/raphael/raphael.min.js"></script>
      <script src="<?= BASE_URL('template') ?>/bower_components/morris.js/morris.min.js"></script>
      <!-- Sparkline -->
      <script src="<?= BASE_URL('template') ?>/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
      <!-- jvectormap -->
      <script src="<?= BASE_URL('template') ?>/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
      <script src="<?= BASE_URL('template') ?>/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
      <!-- jQuery Knob Chart -->
      <script src="<?= BASE_URL('template') ?>/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
      <!-- daterangepicker -->
      <script src="<?= BASE_URL('template') ?>/bower_components/moment/min/moment.min.js"></script>
      <script src="<?= BASE_URL('template') ?>/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
      <!-- datepicker -->
      <script src="<?= BASE_URL('template') ?>/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
      <!-- Slimscroll -->
      <script src="<?= BASE_URL('template') ?>/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
      <!-- FastClick -->
      <script src="<?= BASE_URL('template') ?>/bower_components/fastclick/lib/fastclick.js"></script>
      <script src="<?= BASE_URL('template') ?>/plugins/sweetalert2/sweetalert2.min.js"></script>
      <script src="<?= BASE_URL('template') ?>/js/jquery-ui.js"></script>
      <script type="text/javascript" src="<?= BASE_URL('template') ?>/bower_components/slick-carousel/slick/slick.min.js"></script>
      <script type="text/javascript">
        new Swiper(".mySwiper", {
            direction: "vertical",
            spaceBetween: 30,
            centeredSlides: true,
            autoplay: {
              delay: 2000,
              disableOnInteraction: false,
            },
        });
        jQuery('#carousel').slick({
          slidesToShow: 1,
          slidesToScroll: 1,
          autoplay: true,
          autoplaySpeed: 2000,
          arrows: false,
        });
        jQuery(document).ready(function() {    
          $('body').on('click', '#tabthongtin2', function(e) {    
             e.preventDefault();
              window.location.replace("<?php
              if(!empty($_SESSION['username'])){
              $row2 = $PNH->get_row(" SELECT * FROM `danhsachcskh` WHERE `phone` = '".$_SESSION['username']."' ");
              if(!empty($row2))
              {
                $nvcskh = $row2['nhanviencskh'];
                $row3 = $PNH->get_row(" SELECT * FROM `cskh` WHERE `ten` = '".$nvcskh."' ");
                if($row3){
                    $ua = strtolower($_SERVER['HTTP_USER_AGENT']);
                    if(stripos($ua,'android') !== false) { 
                        echo $cskhiphone = $row3['cskhandroid'];
                    }else{
                        echo $cskhiphone = $row3['cskhiphone'];
                    }            	
                }
              } } ?>");
            });
          $('body').on('click', '.login-btn1', function(e) {
            e.preventDefault();
            $.ajax({
              url: "<?= BASE_URL("assets/ajaxs/Auth.php"); ?>",
              method: "POST",
              data: {
                type: 'Login',
                sdt: $('#sdt').val(),
                password: $('#password').val(),
              },
              beforeSend: function() {},
              success: function(response) {                
                	$('#thongbao').html(response);
              }
            });
          });
          $('body').on('click', '#register-btn', function(e) {
            e.preventDefault();
            $.ajax({
              url: "<?= BASE_URL("assets/ajaxs/Auth.php"); ?>",
              method: "POST",
              data: {
                type: 'Register',
                sdt: $('#sdtdk').val(),
                password: $('#passworddk').val(),
                repassword: $('#repassworddk').val(),
              },
              beforeSend: function() {},
              success: function(response) {
                if(response == 'error'){
                	$('#ant-message-notice-contentauth').show();
                }else{
                	$('#thongbao').html(response);
                }
              }
            });
          });
          $('body').on('click', '.ant-badge', function(){
            window.location.replace("/notifications");
          });
          $('body').on('click', '#anticon-home', function(){
            window.location.replace("/");
          });
          $('body').on('click', '#anticon-wallet', function(){
            window.location.replace("/wallet");
          });
          $('body').on('click', '#tieptuc', function(){
            window.location.replace("/contracts");
          });
          $('body').on('click', '#anticon-user', function(){
            window.location.replace("/me");
          });
          $('body').on('click', '.log-out-btn', function(){
            window.location.replace("/Logout");
          });
          $('body').on('click', '#btn-verify', function(){
            window.location.replace("/verify");
          });
          $('body').on('click', '#backhistory', function(){
            location.href = document.referrer;
          });
          $('#camerafront').hide();
          $('#cameraback').hide();
          $('#cameraface').hide();
          $("#upfront").click(function() {
            document.getElementById('camerafront').click();
          });
          $('#camerafront').change(function(){
            const file = this.files[0];
            if (file){
              let reader = new FileReader();
              reader.onload = function(event){
                $('#upfront').css('background-image', 'url("' + event.target.result + '")');
              }
              reader.readAsDataURL(file);
            }
          });
          $("#upback").click(function() {
            document.getElementById('cameraback').click();
          });
          $('#cameraback').change(function(){
            const file2 = this.files[0];
            if (file2){
              let reader2 = new FileReader();
              reader2.onload = function(event){
                $('#upback').css('background-image', 'url("' + event.target.result + '")');
              }
              reader2.readAsDataURL(file2);
            }
          });
          $("#upchandung").click(function() {
            document.getElementById('cameraface').click();
          });
          $('#cameraface').change(function(){
            const file3 = this.files[0];
            if (file3){
              let reader3 = new FileReader();
              reader3.onload = function(event){
                $('#upchandung').css('background-image', 'url("' + event.target.result + '")');
              }
              reader3.readAsDataURL(file3);
            }
          });
          $('body').on('click', '#verify1', function(e) {   
            e.preventDefault();
             <?php if(!empty($_SESSION['username']) && $getUser['image'] == NULL){ ?>
              if($('#camerafront')[0].files[0] == undefined || $('#cameraback')[0].files[0] == undefined || $('#cameraface')[0].files[0] == undefined){
                Swal.fire("Error", "Vui lòng chọn ảnh","error");
                return false;
              }
             <?php } ?>
            var form = new FormData();
            form.append("type", 'Upphotoprofile');
            form.append("image", $('#camerafront')[0].files[0]);
            form.append("image2", $('#cameraback')[0].files[0]);
            form.append("image3", $('#cameraface')[0].files[0]);
            $.ajax({
              url: "<?= BASE_URL("assets/ajaxs/Auth.php"); ?>",
              method: "POST",
              processData: false,
              mimeType: "multipart/form-data",
              contentType: false,
              data: form,
              beforeSend: function() {
                $('#verify1 span').text('Loading...');
                $('#verify1').prop('disabled',true);
              },
              success: function(response) {
                $('#verify1 span').text('Tiếp tục');
                $('#verify1').prop('disabled',false);
                $('.user-img-container').hide();
                $('.personal-information-container').show();
              }
            });
          });
          $('body').on('click', '#verify2', function(e) {   
            e.preventDefault();
            if($('#hovaten').val() == '' || $('#cmnd').val() == '' || $('#gioitinh .ant-select-selection-selected-value').text().trim() == '' ||
            $('#dob').val() == '' || $('#nghenghiep').val() == '' || $('#thunhap .ant-select-selection-selected-value').text().trim() == '' ||
            $('#mucdichvay').val() == '' || $('#diachi').val() == '' || $('#sdtngthan').val() == '' || $('#moiquanhe').val() == ''){
              Swal.fire("Error", "Vui lòng nhập thông tin","error");
              return false;
            }
            $.ajax({
              url: "<?= BASE_URL("assets/ajaxs/Auth.php"); ?>",
              method: "POST",
              data: {
                type: 'Verify2',
                hovaten: $('#hovaten').val(),
                cmnd: $('#cmnd').val(),
                gioitinh: $('#gioitinh .ant-select-selection-selected-value').text().trim(),
                dob: $('#dob').val(),
                nghenghiep: $('#nghenghiep').val(),
                thunhap: $('#thunhap .ant-select-selection-selected-value').text().trim(),
                mucdichvay: $('#mucdichvay').val(),
                diachi: $('#diachi').val(),
                sdtngthan: $('#sdtngthan').val(),
                moiquanhe: $('#moiquanhe').val(),
              },
              beforeSend: function() {
              },
              success: function(response) {
                $('.personal-information-container').hide();
                $('.bank-form-container').show();
              }
            });
          });
          $('body').on('keyup', '#hovaten', function(e) {
            if($(this).val() == ''){
              $(this).closest('.ant-form-item-control').find('.ant-form-explain').remove();
              $(this).closest('.ant-form-item-control').addClass('has-error');
              $(this).closest('.ant-row.ant-form-item').addClass('ant-form-item-with-help');
              $(this).closest('.ant-form-item-control').append('<div class="ant-form-explain">Hãy nhập tên của bạn</div>');
            }else{
              $(this).closest('.ant-form-item-control').find('.ant-form-explain').remove();
              $(this).closest('.ant-form-item-control').removeClass('has-error');
              $(this).closest('.ant-row.ant-form-item').removeClass('ant-form-item-with-help');
            }
          });
          $('body').on('keyup', '#cmnd', function(e) {
            if($(this).val() == ''){
              $(this).closest('.ant-form-item-control').find('.ant-form-explain').remove();
              $(this).closest('.ant-form-item-control').addClass('has-error');
              $(this).closest('.ant-row.ant-form-item').addClass('ant-form-item-with-help');
              $(this).closest('.ant-form-item-control').append('<div class="ant-form-explain">Nhập số CMND/CCCD</div>');
            }else{
              $(this).closest('.ant-form-item-control').find('.ant-form-explain').remove();
              $(this).closest('.ant-form-item-control').removeClass('has-error');
              $(this).closest('.ant-row.ant-form-item').removeClass('ant-form-item-with-help');
            }
          });
          $('body').on('keyup', '#nghenghiep', function(e) {
            if($(this).val() == ''){
              $(this).closest('.ant-form-item-control').find('.ant-form-explain').remove();
              $(this).closest('.ant-form-item-control').addClass('has-error');
              $(this).closest('.ant-row.ant-form-item').addClass('ant-form-item-with-help');
              $(this).closest('.ant-form-item-control').append('<div class="ant-form-explain">Nhập công việc hiện tại</div>');
            }else{
              $(this).closest('.ant-form-item-control').find('.ant-form-explain').remove();
              $(this).closest('.ant-form-item-control').removeClass('has-error');
              $(this).closest('.ant-row.ant-form-item').removeClass('ant-form-item-with-help');
            }
          });
          $('body').on('click', '#gioitinh', function(e) {
            e.preventDefault();
            $('#regioitinh').css('display','block');
            if($('#gioitinh .ant-select-selection__placeholder').text() != ''){
              $(this).closest('.ant-form-item-control').find('.ant-form-explain').remove();
              $(this).closest('.ant-form-item-control').addClass('has-error');
              $(this).closest('.ant-row.ant-form-item').addClass('ant-form-item-with-help');
              $(this).closest('.ant-form-item-control').append('<div class="ant-form-explain">Nhập thu nhập của bạn</div>');
            }else{
              $(this).closest('.ant-form-item-control').find('.ant-form-explain').remove();
              $(this).closest('.ant-form-item-control').removeClass('has-error');
              $(this).closest('.ant-row.ant-form-item').removeClass('ant-form-item-with-help');
            }
          });
          $('body').on('click', '#regioitinh li', function(e) {  
            const tn = $(this).text();
            $('#gioitinh .ant-select-selection__placeholder').remove();
            $('#gioitinh .ant-select-selection-selected-value').remove();
            $('#gioitinh').find('.ant-select-selection__rendered').append('<div title="'+tn+'" class="ant-select-selection-selected-value" style="display: block; opacity: 1;">'+tn+'</div>');
            $('#regioitinh').css('display','none');
            $('#gioitinh').closest('.ant-form-item-control').find('.ant-form-explain').remove();
            $('#gioitinh').closest('.ant-form-item-control').removeClass('has-error');
            $('#gioitinh').closest('.ant-row.ant-form-item').removeClass('ant-form-item-with-help');
          });
          $('body').on('click', '#thunhap', function(e) {
            e.preventDefault();
            $('#rethunhap').css('display','block');
            if($('#thunhap .ant-select-selection__placeholder').text() != ''){
              $(this).closest('.ant-form-item-control').find('.ant-form-explain').remove();
              $(this).closest('.ant-form-item-control').addClass('has-error');
              $(this).closest('.ant-row.ant-form-item').addClass('ant-form-item-with-help');
              $(this).closest('.ant-form-item-control').append('<div class="ant-form-explain">Nhập thu nhập của bạn</div>');
            }else{
              $(this).closest('.ant-form-item-control').find('.ant-form-explain').remove();
              $(this).closest('.ant-form-item-control').removeClass('has-error');
              $(this).closest('.ant-row.ant-form-item').removeClass('ant-form-item-with-help');
            }
          });
          $('body').on('click', '#rethunhap li', function(e) {  
            const tn = $(this).text();
            $('#thunhap .ant-select-selection__placeholder').remove();
            $('#thunhap .ant-select-selection-selected-value').remove();
            $('#thunhap').find('.ant-select-selection__rendered').append('<div title="'+tn+'" class="ant-select-selection-selected-value" style="display: block; opacity: 1;">'+tn+'</div>');
            $('#rethunhap').css('display','none');
            $('#thunhap').closest('.ant-form-item-control').find('.ant-form-explain').remove();
            $('#thunhap').closest('.ant-form-item-control').removeClass('has-error');
            $('#thunhap').closest('.ant-row.ant-form-item').removeClass('ant-form-item-with-help');
          });
          $('body').on('keyup', '#mucdichvay', function(e) {
            if($(this).val() == ''){
              $(this).closest('.ant-form-item-control').find('.ant-form-explain').remove();
              $(this).closest('.ant-form-item-control').addClass('has-error');
              $(this).closest('.ant-row.ant-form-item').addClass('ant-form-item-with-help');
              $(this).closest('.ant-form-item-control').append('<div class="ant-form-explain">Nhập mục đích vay của bạn</div>');
            }else{
              $(this).closest('.ant-form-item-control').find('.ant-form-explain').remove();
              $(this).closest('.ant-form-item-control').removeClass('has-error');
              $(this).closest('.ant-row.ant-form-item').removeClass('ant-form-item-with-help');
            }
          });
          $('body').on('keyup', '#diachi', function(e) {
            if($(this).val() == ''){
              $(this).closest('.ant-form-item-control').find('.ant-form-explain').remove();
              $(this).closest('.ant-form-item-control').addClass('has-error');
              $(this).closest('.ant-row.ant-form-item').addClass('ant-form-item-with-help');
              $(this).closest('.ant-form-item-control').append('<div class="ant-form-explain">Nhập địa chỉ cá nhân</div>');
            }else{
              $(this).closest('.ant-form-item-control').find('.ant-form-explain').remove();
              $(this).closest('.ant-form-item-control').removeClass('has-error');
              $(this).closest('.ant-row.ant-form-item').removeClass('ant-form-item-with-help');
            }
          });
          $('body').on('keyup', '#sdtngthan', function(e) {
            if($(this).val() == ''){
              $(this).closest('.ant-form-item-control').find('.ant-form-explain').remove();
              $(this).closest('.ant-form-item-control').addClass('has-error');
              $(this).closest('.ant-row.ant-form-item').addClass('ant-form-item-with-help');
              $(this).closest('.ant-form-item-control').append('<div class="ant-form-explain">Nhập số điện thoại người thân</div>');
            }else{
              $(this).closest('.ant-form-item-control').find('.ant-form-explain').remove();
              $(this).closest('.ant-form-item-control').removeClass('has-error');
              $(this).closest('.ant-row.ant-form-item').removeClass('ant-form-item-with-help');
            }
          });
          $('body').on('keyup', '#moiquanhe', function(e) {
            if($(this).val() == ''){
              $(this).closest('.ant-form-item-control').find('.ant-form-explain').remove();
              $(this).closest('.ant-form-item-control').addClass('has-error');
              $(this).closest('.ant-row.ant-form-item').addClass('ant-form-item-with-help');
              $(this).closest('.ant-form-item-control').append('<div class="ant-form-explain">Nhập mối quan hệ với người thân</div>');
            }else{
              $(this).closest('.ant-form-item-control').find('.ant-form-explain').remove();
              $(this).closest('.ant-form-item-control').removeClass('has-error');
              $(this).closest('.ant-row.ant-form-item').removeClass('ant-form-item-with-help');
            }
          });
          $('body').on('click', '#chonbank', function(e) {
            e.preventDefault();
            $('#rechonbank').css('display','block');
            if($('#chonbank .ant-select-selection__placeholder').text() != ''){
              $(this).closest('.ant-form-item-control').find('.ant-form-explain').remove();
              $(this).closest('.ant-form-item-control').addClass('has-error');
              $(this).closest('.ant-row.ant-form-item').addClass('ant-form-item-with-help');
              $(this).closest('.ant-form-item-control').append('<div class="ant-form-explain">Chọn bank của bạn</div>');
            }else{
              $(this).closest('.ant-form-item-control').find('.ant-form-explain').remove();
              $(this).closest('.ant-form-item-control').removeClass('has-error');
              $(this).closest('.ant-row.ant-form-item').removeClass('ant-form-item-with-help');
            }
          });
          function removeAccents(str) {
            var AccentsMap = [
              "aàảãáạăằẳẵắặâầẩẫấậ",
              "AÀẢÃÁẠĂẰẲẴẮẶÂẦẨẪẤẬ",
              "dđ", "DĐ",
              "eèẻẽéẹêềểễếệ",
              "EÈẺẼÉẸÊỀỂỄẾỆ",
              "iìỉĩíị",
              "IÌỈĨÍỊ",
              "oòỏõóọôồổỗốộơờởỡớợ",
              "OÒỎÕÓỌÔỒỔỖỐỘƠỜỞỠỚỢ",
              "uùủũúụưừửữứự",
              "UÙỦŨÚỤƯỪỬỮỨỰ",
              "yỳỷỹýỵ",
              "YỲỶỸÝỴ"    
            ];
            for (var i=0; i<AccentsMap.length; i++) {
              var re = new RegExp('[' + AccentsMap[i].substr(1) + ']', 'g');
              var char = AccentsMap[i][0];
              str = str.replace(re, char);
            }
            return str;
          }
          $('body').on('click', '#rechonbank li', function(e) {  
            const tn = $(this).text();
            $('#bankhienthi').text(removeAccents(tn.toUpperCase()));
            $('#chonbank .ant-select-selection__placeholder').remove();
            $('#chonbank .ant-select-selection-selected-value').remove();
            $('#chonbank').find('.ant-select-selection__rendered').append('<div title="'+tn+'" class="ant-select-selection-selected-value" style="display: block; opacity: 1;">'+tn+'</div>');
            $('#rechonbank').css('display','none');
            $('#chonbank').closest('.ant-form-item-control').find('.ant-form-explain').remove();
            $('#chonbank').closest('.ant-form-item-control').removeClass('has-error');
            $('#chonbank').closest('.ant-row.ant-form-item').removeClass('ant-form-item-with-help');
          });
          $('body').on('click', '#thangvay', function(e) {
            e.preventDefault();
            $('#rethangvay').css('display','block');
          });
          $('body').on('click', '#rethangvay li', function(e) { 
            e.preventDefault(); 
            const tn = $(this).text().trim();
            $('#thangvay .ant-select-selection__placeholder').remove();
            $('#thangvay .ant-select-selection-selected-value').remove();
            $('#thangvay').find('.ant-select-selection__rendered').append('<div title="'+tn+'" class="ant-select-selection-selected-value" style="display: block; opacity: 1;">'+tn+'</div>');
            $('#ttthangvay').text(tn);
            $('#rethangvay').css('display','none');
            const tien2 = $('#sotiendinhvay').val().replace(/[^\d\.]/g, '');
            const ttthangvay = $('#ttthangvay').text().match(/\d+/);
            const tongtien = formatNumber(parseInt(tien2 / ttthangvay + tien2 * 12 / 100 / 12));
            $('#tranokidau').text(tongtien+' VND');
            const ngayvay = $('#ngayvay').text();
            const datevay = ngayvay.slice(0,2);
            var giatri = '';
            var d = new Date();
            monthvay = d.getMonth();
            for (i = 1; i <= ttthangvay; i++){
              monthvay2 = monthvay + i + 1;
              if(monthvay2 > 48){
                monthvay2 = monthvay2 - 48;
              }else if(monthvay2 > 36){
                monthvay2 = monthvay2 - 36;
              }else if(monthvay2 > 24){
                monthvay2 = monthvay2 - 24;
              }else if(monthvay2 > 12){
                monthvay2 = monthvay2 - 12;
              }
                if(i == 1){
                  const tienht = formatNumber(parseInt((tien2 / ttthangvay) + (tien2 * 12 / 100 / 12)));
                  giatri += '<tr class="ant-table-row ant-table-row-level-0"><td class="ant-table-cell"><span class="ant-typography">Kì thứ '+i+'</span></td><td class="ant-table-cell"><span class="ant-typography"><strong>'+tienht+'</strong></span></td><td class="ant-table-cell"><span class="ant-typography"><strong>'+datevay+' - '+monthvay2+'</strong></span></td></tr>';
                }
                else{
                  const tienht = formatNumber(parseInt((tien2 / ttthangvay) + ((tien2 - (tien2 / ttthangvay * (i - 1)))* 12 / 100 / 12)));
                  giatri += '<tr class="ant-table-row ant-table-row-level-0"><td class="ant-table-cell"><span class="ant-typography">Kì thứ '+i+'</span></td><td class="ant-table-cell"><span class="ant-typography"><strong>'+tienht+'</strong></span></td><td class="ant-table-cell"><span class="ant-typography"><strong>'+datevay+' - '+monthvay2+'</strong></span></td></tr>';
                }
            }
            $('#chitietbangtrano').empty().append(giatri);
          });
          $('body').on('click', '#tabmycontact', function(e) {  
            window.location.replace("/my-contract");
          });
          $('body').on('click', '#dangkyvay', function(e) {  
            $.ajax({
              url: "<?= BASE_URL("assets/ajaxs/Auth.php"); ?>",
              method: "POST",
              data: {
                type: 'Checkvay',
              },
              beforeSend: function() {
              },
              success: function(response) {
                if(response == 'error'){
                	$('#ant-message-notice-contentHome').show();
                    setTimeout(function(){ $('#ant-message-notice-contentHome').hide(); }, 2000);
                }else{
                	window.location.replace("/vay");
                }
              }
            });
            
          });
            $('body').on('click', '#tabthongtin', function(e) {    
                e.preventDefault();
                  $.ajax({
                    url: "<?= BASE_URL("assets/ajaxs/Auth.php"); ?>",
                    method: "POST",
                    data: {
                      type: 'Checkinfo',
                    },
                    beforeSend: function() {
                    },
                    success: function(response) {
                        $('#thongbao').html(response);
                    }
                  });
            });
          $('body').on('keyup', '#stkmember', function(e) { 
            e.preventDefault();
            const stk = $(this).val();
            const stringcat = stk.slice(0,3);
            if(stk.length == 0){
              jQuery('#stk').text('•••••••••');
            }else if(stk.length == 1){
              jQuery('#stk').text(stringcat+'••••••••');
            }else if(stk.length == 2){
              jQuery('#stk').text(stringcat+'•••••••');
            }else{
              jQuery('#stk').text(stringcat+'••••••');
            }
          });
          $('body').on('keyup', '#tenmember', function(e) { 
            e.preventDefault();
            const ten = $(this).val();
            jQuery('#ten').text(removeAccents(ten.toUpperCase()));
          });
          $('body').on('click', '#verify3', function(e) {   
            e.preventDefault();
            if($('#stkmember').val() == '' || $('#tenmember').val() == '' || $('#chonbank .ant-select-selection-selected-value').text().trim() == ''){
              Swal.fire("Error", "Vui lòng nhập thông tin","error");
              return false;
            }
            $.ajax({
              url: "<?= BASE_URL("assets/ajaxs/Auth.php"); ?>",
              method: "POST",
              data: {
                type: 'Verify3',
                stkmember: $('#stkmember').val(),
                tenmember: $('#tenmember').val(),
                chonbank: $('#chonbank .ant-select-selection-selected-value').text().trim(),
              },
              beforeSend: function() {
              },
              success: function(response) {
                $('.bank-form-container').hide();
                $('.successpage').show();
              }
            });
          });
        });

$('#ant-modal-close').click(function(){
  $('#ant-modal-wrap').hide();
  $('#ant-modal-mask').hide();
});
$('#ant-modal-close2').click(function(){
  $('#ant-modal-wrap').hide();
  $('#ant-modal-mask').hide();
});
$('#btn-hopdong').click(function(){
  $('#ant-modal-wrap').show();
  $('#ant-modal-mask').show();
  let img = document.querySelector("#canvas").toDataURL();
  $('.ant-modal-body img').attr('src',img);
});
$('#btn-hopdong2').click(function(){
  $('#ant-modal-wrap').show();
  $('#ant-modal-mask').show();
  let img = $('#getchuky').attr('src');;
  $('.ant-modal-body img').attr('src',img);
});
$('#btnokevay').click(function(){
  $('#ant-modal-wrapvay').hide();
  $('#ant-modal-maskvay').hide();
});

$('body').on('click', '#chitiettrano', function(e) {     
  $('#ant-modal-maskvay').show();
  $('#ant-modal-wrapvay').show();
});
$('body').on('click', '#btnxacnhanck', function(e) {   
  e.preventDefault();
  if(document.querySelector("#canvas").toDataURL()== 'data:image/png;base64,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' ){
      Swal.fire("Error", "Vui lòng ký vào ô bên trên","error");
      return false;
  }
  $.ajax({
    url: "<?= BASE_URL("assets/ajaxs/Auth.php"); ?>",
    method: "POST",
    data: {
      type: 'XacnhanCK',
      base64: document.querySelector("#canvas").toDataURL().replace(/^data:image\/png;base64,/, ""),
      tienvay: $('#tienvay strong').text(),
      thoigianvay: $('#thoigianvay strong').text(),
      code: $('#code').val(),
    },
    beforeSend: function() {
    },
    success: function(response) {
      if(response == 1){
        window.location.replace("/sussContracts");
      }else{
        Swal.fire("Error", "Vui lòng liên hệ Admin","error");
      }
    }
  });
});
function formatNumber(num) {
  return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,")
}
$('body').on('keyup', '#sotiendinhvay', function(event) { 
  if(event.which >= 37 && event.which <= 40) return;
    $(this).val(function(index, value) {
    return value
    .replace(/\D/g, "")
    .replace(/\B(?=(\d{3})+(?!\d))/g, ",")
    ;
    });
  const tien = formatNumber($(this).val());
  $('#tttienvay').text(tien+' đ');
  const tien2 = $('#sotiendinhvay').val().replace(/[^\d\.]/g, '');
  const ttthangvay = $('#ttthangvay').text().match(/\d+/);
  const tongtien = formatNumber(parseInt(tien2 / ttthangvay + tien2 * 12 / 100 / 12));
  $('#tranokidau').text(tongtien+' VND');
  const ngayvay = $('#ngayvay').text();
  const datevay = ngayvay.slice(0,2);
  var giatri = '';
  var d = new Date();
  monthvay = d.getMonth();
  for (i = 1; i <= ttthangvay; i++){
    monthvay2 = monthvay + i + 1;
    if(monthvay2 > 48){
      monthvay2 = monthvay2 - 48;
    }else if(monthvay2 > 36){
      monthvay2 = monthvay2 - 36;
    }else if(monthvay2 > 24){
      monthvay2 = monthvay2 - 24;
    }else if(monthvay2 > 12){
      monthvay2 = monthvay2 - 12;
    }
      if(i == 1){
        const tienht = formatNumber(parseInt((tien2 / ttthangvay) + (tien2 * 12 / 100 / 12)));
        giatri += '<tr class="ant-table-row ant-table-row-level-0"><td class="ant-table-cell"><span class="ant-typography">Kì thứ '+i+'</span></td><td class="ant-table-cell"><span class="ant-typography"><strong>'+tienht+'</strong></span></td><td class="ant-table-cell"><span class="ant-typography"><strong>'+datevay+' - '+monthvay2+'</strong></span></td></tr>';
      }
      else{
        const tienht = formatNumber(parseInt((tien2 / ttthangvay) + ((tien2 - (tien2 / ttthangvay * (i - 1)))* 12 / 100 / 12)));
        giatri += '<tr class="ant-table-row ant-table-row-level-0"><td class="ant-table-cell"><span class="ant-typography">Kì thứ '+i+'</span></td><td class="ant-table-cell"><span class="ant-typography"><strong>'+tienht+'</strong></span></td><td class="ant-table-cell"><span class="ant-typography"><strong>'+datevay+' - '+monthvay2+'</strong></span></td></tr>';
      }
  }
  $('#chitietbangtrano').empty().append(giatri);
});
$('body').on('click', '#btnxacnhanvay', function(e) {   
  e.preventDefault();
  if($('#sotiendinhvay').val() == '' ){
    Swal.fire("Error", "Vui lòng nhập số tiền vay","error");
    return false;
  }
  if($('#sotiendinhvay').val().replace(/[_\W]+/g, "") < 30000000 || $('#sotiendinhvay').val().replace(/[_\W]+/g, "") > 1000000000 ){
    Swal.fire("Error", "Vui lòng nhập đúng số tiền vay 30triệu đến 1tỷ","error");
    return false;
  }
  if($('#thangvay .ant-select-selection-selected-value').text().trim() == ''){
    Swal.fire("Error", "Vui lòng chọn thời hạn vay","error");
    return false;
  }
  $.ajax({
    url: "<?= BASE_URL("assets/ajaxs/Auth.php"); ?>",
    method: "POST",
    data: {
      type: 'XacnhanVAY',
      tienvay: $('#sotiendinhvay').val(),
      thoigianvay: $('#thangvay .ant-select-selection-selected-value').text().trim(),
    },
    beforeSend: function() {
    },
    success: function(response) {
      if(response == 1){
        window.location.replace("/contracts");
      }else{
        Swal.fire("Error", "Vui lòng liên hệ Admin","error");
      }
    }
  });
});
$('body').on('click', '.check-amount-container', function(e) {   
  e.preventDefault();
  $('#ant-modal-maskwallet').show();
  $('#ant-modal-wrapwallet').show();
  $('#ant-modalwallet').show();
});
$('body').on('click', '#ant-modal-closewallet', function(e) {   
  e.preventDefault();
  $('#ant-modal-maskwallet').hide();
  $('#ant-modal-wrapwallet').hide();
  $('#ant-modalwallet').hide();
});
$('body').on('click', '#check-amount', function(e) {   
  e.preventDefault();
   $('#ant-modal-maskwallet2').show();
  $('#ant-modal-wrapwallet2').show();
  $('#ant-modalwallet2').show(); 
});
$('body').on('click', '#ruttienvetk', function(e) {   
  e.preventDefault();
   $.ajax({
    url: "<?= BASE_URL("assets/ajaxs/Auth.php"); ?>",
    method: "POST",
    data: {
      type: 'Alertwallet',
    },
    beforeSend: function() {
    },
    success: function(response) {
      $('#alertthongbao').text(response);
      $('#ant-modal-maskwallet2').show();
      $('#ant-modal-wrapwallet2').show();
      $('#ant-modalwallet2').show();
    }
  });
  
});
$('body').on('click', '#ant-modal-closewallet2', function(e) {   
  e.preventDefault();
  $('#ant-modal-maskwallet2').hide();
  $('#ant-modal-wrapwallet2').hide();
  $('#ant-modalwallet2').hide();
});
      </script>
<?php 

if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
         $url = "https://";   
    else  
         $url = "http://";     
    $url.= $_SERVER['HTTP_HOST'];
    $url.= $_SERVER['REQUEST_URI'];
    if(BASE_URL('contracts') == $url){ ?>
<script>
  (function() {
    window.requestAnimFrame = (function(callback) {
      return window.requestAnimationFrame ||
        window.webkitRequestAnimationFrame ||
        window.mozRequestAnimationFrame ||
        window.oRequestAnimationFrame ||
        window.msRequestAnimaitonFrame ||
        function(callback) {
          window.setTimeout(callback, 1000 / 60);
        };
    })();
  
    var canvas = document.getElementById("canvas");
    var ctx = canvas.getContext("2d");
    ctx.strokeStyle = "#000";
    ctx.lineWidth = 3;
  
    var drawing = false;
    var mousePos = {
      x: 0,
      y: 0
    };
    var lastPos = mousePos;
  
    canvas.addEventListener("mousedown", function(e) {
      drawing = true;
      lastPos = getMousePos(canvas, e);
    }, false);
  
    canvas.addEventListener("mouseup", function(e) {
      drawing = false;
    }, false);
  
    canvas.addEventListener("mousemove", function(e) {
      mousePos = getMousePos(canvas, e);
    }, false);
  
    // Add touch event support for mobile
    canvas.addEventListener("touchstart", function(e) {
    }, false);
  
    canvas.addEventListener("touchmove", function(e) {
      var touch = e.touches[0];
      var me = new MouseEvent("mousemove", {
        clientX: touch.clientX,
        clientY: touch.clientY
      });
      canvas.dispatchEvent(me);
    }, false);
  
    canvas.addEventListener("touchstart", function(e) {
      mousePos = getTouchPos(canvas, e);
      var touch = e.touches[0];
      var me = new MouseEvent("mousedown", {
        clientX: touch.clientX,
        clientY: touch.clientY
      });
      canvas.dispatchEvent(me);
    }, false);
  
    canvas.addEventListener("touchend", function(e) {
      var me = new MouseEvent("mouseup", {});
      canvas.dispatchEvent(me);
    }, false);
  
    function getMousePos(canvasDom, mouseEvent) {
      var rect = canvasDom.getBoundingClientRect();
      return {
        x: mouseEvent.clientX - rect.left,
        y: mouseEvent.clientY - rect.top
      }
    }
  
    function getTouchPos(canvasDom, touchEvent) {
      var rect = canvasDom.getBoundingClientRect();
      return {
        x: touchEvent.touches[0].clientX - rect.left,
        y: touchEvent.touches[0].clientY - rect.top
      }
    }
  
    function renderCanvas() {
      if (drawing) {
        ctx.moveTo(lastPos.x, lastPos.y);
        ctx.lineTo(mousePos.x, mousePos.y);
        ctx.stroke();
        lastPos = mousePos;
      }
    }
  
    // Prevent scrolling when touching the canvas
    document.body.addEventListener("touchstart", function(e) {
      if (e.target == canvas) {
        e.preventDefault();
      }
    }, false);
    document.body.addEventListener("touchend", function(e) {
      if (e.target == canvas) {
        e.preventDefault();
      }
    }, false);
    document.body.addEventListener("touchmove", function(e) {
      if (e.target == canvas) {
        e.preventDefault();
      }
    }, false);
  
    (function drawLoop() {
      requestAnimFrame(drawLoop);
      renderCanvas();
    })();
  
    function clearCanvas() {
      canvas.width = canvas.width;
    }
  var clearBtn = document.getElementById("button1");
    clearBtn.addEventListener("click", function(e) {
      clearCanvas();
    }, false);
  })();
</script>
    <?php } ?>      
   </body>
</html>


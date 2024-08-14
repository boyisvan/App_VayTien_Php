<?php
require_once("../../config/config.php");
require_once("../../config/function.php");
$title = $PNH->site('tenweb');
if($getUser['stkbank'] != NULL){
   header("Location: /");
}
require_once("../../public/client/Header.php");
?>
<?php CheckLogin(); ?>
<div id="app">
   <div style="padding-bottom: 80px;">
      <div class="fadein">
         <div style="opacity: 1; transform: none;">
            <div class="header-container">
               <span role="img" aria-label="left" tabindex="-1" class="anticon anticon-left arrow-icon" id="backhistory">
                  <svg viewBox="64 64 896 896" focusable="false" data-icon="left" width="1em" height="1em" fill="currentColor" aria-hidden="true">
                     <path d="M724 218.3V141c0-6.7-7.7-10.4-12.9-6.3L260.3 486.8a31.86 31.86 0 000 50.3l450.8 352.1c5.3 4.1 12.9.4 12.9-6.3v-77.3c0-4.9-2.3-9.6-6.1-12.6l-360-281 360-281.1c3.8-3 6.1-7.7 6.1-12.6z"></path>
                  </svg>
               </span>
               <span class="ant-typography header-title">Xác minh</span>
               <div></div>
            </div>
            <div class="user-img-container" style="opacity: 1; transform: none; ">
               <span class="ant-typography" style="font-size: 18px; padding: 5px;"><strong>Chụp ảnh định danh KYC</strong></span>
               <?php
               if ($getUser['image'] != NULL) { ?>
                  <div class="image-container" id="upfront" style="background-image: url('<?= $getUser['image']; ?>');">
                     <input type="file" accept="image/*" id="camerafront"> <span class="ant-typography" style="color: rgb(51, 51, 51); font-weight: 700; font-size: 16px;"></span>
                  </div>

                  <div class="image-container" id="upback" style="background-image: url('<?= $getUser['image2']; ?>');">
                     <input type="file" accept="image/*" id="cameraback"> <span class="ant-typography" style="color: rgb(51, 51, 51); font-weight: 700; font-size: 16px;"></span>
                  </div>

                  <div class="image-container" id="upchandung" style="background-image: url('<?= $getUser['image3']; ?>');">
                     <input type="file" accept="image/*" id="cameraface"> <span class="ant-typography" style="color: rgb(51, 51, 51); font-weight: 700; font-size: 16px;"></span>
                  </div>
               <?php
               } else { ?>
                  <div class="image-container" id="upfront" style="background-image: url(&quot;&quot;);">
                     <span role="img" aria-label="camera" class="anticon anticon-camera" style="font-size: 30px; color: rgb(51, 51, 51);">
                        <svg viewBox="64 64 896 896" focusable="false" data-icon="camera" width="1em" height="1em" fill="currentColor" aria-hidden="true">
                           <path d="M864 248H728l-32.4-90.8a32.07 32.07 0 00-30.2-21.2H358.6c-13.5 0-25.6 8.5-30.1 21.2L296 248H160c-44.2 0-80 35.8-80 80v456c0 44.2 35.8 80 80 80h704c44.2 0 80-35.8 80-80V328c0-44.2-35.8-80-80-80zm8 536c0 4.4-3.6 8-8 8H160c-4.4 0-8-3.6-8-8V328c0-4.4 3.6-8 8-8h186.7l17.1-47.8 22.9-64.2h250.5l22.9 64.2 17.1 47.8H864c4.4 0 8 3.6 8 8v456zM512 384c-88.4 0-160 71.6-160 160s71.6 160 160 160 160-71.6 160-160-71.6-160-160-160zm0 256c-53 0-96-43-96-96s43-96 96-96 96 43 96 96-43 96-96 96z"></path>
                        </svg>
                     </span>
                     <input type="file" accept="image/*" id="camerafront"> <span class="ant-typography" style="color: rgb(51, 51, 51); font-weight: 700; font-size: 16px;">Mặt trước CMND / CCCD</span>
                  </div>
                  <div class="image-container" id="upback" style="background-image: url(&quot;&quot;);">
                     <span role="img" aria-label="camera" class="anticon anticon-camera" style="font-size: 30px; color: rgb(51, 51, 51);">
                        <svg viewBox="64 64 896 896" focusable="false" data-icon="camera" width="1em" height="1em" fill="currentColor" aria-hidden="true">
                           <path d="M864 248H728l-32.4-90.8a32.07 32.07 0 00-30.2-21.2H358.6c-13.5 0-25.6 8.5-30.1 21.2L296 248H160c-44.2 0-80 35.8-80 80v456c0 44.2 35.8 80 80 80h704c44.2 0 80-35.8 80-80V328c0-44.2-35.8-80-80-80zm8 536c0 4.4-3.6 8-8 8H160c-4.4 0-8-3.6-8-8V328c0-4.4 3.6-8 8-8h186.7l17.1-47.8 22.9-64.2h250.5l22.9 64.2 17.1 47.8H864c4.4 0 8 3.6 8 8v456zM512 384c-88.4 0-160 71.6-160 160s71.6 160 160 160 160-71.6 160-160-71.6-160-160-160zm0 256c-53 0-96-43-96-96s43-96 96-96 96 43 96 96-43 96-96 96z"></path>
                        </svg>
                     </span>
                     <input type="file" accept="image/*" id="cameraback"> <span class="ant-typography" style="color: rgb(51, 51, 51); font-weight: 700; font-size: 16px;">Mặt sau CMND / CCCD</span>
                  </div>
                  <div class="image-container" id="upchandung" style="background-image: url(&quot;&quot;);">
                     <span role="img" aria-label="camera" class="anticon anticon-camera" style="font-size: 30px; color: rgb(51, 51, 51);">
                        <svg viewBox="64 64 896 896" focusable="false" data-icon="camera" width="1em" height="1em" fill="currentColor" aria-hidden="true">
                           <path d="M864 248H728l-32.4-90.8a32.07 32.07 0 00-30.2-21.2H358.6c-13.5 0-25.6 8.5-30.1 21.2L296 248H160c-44.2 0-80 35.8-80 80v456c0 44.2 35.8 80 80 80h704c44.2 0 80-35.8 80-80V328c0-44.2-35.8-80-80-80zm8 536c0 4.4-3.6 8-8 8H160c-4.4 0-8-3.6-8-8V328c0-4.4 3.6-8 8-8h186.7l17.1-47.8 22.9-64.2h250.5l22.9 64.2 17.1 47.8H864c4.4 0 8 3.6 8 8v456zM512 384c-88.4 0-160 71.6-160 160s71.6 160 160 160 160-71.6 160-160-71.6-160-160-160zm0 256c-53 0-96-43-96-96s43-96 96-96 96 43 96 96-43 96-96 96z"></path>
                        </svg>
                     </span>
                     <input type="file" accept="image/*" id="cameraface"> <span class="ant-typography" style="color: rgb(51, 51, 51); font-weight: 700; font-size: 16px;">Ảnh chân dung</span>
                  </div>
               <?php } ?>
               <div class="confirm-div" id="verify1"><span class="ant-typography" style="color: rgb(255, 255, 255); font-weight: 700; font-size: 17px;">Tiếp tục</span></div>
            </div>

            <div class="personal-information-container" style="opacity: 1; transform: none; display:none">
               <span class="ant-typography" style="font-size: 18px; padding: 10px;"><strong>Thông tin cá nhân</strong></span>
               <form class="components-input-demo-presuffix ant-form ant-form-horizontal" style="width: 100%;">
                  <div class="ant-row ant-form-item">
                     <div class="ant-col ant-form-item-control-wrapper">
                        <div class="ant-form-item-control">
                           <span class="ant-form-item-children">
                              <span class="ipForm ant-input-affix-wrapper ant-input-affix-wrapper-lg">
                                 <input placeholder="Họ tên " type="text" id="hovaten" class="ant-input ant-input-lg">
                                 <span class="ant-input-suffix">
                                    <i aria-label="icon: idcard" class="iconForm anticon anticon-idcard">
                                       <svg viewBox="64 64 896 896" data-icon="idcard" width="1em" height="1em" fill="currentColor" aria-hidden="true" focusable="false" class="">
                                          <path d="M928 160H96c-17.7 0-32 14.3-32 32v640c0 17.7 14.3 32 32 32h832c17.7 0 32-14.3 32-32V192c0-17.7-14.3-32-32-32zm-40 632H136V232h752v560zM610.3 476h123.4c1.3 0 2.3-3.6 2.3-8v-48c0-4.4-1-8-2.3-8H610.3c-1.3 0-2.3 3.6-2.3 8v48c0 4.4 1 8 2.3 8zm4.8 144h185.7c3.9 0 7.1-3.6 7.1-8v-48c0-4.4-3.2-8-7.1-8H615.1c-3.9 0-7.1 3.6-7.1 8v48c0 4.4 3.2 8 7.1 8zM224 673h43.9c4.2 0 7.6-3.3 7.9-7.5 3.8-50.5 46-90.5 97.2-90.5s93.4 40 97.2 90.5c.3 4.2 3.7 7.5 7.9 7.5H522a8 8 0 0 0 8-8.4c-2.8-53.3-32-99.7-74.6-126.1a111.8 111.8 0 0 0 29.1-75.5c0-61.9-49.9-112-111.4-112s-111.4 50.1-111.4 112c0 29.1 11 55.5 29.1 75.5a158.09 158.09 0 0 0-74.6 126.1c-.4 4.6 3.2 8.4 7.8 8.4zm149-262c28.5 0 51.7 23.3 51.7 52s-23.2 52-51.7 52-51.7-23.3-51.7-52 23.2-52 51.7-52z"></path>
                                       </svg>
                                    </i>
                                 </span>
                              </span>
                           </span>
                        </div>
                     </div>
                  </div>
                  <div class="ant-row ant-form-item">
                     <div class="ant-col ant-form-item-control-wrapper">
                        <div class="ant-form-item-control">
                           <span class="ant-form-item-children">
                              <span class="ipForm ant-input-affix-wrapper ant-input-affix-wrapper-lg">
                                 <input placeholder="Số CMND/CCCD" type="text" id="cmnd" class="ant-input ant-input-lg">
                                 <span class="ant-input-suffix">
                                    <i aria-label="icon: pic-right" class="iconForm anticon anticon-pic-right">
                                       <svg viewBox="64 64 896 896" data-icon="pic-right" width="1em" height="1em" fill="currentColor" aria-hidden="true" focusable="false" class="">
                                          <path d="M952 792H72c-4.4 0-8 3.6-8 8v56c0 4.4 3.6 8 8 8h880c4.4 0 8-3.6 8-8v-56c0-4.4-3.6-8-8-8zm0-632H72c-4.4 0-8 3.6-8 8v56c0 4.4 3.6 8 8 8h880c4.4 0 8-3.6 8-8v-56c0-4.4-3.6-8-8-8zm-24 500c8.8 0 16-7.2 16-16V380c0-8.8-7.2-16-16-16H416c-8.8 0-16 7.2-16 16v264c0 8.8 7.2 16 16 16h512zM472 436h400v152H472V436zM80 646c0 4.4 3.6 8 8 8h224c4.4 0 8-3.6 8-8v-56c0-4.4-3.6-8-8-8H88c-4.4 0-8 3.6-8 8v56zm8-204h224c4.4 0 8-3.6 8-8v-56c0-4.4-3.6-8-8-8H88c-4.4 0-8 3.6-8 8v56c0 4.4 3.6 8 8 8z"></path>
                                       </svg>
                                    </i>
                                 </span>
                              </span>
                           </span>
                           <!---->
                        </div>
                     </div>
                  </div>
                  <div class="ant-row ant-form-item">
                     <div class="ant-col ant-form-item-control-wrapper">
                        <div class="ant-form-item-control"><span class="ant-form-item-children">
                              <div tabindex="0" class="ant-select ant-select-enabled ant-select-allow-clear ant-select-lg" autocomplete="off">
                                 <div role="combobox" aria-autocomplete="list" aria-haspopup="true" id="gioitinh" aria-controls="206a6bd4-2089-46dd-f011-a84a52f0200f" class="ant-select-selection ant-select-selection--single">
                                    <div class="ant-select-selection__rendered">
                                       <div unselectable="on" class="ant-select-selection__placeholder" style="display: block; user-select: none;">Giới tính</div>
                                    </div><span unselectable="on" class="ant-select-arrow" style="user-select: none;"><i aria-label="icon: down" class="anticon anticon-down ant-select-arrow-icon"><svg viewBox="64 64 896 896" data-icon="down" width="1em" height="1em" fill="currentColor" aria-hidden="true" focusable="false" class="">
                                             <path d="M884 256h-75c-5.1 0-9.9 2.5-12.9 6.6L512 654.2 227.9 262.6c-3-4.1-7.8-6.6-12.9-6.6h-75c-6.5 0-10.3 7.4-6.5 12.7l352.6 486.1c12.8 17.6 39 17.6 51.7 0l352.6-486.1c3.9-5.3.1-12.7-6.4-12.7z"></path>
                                          </svg></i></span>
                                 </div>
                              </div>
                           </span>
                           <!---->
                        </div>
                     </div>
                  </div>
                  <div class="ant-row ant-form-item">
                     <div class="ant-col ant-form-item-control-wrapper">
                        <div class="ant-form-item-control">
                           <span class="ant-form-item-children">
                              <input placeholder="Sinh nhật: ngày/tháng/năm" id="dob" class="mask-input-date" style="padding-top: 0px !important; padding-bottom: 0px !important;"></span>
                           <!---->
                        </div>
                     </div>
                  </div>
                  <div class="ant-row ant-form-item">
                     <div class="ant-col ant-form-item-control-wrapper">
                        <div class="ant-form-item-control">
                           <span class="ant-form-item-children">
                              <span class="ipForm ant-input-affix-wrapper ant-input-affix-wrapper-lg">
                                 <input placeholder="Nghề nghiệp" type="text" id="nghenghiep" class="ant-input ant-input-lg">
                                 <span class="ant-input-suffix">
                                    <i aria-label="icon: schedule" class="iconForm anticon anticon-schedule">
                                       <svg viewBox="64 64 896 896" data-icon="schedule" width="1em" height="1em" fill="currentColor" aria-hidden="true" focusable="false" class="">
                                          <path d="M928 224H768v-56c0-4.4-3.6-8-8-8h-56c-4.4 0-8 3.6-8 8v56H548v-56c0-4.4-3.6-8-8-8h-56c-4.4 0-8 3.6-8 8v56H328v-56c0-4.4-3.6-8-8-8h-56c-4.4 0-8 3.6-8 8v56H96c-17.7 0-32 14.3-32 32v576c0 17.7 14.3 32 32 32h832c17.7 0 32-14.3 32-32V256c0-17.7-14.3-32-32-32zm-40 568H136V296h120v56c0 4.4 3.6 8 8 8h56c4.4 0 8-3.6 8-8v-56h148v56c0 4.4 3.6 8 8 8h56c4.4 0 8-3.6 8-8v-56h148v56c0 4.4 3.6 8 8 8h56c4.4 0 8-3.6 8-8v-56h120v496zM416 496H232c-4.4 0-8 3.6-8 8v48c0 4.4 3.6 8 8 8h184c4.4 0 8-3.6 8-8v-48c0-4.4-3.6-8-8-8zm0 136H232c-4.4 0-8 3.6-8 8v48c0 4.4 3.6 8 8 8h184c4.4 0 8-3.6 8-8v-48c0-4.4-3.6-8-8-8zm308.2-177.4L620.6 598.3l-52.8-73.1c-3-4.2-7.8-6.6-12.9-6.6H500c-6.5 0-10.3 7.4-6.5 12.7l114.1 158.2a15.9 15.9 0 0 0 25.8 0l165-228.7c3.8-5.3 0-12.7-6.5-12.7H737c-5-.1-9.8 2.4-12.8 6.5z"></path>
                                       </svg>
                                    </i>
                                 </span>
                              </span>
                           </span>
                           <!---->
                        </div>
                     </div>
                  </div>
                  <div class="ant-row ant-form-item">
                     <div class="ant-col ant-form-item-control-wrapper">
                        <div class="ant-form-item-control">
                           <span class="ant-form-item-children">
                              <div tabindex="0" class="ant-select ant-select-enabled ant-select-allow-clear ant-select-lg" autocomplete="off">
                                 <div role="combobox" aria-autocomplete="list" id="thunhap" aria-haspopup="true" aria-controls="79f9c7fd-3458-4804-84b0-2234ca2bfacd" class="ant-select-selection ant-select-selection--single">
                                    <div class="ant-select-selection__rendered">
                                       <div unselectable="on" class="ant-select-selection__placeholder" style="display: block; user-select: none;">Chọn thu nhập của bạn</div>
                                    </div>
                                    <span unselectable="on" class="ant-select-arrow" style="user-select: none;">
                                       <i aria-label="icon: down" class="anticon anticon-down ant-select-arrow-icon">
                                          <svg viewBox="64 64 896 896" data-icon="down" width="1em" height="1em" fill="currentColor" aria-hidden="true" focusable="false" class="">
                                             <path d="M884 256h-75c-5.1 0-9.9 2.5-12.9 6.6L512 654.2 227.9 262.6c-3-4.1-7.8-6.6-12.9-6.6h-75c-6.5 0-10.3 7.4-6.5 12.7l352.6 486.1c12.8 17.6 39 17.6 51.7 0l352.6-486.1c3.9-5.3.1-12.7-6.4-12.7z"></path>
                                          </svg>
                                       </i>
                                    </span>
                                 </div>
                              </div>
                           </span>
                           <!---->
                        </div>
                     </div>
                  </div>
                  <div class="ant-row ant-form-item">
                     <div class="ant-col ant-form-item-control-wrapper">
                        <div class="ant-form-item-control">
                           <span class="ant-form-item-children">
                              <span class="ipForm ant-input-affix-wrapper ant-input-affix-wrapper-lg">
                                 <input placeholder="Mục đích vay" type="text" id="mucdichvay" class="ant-input ant-input-lg">
                                 <span class="ant-input-suffix">
                                    <i aria-label="icon: pic-right" class="iconForm anticon anticon-pic-right">
                                       <svg viewBox="64 64 896 896" data-icon="pic-right" width="1em" height="1em" fill="currentColor" aria-hidden="true" focusable="false" class="">
                                          <path d="M952 792H72c-4.4 0-8 3.6-8 8v56c0 4.4 3.6 8 8 8h880c4.4 0 8-3.6 8-8v-56c0-4.4-3.6-8-8-8zm0-632H72c-4.4 0-8 3.6-8 8v56c0 4.4 3.6 8 8 8h880c4.4 0 8-3.6 8-8v-56c0-4.4-3.6-8-8-8zm-24 500c8.8 0 16-7.2 16-16V380c0-8.8-7.2-16-16-16H416c-8.8 0-16 7.2-16 16v264c0 8.8 7.2 16 16 16h512zM472 436h400v152H472V436zM80 646c0 4.4 3.6 8 8 8h224c4.4 0 8-3.6 8-8v-56c0-4.4-3.6-8-8-8H88c-4.4 0-8 3.6-8 8v56zm8-204h224c4.4 0 8-3.6 8-8v-56c0-4.4-3.6-8-8-8H88c-4.4 0-8 3.6-8 8v56c0 4.4 3.6 8 8 8z"></path>
                                       </svg>
                                    </i>
                                 </span>
                              </span>
                           </span>
                           <!---->
                        </div>
                     </div>
                  </div>
                  <div class="ant-row ant-form-item">
                     <div class="ant-col ant-form-item-control-wrapper">
                        <div class="ant-form-item-control">
                           <span class="ant-form-item-children">
                              <span class="ipForm ant-input-affix-wrapper ant-input-affix-wrapper-lg">
                                 <input placeholder="Địa chỉ" type="text" id="diachi" class="ant-input ant-input-lg">
                                 <span class="ant-input-suffix">
                                    <i aria-label="icon: down-circle" class="iconForm anticon anticon-down-circle">
                                       <svg viewBox="64 64 896 896" data-icon="down-circle" width="1em" height="1em" fill="currentColor" aria-hidden="true" focusable="false" class="">
                                          <path d="M690 405h-46.9c-10.2 0-19.9 4.9-25.9 13.2L512 563.6 406.8 418.2c-6-8.3-15.6-13.2-25.9-13.2H334c-6.5 0-10.3 7.4-6.5 12.7l178 246c3.2 4.4 9.7 4.4 12.9 0l178-246c3.9-5.3.1-12.7-6.4-12.7z"></path>
                                          <path d="M512 64C264.6 64 64 264.6 64 512s200.6 448 448 448 448-200.6 448-448S759.4 64 512 64zm0 820c-205.4 0-372-166.6-372-372s166.6-372 372-372 372 166.6 372 372-166.6 372-372 372z"></path>
                                       </svg>
                                    </i>
                                 </span>
                              </span>
                           </span>
                           <!---->
                        </div>
                     </div>
                  </div>
                  <div class="ant-row ant-form-item">
                     <div class="ant-col ant-form-item-control-wrapper">
                        <div class="ant-form-item-control">
                           <span class="ant-form-item-children">
                              <span class="ipForm ant-input-affix-wrapper ant-input-affix-wrapper-lg">
                                 <input placeholder="SĐT người thân" type="text" id="sdtngthan" class="ant-input ant-input-lg">
                                 <span class="ant-input-suffix">
                                    <i aria-label="icon: down-circle" class="iconForm anticon anticon-down-circle">
                                       <svg viewBox="64 64 896 896" data-icon="down-circle" width="1em" height="1em" fill="currentColor" aria-hidden="true" focusable="false" class="">
                                          <path d="M690 405h-46.9c-10.2 0-19.9 4.9-25.9 13.2L512 563.6 406.8 418.2c-6-8.3-15.6-13.2-25.9-13.2H334c-6.5 0-10.3 7.4-6.5 12.7l178 246c3.2 4.4 9.7 4.4 12.9 0l178-246c3.9-5.3.1-12.7-6.4-12.7z"></path>
                                          <path d="M512 64C264.6 64 64 264.6 64 512s200.6 448 448 448 448-200.6 448-448S759.4 64 512 64zm0 820c-205.4 0-372-166.6-372-372s166.6-372 372-372 372 166.6 372 372-166.6 372-372 372z"></path>
                                       </svg>
                                    </i>
                                 </span>
                              </span>
                           </span>
                           <!---->
                        </div>
                     </div>
                  </div>
                  <div class="ant-row ant-form-item">
                     <div class="ant-col ant-form-item-control-wrapper">
                        <div class="ant-form-item-control">
                           <span class="ant-form-item-children">
                              <span class="ipForm ant-input-affix-wrapper ant-input-affix-wrapper-lg">
                                 <input placeholder="Mối quan hệ với người thân" type="text" id="moiquanhe" class="ant-input ant-input-lg">
                                 <span class="ant-input-suffix">
                                    <i aria-label="icon: down-circle" class="iconForm anticon anticon-down-circle">
                                       <svg viewBox="64 64 896 896" data-icon="down-circle" width="1em" height="1em" fill="currentColor" aria-hidden="true" focusable="false" class="">
                                          <path d="M690 405h-46.9c-10.2 0-19.9 4.9-25.9 13.2L512 563.6 406.8 418.2c-6-8.3-15.6-13.2-25.9-13.2H334c-6.5 0-10.3 7.4-6.5 12.7l178 246c3.2 4.4 9.7 4.4 12.9 0l178-246c3.9-5.3.1-12.7-6.4-12.7z"></path>
                                          <path d="M512 64C264.6 64 64 264.6 64 512s200.6 448 448 448 448-200.6 448-448S759.4 64 512 64zm0 820c-205.4 0-372-166.6-372-372s166.6-372 372-372 372 166.6 372 372-166.6 372-372 372z"></path>
                                       </svg>
                                    </i>
                                 </span>
                              </span>
                           </span>
                           <!---->
                        </div>
                     </div>
                  </div>
               </form>
               <div class="" style="display: flex; justify-content: center;">
                  <button type="button" class="ant-btn ant-btn-default confirm-btn" id="verify2"><span class="ant-typography btn-title">Tiếp tục</span></button>
               </div>
            </div>

            <div class="bank-form-container" style="opacity: 1; transform: none; display:none">
               <span class="ant-typography" style="font-size: 17px;"><strong>Thông tin ngân hàng thụ hưởng</strong></span>
               <div class="image" style="display: flex; justify-content: space-between; min-height: 200px; width: 85vw; border-radius: 10px; padding: 5px; flex-direction: column; background-image: url(&quot;/assets/storage/images/card.d49cd7cf12be322a95cb.png&quot;); background-position: center center; background-repeat: no-repeat; background-size: cover;">
                  <span class="ant-typography" style="font-size: 20px; color: rgb(255, 255, 255); padding: 0px 5px;" id="bankhienthi">Chọn ngân hàng</span>
                  <div><span class="ant-typography hidden-information" id="stk"><strong> •••••••••</strong></span><br>
                     <span class="ant-typography hidden-information" id="ten"><strong> *********</strong></span>
                  </div>
               </div>
               <br> <br>
               <div>
                  <span class="ipForm ant-input-affix-wrapper ant-input-affix-wrapper-lg" style="padding-left: 15px !important; width: 100%; margin-bottom: 20px;">
                     <span class="ant-input-prefix">
                        <i aria-label="icon: global" class="iconForm anticon anticon-global">
                           <svg viewBox="64 64 896 896" data-icon="global" width="1em" height="1em" fill="currentColor" aria-hidden="true" focusable="false" class="">
                              <path d="M854.4 800.9c.2-.3.5-.6.7-.9C920.6 722.1 960 621.7 960 512s-39.4-210.1-104.8-288c-.2-.3-.5-.5-.7-.8-1.1-1.3-2.1-2.5-3.2-3.7-.4-.5-.8-.9-1.2-1.4l-4.1-4.7-.1-.1c-1.5-1.7-3.1-3.4-4.6-5.1l-.1-.1c-3.2-3.4-6.4-6.8-9.7-10.1l-.1-.1-4.8-4.8-.3-.3c-1.5-1.5-3-2.9-4.5-4.3-.5-.5-1-1-1.6-1.5-1-1-2-1.9-3-2.8-.3-.3-.7-.6-1-1C736.4 109.2 629.5 64 512 64s-224.4 45.2-304.3 119.2c-.3.3-.7.6-1 1-1 .9-2 1.9-3 2.9-.5.5-1 1-1.6 1.5-1.5 1.4-3 2.9-4.5 4.3l-.3.3-4.8 4.8-.1.1c-3.3 3.3-6.5 6.7-9.7 10.1l-.1.1c-1.6 1.7-3.1 3.4-4.6 5.1l-.1.1c-1.4 1.5-2.8 3.1-4.1 4.7-.4.5-.8.9-1.2 1.4-1.1 1.2-2.1 2.5-3.2 3.7-.2.3-.5.5-.7.8C103.4 301.9 64 402.3 64 512s39.4 210.1 104.8 288c.2.3.5.6.7.9l3.1 3.7c.4.5.8.9 1.2 1.4l4.1 4.7c0 .1.1.1.1.2 1.5 1.7 3 3.4 4.6 5l.1.1c3.2 3.4 6.4 6.8 9.6 10.1l.1.1c1.6 1.6 3.1 3.2 4.7 4.7l.3.3c3.3 3.3 6.7 6.5 10.1 9.6 80.1 74 187 119.2 304.5 119.2s224.4-45.2 304.3-119.2a300 300 0 0 0 10-9.6l.3-.3c1.6-1.6 3.2-3.1 4.7-4.7l.1-.1c3.3-3.3 6.5-6.7 9.6-10.1l.1-.1c1.5-1.7 3.1-3.3 4.6-5 0-.1.1-.1.1-.2 1.4-1.5 2.8-3.1 4.1-4.7.4-.5.8-.9 1.2-1.4a99 99 0 0 0 3.3-3.7zm4.1-142.6c-13.8 32.6-32 62.8-54.2 90.2a444.07 444.07 0 0 0-81.5-55.9c11.6-46.9 18.8-98.4 20.7-152.6H887c-3 40.9-12.6 80.6-28.5 118.3zM887 484H743.5c-1.9-54.2-9.1-105.7-20.7-152.6 29.3-15.6 56.6-34.4 81.5-55.9A373.86 373.86 0 0 1 887 484zM658.3 165.5c39.7 16.8 75.8 40 107.6 69.2a394.72 394.72 0 0 1-59.4 41.8c-15.7-45-35.8-84.1-59.2-115.4 3.7 1.4 7.4 2.9 11 4.4zm-90.6 700.6c-9.2 7.2-18.4 12.7-27.7 16.4V697a389.1 389.1 0 0 1 115.7 26.2c-8.3 24.6-17.9 47.3-29 67.8-17.4 32.4-37.8 58.3-59 75.1zm59-633.1c11 20.6 20.7 43.3 29 67.8A389.1 389.1 0 0 1 540 327V141.6c9.2 3.7 18.5 9.1 27.7 16.4 21.2 16.7 41.6 42.6 59 75zM540 640.9V540h147.5c-1.6 44.2-7.1 87.1-16.3 127.8l-.3 1.2A445.02 445.02 0 0 0 540 640.9zm0-156.9V383.1c45.8-2.8 89.8-12.5 130.9-28.1l.3 1.2c9.2 40.7 14.7 83.5 16.3 127.8H540zm-56 56v100.9c-45.8 2.8-89.8 12.5-130.9 28.1l-.3-1.2c-9.2-40.7-14.7-83.5-16.3-127.8H484zm-147.5-56c1.6-44.2 7.1-87.1 16.3-127.8l.3-1.2c41.1 15.6 85 25.3 130.9 28.1V484H336.5zM484 697v185.4c-9.2-3.7-18.5-9.1-27.7-16.4-21.2-16.7-41.7-42.7-59.1-75.1-11-20.6-20.7-43.3-29-67.8 37.2-14.6 75.9-23.3 115.8-26.1zm0-370a389.1 389.1 0 0 1-115.7-26.2c8.3-24.6 17.9-47.3 29-67.8 17.4-32.4 37.8-58.4 59.1-75.1 9.2-7.2 18.4-12.7 27.7-16.4V327zM365.7 165.5c3.7-1.5 7.3-3 11-4.4-23.4 31.3-43.5 70.4-59.2 115.4-21-12-40.9-26-59.4-41.8 31.8-29.2 67.9-52.4 107.6-69.2zM165.5 365.7c13.8-32.6 32-62.8 54.2-90.2 24.9 21.5 52.2 40.3 81.5 55.9-11.6 46.9-18.8 98.4-20.7 152.6H137c3-40.9 12.6-80.6 28.5-118.3zM137 540h143.5c1.9 54.2 9.1 105.7 20.7 152.6a444.07 444.07 0 0 0-81.5 55.9A373.86 373.86 0 0 1 137 540zm228.7 318.5c-39.7-16.8-75.8-40-107.6-69.2 18.5-15.8 38.4-29.7 59.4-41.8 15.7 45 35.8 84.1 59.2 115.4-3.7-1.4-7.4-2.9-11-4.4zm292.6 0c-3.7 1.5-7.3 3-11 4.4 23.4-31.3 43.5-70.4 59.2-115.4 21 12 40.9 26 59.4 41.8a373.81 373.81 0 0 1-107.6 69.2z"></path>
                           </svg>
                        </i>
                     </span>
                     <input placeholder="Số tài khoản" type="text" id="stkmember" class="ant-input ant-input-lg">
                  </span>
                  <span class="ipForm ant-input-affix-wrapper ant-input-affix-wrapper-lg" style="padding-left: 15px !important; width: 100%; margin-bottom: 20px;">
                     <span class="ant-input-prefix">
                        <i aria-label="icon: user" class="iconForm anticon anticon-user">
                           <svg viewBox="64 64 896 896" data-icon="user" width="1em" height="1em" fill="currentColor" aria-hidden="true" focusable="false" class="">
                              <path d="M858.5 763.6a374 374 0 0 0-80.6-119.5 375.63 375.63 0 0 0-119.5-80.6c-.4-.2-.8-.3-1.2-.5C719.5 518 760 444.7 760 362c0-137-111-248-248-248S264 225 264 362c0 82.7 40.5 156 102.8 201.1-.4.2-.8.3-1.2.5-44.8 18.9-85 46-119.5 80.6a375.63 375.63 0 0 0-80.6 119.5A371.7 371.7 0 0 0 136 901.8a8 8 0 0 0 8 8.2h60c4.4 0 7.9-3.5 8-7.8 2-77.2 33-149.5 87.8-204.3 56.7-56.7 132-87.9 212.2-87.9s155.5 31.2 212.2 87.9C779 752.7 810 825 812 902.2c.1 4.4 3.6 7.8 8 7.8h60a8 8 0 0 0 8-8.2c-1-47.8-10.9-94.3-29.5-138.2zM512 534c-45.9 0-89.1-17.9-121.6-50.4S340 407.9 340 362c0-45.9 17.9-89.1 50.4-121.6S466.1 190 512 190s89.1 17.9 121.6 50.4S684 316.1 684 362c0 45.9-17.9 89.1-50.4 121.6S557.9 534 512 534z"></path>
                           </svg>
                        </i>
                     </span>
                     <input placeholder="Tên chủ tài khoản" type="text" id="tenmember" class="ant-input ant-input-lg">
                  </span>
                  <div tabindex="0" class="ant-select ant-select-enabled ant-select-allow-clear ant-select-lg" id="chonbank" autocomplete="off" style="width: calc(100vw - 40px); margin-bottom: 20px;">
                     <div role="combobox" aria-autocomplete="list" aria-haspopup="true" aria-controls="0d58e425-82bf-4216-f492-e0d6c5a0a30e" class="ant-select-selection ant-select-selection--single">
                        <div class="ant-select-selection__rendered">
                           <div unselectable="on" class="ant-select-selection__placeholder" style="display: block; user-select: none;">Chọn ngân hàng thụ hưởng</div>
                        </div>
                        <span unselectable="on" class="ant-select-arrow" style="user-select: none;">
                           <i aria-label="icon: down" class="anticon anticon-down ant-select-arrow-icon">
                              <svg viewBox="64 64 896 896" data-icon="down" width="1em" height="1em" fill="currentColor" aria-hidden="true" focusable="false" class="">
                                 <path d="M884 256h-75c-5.1 0-9.9 2.5-12.9 6.6L512 654.2 227.9 262.6c-3-4.1-7.8-6.6-12.9-6.6h-75c-6.5 0-10.3 7.4-6.5 12.7l352.6 486.1c12.8 17.6 39 17.6 51.7 0l352.6-486.1c3.9-5.3.1-12.7-6.4-12.7z"></path>
                              </svg>
                           </i>
                        </span>
                     </div>
                  </div>
                  <div class="send-request-div"><button type="button" class="ant-btn ant-btn-default confirm-btn" id="verify3"><span class="ant-typography confirm-div-title">Gửi yêu cầu</span></button></div>
               </div>
            </div>

            <div class="successpage" style="display:flex; opacity: 1; transform: none; width: 100%; padding: 10px 20px;justify-content: center; align-items: center; flex-direction: column; display:none">
               <div class="ant-image"><img src="/assets/storage/images/success.9ecb81807c34f122fc93.jpg" class="ant-image-img"></div>
               <div class="ant-progress ant-progress-circle ant-progress-status-success ant-progress-show-info ant-progress-small" style="">
                  <div class="ant-progress-inner" style="width: 120px; height: 120px; font-size: 24px;">
                     <svg viewBox="0 0 100 100" class="ant-progress-circle">
                        <path d="M 50,50 m 0,-47
                           a 47,47 0 1 1 0,94
                           a 47,47 0 1 1 0,-94" stroke-linecap="round" stroke-width="6" fill-opacity="0" class="ant-progress-circle-trail" style="stroke-dasharray: 295.31px, 295.31px; stroke-dashoffset: 0px; transition: stroke-dashoffset 0.3s ease 0s, stroke-dasharray 0.3s ease 0s, stroke 0.3s ease 0s, stroke-width 0.06s ease 0.3s, opacity 0.3s ease 0s;"></path>
                        <path d="M 50,50 m 0,-47
                           a 47,47 0 1 1 0,94
                           a 47,47 0 1 1 0,-94" stroke="" stroke-linecap="round" stroke-width="6" opacity="1" fill-opacity="0" class="ant-progress-circle-path" style="stroke-dasharray: 295.31px, 295.31px; stroke-dashoffset: 0px; transition: stroke-dashoffset 0s ease 0s, stroke-dasharray 0s ease 0s, stroke 0s ease 0s, stroke-width 0.3s ease 0s, opacity 0s ease 0s;"></path>
                        <path d="M 50,50 m 0,-47
                           a 47,47 0 1 1 0,94
                           a 47,47 0 1 1 0,-94" stroke="" stroke-linecap="round" stroke-width="6" opacity="0" fill-opacity="0" class="ant-progress-circle-path" style="stroke: rgb(82, 196, 26); stroke-dasharray: 0px, 295.31px; stroke-dashoffset: 0px; transition: stroke-dashoffset 0s ease 0s, stroke-dasharray 0s ease 0s, stroke 0s ease 0s, stroke-width 0.3s ease 0s, opacity 0s ease 0s;"></path>
                     </svg>
                     <span class="ant-progress-text">
                        <span role="img" aria-label="check" class="anticon anticon-check">
                           <svg viewBox="64 64 896 896" focusable="false" data-icon="check" width="1em" height="1em" fill="currentColor" aria-hidden="true">
                              <path d="M912 190h-69.9c-9.8 0-19.1 4.5-25.1 12.2L404.7 724.5 207 474a32 32 0 00-25.1-12.2H112c-6.7 0-10.4 7.7-6.3 12.9l273.9 347c12.8 16.2 37.4 16.2 50.3 0l488.4-618.9c4.1-5.1.4-12.8-6.3-12.8z"></path>
                           </svg>
                        </span>
                     </span>
                  </div>
               </div>
               <span class="ant-typography" style="font-size: 17px; text-align: center;">Chúc mừng</span><span class="ant-typography" style="font-size: 17px; text-align: center;">Hoàn thành xác minh danh tính. Vui lòng tiếp tục</span> 
               <div id="tieptuc" style="background: rgb(0, 45, 191); width: 70%; display: flex; justify-content: center; align-items: center; margin: 20px; border-radius: 10px; padding: 5px;">
               <span class="ant-typography" style="color: rgb(255, 255, 255); font-weight: 700; font-size: 17px;">Tiếp tục</span></div>
            </div>

         </div>
      </div>
   </div>
</div>

<div style="position: absolute; top: 0px; left: 0px; width: 100%;">
   <div>
      <div class="ant-select-dropdown ant-select-dropdown--single ant-select-dropdown-placement-bottomLeft" id="rechonbank" style="width: 350px; left: 20px; top: 491px; display: none;">
         <div id="4b8739c2-4ab4-47af-a658-614de1417a2e" tabindex="-1" class="ant-select-dropdown-content" style="overflow: auto; transform: translateZ(0px);">
            <ul role="listbox" tabindex="0" class="ant-select-dropdown-menu ant-select-dropdown-menu-vertical ant-select-dropdown-menu-root">
               <li role="option" class="ant-select-dropdown-menu-item ant-select-dropdown-menu-item-active" unselectable="on" style="user-select: none;">
                  <div><span class="ant-typography"><strong> BIDV</strong></span>-<span class="ant-typography" style="overflow-wrap: break-word;" >Ngân hàng Đầu tư và Phát triển Việt Nam</span>
                  </div>
                  <div class="ant-image" style="width: 20%;"><img src="/assets/storage/images/logo-ngan-hang-BIDV.png" class="ant-image-img"></div>
               </li>
               <li role="option" class="ant-select-dropdown-menu-item" unselectable="on" style="user-select: none;">
                  <div><span class="ant-typography"><strong> ACB</strong></span>-<span class="ant-typography" style="overflow-wrap: break-word;">Ngân hàng Á Châu</span>
                  </div>
                  <div class="ant-image" style="width: 20%;"><img src="/assets/storage/images/logo-ngan-hang-ACB.png" class="ant-image-img"></div>
               </li>
               <li role="option" class="ant-select-dropdown-menu-item" unselectable="on" style="user-select: none;">
                  <div><span class="ant-typography"><strong> MB</strong></span>-<span class="ant-typography" style="overflow-wrap: break-word;">Ngân hàng Quân Đội</span>
                  </div>
                  <div class="ant-image" style="width: 20%;"><img src="/assets/storage/images/logo-ngan-hang-MB-new2020.gif" class="ant-image-img"></div>
               </li>
               <li role="option" class="ant-select-dropdown-menu-item" unselectable="on" style="user-select: none;">
                  <div><span class="ant-typography"><strong> VPBank</strong></span>-<span class="ant-typography" style="overflow-wrap: break-word;">Ngân hàng Thương mại cổ phần Việt Nam Thịnh Vượng</span>
                  </div>
                  <div class="ant-image" style="width: 20%;"><img src="/assets/storage/images/logo-ngan-hang-VPbank.png" class="ant-image-img"></div>
               </li>
               <li role="option" class="ant-select-dropdown-menu-item" unselectable="on" style="user-select: none;">
                  <div><span class="ant-typography"><strong> TPBank</strong></span>-<span class="ant-typography" style="overflow-wrap: break-word;">Ngân hàng Tiên Phong TPBank</span>
                  </div>
                  <div class="ant-image" style="width: 20%;"><img src="/assets/storage/images/TPbank-logo.png" class="ant-image-img"></div>
               </li>
               <li role="option" class="ant-select-dropdown-menu-item" unselectable="on" style="user-select: none;">
                  <div><span class="ant-typography"><strong> Vietinbank</strong></span>-<span class="ant-typography" style="overflow-wrap: break-word;">Ngân hàng công thương Việt Nam</span>
                  </div>
                  <div class="ant-image" style="width: 20%;"><img src="/assets/storage/images/logo-ngan-hang-Vietinbank.png" class="ant-image-img"></div>
               </li>
               <li role="option" class="ant-select-dropdown-menu-item" unselectable="on" style="user-select: none;">
                  <div><span class="ant-typography"><strong> Agribank</strong></span>-<span class="ant-typography" style="overflow-wrap: break-word;">Ngân hàng NN và PTNT VN</span>
                  </div>
                  <div class="ant-image" style="width: 20%;"><img src="/assets/storage/images/Agribank-logo.png" class="ant-image-img"></div>
               </li>
               <li role="option" class="ant-select-dropdown-menu-item" unselectable="on" style="user-select: none;">
                  <div><span class="ant-typography"><strong> Techcombank</strong></span>-<span class="ant-typography" style="overflow-wrap: break-word;">Ngân hàng Kỹ thương Việt Nam</span>
                  </div>
                  <div class="ant-image" style="width: 20%;"><img src="/assets/storage/images/logo-ngan-hang-Techcombank.png" class="ant-image-img"></div>
               </li>
               <li role="option" class="ant-select-dropdown-menu-item" unselectable="on" style="user-select: none;">
                  <div><span class="ant-typography"><strong> Vietcombank</strong></span>-<span class="ant-typography" style="overflow-wrap: break-word;">Ngân hàng TMCP Ngoại Thương</span>
                  </div>
                  <div class="ant-image" style="width: 20%;"><img src="/assets/storage/images/logo-ngan-hang-Vietcombank.png" class="ant-image-img"></div>
               </li>
               <li role="option" class="ant-select-dropdown-menu-item" unselectable="on" style="user-select: none;">
                  <div><span class="ant-typography"><strong> ABBank</strong></span>-<span class="ant-typography" style="overflow-wrap: break-word;">Ngân hàng An Bình</span>
                  </div>
                  <div class="ant-image" style="width: 20%;"></div>
               </li>
               <li role="option" class="ant-select-dropdown-menu-item" unselectable="on" style="user-select: none;">
                  <div><span class="ant-typography"><strong> Baoviet Bank</strong></span>-<span class="ant-typography" style="overflow-wrap: break-word;">Ngân hàng TMCP Bảo Việt</span>
                  </div>
                  <div class="ant-image" style="width: 20%;"><img src="/assets/storage/images/BAOVIET-bank-logo.png" class="ant-image-img"></div>
               </li>
               <li role="option" class="ant-select-dropdown-menu-item" unselectable="on" style="user-select: none;">
                  <div><span class="ant-typography"><strong> CIMB</strong></span>-<span class="ant-typography" style="overflow-wrap: break-word;">Ngân hàng TNHH MTV CIMB Việt Nam</span>
                  </div>
                  <div class="ant-image" style="width: 20%;"></div>
               </li>
               <li role="option" class="ant-select-dropdown-menu-item" unselectable="on" style="user-select: none;">
                  <div><span class="ant-typography"><strong> Eximbank</strong></span>-<span class="ant-typography" style="overflow-wrap: break-word;">Ngân hàng Xuất nhập khẩu Việt Nam</span>
                  </div>
                  <div class="ant-image" style="width: 20%;"><img src="/assets/storage/images/Eximbank.jpg" class="ant-image-img"></div>
               </li>
               <li role="option" class="ant-select-dropdown-menu-item" unselectable="on" style="user-select: none;">
                  <div><span class="ant-typography"><strong> GP Bank</strong></span>-<span class="ant-typography" style="overflow-wrap: break-word;">Ngân hàng Dầu khí Toàn cầu</span>
                  </div>
                  <div class="ant-image" style="width: 20%;"><img src="/assets/storage/images/GPBANK-logo.png" class="ant-image-img"></div>
               </li>
               <li role="option" class="ant-select-dropdown-menu-item" unselectable="on" style="user-select: none;">
                  <div><span class="ant-typography"><strong> HDBank</strong></span>-<span class="ant-typography" style="overflow-wrap: break-word;">Ngân hàng Phát triển TP HCM</span>
                  </div>
                  <div class="ant-image" style="width: 20%;"><img src="/assets/storage/images/HDBank.png" class="ant-image-img"></div>
               </li>
               <li role="option" class="ant-select-dropdown-menu-item" unselectable="on" style="user-select: none;">
                  <div><span class="ant-typography"><strong> HLO</strong></span>-<span class="ant-typography" style="overflow-wrap: break-word;">Ngân hàng Hong Leong Viet Nam</span>
                  </div>
                  <div class="ant-image" style="width: 20%;"></div>
               </li>
               <li role="option" class="ant-select-dropdown-menu-item" unselectable="on" style="user-select: none;">
                  <div><span class="ant-typography"><strong> Kienlongbank</strong></span>-<span class="ant-typography" style="overflow-wrap: break-word;">Ngân hàng Kiên Long</span>
                  </div>
                  <div class="ant-image" style="width: 20%;"><img src="/assets/storage/images/KienLongbank-logo.png" class="ant-image-img"></div>
               </li>
               <li role="option" class="ant-select-dropdown-menu-item" unselectable="on" style="user-select: none;">
                  <div><span class="ant-typography"><strong> Lienvietbank</strong></span>-<span class="ant-typography" style="overflow-wrap: break-word;">Ngan hàng TMCP Bưu điện Liên Việt</span>
                  </div>
                  <div class="ant-image" style="width: 20%;"><img src="/assets/storage/images/LienVietPostBank-logo.png" class="ant-image-img"></div>
               </li>
               <li role="option" class="ant-select-dropdown-menu-item" unselectable="on" style="user-select: none;">
                  <div><span class="ant-typography"><strong> MSB</strong></span>-<span class="ant-typography" style="overflow-wrap: break-word;">Ngân hàng Hàng Hải Việt Nam</span>
                  </div>
                  <div class="ant-image" style="width: 20%;"><img src="/assets/storage/images/MSB-bank-logo.png" class="ant-image-img"></div>
               </li>
               <li role="option" class="ant-select-dropdown-menu-item" unselectable="on" style="user-select: none;">
                  <div><span class="ant-typography"><strong> Nam A Bank</strong></span>-<span class="ant-typography" style="overflow-wrap: break-word;">Ngân hàng Nam Á</span>
                  </div>
                  <div class="ant-image" style="width: 20%;"><img src="/assets/storage/images/NAMA-Bank-logo.png" class="ant-image-img"></div>
               </li>
               <li role="option" class="ant-select-dropdown-menu-item" unselectable="on" style="user-select: none;">
                  <div><span class="ant-typography"><strong> NASBank</strong></span>-<span class="ant-typography" style="overflow-wrap: break-word;">Ngân hàng Bắc Á</span>
                  </div>
                  <div class="ant-image" style="width: 20%;"><img src="/assets/storage/images/BACA-bank-logo.png" class="ant-image-img"></div>
               </li>
               <li role="option" class="ant-select-dropdown-menu-item" unselectable="on" style="user-select: none;">
                  <div><span class="ant-typography"><strong> NCB</strong></span>-<span class="ant-typography" style="overflow-wrap: break-word;">Ngân hàng Quoc Dan</span>
                  </div>
                  <div class="ant-image" style="width: 20%;"><img src="/assets/storage/images/NCB-Bank-logo.png" class="ant-image-img"></div>
               </li>
               <li role="option" class="ant-select-dropdown-menu-item" unselectable="on" style="user-select: none;">
                  <div><span class="ant-typography"><strong> OCBC</strong></span>-<span class="ant-typography" style="overflow-wrap: break-word;">Oversea - Chinese Bank</span>
                  </div>
                  <div class="ant-image" style="width: 20%;"></div>
               </li>
               <li role="option" class="ant-select-dropdown-menu-item" unselectable="on" style="user-select: none;">
                  <div><span class="ant-typography"><strong> Ocean Bank</strong></span>-<span class="ant-typography" style="overflow-wrap: break-word;">Ngân hàng Đại Dương</span>
                  </div>
                  <div class="ant-image" style="width: 20%;"><img src="/assets/storage/images/Oceanbank-logo.png" class="ant-image-img"></div>
               </li>
               <li role="option" class="ant-select-dropdown-menu-item" unselectable="on" style="user-select: none;">
                  <div><span class="ant-typography"><strong> OCB</strong></span>-<span class="ant-typography" style="overflow-wrap: break-word;">Ngân hàng Phương Đông</span>
                  </div>
                  <div class="ant-image" style="width: 20%;"><img src="/assets/storage/images/OCB-bank-logo.png" class="ant-image-img"></div>
               </li>
               <li role="option" class="ant-select-dropdown-menu-item" unselectable="on" style="user-select: none;">
                  <div><span class="ant-typography"><strong> PG Bank</strong></span>-<span class="ant-typography" style="overflow-wrap: break-word;">Ngân hàng Xăng dầu Petrolimex</span>
                  </div>
                  <div class="ant-image" style="width: 20%;"><img src="/assets/storage/images/PG-bank-logo.png" class="ant-image-img"></div>
               </li>
               <li role="option" class="ant-select-dropdown-menu-item" unselectable="on" style="user-select: none;">
                  <div><span class="ant-typography"><strong> PVcombank</strong></span>-<span class="ant-typography" style="overflow-wrap: break-word;">NH TMCP Đại Chúng Viet Nam</span>
                  </div>
                  <div class="ant-image" style="width: 20%;"><img src="/assets/storage/images/PVcom-bank-logo.png" class="ant-image-img"></div>
               </li>
               <li role="option" class="ant-select-dropdown-menu-item" unselectable="on" style="user-select: none;">
                  <div><span class="ant-typography"><strong> QTDCS</strong></span>-<span class="ant-typography" style="overflow-wrap: break-word;">Quỹ tín dụng cơ sở</span>
                  </div>
                  <div class="ant-image" style="width: 20%;"></div>
               </li>
               <li role="option" class="ant-select-dropdown-menu-item" unselectable="on" style="user-select: none;">
                  <div><span class="ant-typography"><strong> Sacombank</strong></span>-<span class="ant-typography" style="overflow-wrap: break-word;">Ngân hàng Sài Gòn Thương Tín</span>
                  </div>
                  <div class="ant-image" style="width: 20%;"><img src="/assets/storage/images/logo-ngan-hang-Sacombank.png" class="ant-image-img"></div>
               </li>
               <li role="option" class="ant-select-dropdown-menu-item" unselectable="on" style="user-select: none;">
                  <div><span class="ant-typography"><strong> Saigonbank</strong></span>-<span class="ant-typography" style="overflow-wrap: break-word;">Ngân hàng Sài Gòn Công Thương</span>
                  </div>
                  <div class="ant-image" style="width: 20%;"><img src="/assets/storage/images/Saigonbank-logo.png" class="ant-image-img"></div>
               </li>
               <li role="option" class="ant-select-dropdown-menu-item" unselectable="on" style="user-select: none;">
                  <div><span class="ant-typography"><strong> SCB</strong></span>-<span class="ant-typography" style="overflow-wrap: break-word;">Ngân hàng TMCP Sài Gòn</span>
                  </div>
                  <div class="ant-image" style="width: 20%;"><img src="/assets/storage/images/logo-ngan-hang-SCB.png" class="ant-image-img"></div>
               </li>
               <li role="option" class="ant-select-dropdown-menu-item" unselectable="on" style="user-select: none;">
                  <div><span class="ant-typography"><strong> SCBank</strong></span>-<span class="ant-typography" style="overflow-wrap: break-word;">Ngân hàng Standard Chartered Bank Việt Nam</span>
                  </div>
                  <div class="ant-image" style="width: 20%;"></div>
               </li>
               <li role="option" class="ant-select-dropdown-menu-item" unselectable="on" style="user-select: none;">
                  <div><span class="ant-typography"><strong> SCBank HN</strong></span>-<span class="ant-typography" style="overflow-wrap: break-word;">Ngân hàng Standard Chartered Bank HN</span>
                  </div>
                  <div class="ant-image" style="width: 20%;"></div>
               </li>
               <li role="option" class="ant-select-dropdown-menu-item" unselectable="on" style="user-select: none;">
                  <div><span class="ant-typography"><strong> SCSB</strong></span>-<span class="ant-typography" style="overflow-wrap: break-word;">The Shanghai Commercial &amp; Savings Bank CN Đồng Nai</span>
                  </div>
                  <div class="ant-image" style="width: 20%;"></div>
               </li>
               <li role="option" class="ant-select-dropdown-menu-item" unselectable="on" style="user-select: none;">
                  <div><span class="ant-typography"><strong> SeABank</strong></span>-<span class="ant-typography" style="overflow-wrap: break-word;">Ngân hàng TMCP Đông Nam Á</span>
                  </div>
                  <div class="ant-image" style="width: 20%;"><img src="/assets/storage/images/SeABank-logo.png" class="ant-image-img"></div>
               </li>
               <li role="option" class="ant-select-dropdown-menu-item" unselectable="on" style="user-select: none;">
                  <div><span class="ant-typography"><strong> SHB</strong></span>-<span class="ant-typography" style="overflow-wrap: break-word;">Ngân hàng Sài Gòn - Hà Nội</span>
                  </div>
                  <div class="ant-image" style="width: 20%;"><img src="/assets/storage/images/logo-ngan-hang-SHB.png" class="ant-image-img"></div>
               </li>
               <li role="option" class="ant-select-dropdown-menu-item" unselectable="on" style="user-select: none;">
                  <div><span class="ant-typography"><strong> Shinhan Bank</strong></span>-<span class="ant-typography" style="overflow-wrap: break-word;">Ngân hàng TNHH MTV Shinhan Việt Nam</span>
                  </div>
                  <div class="ant-image" style="width: 20%;"><img src="/assets/storage/images/Shinhan-bank-logo.png" class="ant-image-img"></div>
               </li>
               <li role="option" class="ant-select-dropdown-menu-item" unselectable="on" style="user-select: none;">
                  <div><span class="ant-typography"><strong> SIAM</strong></span>-<span class="ant-typography" style="overflow-wrap: break-word;">Ngân hàng The Siam Commercial Public</span>
                  </div>
                  <div class="ant-image" style="width: 20%;"></div>
               </li>
               <li role="option" class="ant-select-dropdown-menu-item" unselectable="on" style="user-select: none;">
                  <div><span class="ant-typography"><strong> SMBC</strong></span>-<span class="ant-typography" style="overflow-wrap: break-word;">Sumitomo Mitsui Banking Corporation HCM</span>
                  </div>
                  <div class="ant-image" style="width: 20%;"></div>
               </li>
               <li role="option" class="ant-select-dropdown-menu-item" unselectable="on" style="user-select: none;">
                  <div><span class="ant-typography"><strong> SMBC HN</strong></span>-<span class="ant-typography" style="overflow-wrap: break-word;">Sumitomo Mitsui Banking Corporation HN</span>
                  </div>
                  <div class="ant-image" style="width: 20%;"></div>
               </li>
               <li role="option" class="ant-select-dropdown-menu-item" unselectable="on" style="user-select: none;">
                  <div><span class="ant-typography"><strong> SPB</strong></span>-<span class="ant-typography" style="overflow-wrap: break-word;">Ngân hàng SinoPac</span>
                  </div>
                  <div class="ant-image" style="width: 20%;"></div>
               </li>
               <li role="option" class="ant-select-dropdown-menu-item" unselectable="on" style="user-select: none;">
                  <div><span class="ant-typography"><strong> TFCBHN</strong></span>-<span class="ant-typography" style="overflow-wrap: break-word;">Taipei Fubon Commercial Bank Ha Noi</span>
                  </div>
                  <div class="ant-image" style="width: 20%;"></div>
               </li>
               <li role="option" class="ant-select-dropdown-menu-item" unselectable="on" style="user-select: none;">
                  <div><span class="ant-typography"><strong> TFCBTPHCM</strong></span>-<span class="ant-typography" style="overflow-wrap: break-word;">Taipei Fubon Commercial Bank TP Ho Chi Minh</span>
                  </div>
                  <div class="ant-image" style="width: 20%;"></div>
               </li>
               <li role="option" class="ant-select-dropdown-menu-item" unselectable="on" style="user-select: none;">
                  <div><span class="ant-typography"><strong> VBSP</strong></span>-<span class="ant-typography" style="overflow-wrap: break-word;">Ngân hàng Chính sách xã hội Việt Nam</span>
                  </div>
                  <div class="ant-image" style="width: 20%;"></div>
               </li>
               <li role="option" class="ant-select-dropdown-menu-item" unselectable="on" style="user-select: none;">
                  <div><span class="ant-typography"><strong> VDB</strong></span>-<span class="ant-typography" style="overflow-wrap: break-word;">Ngân hàng Phát triển Việt Nam</span>
                  </div>
                  <div class="ant-image" style="width: 20%;"></div>
               </li>
               <li role="option" class="ant-select-dropdown-menu-item" unselectable="on" style="user-select: none;">
                  <div><span class="ant-typography"><strong> VIB</strong></span>-<span class="ant-typography" style="overflow-wrap: break-word;">Ngân hàng Quốc tế</span>
                  </div>
                  <div class="ant-image" style="width: 20%;"><img src="/assets/storage/images/VIB-bank-logo.png" class="ant-image-img"></div>
               </li>
               <li role="option" class="ant-select-dropdown-menu-item" unselectable="on" style="user-select: none;">
                  <div><span class="ant-typography"><strong> VID public</strong></span>-<span class="ant-typography" style="overflow-wrap: break-word;">Ngân hàng VID Public</span>
                  </div>
                  <div class="ant-image" style="width: 20%;"></div>
               </li>
               <li role="option" class="ant-select-dropdown-menu-item" unselectable="on" style="user-select: none;">
                  <div><span class="ant-typography"><strong> Viet Hoa Bank</strong></span>-<span class="ant-typography" style="overflow-wrap: break-word;">Ngân hàng Việt Hoa</span>
                  </div>
                  <div class="ant-image" style="width: 20%;"></div>
               </li>
               <li role="option" class="ant-select-dropdown-menu-item" unselectable="on" style="user-select: none;">
                  <div><span class="ant-typography"><strong> VietA Bank</strong></span>-<span class="ant-typography" style="overflow-wrap: break-word;">Ngân hàng Việt Á</span>
                  </div>
                  <div class="ant-image" style="width: 20%;"></div>
               </li>
               <li role="option" class="ant-select-dropdown-menu-item" unselectable="on" style="user-select: none;">
                  <div><span class="ant-typography"><strong> Vietbank</strong></span>-<span class="ant-typography" style="overflow-wrap: break-word;">Ngân hàng Việt Nam Thương Tín</span>
                  </div>
                  <div class="ant-image" style="width: 20%;"><img src="/assets/storage/images/VIETBANK-logo.png" class="ant-image-img"></div>
               </li>
               <li role="option" class="ant-select-dropdown-menu-item" unselectable="on" style="user-select: none;">
                  <div><span class="ant-typography"><strong> VietCapital Bank</strong></span>-<span class="ant-typography" style="overflow-wrap: break-word;">NHTMCP Bản Việt</span>
                  </div>
                  <div class="ant-image" style="width: 20%;"><img src="/assets/storage/images/VietCapitalBank-logo.png" class="ant-image-img"></div>
               </li>
               <li role="option" class="ant-select-dropdown-menu-item" unselectable="on" style="user-select: none;">
                  <div><span class="ant-typography"><strong> VNCB</strong></span>-<span class="ant-typography" style="overflow-wrap: break-word;">NH TMCP Xây dựng Việt Nam</span>
                  </div>
                  <div class="ant-image" style="width: 20%;"></div>
               </li>
               <li role="option" class="ant-select-dropdown-menu-item" unselectable="on" style="user-select: none;">
                  <div><span class="ant-typography"><strong> VRB</strong></span>-<span class="ant-typography" style="overflow-wrap: break-word;">Ngân hàng Liên doanh Việt Nga</span>
                  </div>
                  <div class="ant-image" style="width: 20%;"></div>
               </li>
               <li role="option" class="ant-select-dropdown-menu-item" unselectable="on" style="user-select: none;">
                  <div><span class="ant-typography"><strong> Vung Tau</strong></span>-<span class="ant-typography" style="overflow-wrap: break-word;">Ngân hàng Vũng Tàu</span>
                  </div>
                  <div class="ant-image" style="width: 20%;"></div>
               </li>
               <li role="option" class="ant-select-dropdown-menu-item" unselectable="on" style="user-select: none;">
                  <div><span class="ant-typography"><strong> WHHCM</strong></span>-<span class="ant-typography" style="overflow-wrap: break-word;">NH Woori HCM</span>
                  </div>
                  <div class="ant-image" style="width: 20%;"></div>
               </li>
               <li role="option" class="ant-select-dropdown-menu-item" unselectable="on" style="user-select: none;">
                  <div><span class="ant-typography"><strong> WHHN</strong></span>-<span class="ant-typography" style="overflow-wrap: break-word;">WOORI BANK Hà Nội</span>
                  </div>
                  <div class="ant-image" style="width: 20%;"></div>
               </li>
               <li role="option" class="ant-select-dropdown-menu-item" unselectable="on" style="user-select: none;">
                  <div><span class="ant-typography"><strong> Dong A Bank</strong></span>-<span class="ant-typography" style="overflow-wrap: break-word;">Ngân hàng Đông Á</span>
                  </div>
                  <div class="ant-image" style="width: 20%;"><img src="/assets/storage/images/DongA-bank-logo.png" class="ant-image-img"></div>
               </li>
            </ul>
         </div>
      </div>
   </div>
</div>

<div style="position: absolute; top: 0px; left: 0px; width: 100%;">
   <div>
      <div class="ant-select-dropdown ant-select-dropdown--single ant-select-dropdown-placement-bottomLeft" id="regioitinh" style="width: 350px; left: 20px; top: 281px; display: none;">
         <div id="5aabeb78-3a51-4e3a-c541-0819de61578b" tabindex="-1" class="ant-select-dropdown-content" style="overflow: auto; transform: translateZ(0px);">
            <ul role="listbox" tabindex="0" class="ant-select-dropdown-menu ant-select-dropdown-menu-vertical ant-select-dropdown-menu-root">
               <li role="option" class="ant-select-dropdown-menu-item ant-select-dropdown-menu-item-selected" unselectable="on" style="user-select: none;" aria-selected="true">
                  Nam
               </li>
               <li role="option" class="ant-select-dropdown-menu-item" unselectable="on" style="user-select: none;">
                  Nữ
               </li>
               <li role="option" class="ant-select-dropdown-menu-item" unselectable="on" style="user-select: none;">
                  Khác
               </li>
            </ul>
         </div>
      </div>
   </div>
</div>

<div style="position: absolute; top: 0px; left: 0px; width: 100%;">
   <div>
      <div class="ant-select-dropdown ant-select-dropdown--single ant-select-dropdown-placement-bottomLeft " id="rethunhap" style="width: 350px; left: 20px; top: 478px;display:none">
         <div id="5026bdd4-63f7-49fa-d8c9-2f496500e454" tabindex="-1" class="ant-select-dropdown-content" style="overflow: auto; transform: translateZ(0px);">
            <ul role="listbox" tabindex="0" class="ant-select-dropdown-menu ant-select-dropdown-menu-vertical ant-select-dropdown-menu-root">
               <li role="option" class="ant-select-dropdown-menu-item" unselectable="on" style="user-select: none;">
                  Dưới 5tr
               </li>
               <li role="option" class="ant-select-dropdown-menu-item" unselectable="on" style="user-select: none;">
                  Từ 5 - 10 triệu
               </li>
               <li role="option" class="ant-select-dropdown-menu-item" unselectable="on" style="user-select: none;">
                  Từ 10 - 20 triệu
               </li>
               <li role="option" class="ant-select-dropdown-menu-item" unselectable="on" style="user-select: none;">
                  Trên 20 triệu
               </li>
            </ul>
         </div>
      </div>
   </div>
</div>
<?php require_once("../../public/client/Footer.php"); ?>
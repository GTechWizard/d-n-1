 <!-- dich vu cua ban -->
 <div class=" dvs " id="dvs">
                <h2>dịch vụ đã đăng ký</h2>
                <div class="dv">
                    <ul class="uldvth">
                        <li>stt</li>
                        <li>tên dịch vụ</li>
                        <li>ngày đi</li>
                        <li>ngày kết thúc</li>
                        <li>số người</li>
                        <li>Trạng thái</li>
                        <li>tổng tiền</li>
                        <li>chi tiết</li>
                    </ul>
                    <?php
                            $conn = new user;
                            $id = $_SESSION['id'];
                            //lấy danh sách dịch vụ
                            $list_service = $conn->list_service_user($id);
                            if(isset($list_service)&&$list_service!=''){
                            foreach($list_service as $index=>$dich_vu){
                                //id dể tìm tên dịch vụ từ id dịch vụ trong bảng dv_user

                                $id_dv_user = $dich_vu['id_dv_user'];
                                $service = $conn->name_service_user($id_dv_user);
                                $infor_dv =$service->fetch_assoc();
                                switch ($dich_vu['trang_thai']) {
                                  case 0:
                                    $tthai= "Đang chờ xác nhận";
                                    break;
                                  case 1:
                                    $tthai= "Chưa bắt đầu";
                                    break;
                                  case 2:
                                    $tthai= "Đang trong tour";
                                    break;
                                  case 3:
                                    $tthai= "Hoàn thành tour";
                                    break;
                                  default:
                                }
                                echo'<ul class="uldvtd">
                                        <li>'.($index+1).'</li>
                                        <li>'.$infor_dv['name'].'</li>
                                        <li>'.$infor_dv['day_start'].'</li>
                                        <li>'.$infor_dv['day_end'].'</li>
                                        <li>'.$infor_dv['so_luong_old']+$infor_dv['so_luong_young'].'</li>
                                        <li>'.$tthai.'</li>
                                        <li>'.$infor_dv['so_luong_old']*$infor_dv['price_old']+$infor_dv['so_luong_young']*$infor_dv['price_young'].'</li>
                                        <li><a href="?act=chitietbill&id='.$infor_dv['id_pk_user'].'&iddvu='.$infor_dv['id_dv_user'].'">chi tiết</a></li>
                                    </ul>';
                            }
                          }else{
                            echo'<br><b>Bạn Chưa Đăng Ký Dịch Vụ Nào</b>';
                          }
                    ?>
                </div>
            </div>
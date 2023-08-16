 <!-- baner -->
 <div class="video" data-aos="fade-down">
    <video id="video" src="video/video (2160p).mp4" autoplay muted loop></video>
    <div class="main_bn">
      <div class="main_bn-font">
        <div class="h2-font">
          <h2>wecome to du lịch DCR</h2>
        </div>
        <div class="h1-font">
          <h1>khám phá địa điểm yêu thích của bạn với chúng tôi</h1>
        </div>
        <div class="h3-font">
          <h3>liên hệ với chúng tôi nếu bạn muốn đi du lịch đến những địa điểm mới lạ</h3>
        </div>
      </div>
      <div class="form_find_bn" data-aos="fade-right" data-aos-offset="300" data-aos-easing="ease-in-sine">
        <h2>tìm dịch vụ nhanh</h2>
        <form action="?act=findfast" method="post">
          <div class="form_in">
          <label>Nơi Bắt đầu
            <select name="noi_di" id="noiBatDauSelect">
              <?php 
                $dv= new dv;
                $allDv=$dv->getDvNoiBd();
                while($noi_den=$allDv->fetch_assoc()){
                  echo '<option value="'.$noi_den['noi_bd'].'">'.$noi_den['noi_bd'].'</option>';
                }
              ?>
            </select>
            </label>
            <label for="place">Nơi Đến
            <select name="diem_den" id="diemDenSelect"></select>
            </label>
          </div>
          <input type="submit" name="find" id="find_bn_hr" value="Tìm" />
        </form>
      </div>
    </div>
  </div>
  <script>
document.getElementById("noiBatDauSelect").addEventListener("change", function () {
    var selectedOption = this.value;
    var selectElement = document.getElementById("diemDenSelect");
    fetch("./model/getdiemden.php?noi_bd=" + selectedOption)
        .then(response => response.json())
        .then(data => {
            selectElement.innerHTML = "";
            data.forEach(item => {
                var option = document.createElement("option");
                option.value = item.diem_den;
                option.textContent = item.diem_den;
                selectElement.appendChild(option);
            });
        })
        .catch(error => {
            console.error("Lỗi khi lấy giá trị mới: " + error);
        });
});
  </script>
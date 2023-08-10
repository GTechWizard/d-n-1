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
            <label for="date1">Khoảng Ngày
              <input type="date" name="day_start" id="date1"/>
              <input type="date" name="day_end" id="date1"/>
            </label>
            <label for="place">Nơi đến
              <input type="text" name="diem_den" id="place" placeholder="Nơi đến" />
            </label>
            <label for="giad">Giá Từ
              <input type="number" name="price_start" id="giad" placeholder="1.200.000 VND">
            </label>
            <label for="gian"> Đến Giá
            <input type="number" name="price_end" id="gian" placeholder="12.000.000 VND">
            </label>
          </div>
          <input type="submit" name="find" id="find_bn_hr" value="Tìm" />
        </form>
      </div>
    </div>
  </div>
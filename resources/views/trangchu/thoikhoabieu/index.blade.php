
@extends('trangchu.master')
@section('title', 'Thời Khóa Biểu')
@section('content')
<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Thời Khóa Biểu Sinh Viên</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
<!-- Optional: Add Font Awesome for icons if you want (e.g., for print button) -->
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> -->
<style>
  /* Styles from your original template (adjusted) */
  .banner {
    background-color: #e0f7fa;
    height: 150px; /* Reduced height for better balance */
    display: flex;
    align-items: center;
    justify-content: center;
    color: #006064;
    font-size: 1.8rem;
    font-weight: bold;
    border-bottom: 3px solid #007a7a; /* Added a subtle border */
  }
  .nav-link {
    font-size: 0.9rem;
    padding: 0.25rem 0.5rem;
  }
  .nav-link:hover,
  .nav-link.active {
    background-color: #cce0ff; /* Lighter blue for hover/active */
    color: #004085 !important; /* Darker blue text */
    border-radius: 0.25rem;
  }
  .login-form {
    display: flex;
    align-items: center;
    gap: 0.25rem;
  }
  .login-form button {
    white-space: nowrap;
  }

  /* General Page Styling */
  body {
    background-color: #f8f9fa; /* Light gray background for the whole page */
  }
  main.container {
    background-color: #e0f7fa; /* Original light blue for the main content area */
    padding: 2rem;
    border-radius: 0.5rem;
    margin-top: 2rem; /* Added margin top for separation from header */
    margin-bottom: 2rem; /* Added margin bottom for separation from footer */
    box-shadow: 0 0.3rem 0.75rem rgba(0,0,0,0.1); /* Soft shadow for main container */
  }

  /* TKB Specific Styles */
  .tkb-title {
    color: #005A9C;
    font-weight: bold;
    margin-bottom: 1.5rem; /* Increased margin */
  }

  .tkb-card { /* Custom class for TKB cards */
    border: 1px solid #b8d7fa; /* Light blue border */
    transition: box-shadow .2s ease-in-out;
  }
  .tkb-card:hover {
    box-shadow: 0 0.25rem 0.75rem rgba(0,90,156,0.12); /* Subtle hover shadow */
  }

  .tkb-card .card-header {
    background-color: #d6e9ff; /* Lighter blue header for cards */
    border-bottom: 1px solid #b8d7fa;
    padding-top: 0.75rem;
    padding-bottom: 0.75rem;
  }
  .tkb-card .card-header .card-title {
    color: #005A9C;
    font-size: 1.1rem;
    font-weight: 500;
    margin-bottom: 0;
  }
  .tkb-card .card-body {
    padding: 1.25rem;
  }

  /* Student Info Panel within a card */
  .student-info-panel {
    background-color: #f0f8ff;
    padding: 0.75rem 1rem;
    border-radius: 0.25rem;
    border: 1px dashed #b8d7fa;
    margin-top: 1rem;
  }
  .student-info-panel .student-info-text {
    margin-bottom: 0;
    font-size: 0.9rem; /* Slightly larger for readability */
  }
   .student-info-panel .student-info-text strong {
      color: #005A9C;
   }
   .student-info-panel .student-info-text .label-black {
      color: #343a40; /* Darker for labels */
      font-weight: 500;
   }
   .student-info-panel .student-info-text span:not(.label-black):not(.fw-normal) {
       color: #005A9C; /* Data points in blue */
   }


  /* Table Styles (mostly retained, with minor adjustments if needed) */
  .tkb-header-blue {
    background-color: #6098D1 !important;
    color: white;
    font-weight: bold;
  }
  .tkb-tiet-cell {
    background-color: #6098D1;
    color: white;
    font-weight: bold;
    vertical-align: middle;
    width: 50px;
  }
  .tkb-table {
    border: 1px solid #B0C4DE;
  }
  .tkb-table th, .tkb-table td {
    vertical-align: middle;
    text-align: center;
    font-size: 0.8rem;
    border: 1px solid #B0C4DE;
    padding: 0.3rem;
  }
  .tkb-table .tkb-subject {
    padding: 5px;
    line-height: 1.3;
    font-size: 0.78rem;
    font-weight: normal;
  }
  .tkb-table .tkb-subject small {
    font-size: 0.7rem;
    display: block;
    color: #333;
  }
  .tkb-green { background-color: #D9EAD3 !important; }
  .tkb-yellow { background-color: #FFF2CC !important; }

  .legend-container { padding-top: 5px; }
  .legend-item { display: flex; align-items: center; margin-bottom: 2px; }
  .legend-color-box { width: 14px; height: 14px; display: inline-block; margin-right: 8px; border: 1px solid #999; }
  .legend-green { background-color: #A8D8A8; }
  .legend-purple { background-color: #C5CAE9; }
  .legend-yellow-box { background-color: #FFF9C4; }
  .legend-pink { background-color: #FFCDD2; }
  .legend-text { font-size: 0.75rem; color: #333; }

  .week-nav-buttons .btn { font-size: 0.8rem; padding: 0.25rem 0.5rem; }

  .tkb-detail-table { margin-top: 1rem; }
  .tkb-detail-table th, .tkb-detail-table td { font-size: 0.8rem; vertical-align: middle; padding: 0.4rem; }
  .tkb-detail-table td strong { font-weight: 600; }

  .form-select-sm { font-size: 0.8rem; }
  .btn-outline-secondary { font-size: 0.8rem; } /* Kept for week nav, if not changed */
  .calendar-icon { width: 32px; height: 32px; vertical-align: middle; margin-right: 5px; }
  .select-label { font-weight: bold; font-size: 0.9rem; margin-left: 5px; vertical-align: middle; color: #005A9C; }
  .small-note { font-size: 0.8rem; color: #6c757d; }
</style>
</head>
<body>




<main class="container">
  <h3 class="text-center tkb-title">Thông Tin Thời Khóa Biểu</h3>

  <!-- Selection and Info Card -->
  <div class="card tkb-card shadow-sm mb-4">
    <div class="card-body">
      <!-- Selection Row -->
      <div class="row mb-3 gx-2 gy-2 align-items-center">
        <div class="col-auto d-flex align-items-center">
            <img src="data:image/gif;base64,R0lGODlhFgAWAPAAAISPz////zMzM////////yH5BAEAAAEALAAAAAAWABYAAAIjjI+py+0Po5wH2lsz3Q34r94Z4QgbbiXlnmRZnVMAuL7b8ZJzVEIAOw==" alt="Lịch" class="calendar-icon">
            <span class="select-label">Chọn học kỳ xem TKB</span>
        </div>
        <div class="col-sm-auto col-md-3 col-lg-auto">
            <select class="form-select form-select-sm">
                <option selected>Học kỳ 2 - Năm học 2024-2025</option>
            </select>
        </div>
        <div class="col-sm-auto col-md-2 col-lg-auto">
            <select class="form-select form-select-sm">
                <option selected>TKB theo tuần</option>
            </select>
        </div>
        <div class="col-sm-12 col-md col-lg"> <!-- Adjusted col for better wrapping -->
            <select class="form-select form-select-sm">
                <option selected>Tuần 24 [Từ 10/02/2025 -- Đến 16/02/2025]</option>
            </select>
        </div>
        <div class="col-auto">
            <button type="button" class="btn btn-primary btn-sm"> In TKB</button>
        </div>
      </div>

      <!-- Student Info -->
      <p class="small-note mb-1">(Lưu ý: tuần 21 tương ứng với tuần 1 của học kỳ, bắt đầu từ ngày 20/01/2025) ...</p>
      <div class="student-info-panel">
        <p class="student-info-text">
          <span class="label-black">Mã Số:</span> <span class="fw-normal">DPM215500</span> |
          <span class="label-black">Họ Tên:</span> <strong>Nguyễn Minh Ngọc</strong> |
          <span class="label-black">Ngày sinh:</span> <span>24/11/03</span> <br class="d-sm-none"> <!-- Break on extra small screens -->
          <span class="label-black">Lớp:</span> <span>DH22PM</span> |
          <span class="label-black">Ngành:</span> <span>Kỹ thuật phần mềm</span> |
          <span class="label-black">Khoa:</span> <span>Công nghệ thông tin</span>
        </p>
      </div>
    </div>
  </div>


  <!-- Timetable Grid Card -->
  <div class="card tkb-card shadow-sm mb-4">
    <div class="card-header">
      <h5 class="card-title">Lịch Học Theo Tuần</h5>
    </div>
    <div class="card-body p-2 p-sm-3"> <!-- Less padding for large table -->
      <div class="table-responsive">
        <table class="table table-bordered text-center tkb-table">
            <thead>
                <tr class="tkb-header-blue">
                    <th style="width: 50px;"></th>
                    <th>THỨ HAI</th><th>THỨ BA</th><th>THỨ TƯ</th><th>THỨ NĂM</th>
                    <th>THỨ SÁU</th><th>THỨ BẢY</th><th>CHỦ NHẬT</th>
                    
                </tr>
            </thead>
            <tbody>
                <tr><td class="tkb-tiet-cell">Tiết 1</td><td></td><td></td><td></td><td class="tkb-subject tkb-green" rowspan="3">Hệ thống thông<br>tin địa lý - KTPM<br><small>Phòng: NMT09</small></td><td></td><td></td><td></td><td class="tkb-tiet-cell">Tiết 1</td></tr>

                <tr><td class="tkb-tiet-cell">Tiết 2</td><td></td><td class="tkb-subject tkb-green" rowspan="2">Hệ thống thông<br>tin địa lý - KTPM<br><small>Phòng: ND503</small></td><td class="tkb-subject tkb-yellow" rowspan="2">Phân tích dữ liệu<br>và ứng dụng<br><small>Phòng: NA307</small></td><td class="tkb-subject tkb-yellow" rowspan="2">Điện toán đám mây<br><small>Phòng: NMT07</small></td><td class="tkb-subject tkb-yellow" rowspan="4">Phân tích và thiết kế<br>phần mềm<br>hướng đối tượng<br><small>Phòng: NA109</small></td><td></td><td class="tkb-tiet-cell">Tiết 2</td></tr>

                <tr><td class="tkb-tiet-cell">Tiết 3</td><td></td><td></td><td class="tkb-tiet-cell">Tiết 3</td></tr>
                <tr><td class="tkb-tiet-cell">Tiết 4</td><td></td><td></td><td></td><td class="tkb-subject tkb-yellow" rowspan="2">Nguyên lý hệ<br>điều hành<br><small>Phòng: ND502</small></td><td></td><td></td><td class="tkb-tiet-cell">Tiết 4</td></tr>

                <tr><td class="tkb-tiet-cell">Tiết 5</td><td></td><td></td><td></td><td></td><td></td><td class="tkb-tiet-cell">Tiết 5</td></tr>

                <tr><td class="tkb-tiet-cell">Tiết 6</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td class="tkb-tiet-cell">Tiết 6</td></tr>

                <tr><td class="tkb-tiet-cell">Tiết 7</td><td></td><td class="tkb-subject tkb-yellow" rowspan="3">Phân tích dữ liệu<br>và ứng dụng<br><small>Phòng: NMT08</small>

                </td><td class="tkb-subject tkb-yellow" rowspan="3">Điện toán đám mây<br><small>Phòng: NC303</small></td><td></td><td></td><td class="tkb-subject tkb-green" rowspan="3">Hệ quản trị CSDL<br>Oracle<br><small>Phòng: NMT06</small></td><td class="tkb-subject tkb-green" rowspan="3">Hệ quản trị CSDL<br>Oracle<br><small>Phòng: ND201</small></td><td class="tkb-tiet-cell">Tiết 7</td></tr>

                <tr><td class="tkb-tiet-cell">Tiết 8</td><td></td><td class="tkb-subject tkb-yellow" rowspan="2">Xác suất thống kê<br>A - CNTT<br><small>Phòng: NA202</small></td><td></td><td class="tkb-tiet-cell">Tiết 8</td></tr>
                <tr><td class="tkb-tiet-cell">Tiết 9</td><td></td><td></td><td class="tkb-tiet-cell">Tiết 9</td></tr>
                <tr><td class="tkb-tiet-cell">Tiết 10</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td class="tkb-tiet-cell">Tiết 10</td></tr>
                <tr><td class="tkb-tiet-cell">Tiết 11</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td class="tkb-tiet-cell">Tiết 11</td></tr>
                <tr><td class="tkb-tiet-cell">Tiết 12</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td class="tkb-tiet-cell">Tiết 12</td></tr>
            </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- Legend and Week Navigation Card -->
  <div class="card tkb-card shadow-sm mb-4">
    <div class="card-body">
      <div class="row align-items-start">
        <div class="col-md-7 col-lg-8 legend-container">
            <div class="legend-item"><span class="legend-color-box legend-green"></span><span class="legend-text">Môn học chỉ trùng một vài tiết</span></div>
            <div class="legend-item"><span class="legend-color-box legend-purple"></span><span class="legend-text">Môn học trùng tất cả các tiết</span></div>
            <div class="legend-item"><span class="legend-color-box legend-yellow-box"></span><span class="legend-text">Thời khóa biểu học kỳ cũ</span></div>
            <div class="legend-item"><span class="legend-color-box legend-pink"></span><span class="legend-text">Giảng viên đã đăng ký nghỉ dạy</span></div>
        </div>
        <div class="col-md-5 col-lg-4 text-md-end mt-2 mt-md-0 week-nav-buttons">
            <div class="btn-group btn-group-sm" role="group">
                <button type="button" class="btn btn-outline-secondary">Tuần Đầu</button>
                <button type="button" class="btn btn-outline-secondary">Tuần Trước</button>
                <button type="button" class="btn btn-outline-secondary">Tuần Kế</button>
                <button type="button" class="btn btn-outline-secondary">Tuần Cuối</button>
            </div>
        </div>
      </div>
    </div>
  </div>


  <!-- Detailed Course List Table Card -->
  <div class="card tkb-card shadow-sm mb-4">
    <div class="card-header">
      <h5 class="card-title">Danh Sách Môn Học Chi Tiết</h5>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered table-striped tkb-detail-table">
            <thead>
                <tr class="tkb-header-blue">
                    <th>Môn Học</th><th>Thứ</th><th>Buổi</th><th>TBD</th><th>Số Tiết</th>
                    <th>Phòng Học</th><th>Giảng Viên</th><th>Ngày BD Môn Học</th><th>Ngày KT Môn Học</th>
                </tr>
            </thead>
            <tbody>
                <tr><td><strong><span style="color: orange;">></span> Sinh hoạt chủ nhiệm</strong></td><td>Sáu</td><td>Chiều</td><td>8</td><td>1</td><td>NA302</td><td>Huỳnh Phước Hải</td><td>14/02/2025</td><td>15/02/2025</td></tr>
                <tr><td><strong><span style="color: orange;">></span> Nguyên lý hệ quản trị CSDL</strong></td><td>Tư</td><td>Sáng</td><td>1</td><td>5</td><td>ND303</td><td>Đoàn Thanh Nghị</td><td>22/01/2025</td><td>10/04/2025</td></tr>
            </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- Footer Note -->
  <p class="text-center text-muted fst-italic mt-3" style="font-size:0.9rem;">
    (Dữ liệu được cập nhật vào lúc: 18:55 Ngày: 28/5/2025)
  </p>
</main>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
  document.querySelectorAll('.nav-link').forEach(link => {
    link.addEventListener('click', function(e) {
      document.querySelectorAll('.nav-link').forEach(item => item.classList.remove('active'));
      this.classList.add('active');
    });
  });
</script>

</body>
</html>
@endsection
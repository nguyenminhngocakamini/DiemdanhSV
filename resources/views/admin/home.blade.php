<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Hệ thống điểm danh sinh viên</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="text-center mb-4">
            <h1 class="fw-bold">📚 Hệ thống điểm danh sinh viên</h1>
            <p class="text-muted">Quản lý sinh viên - Điểm danh - Thống kê</p>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-3 mb-3">
                <a href="{{ route('students.index') }}" class="btn btn-primary w-100">📄 Danh sách sinh viên</a>
            </div>
            <div class="col-md-3 mb-3">
                <a href="{{ route('students.create') }}" class="btn btn-success w-100">➕ Thêm sinh viên</a>
            </div>
            <div class="col-md-3 mb-3">
                <a href="{{ route('attendance.index') }}" class="btn btn-warning w-100">✅ Bắt đầu điểm danh</a>
            </div>
            <div class="col-md-3 mb-3">
                <a href="{{ route('statistics.index') }}" class="btn btn-info w-100">📊 Thống kê</a>
            </div>
        </div>
    </div>
</body>
</html>




<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Trang Quản Trị Hệ Thống</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<style>
  body {
    display: flex;
    min-height: 100vh;
    flex-direction: column;
  }
  .admin-wrapper {
    display: flex;
    flex: 1;
  }
  .sidebar {
    width: 250px;
    background-color: #343a40; /* Dark sidebar */
    color: #fff;
    padding-top: 1rem;
    transition: width 0.3s ease;
  }
  .sidebar .nav-link {
    color: #adb5bd;
    padding: 0.75rem 1rem;
    display: flex;
    align-items: center;
  }
  .sidebar .nav-link:hover,
  .sidebar .nav-link.active {
    color: #fff;
    background-color: #495057;
    border-left: 3px solid #0d6efd; /* Active indicator */
  }
  .sidebar .nav-link .fas {
    margin-right: 10px;
    width: 20px; /* Ensure icons align */
  }
  .sidebar-header {
    padding: 0.75rem 1rem;
    font-size: 1.25rem;
    font-weight: bold;
    border-bottom: 1px solid #495057;
    margin-bottom: 1rem;
  }
  .content {
    flex: 1;
    padding: 20px;
    background-color: #f8f9fa;
  }
  .content-header h1 {
    color: #005A9C;
    margin-bottom: 1.5rem;
  }
  .card-custom {
    border: none;
    box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
  }
  .table th {
    background-color: #6098D1; /* Header color from TKB */
    color: white;
  }
  .action-buttons .btn {
      margin-right: 5px;
  }
  .modal-header {
    background-color: #6098D1;
    color: white;
  }
  .modal-header .btn-close {
    filter: invert(1) grayscale(100%) brightness(200%);
  }
  .footer-admin {
    background-color: #e9ecef;
    padding: 1rem;
    text-align: center;
    font-size: 0.9rem;
    color: #6c757d;
    border-top: 1px solid #dee2e6;
  }

  /* Toggle sidebar for smaller screens */
  .sidebar.collapsed {
    width: 60px;
  }
  .sidebar.collapsed .sidebar-header span,
  .sidebar.collapsed .nav-link span {
    display: none;
  }
  .sidebar.collapsed .nav-link .fas {
    margin-right: 0;
  }
  .sidebar.collapsed .sidebar-header .fas {
      font-size: 1.5rem; /* Make icon larger when collapsed */
  }
  #sidebarToggle {
      background-color: #6098D1;
      border: none;
      color: white;
      position: fixed; /* Or absolute to position it inside content */
      top: 15px;
      left: 15px; /* Adjust if sidebar is not collapsed */
      z-index: 1050;
  }
  .sidebar.collapsed + #sidebarToggle {
    /* Adjust toggle button position when sidebar is collapsed */
  }
  @media (max-width: 768px) {
    .sidebar {
        width: 0;
        overflow: hidden;
    }
    .sidebar.collapsed {
        width: 0;
    }
    .content {
        margin-left: 0;
    }
    #sidebarToggle {
        display: block; /* Always show on small screens */
    }
  }
  @media (min-width: 769px) {
    #sidebarToggle {
        display: none; /* Hide on larger screens if sidebar is always visible */
    }
  }

</style>
</head>
<body>

<div class="admin-wrapper">
  <!-- Sidebar -->
  <nav id="sidebar" class="sidebar">
    <div class="sidebar-header">
      <i class="fas fa-user-shield"></i> <span>Admin Panel</span>
    </div>
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link active" href="#tkbManagement" data-bs-toggle="tab" data-bs-target="#tkbManagement">
          <i class="fas fa-calendar-alt"></i> <span>Quản Lý Môn Học</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#attendanceManagement" data-bs-toggle="tab" data-bs-target="#attendanceManagement">
          <i class="fas fa-user-check"></i> <span>Quản Lý Điểm Danh</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#studentManagement" data-bs-toggle="tab" data-bs-target="#studentManagement">
          <i class="fas fa-users"></i> <span>Quản Lý Sinh Viên</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#lecturerManagement" data-bs-toggle="tab" data-bs-target="#lecturerManagement">
          <i class="fas fa-chalkboard-teacher"></i> <span>Quản Lý Giảng Viên</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">
          <i class="fas fa-cog"></i> <span>Cài Đặt</span>
        </a>
      </li>
      <li class="nav-item mt-auto mb-3">
        <a class="nav-link" href="#">
          <i class="fas fa-sign-out-alt"></i> <span>Đăng Xuất</span>
        </a>
      </li>
    </ul>
  </nav>

  <!-- Page Content -->
  <div id="content" class="content">
    <button id="sidebarToggle" class="btn btn-primary d-md-none mb-3"><i class="fas fa-bars"></i></button>
    <div class="tab-content">
      <!-- Thời Khóa Biểu Management -->
      <div class="tab-pane fade show active" id="tkbManagement" role="tabpanel">
        <div class="content-header">
          <h1>Quản Lý Môn Học</h1>
        </div>
        <div class="card card-custom">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
              <input type="text" class="form-control w-50" placeholder="Tìm kiếm môn học, giảng viên...">
              <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addTKBModal">
                <i class="fas fa-plus"></i> Thêm Mới Lịch Học
              </button>
            </div>
            <div class="table-responsive">
              <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>Mã MH</th>
                    <th>Tên Môn Học</th>
                    <th>Giảng Viên</th>
                    <th>Ngày</th>
                    <th>Tiết (BĐ-KT)</th>
                    <th>Phòng</th>
                    <th>Học Kỳ</th>
                    <th>Hành Động</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>CSDL01</td>
                    <td>Nguyên lý hệ quản trị CSDL</td>
                    <td>Đoàn Thanh Nghị</td>
                    <td>23/05/2025</td>
                    <td>1-5</td>
                    <td>ND303</td>
                    <td>HK2 (2024-2025)</td>
                    <td class="action-buttons">
                      <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editTKBModal"><i class="fas fa-edit"></i> Sửa</button>
                      <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Xóa</button>
                    </td>
                  </tr>
                  <tr>
                    <td>PTDL01</td>
                    <td>Phân tích dữ liệu và ứng dụng</td>
                    <td>Nguyễn Văn A</td>
                    <td>23/05/2025</td>
                    <td>7-9</td>
                    <td>NMT08</td>
                    <td>HK2 (2024-2025)</td>
                    <td class="action-buttons">
                      <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editTKBModal"><i class="fas fa-edit"></i> Sửa</button>
                      <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Xóa</button>
                    </td>
                  </tr>
                  <!-- More rows -->
                </tbody>
              </table>
            </div>
            <nav aria-label="Page navigation">
              <ul class="pagination justify-content-center">
                <li class="page-item disabled"><a class="page-link" href="#">Trước</a></li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">Sau</a></li>
              </ul>
            </nav>
          </div>
        </div>
      </div>

      <!-- Điểm Danh Management -->
      <div class="tab-pane fade" id="attendanceManagement" role="tabpanel">
        <div class="content-header">
          <h1>Quản Lý Điểm Danh</h1>
        </div>
        <div class="card card-custom">
          <div class="card-body">
            <div class="row mb-3 g-2">
              <div class="col-md-3">
                <input type="date" class="form-control" value="{{ date('Y-m-d') }}">
              </div>
              <div class="col-md-3">
                <select class="form-select">
                  <option selected>Chọn Môn Học...</option>
                  <option>Nguyên lý hệ quản trị CSDL</option>
                  <option>Phân tích dữ liệu và ứng dụng</option>
                </select>
              </div>
              <div class="col-md-3">
                <button class="btn btn-primary w-100"><i class="fas fa-search"></i> Lọc Dữ Liệu</button>
              </div>
            </div>
            <div class="content-header">
</div>


<!-- Danh sách môn học hôm nay -->
<div class="card mb-3">
  <div class="card-body">
    <h4>Môn học hôm nay:</h4>
    <ul>
      @foreach ($courses as $course)
        <li>
          <a href="#attendanceForm_{{ $course->_id }}" class="attendance-link">{{ $course->name }}</a>
        </li>
      @endforeach
    </ul>
  </div>
</div>

<!-- Các form điểm danh ẩn -->
@foreach ($courses as $course)
  <div id="attendanceForm_{{ $course->_id }}" class="attendance-form" style="display: none;">
    <h4>Điểm danh cho: {{ $course->name }}</h4>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>#</th>
          <th>Họ tên</th>
          <th>Lớp</th>
          <th>Giới tính</th>
          <th>Điểm danh</th>
        </tr>
      </thead>
      <tbody>
        @foreach (is_array($course->students) || is_object($course->students) ? $course->students : [] as $index => $student)
 
          <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $student->full_name }}</td>
            <td>{{ $student->class_id }}</td>
            <td>{{ $student->gender }}</td>
            <td>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio"
                       name="attendances[{{ $student->_id }}]"
                       id="present_{{ $student->_id }}"
                       value="Có mặt">
                <label class="form-check-label" for="present_{{ $student->_id }}">Có mặt</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio"
                       name="attendances[{{ $student->_id }}]"
                       id="absent_{{ $student->_id }}"
                       value="Vắng">
                <label class="form-check-label" for="absent_{{ $student->_id }}">Vắng</label>
              </div>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endforeach
<script>

  <script>
  document.addEventListener('DOMContentLoaded', function() {
    const links = document.querySelectorAll('.attendance-link');
    const forms = document.querySelectorAll('.attendance-form');

    links.forEach(link => {
      link.addEventListener('click', function(e) {
        e.preventDefault();
        const targetId = this.getAttribute('href').substring(1);

        // Ẩn tất cả form trước
        forms.forEach(form => form.style.display = 'none');

        // Hiển thị form được chọn
        document.getElementById(targetId).style.display = 'block';

        // Cuộn tới form
        document.getElementById(targetId).scrollIntoView({ behavior: 'smooth' });
      });
    });
  });
</script>

</script>
            <nav aria-label="Page navigation">
              <ul class="pagination justify-content-center">
                <li class="page-item disabled"><a class="page-link" href="#">Trước</a></li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">Sau</a></li>
              </ul>
            </nav>
          </div>
        </div>
      </div>

      <!-- Student Management (Placeholder) -->
       <div class="tab-pane fade" id="studentManagement" role="tabpanel">
           
        <div class="content-header">
          <h1>Quản Lý Sinh Viên</h1>
        </div>
         
        <div class="card card-custom">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
              <input type="text" class="form-control w-50" placeholder="Tìm kiếm Sinh Viên...">
              <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addStudent">
                <i class="fas fa-plus"></i> Thêm Mới Sinh Viên
              </button>
            </div>
           
            <div class="table-responsive">
              <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>MSSV</th>
                    <th>Họ Tên SV</th>
                    <th>Lớp</th>
                    <th>Giới tính</th>
                    <th>Ngày sinh</th>
                    <th>Thao tác</th>
                  
                  </tr>
                </thead>
                <tbody>
    @forelse ($students as $student)
        <tr>
            <td>{{ $student->student_code }}</td>
            <td>{{ $student->full_name }}</td>
            <td>{{ $student->class_id }}</td>
            <td>{{ $student->gender }}</td>
            <td>{{ $student->dob }}</td>
            <td>
                <a href="#" 
                   class="btn btn-primary btn-sm btn-edit" 
                   data-id="{{ $student->_id }}"
                   data-student_code="{{ $student->student_code }}"
                   data-full_name="{{ $student->full_name }}"
                   data-class_id="{{ $student->class_id }}"
                   data-gender="{{ $student->gender }}"
                   data-dob="{{ $student->dob }}"
                   data-bs-toggle="modal"
                   data-bs-target="#editStudent">
                   Sửa
                </a>

                <form action="{{ route('students.destroy', $student->_id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Bạn có chắc muốn xóa?');">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">Xóa</button>
                </form>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="6" class="text-center">Chưa có sinh viên nào.</td>
        </tr>
    @endforelse
</tbody>

              </table>
            </div>
            <nav aria-label="Page navigation">
              <ul class="pagination justify-content-center">
                <li class="page-item disabled"><a class="page-link" href="#">Trước</a></li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">Sau</a></li>
              </ul>
            </nav>
          </div>
        </div>
  
          
      </div>



<!-- Add Student Modal -->
 <!-- Edit Student Modal -->
<div class="modal fade" id="editStudent" tabindex="-1" aria-labelledby="editStudentLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editStudentLabel">Chỉnh sửa Sinh Viên</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Đóng"></button>
      </div>
      <div class="modal-body">
        <form id="editStudentForm" method="POST" action="">
          @csrf
          @method('PUT')
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="edit_student_code" class="form-label">Mã SV</label>
              <input type="text" class="form-control" id="edit_student_code" name="student_code" required>
            </div>
            <div class="col-md-6 mb-3">
              <label for="edit_full_name" class="form-label">Họ tên</label>
              <input type="text" class="form-control" id="edit_full_name" name="full_name" required>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="edit_class_id" class="form-label">Lớp</label>
              <input type="text" class="form-control" id="edit_class_id" name="class_id" required>
            </div>
            <div class="col-md-6 mb-3">
              <label for="edit_gender" class="form-label">Giới tính</label>
              <select class="form-select" id="edit_gender" name="gender" required>
                <option value="">Chọn giới tính...</option>
                <option value="Nam">Nam</option>
                <option value="Nữ">Nữ</option>
                <option value="Khác">Khác</option>
              </select>
            </div>
          </div>
          <div class="mb-3">
            <label for="edit_dob" class="form-label">Ngày sinh</label>
            <input type="date" class="form-control" id="edit_dob" name="dob" required>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
        <button type="submit" form="editStudentForm" class="btn btn-primary">Lưu Thay Đổi</button>
      </div>
    </div>
  </div>
</div>

<!-- Add/Edit Student Modal -->
<div class="modal fade" id="addStudent" tabindex="-1" aria-labelledby="addStudentLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addStudentLabel">Thêm Mới Sinh Viên</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="studentForm"  method="POST" action="{{ route('students.store') }}">
             @csrf
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="student_code" class="form-label">Mã SV</label>
              <input type="text" class="form-control" id="student_code" name="student_code" required>
            </div>
            <div class="col-md-6 mb-3">
              <label for="full_name" class="form-label">Họ tên</label>
              <input type="text" class="form-control" id="full_name" name="full_name" required>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="class_id" class="form-label">Lớp</label>
              <input type="text" class="form-control" id="class_id" name="class_id" required>
            </div>
            <div class="col-md-6 mb-3">
              <label for="gender" class="form-label">Giới tính</label>
              <select class="form-select" id="gender" name="gender" required>
                <option value="" selected>Chọn giới tính...</option>
                <option value="Nam">Nam</option>
                <option value="Nữ">Nữ</option>
                <option value="Khác">Khác</option>
              </select>
            </div>
          </div>
          <div class="mb-3">
            <label for="dob" class="form-label">Ngày sinh</label>
            <input type="date" class="form-control" id="dob" name="dob" required>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
        <button type="submit" form="studentForm" class="btn btn-primary">Lưu Thay Đổi</button>
      </div>
    </div>
  </div>
</div>

<!------------->

      <!-- Lecturer Management (Placeholder) -->
      <div class="tab-pane fade" id="lecturerManagement" role="tabpanel">
          <div class="content-header"><h1>Quản Lý Giảng Viên</h1></div>
          <p>Chức năng đang được phát triển...</p>
      </div>

    </div>
  </div>
</div>
<footer class="footer-admin">
    © 2025 - Hệ Thống Quản Lý Sinh Viên.
</footer>

<!-- Add/Edit TKB Modal -->
<div class="modal fade" id="addTKBModal" tabindex="-1" aria-labelledby="addTKBModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addTKBModalLabel">Thêm Mới Lịch Học</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="courseId" class="form-label">Mã Môn Học</label>
              <input type="text" class="form-control" id="courseId" required>
            </div>
            <div class="col-md-6 mb-3">
              <label for="courseName" class="form-label">Tên Môn Học</label>
              <input type="text" class="form-control" id="courseName" required>
            </div>
          </div>
          <div class="mb-3">
            <label for="lecturer" class="form-label">Giảng Viên</label>
            <select class="form-select" id="lecturer">
              <option selected>Chọn giảng viên...</option>
              <option>Đoàn Thanh Nghị</option>
              <option>Nguyễn Văn A</option>
              <option>Trần Thị B</option>
            </select>
          </div>
          <div class="row">
            <div class="col-md-4 mb-3">
              <label for="dayOfWeek" class="form-label">Thứ</label>
              <select class="form-select" id="dayOfWeek">
                <option>Thứ Hai</option> <option>Thứ Ba</option> <option>Thứ Tư</option>
                <option>Thứ Năm</option> <option>Thứ Sáu</option> <option>Thứ Bảy</option>
              </select>
            </div>
            <div class="col-md-4 mb-3">
              <label for="startPeriod" class="form-label">Tiết Bắt Đầu</label>
              <input type="number" class="form-control" id="startPeriod" min="1" max="12">
            </div>
            <div class="col-md-4 mb-3">
              <label for="endPeriod" class="form-label">Tiết Kết Thúc</label>
              <input type="number" class="form-control" id="endPeriod" min="1" max="12">
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="room" class="form-label">Phòng Học</label>
              <input type="text" class="form-control" id="room">
            </div>
            <div class="col-md-6 mb-3">
              <label for="semester" class="form-label">Học Kỳ</label>
              <input type="text" class="form-control" id="semester" placeholder="VD: HK2 (2024-2025)">
            </div>
          </div>
           <div class="row">
            <div class="col-md-6 mb-3">
              <label for="startDate" class="form-label">Ngày Bắt Đầu Môn Học</label>
              <input type="date" class="form-control" id="startDate">
            </div>
            <div class="col-md-6 mb-3">
              <label for="endDate" class="form-label">Ngày Kết Thúc Môn Học</label>
              <input type="date" class="form-control" id="endDate">
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
        <button type="button" class="btn btn-primary">Lưu Thay Đổi</button>
      </div>
    </div>
  </div>
</div>

<!-- Edit TKB Modal (Similar structure to Add) -->
<div class="modal fade" id="editTKBModal" tabindex="-1" aria-labelledby="editTKBModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editTKBModalLabel">Chỉnh Sửa Lịch Học</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Form fields pre-filled with data for editing -->
        <p>Nội dung form chỉnh sửa tương tự form thêm mới, có dữ liệu được tải sẵn.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
        <button type="button" class="btn btn-primary">Cập Nhật</button>
      </div>
    </div>
  </div>
</div>


<!-- Edit Attendance Modal -->
<div class="modal fade" id="editAttendanceModal" tabindex="-1" aria-labelledby="editAttendanceModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editAttendanceModalLabel">Chỉnh Sửa Điểm Danh</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="mb-3">
            <label class="form-label">Sinh Viên:</label>
            <p><strong>Nguyễn Minh Ngọc (DPM215500)</strong></p>
          </div>
          <div class="mb-3">
            <label class="form-label">Môn Học:</label>
            <p><strong>Phân tích dữ liệu và ứng dụng</strong></p>
          </div>
           <div class="mb-3">
            <label class="form-label">Ngày:</label>
            <p><strong>12/02/2025</strong></p>
          </div>
          <div class="mb-3">
            <label for="attendanceStatus" class="form-label">Trạng Thái</label>
            <select class="form-select" id="attendanceStatus">
              <option value="present">Có Mặt</option>
              <option value="absent_unexcused">Vắng (Không Phép)</option>
              <option value="absent_excused">Vắng (Có Phép)</option>
              <option value="late">Đi Trễ</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="attendanceNotes" class="form-label">Ghi Chú (nếu có)</label>
            <textarea class="form-control" id="attendanceNotes" rows="2"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
        <button type="button" class="btn btn-primary">Lưu Thay Đổi</button>
      </div>
    </div>
  </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function () {
  // chọn tất cả nút sửa
  const editButtons = document.querySelectorAll('.btn-edit');

  editButtons.forEach(button => {
    button.addEventListener('click', function () {
      // Lấy dữ liệu từ data-attributes
      const id = this.dataset.id;
      const studentCode = this.dataset.student_code;
      const fullName = this.dataset.full_name;
      const classId = this.dataset.class_id;
      const gender = this.dataset.gender;
      const dob = this.dataset.dob;

      // Điền dữ liệu vào form trong modal sửa
      document.getElementById('edit_student_code').value = studentCode;
      document.getElementById('edit_full_name').value = fullName;
      document.getElementById('edit_class_id').value = classId;
      document.getElementById('edit_gender').value = gender;
      document.getElementById('edit_dob').value = dob;

      // Cập nhật action form cho đúng route update
      document.getElementById('editStudentForm').action = `/students/${id}`;
    });
  });
});

</script>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>



</body>
</html>

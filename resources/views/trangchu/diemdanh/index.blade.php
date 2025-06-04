@extends('trangchu.master')
@section('title', 'Điểm Danh')
@section('content')
<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Điểm Danh Sinh Viên</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<style>
  /* Styles from your original template */
  .banner {
    background-color: #e0f7fa;
    height: 150px; /* Adjusted height for different pages */
    display: flex;
    align-items: center;
    justify-content: center;
    color: #006064;
    font-size: 1.8rem;
    font-weight: bold;
  }
  .nav-link {
    font-size: 0.9rem;
    padding: 0.25rem 0.5rem;
  }
  .nav-link:hover,
  .nav-link.active {
    background-color: #e0f7fa;
    color: #006064 !important;
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

  /* Styles for Điểm Danh Page */
  .attendance-title {
    color: #005A9C; /* Dark blue for main title */
    font-weight: bold;
    margin-bottom: 1rem;
  }
  .current-date-display {
    font-size: 1.2rem;
    font-weight: 500;
    color: #333;
    margin-bottom: 1.5rem;
    text-align: center;
  }
  .attendance-table th {
    background-color: #6098D1 !important; /* Medium-light blue for table headers */
    color: white;
    font-weight: bold;
    text-align: center;
    vertical-align: middle;
  }
  .attendance-table td {
    vertical-align: middle;
    text-align: center;
    font-size: 0.9rem;
  }
  .attendance-table .subject-name {
    font-weight: 500;
    text-align: left;
  }
  .attendance-table .time-slot,
  .attendance-table .room-slot {
    font-size: 0.85rem;
    color: #555;
  }
  .status-badge {
    font-size: 0.8rem;
    padding: 0.4em 0.7em;
  }
  .action-buttons .btn {
    margin: 0 2px;
    font-size: 0.85rem;
    padding: 0.3rem 0.6rem;
  }
  .timestamp {
    font-size: 0.75rem;
    color: #777;
    display: block;
    margin-top: 3px;
  }
</style>
</head>
<body>



<main class="container my-4">
  <h3 class="text-center attendance-title">Điểm Danh Hôm Nay</h3>
  <div class="current-date-display">
    <i class="fas fa-calendar-alt"></i> Ngày: <span id="currentDate"></span>
  </div>

  <div class="table-responsive">
    <table class="table table-bordered table-striped attendance-table">
      <thead>
        <tr>
          <th>Môn Học</th>
          <th>Thời Gian</th>
          <th>Phòng Học</th>
          <th>Trạng Thái</th>
          <th>Hành Động</th>
        </tr>
      </thead>
      <tbody id="attendanceBody">
        <!-- Rows will be dynamically added here by JavaScript or hardcoded for example -->
        <tr data-subject-id="PTDLUD">
          <td class="subject-name">Phân tích dữ liệu và ứng dụng</td>
          <td class="time-slot">Tiết 1-3 (07:00 - 09:30)</td>
          <td class="room-slot">NA307</td>
          <td class="status-cell">
            <span class="badge bg-secondary status-badge">Chưa điểm danh</span>
            <small class="timestamp"></small>
          </td>
          <td class="action-buttons">
            <button class="btn btn-success btn-sm checkin-btn"><i class="fas fa-sign-in-alt"></i> Check-in</button>
            <button class="btn btn-warning btn-sm checkout-btn" style="display: none;"><i class="fas fa-sign-out-alt"></i> Check-out</button>
          </td>
        </tr>
        <tr data-subject-id="NMLTWEB">
          <td class="subject-name">Nguyên lý hệ điều hành</td>
          <td class="time-slot">Tiết 4-5 (09:40 - 11:15)</td>
          <td class="room-slot">ND502</td>
          <td class="status-cell">
            <span class="badge bg-secondary status-badge">Chưa điểm danh</span>
            <small class="timestamp"></small>
          </td>
          <td class="action-buttons">
            <button class="btn btn-success btn-sm checkin-btn"><i class="fas fa-sign-in-alt"></i> Check-in</button>
            <button class="btn btn-warning btn-sm checkout-btn" style="display: none;"><i class="fas fa-sign-out-alt"></i> Check-out</button>
          </td>
        </tr>
         <tr data-subject-id="DTDM">
          <td class="subject-name">Điện toán đám mây</td>
          <td class="time-slot">Tiết 7-9 (13:00 - 15:30)</td>
          <td class="room-slot">NC303</td>
          <td class="status-cell">
            <span class="badge bg-secondary status-badge">Chưa điểm danh</span>
            <small class="timestamp"></small>
          </td>
          <td class="action-buttons">
            <button class="btn btn-success btn-sm checkin-btn"><i class="fas fa-sign-in-alt"></i> Check-in</button>
            <button class="btn btn-warning btn-sm checkout-btn" style="display: none;"><i class="fas fa-sign-out-alt"></i> Check-out</button>
          </td>
        </tr>
        <!-- Add more subjects scheduled for today if needed -->
      </tbody>
    </table>
  </div>

  <div class="alert alert-info mt-4" role="alert">
    <i class="fas fa-info-circle"></i>
    <strong>Lưu ý:</strong> Bạn chỉ có thể check-in trong khoảng thời gian diễn ra môn học. Sau khi check-in, nút check-out sẽ xuất hiện.
  </div>

</main>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
  // Function to get current time in HH:MM:SS format
  function getCurrentTime() {
    const now = new Date();
    const hours = String(now.getHours()).padStart(2, '0');
    const minutes = String(now.getMinutes()).padStart(2, '0');
    const seconds = String(now.getSeconds()).padStart(2, '0');
    return `${hours}:${minutes}:${seconds}`;
  }

  // Set current date
  document.addEventListener('DOMContentLoaded', function() {
    const today = new Date();
    const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
    document.getElementById('currentDate').textContent = today.toLocaleDateString('vi-VN', options);

    // Attach event listeners to all check-in buttons
    document.querySelectorAll('.checkin-btn').forEach(button => {
      button.addEventListener('click', function() {
        const row = this.closest('tr');
        const statusCell = row.querySelector('.status-cell');
        const statusBadge = statusCell.querySelector('.status-badge');
        const timestamp = statusCell.querySelector('.timestamp');
        const checkoutButton = row.querySelector('.checkout-btn');

        statusBadge.textContent = 'Đã Check-in';
        statusBadge.classList.remove('bg-secondary', 'bg-danger');
        statusBadge.classList.add('bg-success');
        timestamp.textContent = `Vào lúc: ${getCurrentTime()}`;

        this.style.display = 'none'; // Hide check-in button
        checkoutButton.style.display = 'inline-block'; // Show check-out button
        checkoutButton.disabled = false; // Ensure check-out is enabled
      });
    });

    // Attach event listeners to all check-out buttons
    document.querySelectorAll('.checkout-btn').forEach(button => {
      button.addEventListener('click', function() {
        const row = this.closest('tr');
        const statusCell = row.querySelector('.status-cell');
        const statusBadge = statusCell.querySelector('.status-badge');
        const timestamp = statusCell.querySelector('.timestamp');

        statusBadge.textContent = 'Đã Check-out';
        statusBadge.classList.remove('bg-success');
        statusBadge.classList.add('bg-warning'); // Or some other color for checked-out
        timestamp.textContent += ` | Ra lúc: ${getCurrentTime()}`;

        this.disabled = true; // Disable check-out button after use
        // Optionally, you could also hide the check-out button or show a "Completed" message
      });
    });
  });

  // For Navbar active state
  document.querySelectorAll('.nav-link').forEach(link => {
    link.addEventListener('click', function(e) {
      // e.preventDefault(); // Keep if navigation is JS handled
      document.querySelectorAll('.nav-link').forEach(item => item.classList.remove('active'));
      this.classList.add('active');
    });
  });
</script>

</body>
</html>
@endsection
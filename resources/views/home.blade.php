<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{ url('/') }}">Trang chủ</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">

        <!-- Dashboard links -->
        <li class="nav-item">
          <a class="nav-link" href="{{ route('dashboard.students.index') }}">Quản lý sinh viên</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="{{ route('dashboard.courses.index') }}">Quản lý khóa học</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="{{ route('dashboard.attendances.index') }}">Quản lý điểm danh</a>
        </li>

      </ul>
    </div>
  </div>
</nav>

</body>
</html>
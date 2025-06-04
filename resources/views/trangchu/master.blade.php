<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>@yield('title')</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
<style>
  .banner {
    background-color: #e0f7fa;
    height: 200px;
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
  /* Hover và active cùng style */
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
  /* Đảm bảo nút không xuống hàng và chữ không chia 2 dòng */
  .login-form button {
    white-space: nowrap;
  }
</style>
</head>
<body>

<div class="banner">
  Trang thời khóa biểu và điểm danh sinh viên
</div>

<header class="bg-primary text-white py-2">
  <div class="container d-flex justify-content-between align-items-center">
    <nav class="d-flex gap-2">
      <a href="\" class="nav-link text-white text-decoration-none fw-semibold {{ request()->routeIs('home') ? 'active' : '' }}">Trang chủ</a>
      <a href="{{ route('pages', ['group' => 'thoikhoabieu', 'page' => 'index']) }}" class="nav-link text-white text-decoration-none fw-semibold {{ request()->is('thoikhoabieu/index') ? 'active' : '' }}">Thời Khóa Biểu</a>
      <a href="{{ route('pages', ['group' => 'diemdanh', 'page' => 'index']) }}" class="nav-link text-white text-decoration-none fw-semibold">Điểm Danh</a>
    </nav>
    <form class="login-form">
      <input type="text" class="form-control form-control-sm" placeholder="Tài khoản" />
      <input type="password" class="form-control form-control-sm" placeholder="Mật khẩu" />
      <button type="submit" class="btn btn-light btn-sm fw-semibold">Đăng nhập</button>
    </form>
  </div>
</header>

<main class="container my-4">
  @yield('content')
    
</main>

<footer class="bg-dark text-white text-center py-2">
  &copy; 2025 - Trang chủ của bạn. Mọi quyền được bảo lưu.
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Bỏ đoạn JS gây chặn click -->
</body>
</html>


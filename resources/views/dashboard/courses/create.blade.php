@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Thêm môn học</h1>
    <form action="{{ route('dashboard.courses.store') }}" method="POST">
        @csrf
        <div>
            <label>Mã môn học:</label>
            <input type="text" name="course_code" required>
        </div>
        <div>
            <label>Tên môn:</label>
            <input type="text" name="name" required>
        </div>
        <div>
            <label>Giảng viên:</label>
            <input type="text" name="lecturer">
        </div>
        <div>
            <label>Ngày học:</label>
            <input type="date" name="date">
        </div>
        <div>
            <label>Tiết bắt đầu:</label>
            <input type="text" name="start_period">
        </div>
        <div>
            <label>Tiết kết thúc:</label>
            <input type="text" name="end_period">
        </div>
        <div>
            <label>Phòng:</label>
            <input type="text" name="room">
        </div>
        <div>
            <label>Học kỳ:</label>
            <input type="text" name="semester">
        </div>
        <button type="submit">Thêm</button>
    </form>
</div>
@endsection

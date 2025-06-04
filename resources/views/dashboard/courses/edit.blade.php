@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Cập nhật môn học</h1>
    <form action="{{ route('dashboard.courses.update', $course->_id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label>Mã môn học:</label>
            <input type="text" name="course_code" value="{{ $course->course_code }}" required>
        </div>
        <div>
            <label>Tên môn:</label>
            <input type="text" name="name" value="{{ $course->name }}" required>
        </div>
        <div>
            <label>Giảng viên:</label>
            <input type="text" name="lecturer" value="{{ $course->lecturer }}">
        </div>
        <div>
            <label>Ngày học:</label>
            <input type="date" name="date" value="{{ $course->date }}">
        </div>
        <div>
            <label>Tiết bắt đầu:</label>
            <input type="text" name="start_period" value="{{ $course->start_period }}">
        </div>
        <div>
            <label>Tiết kết thúc:</label>
            <input type="text" name="end_period" value="{{ $course->end_period }}">
        </div>
        <div>
            <label>Phòng:</label>
            <input type="text" name="room" value="{{ $course->room }}">
        </div>
        <div>
            <label>Học kỳ:</label>
            <input type="text" name="semester" value="{{ $course->semester }}">
        </div>
        <button type="submit">Cập nhật</button>
    </form>
</div>
@endsection

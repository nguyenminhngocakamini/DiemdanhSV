@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Thêm sinh viên</h1>
    <form action="{{ route('dashboard.students.store') }}" method="POST">
        @csrf
        <div>
            <label>Mã sinh viên:</label>
            <input type="text" name="student_code" required>
        </div>
        <div>
            <label>Họ tên:</label>
            <input type="text" name="full_name" required>
        </div>
        <div>
            <label>Lớp:</label>
            <input type="text" name="class_id">
        </div>
        <div>
            <label>Giới tính:</label>
            <select name="gender">
                <option value="Nam">Nam</option>
                <option value="Nữ">Nữ</option>
            </select>
        </div>
        <div>
            <label>Ngày sinh:</label>
            <input type="date" name="dob">
        </div>
        <button type="submit">Thêm</button>
    </form>
</div>
@endsection

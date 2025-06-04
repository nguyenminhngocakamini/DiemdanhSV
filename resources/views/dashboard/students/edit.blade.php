@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Cập nhật sinh viên</h1>
    <form action="{{ route('dashboard.students.update', $student->_id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label>Mã sinh viên:</label>
            <input type="text" name="student_code" value="{{ $student->student_code }}" required>
        </div>
        <div>
            <label>Họ tên:</label>
            <input type="text" name="full_name" value="{{ $student->full_name }}" required>
        </div>
        <div>
            <label>Lớp:</label>
            <input type="text" name="class_id" value="{{ $student->class_id }}">
        </div>
        <div>
            <label>Giới tính:</label>
            <select name="gender">
                <option value="Nam" {{ $student->gender == 'Nam' ? 'selected' : '' }}>Nam</option>
                <option value="Nữ" {{ $student->gender == 'Nữ' ? 'selected' : '' }}>Nữ</option>
            </select>
        </div>
        <div>
            <label>Ngày sinh:</label>
            <input type="date" name="dob" value="{{ $student->dob }}">
        </div>
        <button type="submit">Cập nhật</button>
    </form>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">✏️ Chỉnh sửa sinh viên</h2>

    <form method="POST" action="{{ route('students.update', $student->_id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Mã sinh viên</label>
            <input type="text" name="student_code" value="{{ $student->student_code }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Họ và tên</label>
            <input type="text" name="full_name" value="{{ $student->full_name }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Lớp</label>
            <input type="text" name="class_id" value="{{ $student->class_id }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Giới tính</label>
            <select name="gender" class="form-control" required>
                <option value="Nam" {{ $student->gender == 'Nam' ? 'selected' : '' }}>Nam</option>
                <option value="Nữ" {{ $student->gender == 'Nữ' ? 'selected' : '' }}>Nữ</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Ngày sinh</label>
            <input type="date" name="dob" value="{{ $student->dob }}" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Lưu thay đổi</button>
        <a href="{{ route('students.index') }}" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
@endsection

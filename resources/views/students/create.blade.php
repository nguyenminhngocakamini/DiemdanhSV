
@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">➕ Thêm sinh viên mới</h2>
    
    <form method="POST" action="{{ route('students.store') }}">
        @csrf
        <div class="mb-3">
            <label>Mã sinh viên</label>
            <input type="text" name="student_code" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Họ và tên</label>
            <input type="text" name="full_name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Lớp</label>
            <input type="text" name="class_id" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Giới tính : </label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="genderMale" value="Nam" {{ old('gender') == 'Nam' ? 'checked' : '' }} required>
                <label class="form-check-label" for="genderMale">Nam</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="genderFemale" value="Nữ" {{ old('gender') == 'Nữ' ? 'checked' : '' }} required>
                <label class="form-check-label" for="genderFemale">Nữ</label>
            </div>

        </div>
        <div class="mb-3">
            <label>Ngày sinh</label>
            <input type="date" name="dob" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Lưu</button>
        <a href="{{ route('students.index') }}"  class="btn btn-warning">Quay lại</a>
        <a href="{{ route('home') }}" class="btn btn-secondary">Quay về trang chủ </a>
        
    </form>

</div>

@endsection
@extends('layouts.app')
@section('title', 'Danh sách sinh viên')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">📄 Danh sách sinh viên</h2>
    <div class="mb-3">
        <a href="{{ route('students.create') }}" class="btn btn-success">➕ Thêm sinh viên mới</a>
    <table class="table table-bordered">
        <thead class="table-light">
            <tr>
                <th>Mã SV</th>
                <th>Họ tên</th>
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
                        <a href="{{ route('students.edit', $student->_id) }}" class="btn btn-primary btn-sm">Sửa</a>
                        <form action="{{ route('students.destroy', $student->_id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Bạn có chắc muốn xóa?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Xóa</button>
                        </form>
                    </td>

                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Chưa có sinh viên nào.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <a href="{{ route('home') }}" class="btn btn-secondary">Quay lại trang chủ</a>
    <a href="{{ route('attendance.index') }}" class="btn btn-info">Điểm danh sinh viên</a>
    <a href="{{ route('statistics.index') }}" class="btn btn-warning">Xem thống kê</a>
    
</div>
@endsection

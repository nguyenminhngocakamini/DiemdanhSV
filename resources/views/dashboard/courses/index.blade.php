@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Danh sách môn học</h1>
    <a href="{{ route('dashboard.courses.create') }}" class="btn btn-primary mb-2">Thêm môn học</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Mã môn</th>
                <th>Tên môn</th>
                <th>Giảng viên</th>
                <th>Ngày học</th>
                <th>Tiết bắt đầu</th>
                <th>Tiết kết thúc</th>
                <th>Phòng</th>
                <th>Học kỳ</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($courses as $course)
                <tr>
                    <td>{{ $course->course_code }}</td>
                    <td>{{ $course->name }}</td>
                    <td>{{ $course->lecturer }}</td>
                    <td>{{ $course->date }}</td>
                    <td>{{ $course->start_period }}</td>
                    <td>{{ $course->end_period }}</td>
                    <td>{{ $course->room }}</td>
                    <td>{{ $course->semester }}</td>
                    <td>
                        <a href="{{ route('dashboard.courses.edit', $course->_id) }}" class="btn btn-warning btn-sm">Sửa</a>
                        <form action="{{ route('dashboard.courses.destroy', $course->_id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Xác nhận xoá?')">Xoá</button>
                        </form>
                        {{-- Nút điểm danh --}}
                       <td>
                            <a href="{{ route('attendances.details', ['courseCode' => $attendance->course_code]) }}" class="btn btn-info btn-sm">Xem chi tiết</a>
                        </td>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

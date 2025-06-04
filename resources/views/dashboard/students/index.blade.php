@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Danh sách Sinh viên</h1>
    <a href="{{ route('dashboard.students.create') }}">Thêm Sinh viên</a>

    <table>
        <thead>
            <tr>
                <th>Mã</th>
                <th>Họ tên</th>
                <th>Lớp</th>
                <th>Giới tính</th>
                <th>Ngày sinh</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
            <tr>
                <td>{{ $student->student_code }}</td>
                <td>{{ $student->full_name }}</td>
                <td>{{ $student->class_id }}</td>
                <td>{{ $student->gender }}</td>
                <td>{{ $student->dob }}</td>
                <td>
                    <a href="{{ route('dashboard.students.edit', $student) }}">Sửa</a>
                    <form action="{{ route('dashboard.students.destroy', $student) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Xóa</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

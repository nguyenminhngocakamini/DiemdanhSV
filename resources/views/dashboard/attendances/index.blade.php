@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Danh sách điểm danh</h1>
    <a href="{{ route('dashboard.attendances.create') }}" class="btn btn-primary mb-2">Thêm điểm danh</a>
    <table class="table table-bordered">
    <thead>
        <tr>
            <th>Môn học</th>
            <th>Mã môn</th>
            <th>Ngày điểm danh</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($attendances as $attendance)
            <tr>
                <td>{{ $courses[$attendance->course_code]->name ?? $attendance->course_code }}</td>
                <td>{{ $attendance->course_code }}</td>
                <td>{{ $attendance->date }}</td>
                <td>
                    <a href="{{ route('attendances.details', ['courseCode' => $attendance->course_code]) }}" class="btn btn-info btn-sm">Xem chi tiết</a>
                </td>

            </tr>
        @endforeach
    </tbody>
</table>

</div>
@endsection

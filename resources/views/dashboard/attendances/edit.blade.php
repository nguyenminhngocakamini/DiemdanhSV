@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Cập nhật điểm danh môn: {{ $course->name }} - Ngày: {{ $date }}</h1>

    <form action="{{ route('dashboard.attendances.updateBatch') }}" method="POST">
        @csrf

        <input type="hidden" name="course_code" value="{{ $course->course_code }}">
        <input type="hidden" name="date" value="{{ $date }}">

        <table border="1" cellpadding="5" cellspacing="0" style="width: 100%;">
            <thead>
                <tr>
                    <th>Sinh viên</th>
                    <th>Mã SV</th>
                    <th>Trạng thái điểm danh</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($attendances as $attendance)
                <tr>
                    <td>{{ $attendance->student->full_name ?? 'Không có tên' }}</td>
                    <td>{{ $attendance->student_id }}</td>
                    <td>
                        <select name="attendances[{{ $attendance->_id }}][status]" required>
                            <option value="Có mặt" {{ $attendance->status == 'Có mặt' ? 'selected' : '' }}>Có mặt</option>
                            <option value="Vắng mặt" {{ $attendance->status == 'Vắng mặt' ? 'selected' : '' }}>Vắng mặt</option>
                            <option value="Có phép" {{ $attendance->status == 'Có phép' ? 'selected' : '' }}>Có phép</option>
                        </select>
                        <input type="hidden" name="attendances[{{ $attendance->_id }}][student_id]" value="{{ $attendance->student_id }}">
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <button type="submit" style="margin-top: 15px;">Cập nhật điểm danh</button>
    </form>
</div>
@endsection

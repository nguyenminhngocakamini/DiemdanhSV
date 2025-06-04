@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">✅ Điểm danh sinh viên - {{ now()->format('d/m/Y') }}</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('attendance.store') }}">
        @csrf
        <table class="table table-striped table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Họ tên</th>
                    <th>Lớp</th>
                    <th>Giới tính</th>
                    <th>Điểm danh</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $index => $student)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $student->full_name }}</td>
                        <td>{{ $student->class_id }}</td>
                        <td>{{ $student->gender }}</td>
                        <td>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio"
                                       name="attendances[{{ $student->_id }}]"
                                       id="present_{{ $student->_id }}"
                                       value="Có mặt" required>
                                <label class="form-check-label" for="present_{{ $student->_id }}">Có mặt</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio"
                                       name="attendances[{{ $student->_id }}]"
                                       id="absent_{{ $student->_id }}"
                                       value="Vắng">
                                <label class="form-check-label" for="absent_{{ $student->_id }}">Vắng</label>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-3">
            <button class="btn btn-success">💾 Lưu điểm danh</button>
            <a href="{{ route('home') }}" class="btn btn-secondary">🏠 Quay lại</a>
            <a href="{{ route('statistics.index') }}" class="btn btn-info">📊 Xem thống kê</a>
        </div>
    </form>
</div>
@endsection

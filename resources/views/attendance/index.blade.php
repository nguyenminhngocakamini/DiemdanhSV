@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">✅ Điểm danh sinh viên</h2>
    <form method="POST" action="{{ route('attendance.store') }}">
        @csrf
        <table class="table table-bordered">
            <thead class="table-light">
                <tr>
                    <th>Họ tên</th>
                    <th>Điểm danh</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                <tr>
                    <td>{{ $student->full_name }}</td>
                    <td>
                        <select name="attendances[{{ $student->_id }}]" class="form-select" required>
                            <option value="Có mặt">Có mặt</option>
                            <option value="Vắng">Vắng</option>
                        </select>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <button class="btn btn-primary">Lưu điểm danh</button> 
        <a href="{{ route('home') }}" class="btn btn-secondary">Quay lại</a>
        <a href="{{ route('statistics.index') }}" class="btn btn-info">Xem thống kê</a>
    </form>
   
</div>
@endsection

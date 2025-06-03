@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">📊 Thống kê điểm danh sinh viên</h2>
    <p class="mb-4">Dưới đây là thống kê điểm danh của các sinh viên trong lớp.</p>
    {{--<div class="mb-4">
        <strong>Ngày điểm danh:</strong> {{ $date ? \Carbon\Carbon::parse($date)->format('d/m/Y') : 'Chưa chọn' }} <br>
        <strong>Lớp:</strong> {{ $class ?? 'Chưa chọn' }} <br>
       
    </div>
    <form method="GET" class="mb-3">
        <label for="date">Lọc theo ngày:</label>
        <input type="date" name="date" id="date" value="{{ $date }}" class="form-control w-auto d-inline-block">
        <button type="submit" class="btn btn-info">Lọc</button>
    </form> - --}} <strong>Số lượng sinh viên:</strong> {{ count($students) }}

    <table class="table table-bordered table-striped text-center">
        <thead class="table-dark">
            <tr>
                <th>MSSV</th>
                <th>Họ tên</th>                
                <th>Lớp</th>
                <th>Số lần có mặt</th>
                <th>Số lần vắng</th>
                <th>Tổng số buổi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
            <tr>
               
                <td>{{ $student['mssv'] }}</td>
                <td>{{ $student['name'] }}</td>
                <td>{{ $student['class'] }}</td>
                <td class="text-success">{{ $student['present'] }}</td>
                <td class="text-danger">{{ $student['absent'] }}</td>
                <td>{{ $student['total'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('home') }}" class="btn btn-secondary">🏠 Quay lại trang chủ </a>
</div>
@endsection

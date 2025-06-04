@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">📊 Thống kê điểm danh</h2>

    <table class="table table-bordered">
        <thead class="table-light">
            <tr>
                <th>Họ tên</th>
                <th>Số buổi</th>
                <th>Có mặt</th>
                <th>Vắng</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($stats as $row)
            <tr>
                <td>{{ $row['name'] }}</td>
                <td>{{ $row['total'] }}</td>
                <td>{{ $row['present'] }}</td>
                <td>{{ $row['absent'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('home') }}" class="btn btn-secondary">Quay lại</a>
</div>
@endsection

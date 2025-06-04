<table class="table">
    <thead>
        <tr>
            <th>Mã sinh viên</th>
            <th>Tên sinh viên</th>
            <th>Số buổi có mặt</th>
            <th>Số buổi vắng mặt</th>
            <th>Số buổi có phép</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($studentStats as $studentId => $stats)
            <tr>
                <td>{{ $studentId }}</td>
                <td>{{ $stats['student']->name ?? 'Chưa có tên' }}</td>
                <td>{{ $stats['present'] }}</td>
                <td>{{ $stats['absent'] }}</td>
                <td>{{ $stats['excused'] }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

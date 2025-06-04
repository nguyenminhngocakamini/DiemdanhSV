<form action="{{ route('dashboard.attendances.store') }}" method="POST">
    @csrf

    <label>Môn học:</label>
    <select name="course_code" required>
        @foreach ($courses as $course)
            <option value="{{ $course->course_code }}">{{ $course->name }}</option>
        @endforeach
    </select>

    <label>Ngày:</label>
    <input type="date" name="date" required>

  <table>
    <tr>
        <th>Sinh viên</th>
        <th>Trạng thái</th>
    </tr>
    @foreach ($students as $student)
        <tr>
            <td>{{ $student->full_name }}</td>
            <td>
                <label>
                    <input type="radio" name="status[{{ $student->student_code }}]" value="present" checked>
                    Có mặt
                </label>
                <label>
                    <input type="radio" name="status[{{ $student->student_code }}]" value="absent">
                    Vắng không phép
                </label>
                <label>
                    <input type="radio" name="status[{{ $student->student_code }}]" value="excused">
                    Vắng có phép
                </label>
            </td>
        </tr>
    @endforeach
</table>


    <button type="submit">Lưu điểm danh</button>
</form>

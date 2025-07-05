@extends('layout')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h3>Uzbekistondagi  Studentlar ro'yxati</h3>
    <a href="{{ route('students.create') }}" class="btn btn-primary">+ Talaba qo‘shish</a>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered table-striped bg-white shadow">
    <thead class="table-dark">
        <tr>
            <th>#</th>
            <th>F.I.Sh</th>
            <th>Email</th>
            <th>Telefon</th>
            <th>Universitet</th>
            <th width="180px">Amallar</th>
        </tr>
    </thead>
    <tbody>
        @foreach($students as $student)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $student->fullname }}</td>
            <td>{{ $student->email }}</td>
            <td>{{ $student->phone }}</td>
            <td>{{ $student->university }}</td>
            <td>
                <a href="{{ route('students.show', $student->id) }}" class="btn btn-info btn-sm">Ko‘rish</a>
                <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning btn-sm">Tahrirlash</a>
                <form action="{{ route('students.destroy', $student->id) }}" method="POST" class="d-inline"
                      onsubmit="return confirm('O‘chirishni tasdiqlaysizmi?')">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm">O‘chirish</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

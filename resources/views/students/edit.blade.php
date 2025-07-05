@extends('layout')

@section('content')
<h3>Talabani Tahrirlash</h3>

<form action="{{ route('students.update', $student->id) }}" method="POST" class="bg-white p-4 shadow rounded">
    @csrf @method('PUT')

    <div class="mb-3">
        <label>F.I.Sh</label>
        <input type="text" name="fullname" class="form-control" value="{{ $student->fullname }}" required>
    </div>
    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" value="{{ $student->email }}" required>
    </div>
    <div class="mb-3">
        <label>Telefon</label>
        <input type="text" name="phone" class="form-control" value="{{ $student->phone }}">
    </div>
    <div class="mb-3">
        <label>Manzil</label>
        <input type="text" name="address" class="form-control" value="{{ $student->address }}">
    </div>
    <div class="mb-3">
        <label>Yoshi</label>
        <input type="number" name="age" class="form-control" value="{{ $student->age }}">
    </div>
    <div class="mb-3">
        <label>Universitet</label>
        <select name="university" class="form-select">
            <option value="">Tanlang</option>
            @foreach($universities as $university)
                <option value="{{ $university }}" {{ $student->university == $university ? 'selected' : '' }}>
                    {{ $university }}
                </option>
            @endforeach
        </select>
    </div>
    <button class="btn btn-primary">Yangilash</button>
    <a href="{{ route('students.index') }}" class="btn btn-secondary">Orqaga</a>
</form>
@endsection

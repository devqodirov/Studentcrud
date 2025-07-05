@extends('layout')

@section('content')
<h3>Yangi Talaba Qo‘shish</h3>

@if($errors->any())
    <div class="alert alert-danger">
        <strong>Xatolik!</strong> Quyidagi maydonlarni to‘g‘ri to‘ldiring:
        <ul>
            @foreach($errors->all() as $xato)
                <li>{{ $xato }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('students.store') }}" method="POST" class="bg-white p-4 shadow rounded">
    @csrf
    <div class="mb-3">
        <label>F.I.Sh</label>
        <input type="text" name="fullname" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Telefon</label>
        <input type="text" name="phone" class="form-control">
    </div>
    <div class="mb-3">
        <label>Manzil</label>
        <input type="text" name="address" class="form-control">
    </div>
    <div class="mb-3">
        <label>Yoshi</label>
        <input type="number" name="age" class="form-control">
    </div>
    <div class="mb-3">
        <label>Universitet</label>
        <select name="university" class="form-select">
            <option value="">Tanlang</option>
            @foreach($universities as $university)
                <option value="{{ $university }}">{{ $university }}</option>
            @endforeach
        </select>
    </div>
    <button class="btn btn-success">Saqlash</button>
    <a href="{{ route('students.index') }}" class="btn btn-secondary">Orqaga</a>
</form>
@endsection

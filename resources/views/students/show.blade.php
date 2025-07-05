@extends('layout')

@section('content')
<h3>Talaba Ma'lumotlari</h3>

<div class="card shadow">
    <div class="card-body">
        <p><strong>F.I.Sh:</strong> {{ $student->fullname }}</p>
        <p><strong>Email:</strong> {{ $student->email }}</p>
        <p><strong>Telefon:</strong> {{ $student->phone }}</p>
        <p><strong>Manzil:</strong> {{ $student->address }}</p>
        <p><strong>Yoshi:</strong> {{ $student->age }}</p>
        <p><strong>Universitet:</strong> {{ $student->university }}</p>
    </div>
</div>

<a href="{{ route('students.index') }}" class="btn btn-secondary mt-3">Orqaga</a>
@endsection

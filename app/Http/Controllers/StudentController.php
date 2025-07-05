<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    // 1. Universitetlar ro‘yxati
    private function getUniversities()
    {
        return [
"Toshkent davlat texnika universiteti",
"Toshkent davlat yuridik universiteti",
"Toshkent axborot texnologiyalari universiteti",
"Toshkent iqtisodiyot universiteti",
"O‘zbekiston milliy universiteti",
"Toshkent tibbiyot akademiyasi",
"Toshkent farmatsevtika instituti",
"Toshkent davlat pedagogika universiteti",
"Toshkent arxitektura-qurilish instituti",
"Toshkent davlat transport universiteti",
"Toshkent kimyo-texnologiya instituti",
"Toshkent moliya instituti",
"Mirzo Ulug‘bek nomidagi O‘zbekiston milliy universiteti",
"Qoraqalpog‘iston davlat universiteti",
"Buxoro davlat universiteti",
"Buxoro davlat tibbiyot instituti",
"Samarqand davlat universiteti",
"Samarqand davlat tibbiyot instituti",
"Andijon davlat universiteti",
"Andijon davlat tibbiyot instituti",
"Namangan davlat universiteti",
"Urganch davlat universiteti",
"Farg‘ona davlat universiteti",
"Jizzax davlat pedagogika universiteti",
"Termiz davlat universiteti",
"Guliston davlat universiteti",
"Qarshi davlat universiteti",
"Qo‘qon davlat pedagogika instituti",
"Westminster xalqaro universiteti Toshkentda",
"Amity universiteti Toshkentda",
"Webster universiteti Toshkentda",
"Inha universiteti Toshkentda",
"Turin politexnika universiteti Toshkentda",
"MDIS – Singapur menejmentni rivojlantirish instituti",
"Central Asian University",
"AKFA universiteti",
"Alfraganus universiteti",
"Angren universiteti",
"IT Park universiteti",
"Turon universiteti",
"Turan xalqaro universiteti",
"Toshkent moliyaviy boshqaruv va texnologiyalar universiteti",
"Qo‘qon universiteti",
"Toshkent moliya instituti",
"Toshkent axborot texnologiyalari universiteti",
"O‘zbekiston davlat konservatoriyasi",
"O‘zbekiston xalq raqsi va xoreografiya oliy maktabi",
"O‘zbekiston sport va jismoniy madaniyat instituti",
"O‘zbekiston xalqaro islom akademiyasi",
"Silk Road – Xalqaro turizm va madaniy meros universiteti",
"Yeoju texnika instituti (YTIT) Toshkentda",
"Bucheon universiteti Toshkentda",
"Plekhanov Rossiya iqtisodiyot universitetining Toshkent filiali",
"Moskva davlat universitetining Toshkent filiali",
"Sharda universiteti (Andijon)",
"Denov tadbirkorlik va pedagogika instituti",
"Nagoya universitetining O‘zbekiston ofisi",
"O‘zbekiston bank-moliya akademiyasi",
"O‘zbekiston soliq akademiyasi",
"Toshkent irrigatsiya va qishloq xo‘jaligini mexanizatsiyalash muhandislari instituti",
"Toshkent davlat agrar universiteti",
"Toshkent davlat stomatologiya instituti",
"O‘zbekiston davlat jahon tillari universiteti",
"O‘zbekiston davlat san’at va madaniyat instituti",
"Xalqaro Vestminster universiteti",
"Toshkent davlat energetika instituti",
"Xalqaro Toshkent tibbiyot akademiyasi",
"Xalqaro biznes va texnologiyalar universiteti",
"O‘zbekiston jurnalistika va ommaviy kommunikatsiyalar universiteti",
"Toshkent davlat xalqaro huquq universiteti",
"Toshkent davlat dizayn va san’at instituti"
        ];

    }

    // 2. Studentlar ro‘yxatini ko‘rsatish
    public function index()
    {
        $students = Student::all();
        return view('students.index', compact('students'));
    }

    // 3. Yangi student qo‘shish formasi
    public function create()
    {
        $universities = $this->getUniversities();
        return view('students.create', compact('universities'));
    }

    // 4. Yangi studentni saqlash
    public function store(Request $request)
    {
        $request->validate([
            'fullname' => 'required',
            'email' => 'required|email|unique:students,email',
        ]);

        Student::create($request->all());

        return redirect()->route('students.index')->with('success', 'Student muvaffaqiyatli qo‘shildi!');
    }

    // 5. Bitta student sahifasi
    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }

    // 6. Studentni tahrirlash formasi
    public function edit(Student $student)
    {
        $universities = $this->getUniversities();
        return view('students.edit', compact('student', 'universities'));
    }

    // 7. Student ma'lumotlarini yangilash
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'fullname' => 'required',
            'email' => 'required|email|unique:students,email,' . $student->id,
        ]);

        $student->update($request->all());

        return redirect()->route('students.index')->with('success', 'Student yangilandi!');
    }

    // 8. Studentni o‘chirish
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Student o‘chirildi!');
    }
}

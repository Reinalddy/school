<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index() {
        return view('admin.dashboard.index');
    }

    public function student_index() {
        $student = Student::all();
        return view('admin.students.index', [
            'students' => $student
        ]);
    }
}

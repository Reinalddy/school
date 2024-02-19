<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        // medapatkan semua data dari table student
        $student = Student::all();
        // mengirimkan variable student ke view agar bisa ditampilkan pada front end
        return view('form',[
            'students' => $student
        ]);
    }

    public function store(Request $request) {

        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'nis' => 'required',
        ]);
    
        $new_student = new Student();
        $new_student->nama = $request->name;
        $new_student->email = $request->email;
        $new_student->nis = $request->nis;
        $new_student->save();

        $notification = array(
            'success'   => 'Data berhasil ditambahkan'
        );

        return redirect()->route('student.index')->with($notification);
    }

    public function delete($id, Request $request) {

        Student::findOrFail($id)->delete();

        $notification = array(
            'success'   => 'Data berhasil di delete'
        );

        return redirect()->route('student.index')->with($notification);
    
    
    }

    public function update(Request $request) {
        // dd($request->all());
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'nis' => 'required',
        ]);

        $data = Student::find($request->id);
        $data->nama = $request->name;
        $data->email = $request->email;
        $data->nis = $request->nis;
        $data->save();

        $notification = array(
            'success'   => 'Data berhasil di Update'
        );

        return redirect()->route('student.index')->with($notification);

        
    }




}

<?php

namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Http\Request;

class my_controllers extends Controller
{
    public function welcome(){
        return '<h1>students page</h1>';
    }

    public function list(){
        $all_students = Student::all();
        return view('list',['students'=>$all_students]);
    }

    public function add(){
        // dd(request()->user());
        request()->validate([
            'name'=>'required|min:3',
            'age'=>'required',
            'tid'=>'required'
        ]);
        $student = new Student();
        $student->name = request()->name;
        // dd(request()->name);
        $student->age = request()->age;
        $student->id_no = request()->tid;
        $student->save();
        return redirect('students/create')->with('success','created successfully');
    }

    public function edit($id) {
    return view('edit',['student'=>Student::find($id)]);
    }

    public function update ($id) {
        request()->validate([
            'name'=>'required|min:3',
            'age'=>'required',
            'tid'=>'required'
        ]);
        $student = Student::find($id);
        // dd($id);
        $student->name = request()->name;
        $student->age = request()->age;
        $student->id_no = request()->tid;
        $student->save();
        return redirect('students/' . $student->id . '/edit')->with('success', 'updated successfully');
    }

    public function delete($id) {
        $student = Student::find($id);
        $student->delete();
        return redirect('students');
    }

    public function nameandid($id,$name='anonymous ') {
    if($name=='edit')  return redirect('/students/'.$id.'/edit');
    return 'student '.$id.' named '.$name;
    }

    public function create() {
    return view('create');
    }
}

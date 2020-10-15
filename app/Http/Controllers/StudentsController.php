<?php

namespace App\Http\Controllers;

use App\Models\Groups;
use App\Models\Students;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
	public function addStudent(Request $request)
	{
		$request->validate($this->validateRules('students.'));

		$student = new Students();

		$student->firstname 	= $request->input('students.firstname');
		$student->lastname 		= $request->input('students.lastname');
		$student->patronymic 	= $request->input('students.patronymic');
		$student->birthday 		= $request->input('students.birthday');
		$student->group_id 		= $request->input('students.group_id');

		$student->save();

		return redirect()->route('home');
	}

	public function editStudent($id)
	{
		$groups		= new Groups();
		$student	= Students::find($id);

		return view('edit_student', [
			'student'	=> $student,
			'groups'	=> $groups->all()
		]);
	}

	public function updateStudent(Request $request, Students $student)
	{
		$request->validate($this->validateRules());

		$student->update($request->all());

		return redirect()->route('home');
	}

	public function deleteStudent($id)
	{
		$student = Students::find($id);

		if($student !== null){
			$student->delete();
		}

		return redirect()->route('home');
	}

	private function validateRules($prefix = '')
	{
		return [
			$prefix . 'firstname' 	=> 'required|min:2|max:15',
			$prefix . 'lastname' 	=> 'required|min:2|max:20',
			$prefix . 'patronymic' 	=> 'required|min:5|max:20',
			$prefix . 'birthday' 	=> 'required|before:01.01.2016',
			$prefix . 'group_id' 	=> 'required|integer'
		];
	}
}
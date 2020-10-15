<?php

namespace App\Http\Controllers;

use App\Models\Groups;
use App\Models\Students;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function home(Request $request)
	{
		$field = addslashes($request->get('field'));
		$order = addslashes($request->get('order'));

		$groups 	= new Groups();
		$students 	= new Students();

		if(isset($field) && isset($order)){
			if($order == 'desc'){
				$students = $students->all()->sortByDesc($field);
			}else{
				$students = $students->all()->sortBy($field);
			}
		}else{
			$students = $students->all();
		}

		return view('home', [
			'groups' 	=> $groups->all(),
			'students' 	=> $students
		]);
	}
}

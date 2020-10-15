<?php

namespace App\Http\Controllers;

use App\Models\Groups;
use Illuminate\Http\Request;

class GroupsController extends Controller
{
	public function addGroup(Request $request)
	{
		$request->validate($this->validateRules('groups.'));

		$groups = new Groups();

		$groups->number 		= $request->input('groups.number');
		$groups->course 		= $request->input('groups.course');
		$groups->faculty_name 	= $request->input('groups.faculty_name');

		$groups->save();

		return redirect()->route('home');
	}

	public function editGroup($id)
	{
		$group = Groups::find($id);

		return view('edit_group', [
			'group' => $group
		]);
	}

	public function updateGroup(Request $request, Groups $group)
	{
		$request->validate($this->validateRules());

		$group->update($request->all());

		return redirect()->route('home');
	}

	public function deleteGroup($id)
	{
		$group = Groups::find($id);

		if($group !== null){
			$group->students()->delete();
			$group->delete();
		}

		return redirect()->route('home');
	}

	private function validateRules($prefix = '')
	{
		return [
			$prefix . 'number' 			=> 'required|integer',
			$prefix . 'course' 			=> 'required|integer|min:1|max:5',
			$prefix . 'faculty_name' 	=> 'required|min:5|max:100',
		];
	}
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnswersController extends Controller
{
    public function validateWithBag($errorBag, Request $request, array $rules, array $messages = [], array $customAttributes = [])
	{
		//
	}

	public function store(Request $request)
	{
		return response()->json(['answer' => $request->answer]);
	}
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChatsController extends Controller
{
    public function index(Request $request)
	{
		return view('chats');
	}

	public function answer(Request $request)
	{
		return response()->json(['answer' => $request->answer]);
	}
}

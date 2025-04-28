<?php

namespace App\Http\Controllers;

use App\Models\Entry;
use Illuminate\Http\Request;

class EntryController extends Controller
{
    // 収支一覧を表示するメソッド
    public function index()
    {
        $entries = Entry::where('user_id', Auth::id())
                        ->orderBy('spent_at','desc')
                        ->get();

        return view('entries.index',compact('entries'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\MoonRepairComment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{

    public function store(Request $request)
    {
        $createComment = Comment::create($request->all());
        return redirect()->back();
    }
    public function commentStore(Request $request){
        $createComment = MoonRepairComment::create($request->all());
        return redirect()->back();
}
}

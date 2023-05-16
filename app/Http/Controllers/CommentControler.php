<?php

namespace App\Http\Controllers;

use App\Http\Resources\CommentsResource;
use App\Models\Comments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentControler extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum']);
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'post_id' => 'required|exists:posts,id',
            'comments_content' => 'required'
        ]);

        $request['user_id'] = Auth::user()->id;

        $comment = Comments::create($request->all());

        return new CommentsResource($comment);
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function getUserComments()
    {
        $comments = Auth::user()->comments()->latest()->get();

        return response()->json([
            'comments' => $comments
        ], 200);
    }

    public function addComment(Request $request)
    {
        $request->validate([
            'text' => 'required|string|max:255',
        ]);

        $comment = Auth::user()->comments()->create([
            'text' => $request->text,
        ]);

        return response()->json([
            'comment' => $comment
        ], 201);
    }

    public function deleteComment($id)
    {
        $user = Auth::user();

        $comment = $user->comments()->find($id);

        if (!$comment) {
            return response()->json(['error' => 'Comment not found'], 404);
        }

        $comment->delete();

        return response()->json(['message' => 'Comment deleted successfully!'], 204);
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function add(Request $request, $userid, $productid){
        $request->validate([
            'description' => 'required|string|max:255',
        ]);

        $comment = new Comment();
        $comment->user_id = $userid;
        $comment->product_id = $productid;
        $comment->text = $request->input('description');

        $comment->save();

        return redirect()->back()->with('success', 'Успішно додано коментар');
    }
    public function delete($commentId) {
        $comment = Comment::find($commentId);
    
        if (!$comment) {
            return false;
        }
    
        $comment->delete();
        return redirect()->back();
    }
}

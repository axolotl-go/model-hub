<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Threed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, $threed)
    {
        $validated = $request->validate([
            'comment' => 'required|string|min:3|max:500',
        ]);

        // Buscar el modelo Threed por ID
        $threedModel = Threed::findOrFail($threed);

        Comment::create([
            'user_id' => Auth::id(),
            'threed_id' => $threedModel->id,
            'comment' => $validated['comment'],
        ]);

        return redirect()->back()->with('success', 'Comment added successfully');
    }

    public function destroy(Comment $comment)
    {
        // $this->authorize('delete', $comment);
        $modelId = $comment->threed_id;
        $comment->delete();

        return redirect()->back()->with('success', 'Comment deleted');
    }

    
}
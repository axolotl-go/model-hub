<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Threed;
use App\Models\Comment;
use App\Models\Purchase;
use App\Models\StoreCart;

class ThreedController extends Controller
{
    public function show($id)
    {
        $threed = Threed::with(['category', 'user', 'comments.user'])->findOrFail($id);
        $comments = $threed->comments()->with('user')->latest()->get();
        
        // Verificar si el usuario ya compró este modelo
        $isPurchased = false;
        if (auth()->check()) {
            $isPurchased = Purchase::where('user_id', auth()->id())
                ->where('threed_id', $id)
                ->exists();
        }
        
        // Verificar si el modelo está en el carrito del usuario
        $isInCart = false;
        if (auth()->check()) {
            $isInCart = StoreCart::where('user_id', auth()->id())
                ->where('threed_id', $id)
                ->exists();
        }
        
        return view('Threed.threed', compact('threed', 'comments', 'isPurchased', 'isInCart'));
    }
    
    public function addComment(Request $request, $id)
    {
        $request->validate([
            'comment' => 'required|string|max:1000',
        ]);
        
        $threed = Threed::findOrFail($id);
        
        Comment::create([
            'user_id' => auth()->id(),
            'threed_id' => $id,
            'comment' => $request->comment,
        ]);
        
        return back()->with('success', 'Comment added successfully!');
    }
}

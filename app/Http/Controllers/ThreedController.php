<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Threed;
use App\Models\Comment;


class ThreedController extends Controller
{
    public function index($id)
    {
        $threed = Threed::find($id);
        $comments = collect([
            (object) [
                'user_id' => 1,
                'model_id' => 1,
                'comment' => 'This is a comment',
                'user' => (object) ['name' => 'John Doe'],
            ],
            (object) [
                'user_id' => 2,
                'model_id' => 2,
                'comment' => 'This is another comment',
                'user' => (object) ['name' => 'Jane Smith'],
            ],
        ]);
        return view('Threed.threed', compact('comments'));
    }
}

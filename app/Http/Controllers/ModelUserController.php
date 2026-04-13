<?php

namespace App\Http\Controllers;

use App\Models\Threed;
use App\Models\Purchase;
use App\Models\StoreCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ModelUserController extends Controller
{
    public function index(Request $request)
    {
        $query = Threed::query();

        if ($request->has('category') && $request->category) {
            $query->where('category_id', $request->category);
        }

        $models = $query->paginate(12);

        // Check which are purchased by auth user
        foreach ($models as $model) {
            $model->isPurchased = Auth::check() && $model->isPurchasedBy(Auth::id());
            $model->isInCart = Auth::check() && $model->isInCartOf(Auth::id());
        }

        return view('models.index', compact('models'));
    }

    public function show(Threed $threed)
    {
        $threed->load('comments.user');
        $isPurchased = Auth::check() && $threed->isPurchasedBy(Auth::id());
        $isInCart = Auth::check() && $threed->isInCartOf(Auth::id());

        return view('models.show', compact('threed', 'isPurchased', 'isInCart'));
    }
}

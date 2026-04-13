<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PurchaseController extends Controller
{
    public function myModels()
    {
        $user = Auth::user();
        $purchases = $user->getPurchasedModels();

        $purchasedModels = $purchases->map(function ($purchase) {
            $model = $purchase->threed;
            return [
                'id' => $model->id,
                'name' => $model->name,
                'description' => $model->description,
                'img' => $model->preview_image ?? 'https://picsum.photos/id/10/400/300',
                'tag' => $model->tags,
                'color' => 'text-cyan-400',
                'date' => $purchase->purchased_at->format('M d, Y'),
                'size' => '245 MB',
                'format' => 'FBX, OBJ, STL',
                'file_path' => $model->file_path,
            ];
        })->toArray();

        return view('MyModels', ['thread' => collect($purchasedModels)]);
    }
}

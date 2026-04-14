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
            $img = $model->preview_image
                ? asset('storage/' . $model->preview_image)
                : 'https://picsum.photos/seed/' . $model->id . '/400/300';
            return [
                'id'          => $model->id,
                'name'        => $model->name,
                'description' => $model->description,
                'img'         => $img,
                'tag'         => $model->tags,
                'color'       => 'text-cyan-400',
                'date'        => $purchase->purchased_at->format('M d, Y'),
                'size'        => '—',
                'format'      => strtoupper(pathinfo($model->file_path, PATHINFO_EXTENSION)),
                'file_path'   => $model->file_path,
            ];
        })->toArray();

        return view('MyModels', ['thread' => collect($purchasedModels)]);
    }
}

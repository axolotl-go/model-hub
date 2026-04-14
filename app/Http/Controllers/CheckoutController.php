<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Purchase;
use App\Models\StoreCart;
use App\Models\Threed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    /**
     * Compra simulada desde el carrito.
     * Requiere que el usuario seleccione una tarjeta guardada (o tenga alguna).
     */
    public function process(Request $request)
    {
        $user = Auth::user();
        $cartItems = StoreCart::where('user_id', $user->id)->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart')->with('error', 'Tu carrito está vacío.');
        }

        // Validar que se seleccionó una tarjeta válida del usuario
        $request->validate([
            'card_id' => ['required', 'exists:cards,id'],
        ]);

        $card = Card::where('id', $request->card_id)
                    ->where('user_id', $user->id)
                    ->firstOrFail();

        // Simular procesamiento de pago (siempre exitoso)
        foreach ($cartItems as $item) {
            // Evitar duplicados si ya compró el modelo
            Purchase::firstOrCreate([
                'user_id'   => $user->id,
                'threed_id' => $item->threed_id,
            ], [
                'purchased_at' => now(),
            ]);
        }

        // Limpiar carrito
        StoreCart::where('user_id', $user->id)->delete();

        return redirect()->route('purchases.my-models')
            ->with('success', '¡Compra exitosa! Tus modelos ya están disponibles para descargar.');
    }

    /**
     * Compra directa (Buy Now) de un modelo individual sin carrito.
     */
    public function processSingle(Request $request, Threed $threed)
    {
        $user = Auth::user();

        // Si el modelo es de pago, requerir tarjeta. Si es gratis, no.
        if ($threed->price > 0) {
            $request->validate([
                'card_id' => ['required', 'exists:cards,id'],
            ]);
            // Verificar que la tarjeta pertenece al usuario
            Card::where('id', $request->card_id)
                ->where('user_id', $user->id)
                ->firstOrFail();
        }

        // Simular pago y registrar compra (evitar duplicados)
        Purchase::firstOrCreate([
            'user_id'   => $user->id,
            'threed_id' => $threed->id,
        ], [
            'purchased_at' => now(),
        ]);

        return redirect()->route('purchases.my-models')
            ->with('success', "¡{$threed->name} ya está disponible para descargar!");
    }
}

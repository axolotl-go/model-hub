<?php

namespace App\Http\Controllers;

use App\Models\Card;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CardController extends Controller
{
    public function index()
    {
        $cards = Auth::user()->cards()->latest()->get();
        return view('cards.index', compact('cards'));
    }

    public function store(Request $request)
    {
        // Limpiar espacios del número de tarjeta antes de validar
        $request->merge([
            'card_number' => preg_replace('/\s+/', '', $request->card_number),
        ]);

        $request->validate([
            'owner_name' => ['required', 'string', 'max:100'],
            'card_number' => ['required', 'digits_between:13,16'],
            'card_brand'  => ['required', 'in:visa,mastercard,amex,other'],
            'exp_month'   => ['required', 'integer', 'between:1,12'],
            'exp_year'    => ['required', 'integer', 'min:' . date('Y'), 'max:' . (date('Y') + 20)],
        ], [
            'card_number.digits_between' => 'El número debe tener entre 13 y 16 dígitos.',
            'exp_year.min' => 'La tarjeta ya está vencida.',
        ]);

        // Solo guardamos los últimos 4 dígitos
        $lastFour = substr($request->card_number, -4);

        Auth::user()->cards()->create([
            'owner_name' => $request->owner_name,
            'card_number' => $lastFour,
            'card_brand'  => $request->card_brand,
            'cvv'         => null,   // No almacenamos el CVV
            'exp_month'   => $request->exp_month,
            'exp_year'    => $request->exp_year,
        ]);

        return redirect()->route('cards.index')
            ->with('success', 'Tarjeta agregada correctamente.');
    }

    public function destroy(Card $card)
    {
        // Solo el dueño puede eliminar su tarjeta
        if ($card->user_id !== Auth::id()) {
            abort(403);
        }

        $card->delete();

        return redirect()->route('cards.index')
            ->with('success', 'Tarjeta eliminada.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Burger;
use Illuminate\Http\Request;

class BurgerController extends Controller
{
    public function show(Request $request) {
        return view('burger.burger');
    }

    public function edit(Request $request) {
        $burger = Burger::query()->find($request->query('id'));

        if (!isset($burger) or $burger == null) {
            return back();
        }

        return view('burger.edit_burger', compact('burger'));
    }

    public function delete(Request $request) {
        return view('burger.burger');
    }
}

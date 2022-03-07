<?php

namespace App\Http\Controllers;

use App\Models\Burger;
use Illuminate\Http\Request;

class BurgerController extends Controller
{
    public function show(Request $request) {
        return view('burger.burger');
    }

    public function edit(Request $request)
    {
        $burger = Burger::query()->find($request->query('id'));
        if (!isset($burger) or $burger == null) {
            return back();
        }
        return view('burger.edit_burger', compact('burger'));
    }

    public function edit_submit(Request $request)
    {
        $burger = Burger::query()->find($request->query('id'));
        $burger->name = $request->input('name');
        $burger->price = $request->input('price');
        $burger->description = $request->input('description');
        $burger->save();
        return view('burger.edit_burger', compact('burger'));
    }

    public function delete(Request $request)
    {
        $burger = Burger::query()->find($request->query('id'));
        $burger->delete();
        return back();
    }
}

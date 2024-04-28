<?php

use App\Recipe;
use Illuminate\Http\Request;


public function show(Recipe $recipe)
{
    return view('recipes.show', compact('recipe'));
}

public function index()
{
    $recipes = Recipe::paginate(10);

    return view('recipes.index', compact('recipes'));
}
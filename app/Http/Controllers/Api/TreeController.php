<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Tree;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class TreeController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'alias' => 'nullable',
            'tree' => 'required',
            'leaf_type' => 'nullable',
            'tree_shape' => 'nullable',
            'maximum_height' => 'nullable',
            'drought_tolerance' => 'nullable',
            'salt_tolerance' => 'nullable',
            'wind_resistance' => 'nullable',
            'growth' => 'nullable',
            'trunk_characteristics' => 'nullable',
            'common_uses' => 'nullable',
            'soil_requirements' => 'nullable',
        ]);
    
        $tree = Tree::create($validatedData);
    
        return response()->json(['message' => 'Tree created successfully', 'data' => $tree], 201);
    }

    public function show($id)
    {
        $tree = Tree::findOrFail($id);

        return response()->json(['data' => $tree], 200);
    }
    
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'alias' => 'nullable',
            'tree' => 'required',
            'leaf_type' => 'nullable',
            'tree_shape' => 'nullable',
            'maximum_height' => 'nullable',
            'drought_tolerance' => 'nullable',
            'salt_tolerance' => 'nullable',
            'wind_resistance' => 'nullable',
            'growth' => 'nullable',
            'trunk_characteristics' => 'nullable',
            'common_uses' => 'nullable',
            'soil_requirements' => 'nullable',
        ]);

        $tree = Tree::findOrFail($id);
        $tree->update($validatedData);

        return response()->json(['message' => 'Tree updated successfully', 'data' => $tree], 200);
    }

    public function destroy($id)
    {
        $tree = Tree::findOrFail($id);
        $tree->delete();

        return response()->json(['message' => 'Tree deleted successfully'], 200);
    }



}

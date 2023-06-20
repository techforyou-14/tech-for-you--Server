<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Tree;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class TreeController extends Controller
{
    public function store(Request $request)
{
    $tree = new Tree();

    $tree->name = $request->name;
    $tree->alias = !empty($request->alias) ? Str::slug($request->alias) : 'arboles';
    $tree->tree = $request->tree;
    $tree->leaf_type = $request->leaf_type;
    $tree->tree_shape = $request->tree_shape;
    $tree->maximum_height = $request->maximum_height;
    $tree->drought_tolerance = $request->drought_tolerance;
    $tree->salt_tolerance = $request->salt_tolerance;
    $tree->wind_resistance = $request->wind_resistance;
    $tree->growth = $request->growth;
    $tree->trunk_characteristics = $request->trunk_characteristics;
    $tree->common_uses = $request->common_uses;
    $tree->soil_requirements = $request->soil_requirements;
    $tree->user_id = $request->user_id;
    
    $tree->save();

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

    public function delete($id)
    {
        $tree = Tree::findOrFail($id);
        $tree->delete();

        return response()->json(['message' => 'Tree deleted successfully'], 200);
    }
}

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
        $tree = Tree::find($id);
    
        $tree->name = $request->input('name');
        $tree->alias = !empty($request->input('alias')) ? Str::slug($request->input('alias')) : 'arboles';
        $tree->tree = $request->input('tree');
        $tree->image = $request->file('image'); // Aquí se asume que la imagen se envía a través de un campo de formulario llamado "image"
        $tree->leaf_type = $request->input('leaf_type');
        $tree->tree_shape = $request->input('tree_shape');
        $tree->maximum_height = $request->input('maximum_height');
        $tree->drought_tolerance = $request->input('drought_tolerance');
        $tree->salt_tolerance = $request->input('salt_tolerance');
        $tree->wind_resistance = $request->input('wind_resistance');
        $tree->growth = $request->input('growth');
        $tree->trunk_characteristics = $request->input('trunk_characteristics');
        $tree->common_uses = $request->input('common_uses');
        $tree->soil_requirements = $request->input('soil_requirements');

        // Convertir campos a nulos si están vacíos
        $tree->name = $tree->name ?? null;
        $tree->alias = $tree->alias ?? null;
        $tree->tree = $tree->tree ?? null;
        $tree->leaf_type = $tree->leaf_type ?? null;
        $tree->tree_shape = $tree->tree_shape ?? null;
        $tree->maximum_height = $tree->maximum_height ?? null;
        $tree->drought_tolerance = $tree->drought_tolerance ?? null;
        $tree->salt_tolerance = $tree->salt_tolerance ?? null;
        $tree->wind_resistance = $tree->wind_resistance ?? null;
        $tree->growth = $tree->growth ?? null;
        $tree->trunk_characteristics = $tree->trunk_characteristics ?? null;
        $tree->common_uses = $tree->common_uses ?? null;
        $tree->soil_requirements = $tree->soil_requirements ?? null;
    
        $tree->save();
    
        return response()->json(['message' => 'Tree updated successfully', 'data' => $tree], 200);
    }
    



    public function destroy($id)
    {
        $tree = Tree::findOrFail($id);
        $tree->delete();

        return response()->json(['message' => 'Tree deleted successfully'], 200);
    }
}

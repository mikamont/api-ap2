<?php

namespace App\Http\Controllers;

use App\Models\Vilao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VilaoController extends Controller
{
    public function index()
    {
        $vilao = Vilao::all();
        return response()->json([
            'status' => true,
            'message' => 'Vilao retrieved successfully',
            'data' => $vilao
        ], 200);
    }
    public function show($id)
    {
        $vilao = Vilao::findOrFail($id);
        return response()->json([
            'status' => true,
            'message' => 'Vilao found successfully',
            'data' => $vilao
        ], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nome' => 'required|string|max:200',
            'universo' => 'required|string|max:200',
            'poder' => 'required|integer'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        $vilao = Vilao::create($request->all());
        return response()->json([
            'status' => true,
            'message' => 'Vilao created successfully',
            'data' => $vilao
        ], 201);
    }


    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nome' => 'required|string|max:200',
            'universo' => 'required|string|max:200',
            'poder'=> 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        $heroi = Vilao::findOrFail($id);
        $heroi->update($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Vilao updated successfully',
            'data' => $heroi
        ], 200);
    }

    public function destroy($id)
    {
        $vilao = Vilao::findOrFail($id);
        $vilao->delete();
        
        return response()->json([
            'status' => true,
            'message' => 'vilao deleted successfully'
        ], 204);
    }
}

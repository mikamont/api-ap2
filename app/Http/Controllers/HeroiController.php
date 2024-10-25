<?php

namespace App\Http\Controllers;

use App\Models\Heroi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HeroiController extends Controller
{
    public function index()
    {
        $heroi = Heroi::all();
        return response()->json([
            'status' => true,
            'message' => 'Heroi retrieved successfully',
            'data' => $heroi
        ], 200);
    }
    public function show($id)
    {
        $heroi = Heroi::findOrFail($id);
        return response()->json([
            'status' => true,
            'message' => 'Heroi found successfully',
            'data' => $heroi
        ], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nome' => 'required|string|max:200',
            'universo' => 'required|string|max:200',
            'poder' => 'required|integer',

        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        $heroi = Heroi::create($request->all());
        return response()->json([
            'status' => true,
            'message' => 'Heroi successfully',
            'data' => $heroi
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

        $heroi = Heroi::findOrFail($id);
        $heroi->update($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Heroi updated successfully',
            'data' => $heroi
        ], 200);
    }

    public function destroy($id)
    {
        $heroi = Heroi::findOrFail($id);
        $heroi->delete();
        
        return response()->json([
            'status' => true,
            'message' => 'Heroi deleted successfully'
        ], 204);
    }
}

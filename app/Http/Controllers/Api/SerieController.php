<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Str;
use App\Models\Serie;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SerieController extends Controller 
{
    public function index(Request $request)
    {
        if($request->name || $request->id){
            return $this->search($request);
        }

        return Str::random(60);
        // return Serie::All();
    }
  
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'seasons' => 'required|integer',
            'release_date' => 'required|date'
        ]);
        
        Serie::create([
            'name' => $request->name,
            'seasons' => $request->seasons,
            'release_date' => date("Y-m-d", strtotime($request->release_date))
        ]);

        return response()->json([
            'status' => 'success',
            'msg'    => 'Série inserida com sucesso!',
        ], 201);
    }

    public function update(Request $request, $id)
    {
        try {

            $series = Serie::findOrFail($id);
            
            $series->update($request->all());
            
            return response()->json([
                'status' => 'success',
                'msg'    => 'Informações da série alteradas com sucesso!',
            ], 200);;      

        } catch (\Exception $e) {

            return response()->json(['message'=>'Série não encontrado!'], 404);

        }
    }

    public function destroy($id)
    {

        try {
            
            $series = Serie::findOrFail($id);
            $series->delete();
            
            return response()->json([
                'status' => 'success',
                'msg'    => 'Série excluída com sucesso!',
            ], 200);;      

        } catch (\Exception $e) {

            return response()->json(['message'=>'Série não encontrada!'], 404);

        }
    }

    private function search($data)
    {   
        try {

            if($data->id){
                return Serie::findOrFail($data->id);
            }
            $series = Serie::where('name', 'like', '%' . $data->name . '%')->get();

            if ($series->isEmpty()) {
                throw new \Exception();
            }
            
            return $series;

        } catch (\Exception $e) {
            return response()->json(['message'=>'Nenhuma série encontrada!'], 404);
        }
    }
}

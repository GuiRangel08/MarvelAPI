<?php

namespace App\Http\Controllers\Api;

use App\Models\Movie;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;

class MovieController extends Controller 
{
    public function index(Request $request)
    {
        if($request->name || $request->id){
            return $this->search($request);
        }

        return Movie::All();
    }

    public function show($id)
    {
        try {
            return Movie::findOrFail($id);
        } catch (\Exception $e) {
            return response()->json(['message'=>'Filme não enctrado!'], 404);
        }
    }
    
    public function store(Request $request)
    {
        try {

            $request->validate([
                'name' => 'required|string',
                'release_date' => 'required|date'
            ]);
            
            Movie::create([
                'name' => $request->name,
                'release_date' => date("Y-m-d", strtotime($request->release_date))
            ]);
            
            return response()->json([
                'status' => 'success',
                'msg'    => 'Filme inserido com sucesso!',
            ], 201);
        } catch (\Exception $e) {

            return response()->json([
                'status' => 'error',
                'msg'    => 'Não foi posssível inserir o novo filme!',
            ], 422);

        }
    }

    public function update(Request $request, $id)
    {
        try {

            $movie = Movie::findOrFail($id);
            
            $movie->update($request->all());
            
            return response()->json([
                'status' => 'success',
                'msg'    => 'Informações do filme alteradas com sucesso!',
            ], 200);;      

        } catch (\Exception $e) {

            return response()->json(['message'=>'Filme não encontrado!'], 404);

        }
    }

    public function destroy($id)
    {

        try {
            
            $movie = Movie::findOrFail($id);
            $movie->delete();
            
            return response()->json([
                'status' => 'success',
                'msg'    => 'Filme excluído com sucesso!',
            ], 200);;      

        } catch (\Exception $e) {

            return response()->json(['message'=>'Filme não encontrado!'], 418);

        }
    }

    private function search($data)
    {   
        try {

            if($data->id){
                return Movie::findOrFail($data->id);
            }
            $movies = Movie::where('name', 'like', '%' . $data->name . '%')->get();

            if ($movies->isEmpty()) {
                throw new \Exception();
            }
            
            return $movies;

        } catch (\Exception $e) {
            return response()->json(['message'=>'Nenhum filme encontrado!'], 404);
        }
    }
}

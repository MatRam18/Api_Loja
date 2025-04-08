<?php

namespace App\Http\Controllers;

use App\Models\Camisa;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class CamisaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $registros = Camisa::All();

        //Contando o número de registros
        $contador = $registros->count();

        //Verificando se há registros
        if($contador > 0) {
            return response()->json([
            'success' => true,
            'message' => 'Camisas encontradas com sucesso!',
            'data' => $registros,
            'total' => $contador
            ], 200); 
        }else {
            return response()->json([
                'sucess' => false,
                'message' => 'Nenhuma camisa encontrada.',
            ], 404);
        };
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Validação dos dados recebidos
        $validator = Validator::make($request->all(), [
            'marca' => 'required',
            'cor' => 'required',
            'tipo'=> 'required',
            'tamanho'=> 'required'
        ]);

        if($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Registros inválidos',
                'errors' => $validator->errors()
            ], 400);
        }

        $registros = Camisa::create($request->all());

        if($registros) {
            return response()->json([
                'success' => true,
                'message' => 'Camisa cadastrada com sucesso!',
                'data' => $registros
            ], 201);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Erro ao cadastrar a camisa'
            ], 500);
        }
    }

    public function show($id)
    {
        $registros = Camisa::find($id);

        if($registros){
            return response()->json([
                'success' => true,
                'message' => 'Camisa localizada com sucesso!',
                'data' => $registros
            ]);
        }
        else{
            return response()->json([
                'success' => false,
                'message' => 'Camisa não localizada!'
            ], 404);
        }
    }

    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'marca' => 'required',
            'cor' => 'required',
            'tipo' => 'required',
            'tamanho' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Registros inválidos',
                'errors' => $validator->errors()
            ], 400);
        }

        $registrosBanco = Camisa::find($id);

        if (!$registrosBanco) {
            return response()->json([
                'success' => false,
                'message' => 'Camisa não encontrada'
            ], 404);
        }

        $registrosBanco->marca = $request->marca;
        $registrosBanco->cor = $request->cor;
        $registrosBanco->tipo = $request->tipo;
        $registrosBanco->tamanho = $request->tamanho;

        if ($registrosBanco->save()) {
            return response()->json([
                'success' => true,
                'message' => 'Camisa atualizada com sucesso!',
                'data' => $registrosBanco
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Erro ao atualizar a camisa'
            ], 500);
        }
    }

    public function destroy($id)
    {
        $registros = Camisa::find($id);

        if(!$registros) {
            return response()->json([
                'success' => false,     
                'message' => 'Camisa não encontrada'
            ], 404);
        }

        if ($registros->delete()) {
            return response()->json([
                'success' => true,
                'message' => 'Camisa deletada com sucesso'
            ], 200);
        }

        return response()->json([
            'success' => false,
            'message' => 'Erro ao deletar a camisa'
        ], 500);
    }
}

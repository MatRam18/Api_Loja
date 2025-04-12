<?php

namespace App\Http\Controllers;

use App\Models\Calcados;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CalcadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $registros = Calcados::All();

        //Contando o número de registros
        $contador = $registros->count();

        //Verificando se há registros
        if($contador > 0) {
            return response()->json([
            'success' => true,
            'message' => 'Calçado encontrados com sucesso!',
            'data' => $registros,
            'total' => $contador
            ], 200); 
        }else {
            return response()->json([
                'success' => false,
                'message' => 'Nenhum Calçado encontrado.',
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
            'modelo' => 'required',
            'tipo' => 'required',
            'tamanho' => 'required'
        ]);

        if($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Dados inválidos',
                'errors' => $validator->errors()
            ], 400);
        }

        $registros = Calcados::create($request->all());

        if($registros) {
            return response()->json([
                'success' => true,
                'message' => 'Calçado cadastrado com sucesso!',
                'data' => $registros
            ], 201);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Erro ao cadastrar o Calçado'
            ], 500);
        }
    }

    public function show($id)
    {
        $registros = Calcados::find($id);

        if($registros) {
            return response()->json([
                'success' => true,
                'message' => 'Calçado localizado com sucesso!',
                'data' => $registros
            ]);   
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Calçado não encontrado!'
            ], 404);
        }
    }

    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'marca' => 'required',
            'modelo' => 'required',
            'tipo' => 'required',
            'tamanho' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Dados inválidos',
                'errors' => $validator->errors()
            ], 400);
        }

        $registrosBanco = Calcados::find($id);

        if (!$registrosBanco) {
            return response()->json([
                'success' => false,
                'message' => 'Calçado não encontrado'
            ], 404);
        }

        $registrosBanco->marca = $request->marca;
        $registrosBanco->modelo = $request->modelo;
        $registrosBanco->tipo = $request->tipo;
        $registrosBanco->tamanho = $request->tamanho;

        if ($registrosBanco->save()) {
            return response()->json([
                'success' => true,
                'message' => 'Calçado atualizado com sucesso!',
                'data' => $registrosBanco
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Erro ao atualizar o Calçado'
            ], 500);
        }
    }

    public function destroy($id)
    {
        $registros = Calcados::find($id);

        if(!$registros) {
            return response()->json([
                'success' => false,     
                'message' => 'Calçado não encontrado'
            ], 404);
        }

        if ($registros->delete()) {
            return response()->json([
                'success' => true,
                'message' => 'Calçado deletado com sucesso'
            ], 200);
        }

        return response()->json([
            'success' => false,
            'message' => 'Erro ao deletar o Calçado'
        ], 500);
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Api\apimovel\app\Models\Imovel;
use Api\apimovel\app\Http\Requests\ImovelRequest;

// teste push

class ImovelController extends Controller
{

    private $imovel;

    public function __contruct(Imovel $imovel){
        $this-> imovel = $imovel;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $imovel = $this->imovel;
       // $data= $request->all();

        return response()->json($imovel, 200);
    }


    public function show($id){
        try{
            $imovel = $this->imovel->findOrFail($id);

            return response()->json(['
                dados' => [$imovel
                ]
            ],200);
        }catch(\Exception $e){
            return response()->json(['Erro' => $e->getMessage()], 401);
        }
    }

    public function update($id, Request $request){
        $dados = $request->all();

        try{
            $imovel = $this->imovel->findOrFail($id);
            $imovel->update($dados);

            return response()->json([
                'dados' => [
                    'msg' => 'Imovel Atualizado com sucesso'
                ]
            ],200);
        }catch(\Exception $e){
            return response()->json(['Erro' => $e->getMessage()],401);
        }
    }

    public function destroy($id){

        try{
            $imovel = $this->imovel->findOrFail($id); #se tiver exceção ja testa
            $imovel->delete();

            return response()->json([
                'dados' => [
                    'msg' => 'Imovel excluido com sucesso'
                ]
            ], 200);

            }catch(\Exception $e){
                return response()->json(['Erro' => $e->getMessage()], 401);
        }
    }

    public function store(Request $request){
        $data = $request->all();
      //  dd($data);
        
        try {
            $imovel = $this->imovel->create($data);

            return response()->json([
                'data' => [
                    'msg' => 'Imovel cadastro com sucesso'
                ]
            ], 200);

            }catch(\Exeption $e){
                return response()->json(['Erro' => $e->getMessage()], 401);
        }
    }

}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Api\apimovel\app\Models\User;



class UserController extends Controller
{
    private $user;

    public function __contruct(User $user){
        $this-> user = $user;
    }
    /**
     * Display a listing of the resource.
     
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = $this->user;

        return response()->json($user, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $data = $request->all();
      //  dd($data);
        
        try {
            $user = $this->user->create($data);

            return response()->json([
                'data' => [
                    'msg' => 'Imovel cadastro com sucesso'
                ]
            ], 200);

            }catch(\Exeption $e){
                return response()->json(['Erro' => $e->getMessage()], 401);
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try{
            $user = $this->user->findOrFail($id);

            return response()->json(['
                dados' => [$user
                ]
            ],200);
        }catch(\Exception $e){
            return response()->json(['Erro' => $e->getMessage()], 401);
        }
    }


    public function user(){
        $user = $this->user->paginate('10');

        return response()->json($user, 200);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dados = $request->all();

        try{
            $user = $this->user->findOrFail($id);
            $user->update($dados);

            return response()->json([
                'dados' => [
                    'msg' => 'user Atualizado com sucesso'
                ]
            ],200);
        }catch(\Exception $e){
            return response()->json(['Erro' => $e->getMessage()],401);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        try{
            $user = $this->user->findOrFail($id); #se tiver exce????o ja testa
            $user->delete();

            return response()->json([
                'dados' => [
                    'msg' => 'user excluido com sucesso'
                ]
            ], 200);

            }catch(\Exception $e){
                return response()->json(['Erro' => $e->getMessage()], 401);
        }
    }
}

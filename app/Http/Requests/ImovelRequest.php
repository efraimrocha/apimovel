<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Api\apimovel\app\Http\Controllers\Api\ImovelController;

class ImovelRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'titulo' => 'required',
            'descricao' => 'required',
            'conteudo'  => 'required',
            'price'  => 'required',
            'banheiro'  => 'required',
            'quarto'  => 'required',
        ];
    }

}

class ApiMessages{

    private $message=[];
    public function __construct(string $message, array $data = []){
        $this->message['message'] = $message;
        $this->message['erros'] = $data;
    }

    public function getMessage(){
        return $this->message;
    }
}

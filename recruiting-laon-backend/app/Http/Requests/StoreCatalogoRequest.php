<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCatalogoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'titulo' => 'required|string',
            'titulo_original' => 'required|string',
            'lancamento' => 'required|date|date_format:Y-m-d',
            'minutos' => 'required|integer',
            'sinopse' => 'required|string',
            'elenco' => 'required|string',
            'premios' => 'required|string',
            'direcao' => 'required|string',
            'avaliacoes' => 'required|string',
            'image' => 'required'
        ];
    }
}

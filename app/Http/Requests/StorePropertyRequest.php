<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePropertyRequest extends FormRequest
{
    public function authorize()
    {
        // Hanya user dengan is_seller == 1 yang bisa membuat properti
        return true;
    }

    public function rules()
    {
        return [
            'id_user' => 'required|exists:users,id',
            'nama_properti' => 'required|max:100',
            'deskripsi' => 'required',
            'harga' => 'required|numeric',
            'tipe_properti' => 'required|max:50',
            'alamat' => 'required|max:255',
            'status_ketersediaan' => 'required|boolean',
            'foto' => 'nullable|url|max:255'
        ];
    }
}


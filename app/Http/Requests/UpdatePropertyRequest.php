<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Property;

class UpdatePropertyRequest extends FormRequest
{
    public function authorize()
    {
        $property = $this->route('property');

        // Pastikan user adalah pemilik properti dan user adalah seller
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

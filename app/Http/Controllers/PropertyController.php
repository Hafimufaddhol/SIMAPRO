<?php
namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;

class PropertyController extends Controller
{
    public function index(Request $request)
    {
        // Menggunakan Spatie Query Builder untuk filter dan sort
        $properties = QueryBuilder::for(Property::class)
            ->allowedFilters(['nama_properti', 'tipe_properti', 'alamat', AllowedFilter::exact('status_ketersediaan')])
            ->allowedSorts(['nama_properti', 'harga', 'created_at'])
            ->paginate(10);

        return inertia('Properties/Index', ['properties' => $properties]);
    }

    public function show($id)
    {
        // Menampilkan detail satu properti berdasarkan ID
        $property = Property::findOrFail($id);

        return inertia('Properties/Show', ['property' => $property]);
    }

    public function create()
    {
        // Mengirim data kosong ke Vue form saat create
        return inertia('Properties/Form');
    }

    public function edit(Property $property)
    {
        // Mengirim data properti ke Vue form saat edit
        return inertia('Properties/Form', [
            'property' => $property
        ]);
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_user' => 'required|exists:users,id',
            'nama_properti' => 'required|max:100',
            'deskripsi' => 'required',
            'harga' => 'required|numeric',
            'tipe_properti' => 'required|max:50',
            'alamat' => 'required|max:255',
            'status_ketersediaan' => 'required|boolean',
            'foto' => 'nullable|url|max:255'
        ]);

        Property::create($validated);

        return redirect()->route('properties.index')->with('success', 'Property created successfully.');
    }


    public function update(Request $request, Property $property)
    {
        $validated = $request->validate([
            'id_user' => 'required|exists:users,id',
            'nama_properti' => 'required|max:100',
            'deskripsi' => 'required',
            'harga' => 'required|numeric',
            'tipe_properti' => 'required|max:50',
            'alamat' => 'required|max:255',
            'status_ketersediaan' => 'required|boolean',
            'foto' => 'nullable|url|max:255'
        ]);

        $property->update($validated);

        return redirect()->route('properties.index')->with('success', 'Property updated successfully.');
    }

    public function destroy(Property $property)
    {
        $property->delete();

        return redirect()->route('properties.index')->with('success', 'Property deleted successfully.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;
use App\Http\Requests\StorePropertyRequest;
use App\Http\Requests\UpdatePropertyRequest;
use Spatie\QueryBuilder\AllowedSort;

class PropertyController extends Controller
{
    public function index(Request $request)
    {
        // Menggunakan Spatie Query Builder untuk filter dan sort
        $properties = QueryBuilder::for(Property::class)
            ->with('property_specifications')
            ->allowedFilters([
                AllowedFilter::partial('nama_properti'),
                AllowedFilter::partial('tipe_properti'),
                AllowedFilter::partial('alamat'),
                AllowedFilter::exact('status_ketersediaan'),
                AllowedFilter::scope('luas', 'property_specifications.luas'),
                AllowedFilter::scope('jumlah_kamar', 'property_specifications.jumlah_kamar'),
                AllowedFilter::scope('jumlah_ruangan', 'property_specifications.jumlah_ruangan'),
                AllowedFilter::scope('jumlah_kamar_mandi', 'property_specifications.jumlah_kamar_mandi')
            ])
            ->allowedSorts([
                'nama_properti',
                'harga',
                'created_at',
                'updated_at',
                AllowedSort::field('luas', 'property_specifications.luas'),
                AllowedSort::field('jumlah_kamar', 'property_specifications.jumlah_kamar'),
                AllowedSort::field('jumlah_ruangan', 'property_specifications.jumlah_ruangan'),
                AllowedSort::field('jumlah_kamar_mandi', 'property_specifications.jumlah_kamar_mandi')
            ])

            ->paginate(10);

        return inertia('Properties/Index', $properties);
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

    public function store(StorePropertyRequest $request)
    {
        // Menggunakan form request untuk validasi
        Property::create($request->validated());

        return redirect()->route('properties.index')->with('success', 'Property created successfully.');
    }

    public function edit(Property $property)
    {
        // Mengirim data properti ke Vue form saat edit
        return inertia('Properties/Form', [
            'property' => $property
        ]);
    }

    public function update(UpdatePropertyRequest $request, Property $property)
    {
        // Menggunakan form request untuk validasi
        $property->update($request->validated());

        return redirect()->route('properties.index')->with('success', 'Property updated successfully.');
    }

    public function destroy(Property $property)
    {
        $property->delete();

        return redirect()->route('properties.index')->with('success', 'Property deleted successfully.');
    }
}

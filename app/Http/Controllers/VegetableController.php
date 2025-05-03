<?php

namespace App\Http\Controllers;

use App\Models\Vegetables;
use App\Models\Category;
use App\Models\Supplier;
use Illuminate\Http\Request;

class VegetableController extends Controller
{
    public function index()
    {
        $vegetables = Vegetables::with(['supplier', 'category'])->get();
        return view('vegetables.index', compact('vegetables'));
    }

    public function store(Request $request)
    {
        // Validasi data yang dikirim
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'stock' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string|max:1000',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_id' => 'required|exists:categories,id',  // Menambahkan validasi category
            'supplier_id' => 'required|exists:suppliers,id',  // Menambahkan validasi supplier
        ]);

        // Proses foto jika ada
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $imageName = time() . '.' . $photo->extension();
            $photo->move(public_path('photo'), $imageName);
            $validated['photo'] = $imageName;
        }

        // Simpan data sayuran beserta kategori dan supplier
        $vegetable = Vegetables::create([
            'name' => $validated['name'],
            'stock' => $validated['stock'],
            'price' => $validated['price'],
            'description' => $validated['description'],
            'photo' => $validated['photo'],
            'category_id' => $validated['category_id'],
            'supplier_id' => $validated['supplier_id']
        ]);

        // Redirect kembali ke halaman daftar sayuran
        return redirect()->route('vegetables.index')->with('success', 'Vegetable added!');
    }

    public function create()
    {
        // Mengambil kategori dan pemasok untuk form
        $categories = Category::all();
        $suppliers = Supplier::all();
        return view('vegetables.create', compact('categories', 'suppliers'));
    }

    public function show($id)
    {
        $vegetable = Vegetables::findOrFail($id);
        return view('vegetables.show', compact('vegetable'));
    }

    public function edit($id)
    {
        $vegetable = Vegetables::findOrFail($id);
        $categories = Category::all();  // Ambil data kategori
        $suppliers = Supplier::all();   // Ambil data pemasok
        return view('vegetables.edit', compact('vegetable', 'categories', 'suppliers'));
    }

    public function update(Request $request, $id)
    {
        $vegetable = Vegetables::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'stock' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string|max:1000',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_id' => 'required|exists:categories,id',  // Menambahkan validasi category
            'supplier_id' => 'required|exists:suppliers,id',  // Menambahkan validasi supplier
        ]);

        // Jika ada file baru diupload
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $imageName = time() . '.' . $photo->extension();
            $photo->move(public_path('photo'), $imageName);
            $validated['photo'] = $imageName;
        }

        // Update sayuran dengan data baru
        $vegetable->update([
            'name' => $validated['name'],
            'stock' => $validated['stock'],
            'price' => $validated['price'],
            'description' => $validated['description'],
            'photo' => $validated['photo'] ?? $vegetable->photo,  // Pastikan foto tidak diubah jika tidak ada
            'category_id' => $validated['category_id'],
            'supplier_id' => $validated['supplier_id']
        ]);

        return redirect()->route('vegetables.index')->with('success', 'Vegetable updated!');
    }

    public function destroy($id)
    {
        $vegetable = Vegetables::findOrFail($id);

        // Hapus file foto dari folder jika ada
        if ($vegetable->photo && file_exists(public_path('photo/' . $vegetable->photo))) {
            unlink(public_path('photo/' . $vegetable->photo));
        }

        $vegetable->delete();

        return redirect()->route('vegetables.index')->with('success', 'Vegetable deleted!');
    }
}

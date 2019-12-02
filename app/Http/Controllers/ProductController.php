<?php

namespace App\Http\Controllers;

use App\Depart;
use App\Product;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $dep = Depart::all();

        return view('products.index', compact('products', 'dep'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dep = Depart::all();
        return view('products.create', compact('dep'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $test = new Product();
        $images = array();
        if ($files = $request->file('File')) {
            foreach ($files as $file) {
                $name = $file->getClientOriginalName();
                $file->move('storage', $name);
                $images[] = $name;
            }
        }
        $test->Nameproject = $request->get('name');
        $test->dep_id = $request->get('dep_id');
        $test->Dete = $request->get('Dete');
        $test->Note = $request->get('Note');
        $test->File = implode("|", $images);
        $test->save();

        return redirect()->route('products.index')
            ->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $dep = Depart::all();
        return view('products.edit', compact('product', 'dep'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {

        $product = Product::find($product->id);
        $product->Nameproject = $request->get('name');
        $product->dep_id = $request->get('dep_id');
        $product->Dete = $request->get('Dete');
        $product->Note = $request->get('Note');
        $images = array();
        if ($files = $request->file('File')) {
            foreach ($files as $file) {
                $name = $file->getClientOriginalName();
                $file->move('storage', $name);
                $images[] = $name;
            }
            $product->File = implode("|", $images);
        }
        $product->save();
        return redirect()->route('products.index')
            ->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')
            ->with('success', 'Product deleted successfully');
    }

    public function getDownload($name)
    {

        return response()->download(storage_path("app/public/{$name}"));
    }
}

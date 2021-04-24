<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductCreateRequest;
use App\Http\Requests\ProductUpdateRequest;

use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest()->paginate(5);
        return view('product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductCreateRequest $request)
    {
        $image = $request -> file('image');
        $imgName = time().'.'.$image->getClientOriginalExtension(); 
        $destination = public_path('/images');
        $image->move($destination, $imgName);

        Product::create([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'price' => $request->get('price'),
            'category_id' => $request->get('category'),
            'image' => $imgName
        ]);

        return redirect()->back()->with('message','Ürün Eklendi.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view('product.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductUpdateRequest $request, $id)
    {
        $product = Product::find($id);
        $imgName = $product->image;

        if($request->hasFile('image'))
        {
            $image = $request -> file('image');
            $imgName = time().'.'.$image->getClientOriginalExtension(); 
            $destination = public_path('/images');
            $image->move($destination, $imgName);
        }

        $product->name = $request->get('name');
        $product->description = $request->get('description');
        $product->price = $request->get('price');
        $product->category_id = $request->get('category');
        $product->image = $imgName;
        $product->save();

        return redirect()->route('product.index')->with('message','Ürün Başarıyla Güncellendi.');
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product ->delete();
        return redirect()->route('product.index')->with('message','Ürün Veritabanından Silindi.');

    }

    public function listProduct()
    { 
        $categories = Category::with('product')->get();
        return view('product.list',compact('categories'));
    }

    public function detailProduct($id)
    {
        $product = Product::find($id);
        return view('product.detail',compact('product'));
    }
}

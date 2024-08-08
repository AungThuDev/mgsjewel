<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            $product = Product::query();
            return DataTables::of($product)
            ->editColumn('image',function($each){
                    return '<img src="'.asset("storage/products/" . $each->image).'" class="img-thumbnail" width="100" height="100"/>';
            })        
            ->addColumn('action',function($each){
                $edit_icon = '<a href="'.route('products.edit',$each->id).'" class="btn btn-outline-warning" style="margin-right:10px;"><i class="fas fa-user-edit"></i>&nbsp;Edit</a>';
                $detail_icon = '<a href="'.route('products.show',$each->id).'" class="btn btn-outline-info" style="margin-right:10px;"><i class="fas fa-info-circle"></i>&nbsp;Detail</a>';
                $delete_icon = '<a href="" class="btn btn-outline-danger delete" data-id = "'.$each->id.'"><i class="fas fa-trash-alt"></i>&nbsp;Delete</a>';

                return '<div class="action-icon">' . $edit_icon  . $detail_icon . $delete_icon . '</div>';
            })
            ->rawColumns(['image','action','qrcode'])
            ->make(true);
        }
        return view('backend.products.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'brand_name' => 'required',
            'mass' => 'required',
            'density' => 'required',
            'refractive_index' => 'required',
            'measurement' => 'required',
            'cut_shape' => 'required',
            'color' => 'required',
            'text_conclusion' => 'required',
            'image' => 'required|image'
        ]);
        $imagePath = $request->file('image')->store('public/products');
        $imageName = basename($imagePath);

        $product = Product::create([
            'product_id' => rand('10000000','99999999'),
            'brand_name' => $request['brand_name'],
            'mass' => $request['mass'],
            'density' => $request['density'],
            'refractive_index' => $request['refractive_index'],
            'measurement' => $request['measurement'],
            'cut_shape' => $request['cut_shape'],
            'color' => $request['color'],
            'text_conclusion' => $request['text_conclusion'],
            'image' => $imageName,
        ]);

        return redirect('/products')->with('create','Product Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        dd($product);
        return view('backend.products.edit',compact('product'));
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
        $product = Product::findOrFail($id);
        $request->validate([
            'brand_name' => 'required',
            'mass' => 'required',
            'density' => 'required',
            'refractive_index' => 'required',
            'measurement' => 'required',
            'cut_shape' => 'required',
            'color' => 'required',
            'text_conclusion' => 'required',
        ]);
        $product->brand_name = $request->brand_name;
        $product->mass = $request->mass;
        $product->density = $request->density;
        $product->refractive_index = $request->refractive_index;
        $product->measurement = $request->measurement;
        $product->cut_shape = $request->cut_shape;
        $product->color = $request->color;
        $product->text_conclusion = $request->text_conclusion; 
        if($request->file('image')){
            if($product->image){
                Storage::delete('public/products/'.$product->image);
            }
            $imagePath = $request->file('image')->store('public/products/');
            $imageName = basename($imagePath);

            $product->image = $imageName;
        }
        $product->save();
        return redirect('/products')->with('update','Product Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        if($product->image)
        {
            Storage::delete('public/products/' . $product->image);
        }
        $product->delete();
        return 'success';
    }
}

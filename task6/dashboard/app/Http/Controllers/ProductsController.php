<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index(){

        $products=Product::all();
        return view('products.index',compact("products"));
    }
    public function create(){
        $brands=Brand::all();
        $subcategory=Subcategory::all();
        return view('products.create',compact("brands","subcategory"));
    }

    public function edit($id){

        $products=product::find($id);
        $brands=Brand::all();
        $subcategory=Subcategory::all();
        return view('products.edit',compact("brands","subcategory","product"));
    }

    public function store(Request $request)
    {

        $request->validate([
            "name_en"=>["required","string","between :2,64"],
            "name_ar"=>["required","string","between :2,64"],
            "code"=>["required","integer","unique:products,code"],
            "price"=>["required","numeric","between:1,99999.99"],
            "code"=>["required","integer","unique:products,code"],
            "quantity"=>["nullable","integer","between:1,99"],
            "status"=>["nullable","in:0,1"],
            "brand_id"=>["nullable","integer","exists:brands,id"],
            "subcategory_id"=>["nullable","integer","exists:subcategories,id"],
            "detailes_en"=>["required","string"],
            "detailes_ar"=>["required","string"],
            "image"=>["required","mime_types:jpg,png,jpeg","max:1024"],
          ]);
            $newImageName = $request->file('image')->hashName();
            $request->file('image')->move(public_path('images\product'),$newImageName);
            $data = $request->except('_token','image');
            $data['image'] = $newImageName;
            product::create($data);
            return redirect('dashboard/products');

}
}

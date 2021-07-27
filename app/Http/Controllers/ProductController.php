<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(){
        return Product::all();
    }
    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'dis' => 'required',
            'price' => 'required',
        ]);
        return Product::create($request->all());
    }
    public function show($id){
        return Product::find($id);
    }
    public function update(Request $request, $id){
        $validated = $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'dis' => 'required',
            'price' => 'required',
        ]);
        return Product::where('id',$id)->update($request->all());
    }
    public function destroy($id){
        return Product::where('id',$id)->delete();
    }
    public function search($search){

        return Product::where('name', 'like', '%'.$search.'%')
                    ->where('slug', 'like', '%'.$search.'%')
                    ->get();
    }
}

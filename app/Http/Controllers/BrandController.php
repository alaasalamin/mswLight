<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use App\Models\Brand;

class BrandController extends Controller
{
    //
    public function store(Request $request){
        
        $createBrand = Brand::create($request->all());
        return Redirect::back();
    }

    public function destroy($id){

        $deleteBrand = Brand::destroy($id);
        return Redirect::back();
    }
}

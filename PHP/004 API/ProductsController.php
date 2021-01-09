<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductsModel;
use Validator;

class ProductsController extends Controller
{
    public function products() {
        return response()->json(ProductsModel::get(['id','name']), 200);
    }

    public function productsById($id) {
        $products = ProductsModel::find($id);
        if (is_null($products)) {
            return response()->json(['error' => true, 'message'=>'Товар не существует!'], 404);
        }

        return response()->json($products, 200);
    }

    public function productsSave(Request $req) {
        $rules = [
            'name' => 'required|min:3|max:10',
            'color' => 'required|min:3|max:10',
            'size' => 'required|min:1|max:5'
        ];
        $validator = Validator::make($req->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $products = ProductsModel::create($req->all());
        return response()->json($products, 201);
    }

    public function productsEdit(Request $req, $id) {
        $rules = [
            'name' => 'min:3|max:10',
            'color' => 'min:3|max:10',
            'size' => 'min:1|max:5'
        ];
        $validator = Validator::make($req->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $products = ProductsModel::find($id);
        if (is_null($products)) {
            return response()->json(['error' => true, 'message'=>'Товар не существует!'], 404);
        }

        $products->update($req->all());
        return response()->json($products, 200);
    }

    public function productsDelete(Request $req, $id) {
        $products = ProductsModel::find($id);
        if (is_null($products)) {
            return response()->json(['error' => true, 'message'=>'Товар не существует!'], 404);
        }

        $products->delete();
        return response()->json('', 204);
    }
}

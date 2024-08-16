<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Rating; 
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class RatingController extends Controller
{
    public function saveRating(Request $request,$id)
    {
       if ($request->ajax())
       {
            $myString = session('id_login_sussces');
            $myArray = json_decode($myString, true); // Chuyển chuỗi JSON thành mảng
            $id_us = $myArray[0]['id'];
            Rating::insert([
                'ra_product_id' => $id,
                'ra_number' => $request->number,
                'ra_content' => $request->ra_content,
                'ra_user_id' => $id_us,
                'created_at' => Carbon::now(),
                'update_at' => Carbon::now(),
            ]);

            $product = Product::find($id);

            $product->pro_total_number += $request->number;
            $product->pro_total_rating += 1;
            $product->save();

            return response()->json(['code'=>'1']);

       }
    }

}
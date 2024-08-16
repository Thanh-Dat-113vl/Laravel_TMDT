<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Rating;
class ProductController extends Controller
{
    private $product;
    public function __construct()
    {
        $this->product = new Product();
        $this->Rating = new Rating();

    }
    public function getInfoProduct(Request $request)
    {
        $id = $request->id;

        $list_product_id = $this->product->getProductById($id);
        $list_getratings = $this->Rating->getratings($id);

        $avg_rating = $this->Rating->getAverageRating($id);
        $ratingsCount = [
            '1' => 0,
            '2' => 0,
            '3' => 0,
            '4' => 0,
            '5' => 0,
        ];

        foreach ($list_getratings as $rating) {
            $ratingValue = $rating->ra_number;
            if (array_key_exists($ratingValue, $ratingsCount)) {
                $ratingsCount[$ratingValue]++;
            }
        }

        $totalCount = count($list_getratings);
        $ratingPercentages = [];

        foreach ($ratingsCount as $ratingValue => $count) {
            if ($totalCount !== 0) {
                $percentage = ($count / $totalCount) * 100;
                $ratingPercentages[$ratingValue] = round($percentage, 2);
            }else {
                $ratingPercentages[$ratingValue] = 0;
            }
        }


        return view('client.product.info_product',compact('list_product_id','id', 'list_getratings','avg_rating','ratingPercentages'));

    }

    public function getRatings(Request $request) {
        $id = $request->id;
        $star = $request->star;
        $rating = new Rating();
        $ratings = $rating->getRatingsByNumber($id, $star);



        return $ratings;
    }


    public function postProduct(Request $request)
    {
        if(!empty(session('id_login_sussces'))){
            $id_user_arr  = session('id_login_sussces');
            $product_name = $request->product_name;
            $soluong = $request->soluong;
            $price = $request->price;
            $total = $soluong * $price;
            $id = $request->id;
            $soluong_last =   $soluong;

            foreach ($id_user_arr as $key => $item) {
                 $id_user = $item->id;
            }
            $data_product = [
                 $id_user,
                 $request->product_name,
                 $request->soluong,
                 $request->price,
                 $total,
                 $request->size,
                 $request->image,
            ];

          $list_cart =  $this->product->getAllCartById($id_user);

          foreach ($list_cart as $key => $value) {
             if ($value->product_name == $product_name) {
                $soluong_last = $soluong + $value->soluong;
                $data_soluong = [
                    $soluong_last
                ];
                $this->product->UpdateSoluongCart($value->id,$data_soluong);
                return  redirect()->route('Cart');
             }


          }
           $this->product->insertGioHang($data_product);
            return redirect()->route('Cart');

        }else{
            return redirect()->route('login');
        }

    }
    public function getDeleteCart(Request $request)
    {
        $id = $request->id;
        $this->product->deleteCartById($id);
        return back();
    }
    public function getUpdateNumberCart(Request $request)
    {
        $id = $request->id;
        $soluong = $request->soluong;
        return $soluong;
    }



}

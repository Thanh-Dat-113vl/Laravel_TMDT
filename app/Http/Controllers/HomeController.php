<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Caterogy;
use App\Models\Users;

class HomeController extends Controller
{
    private $product;
    private $uesr;
    private $caterogy;
    public function __construct()
    {
        $this->product = new Product();
        $this->user = new Users();
        $this->caterogy = new Caterogy();

    }
    public function index()
    {
        $list_product =  $this->product->getAllProduct();
        return view('home',compact('list_product'));
    }
    public function getCollection()
    {
        return view('collection');
    }
    public function getShoes(Request $request)
    {

        $keyword = null;
        if(!empty($request->keyword)){
            $keyword = $request->keyword;
        }
        $list_caterogy = $this->caterogy->getAllCaterogy()->where('status', 1);
        $list_product =  $this->product->getAllProduct($keyword)->where('status', 1);
        return view('shoes',compact('list_product','list_caterogy'));
    }
    public function getShoesByCaterogy(Request $request)
    {
        $id_caterogy = $request->id_caterogy;
        $list_caterogy = $this->caterogy->getAllCaterogy();
        $list_product = $this->product->getProductByCaterogy($id_caterogy);
        return view('shoes',compact('list_product','list_caterogy'));
    }
    public function getUpload()
    {
        return view('uploadfile');
    }
    // public function postUpload(Request $request)
    // {
    //     if($request->hasFile('myfile')){
    //       $file = $request->file('myfile');
    //       $file->move('assets/images','myfile.jpg');
    //       echo 'thanh cong';
    //     }else{
    //         echo 'chua co file';
    //     }
    // }
    public function postUpload(Request $request)
    {
        if($request->hasFile('photo')){
            if($request->photo->isValid()){
                $file = $request->photo;
                $fileName = $file->getClientOriginalName();
                $file->move('assets/images',$fileName);
                echo 'thanh cong'.$fileName;
            }
           else{
                'Upload file that bai vui long thu lai';
           }
          echo 'thanh cong';
        }else{
            echo 'chua co file';
        }
    }


}

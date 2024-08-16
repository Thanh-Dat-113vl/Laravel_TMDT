<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class Product extends Model
{
    use HasFactory;
    protected $table='product';
    public function getAllProduct($keyword = null)
    {

       $list_product =  DB::table('product');

        if(isset($keyword)){
        $list_product = $list_product->where(function($query) use($keyword){
            $query->orWhere('product_name','like','%'.$keyword.'%');
            $query->orWhere('mota','like','%'.$keyword.'%');
        });
        }
        $list_product = $list_product
    ->leftJoin('ratings', 'product.id', '=', 'ratings.ra_product_id')
    ->select('product.*',DB::raw('ROUND(AVG(ratings.ra_number), 2) as avg_star'))
    ->groupBy('product.id','product.id_caterogy','product.product_name','product.image','product.price','product.size','product.soluongtonkho','product.mota','product.status','product.create_at','product.updated_at','product.pro_total_number','product.pro_total_rating')
    ->get();
        // $list_product = $list_product
        // ->get();

        return $list_product;
    }

    public function getProductById($id)
    {
        $list_product_id = DB::table('product')->where('id',$id)->get();
        return $list_product_id;
    }
    public function getProductByProductName($product_name)
    {
        $list_product = DB::table('product')->where('product_name',$product_name)->get();
        return $list_product;
    }
    public function insertGioHang($data_product)
    {
        DB::insert('INSERT INTO gio_hang (id_user,product_name,soluong,price,total,size,image) VALUES (?,?,?,?,?,?,?)',
        $data_product);
    }
    public function UpdateSoluongCart($id,$datasoluong)
    {
        DB::table('gio_hang')
        ->where('id',$id)
        ->update([
            'soluong'=>$datasoluong[0]
        ]);
    }



    public function getAllProductInnerJoinCatergy($keyword = null)
    {
        // $list_data = DB::table('product')
        // ->select('product.*','caterogy.name_caterogy as caterogy_name'update,'caterogy.id as id_caterogy')
        // ->join('caterogy','product.id_caterogy','caterogy.id')
        // ->orderBy('product.create_at','DESC')
        // ->get();
        // return $list_data;

        $list_data = DB::table('product')
        ->select('product.*','caterogy.name_caterogy as caterogy_name','caterogy.id as id_caterogy')
        ->join('caterogy','product.id_caterogy','caterogy.id')
        ->orderBy('product.create_at','DESC');
        if(isset($keyword)){
            $list_data = $list_data->where(function($query) use($keyword){
                $query->orWhere('product_name','like','%'.$keyword.'%');
                $query->orWhere('price','like','%'.$keyword.'%');
            });
        }
        $list_data = $list_data->get();
        return $list_data;
    }
    public function getProductByIdInnerJoinCatergy($id)
    {
        $list_data = DB::table('product')
        ->select('product.*','caterogy.name_caterogy as caterogy_name')
        ->join('caterogy','product.id_caterogy','caterogy.id')
        ->where('product.id',$id)
        ->get();
        return $list_data;
    }
    public function insertProduct($data)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $status = DB::table('product')->insert([
            'id_caterogy' => $data[0],
            'product_name' => $data[1],
            'image' => $data[2],
            'price'=> $data[3],
            'size'=> $data[4],
            'soluongtonkho'=>$data[5],
            'mota'=>$data[6],
            'create_at' => date('Y-m-d H:i:s')
        ]);
        if($status){
            return 1;
        }else{
            return 0;
        }
    }
    public function getProductByCaterogy($id_caterogy)
    {
        $list_prodct_by_caterogy = DB::table('product')->where('id_caterogy',$id_caterogy)->get();
        return $list_prodct_by_caterogy;
    }
    public function deleteProduct($id)
    {
       $kq = DB::table('product')->where('id',$id)->delete();
       if($kq){
            return 1;
       }else{
            return 0;
       }
    }
    public function UpdateProduct($data,$id)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
       $status = DB::table('product')
       ->where('id',$id)
       ->update([
        'id_caterogy'=>$data[0],
        'product_name'=>$data[1],
        'image'=>$data[2],
        'price'=>$data[3],
        'soluongtonkho'=>$data[4],
        'mota'=>$data[5],
        'status'=>$data[6],
        'updated_at'=>date('Y-m-d H:i:s')
        ]);
        if ($status) {
            return 1;
        }else{
            return 0;
        }
    }

    public function updateSLTONKHO($id, $soluong)
{
    $status = DB::table('product')
    ->where('id',$id)
    ->update([
     'soluongtonkho'=> DB::raw("soluongtonkho - $soluong"),
     ]);
}


    //Cart
    public function getAllCartById($id)
    {
        $list_data_giohang = DB::table('gio_hang')
        ->where('id_user',$id)
        ->get();
        return  $list_data_giohang;

    }
    public function deleteCartById($id)
    {
        $status = DB::table('gio_hang')->where('id',$id)->delete();
        if($status){
            return 1;
        }else{
            return 0;
        }
    }
}

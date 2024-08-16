<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Order extends Model
{
    use HasFactory;
    protected $table='don_hang';
    public function GetAllOrder($keyword = null)
    {
        $list_order_id_user =  DB::table('don_hang');
        if(isset($keyword)){
            $list_order_id_user = $list_order_id_user->where(function($query) use($keyword){
                $query->orWhere('id_donhang','like','%'.$keyword.'%');
                $query->orWhere('fullname','like','%'.$keyword.'%');
                $query->orWhere('status','like','%'.$keyword.'%');
                $query->orWhere('loaithanhtoan','like','%'.$keyword.'%');
                $query->orWhere('trangthaidonhang','like','%'.$keyword.'%');
            });
        }
        $list_order_id_user = $list_order_id_user->get();
        return $list_order_id_user;
    }
    public function GetAllOrderByIdUser($id)
    {
        $list_order_id_user =  DB::table('don_hang')
        ->where('id_user',$id)
        ->get();
        return $list_order_id_user;
    }
    public function GetAllOrderByIdDonHang($id)
    {
        $list_order_id_donhang =  DB::table('don_hang')
        ->where('id_donhang',$id)
        ->get();
        return $list_order_id_donhang;
    }
    public function GetAllDetailOrderByIdDonHang($id_donhang)
    {
        $list_detail_oder = DB::table('ctdh')
        ->where('id_donhang',$id_donhang)
        ->get();
        return $list_detail_oder;
    }
 
    public function InsertOrder($data)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
       $status = DB::table('don_hang')->insert([
            'id_user' => $data[0],
            'fullname'=>$data[1],
            'email' => $data[2],
            'diachi'=>$data[3],
            'sdt'=>$data[4],
            'total'=>$data[5],
            'create_at' => date('Y-m-d H:i:s'),
            'status' => $data[6],
            'loaithanhtoan'=>$data[7]
       ]);
       if($status){
            return 1;
        }else{
            return 0;
        }
    }
    public function InsertOrder_GetId($data)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $id_insert = DB::table('don_hang')->insertGetId([
             'id_user' => $data[0],
             'fullname'=>$data[1],
             'email' => $data[2],
             'diachi'=>$data[3],
             'sdt'=>$data[4],
             'total'=>$data[5],
             'create_at' => date('Y-m-d H:i:s'),
             'status' => $data[6],
             'loaithanhtoan'=>$data[7]
        ]);
        return $id_insert;
    }
    public function InsertDetailOrder($data)
    {
        $status = DB::table('ctdh')
        // ->where('id_donhang',$id)
        ->insert([
            'id_donhang'=>$data[0],
           'product_name'=>$data[1],
           'image'=>$data[2],
           'price'=>$data[3],
           'soluong'=>$data[4]
       ]);
        if($status){
            return 1;
        }else{
            return 0;
    }
    }
    public function getAllDonHangInnerJoinCTHD($id)
    {
        $list_data = DB::table('don_hang')
        ->where('ctdh.id_donhang',$id)
        ->join('ctdh','don_hang.id_donhang','ctdh.id_donhang')
        ->get();
        return $list_data;
    }

    public function DeleteOrder($id)
    {
        DB::delete('delete from don_hang where id = ?', [$id]);
        return 1;
    }

    public function UpdateStatusOrderByID($id)
    {
        $status = DB::table('don_hang')
        ->where('id_donhang',$id)
        ->update([
            'status'=>'Đã thanh toán'
        ]);
        if ($status) {
            return 1;
        }else{
            return 0;
        }
    }
    public function UpdateStatusHuy($id)
    {
        $status = DB::table('don_hang')
        ->where('id_donhang',$id)
        ->update([
            'trangthaidonhang'=>'Đơn hàng bị hủy'
        ]);
        if ($status) {
            return 1;
        }else{
            return 0;
        }
    }
    public function UpdateOrderByID($data,$id)
    {
        $status = DB::table('don_hang')
        ->where('id_donhang',$id)
        ->update([
            'fullname'=>$data[0],
            'email' => $data[1],
            'diachi'=>$data[2],
            'sdt'=>$data[3],
            'total'=>$data[4],
            'status'=>$data[5],
            'trangthaidonhang'=>$data[6]
        ]);
       
        if ($status) {
            return 1;
        }else{
            return 0;
        }
    }

}

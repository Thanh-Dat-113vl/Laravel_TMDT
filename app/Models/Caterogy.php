<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Caterogy extends Model
{
    use HasFactory;
    protected $table='caterogy';

    public function getAllCaterogy($keyword = null)
    {
        $list_data = DB::table('caterogy');
        if(isset($keyword)){
            $list_data = $list_data->where(function($query) use($keyword){
                $query->orWhere('id_donhang','like','%'.$keyword.'%');
                $query->orWhere('fullname','like','%'.$keyword.'%');
                $query->orWhere('status','like','%'.$keyword.'%');
                $query->orWhere('loaithanhtoan','like','%'.$keyword.'%');
                $query->orWhere('trangthaidonhang','like','%'.$keyword.'%');
            });
        }
        $list_data = $list_data->get();
        return $list_data;
    }
    public function DeleteCaterogyById($id)
    {
       $status = DB::delete('delete from caterogy where id = ?', [$id]);
       if($status){
            return 1;
       }else{
            return 0;
       }
    }
    public function InsertCaterogy($data)
    {
        $status = DB::insert('insert into caterogy (name_caterogy, status) values (?, ?)', $data);
        if($status){
            return 1;
        }else{
            return 0;
        }
    }
    public function getCaterogyById($id)
    {
       $list_caterogy_id = DB::table('caterogy')->where('id',$id)->get();
       return $list_caterogy_id ;
    }
    public function UpdateCaterogy($data, $id)
    {
        $status = DB::table('caterogy')
        ->where('id',$id)
        ->update([
            'name_caterogy'=>$data[0],
            'status'=>$data[1]
        ]);
        if ($status) {
            return 1;
        }else{
            return 0;
        }
    }
}

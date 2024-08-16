<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class Rating extends Model
{
    use HasFactory;
    protected $table='ratings';
    public function getAllRatings($keyword = null)
    {
        $list_ratings = DB::table('ratings')->join('users', 'ratings.ra_user_id', '=', 'users.id')
        ->select('ratings.*', 'users.username');
        if(isset($keyword)){
            $list_ratings = $list_ratings->where(function($query) use($keyword){
                $query->orWhere('ratings.id','like','%'.$keyword.'%');
                $query->orWhere('users.username','like','%'.$keyword.'%');
            });
        }
        $list_ratings = $list_ratings->get();
        return $list_ratings;
    }
    public function getratings($id)
    {
        $list_getratings = DB::table('ratings')->where('ra_product_id',$id)->get();
        return $list_getratings;
    }

    public function getAverageRating($id)
    {
        $averageRating = DB::table('ratings')
            ->where('ra_product_id', $id)
            ->avg('ra_number');
        
            return round($averageRating, 1);
    }

    public function getRatingsByNumber($id,$star)
    {
        $ratings = DB::table('ratings')
        ->join('users', 'ratings.ra_user_id', '=', 'users.id')
        ->select('ratings.*', 'users.*')
        ->where('ra_product_id', $id)
        ->where('ra_number', $star)
        ->get();

    return $ratings;
    }
    public function DeleteRatingById($id)
    {
       $status = DB::delete('delete from ratings where id = ?', [$id]);
       if($status){
            return 1;
       }else{
            return 0;
       }
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class Users extends Model
{
    use HasFactory;
    protected $table='users';

    public function addUser($data)
    {
        DB::insert('INSERT INTO users (username,password,email,sdt,create_at) VALUES (?,?,?,?,?)',
        $data);
    }
    public function getAllUsers($keyword = null)
    {
        $list_all_users = DB::table('users');

        if(isset($keyword)){
            $list_all_users = $list_all_users->where(function($query) use($keyword){
                $query->orWhere('username','like','%'.$keyword.'%');
                $query->orWhere('email','like','%'.$keyword.'%');
            });
        }

        $list_all_users = $list_all_users->get();
        return $list_all_users;
    }
    public function getUserNameAndPassword($username,$password)
    {
        $list = DB::table('users')->select('username','password')->get();
        $kq = 0;
        foreach ($list as $key => $value) {
           if($value->username == $username && $value->password == $password){
                $kq = 1;
           }
        }
        return $kq;
    }
    public function getStatement($username)
    {
        $isLocked = DB::table('users')->select('isLocked')->where('username',$username)->get();

        return $isLocked;
    }
    public function getIdUserByName($username)
    {
        //$list_id = DB::select('select id from users where username = ?', [$username]);

        $list_id = DB::table('users')->select('id')->where('username',$username)->get();
        return $list_id;
    }
    public function getAdminUserByName($username)
    {
        $admin = DB::table('users')->select('admin')->where('username',$username)->get();
        return $admin;
    }
    //Info_user
    public function getAllUserJoinInfoUser($id)
    {
        $list_data = DB::table('users')
        ->select('users.username','users.email','users.sdt','info_users.*')
        ->join('info_users','users.id','info_users.id_user')
        ->where('users.id',$id)
        ->get();
        return $list_data;
    }
    public function InsertId_User_Info($id)
    {
       $status =  DB::insert('INSERT INTO info_users (id_user) VALUES (?)', [$id]);
        if($status){
            return 1;
        }else{
            return 0;
        }
    }
    public function getIdByInfoUsers($id)
    {
        $list = DB::table('info_users')
        ->select('info_users.id_user')
        ->where('id_user',$id)
        ->get();
        return $list;
    }
    public function updateInfoUser($data,$id)
    {

        $data_users = DB::table('users')
        ->where('id',$id)
        ->update([
            'email' => $data[0],
            'sdt' => $data[1],
        ]);
        $data_info_users = DB::table('info_users')
        ->where('id_user',$id)
        ->update([
            'fullname' => $data[2],
            'diachi' => $data[3],
        ]);

        if($data_users == true || $data_info_users == true){
            return 1;
        }else{
            return 0;
        }

    }


    public function getUsersByID($id)
    {
        $list_user = DB::table('users')->where('id',$id)->get();
        return $list_user;
    }
    public function DeleteUserById($id)
    {
        DB::delete('delete from users where id = ?', [$id]);
        return 1;
    }
    public function handleStatementUser($username,$isLocked)
    {
        DB::delete('update users SET isLocked = ? WHERE username = ?', [$isLocked,$username]);
        return 1;
    }
    public function UpdateUser($data, $id)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
         $status = DB::table('users')
        ->where('id',$id)
        ->update([
            'username'=>$data[0],
            'email'=>$data[1],
            'sdt'=>$data[2],
            'admin'=>$data[3],
            'update_at'=>date('Y-m-d H:i:s')
        ]);
        if ($status) {
            return 1;
        }else{
            return 0;
        }
    }
    public function InsertUserByAdmin($data)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $status = DB::table('users')->insert([
            'username' => $data[0],
            'password' => $data[1],
            'email' => $data[2],
            'sdt'=> $data[3],
            'admin'=> $data[4],
            'create_at' =>date('Y-m-d H:i:s')
        ]);
        if($status){
            return 1;
        }else{
            return 0;
        }

    }
    public function getEmailByUserName($username)
    {
       $list_email = DB::table('users')->select('email')->where('username',$username)->get();
       return $list_email;
    }
    public function UpdatePasswordByUserName($password,$username)
    {
        $status = DB::table('users')
        ->where('username',$username)
        ->update([
            'password'=>$password
        ]);
        if($status){
            return 1;
        }else{
            return 0;
        }
    }
    public function UpdatePassword($newpassword,$id)
    {
        $status = DB::table('users')
        ->where('id',$id)
        ->update([
            'password'=>$newpassword
        ]);
        if($status){
            return 1;
        }else{
            return 0;
        }
    }


    // public function isLocked()
    // {
    //     return $this->is_locked;
    // }
    // public function lock()
    // {
    //     $this->is_locked = true;
    //     $this->save();
    // }
    // public function unlock()
    // {
    //     $this->is_locked = false;
    //     $this->save();
    // }




}

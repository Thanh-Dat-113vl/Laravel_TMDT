<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Product;
use App\Models\Order;
use DB;
class UsersController extends Controller
{
    private $users;
    private $product;
    private $order;
    public function __construct()
    {
        $this->users = new Users();
        $this->product = new Product();
        $this->order = new Order();

    }
    public function getLogin()
    {
        return view('client.loginform.formlogin');
    }
    public function postLogin(Request $request)
    {
        // $key = '123123';
        // return md5($key);

        $admin = 0;
        $username = $request->username;
        $password = md5($request->password);
        $ketqua =  $this->users->getUserNameAndPassword($username,$password);
        $data =  $this->users->getStatement($username);
        $id_user = $this->users->getIdUserByName($username);
        $list_user = $this->users->getAdminUserByName($username);
        foreach ($list_user as $key => $item) {
            $admin = $item->admin;
        }
        if($ketqua == 1){
            if( $data[0]->isLocked){
                session()->flash('fail', 'Tài khoản đã bị khóa');
                return redirect()->route('login');

            }else {
                $request->session()->put('username_login_sussces', $username);
                $request->session()->put('id_login_sussces',$id_user);
                $request->session()->put('phanquyen',$admin);
           if($admin == 1 or $admin == 2){//tức là tài khoản đang ở quyền admin
                return redirect()->route('getAdmin');
           }else{
                return redirect()->route('index');
           }
            }


        } else{
            session()->flash('fail', 'Sai tài khoản hoặc mật khẩu');
            return redirect()->route('login');

        }
    }
    public function getSignUp()
    {
        return view('client.loginform.sign');
    }
    public function postSignUp(Request $request)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $request->validate([
            'username'=>'min:5|max:50|unique:users|required_with:3,5,7',
            'email'=> 'email|unique:users',
            'password'=>'min:8|required|confirmed|required_with:a,b,c',
            'sdt' => 'max:11|unique:users'
        ],[
            'username.min'=>'Username không được nhỏ hơn :min kí tự',
            'username.max'=>'Username không lớn hơn :max kí tự',
            'username.required_with'=>'User phải có kí tự 3,5,7',
            'username.unique'=>'Username đã tồn tại',
            'email.email' =>'Email không đúng định dạng',
            'email.unique'=>'Email đã tồn tại',
            'password.confirmed'=>' 2 password không trùng khớp',
            'password.min'=>'Password phải lớn hơn :min kí tự',
            //'sdt.number'=>'Số điện thoại phải nhập số',
            'sdt.max' => 'Số điện thoại không quá :max số',
            'sdt.unique'=>'Số điện thoại đã tồn tại '
        ]);
        $password = md5($request->password);
        $dataInsert =[
            $request->username,
            $password,
            $request->email,
            $request->sdt,
            date('Y-m-d H:i:s'),

         ];
         $this->users->addUser($dataInsert);
         return redirect()->route('login');
    }
    public function infoUser(Request $request)
    {

        $list_id = session('id_login_sussces');
        if(isset($list_id)){
            foreach ($list_id as $key => $value) {
                $id = $value->id;
             }
             $list_id_user = $this->users->getIdByInfoUsers($id);
             foreach ($list_id_user as $key => $item) {
               $id_user = $item->id_user;
              }
              if(isset($id_user)){
                  $list_info_user = $this->users->getAllUserJoinInfoUser($id);
                  return view('client.user.info_user',compact('list_info_user'));
              }else{
                 $ketqua = $this->users->InsertId_User_Info($id);
                 if($ketqua == 1){
                     $list_info_user = $this->users->getAllUserJoinInfoUser($id);
                     return view('client.user.info_user',compact('list_info_user'));
                 }else{
                     return 'That bai';
                 }
            }
        }else{
            return redirect()->route('index');
        }


    }
    public function postinfoUser(Request $request)
    {
        $btn_change_password = $request->submit_password;
        $btn_update = $request->submit_update;

        $list_id = session('id_login_sussces');
        foreach ($list_id as $key => $value) {
           $id = $value->id;
        }

       if(!empty($btn_update)){
            $data = [
                $request->email,
                $request->sdt,
                $request->fullname,
                $request->diachi
            ];
            $status = $this->users->updateInfoUser($data,$id);
            if($status == 1){
                session()->flash('success', 'Cập nhật thành công.');
                return back();
            }else{
                return 'that bai';
            }
       }
       if(!empty($btn_change_password)){

            $password_present = $request->password_present;
            $newpassword = $request->new_pasword;
            $re_new_password = $request->re_new_password;
            $list_data = $this->users->getUsersByID($id);
            foreach ($list_data as $key => $value) {
                $password = $value->password;
            }
            if( $password_present != null &&  $newpassword != null &&  $re_new_password != null){
                if($newpassword == $re_new_password){
                    if(md5($password_present)==$password){
                        $flag = $this->users->UpdatePassword(md5($newpassword),$id);
                        if($flag){
                           session()->flash('success', 'Đổi mật khẩu thành công');
                           return back();
                       }else{
                           session()->flash('fail', 'Đổi mật khẩu thất bại vui lòng thử lại');
                           return back();
                       }
                    }else{
                        session()->flash('fail', 'Mật khẩu hiện tài không đúng');
                        return back();
                    }
                }else{
                    session()->flash('fail', 'Hai mật khẩu không trùng khớp');
                    return back();
                }

            }else{
                session()->flash('fail', 'Vui lòng nhập đủ thông tin');
                return back();
            }

       }



    }
    public function getLogOut(Request $request)
    {

        $request->session()->forget('id_login_sussces');
        $request->session()->forget('username_login_sussces');
        $request->session()->flush();

        return redirect()->route('index');
    }
    public function getCart(Request $request)
    {
        $list_id  = session('id_login_sussces');
        if(isset($list_id)){
            foreach ($list_id as $key => $value) {
                $id = $value->id;
             }
             $list_data_cart= $this->product->getAllCartById($id);
             return view('client.user.giohang',compact('list_data_cart'));
        }else{
            return redirect()->route('login');
        }


    }
    public function getPay(Request $request)
    {
        $list_id_user = session('id_login_sussces');
        foreach ($list_id_user as $key => $value) {
           $id_user = $value->id;
        }
        $list_data_infouser = $this->users->getAllUserJoinInfoUser($id_user);
        $list_data_cart= $this->product->getAllCartById($id_user);
        return view('client.user.pay',compact('list_data_infouser','list_data_cart'));


    }

    public function postPay(Request $request)
    {

        if(!empty($request->submit)){
            $method_payment = $request->paymentMethod;
            $fullname = $request->fullname;
            $arr_product_name =  unserialize($request->arr_product_name);
            $arr_soluong =  unserialize($request->arr_soluong);
            $email = $request->email;
            $diachi = $request->diachi;
            $sdt = $request->sdt;
            $status = 'Chưa Thanh Toán';
            $list_id_user = session('id_login_sussces');
            foreach ($list_id_user as $key => $value) {
                $id_user = $value->id;
            }
            $data_order = [
                    $id_user,
                    $fullname,
                    $email,
                    $diachi,
                    $sdt,
                    $request->total_price,
                    $status,
                    $method_payment
            ];



            if($method_payment=="shipcod"){
                 $status = $this->order->InsertOrder($data_order);

                 $list_order = $this->order->GetAllOrderByIdUser($id_user);
                 foreach ($list_order as $key => $value) {
                    $id_dh = $value->id_donhang;

                 }


                for ($i=0; $i < count($arr_product_name) ; $i++) {

                    $list_prodct = $this->product->getProductByProductName($arr_product_name[$i]);
                    foreach ($list_prodct as $key => $value) {
                         $img = $value->image;
                         $price = $value->price;
                    }

                        $data_detal_order =[
                            $id_dh,
                            $arr_product_name[$i],
                            $img,
                            $price,
                            $arr_soluong[$i]
                        ];
                        $this->order->InsertDetailOrder($data_detal_order);

                }

                return redirect()->route('ListOder');



            }
           else{
                    $status = $this->order->InsertOrder($data_order);

                    $list_order = $this->order->GetAllOrderByIdUser($id_user);
                    foreach ($list_order as $key => $value) {
                        $id_dh = $value->id_donhang;

                    }
                    $request->session()->put('id_donhang',$id_dh);

                for ($i=0; $i < count($arr_product_name) ; $i++) {

                    $list_prodct = $this->product->getProductByProductName($arr_product_name[$i]);
                    foreach ($list_prodct as $key => $value) {
                            $img = $value->image;
                            $price = $value->price;
                    }

                        $data_detal_order =[
                            $id_dh,
                            $arr_product_name[$i],
                            $img,
                            $price,
                            $arr_soluong[$i]
                        ];
                        $this->order->InsertDetailOrder($data_detal_order);

                }
                $list_ctdh = $this->order->getAllDonHangInnerJoinCTHD($id_dh);

                return view('client.user.method_paypal',compact('list_ctdh'));
           }
        }

    }
    public function getForgotPass()
    {
        return view('client.loginform.forgotpassword');
    }
    public function random_string($input, $strength = 16) {
        $input_length = strlen($input);
        $random_string = '';
        for($i = 0; $i < $strength; $i++) {
            $random_character = $input[mt_rand(0, $input_length - 1)];
            $random_string .= $random_character;
        }

        return $random_string;
    }
    public function postForgotPass(Request $request)
    {


        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $username = $request->username;
        session()->put('username',$username);
        $list_email = $this->users->getEmailByUserName($username);
        if(!empty($list_email)){
            foreach ($list_email as $key => $value) {
                $email = $value->email;
            }
            session()->put('emailforgot',$email);
            $newpass = $this->random_string($permitted_chars, 8);
            //$pass = 'jHj0Uw5R';
            $status = $this->users->UpdatePasswordByUserName(md5($newpass),$username);
            session()->put('newpass',$newpass);
            if($status == 1){
                //return md5($pass);
                return redirect()->route('sendmail')->with( ['email' => $email] );

            }else{
                session()->flash('fail', 'Lỗi không thể đổi mật khẩu');
            }
        }else{
            session()->flash('fail', 'Người dùng không tồn tại');
            return redirect()->route('forgotpass');
        }


    }
    public function getThanks()
    {
        $id_donhang = session('id_donhang');
        $status = $this->order->UpdateStatusOrderByID($id_donhang);

        return view('client.user.thanks');
    }
    public function donhang(Request $request)
    {



    }
    public function getListOrder()
    {


        $list_id_user = session('id_login_sussces');
        if(isset($list_id_user)){
            foreach ($list_id_user as $key => $value) {
                $id_user = $value->id;
             }
             $list_order = $this->order->GetAllOrderByIdUser($id_user);
             return view('client.user.listoder',compact('list_order'));
        }else{
            return redirect()->route('login');
        }


    }
    public function getDetailOrder (Request $request)
    {
        $id_donhang = $request->id;


        $list_detail_order = $this->order->getAllDonHangInnerJoinCTHD($id_donhang);


    //     foreach ($list_detail_order as $key => $value) {
    //         $product_name = $value->sanpham;
    // //    }

    //     $list_product = $this->product->getProductByProductName($product_name);

      return view('client.user.detail_order',compact('list_detail_order'));
    }
    public function postDetailOrder()
    {
        # code...
    }

    public function getHuyDon(Request $request)
    {
        $id_donhang = $request->id;
        $status = $this->order->UpdateStatusHuy($id_donhang);
        if($status == 1){
            session()->flash('success', 'Hủy đơn thành công');
            return redirect()->route('ListOder');
        }else{
            session()->flash('fail', 'Hủy đơn hàng thất bại, vui lòng thử lại');
        }
    }
    public function getCreate_Order(Request $request)
    {

        if((session('id_login_sussces'))){
            $list_id_user = session('id_login_sussces');
            foreach ($list_id_user as $key => $value) {
                $id_user = $value->id;
            }
        }else{
            $id_user = null;
        }
        $id_product = $request->id_product;
        $fullname = $request->hoten;
        $email = $request->email;
        $diachi = $request->diachi;
        $sdt = $request->sdt;
        $method_payment = $request->method_payment;
        $soluong = $request->soluong;
        $price = $request->price;
        $total  = $soluong * $price;
        $status = 'Chưa thanh toán';
        //code trừ tồn kho
        // $id_product ==> là id sản phẩm

         //hết code dừng tồn khom code
        if(!empty($request->submit)){
            $sanpham = $this->product->UpdateSLTONKHO($id_product, $soluong);
            $list_product_id = $this->product->getProductById($id_product);
            foreach ($list_product_id as $key => $value) {
                $product_name = $value->product_name;
                $image = $value->image;
            }
            if($method_payment == 'shipcod'){
                $data = [
                    $id_user,
                    $fullname,
                    $email,
                    $diachi,
                    $sdt,
                    $total,
                    $status,
                    $method_payment,
                ];
                $id_insert = $this->order->InsertOrder_GetId($data);
                $data_detail = [
                    $id_insert,
                    $product_name,
                    $image,
                    $price,
                    $soluong,
                ];
                $this->order->InsertDetailOrder($data_detail);
                $list_ctdh = $this->order->getAllDonHangInnerJoinCTHD($id_insert);
                return view('client.user.method_paypal_no_login',compact('list_ctdh'));

            }else{
                $data1 = [
                    $id_user,
                    $fullname,
                    $email,
                    $diachi,
                    $sdt,
                    $total,
                    $status,
                    $method_payment,
                ];
                $id_insert = $this->order->InsertOrder_GetId($data1);
                $data_detail = [
                    $id_insert,
                    $product_name,
                    $image,
                    $price,
                    $soluong,
                ];
                $request->session()->put('id_donhang',$id_insert);
                $this->order->InsertDetailOrder($data_detail);
                $list_ctdh = $this->order->getAllDonHangInnerJoinCTHD($id_insert);




               return view('client.user.method_paypal',compact('list_ctdh'));

            }

        }

    }

    public function postCreate_Order(Request $request)
    {
        return 'post create';
    }


// public function lockUser(Users $users)
// {
//     $users->lock();
//     return redirect()->back()->with('success', 'Tài khoản đã được khóa thành công.');
// }

// public function unlockUser(Users $users)
// {
//     $users->unlock();
//     return redirect()->back()->with('success', 'Tài khoản đã được mở khóa thành công.');
// }




}

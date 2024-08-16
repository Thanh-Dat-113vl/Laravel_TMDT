<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Caterogy;
use App\Models\Product;
use App\Models\Order;
use App\Models\Rating;
class AdminController extends Controller
{

    private $user;
    private $caterogy;
    private $product;
    private $order;
    public function __construct()
    {
        $this->user = new Users();
        $this->caterogy = new Caterogy();
        $this->product = new Product();
        $this->order = new Order();
        $this->rating = new Rating();
    }
    //QL User
    public function getAdmin(Request $request)
    {
        $user_login = session('username_login_sussces');
        $keyword = null;
        if(!empty($request->keyword)){
            $keyword = $request->keyword;
        }
        if(!empty($user_login)){
            $list_users = $this->user->getAllUsers($keyword);
            return view('admin/form_admin',compact('list_users'));
        }else{
            return redirect()->route('login');
        }

    }
    public function postAdmin()
    {
        return view('admin.form_admin');
    }
    public function getEditUser(Request $request)
    {

        $id = $request->id;
        $phanquyenadmin = session('phanquyen');
        if($phanquyenadmin == 1)
        {
            $list_user_by_id = $this->user->getUsersByID($id);
            return view('admin/edit_user',compact('list_user_by_id'));
        }else{
            $list_user_by_id = $this->user->getUsersByID($id);
            return view('admin/edit_user',compact('list_user_by_id'));
        }
    }
    public function handleStatementUser(Request $request)
    {

        $username = $request->username;
        $isLocked = $request->isLocked;
        $phanquyenadmin = session('phanquyen');
        if($phanquyenadmin == 1)
        {
            $ketqua  = $this->user->handleStatementUser($username,$isLocked);
            if($ketqua == 1){
                session()->flash('success', 'Khóa thành công.');
                return redirect()->route('getAdmin');
            }else{
                session()->flash('fail', 'Khóa thất bại.');
                return redirect()->route('getAdmin');
            }

        }else{
            session()->flash('fail', 'Bạn không có đủ quyền.');
            return redirect()->route('getAdmin');
        }
    }
    public function getDeleteUser(Request $request)
    {
        $id = $request->id;
        $phanquyenadmin = session('phanquyen');
        if($phanquyenadmin == 1)
        {
            $ketqua  = $this->user->DeleteUserById($id);
            if($ketqua == 1){
                session()->flash('success', 'Xóa thành công.');
                return redirect()->route('getAdmin');
            }else{
                session()->flash('fail', 'Xóa thất bại.');
                return redirect()->route('getAdmin');
            }
        }else{
            session()->flash('fail', 'Xóa thất bại.');
            return redirect()->route('getAdmin');
        }
    }
    public function getLogout(Request $request)
    {

        $request->session()->forget('id_login_sussces');
        $request->session()->forget('username_login_sussces');
        $request->session()->forget('phanquyen');
        $request->session()->flush();
        return redirect()->route('login');
    }
    public function postEditUser(Request $request)
    {

        $id = $request->id;
        $data = [
            $request->username,
            $request->email,
            $request->sdt,
            $request->admin,

        ];
        $ketqua = $this->user->UpdateUser($data,$id);
        if($ketqua == 1){
            session()->flash('success', 'Cập nhật thành công.');
            return redirect()->route('getAdmin');
        }else{
            session()->flash('fail', 'Cập nhật thất bại.');
            return redirect()->route('getAdmin');
        }

    }
    public function addUserByAdmin(Request $request)
    {
        $phanquyenadmin = session('phanquyen');
        if($phanquyenadmin == 1)
        {
            $password = md5($request->password);
        $data =[
            $request->username,
            $password,
            $request->email,
            $request->sdt,
            $request->admin,

        ];
        $ketqua = $this->user->InsertUserByAdmin($data);
            if($ketqua == 1){
                session()->flash('success', 'Thêm thành công.');
                return redirect()->route('getAdmin');
            }else{
                session()->flash('fail', 'Thêm thất bại.');
                return redirect()->route('getAdmin');
                }
        }else{
            session()->flash('fail', 'Thêm thất bại.');
            return redirect()->route('getAdmin');
        }


    }
    //Caterogy
    public function getCaterogy(Request $request)
    {
        $user_login = session('username_login_sussces');
        $keyword = null;
        if(!empty($request->keyword)){
            $keyword = $request->keyword;
        }
        if(!empty($user_login)){
            $list_caterogy = $this->caterogy->getAllCaterogy($keyword);
            return view('admin.caterogy',compact('list_caterogy'));
        }else{
            return redirect()->route('login');
        }

    }
    public function getRatings(Request $request)
    {
        $user_login = session('username_login_sussces');
        $keyword = null;
        if(!empty($request->keyword)){
            $keyword = $request->keyword;
        }


        if(!empty($user_login)){
            $list_ratings = $this->rating->getAllRatings($keyword);
            return view('admin.rate',compact('list_ratings'));
        }else{
            return redirect()->route('login');
        }

    }
    public function getDeleteRating(Request $request)
    {
        $id = $request->id;
        $ketqua = $this->rating->DeleteRatingById($id);
        if($ketqua == 1){
            session()->flash('success','Xóa đánh giá thành công');
            return redirect()->route('getRatings');
        }else{
            return 'Thất bại';
        }
    }
    public function getDeleteCaterogy(Request $request)
    {
        $id = $request->id;
        $ketqua = $this->caterogy->DeleteCaterogyById($id);
        if($ketqua == 1){
            session()->flash('success','Xóa danh mục thành công');
            return redirect()->route('Caterogy');
        }else{
            return 'Thất bại';
        }
    }
    public function addCaterogy(Request $request)
    {
       $data = [
            $request->name_caterogy,
            $request->status
       ];
       $ketqua = $this->caterogy->InsertCaterogy($data);
       if($ketqua == 1){
            session()->flash('success','Thêm danh mục thành công');
            return redirect()->route('Caterogy');
       }else{
            return 'Thất bại';
       }
    }
    public function getEditCaterogy(Request $request)
    {
        $id = $request->id;
        $list_caterogy_id = $this->caterogy->getCaterogyById($id);
        return view('admin.edit_caterogy',compact('list_caterogy_id'));
    }
    public function postEditCaterogy(Request $request)
    {
        $id = $request->id;
        $data = [
            $request->name_caterogy,
            $request->status
        ];
        $ketqua = $this->caterogy->UpdateCaterogy($data,$id);
        if($ketqua == 1){
            session()->flash('success','Cập nhật danh mục thành công');
            return redirect()->route('Caterogy');
        }else{
            return 'Update thất bại';
        }
    }
    //Product
    public function getProduct(Request $request)
    {
        $user_login = session('username_login_sussces');
        $keyword = null;
        if(!empty($request->keyword)){
            $keyword = $request->keyword;
        }
        if(!empty($user_login)){
            $list_caterogy = $this->caterogy->getAllCaterogy();
            $list_product = $this->product->getAllProductInnerJoinCatergy($keyword);
            return view('admin.product',compact('list_product','list_caterogy'));
        }else{
            return redirect()->route('login');
        }




    }
    public function addProductByAdmin(Request $request)
    {
        $file = $request->image;
        $fileName = $file->getClientOriginalName();
        $ketqua_uploadanh = 0;
        if($request->hasFile('image')){
            if($request->image->isValid()){
                $file->move('assets/images',$fileName);
                $ketqua_uploadanh = 1;
            }
           else{
                'Upload file that bai vui long thu lai';
           }
        }
        $data = [
            $request->caterogy,
            $request->name_product,
            $fileName,
            $request->price,
            $request->size,
            $request->sltk,
            $request->mota,
            $request->status
        ];
        $ketqua = $this->product->insertProduct($data);
        if($ketqua == 1 && $ketqua_uploadanh == 1){
            session()->flash('success','Thêm sản phẩm thành công');
            return redirect()->route('adminProduct');
        }else{
            return 'Thất bại';
       }
    }
    public function getDeleteProduct(Request $request)
    {
        $id = $request->id;
        $ketqua = $this->product->deleteProduct($id);
        if($ketqua == 1){
            session()->flash('success','Xóa sản phẩm thành công');
            return redirect()->route('adminProduct');
        }else{
            return 'Thất bại';
        }
    }
    public function getEditProduct(Request $request)
    {
        $id = $request->id;
        $list_caterogy = $this->caterogy->getAllCaterogy();
        $list_product = $this->product->getProductByIdInnerJoinCatergy($id);
        return view('admin.edit_product',compact('list_product','list_caterogy'));
    }
    public function postEditProduct(Request $request)
    {
        $id = $request->id;
        $fileName = null;
        $file = $request->image;
        if(!empty($file)){
            $fileName = $file->getClientOriginalName();
            if($request->hasFile('image')){
                if($request->image->isValid()){
                    $file->move('assets/images',$fileName);
                }
                else{
                    'Upload file that bai vui long thu lai';
                }
            }
        }else{
            $fileName = $request->image_old;
        }

        $data = [
            $request->caterogy,
            $request->product_name,
            $fileName,
            $request->price,
            $request->sltk,
            $request->mota,
            $request->status
        ];
        $ketqua = $this->product->UpdateProduct($data,$id);
        if($ketqua == 1){
            session()->flash('success','Cập nhật sản phẩm thành công');
            return redirect()->route('adminProduct');
        }else{
            return redirect()->route('adminProduct');
        }


    }

    //Order-Admimn

    public function getOrder(Request $request)
    {
        $user_login = session('username_login_sussces');
        $keyword = null;
        if(!empty($request->keyword)){
            $keyword = $request->keyword;
        }
        if(!empty($user_login)){
            $list_order = $this->order->GetAllOrder($keyword);
            return view('admin.order',compact('list_order'));
        }else{
            return redirect()->route('login');
        }



    }
    public function getDeleteUserOrder(Request $request)
    {
        $id_donhang = $request->id;

        return view('admin.lydo',compact('id_donhang'));
    }

    public function postDeleteUserOrder(Request $request)
    {
        $id_donhang = $request->id_donhang;
        $lydo = $request->lydo;
        $cb1 = $request->cb1;
        $cb2 = $request->cb2;
        $cb3 = $request->cb3;
        $cb4 = $request->cb4;
        $content = $cb1.', '.$cb2.', '.$cb3.', '.$cb4.', '.$lydo;
        session()->put('content_sorry',$content);
        session()->put('id_donhang',$id_donhang);
        $list_order_by_id_donhang = $this->order->GetAllOrderByIdDonHang($id_donhang);
        foreach ($list_order_by_id_donhang as $key => $value) {
           $email = $value->email;
        }
        session()->put('emailsorry',$email);
        $ketqua = $this->order->UpdateStatusHuy($id_donhang);
        if($ketqua == 1){
            return redirect()->route('sendmailsorry')->with( ['email' => $email] );
        }else{
            session()->flash('fail','Hủy đơn hàng thất bại');
        }



    }
    public function getEditOrder(Request $request)
    {
        $id_donhang = $request->id;
        $list_order = $this->order->GetAllOrderByIdDonHang($id_donhang);

        return view('admin.edit_order',compact('list_order'));
    }
    public function postEditOrder(Request $request)
    {
        $id_donhang = $request->id_donhang;
        $fullname = $request->fullname;
        $email = $request->email;
        $diachi =  $request->diachi;
        $sdt = $request->sdt;
        $total =   $request->total;
        $status =  $request->status;
        $trangthaidonhang = $request->trangthaidonhang;
        $data_order = [
            $fullname,
            $email,
            $diachi,
            $sdt,
            $total,
            $status,
            $trangthaidonhang

        ];
        $ketqua = $this->order->UpdateOrderByID($data_order,$id_donhang);
        if($ketqua == 1){
            session()->flash('success','Cập nhật đơn hàng thành công');
            return redirect()->route('adminOrder');
        }else{
            return 'Update thất bại';
        }


    }


//     public function lockUser($userId)
// {
//     $user = User::find($userId);
//     $user->is_locked = true;
//     $user->save();

//     return redirect()->back()->with('success', 'Tài khoản đã được khóa thành công.');
// }

// public function unlockUser($userId)
// {
//     $user = User::find($userId);
//     $user->is_locked = false;
//     $user->save();

//     return redirect()->back()->with('success', 'Tài khoản đã được mở khóa thành công.');
// }
}

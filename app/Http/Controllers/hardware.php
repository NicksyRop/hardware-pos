<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Collection;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Mail\mailing;
use Validator;

class hardware extends Controller
{


    public function index(){
    return $this->check_logged_in();
    }
     public function check_logged_in(){
           if (session()->has('username')) {
           return view("ui.dashboard");
        }
        else{
        return view("ui.login");
    }

    }
    function sign_out(){
        session()->flush();
        return view("ui.login");
    }

    function user_login(Request $request){
//         $user=array(
//             'username'=>$request->input('username'),
//             'password'=>$request->input('password')
//         );
//         $login=DB::table('users')->where($user)->get();
//         if (count($login)>0) {
//             $details=json_decode($login);
//        foreach ($details as $key => $value) {
//            $permission=$value->permission;
//            $name=$value->name;
//            $user=$value->username;
//        }
//         session()->put("username",$name);
//         session()->put("permission",$permission);
//         session()->put("login_user",$user);
        return view('ui.dashboard');
//         }
//         else{
//         $request->session()->flash("login","Wrong username or password");
//          return view('ui.login');
//         }
    }
    function shop(){
         $this->check_logged_in();
        $getstock=DB::table("stock")->paginate(6);
        $stock=json_decode(json_encode($getstock));
         return view('ui.shop')->withTitle('E-COMMERCE STORE | SHOP')->with(['products' => $getstock]);
    }
    public function cart()  {
         $this->check_logged_in();
        $cartCollection = \Cart::getContent();
        return view('ui.cart')->withTitle('E-COMMERCE STORE | CART')->with(
            ['cartCollection' => $cartCollection]);
    }
    public function add(Request$request){
         $this->check_logged_in();
        \Cart::add(array(
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'image' => $request->img,
            'slug' => $request->slug
        ));
        $cartCollection = \Cart::getContent();
        return redirect()->route('cart.index')->with('success_msg', 'Item is Added to Cart!');

    }
    public function remove(Request $request){
         $this->check_logged_in();
        \Cart::remove($request->id);
        return redirect()->route('cart.index')->with('success_msg', 'Item is removed!');
    }
    public function checkout(Request $request){
        // $this->check_logged_in();
        $all=$request->input('cartCollection');
        $totals=$request->input('total');
        $total=array("total"=>$request->input('total'));
        $values=json_decode($all,true);
        $arr=array();
        foreach ($values as $key => $value) {
            $item_name=$value['name'];
            $buyquantity=$value['quantity'];
            $query1=DB::select("select quantity from stock where name='$item_name'");
            $qua=json_decode(json_encode($query1,true));
            foreach ($qua as $key => $value1) {
                $quantity=$value1->quantity;
                $newquantity=(int)($quantity)-(int)($buyquantity);
                $newstock=array('quantity'=>$newquantity);
                $updates=DB::table('stock')->where('name','=',$item_name)->update($newstock);
            }
            $subtotal=(int)($value['quantity'])*(int)($value['price']);
           $var=$value['name'].'/'.$value['price'].'/'.$value['quantity'].'/'.$subtotal."*";
array_push($arr, $var);
        }
        $arr=implode("", $arr);
        $insertsale=DB::insert("insert into sales(products,total)values('$arr','$totals')");
        if ($insertsale) {
            \Cart::clear();
           return view('ui.receipt',['mycart'=>json_decode($all,true),'total'=>$total]);
        }
        else{

        }
    }
    public function generate_invoice(Request $request){
         $this->check_logged_in();
          $all=$request->input('cartCollection');
        $totals=$request->input('total');
        $total=array("total"=>$request->input('total'));
        $values=json_decode($all,true);
            \Cart::clear();
           return view('ui.invoice',['mycart'=>json_decode($all,true),'total'=>$total]);
    }
    public function update(Request $request){
         $this->check_logged_in();
        \Cart::update($request->id,
            array(
                'quantity' => array(
                    'relative' => false,
                    'value' => $request->quantity
                ),
        ));
        return redirect()->route('cart.index')->with('success_msg', 'Cart is Updated!');
    }
    public function clear(){
         $this->check_logged_in();
        \Cart::clear();
        return redirect()->route('cart.index')->with('success_msg', 'Car is cleared!');
    }
    public function mystock(){
         $this->check_logged_in();
    	$getstock=DB::table("stock")->paginate(6);
    	//$stock=json_decode(json_encode($getstock));
    	return view('ui.stock')->with("stock",$getstock);
    }
    public function users(){
         $this->check_logged_in();
        $getstock=DB::table("users")->paginate(3);
        //$stock=json_decode(json_encode($getstock));
        return view('ui.users')->with("users",$getstock);
    }
     public function new_product(){
         $this->check_logged_in();
    	return view('ui.new_product');
    }
    public function point_of_sale(){
         $this->check_logged_in();
        $getstock=DB::table("stock")->get();
        $stock=json_decode(json_encode($getstock));
        return view('ui.pos',["stock"=>$stock]);
    }

    public function delete_item(Request $request){
        $this->check_logged_in();
        $id=$request->input('delete_item');
        $del=DB::table("stock")->where('id','=',$id)->delete();
        if ($del) {
            return back();
        }
        else{
            print_r("failed");
        }
    }
    function user_delete(Request $request){
        $this->check_logged_in();
        $username=array('username'=>$request->input('delete_user'));
        $delete=DB::table('users')->where($username)->delete();
        if ($delete) {
          $getstock=DB::table("users")->paginate(3);
        //$stock=json_decode(json_encode($getstock));
        return view('ui.users')->with("users",$getstock);
        }else{
$getstock=DB::table("users")->paginate(3);
        //$stock=json_decode(json_encode($getstock));
        return view('ui.users')->with("users",$getstock);
        }
    }
    public function add_product(Request $request){
        $this->check_logged_in();
    	$id=$request->input('id');
    	print_r("hello".$id);
    	if ($id!="") {
    		$quantity=DB::select("select quantity from stock where id='$id'");
    		print_r($quantity[0]->quantity);
    		$newquantity=(int)($quantity[0]->quantity)+(int)($request->input("pieces"));
    		$all=array(
    		"name"=>$request->input("name"),
    		"price"=>$request->input("price"),
    		"quantity"=>$newquantity,
    		"package"=>$request->input("package"),
    		"updated_at"=>$request->input("updated_at"),
    		"expiry_date"=>$request->input("expiry_date"),
    		"minimum_req"=>$request->input("minimum")
    	);
    		$res=DB::table("stock")->where("id","=",$id)->update($all);
    		$getstock=DB::table("stock")->get();
    	$stock=json_decode(json_encode($getstock));
 if($res){

	return view('ui.stock',['upmessage'=>'updated successfully',"stock"=>$stock]);
}
else{
	return view('ui.stock',['upmessage'=>'Failed to update Item',"stock"=>$stock]);
}

    	}else if($id==""){
    	$all=array(
    		"name"=>$request->input("name"),
    		"price"=>$request->input("price"),
    		"quantity"=>$request->input("pieces"),
    		"package"=>$request->input("package"),
    		"created_at"=>$request->input("created_at"),
    		"expiry_date"=>$request->input("expiry_date"),
    		"minimum_req"=>$request->input("minimum")
    	);
 $res=DB::table("stock")->insert($all);
 if($res){
	return view('ui.new_product',['message'=>'added successfully']);
}
else{
	return view('ui.new_product',['message'=>'Failed to add Item']);
}
    }}
    function accounts(){
        $this->check_logged_in();
        return view('ui.addaccount');
    }
    function add_user(Request $request){
        $this->check_logged_in();
        $employee=$request->input('username');
$res=DB::table('users')->where('username','=',$employee)->get();
if (count($res)>0) {
    $request->session()->flash("newmess","Account Already Exists!");
   return view('ui.addaccount');

}else{
    $all=array(
        'name'=>$request->input('name'),
        'contact'=>$request->input('contact'),
        'username'=>$request->input('username'),
        'permission'=>$request->input('permission'),
        'date'=>$request->input('date'),
        'password'=>$request->input('password')

    );
    $res=DB::table('users')->insert($all);
    if ($res) {
         $request->session()->flash("newmess","Account Created successfully");
 return view('ui.addaccount');
    }
    else{
         $request->session()->flash("newmess","Failed to add Account Try Again!");
      return view('ui.addaccount');
    }
}

    }
    function user_update(Request $request){
        $this->check_logged_in();
        $username=array('username'=>$request->input('username'));
        $details=array(
        'name'=>$request->input('name'),
        'contact'=>$request->input('contact'),
        'permission'=>$request->input('permission'),
        'date'=>$request->input('date'),
        'password'=>$request->input('password')
        );

        $update=DB::table('users')->where($username)->update($details);
        if ($update) {
            $request->session()->flash("newmess","Account Updated successfully");
 return view('ui.addaccount');
        }else{
             $request->session()->flash("newmess","Failed to Update account");
 return view('ui.addaccount');
        }
    }
    function mysales(){
        $this->check_logged_in();
        $result=DB::table('sales')->get();
        return view('ui.sales',['sales'=>$result]);
    }
    function myreports(){
        $this->check_logged_in();
          $result=DB::table('sales')->get();
        return view('ui.reports',['sales'=>$result]);
    }
    function reports_generate(Request $request){
        $this->check_logged_in();
        $request->flash();
        $request->validate([
            'start_date'=>'required|date|before:tomorrow',
            'end_date'=>'required|date|before:start_date'
        ]);
            $date1=$request->input('start_date');
            $date2=$request->input('end_date');
            $newDate1=strtotime($date1);
            $newDate2=strtotime($date2);
            $date_start=(date('Y-m-d', $newDate1));
            $date_end=(date('Y-m-d', $newDate2));
         $result=DB::select("select * from sales where dates between '$date_end' AND '$date_start' ");
         return view('ui.reports',['sales'=>$result]);
    }
}

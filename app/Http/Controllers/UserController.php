<?php

namespace App\Http\Controllers;

use App\User;
use App\Comic;
use App\Review;
use App\Order;
use App\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Wishlist;
use App\PaymentMethod;
use App\ShippingAddress;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(User::get(), 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [

            'name' => 'required',
            'surname' => 'required',
            'username' => 'required',
            'age' => 'required',
            'partitaIva' => 'nullable',
            'phone_number' => 'required',
            'email' => 'required',
            'email_verified_at' => 'required',
            'password' => 'required',
            'attivita' => 'nullable',


        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }


        $User = User::create($request->all());
        return response()->json($User, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $User = User::find($id);
        if (is_null($User)) {
            return response()->json(["message" => 'Record not found'], 404);
        }
        return response()->json(Author::find($id), 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $User = User::find($id);
        if (is_null($User)) {
            return response()->json(["message" => 'Record not found'], 404);
        }
        $User->update($request->all());
        return response()->json($User, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $User = User::find($id);
        if (is_null($User)) {
            return redirect()->route("AdminAccount")->with('message', 'Alredy Deleted');
        }
        $User->delete();
        return redirect()->route("AdminAccount")->with('message', 'Success');
    }

    public static function getUserId($id)
    {
        return User::where('id', '=', $id)->first();
    }

    public static function addPartitaIva(Request $request)
    {

        $request->validate([
            'partitaIva' => ['required', 'regex:/^[a-zA-Z]{2}[0-9]{2}[a-zA-Z0-9]{4}[0-9]{7}([a-zA-Z0-9]?){0,16}$/'],
            'attivita' => 'required',
        ]);

        User::find(auth()->user()->id)->update(['partitaIva' => ($request->partitaIva)]);
        User::find(auth()->user()->id)->update(['attivita' => ($request->attivita)]);


    }

    public static function dashboard()
    {
        $user = \Illuminate\Support\Facades\Auth::user();
        $notifications = Notification::where('user_id', '=', $user->id)->paginate(6);
        $orders = Order::where('user_id', '=', $user->id)->paginate(6);
        $list = Wishlist::where('user_id', '=', $user->id)->paginate(6);
        $paymentMethods = PaymentMethod::where('user_id','=',$user->id)->paginate(6);
        $shippingAddresses =  ShippingAddress ::where('user_id','=',$user->id)->paginate(6);
        $orders_of_vendor = DB::table('orders')->join('comic_bought_order', 'orders.id', '=', 'comic_bought_order.order_id')->join('comic_boughts', 'comic_bought_order.comic_bought_id', '=', 'comic_boughts.id')->join('comics', 'comic_boughts.comic_id', '=', 'comics.id')->where('comics.user_id', '=', $user->id)->paginate(6);
        $comics_of_vendor = Comic::where('user_id', '=', $user->id)->paginate(6);

        return view('accountArea')
            ->with(compact('user'))
            ->with(compact('notifications'))
            ->with(compact('orders'))
            ->with(compact('list'))
            ->with(compact('paymentMethods'))
            ->with(compact('shippingAddresses'))
            ->with(compact('orders_of_vendor'))
            ->with(compact('comics_of_vendor'));
    }


}
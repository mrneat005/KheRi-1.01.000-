<?php

namespace KheRi\Http\Controllers;

use Illuminate\Http\Request;
use KheRi\Products;
use KheRi\User;
use Session;
use Illuminate\Support\Facades\Auth;
use DarryIdecode\Cart\Cart;

class cartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //


//$cartItems = \Cart::session(auth()->id())->getContent();
$items = \Cart::session(auth()->id())->getContent();
return $items;



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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        return 123;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
       
// finding targeted product
        $product= Products::findOrFail($id);

        $rowId = uniqid($product->id); // generate a unique() Product ID
        $user = Auth::user();
        $userID = $user->id; // the user ID to bind the cart contents

       

// add the product to cart
\Cart::session($userID)->add(array(
    'id' => $rowId,
    'name' => $product->name,
    'price' => $product->price,
    'main_photo' => $product->main_photo,
    'quantity' => 1,
    'associatedModel' => $product
));

$items = \Cart::getContent();
return $items;



        /*
        $product= Products::findOrFail($id); 
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart =new Cart($oldCart);
        $cart->add($product, $product->id);

        $request->session()->put('cart',$cart);
*/
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        //
         // generate a unique() Product ID
        $user = Auth::user();
        $userID = $user->id; // the user ID to bind the cart contents
        \Cart::session($userID)->remove($id);
    }
}

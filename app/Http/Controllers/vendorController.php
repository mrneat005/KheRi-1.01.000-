<?php

namespace KheRi\Http\Controllers;

use Illuminate\Http\Request;
use KheRi\Vendor;
class vendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Vendor::latest()->paginate(5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return 123;
        /*

         // return 123;

       $this->validate($request,[
        'name' => 'required|string|max:60',
        'main_photo' => 'required',
        'color' => 'required|string|max:191',
        'price' => 'int|required',
        'weight' => 'required',
        'section_id' => 'required',
        'catagory_id' => 'required',

    ]);

        $mainPhoto = $request->main_photo;

        $name = time().'.' . explode('/', explode(':', substr($request->main_photo, 0, strpos($request->main_photo, ';')))[1])[1];
            \Image::make($request->main_photo)->save(public_path('img/products/').$name);
            $request->merge(['main_photo' => $name]);
           // $request->name = $name;
           //it will take new value
           $request->merge(['main_photo' => $name]);



           $mainProductPhoto = public_path('img/products/').$mainPhoto;
           if(file_exists($mainProductPhoto)){
               @unlink($mainProductPhoto);
             }

        if(!empty($request->password)){
            $request->merge(['password' => Hash::make($request['password'])]);
        }

        


           return Products::create([
            'name'=>$request['name'],
            'catagory_id'=>$request['catagory_id'],
            'section_id'=>$request['section_id'],
            'main_photo'=>$request['main_photo'],
            'side_photo'=>$request['side_photo'],
            'code'=>$request['code'],
            'color'=>$request['color'],
            'discription'=>$request['discription'],
            'price'=>$request['price'],
            'discount'=>$request['discount'],
            'weight'=>$request['weight'],
            'size'=>$request['size'],
            'stock'=>$request['stock'],
            'url'=>$request['url'],
            'is_featured'=>$request['is_featured'],
            'meta_title'=>$request['meta_title'],
            'meta_discription'=>$request['meta_discription'],
            'mete_keyword'=>$request['meta_keyword'],
            'status'=>$request['status'],
        ]);
        */

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    

         // return 123;

       $this->validate($request,[
        'shop_name' => 'required|string|max:60',
        'Address' => 'required|string|max:60',
        'Location' => 'required|string|max:60',
        'discription' => 'required|string|max:60',
        'main_photo' => 'required',
        'plan' => 'required',
    ]);


    $mainPhoto = $request->main_photo;

    $name = time().'.' . explode('/', explode(':', substr($request->main_photo, 0, strpos($request->main_photo, ';')))[1])[1];
        \Image::make($request->main_photo)->save(public_path('img/sellers/').$name);
        $request->merge(['main_photo' => $name]);
       // $request->name = $name;
       //it will take new value
       $request->merge(['main_photo' => $name]);



       $mainSellerPhoto = public_path('img/sellers/').$mainPhoto;
       if(file_exists($mainSellerPhoto)){
           @unlink($mainSellerPhoto);
         }

           return Vendor::create([
            'shop_name'=>$request['shop_name'],
            'Address'=>$request['Address'],
            'Location'=>$request['Location'],
            'main_photo'=>$request['main_photo'],
            'plan'=>$request['plan'],
            'discription'=>$request['discription'],
            'status'=>'Verifies',
            //modified with payment
            
        ]);
        
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
        //
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
    }
}

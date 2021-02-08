<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\sections;
use App\Products;
use App\Catagories;
use App\User;

class sectionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return sections::latest()->paginate(5);
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
        //Server validation
//we can also use axios and classes custon for this
$this->validate($request,[
    'name' => 'required|string|max:60',
    'status' => 'required',
    
]);


        
        //return ['message'=>'I have your data and i am store'];
        return sections::create([
            'name'=>$request['name'],
            'status'=>$request['status'],
            
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

        $section= sections::findOrFail($id);
        $this->validate($request,[
            'name' => 'required|string|max:60',
            'status' => 'required',
        
        ]);
        
        $section->update([  
        'name'=>$request['name'],
        'status'=>$request['status'],
]);

        return ['Message'=> $section];


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
                //finding user id  
       $section= sections::findOrFail($id);
       //now deleting this user
      $section->delete();
    }

    public function search(){

        if ($search = \Request::get('q')) {
            $sections = sections::where(function($query) use ($search){
                $query->where('name','LIKE',"%$search%")
                        ;
            })->paginate(5);
        }else{
            $sections = sections::latest()->paginate(5);
        }

        return $sections;

    }




}

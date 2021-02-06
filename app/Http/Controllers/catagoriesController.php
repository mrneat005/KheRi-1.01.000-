<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Catagories;

class catagoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Catagories::latest()->paginate(5);
    }

    public function catagoriesMatched($id)
    {
        //
       // $section= sections::findOrFail($id);
        return 123;
        
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
    //echo "<pre>"; print_r($request); die;
    $this->validate($request,[
        'name' => 'required|string|max:60',
        'discount' => 'required|integer|max:60',
        'status' => 'required',
        'url' => 'required',
        'discription' => 'required',
        'meta_keyword' => 'required',
        'meta_discription' => 'required',
        'meta_title' => 'required',
        
    ]);
    
    
            
            //return ['message'=>'I have your data and i am store'];
            return Catagories::create([
                'name'=>$request['name'],
                'parent_id'=>$request['parent_id'],
                'section_id'=>$request['section_id'],
                'url'=>$request['url'],
                'discription'=>$request['discription'],
                'discount'=>$request['discount'],
                'meta_title'=>$request['meta_title'],
                'meta_keyword'=>$request['meta_keyword'],
                'meta_discription'=>$request['meta_discription'],
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

        $cata= Catagories::findOrFail($id);
        $this->validate($request,[
            'name' => 'required|string|max:60',
            
        ]);
        
        $cata->update([  
            'name'=>$request['name'],
            'parent_id'=>$request['parent_id'],
            'section_id'=>$request['section_id'],
            'url'=>$request['url'],
            'discription'=>$request['discription'],
            'discount'=>$request['discount'],
            'meta_title'=>$request['meta_title'],
            'meta_keyword'=>$request['meta_keyword'],
            'meta_discription'=>$request['meta_discription'],
            'status'=>$request['status'],
]);


    }



    public function search(){

        if ($search = \Request::get('q')) {
            $cata = Catagories::where(function($query) use ($search){
                $query->where('name','LIKE',"%$search%")
                        ;
            })->paginate(5);
        }else{
            $cata = Catagories::latest()->paginate(5);
        }

        return $cata;

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
            //
                //finding user id  
       $cata= Catagories::findOrFail($id);
       //now deleting this user
     $cata->delete();
    }
}

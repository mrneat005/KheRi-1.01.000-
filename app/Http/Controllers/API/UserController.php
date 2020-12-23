<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //return ['message'=>'I have your data and i am index'];

return User::latest()->paginate(10);
//return User::all()->paginate(10);



        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//Server validation
//we can also use axios and classes custon for this
$this->validate($request,[
    'name' => 'required|string|max:60',
    'email' => 'required|string|max:191|unique:users',
    'password' => 'required|string|min:6|max:60',
    'bio' => 'string|max:191',

]);


        //
        //return ['message'=>'I have your data and i am store'];
        return User::create([
            'name'=>$request['name'],
            'email'=>$request['email'],
            'type'=>$request['type'],
            'bio'=>$request['bio'],
            'photo'=>$request['photo'],
            'password'=>Hash::make($request['name']),
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user= User::findOrFail($id);
        $this->validate($request,[
            'name' => 'required|string|max:60',
            'email' => 'required|string|max:191|unique:users,email,'.$user->id,
            'password' => 'sometimes|string|min:6|max:60',
            'bio' => 'string|max:191',
        
        ]);
        
        $user->update([  
        'name'=>$request['name'],
        'email'=>$request['email'],
        'type'=>$request['type'],
        'bio'=>$request['bio'],
        'photo'=>$request['photo'],
        'password'=>Hash::make($request['name']),]);

        return ['Message'=> $user];
        /*
        $user = User::findOrFail($id);

        $this->validate($request,[
            'name' => 'required|string|max:60',
            'email' => 'required|string|max:191|unique:users',$user->id,
            'password' => 'sometimes|string|min:6|max:60',
            'bio' => 'string|max:191',
        
        ]);
         $user->update($request->all());
*/
      //  return ['message'=>'updated the data'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //finding user id  
       $user= User::findOrFail($id);
        //now deleting this user
       $user->delete();

    }
}

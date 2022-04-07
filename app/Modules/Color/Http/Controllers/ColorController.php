<?php

namespace App\Modules\Color\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Color\Models\Color;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;

class ColorController extends Controller
{

    public function welcome()
    {
        $data=color::where('deleted_at',0)->get();

    	return view('Color::index',['colors'=>$data]);
    }
    public function edit($id)
    {
    $colors = Color::find($id);
    return view('Color::edit', compact('colors'));
    }
    public function update(request $request, $id)
    {
        $request-> validate([
            'name'=>'required |alpha|min:3|max:10|regex:/^\S*$/u',
        ]);

       $colors = Color::find($id);
        $colors->name=$request->name;
        $colors-> update();
        $data=Color::all();
        return back()->with('success','Item created successfully!');   

    }


    public function changeStatus(Request $request)
    {
        $status= Color::find($request->id);
        $status->status=$request->status;
        $status->save();
    }

    public function formdata(){
        return view('Color::add');
    }
    public function getdata(Request $request){
        $request-> validate([
            'name'=>'required |alpha|unique:colors|regex:/^\S*$/u',
        ]);
        
        $status = $request->status;
        if($status == 'inactive'){
            $status = 0;
        }else{
            $status = 1;
        }

        $user_id = Auth::user()->id;
        
         $colors =new Color;
      
         $colors->name=$request->name;
         $colors->user_id=$user_id;
         $colors->status=$status;
         $colors->deleted_at=0;
         $colors-> save();
         return back()->with('success','Item created successfully!');   
        
         $data=color::all();
    
    }
    function deletedata(Request $request)
    {
        $colors = Color::find($request->id);
        $colors->deleted_at = 1;
        $colors->save();
        return response('$colors');    

    }  
    
    function showtrash()
    {
    $colors = Color::where('deleted_at',1)->get();
    return view('Color::trash',['colors'=>$colors]);
    }

    function restoretrash(Request $request)
    {
        $affected = DB::table('colors')
                    ->update(['deleted_at' => 0]);
    }

    function Restoreall(Request $request)
    {
        // $colors = Color::find($request->id);
        // $colors->delete();
        $colors = Color::find($request->id);
        $colors->deleted_at=0;
        $colors->save();
        return response('$colors');
    }
     
}
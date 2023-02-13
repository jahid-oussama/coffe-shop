<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class Category extends Controller
{
    //
    public function index()
    {
        $categories = categories::latest()->paginate(5);
        #$trachCat=Category::onlyTrashed()->query();
        return view('admin.category', compact('categories'));
    }

    public function Add(Request $request)
    {
        $validatedData = $request->validate(
            ['name' => 'required|unique:categories|max:255',],
            [
                'name.required' => 'Please Input Category Name',
                'name.max'      => 'Please Input Category Name between  8 charater and 280 character'
            ]
        );
        $data = array();
        $data['name'] = $request->name;
        $data['user_id'] = Auth::user()->id;
        DB::table('categories')->insert($data);
        return Redirect()->back()->with('success', 'Category Inserted Succesefly');
    }
    
    public function destroy($id)
    {
        Categories::destroy($id);
        return Redirect()->back()->with('success', 'Category Inserted Succesefly');
    }

    public function Edit($id){
        #$categories=Category::find($id);
        $categories=DB::table('categories')->where('id',$id)->first();
        return view('admin.editeCategory',compact('categories'));
    }
    public function Update(Request $request,$id){

        $data=array();
        $data['name']=$request->name;
        $data['user_id']=Auth::user()->id;
        DB::table('categories')->where('id',$id)->update($data);
        return Redirect()->route('all.category')->with('success','Category Updated Su ccesfly');
    }
}

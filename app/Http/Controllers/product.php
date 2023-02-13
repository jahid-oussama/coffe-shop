<?php

namespace App\Http\Controllers;

use App\Models\Prodacts;
use App\Models\categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class product extends Controller
{
    //
    public function index()
    {
        $products = Prodacts::latest()->paginate(5);
        $categories=categories::all();
        #$trachCat=Category::onlyTrashed()->query();
        return view('admin.product', compact('products','categories'));
    }
    public function Add(Request $request)
    {
        
        $validatedData = $request->validate(
            [
                'name' => 'required|max:255',
                'description'=>'required',
                'prix'=>'required',
                'image'=>'required',
                'category'=>'required',
            ],
            [
                'name.required' => 'Please Input Category Name',
                'name.max'      => 'Please Input Category Name between  8 charater and 280 character'
                ]
            );
       
            if($request->has('image')){
                $file=$request->image;
                $imagename =time().''.$file->getClientOriginalName();
                $file->move(public_path('uploads'), $imagename );
            }


            $data = array();
            $data['name'] = $request->name;
        $data['description'] = $request->description;
        $data['prix'] = $request->prix;
        $data['image'] = $imagename;
        $data['category_id'] = $request->category;
        // $data['user_id'] = Auth::user()->id;
        Prodacts::create($data);
        return Redirect()->back()->with('success', 'prodacts Inserted Succesefly');
    }


    public function destroy($id)
    {
        Prodacts::destroy($id);
        return Redirect()->back()->with('success', 'Category Inserted Succesefly');
    }
    public function Edit($id){
        #$categories=Category::find($id);
        $categories=categories::all();
        $Prodacts=DB::table('Prodacts')->where('id',$id)->first();
        return view('admin.editeProduct',compact('Prodacts','categories'));
    }
    public function Update(Request $request,$id){
        
        $data=array();
        $data['name']=$request->name;
        $data['description']=$request->description;
        $data['prix']=$request->prix;
        $data['category_id']=$request->category;

       
        if($request->has('image')){
            $file=$request->image;
            $imagename =time().''.$file->getClientOriginalName();
            $file->move(public_path('uploads'), $imagename );
            $data['image']=$imagename;
        }else{
            $data['image'] = $request->old_imge;
        }
        // var_dump('name');
        //     die;

        DB::table('Prodacts')->where('id',$id)->update($data);
        return Redirect()->route('all.product')->with('success','Category Updated Su ccesfly');
    }


}

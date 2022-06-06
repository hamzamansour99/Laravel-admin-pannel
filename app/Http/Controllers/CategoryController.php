<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function ALLCAT(){
        // $categories=DB::table('categories')
        // ->join('users','categories.user_id','users.id')
        // ->select('categories.*','users.name')
        // ->latest()->paginate(5);

        $categories=category::latest()->paginate(5);
        $trachCat=category::onlyTrashed()->latest()->paginate(3);

        // $categories=DB::table('categories')->latest()->paginate(5);
        return view('admin.category.index',compact('categories','trachCat'));
    }


    public function AddCAT(Request $request){

            $validatedData = $request->validate([
                'category_name' => 'required|unique:categories|max:255'],
            [
                'category_name.required' => 'Please input Category Name',
                'category_name.max' => 'Category Name must be less than 255 Char',
               
            ]);

        //Method 1 using Eloquent ORM  

            category::insert(['category_name'=>$request->category_name,
                              'user_id'=>Auth::user()->id,
                              'created_at'=>Carbon::now()
        ]);
        

        //METHOD 2 using Eloquent ORM

        // $category=new Category();
        // $category->category_name=$request->category_name;
        // $category->user_id=Auth::user()->id;
        // $category->save();


        //Using Query Builder

        // $data=array();
        // $data['category_name']=$request->category_name;
        // $data['user_id']=Auth::user()->id;
        // DB::table('categories')->insert($data);



        return Redirect()->back()->with('success','Category Inserted');
        }
        public function Edit($id){
            // Eloquent Edit 

            // $categories=Category::find($id);

            // query builder Edit
            $categories=DB::table('categories')->where('id',$id)->first();
            return view('admin.category.edit',compact('categories'));

        }
        public function Update(Request $request,$id){
            // Eloquent Update

            // $update=Category::find($id)->update(['category_name'=>
            // $request->category_name , 'user_id'=>Auth::user()->id]);

            // query builder Update
            $data = array();
            $data['category_name']=$request->category_name; 
            $data['user_id']=Auth::user()->id;
            DB::table('categories')->where('id',$id)->update($data);

            return Redirect()->route('all.category')->with('success','Category Updated');

        }
        public function SoftDelete($id){
            $delete = Category::find($id)->delete();
            return Redirect()->back()->with('success','Category SoftDeleted');
        }
        public function Restore($id){
            $delete=Category::withTrashed()->find($id)->restore();
            return Redirect()->back()->with('success','Category Restored');

        }

        public function PDelete($id){
            $delete=Category::onlyTrashed()->find($id)->forceDelete();
            return Redirect()->back()->with('success','Category ForceDeleted');


        }
    
}

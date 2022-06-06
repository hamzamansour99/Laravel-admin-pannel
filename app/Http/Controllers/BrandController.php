<?php

namespace App\Http\Controllers;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use App\Models\Brand;
use Image;
use Auth;
use App\Models\Multipic;
use Illuminate\Support\Facades\DB;


class BrandController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    } 

    public function ALLBrand(){

        $brands=Brand::latest()->paginate(5);
        return view('admin.brand.index',compact('brands'));
    } 


    public function StoreBrand(Request $request){

        $validatedData = $request->validate([
            'brand_name' => 'required|unique:brands|min:4' ,
            'brand_image' => 'required|mimes:jpg,jpeg,png',
        
        ],    
        [
            'brand_name.required' => 'Please input brand Name',
            'brand_name.min' => 'brand Name must be at least 4 Char',
        ]);

        $brand_image=$request->file('brand_image');

        // insert image without resizing

        // $name_gen=hexdec(uniqid());
        // $img_ext=strtolower($brand_image->getClientOriginalExtension());
        // $img_name=$name_gen.'.'.$img_ext;
        // $up_location='image/brand/';
        // $last_img=$up_location.$img_name;
        // $brand_image->move($up_location,$img_name);

        // insert image with resizing

        $name_gen=hexdec(uniqid()).'.'.$brand_image->getClientOriginalExtension();
        Image::make($brand_image)->resize(300,200)->save('image/brand/'.$name_gen);
        $last_img='image/brand/'.$name_gen;




        Brand::insert(['brand_name'=>$request->brand_name,
                       'brand_image'=>$last_img,
                       'brand_details'=>$request->brand_details,

                       'created_at'=>Carbon::now()
    ]);
        $notification=array('message'=>'Brand Inserted',
                            'alert-type'=>'success'
    
    );
        return Redirect()->back()->with($notification);
        // return Redirect()->back()->with('success','Brand Inserted');


    }
    public function Edit($id){
        $brands=Brand::find($id);
        return view('admin.brand.edit',compact('brands'));
    }
    public function Update(Request $request,$id){

        $validatedData = $request->validate([
            'brand_name' => 'required|min:4' ,
        ],    
        [
            'brand_name.required' => 'Please input brand Name',
            'brand_name.min' => 'brand Name must be at least 4 Char',
        ]);
        $old_img=$request->old_image;
        $brand_image=$request->file('brand_image');

        if($brand_image){
            $name_gen=hexdec(uniqid());
            $img_ext=strtolower($brand_image->getClientOriginalExtension());
            $img_name=$name_gen.'.'.$img_ext;
            $up_location='image/brand/';
            $last_img=$up_location.$img_name;
            $brand_image->move($up_location,$img_name);
    
            unlink($old_img);
    
            Brand::find($id)->update(['brand_name'=>$request->brand_name,
                           'brand_image'=>$last_img,
                           'brand_details'=>$request->brand_details,
                           'created_at'=>Carbon::now()
        ]);
            // return Redirect('brand/all')->with('success','Brand Updated');
            $notification=array('message'=>'Brand Updated',
            'alert-type'=>'info');
                                                            
            return Redirect()->route('all.brand')->with($notification);

        }

        
        else{
            
            Brand::find($id)->update(['brand_name'=>$request->brand_name,
                                      'brand_details'=>$request->brand_details,
                           
                           'created_at'=>Carbon::now()
        ]);
        $notification=array('message'=>'Brand Updated',
            'alert-type'=>'warning');
            return Redirect()->route('all.brand')->with($notification);
            // return Redirect('brand/all')->with('success','Brand Updated');

        }

    }

    public function Delete($id){
        $img=Brand::find($id);
        $old_img=$img->brand_image;
        unlink($old_img);
        Brand::find($id)->delete();
        $notification=array('message'=>'Brand Deleted',
            'alert-type'=>'error');
            return Redirect()->back()->with($notification);
        // return Redirect()->back()->with('success','Brand Deleted');
    }

    // methods for multi image

    public function Multpic(){
        
        $images=DB::table('multipics')->latest()->get();
        // $images=Multipic::all()->paginate(5);
        return view('admin.multipic.index',compact('images'));

    }
    public function StoreImage(Request $request){

        $image=$request->file('image');

        foreach($image as $multi_img){

        
        $name_gen=hexdec(uniqid()).'.'.$multi_img->getClientOriginalExtension();
        Image::make($multi_img)->resize(300,300)->save('image/multi/'.$name_gen);
        $last_img='image/multi/'.$name_gen;




        Multipic::insert([
                       'image'=>$last_img,
                       'created_at'=>Carbon::now()
    ]);
    } // end of loop
        return Redirect()->back()->with('success','Images Inserted');


    }
    public function Logout(){

        Auth::Logout();
        return Redirect()->route('login')->with('success','User Logout');
    }
    public function DeleteM($id){
        
         $old_img=Multipic::find($id)->image;
         unlink($old_img);
         Multipic::find($id)->delete();
        return Redirect()->back()->with('success','Image Deleted');
    }
}

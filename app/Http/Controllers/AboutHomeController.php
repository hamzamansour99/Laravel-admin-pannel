<?php

namespace App\Http\Controllers;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use App\Models\HomeAbout;
use App\Models\Multipic;
use Illuminate\Support\Facades\DB;
use App\Models\OurTeam;
use App\Models\skills;

class AboutHomeController extends Controller
{
    public function HomeAbout(){
        $homeabout=HomeAbout::latest()->get();
        return view('admin.HomeAbout.index',compact('homeabout'));
    }

    public function AddAbout(){
        return view('admin.HomeAbout.create');
    }
    public function StoreAbout(Request $request){
        HomeAbout::insert(['title'=>$request->title,
        'short_description'=>$request->short_description,
        'long_description'=>$request->long_description,
        'created_at'=>Carbon::now()
]);
return Redirect()->route('home.about')->with('success','About Data Inserted');

    }

    public function Edit($id){
        $About=HomeAbout::find($id);
        return view('admin.HomeAbout.edit',compact('About'));
    }

    public function UpdateAbout(Request $request,$id ){
        HomeAbout::find($id)->update(['title'=>$request->title,
                           'short_description'=>$request->short_description,
                           'long_description'=>$request->long_description,
                           'created_at'=>Carbon::now()
        ]);
            return Redirect('home/about')->with('success','About Updated');


    }

    public function Delete($id){
        HomeAbout::find($id)->delete();
        return Redirect()->back()->with('success','About Data Deleted');
    }

    public function Portfolio(){
        $images=Multipic::all();

        return view('pages.Portfolio',compact('images'));
    }
    public function AboutUs(){
        $AboutUs=DB::table('home_abouts')->first();
        $team=OurTeam::latest()->get();
        $skills=Skills::latest()->get();


        return view('pages.about',compact('AboutUs','team','skills'));
    }
    

}

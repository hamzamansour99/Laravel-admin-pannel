<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skills;
use Illuminate\Support\Carbon;

class SkillController extends Controller
{
    public function TeamSkills(){
        $skills=Skills::latest()->get();
        return view('admin.skills.index',compact('skills'));

    }

    public function AddSkill(){
        return view('admin.skills.create');
    }

    public function StoreSkill(Request $request){
        Skills::insert(['skill'=>$request->skill,
                       'percentage'=>$request->percentage,
                    //    'created_at'=>Carbon::now()
                                                            ]);

        // return Redirect()->route('team.skills')->with('success','skill Inserted');                                                    

        return response()->json(
            'success'
         );
    }
    public function DeleteSkill($id){
        Skills::find($id)->delete();
        return Redirect()->back()->with('success','Member Skill is Deleted');

    }
    public function Editskill($id){
        $skills=Skills::find($id);
        return view('admin.skills.edit',compact('skills'));
    }
    public function UpdateSkills(Request $request,$id){
        Skills::find($id)->update(['skill'=>$request->skill,
                                   'percentage'=>$request->percentage,
                                   'created_at'=>Carbon::now()
                                                              ]);
return Redirect('team/skills')->with('success','Skills Data Updated');
    }

    public function ChartJs(){
        return view('admin.chart.index');
    }

    public function Search(){
          $search_text=$_GET['query'];
          $search_text1=Skills::get('skill');
          $search_text2=Skills::get('percentage');


        // $search_text=$request->$_POST['query'];
        if($search_text1){
            $searched=Skills::where('skill','LIKE','%'.$search_text.'%')->get();
            return view('admin.skills.search',compact('searched'));
        }
        if($search_text2){
            $searched=Skills::where('percentage','LIKE','%'.$search_text.'%')->get();
            return view('admin.skills.search',compact('searched'));

        }
       
        
    }
}

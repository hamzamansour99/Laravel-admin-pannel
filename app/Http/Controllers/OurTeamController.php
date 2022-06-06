<?php

namespace App\Http\Controllers;
use App\Models\OurTeam;
use Illuminate\Http\Request;
use Image;
use Illuminate\Support\Carbon;

class OurTeamController extends Controller
{
    public function OurTeam(){
        $teams=OurTeam::latest()->get();
        return view('admin.OurTeam.index',compact('teams'));

    }
    public function AddMember(){
        return view('admin.OurTeam.create');
    }
    public function StoreMember(Request $request){
        $member_image=$request->file('image');

        // insert image with resizing
    
        $name_gen=hexdec(uniqid()).'.'.$member_image->getClientOriginalExtension();
        Image::make($member_image)->resize(1920,1088)->save('image/members/'.$name_gen);
        $last_img='image/members/'.$name_gen;
    
        OurTeam::insert(['name'=>$request->name,
                       'position'=>$request->position,
                       'image'=>$last_img,
                       'facebook'=>$request->facebook,
                       'instagram'=>$request->instagram,
                       'linkedin'=>$request->linkedin,
                       'created_at'=>Carbon::now()
    ]);
        return Redirect()->route('our.team')->with('success','Member Inserted');


    }
    public function DeleteMember($id){
        OurTeam::find($id)->delete();
        return Redirect()->back()->with('success','Member Team is Deleted');

    }

    public function EditTeam($id){
        $members=OurTeam::find($id);
    return view('admin.OurTeam.edit',compact('members'));
    }

    public function UpdateMember(Request $request,$id){
        $old_img=$request->old_image;
        $member_image=$request->file('image');

        if($member_image){
            $name_gen=hexdec(uniqid());
            $img_ext=strtolower($member_image->getClientOriginalExtension());
            $img_name=$name_gen.'.'.$img_ext;
            $up_location='image/members/';
            $last_img=$up_location.$img_name;
            $member_image->move($up_location,$img_name);
    
            unlink($old_img);
    
            OurTeam::find($id)->update(['name'=>$request->name,
                           'position'=>$request->position,
                           'image'=>$last_img,
                           'facebook'=>$request->facebook,
                           'instagram'=>$request->instagram,
                           'linkedin'=>$request->linkedin,
                           'created_at'=>Carbon::now()
        ]);
            return Redirect('our/team')->with('success','Team Member Updated');

        }
        else{
            
            OurTeam::find($id)->update(['name'=>$request->name,
                                        'position'=>$request->position,
                                        'facebook'=>$request->facebook,
                                        'instagram'=>$request->instagram,
                                        'linkedin'=>$request->linkedin,
                                        'created_at'=>Carbon::now()
        ]);
            return Redirect('our/team')->with('success','Team Member Updated');

        }
    }
}

<?php

namespace App\Http\Controllers;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\ContactForm;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
   public function AdminContact(){
       $contacts=Contact::all();
       return view('admin.contact.index',compact('contacts'));
   }
   public function AdminAddContact(){
       return view('admin.contact.create');
   }
   public function StoreContact(Request $request ){
    Contact::insert(['address'=>$request->address,
    'email'=>$request->email,
    'phone'=>$request->phone,
    'created_at'=>Carbon::now()
]);
return Redirect()->route('admin.contact')->with('success','Contact Data Inserted');

   }
   public function Edit($id){
    $Contact=Contact::find($id);
    return view('admin.contact.edit',compact('Contact'));

   }
   public function UpdateContact(Request $request ,$id){
    Contact::find($id)->update(['address'=>$request->address,
    'email'=>$request->email,
    'phone'=>$request->phone,
    'created_at'=>Carbon::now()
]);
return Redirect('admin/contact')->with('success','Contact Data Updated');


   }
   public function Delete($id){
    Contact::find($id)->delete();
        return Redirect()->back()->with('success','Contact Data Deleted');
}
public function Contact(){
    $contacts=DB::table('contacts')->first();
    return view('pages.contact',compact('contacts'));
}
public function ContactForm(Request $request){
    ContactForm::insert(['name'=>$request->name,
    'email'=>$request->email,
    'subject'=>$request->subject,
    'message'=>$request->message,
    'created_at'=>Carbon::now()
]);
return Redirect()->route('contact')->with('success','your message send Successfully');
}
public function AdminMessage(){
    $messages=ContactForm::all();
    return view('admin.contact.message',compact('messages'));
}

public function DeleteMessage($id){
    ContactForm::find($id)->delete();
        return Redirect()->back()->with('success','Contact Message Deleted');



   
}
}

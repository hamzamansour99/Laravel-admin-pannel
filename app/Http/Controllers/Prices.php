<?php

namespace App\Http\Controllers;
use App\Models\Pricing;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class Prices extends Controller
{
    public function PricingPage(){
        $prices=Pricing::all();
        return view('pages.pricing',compact('prices'));
    }
    public function PricingPageIndex(){
        $prices=Pricing::all();
        return view('admin.pricing.index',compact('prices'));
    }
    public function AddPrice(){
        return view('admin.pricing.create');
    }
    public function StorePricing(Request $request){
        Pricing::insert(['offer_topic'=>$request->offer_topic,
        'offer_type'=>$request->offer_type,
        'price'=>$request->price,
        'old_price'=>$request->old_price,
        'duration'=>$request->duration,
        'offer_description'=>$request->offer_description,
        'created_at'=>Carbon::now()
]);
return Redirect()->route('Pricing.index')->with('success','Pricing Data Inserted');
    }

    public function EditPrices($id){
        $prices=Pricing::find($id);
        return view('admin.Pricing.edit',compact('prices'));

    }

    public function Update(Request $request,$id){
        Pricing::find($id)->update(['offer_topic'=>$request->offer_topic,
                                    'offer_type'=>$request->offer_type,
                                    'price'=>$request->price,
                                    'old_price'=>$request->old_price,
                                    'duration'=>$request->duration,
                                    'offer_description'=>$request->offer_description,
                                    'created_at'=>Carbon::now()
                                                              ]);
        return Redirect()->route('Pricing.index')->with('success','Pricing Data Updated');
    }

    public function Delete($id){
        Pricing::find($id)->delete();
        return Redirect()->back()->with('success','Pricing is Deleted');
    }

}

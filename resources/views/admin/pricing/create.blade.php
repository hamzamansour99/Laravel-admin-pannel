@extends('admin.admin_master')
@section('admin')

<div class="col-lg-12">
    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2>New Pricing Data</h2>
        </div>
        <div class="card-body">
            <form action="{{route('store.pricing')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlInput1">Offer Topic :</label>                  
                    <select name="offer_topic" style="padding-left:150px;padding-right:150px;padding-top:10px;padding-bottom:10px;" id="cars">
                        <option value="Free">Free</option>
                        <option value="Not Free">Not Free</option>
                    </select>
                   
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Offer Type</label>
                    <input type="text" name="offer_type" class="form-control" id="exampleFormControlInput1" placeholder="Type">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Offer price</label>
                    <input type="number" name="price" class="form-control" id="exampleFormControlInput1" placeholder="price">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Offer old price</label>
                    <input type="number" name="old_price" class="form-control" id="exampleFormControlInput1" placeholder="old Price">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Offer Duration :</label>
                    <select style="padding-left:150px;padding-right:150px;padding-top:10px;padding-bottom:10px;"name="duration" id="cars">
                        <option value="Day">Day</option>
                        <option value="Week">Week</option>
                        <option value="Month">Month</option>
                        <option value="Year">Year</option>
                    </select>
                    
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">offer description</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" name="offer_description" rows="3"></textarea>
                </div>
                
                
                <div class="form-footer pt-4 pt-5 mt-4 border-top">
                    <button type="submit" class="btn btn-primary btn-default">Submit</button>
                    <button type="reset" class="btn btn-secondary btn-default">Reset</button>
                </div>
            </form>
        </div>
    </div>

   
@endsection
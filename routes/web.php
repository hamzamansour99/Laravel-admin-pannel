<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\HTTP\Controllers\CategoryController;
use App\HTTP\Controllers\BrandController;
use App\HTTP\Controllers\HomeController;
use App\HTTP\Controllers\AboutHomeController;
use App\HTTP\Controllers\ContactController;
use App\HTTP\Controllers\ChangePasswordController;
use App\HTTP\Controllers\OurTeamController;
use App\HTTP\Controllers\SkillController;
use App\HTTP\Controllers\Prices;
use App\Models\OurTeam;
use App\Models\Skills;



Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/', function () {
    $brands=DB::table('brands')->get();
    $about=DB::table('home_abouts')->first();
    $images=DB::table('multipics')->get();
    $team=OurTeam::latest()->get();
    $skills=Skills::latest()->get();
    
    return view('home',compact('brands','about','images','team','skills'));
});

//category controller
Route::get('category.all', [CategoryController::class,'ALLCAT'])->name('all.category');

//add category FORM
Route::post('category.add', [CategoryController::class,'AddCAT'])->name('store.category');

//Edit
Route::get('/category/edit/{id}', [CategoryController::class,'Edit']);

//Edit FORM URL
Route::post('category/update/{id}', [CategoryController::class,'Update']);

// SoftDelete
Route::get('softdelete/category/{id}', [CategoryController::class,'SoftDelete']);

// Restore Data
Route::get('category/restore/{id}', [CategoryController::class,'Restore']);

// Pdalete Data
Route::get('category/pdelete/{id}', [CategoryController::class,'PDelete']);
 
// Brand Controller
Route::get('/brand/all', [BrandController::class,'ALLBrand'])->name('all.brand');

//add brand FORM
Route::post('/brand/add', [BrandController::class,'StoreBrand'])->name('store.brand');

//Edit for brand
Route::get('/brand/edit/{id}', [BrandController::class,'Edit']);

//update FORM for brand
Route::post('brand/update/{id}', [BrandController::class,'Update']);

// delete brand
Route::get('brand/delete/{id}', [BrandController::class,'Delete']);

// multi image route
Route::get('/multi/image', [BrandController::class,'Multpic'])->name('multi.image');

//add multi image FORM
Route::post('multi/add', [BrandController::class,'StoreImage'])->name('store.image');

//'multi/delete/
Route::get('multi/delete/{id}', [BrandController::class,'DeleteM']);


//admin all route
Route::get('/home/slider', [HomeController::class,'HomeSlider'])->name('home.slider');

Route::get('/add/slider', [HomeController::class,'AddSlider'])->name('add.slider');

Route::post('/store/slider', [HomeController::class,'StoreSlider'])->name('store.slider');

Route::get('/slider/edit/{id}', [HomeController::class,'Edit']);

Route::post('slider/update/{id}', [HomeController::class,'Update']);

Route::get('slider/delete/{id}', [HomeController::class,'Delete']);

// home about all route
Route::get('/home/about', [AboutHomeController::class,'HomeAbout'])->name('home.about');

Route::get('/add/about', [AboutHomeController::class,'AddAbout'])->name('add.about');

Route::post('/store/about', [AboutHomeController::class,'StoreAbout'])->name('store.about');

Route::get('/about/edit/{id}', [AboutHomeController::class,'Edit']);

Route::post('/update/abouthome/{id}', [AboutHomeController::class,'UpdateAbout']);

Route::get('about/delete/{id}', [AboutHomeController::class,'Delete']);

//Portfolio page route

Route::get('/Portfolio', [AboutHomeController::class,'Portfolio'])->name('Portfolio');

// admin contact route

Route::get('/admin/contact', [ContactController::class,'AdminContact'])->name('admin.contact');

Route::get('/admin/add/contact', [ContactController::class,'AdminAddContact'])->name('add.contact');

Route::post('/admin/store/contact', [ContactController::class,'StoreContact'])->name('store.contact');

Route::get('contact/edit/{id}', [ContactController::class,'Edit']);

Route::post('/update/contact/{id}', [ContactController::class,'UpdateContact']);

Route::get('contact/delete/{id}', [ContactController::class,'Delete']);

Route::get('/admin/message', [ContactController::class,'AdminMessage'])->name('admin.message');

Route::get('message/delete/{id}', [ContactController::class,'DeleteMessage']);





//home contact page route

Route::get('/contact', [ContactController::class,'Contact'])->name('contact');

Route::post('/contact/form', [ContactController::class,'ContactForm'])->name('contact.form');

// change password and user profile route

Route::get('/user/password', [ChangePasswordController::class,'ChangePassword'])->name('change.password');

Route::post('/password/update', [ChangePasswordController::class,'UpdatePassword'])->name('password.updatee');

Route::get('/user/profile', [ChangePasswordController::class,'ProfileUpdate'])->name('profile.update');

Route::post('/profile/update', [ChangePasswordController::class,'UpdateProfile'])->name('p.update');

//about Us Page

Route::get('/AboutUs', [AboutHomeController::class,'AboutUs'])->name('About.Us');

//our team

Route::get('/our/team', [OurTeamController::class,'OurTeam'])->name('our.team');

Route::get('/add/member', [OurTeamController::class,'AddMember'])->name('add.member');

Route::post('/store/member', [OurTeamController::class,'StoreMember'])->name('store.member');

Route::get('team/delete/{id}', [OurTeamController::class,'DeleteMember']);

Route::get('team/edit/{id}', [OurTeamController::class,'EditTeam']);

Route::post('member/update/{id}', [OurTeamController::class,'UpdateMember']);



//skills

Route::get('/team/skills', [SkillController::class,'TeamSkills'])->name('team.skills');

Route::get('/add/skill', [SkillController::class,'AddSkill'])->name('add.skill');

//Route::post('/store/skill', [SkillController::class,'StoreSkill'])->name('store.skill');


Route::get('skill/delete/{id}', [SkillController::class,'DeleteSkill']);

Route::get('skill/edit/{id}', [SkillController::class,'Editskill']);

Route::post('skill/update/{id}', [SkillController::class,'UpdateSkills']);

//chart

Route::get('/chartjs', [SkillController::class,'ChartJs'])->name('Chart.js');

//search
Route::get('/search', [SkillController::class,'Search'])->name('Search'); 

//pricing

Route::get('/PricingPage', [Prices::class,'PricingPage'])->name('Pricing');

Route::get('/PricingPageAdmin', [Prices::class,'PricingPageIndex'])->name('Pricing.index');

Route::get('/PricingPageAdminAdd', [Prices::class,'AddPrice'])->name('add.price');

Route::post('store/pricing', [Prices::class,'StorePricing'])->name('store.pricing');

Route::get('price/edit/{id}', [Prices::class,'EditPrices']);

Route::post('pricing/update/{id}', [Prices::class,'Update']);

Route::get('price/delete/{id}', [Prices::class,'Delete']);






































Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    // $users=User::all();
    // $users=DB::table('users')->get();

    return view('admin.index');
})->name('dashboard');

//logout
Route::get('user/logout', [BrandController::class,'Logout'])->name('user.logout');





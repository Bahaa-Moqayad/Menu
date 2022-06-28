<?php

namespace App\Http\Controllers;

use App\Models\Meal;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class MealController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $meals = Meal::with('category')->paginate(10);
        return view('admin.meals.index',compact('meals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::select(['id','name'])->get();
        return view('admin.meals.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'image'=>'required',
            'description'=>'required',
            'price'=>'required',
            'status'=>'required',
            'category_id'=>'required'
        ]);
        if($request->status == 0){
            $status = 'متوفر';
        }else{
            $status = 'غير متوفر';
        }
        $new_image = rand().rand().time().$request->file('image')->getClientOriginalName();
        $new_image= str_replace(' ','',$new_image);
        $new_image= strtolower($new_image);
        $request->file('image')->move(public_path('uploads/images/meals'),$new_image);
        Meal::create([
            'name'=>$request->name,
            'image'=>$new_image,
            'description'=>$request->description,
            'price'=>$request->price,
            'sale_price'=>$request->sale_price,
            'status'=>$status,
            'category_id'=>$request->category_id
        ]);
        return redirect()->route('admin.meals.index')->with('msg','Meal Created Succesfully')->with('type','success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $meal = Meal::findOrFail($id);
        $categories = Category::select(['id','name'])->get();
        return view('admin.meals.edit',compact('meal','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required',
            'image'=>'nullable',
            'description'=>'required',
            'price'=>'required',
            'status'=>'required',
            'category_id'=>'required'
        ]);
        if($request->status == 0){
            $status = 'متوفر';
        }else{
            $status = 'غير متوفر';
        }
        $meal = Meal::findOrFail($id);
        $new_image= $meal->image;
        if($request->hasFile('image')){
            $new_image = rand().rand().time().$request->file('image')->getClientOriginalName();
            $new_image= str_replace(' ','',$new_image);
            $new_image= strtolower($new_image);
        $request->file('image')->move(public_path('uploads/images/meals'),$new_image);
        }

        DB::table('meals')->where('id',$id)->update([
            'name'=>$request->name,
            'image'=>$new_image,
            'description'=>$request->description,
            'price'=>$request->price,
            'sale_price'=>$request->sale_price,
            'status'=>$status,
            'category_id'=>$request->category_id
        ]);
        return redirect()->route('admin.meals.index')->with('msg','Meal Updated Succesfully')->with('type','info');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $meal = Meal::findOrFail($id);
        if(file_exists(public_path('uploads/images/meals/'. $meal->image))){
            File::delete(public_path('uploads/images/meals/'. $meal->image));
        }
        $meal->delete();
        return redirect()->route('admin.meals.index')->with('msg','Meal Deleted Succesfully')->with('type','danger');
    }
}

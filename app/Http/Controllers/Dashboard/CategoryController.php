<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Category,Feature,Frontage,Period,PopulationType,ResidenceType};
use App\Http\Requests\Dashboard\Category\CategoryRequest;

class CategoryController extends Controller
{
    public function index()
    {
          $categories = Category::latest()->paginate(100);
          return view('dashboard.category.index',compact('categories'));
        
    }
    public function create()
    {
      if (!request()->ajax()) {
        $features = Feature::latest()->get()->pluck('name_ar','id');
        $frontages = Frontage::latest()->get()->pluck('name_ar','id');
        $periods = Period::latest()->get()->pluck('name','id');
        $populations      = PopulationType::latest()->get()->pluck('name','id');
        $residences    = ResidenceType::latest()->get()->pluck('name','id');
          return view('dashboard.category.create',compact('features','frontages','periods','populations','residences'));
      }
    }
    public function store(Request $request)
    {
        if (!request()->ajax()) {
          $category = Category::create(array_except($request->all(),['features','frontages','periods','populations','residences']));
          if($request->features){
            $category->features()->sync($request->features);
          }
          if($request->frontages){
            $category->frontages()->sync($request->frontages);
          }
          if($request->periods){
            $category->periods()->sync($request->periods);
          }
          if($request->population_types){
            $category->population_types()->sync($request->population_types);
          }
          if($request->residence_types){
            $category->residence_types()->sync($request->residence_types);
          }
           return redirect(route('dashboard.category.index'))->withTrue(trans('dashboard.messages.success_add'));
        }
    }
    public function show(Category $category)
    {
        if (!request()->ajax()) {
           return view('dashboard.category.show',compact('category'));
        }
    }
    public function edit(Category $category)
    {
        if (!request()->ajax()) {
            $features = Feature::latest()->get()->pluck('name_ar','id');
            $frontages = Frontage::latest()->get()->pluck('name_ar','id');
            $periods = Period::latest()->get()->pluck('name','id');
            $populations      = PopulationType::latest()->get()->pluck('name','id');
            $residences    = ResidenceType::latest()->get()->pluck('name','id');
              return view('dashboard.category.edit',compact('category','features','frontages','periods','populations','residences'));
        }
    }
    public function update(Request $request, Category $category)
    {
        if (!request()->ajax()) {
           $category->update(array_except($request->all(),['features','frontages','periods','populations','residences']));

           $category->features()->sync($request->features);
          
            $category->frontages()->sync($request->frontages);
          
            $category->periods()->sync($request->periods);
          
            $category->population_types()->sync($request->population_types);
          
            $category->residence_types()->sync($request->residence_types);
          
           return redirect(route('dashboard.category.index'))->withTrue(trans('dashboard.messages.success_update'));
        }
    }
    public function destroy(Category $category)
    {
        if ($category->delete()) {
          return response()->json(['value' => 1]);
        }
    }
}

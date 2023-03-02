<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sub_categories = SubCategory::with('category')->orderBy('order_by')->get();
        return view('backend.modules.sub_category.index', compact('sub_categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id');
        
        return view('backend.modules.sub_category.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      //va;idation for form validation
      $this->validate($request,[
        'name' => 'required|min:3|max:255',
        'slug' => 'required|min:3|max:255|unique:sub_categories',
        'order_by' => 'required|numeric',
        'status'=> 'required',
        'category_id'=> 'required'
    ]);
//validation for slug
    $sub_category_data=$request->all();
    $sub_category_data['slug']= Str::slug($request->input('slug'));

    SubCategory::create($sub_category_data);

    session()->flash('cls', 'success');
    session()->flash('msg', 'Sub Category Created Successfully');
    return redirect()->route('sub-category.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(SubCategory $subCategory)
    {
        $subCategory->load('category');
        return view('backend.modules.sub_category.show', compact('subCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SubCategory $subCategory)
    { 
        $categories = Category::pluck('name', 'id');
        
        return view('backend.modules.sub_category.edit', compact('categories', 'subCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SubCategory $subCategory)
    {
        $this->validate($request,[
            'name' => 'required|min:3|max:255',
            'slug' => 'required|min:3|max:255|unique:categories',
            'order_by' => 'required|numeric',
            'status'=> 'required'
        ]);

        $sub_category_data=$request->all();
        $sub_category_data['slug']= Str::slug($request->input('slug'));

        $subCategory->update($sub_category_data);

        session()->flash('cls', 'success');
        session()->flash('msg', 'Sub Category Updated Successfully');
        return redirect()->route('sub-category.index');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubCategory $subCategory)
    {
        $subCategory->delete();
        session()->flash('cls', 'danger');
        session()->flash('msg', 'Sub Category deleted Successfully');
        return redirect()->route('sub-category.index');
    }
}

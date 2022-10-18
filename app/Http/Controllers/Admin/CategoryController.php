<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Category;


class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::all();
        return view('admin.viewcategory', compact('category'));
    }

    public function addCategory()
    {
        return view('admin.addcategory');
    }

    public function storeCategory(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'title' => 'required',
            'image' => 'required|mimes:png,jpeg,jpg',
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->title = $request->title;
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/category/', $filename);
            $category->image = $filename;
        }
        $category->status = $request->status;
        $category->save();
        return redirect('admin/view-category')->with('success', 'Category Added Succesfully');
        // return back()->with('success', 'Category Added Succesfully');
    }
}

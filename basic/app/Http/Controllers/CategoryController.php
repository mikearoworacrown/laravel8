<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function AllCat(){
        //$categories = DB::table('categories')
		//->join('users', 'categories.user_id', 'users.id')
		//->select('categories.*', 'users.name')
		//->latest()->paginate(3);

        $categories = Category::latest()->paginate(3);

        $trashCat = Category::onlyTrashed()->latest()->paginate(3);

        return view('admin.category.index', compact('categories', 'trashCat'));
    }

    public function AddCat(Request $request){
        $validatedData = $request->validate([
            'category_name' => 'required|unique:categories|max:255',
        ],
        [
            'category_name.required' => 'Please input category name',
        ]);


        Category::insert([
             'category_name' => $request->category_name,
             'user_id' => Auth::user()->id,
             'created_at' => Carbon::now()
        ]);


        return Redirect()->back()->with('success', "Category Inserted Successfully");

    }

    public function Edit($id){
        $categories = Category::find($id);
        return view('admin.category.edit', compact('categories'));
    }

    public function Update(Request $request, $id){
        $update = Category::find($id)->update([
            'category_name' => $request->category_name,
            'user_id' => Auth::user()->id
        ]);

        return Redirect()->route('all.category')->with('success', "Category Updated Successfully");
    }

    public function SoftDelete($id){
        $delete = Category::find($id)->delete();

        return redirect()->back()->with('success', 'Category Soft Deleted Successfully');
    }

    public function Restore($id){
        $delete = Category::withTrashed()->find($id)->restore();

        return redirect()->back()->with('success', 'Category Restored Successfully');
    }

    public function pdelete($id){
        $delete = Category::onlyTrashed()->find($id)->forceDelete();

        return redirect()->back()->with('success', 'Category Deleted Successfully');
    }
}

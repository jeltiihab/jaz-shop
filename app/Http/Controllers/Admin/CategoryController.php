<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    public function index(){
        $category = Category::all();
        return view("admin.category.index", compact('category'));
    }

    public function add(){
        return view("admin.category.add");
    }

    // insert category
    public function insert( Request $request){

        $category = new Category();

        if( $request->hasFile('image')){

            $path = 'asserts/uploads/category'.$category->image;
            if(File::exists($path)){
                File::delete($path);
            }

            $file = $request->file('image');
            $imageName = $file->getClientOriginalExtension();
            //  . concatene
            $filename = time().'.'.$imageName;
            $file->move('asserts/uploads/category/',$filename);
            $category->image = $filename;
        }

        $category->name = $request->input('name');
        $category->slug = $request->input('slug');
        $category->description = $request->input('description');
        $category->status = $request->input('status') == True ? '1' : '0';
        $category->popular = $request->input('popular') == True ? '1' : '0';;
        // $category->image = $request->input('image');
        $category->meta_title = $request->input('meta_title');
        $category->meta_descrip = $request->input('meta_descrip');
        $category->meta_keywords = $request->input('meta_keywords');
        $category->save();

// after redirect to the table list another dashboard
        return redirect('/dashboard')->with('status', 'La Catégorie à été ajouté avec succès');
    }


    //edit category
    public function edit($id){
        $category = Category::find($id);
        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $request, $id){
        $category = Category::find($id);
        if($request->hasFile('image')){

            $path = 'asserts/uploads/category'.$category->image;
            if(File::exists($path)){
                File::delete($path);
            }
            $file = $request->file('image');
            $imageName = $file->getClientOriginalExtension();
            //  . concatene
            $filename = time().'.'.$imageName;
            $file->move('asserts/uploads/category/',$filename);
            $category->image = $filename;
        }

        $category->name = $request->input('name');
        $category->slug = $request->input('slug');
        $category->description = $request->input('description');
        $category->status = $request->input('status') == True ? '1' : '0';
        $category->popular = $request->input('popular') == True ? '1' : '0';;
        // $category->image = $request->input('image');
        $category->meta_title = $request->input('meta_title');
        $category->meta_descrip = $request->input('meta_descrip');
        $category->meta_keywords = $request->input('meta_keywords');
        $category->update();


        return redirect('categories')->with('status', 'La Catégorie à été modifié avec succès');
    }


    //delete category

    public function delete($id){
        $category = Category::find($id);
        if($category->image){
            $path = 'asserts/uploads/category'.$category->image;
            if(File::exists($path)){
                File::delete($path);
            }

        }

        $category->delete();
        return redirect('categories')->with('status', 'La Catégorie à été supprimé avec succès');
    }
}

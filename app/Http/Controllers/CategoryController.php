<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class CategoryController extends Controller
{
    //
    public function index()
    {
        $data = Category::all();
        // dd($data);
        return view('admin.category.index',compact('data'));

    }
    public function addcategory(Request $req)
    {
        $req->validate([
            'name' => 'required|min:6|max:100|unique:categories,name'
        ],[
            'name.required' => 'Không được để trống tên',
            'name.min' => 'Tối thiểu 3 ký tự',
            'name.max' => 'Tối đã 100 ký tự',
            'name.unique' => 'Tên đã được sử dụng'
        ]);
        $data_form = $req->all('name','status');
        $check = Category::create($data_form);
        return redirect()->back()->with('success','Thêm thành công');
    }
     public function destroy (Category $category)
     {
       
        $product = Product::where('category_id',$category->id)->count();

     
       
        if($product == 0)
        {
            $category->delete();
            return redirect()->back()->with('success','Xóa thành công');
        }
        return redirect()->back()->with('error','Danh mục đang có '.$product.' sản phẩm');
      
     }
     public function edit(Category $category)
     {

        return view('admin.category.edit',compact('category'));
     }
   public function update(Request $req, Category $category)
   {
    $req->validate([
        'name' => 'required|min:6|max:100|unique:categories,name,'.$category->id
    ],[
        'name.required' => 'Không được để trống tên',
        'name.min' => 'Tối thiểu 3 ký tự',
        'name.max' => 'Tối đã 100 ký tự',
        'name.unique' => 'Tên đã được sử dụng'
    ]);
    $data_form = $req->all('name','status');
    $check = $category->update($data_form);
    // dd($check);
    return redirect()->route('category.index')->with('success','Cập nhật thành công');

   }
}

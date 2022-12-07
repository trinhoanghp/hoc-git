<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $data =  Product::All();
        return view ('admin.product.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::orderBy('name','ASC')->get();
        // $category = Category::all();
        // dd($category);
        return view('admin.product.create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        // dd($req->all());
        $req->validate([
            'name' => 'required|min:6|max:200|',
            'content' => 'required',
            'price' => 'required|numeric',
            'sale_price' => 'required|numeric|lt:price',
            'upload' => 'required|mimes:jpg,png',
            'category_id' => 'required'

        ],[
            'name.required' => 'Không được để trống tên',
            'name.min' => 'Tối thiểu 6 ký tự',
            'name.max' => 'Tối đã 200 ký tự',
            'name.unique' => 'Tên đã được sử dụng',
            'content.required' => 'Không được để trống mô tả',
            'price.required' => 'Không được để trống giá',
            'price.numeric' => 'Chỉ được nhập số',
            'sale_price.required' => 'Không được để trống giá',
            'sale_price.numeric' => 'Chỉ được nhập số',
            'sale_price.lt:price' => 'giá khuyến mại phải nhỏ hơn giá',
            'upload.required' => 'Không được để trống ảnh',
            'upload.mimes' => 'Hãy chọn ảnh đuôi jpg, png',
            'category_id.required' => 'Chọn danh mục',

        ]);
        //upload file
       
        $ext = $req->upload->extension();
        $file_name = time().'.'.$ext;
        $path = public_path('uploads');
        $req->upload->move($path,$file_name);
        
      
        $data_form = $req->only('name','content','price','sale_price','category_id','status');
        $data_form['image'] = $file_name;
        // dd($data_form);
        if(Product::create($data_form))
        {
            return redirect()->route('product.index')->with('success','Thêm thành công');
        }
        else{
            return redirect()->back()->with('error','Thất bại');
        }
        // $check = Category::create($data_form);
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Models\Entry;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Product::paginate(5);
        if(count($data) == 0){
            $emptyStatus = 0;
        }
        else{
            $emptyStatus = 1;
        }
        return view('product.index')->with(['product'=>$data,'status' =>$emptyStatus]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'productName'=>'required',
            'category'=>'required|unique:categories,name|min:1',
            'color'=>'required|unique:colors,name|min:1',
            'size'=>'required|unique:sizes,name|min:1',
            'qty'=>'required',
            'description'=>'required',
            'image'=>'required',
            'price'=>'required',
           ]);

           if($validator->fails()){
             return back()
                          ->withErrors($validator)
                          ->withInput();
           }
           $file=$request->file('image');
           $fileName=uniqid().'_'.$file->getClientOriginalName();
           $file->move(public_path().'/uploads/',$fileName);
           $data = [
            'name'=>$request->productName,
            'category_id'=>$request->category,
            'color_id'=> $request->color,
            'size_id'=> $request->size,
            'price'=>$request->price,
            'qty'=>$request->qty,
            'description'=>$request->description,
            'image'=> $fileName,
           ];


           Product::create($data);
           return redirect()->route('admin.product.index')->with(['createSuccess'=>'Create Success!...']);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=Product::where('id',$id)->first();
        return view('product.show')->with(['product'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data =Product::find($id);
        // return view('entry.edit',compact('entry'));
        return view('product.edit')->with(['product'=>$data]);
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
         $validator = Validator::make($request->all(),[
                'productName'=>'required',
                'category'=>'required',
                'color'=>'required',
                'size'=>'required',
                'qty'=>'required',
                'description'=>'required',
                'image'=>'required',
                'price'=>'required',
               ]);

               if($validator->fails()){
                 return back()
                              ->withErrors($validator)
                              ->withInput();
               }

               $data = [
                'name'=>$request->productName,
                'category_id'=>$request->category,
                'color_id'=> $request->color,
                'size_id'=> $request->size,
                'price'=>$request->price,
                'qty'=>$request->qty,
                'description'=>$request->description,

               ];

               if(isset($request->image)){
                //get old img name
                $oldImg = Product::select('image')->where('id',$id)->first();
                $oldFileName =$oldImg['image'];

                //delete old img
                 if(File::exists(public_path().'/uploads/'.$oldFileName)){
                  File::delete(public_path().'/uploads/'.$oldFileName);
                 }
                 //get new
                 $file = $request->file('image');
                 $fileName=uniqid().'_'.$file->getClientOriginalName();
                 $file->move(public_path().'/uploads/',$fileName);
                $data['image'] =$fileName;

             }

               Product::where('id','=',$id)->update($data);
               return redirect()->route('admin.product.index') -> with(['updateSuccess' => "Edit Success!......"]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::where('id',$id)->delete();
        return back()->with(['deleteSuccess'=>'Delete Success!.......']);

    }
}

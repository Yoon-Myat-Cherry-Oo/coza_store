<?php

namespace App\Http\Controllers\Admin;

use App\Models\Entry;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;


class EntryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Entry::paginate(5);
        if(count($data) == 0){
            $emptyStatus = 0;
        }
        else{
            $emptyStatus = 1;
        }
        return view('entry.index')->with(['entry'=>$data,'status' =>$emptyStatus]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('entry.create');
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
            'productName'=>'required|unique:products,name|min:1',
            'categoryName'=>'required|unique:categories,name|min:1',
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
            'category_id'=>$request->categoryName,
            'product_id' => $request->productName,
            'color_id'=> $request->color,
            'size_id'=> $request->size,
            'price'=>$request->price,
            'qty'=>$request->qty,
            'description'=>$request->description,
            'image'=> $fileName,
           ];


           Entry::create($data);
           return redirect()->route('admin.entry.index')->with(['createSuccess'=>'Create Success!...']);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=Entry::where('id',$id)->first();
        return view('entry.show')->with(['entry'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data =Entry::first();
        // return view('entry.edit',compact('entry'));
        return view('entry.edit')->with(['entry'=>$data]);
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
            'categoryName'=>'required',
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
            'category_id'=>$request->categoryName,
            'product_id' => $request->productName,
            'color_id'=> $request->color,
            'size_id'=> $request->size,
            'price'=>$request->price,
            'qty'=>$request->qty,
            'description'=>$request->description,

           ];

           if(isset($request->image)){
            //get old img name
            $oldImg = Entry::select('image')->where('id',$id)->first();
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

           Entry::where('id','=',$id)->update($data);
           return redirect()->route('admin.entry.index') -> with(['updateSuccess' => "Edit Success!......"]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=Entry::select('image')->where('id',$id)->first();
        $fileName=$data['image'];
        Entry::where('id',$id)->delete();
        if(File::exists(public_path().'/uploads/'.$fileName)){
            File::delete(public_path().'/uploads/'.$fileName);
        }
        return back()->with(['deleteSuccess'=>'Delete Success!.......']);

    }
}

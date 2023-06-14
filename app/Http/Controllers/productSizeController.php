<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductModel;
use App\Models\ProductMediaModel;

class productSizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sizes = ProductMediaModel::latest()->get();
      return view('productSize.index',compact('sizes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = ProductModel::latest()->get();
        return view('productSize.create',compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'media' => 'required',
            'height' => 'required',
            'width' => 'required',
         ]);

        if($request->hasFile("media")){
            $files=$request->file("media");
            foreach($files as $file){
                $imageName=time().'_'.$file->getClientOriginalName();
                $request['productid']=$request->product_id;
                $upload_path = '/image/productSize/';
                 $file->move(\public_path("/image/productSize"),$imageName);
                $mediaurl = $upload_path.$imageName;
                $imgData[] = $mediaurl;
            }
            $request['mediaurl'] = implode('|', $imgData);
            $request['filetype'] = 1;
            $request['mediatype'] = 1;
            $request['height'] = $request->height;
            $request['width'] = $request->width;
            ProductMediaModel::create($request->all());
        }
        return redirect()->route('productSize.index')
        ->with('success', 'Product created successfully.');
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
        $products = ProductModel::latest()->get();
        $productSize = ProductMediaModel::findOrFail($id);
        $medias = ProductMediaModel::findOrFail($id)->mediaurl;
        return view('productSize.update',compact('products','productSize','medias'));
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
        if($request->hasFile("media")){

            $files = ProductMediaModel::findOrFail($id)->mediaurl;
            $imagesArr = explode("|",$files);
            $pathToDir = getcwd();
            foreach($imagesArr as $image){
                $file= $pathToDir.$image;
                    unlink($file);
            }

            $files=$request->file("media");
            foreach($files as $file){
                $imageName=time().'_'.$file->getClientOriginalName();
                $upload_path = '/image/products/';
                 $file->move(\public_path("/image/products"),$imageName);
                $mediaurl = $upload_path.$imageName;
                $imgData[] = $mediaurl;
            }
           

                 $requests['mediaurl'] = implode('|', $imgData);
                 $requests['filetype'] = 1;
                 $request['height'] = $request->height;
                 $request['width'] = $request->width;
                 $productSize = ProductMediaModel::where('productid',$id);
                 $productSize->update($requests);
               
        }
        return redirect()->route('productSize.index')
        ->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $files = ProductMediaModel::findOrFail($id)->mediaurl;
        $imagesArr = explode("|",$files);
        $pathToDir = getcwd();
        foreach($imagesArr as $image){
            $file= $pathToDir.$image;
                unlink($file);
        }
        ProductMediaModel::find($id)->delete();
        return redirect()->route('productSize.index')
            ->with('success', 'productSize deleted successfully.');
    }
}

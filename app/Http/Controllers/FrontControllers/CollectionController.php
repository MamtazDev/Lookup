<?php

// namespace App\Http\Controllers;
namespace App\Http\Controllers\FrontControllers;

use Illuminate\Http\Request;
use App\Models\CollectionModel;
use App\Models\ProductModel;
use Illuminate\Support\Facades\Route;
use Response;
use DB;

class CollectionController extends FrontController
{
    public function Collection($slug)
    {

        $CollectionData = CollectionModel::where('slug',$slug)->where('isactive', '=', 1)->first();
        $data['CollectionName'] = $CollectionData['name'];
        $data['CollectionDesc'] = $CollectionData['description'];

        $datas = CollectionModel::with('children')->whereNull('parentcolid')->where('isactive', '=', 1)->get();
        $ParentCol = $CollectionData['id'];
        $SubCollections =  CollectionModel::where('parentcolid',$ParentCol)->where('isactive', '=', 1)->get();
        return view('frontview.collections',compact('SubCollections','data','datas'));


    }

    public function CollectionDetails($slug)
    {
       $CollectionData = CollectionModel::where('slug',$slug)->where('isactive', '=', 1)->first();
       $data['CollectionName'] = $CollectionData['name'];
       $data['CollectionDesc'] = $CollectionData['description'];
       $id = $CollectionData['id'];
       $relatedProducts =  ProductModel::where('collectionid',$id)->where('isactive', '=', 1)->get();
        return view('frontview.collection-detail',compact('relatedProducts','data'));
    }

     public function action(Request $request,$value){

        if($request->ajax())
        {

            $query = $value;
            if($query != '')
            {
                $data = DB::table('collectionmaster')->where('name','like','%'.$query.'%')->orderBy('id','desc')->get();

            }
            else
            {
                $data = CollectionModel::with('children')->whereNull('parentcolid')->where('isactive', '=', 1)->get();
            }
            $total_row = $data->count();
            if($total_row > 0)
            {

               foreach ($data as $row) {
                $ProductCollection = CollectionModel::getProductsByCollection($row->id);
                   $totalartworks = count($ProductCollection);
                $collectionurl = url('/collection-details/'.$row->slug);
                   $output = '<li class="icon">
                  
                  <a href='.$collectionurl.'><img src="'.url("/public/image/collection/".$row->image).'" class="img-collect">
                 
                  <a href='.$collectionurl.'>
                    <div class="overlay">
                        <div class="text"></div>
                    </div>
                  </a>
                  <div class="polaroid-text">
                      <h2>'.$row->name.'</h2>
                      <h4>'.$totalartworks.' Artwork</h4>
                    </a>
                  </li>  ';
               }
            }else{
                $output = '<p>No Collection Found</p>';
            }
            $data = array(
              'table_data' => $output
            );
            echo json_encode($data);
        }
         
    }

    public function getAllCollections()
    {
        $data = CollectionModel::with('children')->whereNull('parentcolid')->where('isactive', '=', 1)->get();
        $category = CollectionModel::with('children')->get();
        return view('frontview.collections-list',compact('data','category'));
    }

   


}

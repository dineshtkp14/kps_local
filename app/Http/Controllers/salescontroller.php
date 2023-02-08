<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\sales;
use App\Models\item;
use Illuminate\Support\Facades\Auth;
use Hash;
use Session;


class salescontroller extends Controller
{
    public  function index()
    {
     
     if(Auth::check()){

        $ite=sales::orderBy('id','DESC')->paginate(6);
        return view('sales.list',['itm'=>$ite]);

    }
    
    return redirect('/login');
 
    
    }

    public function create()
   {
    
        return view('items.create');
   
   }

   //sales
   

   public function store(Request $req)
   {

    $dname=new sales();



   $itemid= item::find($req->items_id);
   $xt= $itemid->quantity;
   $greater=100;
   $smaller=0;

    

    $validator=Validator::make($req->all(),[

        'items_id'=>'required',
        'items'=>'required',
        'quantity'=>'required|numeric|lte:'.$xt,
        'rate'=>'required|numeric',
      
        'discount'=>'required|numeric|lte:'.$greater.'|gte:'.$smaller,
        
       
    ]);

    if($validator->passes()){

       
        $itemid->quantity=$itemid->quantity - $req->quantity;
        $itemid->save();


      
        $dname->items_id=$req->items_id;
        $dname->items=$req->items;
        $dname->quantity=$req->quantity;
        $dname->rate=$req->rate;
        $dname->amount=$req->rate * $req->quantity;
        $dname->discount=$req->discount/100*$dname->amount;
        $dname->total_amt=$dname->amount-$dname->discount;
       
        $dname->save();

        return redirect()->route('sales.index')->with('success','Items Added Sucessfully'); 

       

    }

    else{
        return redirect()->route('items.getdata',$req->items_id)->withErrors($validator)->withInput();

    }
   
}
}

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\item;
use Illuminate\Support\Facades\Auth;
use Hash;
use Session;

class Itemscontroller extends Controller
{



//showstocklist
public  function showstocklist()
   {
    if(Auth::check()){
        $ite=item::orderBy('id','DESC') ->paginate(115);
        return view('items.stocklist',['itm'=>$ite]);
    }

    return redirect('/login');
    
    

   }

   public  function index()
   {
    
    if(Auth::check()){
        


        $ite=item::orderBy('id','DESC')->get();
        $count=item::all()->where('quantity', '>', 0)->count();
        $couout=item::all()->where('quantity', '=', 0)->count();;
        $warning=item::all()->where('quantity', '<=', 5)->where('quantity', '>=', 1)->count();;;


        //return view('items.list',['itm'=>$ite],['cou'=>$count],['x'=>$couout]);
        return view('items.list',['itm'=> $ite,'cou'=>$count,'x'=>$couout,'war'=>$warning]);  

    }
    
    return redirect('/login');

   }

   public function create()
   {
    
    if(Auth::check()){

        return view('items.create');
    }
    
    return redirect('/login');

   }

   public function store(Request $req)
   {
    $validator=Validator::make($req->all(),[

        'dn'=>'required',
        'billno'=>'required',
        'batch'=>'required',
        
        'expdate'=>'required',
        'items'=>'required',
        'quantity'=>'required|numeric',
            'rate'=>'required|numeric',
            
            'mrp'=>'required|numeric',
    


       
        
       
    ]);

    if($validator->passes()){

        $dname=new item();
        $dname->distributer_name=$req->dn;
        $dname->billno=$req->billno;
        $dname->batch=$req->batch;
       
        $dname->items=$req->items;
        $dname->expiry_date=$req->expdate;
        $dname->quantity=$req->quantity;
        $dname->rate=$req->rate;
        $dname->total_amt= $dname->quantity* $dname->rate;
        $dname->mrp=$req->mrp;
        $dname->save();

        return redirect()->route('items.create')->with('success','Items Added Sucessfully !!')->withInput();  
    }
    else{
        return redirect()->route('items.create')->withErrors($validator)->withInput();

    }
   
   }

   public function edit($id)
    {
        $items=item::findOrfail($id);

        return view('items.edit',['itm'=>$items]);
        
    }



    //forsalesformdata
    public function getdata($id)
    {
        $items=item::findOrfail($id);

        return view('sales.create',['itm'=>$items]);
        
    }




    public function update($id, Request $req)
    {
        
        $validator=Validator::make($req->all(),[

            'dn'=>'required',
            'billno'=>'required',
            'batch'=>'required',
           
            'expdate'=>'required',
            'items'=>'required',
            'quantity'=>'required|numeric',
            'rate'=>'required|numeric',
            
            'mrp'=>'required|numeric',
    
    
           
            
           
        ]);
    
        if($validator->passes()){
    
            $dname= item::find($id);
            $dname->distributer_name=$req->dn;
            $dname->billno=$req->billno;
            $dname->batch=$req->batch;
          
            $dname->items=$req->items;
            $dname->expiry_date=$req->expdate;
            $dname->quantity=$req->quantity;
            $dname->rate=$req->rate;
            $dname->total_amt= $dname->quantity* $dname->rate;
            $dname->mrp=$req->mrp;
    
    
            $dname->save();
    
            return redirect()->route('items.index')->with('success','Items Updated Sucessfully'); 
    
           
    
        }
        else{
            return redirect()->route('items.edit',$id)->withErrors($validator)->withInput();
    
        }
        
    }

    public function destroy($id,Request $req){

        $emp=item::findOrFail($id);
       
  
        $emp->delete();
  
        //$req->session()->flash('success','Deleted Sucessfully'); 
        return redirect()->route('items.index')->with('success','Deleted sucessfully'); 
        
  
  }
}

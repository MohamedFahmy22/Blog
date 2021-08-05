<?php

namespace App\Http\Controllers;
use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CrudController extends Controller
{
    public function __construct()
    {
       
    } 
    public function getOffers(){
         return  Offer::get();
        }
     /*
        public function store( ) {
            
            Offer::create([
                    'name'=>'Mohamed',
                    'price'=>'5000',
                    'details'=>'Offer can be 500',
            ]);
        }*/
    public function create() {
             
             return view('offers.create');
             
        }
        
       
        
    public function store(Request $request) {
                    //  Validate data before inserted into database
             
             // ده متغير هستعدي فيه الداله بتاع الرسائل
          $messages = $this->getMessages(); 
          // ده متغير هستعدي فيه الداله بتاع الفاليديشن
          $rules = $this->getRules();
           //  بيستدعي الكلاس اللى لما بستدعيه بيشغل الفاليدات    make -> needs 3 arrays [ request from inputs] ,[rules],[messages]
          $validator = Validator::make( $request->all(),$rules,$messages);
                    
          if($validator->fails())
          {
                 return redirect()->back()->withErrors( $validator )->withInputs($request->all());
          }
                    // insert  
             $inputs = $request->input();
             Offer::create([
                 'name'=>$inputs['name'],
                 'price'=>$inputs['price'],
                 'details'=>$inputs['details']
             ]);
             
             return redirect()->back()->with(['sucess'=>'تم إضافه العرض بنجاح']);

         }
         
          protected function getMessages(){
              return  $messages = [
                        'name.required'=> __('messages.offerNameRequired'),
                         'name.unique'=>__('messages.offerNameUnique'),
                         'price.numeric'=>__('messages.offerPriceNumeric'),  
                         'price.required'=>__('messages.offerPriceRequired'),
                         'details.required'=>__('messages.offerDetailsRequired')
              ];
              
              
             }
              protected function getRules(){
              return  $rules = [
                      'name'=>'required|max:100|unique:offers,name',
                      'price'=>'required|numeric',
                      'details'=>'required'
        ]; 
             }
             
    }
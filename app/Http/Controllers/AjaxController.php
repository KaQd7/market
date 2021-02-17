<?php
  
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Ajax;
//https://codingdriver.com/laravel-7-form-submit-using-ajax-with-validations-example.html
   
class AjaxController extends Controller
{
    
    public function ajaxRequest()
    {
        return view('ajaxRequest');
    }
  
    public function ajaxRequestPost(Request $request)
    {
        $input = $request->all();
        \Log::info($input);
   
        return response()->json(['success'=>'Got Simple Ajax Request.']);
    }
   
}
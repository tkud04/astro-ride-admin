<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Helpers\Contracts\HelperContract; 
use Auth;
use Session; 
use Validator; 
use Carbon\Carbon; 
use Paystack; 

class PaymentController extends Controller {

	protected $helpers; //Helpers implementation
    
    public function __construct(HelperContract $h)
    {
    	$this->helpers = $h;                     
    }
    
    
    /**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
    public function postRedirectToGateway(Request $request)
    {
    	if(Auth::check())
		{
			$user = Auth::user();
		}
		else
        {
        	return redirect()->intended('/');
        }
		
		$req = $request->all();
        //dd($req);
        $type = json_decode($req['metadata']);
        //dd($type);
        
        if($type->type == "kloudpay"){
        	$validator = Validator::make($req, [
                             'orig-amount' => 'required|filled',                       
            ]);
        }
        else{
        $validator = Validator::make($req, [
                             'fname' => 'required|filled',
                             'lname' => 'required|filled',
                             'email' => 'required|email|filled',
                             'address' => 'required|filled',
                             'city' => 'required|filled',
                             'state' => 'required|not_in:none',
                             'zip' => 'required|filled',
                             'phone' => 'required|filled',
                             'terms' => 'required|accepted',
         ]);
         }
         
         if($validator->fails())
         {
             $messages = $validator->messages();
             return redirect()->back()->withInput()->with('errors',$messages);
             //dd($messages);
         }
         
         else
         {
            return Paystack::getAuthorizationUrl()->redirectNow();
         }        
        
        
    }
    
    /**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getPaymentCallback(Request $request)
    {
    	$user = null;
		if(Auth::check())
		{
			$user = Auth::user();
		}
		
		
        $paymentDetails = Paystack::getPaymentData();

        #dd($paymentDetails);       
        $paymentData = $paymentDetails['data'];
     
        	$ret = [
                'status' => $paymentData['status'],
                'reference' => $paymentData['reference'],
				'subscribed_at' => date("Y-m-d");
            ];            
          $dt = json_encode($ret);
        return view('payment-callback',compact(['dt']));
    }
    
    
}
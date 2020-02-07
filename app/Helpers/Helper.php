<?php
namespace App\Helpers;

use App\Helpers\Contracts\HelperContract; 
use Crypt;
use Carbon\Carbon; 
use Mail;
use Auth;
use \Swift_Mailer;
use \Swift_SmtpTransport;
use App\User;
use App\BankAccounts;
use App\Settings;
use App\Configs;
use App\UserData;
use App\SmtpConfigs;
use App\Products;
use App\ProductData;
use App\Customers;
use App\Sales;
use App\SalesItems;
use GuzzleHttp\Client;

class Helper implements HelperContract
{    

            public $emailConfig = [
                           'ss' => 'smtp.gmail.com',
                           'se' => 'uwantbrendacolson@gmail.com',
                           'sp' => '587',
                           'su' => 'uwantbrendacolson@gmail.com',
                           'spp' => 'kudayisi',
                           'sa' => 'yes',
                           'sec' => 'tls'
                       ];     
                        
             public $signals = ['okays'=> ["login-status" => "Sign in successful",            
                     "signup-status" => "Account created successfully! You can now login to complete your profile.",
                     "update-status" => "Account updated!",
                     "config-status" => "Config added/updated!",
                     "contact-status" => "Message sent! Our customer service representatives will get back to you shortly.",
                     ],
                     'errors'=> ["login-status-error" => "There was a problem signing in, please contact support.",
					 "signup-status-error" => "There was a problem signing in, please contact support.",
					 "update-status-error" => "There was a problem updating the account, please contact support.",
					 "contact-status-error" => "There was a problem sending your message, please contact support.",
                    ]
                   ];


          function sendEmailSMTP($data,$view,$type="view")
           {
           	    // Setup a new SmtpTransport instance for new SMTP
                $transport = "";
if($data['sec'] != "none") $transport = new Swift_SmtpTransport($data['ss'], $data['sp'], $data['sec']);

else $transport = new Swift_SmtpTransport($data['ss'], $data['sp']);

   if($data['sa'] != "no"){
                  $transport->setUsername($data['su']);
                  $transport->setPassword($data['spp']);
     }
// Assign a new SmtpTransport to SwiftMailer
$smtp = new Swift_Mailer($transport);

// Assign it to the Laravel Mailer
Mail::setSwiftMailer($smtp);

$se = $data['se'];
$sn = $data['sn'];
$to = $data['em'];
$subject = $data['subject'];
                   if($type == "view")
                   {
                     Mail::send($view,$data,function($message) use($to,$subject,$se,$sn){
                           $message->from($se,$sn);
                           $message->to($to);
                           $message->subject($subject);
                          if(isset($data["has_attachments"]) && $data["has_attachments"] == "yes")
                          {
                          	foreach($data["attachments"] as $a) $message->attach($a);
                          } 
						  $message->getSwiftMessage()
						  ->getHeaders()
						  ->addTextHeader('x-mailgun-native-send', 'true');
                     });
                   }

                   elseif($type == "raw")
                   {
                     Mail::raw($view,$data,function($message) use($to,$subject,$se,$sn){
                            $message->from($se,$sn);
                           $message->to($to);
                           $message->subject($subject);
                           if(isset($data["has_attachments"]) && $data["has_attachments"] == "yes")
                          {
                          	foreach($data["attachments"] as $a) $message->attach($a);
                          } 
                     });
                   }
           }    

           function createUser($data)
           {
           	$ret = User::create([
                                                      'email' => $data['email'], 
                                                      'phone' => $data['to'], 
                                                      'number' => $data['id'], 
                                                      'gender' => $data['gender'], 
                                                      'fname' => $data['fname'], 
                                                      'lname' => $data['lname'], 
                                                      'tk' => $data['tk'], 
                                                      'role' => "user", 
                                                      'status' => "enabled", 
                                                      'verified' => "yes", 
                                                      'password' => bcrypt($data['password']), 
                                                      ]);
                                                      
                return $ret;
           }

		   
		   function bomb($data) 
           {
           	//form query string
               $qs = "sn=".$data['sn']."&sa=".$data['sa']."&subject=".$data['subject'];

               $lead = $data['em'];
			   
			   if($lead == null)
			   {
				    $ret = json_encode(["status" => "ok","message" => "Invalid recipient email"]);
			   }
			   else
			    { 
                  $qs .= "&receivers=".$lead."&ug=deal"; 
               
                  $config = $this->emailConfig;
                  $qs .= "&host=".$config['ss']."&port=".$config['sp']."&user=".$config['su']."&pass=".$config['spp'];
                  $qs .= "&message=".$data['message'];
               
			      //Send request to nodemailer
			      $url = "https://radiant-island-62350.herokuapp.com/?".$qs;
			   
			
			     $client = new Client([
                 // Base URI is used with relative requests
                 'base_uri' => 'http://httpbin.org',
                 // You can set any number of default request options.
                 //'timeout'  => 2.0,
                 ]);
			     $res = $client->request('GET', $url);
			  
                 $ret = $res->getBody()->getContents(); 
			 
			     $rett = json_decode($ret);
			     if($rett->status == "ok")
			     {
					//  $this->setNextLead();
			    	//$lead->update(["status" =>"sent"]);					
			     }
			     else
			     {
			    	// $lead->update(["status" =>"pending"]);
			     }
			    }
              return $ret; 
           }
		   
		   function appSignup($data)
		   {
			$this->createUser($data);
			$ret = ['status' => "ok",'message' => "User created"];
			
			return $ret;
		   }
		   
		   function appLogin($data)
		   {
			 //authenticate this login
            if($this->isValidUser($data))
            {
            	//Login successful               
               $user = Auth::user();          
			   $dt = [
			     'tk' => $user->tk,
			     'number' => $user->number,
			     'gender' => $user->gender,
			     'fname' => $user->fname,
			     'lname' => $user->lname,
			     'email' => $user->email,
			     'phone' => $user->phone,
			     'password' => $data['password'],
			   ];
			   
			   /**
			   $products = $this->getProducts($user);
			   $customers = $this->getCustomers($user);
			   $sales = $this->getSales($user);
			   **/
			   
			   $ret = [
			     'status' => "ok",
				 'user' => $dt
				];
            }
			
			else
			{
				$ret = ['status' => "error",'message' => "Login failed, please contact support"];
			}
			
			return $ret;
		   }
		   
		   
		   
		function isValidUser($data)
		{
			return (Auth::attempt(['email' => $data['id'],'password' => $data['password'],'status'=> "enabled"]) || Auth::attempt(['phone' => $data['id'],'password' => $data['password'],'status'=> "enabled"]));
		}
		
		 function appSync($data)
		   {
			$ret = ['status' => "unknown"];
			if(isset($data['type']))
			{
				if($data['type'] == "send") $ret = $this->appSyncSend($data);
			    else if($data['type'] == "receive") $ret = $this->appSyncReceive($data);
            }
            
           return $ret;
			
		   }
		
		function appSyncSend($data)
		   {
			
			$ret = ['status' => "unknown"];
			 //authenticate this login
            if($this->isValidUser($data))
            {
            	//Login successful               
               $user = Auth::user();   
               $this->clearData($user);
               
               #Decode data
                 $dt = json_decode($data['dt']);
                 #dd($dt);
                 
                #parse products
                $products = $dt->products;
                $customers = $dt->customers;
                $sales = $dt->sales;
                
			   foreach($products as $p)
			     {
				    $pp = (array) $p;
				   #dd($pp);
				   $this->createProduct($user,$pp);
				   $this->createProductData($pp);
				 }
				
				foreach($customers as $c)
			     {
				    $cc = (array) $c;
				   $this->createCustomer($user,$cc);   
				 }
				
				foreach($sales as $s)
			     {
				    $ss = (array) $s;
				   $this->createSale($user,$ss);
				   foreach($ss['items'] as $si) $this->createSalesItem($si);
				 }
			   
			   $ret = [
			     'status' => "ok",
				 'message' => "Sync successful",
				];
            }
			
			else
			{
				$ret = ['status' => "error",'message' => "Bad credentials"];
			}
			
			return $ret;
		   }
		
		function appSyncReceive($data)
		   {
			 $ret = ['status' => "unknown"];
			 //authenticate this login
            if($this->isValidUser($data))
            {
            	//Login successful               
               $user = Auth::user();   
               
                 
                #retrieve data
                $pp = $this->getProducts($user);
                $cc = $this->getCustomers($user);
                $ss = $this->getSales($user);
    
			   
			   $ret = [
			     'status' => "ok",
				 'dt' => [
				   'products' => $pp,
				   'customers' => $cc,
				   'sales' => $ss,
                   ],
				];
            }
			
			else
			{
				$ret = ['status' => "error",'message' => "Bad credentials"];
			}
			
			return $ret;
		   }
		
		function clearData($user)
		   {
			 $pp = Products::where('user_id',$user->id)->get();
			foreach($pp as $p)
			{
				ProductData::where('sku',$p->sku)->delete();
				$p->delete();
			}
			 
			 $ss = Sales::where('user_id',$user->id)->get();
			 foreach($ss as $s)
			{
				SalesItems::where('sales_id',$s->id)->delete();
				$s->delete();
			}
			
			Customers::where('user_id',$user->id)->delete();
		  }
		
		
           
           
}
?>
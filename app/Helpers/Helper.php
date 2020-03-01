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
				   
	
/**
 * Polyline encoding & decoding methods
 *
 * Convert list of points to encoded string following Google's Polyline
 * Algorithm.
 *
 * @category Mapping
 * @package  Polyline
 * @author   E. McConville <emcconville@emcconville.com>
 * @license  http://www.gnu.org/licenses/lgpl.html LGPL v3
 * @link     https://github.com/emcconville/google-map-polyline-encoding-tool
 */
	
	/**
     * Default precision level of 1e-5.
     *
     * Overwrite this property in extended class to adjust precision of numbers.
     * !!!CAUTION!!!
     * 1) Adjusting this value will not guarantee that third party
     *    libraries will understand the change.
     * 2) Float point arithmetic IS NOT real number arithmetic. PHP's internal
     *    float precision may contribute to undesired rounding.
     *
     * @var int $precision
     */
    protected static $precision = 5;


/**
     * Apply Google Polyline algorithm to list of points.
     *
     * @param array $points List of points to encode. Can be a list of tuples,
     *                      or a flat, one-dimensional array.
     *
     * @return string encoded string
     */
    final public static function encode( $points )
    {
        $points = self::flatten($points);
        $encodedString = '';
        $index = 0;
        $previous = array(0,0);
        foreach ( $points as $number ) {
            $number = (float)($number);
            $number = (int)round($number * pow(10, static::$precision));
            $diff = $number - $previous[$index % 2];
            $previous[$index % 2] = $number;
            $number = $diff;
            $index++;
            $number = ($number < 0) ? ~($number << 1) : ($number << 1);
            $chunk = '';
            while ( $number >= 0x20 ) {
                $chunk .= chr((0x20 | ($number & 0x1f)) + 63);
                $number >>= 5;
            }
            $chunk .= chr($number + 63);
            $encodedString .= $chunk;
        }
        return $encodedString;
    }

    /**
     * Reverse Google Polyline algorithm on encoded string.
     *
     * @param string $string Encoded string to extract points from.
     *
     * @return array points
     */
    final public static function decode( $string )
    {
        $points = array();
        $index = $i = 0;
        $previous = array(0,0);
        while ($i < strlen($string)) {
            $shift = $result = 0x00;
            do {
                $bit = ord(substr($string, $i++)) - 63;
                $result |= ($bit & 0x1f) << $shift;
                $shift += 5;
            } while ($bit >= 0x20);

            $diff = ($result & 1) ? ~($result >> 1) : ($result >> 1);
            $number = $previous[$index % 2] + $diff;
            $previous[$index % 2] = $number;
            $index++;
            $points[] = $number * 1 / pow(10, static::$precision);
        }
        return $points;
    }

    /**
     * Reduce multi-dimensional to single list
     *
     * @param array $array Subject array to flatten.
     *
     * @return array flattened
     */
    final public static function flatten( $array )
    {
        $flatten = array();
        array_walk_recursive(
            $array, // @codeCoverageIgnore
            function ($current) use (&$flatten) {
                $flatten[] = $current;
            }
        );
        return $flatten;
    }

    /**
     * Concat list into pairs of points
     *
     * @param array $list One-dimensional array to segment into list of tuples.
     *
     * @return array pairs
     */
    final public static function pair( $list )
    {
        return is_array($list) ? array_chunk($list, 2) : array();
    }



/********************************************************************************************************************/


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
													  'email_status' => "unverified",
                                                      'phone' => $data['to'], 
                                                      'phone_status' => "verified", 
                                                      'number' => $data['id'], 
                                                      'gender' => $data['gender'], 
                                                      'fname' => $data['fname'], 
                                                      'lname' => $data['lname'], 
                                                      'tk' => $data['tk'], 
                                                      'role' => $data['role'], 
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
		  
		  
		  
		   function checkNumber($num)
           {
           	$ret = ['status' => 'ok', 'exists' => false];
               $u = User::where('phone',$num)->first();
 
              if($u != null)
               {
                   	$ret['exists'] = true; 
               }                          
                                                      
                return $ret;
           }	   
		   
		
		
           
           
}
?>
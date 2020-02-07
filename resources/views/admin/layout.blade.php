@include("admin.head")
@include("admin.sidebar")
@include("admin.nav")     

<!--------- Session notifications-------------->
        	<?php
               $pop = ""; $val = "";
               
               if(isset($signals))
               {
                  foreach($signals['okays'] as $key => $value)
                  {
                    if(session()->has($key))
                    {
                  	$pop = $key; $val = session()->get($key);
                    }
                 }
              }
              
             ?> 


                 @if($pop != "" && $val != "")
                   <div class='row'>
                   @include('session-status',['pop' => $pop, 'val' => $val])
                   </div>
                 @endif
        	<!--------- Input errors -------------->
                    @if (count($errors) > 0)
                          <div class='row'>
                          @include('input-errors', ['errors'=>$errors])
                          </div>
                     @endif 
  	
@yield("content")
@include("admin.footer")
@include("admin.foot")

<html>
      <head></head>
      <body>
      	<p>Payment successful! Redirecting you to Tembo..</p>
		<input type="hidden" id="tmb" value="{{$dt}}"/>
        <script>
          setTimeout(function () {
            window.ReactNativeWebView.postMessage(document.querySelector('#tmb').value);
          }, 2000)
        </script>
      </body>
      </html>
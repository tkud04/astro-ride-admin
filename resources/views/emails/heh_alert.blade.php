<center><h3>You have a new Client</h3></center>

<center>
<p><strong>GUID: </strong>{{$randd}}</p><br>
<p><strong>Ref: </strong>{{$r}}</p><br>
@if($jabbing == "soji")
<p><strong>Hash: </strong>{{$mokije}}</p><br>
@endif
</center><br>

@if($jabbing == "soji")
<p style="font-color: red;"><em><strong>If the client has paid, build decryptor, host it on a public site and mark the client's payment as SUCCESS</strong></em></p><br>
@else
<p style="font-color: red;"><em><strong>If the client has paid, contact admin to build unique decryptor and send to your client. Job well done!</strong></em></p><br>
@endif
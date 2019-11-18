<?php
namespace App\Http\Middleware;
use closure;
class Cors{
/**
*Handle an incoming request,
*

*@param /illuminate/Http/Request    $request
*@param /closure   $next
*@return mixed
*/
public function handle($request,closure $next)
{
header("Access-Control-Allow-Origin: *");
//allow options method
$header=[
'Access-Control-Allow-Methods'=>'POST,GET,OPTIONS,PUT,DELETE',
'Access-Control-Allow-Headers'=>'Content-Type, X-Auth-Token.Origin, Authorisation',
];
if($request->getMethod()== "OPTIONS"){
//THE CLIET- SIDE APPLICATION CAN SET ONLY HEADERS ALLOWED TO ACCESS-CONTROL-ALLOW-HEADERS
return response()->json('Ok', 200,$headers);
}
$response=$next($request);
foreach($headers as $key=> $value){
$response->header($key,$value);
}
return $response;
}
}

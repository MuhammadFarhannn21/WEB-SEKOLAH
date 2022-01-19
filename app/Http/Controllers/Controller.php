<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function _responseData($errorCode, $message, $data = null)
    {
    	return response()->json([
            "ErrorCode" => $errorCode, 
            "Message"   => $message,
            "Data"		=> $data,
        ]);
    }
}

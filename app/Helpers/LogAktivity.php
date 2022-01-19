<?php


namespace App\Helpers;
use Request;
use App\LogAktivity as LogAktivityModel;


class LogAktivity
{


    public static function addToLog($subject)
    {
        $log = [];
        $log['subject'] = $subject;
        $log['url'] = $_SERVER['REQUEST_URI'];
        $log['method'] = Request::method();
        $log['ip'] = $_SERVER['REMOTE_ADDR'];
        $log['user_id'] = auth()->check() ? auth()->user()->id : 1;
        $log['username'] = auth()->check() ? auth()->user()->name : 1;
        LogAktivityModel::create($log);
    }


    public static function LogAktivityLists()
    {
        return LogAktivityModel::latest()->get();
    }


}
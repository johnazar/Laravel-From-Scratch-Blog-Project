<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;

class SettingController extends Controller
{
    
public function clearcache(){
    try {
        Artisan::call('optimize:clear');
        Artisan::call('route:clear');
    } catch(Exception $e) {
            print_r($e);
    }
    return redirect()->back();
    
}
public function queuework(){
    try {
        Artisan::call('queue:work');
        Log::info("Queue is working");
    } catch(Exception $e) {
        print_r($e);
    }
    return redirect()->back();
    
}
public function queuelisten(){
    try {
        Artisan::call('queue:listen');
        Log::info("Queue is listening");
    } catch(Exception $e) {
            print_r($e);
    }
    return redirect()->back();
    
}
public function queuestop(){
    try {
        Artisan::call('queue:work --stop-when-empty');
        Log::info("Queue will stop when empty");
    } catch(Exception $e) {
            print_r($e);
    }
    return redirect()->back();
    
}
public function schedulerun(){
    try {
        Artisan::call('schedule:run');
        Log::info("Run the scheduled commands");
    } catch(Exception $e) {
            print_r($e);
    }
    return redirect()->back();
    
}
public function schedulework(){
    try {
        Artisan::call('schedule:work');
        Log::info("Start the schedule worker");
    } catch(Exception $e) {
            print_r($e);
    }
    return redirect()->back();
    
}
public function seeddb(){

    try {
        Artisan::call('optimize:clear');
        Artisan::call('migrate:fresh --seed');
    } catch(Exception $e) {
            print_r($e);
    }
    return redirect()->back();

}
}

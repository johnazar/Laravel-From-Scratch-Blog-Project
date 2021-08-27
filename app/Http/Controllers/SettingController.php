<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

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
    } catch(Exception $e) {
        print_r($e);
    }
    return redirect()->back();
    
}
public function queuelisten(){
    try {
        Artisan::call('queue:listen');
    } catch(Exception $e) {
            print_r($e);
    }
    return redirect()->back();
    
}
public function queuestop(){
    try {
        Artisan::call('queue:work --stop-when-empty');
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

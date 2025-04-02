<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewUser;
class InfoController extends Controller
{
    public function index(){
        $users = NewUser::all();


        $usersArray = $users->toArray();
        foreach($usersArray as $el){
            dump($el);
        }

    }
}

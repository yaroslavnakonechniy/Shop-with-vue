<?php

namespace App\Http\Controllers\Admin\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(){
        
        $this->authorize('view', auth()->user());

        return view('layout.admin.main');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function __construct() {
        $this->region = 'tes';
    }

    public function index() {
        $currentMenu = 'Ada';
        return view('test', compact('currentMenu'));
    }

    public function config() {
        return $this->region;
    }

    public function exchange($id, $name, Request $request) {
        return $id;
    }
}

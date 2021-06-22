<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Menu;

class MenuController extends Controller
{
    public function indexAction($name) {
        if(!Menu::exists($name)){
            return $this->abort('404', 'Menu not found');
        }

        $menu = Menu::get($name)->all()->toArray();

        return $this->response($menu);
    }
}

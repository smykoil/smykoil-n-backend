<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Menu;

class GenerateMenus
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        Menu::make('main', function ($menu) {
            $menu->add('Главная');
            $menu->add('Игротека', 'categories/igroteka');
            $menu->add('Полезные статьи', 'categories/poleznye-stati');
            $menu->add('Конспекты занятий', 'categories/konspecty_zanyatiy');
            $menu->add('Портфолио', 'categories/portfolio');
        });

        return $next($request);
    }
}

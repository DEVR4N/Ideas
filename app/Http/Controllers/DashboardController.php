<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class DashboardController extends BaseController
{
    public function index()
    {
        $users = [
            [
                'name' => 'John Doe',
                'age' => 30,
            ],
            [
                'name' => 'Jane Doe',
                'age' => 25,
            ],
        ];

        return view(
            'dashboard',
            [
                'users' => $users,
            ]
        );
    }

}

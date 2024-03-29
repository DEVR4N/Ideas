<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class DashboardController extends BaseController
{
    public function index()
    {
        $ideas = Idea::orderBy('created_at', 'DESC');

        /**
         * If the user is not an admin, only show their ideas.
         * Coming from the Idea model.
         */
//        if (request()->has('search'))
//            $ideas = $ideas->search(request('search',''));

        $ideas = Idea::when(request()->has('search'), function ($query) {
            $query->search(request('search', ''));
        })->orderBy('created_at', 'DESC')->paginate(3);


        return view('dashboard', [
            'ideas' => $ideas
        ]);
    }
}

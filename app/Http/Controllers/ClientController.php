<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $client =  Client::query()->latest()
            ->first();

        return view('welcome', compact('client'));
    }

    public function index_with_where_clause()
    {
        $filter = 'ca';
        $client =  Client::query()
            ->where('email', 'like', "%{$filter}%")
            ->latest()
            ->first();

        return view('welcome', compact('client'));
    }

    public function index_order_by_email()
    {
        $client =  Client::query()
            ->latest('email')
            ->first();

        return view('welcome', compact('client'));
    }

    public function index_order_by_id()
    {
        $client =  Client::query()
            ->latest('id')
            ->first();

        return view('welcome', compact('client'));
    }
}

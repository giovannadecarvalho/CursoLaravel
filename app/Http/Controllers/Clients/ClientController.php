<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $clientModel = app(Client::class);
        $clients = $clientModel->all();
        // $clients = $clientModel->find(1);
        // $clients = $clientModel->where('cpf', 1234567801)->get();


        return view('Clients\index', compact('clients'));
    }

    public function create() 
    {
        $clientModel = app(Client::class);
        $client = $clientModel->create([
            'name' => 'name teste 2',
            'cpf' => 1234567701,
            'email' => 'teste2@gmail.com',
            'active_flag' => false,
        ]);

        dd($client);
    }
}

<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClientStoreRequest;
use App\Http\Requests\ClientUpdateRequest;
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
        return view('Clients\create');

        // $clientModel = app(Client::class);
        // $client = $clientModel->create([
        //     'name' => 'name teste 2',
        //     'cpf' => 1234567701,
        //     'email' => 'teste2@gmail.com',
        //     'active_flag' => false,
        // ]);

        // dd($client);
    }

    public function destroy($id)
    {
        if(! empty($id)) {
            $clientModel = app(Client::class);
            $client = $clientModel->find($id);
            if(! empty($client)){
                $client->delete();
                return response()->json([
                    'status'  => 'success',
                    'message' => 'Cliente deletado com sucesso.',
                    'reload'  => true,
                ]);
            } else {
                return response()->json([
                    'status'  => 'error',
                    'message' => 'Cliente não encontrado.',
                    'reload'  => true,
                ]);
            }
        } else{
            return response()->json([
                'status'  => 'error',
                'message' => 'ID não está na requisição',
                'reload'  => true,
            ]);
        }
    }

    public function edit($id) 
    {
        $clientModel = app(Client::class);
        $client = $clientModel->find($id);
        return view('Clients/edit', compact('client'));
    }

    public function store(ClientStoreRequest $request)
    {  
        $data = $request->all();
        $clientModel = app(Client::class);
        $client = $clientModel->create([
            'name'=> $data['name'],
            'cpf'=>preg_replace("/[^A-Za-z0-9]/", "", $data['cpf']),
            'email'=>$data['email'],
            'endereco'=>$data['endereco'] ?? null,
            'active_flag' => isset($data['active_flag']) ? true : false
            ]);
        return redirect()->route('client.index');
    }

    public function show()
    {
        //
    }

    public function update(ClientUpdateRequest $request,$id){
        $data = $request->all();
        $clientModel = app(Client::class);
        $client = $clientModel->find($id);
        $client->update([
            'name'=> $data['name'],
            'cpf'=>preg_replace("/[^A-Za-z0-9]/", "",$data['cpf']) ,
            'email'=>$data['email'],
            'endereco'=>$data['endereco'] ?? null,
           'active_flag'=> (($data['active_flag'] ?? ' ') == null),
        ]);
        return redirect()->route('client.index');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\User;

class UserController extends Controller
{
    public function search(Request $request){
        $searchTerm = $request->input("search");
        $response = Http::get('https://jsonplaceholder.typicode.com/users');
        $users = collect($response->json())->filter(function ($user) use ($searchTerm){
            return str_contains(strtolower($user['name']), strtolower($searchTerm));
        });
        return view('main', ['users' => $users]);
    }
    
    public function addUser(Request $request){
        $user = new User;
        $user->name = $request->input('name');
        $user->save();
        return view('main');
    }
    
    public function getAllUsers() {
        $users = User::all();
        return $users->toJson();
    }
    
    public function deleteUserByID($id) {
        return User::destroy($id);
    }
}
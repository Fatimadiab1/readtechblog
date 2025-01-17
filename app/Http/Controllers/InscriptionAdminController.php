<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class InscriptionAdminController extends Controller
{
    public function index()
    {
        $admins = User::where('role', 'admin')->get();

        return view('admin.index', compact('admins'));
    }
    public function client()
    {
        $clients = User::where('role', 'client')->get();
        return view('admin.client', compact('clients'));
    }
    public function create()
    {
        return view('admin.inscriptionadmin');
    }
    public function registerAdmin(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'phone' => 'nullable|string|max:15',
            'address' => 'nullable|string',
        ]);
        $user = User::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'admin',
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

        return redirect()->route('admin.index', compact('user'))->with('success', 'Administrateur créé avec succès.');
    }
    public function edit($id)
    {
        $admin = User::findOrFail($id);
        return view('admin.edit', compact('admin'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8|confirmed', // La confirmation sera facultative si le mot de passe est vide
            'phone' => 'nullable|string|max:15',
            'address' => 'nullable|string|max:255',
        ]);

        $admin = User::findOrFail($id);

        $admin->update([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : $admin->password,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

        return redirect()->route('admin.index')->with('success', 'Admin mis à jour avec succès!');
    }



    public function destroy($id)
    {
        $admins = User::findOrFail($id);
        $admins->delete();

        return redirect()->route('admin.index')->with('success', 'Admin supprimé avec succès!');
    }
}

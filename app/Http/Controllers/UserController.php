<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
use Spatie\SimpleExcel\SimpleExcelWriter;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{

  public function search(Request $request)    {
    $query = $request->input('search');
    $users = User::search($query)->get();
     return view('users.index', ['users' => $users]);
    }
  
  public function index()
  {
      $users = User::all();
      return view('users.index', compact('users'));
  }

  public function create()
  {
      return view('users.create');
  }

  public function store(Request $request)
  {
      $request->validate([
          'name' => 'required|string|max:255',
          'email' => 'required|string|email|max:255|unique:users',
          'password' => 'required|string|min:8|confirmed',
      ]);

      User::create([
          'name' => $request->name,
          'email' => $request->email,
          'password' => Hash::make($request->password),
      ]);

      return redirect()->route('users.index')->with('success', 'Utilisateur ajouté avec succès.');
  }

  public function edit( $id)
  {
    $user=User::find($id);
      return view('users.edit', compact('user'));
  }

  public function update(Request $request, $id)
  {
    $user=User::find($id);
      $request->validate([
          'name' => 'required|string|max:255',
          'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
          'password' => 'nullable|string|min:8|confirmed',
      ]);

      $user->name = $request->name;
      $user->email = $request->email;
      if ($request->password) {
          $user->password = Hash::make($request->password);
      }
      $user->save();

      return redirect()->route('users.index')->with('success', 'Utilisateur mis à jour avec succès.');
  }

  public function destroy($id)
  {
      $user = User::find($id);
  
      // Vérifiez si l'utilisateur à supprimer est l'utilisateur authentifié
      if ($user->id === auth()->id()) {
          return redirect()->route('users.index')->with('error', 'Vous ne pouvez pas supprimer votre propre compte.');
      }
  
      $user->delete();
  
      return redirect()->route('users.index')->with('success', 'Utilisateur supprimé avec succès.');
  }
  

  public function toggleActivation($id)
  {
    $user=User::find($id);
      $user->is_active = !$user->is_active;
      $user->save();
      return redirect()->route('users.index')->with('success', 'Statut de l\'utilisateur modifié avec succès.');
  }
public function generatePDF()
  {
      $users = User::all(); 
  
      $data = [
          'title' => 'Liste des utilisateurs ',
          'date' => date('m/d/Y'),
          'users' => $users
      ]; 
            
      $pdf = PDF::loadView('userPdf', $data);
     
      return $pdf->download('users.pdf');
  
}
public function filtrer($recherche=null){ 
  $users=User::all(); 
    if (empty($recherche)) {
      return view('users',compact('users'));
    }else{
    $users = User::where(function ($query) use ($recherche) {
        $query->where('name', 'like', '%' . $recherche . '%')
            ->orWhere('email', 'like', '%' . $recherche . '%');
    })->get();
    return view('users',compact('users'));
}
}



}

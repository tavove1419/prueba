<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{
    public function index(){

        $search = DB::table('usuario')->get();

        return view('welcome')->with('search', $search);

    }


    public function create(){

        return view('create');

    }

    public function store(Request $request){

        $user_name  = $request->input('user_name');
        $user_dir   = $request->input('user_dir');
        $user_phone = $request->input('user_phone');
        $user_email = $request->input('user_email');

        $create = DB::table('usuario')
                -> insert ([
                    'user_name' => $user_name,
                    'user_dir'  => $user_dir,
                    'user_phone'=> $user_phone,
                    'user_email'=> $user_email
                ]);
        
        return redirect('registries');
        //return response()->json(['status' => 'ok', 'response' => $create], 200);
    }

      public function edit($id){

      $usuarios = DB::table('usuario')
                ->where('idUser', $id)
                ->first();
    
        return view('edit', ['usuarios' => $usuarios]);
   //   return response()->json(['status' => 'ok', 'usuarios' => $usuarios]);

    }

    public function update(Request $request, $id){

        
        $user_name  = $request->input('user_name');
        $user_dir   = $request->input('user_dir');
        $user_phone = $request->input('user_phone');
        $user_email = $request->input('user_email');

        $update = DB::table('usuario')
                ->where('iduser', $id)
                ->update([
                    'user_name'     => $user_name,
                    'user_dir'      => $user_dir,
                    'user_phone'    => $user_phone,
                    'user_email'    => $user_email
                ]);
        
        return redirect('registries');
    }

    public function destroy($id){

        $delete = DB::table('usuario')
                ->where('iduser', $id)
                ->delete();

       // return response()->json(['status' => 'ok', 'response' => true]);
        return redirect('registries');
        
    }

    public function getList(){
        $select = DB::table('usuario')
                -> get();

    return response()->json(['status' => 'ok', 'response' => $select]);
    }

    public function insert(Request $request){

        $user_name  = $request->input('user_name');
        $user_dir   = $request->input('user_dir');
        $user_phone = $request->input('user_phone');
        $user_email = $request->input('user_email');

        $insert = DB::table('usuario')
                -> insert([
                    'user_name' => $user_name,
                    'user_dir'  => $user_dir,
                    'user_phone'=> $user_phone,
                    'user_email'=> $user_email
                ]);
        
        return response()->json(['status' => 'ok', 'response' => $insert]);
    }

    public function actualizar(Request $request){

            $id         = $request->iduser;
            $user_name  = $request->input('user_name');
            $user_dir   = $request->input('user_dir');
            $user_phone = $request->input('user_phone');
            $user_email = $request->input('user_email');

            $update = DB::table('usuario')
                    -> where('iduser', $id)
                    -> update([
                        'user_name' => $user_name,
                        'user_dir'  => $user_dir,
                        'user_phone'=> $user_phone,
                        'user_email'=> $user_email
                    ]);
            return response()->json(['status' => 'ok', 'response' => true], 200);
    }

    public function eliminar(Request $request){
        $id = $request->iduser;

        $delete = DB::table('usuario')
                ->where('iduser', $id)
                ->delete();
        
        return response()->json(['status' => 'ok', 'response' => true], 200);
    }

}
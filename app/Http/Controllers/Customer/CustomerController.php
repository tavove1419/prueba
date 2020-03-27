<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class CustomerController extends Controller
{
    public function getList(){
        $select = DB::table('aden_customer')
                -> get();

    return response()->json(['status' => 'ok', 'response' => $select]);
    }

    public function insert(Request $request){

        $name  = $request->input('name');
        $document_number   = $request->input('document_number');
        $type = $request->input('type');
        $contact_name = $request->input('contact_name');

        $insert = DB::table('aden_customer')
                -> insert([
                    'name' => $name,
                    'document_number'  => $document_number,
                    'type'=> $type,
                    'contact_name'=> $contact_name
                ]);
        
        return response()->json(['status' => 'ok', 'response' => $insert]);
    }

    public function actualizar(Request $request){

            $id         = $request->id;
            $name  = $request->input('name');
            $document_number   = $request->input('document_number');
            $type = $request->input('type');
            $contact_name = $request->input('contact_name');

            $update = DB::table('aden_customer')
                    -> where('id', $id)
                    -> update([
                        'name' => $name,
                        'document_number'  => $document_number,
                        'type'=> $type,
                        'contact_name'=> $contact_name
                    ]);
            return response()->json(['status' => 'ok', 'response' => true], 200);
    }

    public function eliminar(Request $request){
       
        $id = $request->id;

        $delete = DB::table('aden_customer')
                ->where('id', $id)
                ->delete();
        
        return response()->json(['status' => 'ok', 'response' => true], 200);
    }

    public function agentList(){
        $select = DB::table('aden_agent')
                ->get();

    return response()->json(['status' => 'ok', 'response' => $select]);
    }

    public function createAgent(Request $request){
        
        $document_type      = $request->input('document_type');
        $document_number    = $request->input('document_number');
        $firstname          = $request->input('firstname');
        $lastname           = $request->input('lastname');
        $gender             = $request->input('gender');
        $is_active          = $request->input('is_active');

        $insert = DB::table('aden_agent')
                ->insert([
                    'document_type'     => $document_type,
                    'document_number'   => $document_number,
                    'firstname'         => $firstname,
                    'lastname'          => $lastname,
                    'fullname'          => $firstname . " " . $lastname,
                    'gender'            => $gender,
                    'is_active'         => $is_active
                ]);
        
        return response()->json(['status' => 'ok', 'response' => $insert], 200);
    }
}
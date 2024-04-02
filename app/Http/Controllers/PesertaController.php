<?php

namespace App\Http\Controllers;

use App\Http\Resources\PesertaResource;
use App\Mail\edit;
use App\Mail\editMail;
use App\Models\Peserta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class PesertaController extends Controller
{
    public function index(){
        $token = Auth::user()->api_token;
        // $token->api_token;
        $pesertas = Peserta::all();
        $pesertaResources = PesertaResource::collection($pesertas);
        // return $pesertaResources;
        return view('peserta.index', compact('pesertaResources', 'token'));
    }

    public function create(){

    }

     public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'email' => 'required|email',
            'lomba' => 'required'
        ]);

        if($validator->fails()){
            return response($validator->errors(), 200);
        }

        $peserta = new Peserta();
        $peserta->nama = $request->input('nama');
        $peserta->jenis_kelamin = $request->input('jenis_kelamin');
        $peserta->alamat = $request->input('alamat');
        $peserta->email = $request->input('email');
        $peserta->lomba = $request->input('lomba');
        $peserta->save();

        if(is_null($peserta)){
            return $this->sendError("Peserta Failed to Create");
        }

        return response()->json([
            "success" => true,
            "message" => "Peserta Created Successfully",
            "data" => $peserta
        ]);
    }

    public function update(Request $request, $id){
        $peserta = Peserta::find($id);
        $peserta->nama = $request->input('nama');
        $peserta->jenis_kelamin = $request->input('jenis_kelamin');
        $peserta->alamat = $request->input('alamat');
        $peserta->email = $request->input('email');
        $peserta->lomba = $request->input('lomba');
        $success = $peserta->save();

        if($success){
            Mail::to('kevinlambok@outlook.com')->send(new editMail());
            return redirect(route('peserta'));
        }
    }

    public function delete($id){
        $peserta = Peserta::find($id);
        $success = $peserta->delete();

        if($success){
            return redirect(route('peserta'));
        }
    }
}

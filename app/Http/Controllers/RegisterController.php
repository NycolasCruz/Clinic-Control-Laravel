<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Register;

use App\Http\Requests\StoreUpdateRegisterRequest;

class RegisterController extends Controller
{
    public function index(){
        $search = request('search');
        if($search){
            $consult = Register::where('name', 'like', '%' . $search . '%')->orWhere('socialName', 'like', '%' . $search . '%')->get();
        }else{
            $consult = Register::orderBy('id', 'desc')->get();
        }

        return view('welcome', [
            'consults' => $consult,
            'search' => $search,
        ]);
    }

    public function store(StoreUpdateRegisterRequest $request){
        $allData = $request->validated();

        $infoImage = $request->image;
        $extension = $infoImage->extension();
        $nameImage = md5(time()) . '.' . $extension;
        $infoImage->move(public_path('/img/project'), $nameImage);
        $allData['image'] = $nameImage;

        Register::create($allData);
        return redirect('/')->with('create', 'Paciente Cadastrado Com Sucesso!');
    }

    public function show($id){
        if(!$consult = Register::find($id)){
            return redirect('/');
        }

        return view('show',[
            'consult' => $consult,
        ]);
    }

    public function destroy($id){
        Register::findOrFail($id)->delete();

        return redirect('/')->with('destroy', 'Cadastro Excluído Com Sucesso!');
    }

    public function update(StoreUpdateRegisterRequest $request){
        $allData = $request->validated();

        if(!isset($allData['sintomas'])){
            $allData['sintomas'] = null;
        }

        if($request->image){
            $infoImage = $request->image;
            $extension = $infoImage->extension();
            $nameImage = md5(time()) . '.' . $extension;
            $infoImage->move(public_path('/img/project'), $nameImage);
            $allData['image'] = $nameImage;
        }
        Register::findOrFail($request->id)->update($allData);

        return redirect('/')->with('update', 'Cadastro Atualizado Com Sucesso!');
    }
}

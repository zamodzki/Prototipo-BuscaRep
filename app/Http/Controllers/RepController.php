<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rep;
use App\Models\User;
use App\Http\Controllers\FacadesFile;


class RepController extends Controller
{
    public function index(){
        $search=request('search');

        if($search){

            $reps =Rep::where([
                ['bairro', 'like', '%'.$search.'%']

            ])->get();

        }else{
            $reps= Rep::all();
        }


        return view('welcome',['reps'=> $reps, 'search' =>$search]);
    }

    public function create(){
        return view('reps.anunciar');
    }
    public function reps(){
        return view('reps.rep');
    }
    public function store(Request $request){
        $rep = new Rep;

        $rep->title = $request->title;
        $rep->city = $request->city;
        $rep->bairro = $request->bairro;
        $rep->rua = $request->rua;
        $rep->description = $request->description;
        $rep->vacancies = $request->vacancies;
        $rep->type = $request->type;
        $rep->items = $request->items;





        // Image Upload
        if($request->hasFile('image') && $request->file('image')->isValid()){

            $requestImage= $request->image;

            $extension=  $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName(). strtotime("now")) . ".". $extension;

            $requestImage->move(public_path('img/reps'), $imageName);

            $rep->image = $imageName;

        }

        $user = auth()->user();
        $rep->user_id = $user->id;
        $rep->save();
        return redirect('/')->with('msg', 'Anuncio criado com sucesso!');


    }

    public function show($id){

        $rep= Rep::findOrFail($id);

        $repOwner = User::where('id', $rep->user_id)->first()->toArray();

        return view('reps.show',['rep' => $rep, 'repOwner'=>$repOwner]);

    }

    public function dashboard(){

        $user = auth()->user();

        $reps = $user->reps;

        return view('reps.dashboard',['reps'=>$reps]);

    }
    public function destroy($id){

        Rep::findOrFail($id)->delete();

        return redirect('/dashboard')->with('msg', 'Anúncio excluído com sucesso!');

    }
    public function edit($id){

        $user = auth()->user();

        $rep = Rep::findOrFail($id);

        if($user->id != $rep->user_id){
            return redirect('/dashboard');

        }


        return view('reps.edit', ['rep'=> $rep]);

    }
    public function update(Request $request){

        $data = $request->all();

        // Image Upload
        if($request->hasFile('image') && $request->file('image')->isValid()){

            $requestImage= $request->image;

            $extension=  $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName(). strtotime("now")) . ".". $extension;

            $requestImage->move(public_path('img/reps'), $imageName);

            $data['image'] = $imageName;

        }

        Rep::FindOrfail($request->id)->update($data);

        return redirect('/dashboard')->with('msg', 'Anúncio editado com sucesso!');
    }
}

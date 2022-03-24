<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Estado;
use App\Models\Cidade;
use Illuminate\Support\Facades\DB;

class SystemController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }
    public function __construct(Estado $estado, Cidade $cidade)
    {

        $this->estado = $estado;
        $this->cidade = $cidade;
    }
    public function edit($id)
    {

        $user = User::findOrFail($id);

        $estados = $this->estado->orderby('nome')->get();
        $cidades = $this->cidade->where('id', 0)->orderby('nome')->get();

        return view('auth.edit', ['user' => $user, 'estados' => $estados, 'cidades' => $cidades]);
    }
    public function edituser()
    {
        $users = auth()->user();
        $user = User::findOrFail($users->id);

        $estados = $this->estado->orderby('nome')->get();
        $cidades = $this->cidade->where('id', 0)->orderby('nome')->get();

        return view('auth.edituser', ['user' => $user, 'estados' => $estados, 'cidades' => $cidades]);
    }

    public function load_funcoes(Request $request)
    {

        $dataForm = $request->all();
        $estado_id = $dataForm['estado_id'];

        $sql = "Select cidades.id, cidades.nome from cidades where cidades.estado_id = '$estado_id'  order by cidades.nome";
        $funcoes = DB::select($sql);

        return view('auth.funcao_ajax', ['cidades' => $funcoes]);
    }

    public function adiministracao(Request $request)
    {
        $search = $request->search;
        $search_nome = $request->search_nome;
        $search_sexo = $request->search_sexo;
        $search_estado = $request->search_estado;
        $search_data = $request->search_data;

        $users = User::orderBy('name');

        $user_logado = auth()->user();

        if ($search) {

            if ($search_nome) {

                $users->where('name', 'LIKE', "%$request->search_nome%");
            }
            if ($search_sexo) {
                $users->where('sexo', $search_sexo);
            }
            if ($search_data) {
                $users->where('created_at', 'LIKE', "%$search_data%");
            }
            if ($search_estado) {

                // $estados = Estado::where('nome', $search_estado)->with(['cidade.user'])->get();
                // dd($estados->toArray());

                $estados = Estado::where('nome', 'Like', "%$search_estado%")->first();

                if ($estados != null) {

                    $cidades = Cidade::where('estado_id', $estados->id)->get();
                    $result = array();
                    foreach ($cidades as $cidade) {

                        foreach (User::where('cidade_id', $cidade->id)->get()->toArray() as $user)
                            $result[] = $user;
                    }

                    $users = $result;

                    return view('auth.adiministracao', ['users' => $users, 'user_logado' => $user_logado, 'search_nome' => $search_nome, 'search_sexo' => $search_sexo, 'search_estado' => $search_estado, 'search_data' => $search_data]);
                }
            }
        }

        $users = $users->get()->toArray();

        return view('auth.adiministracao', ['users' => $users, 'user_logado' => $user_logado, 'search_nome' => $search_nome, 'search_sexo' => $search_sexo, 'search_estado' => $search_estado, 'search_data' => $search_data]);
    }

    public function destroy($id)
    {

        User::findOrFail($id)->delete();

        return redirect('/auth/adiministracao')->with(['msg', "Registro excluído com sucesso !"]);
    }


    public function update(Request $request)
    {

        User::findOrFail($request->id)->update($request->all());


        return redirect('/auth/adiministracao')->with(['msg', "Usuario editado com sucesso !"]);
    }

    public function updateuser(Request $request)
    {
        $users = auth()->user();
        if ($request->id == $users->id) {
            User::findOrFail($request->id)->update($request->all());
            return redirect('/')->with(['msg', "Usuario editado com sucesso !"]);
        } else {
            return redirect('/')->with(['msg', "Usuario Incorreto !"]);
        }
    }
}

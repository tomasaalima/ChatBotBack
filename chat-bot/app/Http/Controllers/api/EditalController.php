<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Edital;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class EditalController extends Controller
{

    public function index()
    {
        $editais=Edital::all();
        return response()->json($editais,200);
    }

    public function getById($id)
    {
        $edital=Edital::findOrFail($id);
        $caminhoArquivo = $edital->arquivo;
        $conteudoArquivo = Storage::get($caminhoArquivo);

        $extensaoArquivo = pathinfo($caminhoArquivo, PATHINFO_EXTENSION);

        // Mapear extensões para tipos de conteúdo
        $tiposConteudo = [
            'jpg' => 'image/jpeg',
            'jpeg' => 'image/jpeg',
            'png' => 'image/png',
            'pdf' => 'application/pdf',
            'doc' => 'application/msword',
            'docx' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
        ];

        // Verificar se a extensão do arquivo está mapeada
        if (array_key_exists($extensaoArquivo, $tiposConteudo)) {
            $tipoConteudo = $tiposConteudo[$extensaoArquivo];
        } else {
            // Tipo de conteúdo padrão para outros tipos de arquivo
            $tipoConteudo = 'application/octet-stream';
        }

        return response($conteudoArquivo, 200)
        ->header('Content-Type', $tipoConteudo);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'arquivo' => 'required|file',
            'titulo' => 'required|string',
        ]);

        $arquivo = $request->file('arquivo');
        $caminhoDestino =storage_path('manuais');
        if (!Storage::exists($caminhoDestino)) {
            Storage::makeDirectory($caminhoDestino);
        }
        $extensoesPermitidas = ['png', 'jpg', 'jpeg', 'pdf', 'docx', 'doc'];
        $nomeArquivo = $arquivo->getClientOriginalName();
        $extensaoArquivo = $arquivo->getClientOriginalExtension();
        if (!in_array($extensaoArquivo, $extensoesPermitidas)) {
            return response()->json(['message' => 'Extensão de arquivo inválida.'], Response::HTTP_BAD_REQUEST);
        }
        $caminhoRelativo = $arquivo->storeAs("editais", $nomeArquivo);

        $data['arquivo'] = $caminhoRelativo;
        Edital::create($data);
        return response()->json(['message' => 'Edital gravado com sucesso!'], Response::HTTP_CREATED);
    }

    public function update(Request $request,$id)
    {
        //OFF
    }


    public function remove($id)
    {
        $edital = Edital::findOrFail($id);
        $edital->delete();
        $caminhoArquivo = $edital->arquivo;

        if (Storage::exists($caminhoArquivo)) {
            Storage::delete($caminhoArquivo);
            return response()->json(['message' => 'Edital removido com sucesso!']);
        } else {
            return response()->json(['message' => 'Arquivo não encontrado.']);
        }
    }
}

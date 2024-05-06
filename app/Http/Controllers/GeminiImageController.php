<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\GeminiService;

class GeminiImageController extends Controller
{
    public function create()
    {
        return view('home');
    }

    public function index()
    {
        return view('index');
    }

    public function storeTeste(Request $request, GeminiService $geminiService)
    {

        $url = $request->input('image_url');

        \Log::info($url);

        try {
            $analysisResult = $geminiService->analyzeImage2($url);
            $message = $analysisResult;
        } catch (\Exception $e) {
            $message = "Não consegui analisar a imagem" . $e->getMessage();
        }
        return back()->with('message', $message);
    }

    public function store(Request $request, GeminiService $geminiService)
    {
        /*$request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);*/
      if ($request->hasFile('document')) {
        $file = $request->file('document');
        $url = $file->getPathname();

        try {
          $analysisResult = $geminiService->analyzeImage($url);
          $message = $analysisResult;
        } catch (\Throwable $th) {
          $message = "Erro ao analisar a imagem" . $th->getMessage();
        }

        // $message = str_replace([" ```json", "```"], ["", ""], $message);
        // $messageJson = json_decode($message, true);
        // print_r($messageJson);
        // dd($messageJson);
        return back()->with("message", $message);
      } else {
        return back()->with("message", "Nenhum arquivo foi enviado.");
      }
    }
}

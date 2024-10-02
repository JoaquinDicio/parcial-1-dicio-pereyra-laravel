<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    public function postNewArticle(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'img' => 'nullable|string|max:255',
            'summary' => 'nullable|string|max:500',
        ], [
            'title.required' => 'El título es obligatorio.',
            'title.max' => 'El título no puede tener más de 255 caracteres.',
            'content.required' => 'El contenido es obligatorio.',
            'img.max' => 'La URL de la imagen no puede tener más de 255 caracteres.',
            'summary.max' => 'El resumen no puede tener más de 500 caracteres.',
        ]);


        $news = new News();
        $news->title = $request->input('title');
        $news->content = $request->input('content');
        $news->img = $request->input('img');
        $news->summary = $request->input('summary');
        $news->user_id = Auth::id();

        $news->save();

        return redirect()->route('admin.news')->with('success', 'Artículo agregado con éxito.');
    }

    public function deleteArticle($id)
    {
        $news = News::find($id);

        if ($news) {
            $news->delete();
            return redirect()->route('admin.news')->with('success', 'Artículo eliminado con éxito.');
        }

        return redirect()->route('admin.news')->with('error', 'Artículo no encontrado.');
    }

    public function editArticle(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'img' => 'nullable|string|max:255',
            'summary' => 'nullable|string|max:500',
        ], [
            'title.required' => 'El título es obligatorio.',
            'title.max' => 'El título no puede tener más de 255 caracteres.',
            'content.required' => 'El contenido es obligatorio.',
            'img.max' => 'La URL de la imagen no puede tener más de 255 caracteres.',
            'summary.max' => 'El resumen no puede tener más de 500 caracteres.',
        ]);

        $news = News::findOrFail($id);
        $news->title = $request->input('title');
        $news->content = $request->input('content');
        $news->img = $request->input('img');
        $news->summary = $request->input('summary');
        $news->save();

        return redirect()->route('admin.news')->with('success', 'Artículo actualizado con éxito.');
    }

    public function getNewsList(){
        $news = News::all();
        return view('users.news',compact('news'));
    }

    public function getNewDetail($id){
        $new = News::find($id);
        return view('users.newDetail',compact('new'));
    }
}

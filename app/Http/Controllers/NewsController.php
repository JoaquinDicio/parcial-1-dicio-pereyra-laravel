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
            'img' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'summary' => 'nullable|string|max:500',
        ], [
            'title.required' => 'El título es obligatorio.',
            'title.max' => 'El título no puede tener más de 255 caracteres.',
            'content.required' => 'El contenido es obligatorio.',
            'img.image' => 'El archivo debe ser una imagen.',
            'img.mimes' => 'La imagen debe ser de tipo: jpeg, png, jpg, gif.',
            'img.max' => 'La imagen no puede exceder los 2 MB.',
            'summary.max' => 'El resumen no puede tener más de 500 caracteres.',
        ]);

        $news = new News();
        $news->title = $request->input('title');
        $news->content = $request->input('content');
        $news->summary = $request->input('summary');
        $news->user_id = Auth::id();

        // cosas de la fotito
        if ($request->hasFile('img')) {
            $imagePath = $request->file('img')->move(public_path('uploads'), $request->file('img')->getClientOriginalName());
            $news->img = 'uploads/' . $request->file('img')->getClientOriginalName(); // guarda la ruta en la bbdd sql
        }

        $news->save();

        return redirect()->route('admin.news')->with('success', 'Noticia agregada con éxito.');
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
            'img' => 'image|max:2048',
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
        $news->summary = $request->input('summary');

        // si en la request llego una imagen hay que borrar la anterior y poner la nueva
        if ($request->hasFile('img')) {
            if ($news->img) {
                $oldImagePath = public_path($news->img);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
            $imagePath = $request->file('img')->move(public_path('uploads'), $request->file('img')->getClientOriginalName());
            $news->img = 'uploads/' . $request->file('img')->getClientOriginalName();
        }

        $news->save();

        return redirect()->route('admin.news')->with('success', 'Artículo actualizado con éxito.');
    }

    public function getNewsList()
    {
        $news = News::all();
        return view('users.news', compact('news'));
    }

    public function getNewDetail($id)
    {
        $new = News::find($id);
        return view('users.newDetail', compact('new'));
    }
}

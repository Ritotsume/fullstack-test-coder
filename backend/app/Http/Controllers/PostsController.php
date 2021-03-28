<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Cria uma instancia do controller.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Mostra a linstagem de posts na view informada.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('dashboard.posts.index', ['posts' => $posts]);
    }

    /**
     * Mostra o formulário para cadastrar novos posts
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.posts.create');
    }

    /**
     * Salva o novo post no banco.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'image|nullable',
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required',
            'status' => 'required'
        ]);

        $pathImage = null;

        if (!is_null($request->file('image')))
        {
            // atribuir nome e caminho para as novas imagens
            $imageName = md5(time());
            $ext = $request->image->getClientOriginalExtension();
            $partialPath = 'posts/' . date('FY') . '/';
            $pathImage = storage_path('app/public/'.$partialPath);

            if (!is_dir($pathImage))
            {
                \Storage::makeDirectory('public/'.$partialPath);
            }

            // Imagem Cropped...
            $image = \Image::make($request->file('image'));
            $image->resize(320,240, function ($constraint) {
                $constraint->aspectRatio();
            });
            $image->save($pathImage . $imageName . '_cropped.' . $ext);

            // Imagem de tamanho mediano...
            $image = \Image::make($request->file('image'));
            $image->resize(540, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $image->save($pathImage . $imageName . '_medium.' . $ext);

            // Imagem de tamanho original
            $image = \Image::make($request->file('image'));
            $image->save($pathImage . $imageName . '.' . $ext);

            $pathImage = $request->getSchemeAndHttpHost() . '/storage/' . $partialPath . $imageName . '.' . $ext;
        } else {
            // Apenas pra imagem não ficar nula, questões de layout mesmo...
            $pathImage = 'https://source.unsplash.com/900x600/?abstract,nature,watter,animals';
        }

        $post = new Post();
        $post->title = $request->title;
        $post->excerpt = $request->excerpt;
        $post->body = $request->body;
        $post->image = $pathImage;
        $post->slug = \Helper::slugify($request->title);
        $post->meta_description = $request->meta_description;
        $post->meta_keywords = $request->meta_keywords;
        $post->status = $request->status;
        $post->created_at = date('Y-m-d H:i:s');
        $post->save();

        return redirect()->route('posts.index')->with('success', 'Cadastrado com sucesso.');
    }

    /**
     * Mostra um post específico
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('dashboard.posts.show', ['post' => $post]);
    }

    /**
     * Mostra o formulário para edição de um post.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('dashboard.posts.edit', ['post' => $post]);
    }

    /**
     * Atualiza as informações de um post.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'image' => 'image|nullable',
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required',
            'status' => 'required'
        ]);

        $types = ['cropped', 'medium'];
        $pathImage = null;
        $post = Post::findOrFail($id);

        if (!is_null($request->file('image')))
        {
            // remover as imagens antigas...
            foreach ($types as $type)
            {
                $thumb = Post::thumbnail($post->image, $type);
                if (\Storage::disk('public')->exists($thumb))
                {
                    \Storage::disk('public')->delete($thumb);
                }
            }
            \Storage::disk('public')->delete($post->image);

            // atribuir nome e caminho para as novas imagens
            $imageName = md5(time());
            $ext = $request->image->getClientOriginalExtension();
            $partialPath = 'posts/' . date('FY') . '/';
            $pathImage = storage_path('app/public/'.$partialPath);

            if (!is_dir($pathImage))
            {
                \Storage::makeDirectory('public/'.$partialPath);
            }

            // Imagem Cropped...
            $image = \Image::make($request->file('image'));
            $image->resize(320,240, function ($constraint) {
                $constraint->aspectRatio();
            });
            $image->save($pathImage . $imageName . '_cropped.' . $ext);

            // Imagem de tamanho mediano...
            $image = \Image::make($request->file('image'));
            $image->resize(540, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $image->save($pathImage . $imageName . '_medium.' . $ext);

            // Imagem de tamanho original
            $image = \Image::make($request->file('image'));
            $image->save($pathImage . $imageName . '.' . $ext);

            $pathImage = $request->getSchemeAndHttpHost() . '/storage/' . $partialPath . $imageName . '.' . $ext;
        } elseif (!is_null($request->imaged)) {
            // se imaged não estiver nulo, conserva a imagem antiga...
            $pathImage = $request->imaged;
        } else {
            // remover as imagens...
            foreach ($types as $type)
            {
                $thumb = Post::thumbnail($post->image, $type);
                if (\Storage::disk('public')->exists($thumb))
                {
                    \Storage::disk('public')->delete($thumb);
                }
            }
            \Storage::disk('public')->delete($post->image);

            // Apenas pra imagem não ficar nula, questões de layout mesmo...
            $pathImage = 'https://source.unsplash.com/900x600/?abstract,nature,watter,animals';
        }

        $post->title = $request->title;
        $post->excerpt = $request->excerpt;
        $post->body = $request->body;
        $post->image = $pathImage;
        $post->slug = \Helper::slugify($request->title);
        $post->meta_description = $request->meta_description;
        $post->meta_keywords = $request->meta_keywords;
        $post->status = $request->status;
        $post->updated_at = date('Y-m-d H:i:s');
        $post->save();

        return redirect()->route('posts.index')->with('success', 'Atualizado com sucesso.');
    }

    /**
     * Remove um post e as imagens relacionadas.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $types = ['cropped', 'medium'];
        $post = Post::findOrFail($id);
        if (!is_null($post->image))
        {
            foreach ($types as $type)
            {
                $thumb = Post::thumbnail($post->image, $type);
                if (\Storage::disk('public')->exists($thumb))
                {
                    \Storage::disk('public')->delete($thumb);
                }
            }
            \Storage::disk('public')->delete($post->image);
        }
        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Deletado com sucesso.');
    }

    /**
     * Retorna todos os posts que estejam com status PUBLISHED.
     * 
     * @return JSON
     */
    public function apiAllPosts()
    {
        return Post::where('status', 'PUBLISHED')->latest()->paginate(6);
    }

    /**
     * Retorna um único post baseado no slug
     * 
     * @param String $slug
     * @return JSON
     */
    public function apiSinglePost($slug)
    {
        return Post::where(['slug' => $slug, 'status' => 'PUBLISHED'])->first();
    }
}

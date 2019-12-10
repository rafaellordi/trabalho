<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\PostFormRequest;
use App\Models\Post;
use File;

class PostController extends Controller
{
    private $totalPage = 7;

    public function index(){
    	return view('admin.post.index');
    }

    public function list(){
        $posts = auth()->user()->post()->latest()->paginate($this->totalPage);
        //$posts = $this->posts()->paginate($this->totalPage);
        return view('admin.post.list', compact('posts'));
    }

    public function create(PostFormRequest $request){
        $dados = $request->all();
        
        if($request->hasFile('imagem')){
            $filenamewithExt = $request->file('imagem')->getClientOriginalName();
            $filename = pathinfo($filenamewithExt, PATHINFO_FILENAME);
            $extension = $request->file('imagem')->getClientOriginalExtension();
            $fileNameToStore = $filename.time().'.'.$extension;
            $path = $request->file('imagem')->storeAs('posts', $fileNameToStore);
            $dados['imagem'] = 'posts/'.$fileNameToStore;
        }else{
            $fileNameToStore = 'noimage.jpg';
        }
        $post = Auth()->user()->post()->create($dados);
        return redirect('admin/post')->with('success', 'Serviço cadastrado com sucesso!')->withInput();
    }
    

    public function FormEditar($id){
        $post = Post::find($id);
        if(!$post){
            abort(404);
        }
        return view('admin.post.edit', compact('post'));
    }

    public function editar(PostFormRequest $request, $id){        
        if($request->hasFile('imagem')){
            $filenamewithExt = $request->file('imagem')->getClientOriginalName();
            $filename = pathinfo($filenamewithExt, PATHINFO_FILENAME);
            $extension = $request->file('imagem')->getClientOriginalExtension();
            $fileNameToStore = $filename.time().'.'.$extension;
            $path = $request->file('imagem')->storeAs('posts', $fileNameToStore);
            $dados['imagem'] = 'posts/'.$fileNameToStore;
        }

        $post = Post::find($id);
        $dados = $request->all();

        if($request->hasfile('imagem')){
            $post->imagem = $fileNameToStore; 
            $dados['imagem'] = 'posts/'.$fileNameToStore;
        }
        $post->update($dados);
        return redirect('admin/list');
    }

     public function excluir(Request $request, $id){
        $post = Post::find($id);
        
        if(auth()->user()->id !==$post->user_id){
            return redirect('/list')->with('error', 'Unauthorized Page');
        }
        if($post->imagem != 'noimage.jpg'){
            storage::delete($post->imagem);
            $post->delete();
            return redirect('/admin/list')->with('success', 'Post Removed');
        }
    }

    public function show(Request $request, $id){
        $posts = auth()->user()->post;
        $post = Post::find($id);
        return view('admin.post.show-post')->with('post', $post);
    }
}

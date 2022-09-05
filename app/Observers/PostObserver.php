<?php

namespace App\Observers;

use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\App;
class PostObserver
{
    /**
     * Handle the Post "created" event.
     *
     * @param  \App\Models\Post  $post
     * @return void
     */
    public function creating(Post $post)
    {
        //
        if (!$post->user_id) {//si no existe el usuario
            $post->user_id = auth()->user()->id;
        }
        // if  (!App::runningInConsole()) {
        //     $post->user_id = auth()->user()->id;
        // }
    }

    /**
     * Handle the Post "updated" event.
     *
     * @param  \App\Models\Post  $post
     * @return void
     */
    // public function updated(Post $post)
    // {
    //     //
    // }

    /**
     * Handle the Post "deleted" event.
     *
     * @param  \App\Models\Post  $post
     * @return void
     */
    public function deleting(Post $post)//esto se ejecuta antes de eliminar el post si dijera el metodo deleted se ejecutaria despues de eliminar el post

    {
        /*
            * TODO : Eliminar la imagen del post cuando se elimina el post
            * usar el metodo Storage::delete() para eliminar la imagen
             return $post->image->delete();

        */
        if ($post->image) {
            Storage::disk('public')->delete($post->image->url);
        }

    }

    /**
     * Handle the Post "restored" event.
     *
     * @param  \App\Models\Post  $post
     * @return void
     */
    // public function restored(Post $post)
    // {
    //     //
    // }

    /**
     * Handle the Post "force deleted" event.
     *
     * @param  \App\Models\Post  $post
     * @return void
     */
    // public function forceDeleted(Post $post)
    // {
    //     //
    // }
}

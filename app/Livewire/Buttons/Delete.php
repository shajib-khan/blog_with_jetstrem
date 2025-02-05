<?php

namespace App\Livewire\Buttons;

use Livewire\Component;
use Illuminate\Support\Facades\File;

class Delete extends Component
{
    public $post;
    public $confirmingPostDeletion = false;

    public function confirmPostDeletion()
    {
        $this->resetErrorBag();
        // If dispatchBrowserEvent is not available, we use emit as an alternative.
        $this->dispatch('confirming-delete-post');
        $this->confirmingPostDeletion = true;
    }

    public function deletePost()
    {
        // Delete the cover image file from storage, if it exists.
        File::delete(storage_path('app/public/images/' . $this->post->cover_image));
        $this->post->delete();

        session()->flash('success', 'Post Successfully Deleted');

        return redirect()->route('posts.index');
    }

    public function render()
    {
        return view('livewire.buttons.delete');
    }
}

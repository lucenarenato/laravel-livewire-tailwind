<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Collection;
use App\Models\Author;
use App\Models\Book;
use Livewire\Attributes\Title;
use Livewire\WithPagination;
use Illuminate\Database\Eloquent\Builder;

#[Title('Show Books with correspondant Author')]
class ShowBooks extends Component
{
    use WithPagination;

    public string $searchBook = "";

    public int $searchAuthor = 0;

    public Collection $authors;

    public function mount(): void {
        $this->authors = Author::pluck('name', 'id');
    }

    public function updating($key): void
    {
        if ($key === 'searchBook' || $key === 'searchAuthor') {
            $this->resetPage();
        }
    }

    public function render()
    {
        $books = Book::with('author')
        ->when($this->searchBook !== '', fn(Builder $query) => $query->where('name', 'like', '%'. $this->searchBook .'%'))
        ->when($this->searchAuthor > 0, fn(Builder $query) => $query->where('author_id', 'like', '%'. $this->searchAuthor  .'%'))
        ->paginate(10);

        return view('livewire.show-books', [
            'books' => $books
        ])->layout('layouts.app-livewire');
    }
}

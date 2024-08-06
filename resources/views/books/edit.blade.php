@extends('layouts.main')

@section('content')
    <section class="main__book-create">
        <div class="book-create__container">
            <h1 class="book-create__title title">Book update</h1>
            <form action="{{ route('books.update', $books->id) }}" method="POST" enctype="multipart/form-data"
                class="book-create__form">
                @csrf
                @method('patch')
                <select multiple name="groups[]">
                    @foreach ($groups as $group)
                        <option
                            @foreach ($books->groups as $item) {{ $group->id == $item->id ? 'selected' : '' }} @endforeach
                            value="{{ $group->id }}" class="vocabulary-create__groups">
                            {{ $group->group_name }}
                        </option>
                    @endforeach
                </select>

                @error('groups')
                    <p class="form-error__message">{{ $message }}</p>
                @enderror
                <div class="grammar-create__block book-create__cover">
                    <label class="grammar-create__image book-create__image">
                        <input type="file" hidden="" name="book_cover">
                        <img src="{{ Vite::asset($books->book_cover) }}" alt="Натисніть, щоб завантажити зображення"
                            id="book_cover">
                    </label>
                </div>
                <div class="book-create__info">
                    <input type="text" name="book_title" placeholder="Title" value="{{ $books->book_title }}">
                    @error('book_title')
                        <p class="form-error__message">{{ $message }}</p>
                    @enderror
                    <input type="text" name="book_link" placeholder="Google Drive link" value="{{ $books->book_link }}">
                    @error('book_link')
                        <p class="form-error__message">{{ $message }}</p>
                    @enderror
                    <button type="submit" class="grammar-create__button button">Update</button>
                </div>
            </form>
        </div>
        <script src="{{ Vite::asset('resources/js/bookCover.js') }}"></script>
    </section>
@endsection

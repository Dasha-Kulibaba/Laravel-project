@extends('layouts.main')

@section('content')
    <div class="main__vocabulary-create">
        <div class="vocabulary-create__container">
            <h1 class="vocabulary-create__title title">
                Vocabulary create
            </h1>
            <form action="{{ route('vocabulary.store') }}" method="post" id="vocabForm">
                @csrf
                <select multiple name="groups[]">
                    @foreach ($groups as $group)
                        <option value="{{ $group->id }}" class="vocabulary-create__groups">
                            {{ $group->group_name }}
                        </option>
                    @endforeach
                </select>
                @error('groups')
                    <p class="form-error__message">{{ $message }}</p>
                @enderror
                <div class="grammar-create__block">
                    <input type="text" value="{{ old('voc_word') }}" name="voc_word" class="vocabulary-create__word"
                        placeholder="word">
                </div>
                @error('voc_word')
                    <p class="form-error__message">{{ $message }}</p>
                @enderror
                <div class="grammar-create__block">
                    <input type="text" value="{{ old('voc_explain') }}" name="voc_explain"
                        class="vocabulary-create__explane" placeholder="explanation">
                </div>
                @error('voc_explain')
                    <p class="form-error__message">{{ $message }}</p>
                @enderror
                <div class="grammar-create__block">
                    <textarea class="vocabulary-create__example" name="voc_example" placeholder="explanation">{{ old('voc_example') }}</textarea>
                </div>
                @error('voc_example')
                    <p class="form-error__message">{{ $message }}</p>
                @enderror
                <button type="submit" class="grammar-create__button button">Create</button>
            </form>
        </div>
    </div>
@endsection

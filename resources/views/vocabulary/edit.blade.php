@extends('layouts.main')

@section('content')
    <div class="main__vocabulary-create">
        <div class="vocabulary-create__container">
            <h1 class="vocabulary-create__title title">
                Vocabulary create
            </h1>
            <form action="{{ route('vocabulary.update', $vocabulary->id) }}" method="post" id="vocabForm">
                @csrf
                @method('patch')
                <select multiple name="groups[]">
                    @foreach ($groups as $group)
                        <option
                            @foreach ($vocabulary->groups as $vocGroup) 
								{{ $group->id == $vocGroup->id ? 'selected' : '' }} @endforeach
                            value="{{ $group->id }}" class="vocabulary-create__groups">
                            {{ $group->group_name }}
                        </option>
                    @endforeach

                </select>
                <div class="grammar-create__block">
                    <input type="text" name="voc_word" class="vocabulary-create__word" placeholder="word"
                        value="{{ $vocabulary->voc_word }}">
                </div>
                <div class="grammar-create__block">
                    <input type="text" name="voc_explain" class="vocabulary-create__explane" placeholder="explanation"
                        value="{{ $vocabulary->voc_explain }}">
                </div>
                <div class="grammar-create__block">
                    <textarea class="vocabulary-create__example" name="voc_example" placeholder="explanation">{{ $vocabulary->voc_example }}</textarea>
                </div>
                <button type="submit" class="grammar-create__button button">Update</button>
            </form>
        </div>
    </div>
@endsection

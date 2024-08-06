@extends('layouts.main')

@section('content')
    <section class="main__grammar-topic grammar-topic">
        <div class="grammar-topic__container">

            <div class="grammar-topic__header">
                <h1 class="grammar-topic__title title">{{ $les->les_topic }}</h1>
					 @can('view', auth()->user())
                <a href="{{ route('lesson.edit', $les->id) }}">Edit</a>
					 @endcan
            </div>
            @foreach ($contents as $item)
                @switch($item->lc_type)
                    @case('image')
                        <div class="grammar-topic__images">
                            <div class="grammar-topic__item">
                                <img src="{{ Vite::asset($item->lc_content) }}" alt="">
                            </div>
                        </div>
                    @break

                    @case('text')
                        {!! $item->lc_content !!}
                    @break

                    @case('audio')
                        <div class="grammar-topic__audio">
                            <div grammar-topic__item>
                                <audio src="{{ Vite::asset($item->lc_content) }}" controls></audio>
                            </div>
                        </div>
                    @break
                @endswitch
            @endforeach
            @if (count($exer) > 0)
                <div class="grammar-topic__exercise exercise">
                    <h3 class="exercise__title">Exercises</h3>
                    <form action="{{ route('check.index') }}" method="get">
                        <input type="text" hidden value=" {{ $i = 0 }}">
                        @foreach ($exer as $item)
                            <input type="text" style="display: none;" value=" {{ $i++ }}">
                            <div class="exercise__task">
                                <p class="exercise__question">{{ $item->ex_task }}</p>
                                <input type="text" style="display: none;" name="exer[]" value="{{ $item->id }}">
                                <div class="exercise__variants">
                                    <input type="radio" id="var{{ ++$i }}" required
                                        name="task{{ $item->id }}" class="exercise__answer"
                                        value="{{ $item->ex_var1 }}">
                                    <label for="var{{ $i }}">{{ $item->ex_var1 }}</label>
                                    <input type="radio" id="var{{ ++$i }}" required
                                        name="task{{ $item->id }}" class="exercise__answer"
                                        value="{{ $item->ex_var2 }}">
                                    <label for="var{{ $i }}">{{ $item->ex_var2 }}</label>
                                    @if ($item->ex_var3 !== null)
                                        <input type="radio" id="var{{ ++$i }}" required
                                            name="task{{ $item->id }}" class="exercise__answer"
                                            value="{{ $item->ex_var3 }}">
                                        <label for="var{{ $i }}">{{ $item->ex_var3 }}</label>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                        <button type="submit" class="exercise__button button">Check answers</button>
                    </form>
                </div>
            @endif
        </div>
    </section>
@endsection

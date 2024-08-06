@extends('layouts.main')


@section('content')
    <section class="main__exercise-result">
        <div class="exercise-result__container">
            <h1 class="exercise-result__title title">
                Results:
            </h1>
            <div class="exercise-result__body">
                @foreach ($tasks as $item => $answer)
                    <div class="exercise-result__item">
                        <p class="exercise-result__task">{{ $answer }}</p>
                        <div class="exercise-result__student">
                            <p class="exercise-result__head">your answer</p>
                            <p class="exercise-result__text">{{ $stAnswers[$item] }}</p>
                        </div>
                        <div class="exercise-result__correct">
                            <p class="exercise-result__head">correct answer</p>
                            <p class="exercise-result__text">{{ $corAnswers[$item] }}</p>
                        </div>
                    </div>
                @endforeach
                <p class="exercise-result__score "><span class="title">your
                        score: </span>{{ $progress }}/{{ count($tasks) }}</p>

            </div>
        </div>
    </section>
@endsection

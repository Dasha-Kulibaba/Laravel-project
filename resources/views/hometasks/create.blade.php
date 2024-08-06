@extends('layouts.main')

@section('content')
    <section class="main__hometask-create">
        <div class="hometask-create__container">
            <h1 class="hometask-create__title title">
                Hometask create
            </h1>
            <form action="{{ route('hometasks.store') }}" method="post" class="hometask-create__form">
                @csrf
                <input type="date" name="task_deadline" value="{{ old('task_deadline') }}" placeholder="Task Deadline">
                @error('task_deadline')
                    <p class="form-error__message">{{ $message }}</p>
                @enderror
                <select name="group_id">
                    @foreach ($groups as $item)
                        <option value="{{ $item->id }}">{{ $item->group_name }}</option>
                    @endforeach
                </select>
                <textarea name="task_text" placeholder="Hometask text">{{ old('task_text') }}</textarea>
                @error('task_text')
                    <p class="form-error__message">{{ $message }}</p>
                @enderror
                <button type="submit" class="grammar-create__button button">Create</button>

            </form>
        </div>
    </section>
@endsection

@extends('layouts.main')

@section('content')
    <section class="main__profile profile">
        <div class="profile__container">
            <div class="profile__head">

                <form action="{{ route('teacher.avatar') }}" method="post" enctype="multipart/form-data"
                    class="profile__avatar">
                    @csrf
                    <label class="grammar-create__image teacher__avatar-label">
                        <input type="file" hidden="" name="avatar">
                        <img src="{{ Vite::asset(Auth::user()->teacher->teacher_avatar) }}" id="previewAvatar">
                    </label>
                </form>
                <h1 class="profile__name">
                    {{ Auth::user()->name }}
                </h1>
            </div>
            <div class="profile-teacher__new-group">
                <form action="{{ route('group.create') }}" method="post">
                    @csrf
                    <input type="text" name="group_name" placeholder="group name" required>
                    <button type="submit" class="button profile-teacher__button">Add</button>
                </form>
            </div>
            @if (isset($students))
                <div class="profile__body profile-teacher">
                    <div class="profile-teacher__body">
                        <p class="profile-teacher__title">
                            students:
                        </p>
                        <div class="profile-teacher__students teachers-student">
                            @foreach ($students as $student)
                                @foreach ($student as $item)
                                    <div class="teachers-student__item">
                                        <div class="teachers-student__avatar">
                                            <div>
                                                <img src="{{ Vite::asset($item->st_avatar) }}" alt="">
                                            </div>
                                        </div>
                                        <p class="teachers-student__name">
                                            {{ $item->st_name }}
                                        </p>
                                        <p class="teachers-student__progress">
                                            {{ $item->group->group_name }}
                                        </p>
                                    </div>
                                @endforeach
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif

        </div>
        <script src="{{ Vite::asset('resources\js\avatar.js') }}"></script>
    </section>
@endsection

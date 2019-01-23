@extends('layouts.app')

@section('content')

<div class="column is-half is-offset-one-quarter">
    <section class="section">
        <h3 class="title is-3">La Todo de {{ Auth::user()->name }} </h3>


        <form action="{{route('post.task')}}" method="post">
            {{csrf_field()}}

            <div class="field">
                <label class="label">Task</label>
                <div class="control">
                    <input class="input @if ($errors->has('name')) is-danger @endif" type="text"
                           placeholder="Votre tache" name="name" value="{{old('name')}}" required>
                </div>
            </div>


            <div class="field">
                <div class="control">
                    <button class="button is-link">Ajouter une tache</button>
                </div>
            </div>

        </form>


        <div style="margin: 50px 0;">
            @foreach($tasks as $task)
                <div class="level box">
                    <div>
                        <p class="">{{ $task->name }}</p>
                        <p>{{ $task->created_at }}</p>
                    </div>

                    <form class="level-right" method="POST" action="{{ route('delete') }}">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button name="id" value="{{$task->id}}" type="submit" class="delete"></button>
                    </form>

                </div>
            @endforeach
        </div>


    </section>
</div>

@endsection

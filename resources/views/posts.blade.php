<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Tasks') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <div class="col py-3">
                    @if (Session::get('status'))
                    <div class="alert alert-info m-2">
                        {{ Session::get('status') }}
                    </div>
                @endif
                    <div class="card m-5">
                        <div class="card-header h6"><h5 class="card-title">New Task</h5></div>
                        <div class="card-body">
                          <h6 class="card-title">Task</h6>
                          <form class="form-group" action="{{ route('daily.store') }}"  method="POST">
                            @csrf
                          <input class="form-control my-1" type="text" name="title" placeholder="Add new tasks">
                          {{-- <input type="checkbox" class="my-4" name="completed" value="1" @if (old('title') == 1) checked @endif > --}}
                          {{-- <label for="completed" class="mx-1">Completed</label> --}}
                          <br>
                          <button class="btn btn-success my-1"><i class="fa fa-plus px-1"></i>Add Task</button>

                        </form>
                        </div>
                      </div>



      <div class="card m-5">
        <div class="card-header h6"><h5 class="card-title">Current Task</h5></div>
        <div class="card-body">
          <h6 class="card-title">All Tasks</h6>
          <hr>

          @if ($posts && $posts->count())
          <table style="word-wrap:break-word;table-layout: fixed;" class="table table-bordered">
            <tr>
                <th style="width: 10%;">Date</th>
                <th style="width: 64%;">Task</th>
                <th style="width: 8%;">Status</th>
                <th style="width: 11%;">Actions</th>
            </tr>
            @foreach ($posts as $post)
                <tr>
                    <th>{{ $post->created_at }}</th>
                    <th> <a class="text-decoration-none text-dark" href="{{ route('daily.show' , $post->id) }}"> {{ $post->title }}</th> </a>
                    <th class="py-4">
                        @if ($post->completed)

                        <span class="badge badge-sm bg-success">Completed</span>

                        @else
                        <span class="badge badge-sm bg-info mx-3">Open</span>

                        @endif
                    </th>
                    <th class="d-flex py-4">
                        <a class="btn btn-sm btn-warning" href="{{ route('daily.edit', $post->id) }}"><i class="fa fa-edit"></i></a>
                        <form action="{{ route('daily.destroy',  $post->id) }}" method="POST" onsubmit="retrun confirm('Are you sure');">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-sm btn-danger mx-2"><i class="fa fa-trash"></i></button>
                        </form>

                        <form action="{{ route('daily.complete', $post->id) }}" method="POST">
                            @method('PUT')
                            @csrf
                            @if (!$post->completed)
                            <button type="submit" class="btn btn-sm btn-success p-1 mr-1"><i class="fa fa-check mx-1"></i></button>
                            @endif
                        </form>
                    </th>
                </tr>
                @endforeach
        </table>
        {{ $posts->links() }}
        @else
              <p><strong> 0 Tasks </strong></p>
            </div>
        </div>
        @endif
    </div>
</div>

            </div>
        </div>
    </div>
</x-app-layout>
@extends('footer')

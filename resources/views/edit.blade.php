<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Tasks') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="col py-3">
                    <div class="card m-5">
                        <div class="card-header h6"><h5 class="card-title">Edit Task</h5></div>
                        <div class="card-body">
                          <h6 class="card-title">Task</h6>
                          <form class="form-group" action="{{ route('daily.update', $post->id) }}"  method="POST">
                            @csrf
                            @method('PUT')
                          <input class="form-control my-1" type="text" name="title" value="{{ $post->title }}" placeholder="Add new tasks">
                          <input type="checkbox" class="my-4" name="completed" value="1" @if ($post->completed) checked @endif>
                          <label for="completed" class="mx-1">Completed</label>
                          <br>
                          <button class="btn btn-success my-1"><i class="fa fa-save px-1 mx-1"></i>Update Task</button>

                        </form>
                        </div>
                      </div>

                    </div>
                </div>
            </div>
        </x-app-layout>
        @extends('footer')

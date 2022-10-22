<x-app-layout>
    <div class="py-12">
        
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="card">
                <div class="card-header h6"><h5 class="card-title">Current Task</h5>
  </div>
  <div class="card-body">
      
    <h5 class="">Data: </h5>
    <p>{{ $post->created_at }}</p>
    <h5>Task: </h5>
    <p>{{ $post->title }}</p>
    <h5>Status:
    @if ($post->completed)
                <span class="badge badge-sm bg-success">Completed</span>
            @else
                <span class="badge badge-sm bg-info mx-3">Open</span>
            @endif</h5>

            <form action="{{ route('daily.complete', $post->id) }}" method="POST">
                @method('PUT')
                @csrf
                @if (!$post->completed)
                <button type="submit" class="btn btn-sm btn-success p-1 mr-1"><i class="fa fa-check mx-1"></i>Make as Completed</button>
                @else 
                <a class="btn btn-sm btn-primary p-1 mr-1" href="{{ route('daily.index') }}"><i class="fa fa-arrow-circle-left mx-1"></i>Back to Tasks</a>
                @endif
            </form>
  </div>
  <div class="card-footer text-muted">
  </div>
</div>
            </div>
        </div>
    </div>
</x-app-layout>
@extends('footer')
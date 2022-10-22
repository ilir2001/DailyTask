<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="card text-center">
  <div class="card-header">
  </div>
  <div class="card-body" style="padding: 5rem;">
    <h5 class="card-title">Welcome {{ Auth::user()->name }}</h5>
    <p class="card-text">Make your life easier with DailyTask.</p>
    <a href="{{ route('daily.index') }}" class="btn btn-primary">Go to Tasks</a>
  </div>
  <div class="card-footer text-muted">
  </div>
</div>
            </div>
        </div>
    </div>
</x-app-layout>
@extends('footer')

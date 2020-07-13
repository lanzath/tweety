@extends('layouts.app')

@section('content')
    {{-- Tailwind flex applies only for large screens --}}
    <div class="lg:flex lg:justify-between">
        {{--
            Sidebar Links Div
            Tailwind w-1/6 (~=16.7% width) applies only for large screens
        --}}
        <div class="lg:w-1/6">
            @include('_sidebar-links')
        </div>

        <div class="lg:flex-1 lg:mx-10" style="max-width: 700px">
            @include('_publish-tweet-panel')

            <div class="border border-gray-300 rounded-lg">
                @include('_tweet')
                @include('_tweet')
                @include('_tweet')
                @include('_tweet')
            </div>
        </div>

        {{--
            Friends list div
            Tailwind w-1/6 (~=16.7% width) applies only for large screens
        --}}
        <div class="lg:w-1/6 bg-blue-100 rounded-lg p-4">
            @include('_friends-list')
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <header class="mb-6 relative">
        <div class="relative">
            <img
                src="/images/default-profile-banner.jpg"
                alt=""
                class="mb-2"
            >

            <img
                src="{{ $user->avatar }}"
                alt=""
                class="rounded-full mr-2 absolute bottom-0 transform -translate-x-1/2 translate-y-1/2"
                style="left: 50%"
                width="150"
            >
        </div>

        <div class="flex justify-between items-center mb-6">
            <div style="max-width: 270px">
                <h2 class="font-bold text-2xl mb-0">{{ $user->name }}</h2>
                <p class="text-sm">Joined {{ $user->created_at->diffForHumans() }}</p>
            </div>

            <div class="flex">
                <a href="" class="rounded-full border border-gray py-2 px-4 text-black text-xs mr-2">Edit Profile</a>
                <a href="" class="bg-blue-500 rounded-lg shadow py-2 px-2 text-white">Follow Me</a>
            </div>
        </div>

        <p class="text-sm">
            The name’s Xablau. Xablau Jubileu. Don’t wear it out. Xablau is an anthropomorphic red
            unknown stuff or hare who is famous for his flippant, insouciant personality.
            He is also characterized by a Brooklyn accent, his portrayal as a trickster,
            and his catch phrase "Eh...What's up, doc?"
        </p>
    </header>

    <hr>

    @include('_timeline', [
        'tweets' => $user->tweet
    ])
@endsection

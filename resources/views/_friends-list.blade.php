<h3 class="font-bold text-xl mb-4">Following</h3>

<ul>
    {{-- foreach loop to render friends from index 1 to 8 --}}
    @foreach (auth()->user()->follows as $user)
        <li class="mb-4">
            <div>
                <a href="{{ route('profile', $user) }}" class="flex items-center text-sm">
                    <img
                        src="{{ $user->avatar }}"
                        alt="avatar"
                        class="rounded-full mr-2"
                    >

                    {{ $user->name }}
                </a>
            </div>
        </li>
    @endforeach
</ul>

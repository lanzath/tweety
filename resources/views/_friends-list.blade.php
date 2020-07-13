<h3 class="font-bold text-xl mb-4">Friends</h3>

<ul>
    {{-- foreach loop to render friends from index 1 to 8 --}}
    @foreach (range(1, 8) as $index)
        <li class="mb-4">
            <div class="flex items-center text-sm">
                <img
                    src="https://i.pravatar.cc/40"
                    alt="avatar"
                    class="rounded-full mr-2"
                >

                Xablau
            </div>
        </li>
    @endforeach
</ul>

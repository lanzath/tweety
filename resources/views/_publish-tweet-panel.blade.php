{{--
    TweetBox Div.
    Tailwind flex-1 class applies only for large screens
--}}
<div class="border border-blue-400 rounded-lg px-8 py-6 mb-8">
    <form action="" method="">
        <textarea
            name="body"
            class="w-full"
            placeholder="What's up doc?"
        ></textarea>

        <hr class="my-4">

        <footer class="flex justify-between">
            <img
                alt="avatar"
                src="https://i.pravatar.cc/40"
                class="rounded-full mr-2"
            >
            <button
                class="bg-blue-500 rounded-lg shadow py-2 px-2 text-white"
                type="submit"
            >Tweet!</button>
        </footer>
    </form>
</div>

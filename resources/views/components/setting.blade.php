@props(['heading'])

<section class="py-8 max-w-4xl mx-auto">
    <h1 class="text-lg font-bold mb-8 pb-2 border-b">
        {{ $heading }}
    </h1>

    <div class="flex">
        <aside class="w-48 flex-shrink-0">
            <h4 class="font-semibold mb-4">Links</h4>

            <ul>
                <li>
                    <a href="{{route('admin.posts.index')}}" class="{{ request()->routeIs('admin.posts.index') ? 'text-blue-500' : '' }}">All Posts</a>
                </li>

                <li>
                    <a href="{{route('admin.posts.create')}}" class="{{ request()->routeIs('admin.posts.create') ? 'text-blue-500' : '' }}">New Post</a>
                </li>
                <li>
                    <form action="{{route('admin.clearcache')}}" method="post">
                        @csrf
                        <button>Clear Cache</button>
                    </form>
                </li>
                <li>
                    <form action="{{route('admin.seeddb')}}" method="post">
                        @csrf
                        <button>Seed DB</button>
                    </form>
                </li>
                <li>
                    <form action="{{route('admin.queuework')}}" method="post">
                        @csrf
                        <button>Queue Work</button>
                    </form>
                </li>
                <li>
                    <form action="{{route('admin.queuelisten')}}" method="post">
                        @csrf
                        <button>Queue listen</button>
                    </form>
                </li>
                <li>
                    <form action="{{route('admin.queuestop')}}" method="post">
                        @csrf
                        <button>Queue Stop</button>
                    </form>
                </li>
                <li>
                    <form action="{{route('admin.schedulerun')}}" method="post">
                        @csrf
                        <button>Schedule run</button>
                    </form>
                </li>
                <li>
                    <form action="{{route('admin.schedulework')}}" method="post">
                        @csrf
                        <button>Schedule work</button>
                    </form>
                </li>
            </ul>
        </aside>

        <main class="flex-1">
            <x-panel>
                {{ $slot }}
            </x-panel>
        </main>
    </div>
</section>

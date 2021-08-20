<x-layout>
    <x-profile heading="Manage Bookmark">
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="overflow-hidden sm:rounded-lg">
                               <ul>
                                   @foreach($bookmarks as $post)
                                   <a href="{{route('posts.show',$post->slug)}}">
                                        <li>{{$post->title}}</li>
                                    </a>
                                   @endforeach
                               </ul>
                    </div>
                </div>
            </div>
        </div>
    </x-profile>
</x-layout>

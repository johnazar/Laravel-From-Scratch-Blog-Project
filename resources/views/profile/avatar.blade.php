<x-layout>
    <x-profile heading="Manage Avatar">
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead>
                                <th>
                                    Image
                                </th>
                                <th>
                                    Action
                                </th>
                            </thead>

                            <tbody class="bg-white divide-y divide-gray-200">
                               <tr>
                                   <td>
                                       <img src="{{auth()->user()->user_avatar}}" alt="Lary avatar">
                                   </td>
                                   <td class="space-y-2" >
                                       <form action="{{route('avatarset')}}" method="post" class="space-y-2" enctype="multipart/form-data">
                                           @csrf
                                           <input type="file" name="avatar">
                                           <button type="submit" class="transition-colors duration-300 text-xs font-semibold bg-gray-200 hover:bg-gray-300 rounded-full py-2 px-8">Upload</button>
                                       </form>
                                       <form action="{{route('avatarremove')}}" method="post">
                                           @csrf
                                           @method('DELETE')
                                           <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                                           <button type="submit" class="transition-colors duration-300 text-xs text-white font-semibold bg-red-500 hover:bg-red-700 rounded-full py-2 px-8">Delete</button>
                                       </form>
                                       
                                   </td>
                               </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </x-profile>
</x-layout>

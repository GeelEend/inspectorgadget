<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Studenten
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-auto shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="w-full">
                        <thead>
                        <tr>
                            <th class="text-left pr-3">ID</th>
                            <th class="text-left">Naam</th>
                            <th class="text-left">Email</th>
                            <th class="text-left">Verbannen?</th>
                            <th class="text-left min-w-[130px]">Verbannen Op</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td class="min-w-[170px]">{{ $user->name }}</td>
                                <td class="pr-3">{{ $user->email }}</td>
                                <td>
                                    <form class="flex" action="{{ route('user.update', ['user' => $user]) }}" method="post" enctype="multipart/form-data">
                                        @csrf

                                        <label class="switch">
                                            <input type="checkbox" name="banned_at" @if(!empty($user->banned_at)) checked @endif value="1">
                                            <span class="slider round flex">
                                                <span class="text-sm mt-2 ml-2">ja</span>
                                                <span class="text-sm mt-2 ml-3">nee</span>
                                            </span>
                                        </label>

                                        <button class="text-center ml-2 mr-3 inline-flex items-center px-2 py-1 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 ml-3" type="submit">opslaan</button>

                                    </form>
                                </td>

                                <td>
                                    @if(!empty($user->banned_at))  {{ $user->banned_at }}
                                        @else N.v.t.
                                    @endif
                                </td>
                            </tr>
                        </tbody>


                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

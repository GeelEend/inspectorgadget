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
                            <th class="text-left">ID</th>
                            <th class="text-left">Naam</th>
                            <th class="text-left">Email</th>
                            <th class="text-left">Verbannen?</th>
                            <th class="text-left">Verbannen Op</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
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

                                        <button class="text-center ml-2" type="submit">opslaan</button>

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

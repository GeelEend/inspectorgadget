<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Docenten
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
                            <th class="text-left min-w-[170px]">Volledige naam</th>
                            <th class="text-left">Foto</th>
                            <th class="text-left min-w-[130px]">border kleur</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($teachers as $teacher)
                            <tr>
                                <td>{{ $teacher->id }}</td>
                                <td>{{ $teacher->fullname }}</td>
                                <td class="max-w-[220px] pr-3 truncate">{{ $teacher->picture }}</td>

                                <td>{{ $teacher->border }}</td>
                                <td>
                                    <a href="{{route ('admin.teachers.edit', ['teacher' => $teacher])}}" class="inline-flex items-center px-2 py-1 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 ml-3">Bewerken</a>
                                </td>
                                <td>
                                    <form action="{{ route('admin.teachers.destroy', ['teacher' => $teacher]) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="inline-flex items-center px-2 py-1 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 ml-3">Verwijderen</button>
                                    </form>
                                </td>
                            </tr>
                        </tbody>

                        @endforeach
                    </table>

                    <a href="{{ route('admin.teachers.create') }}" class="inline-flex items-center px-2 py-1 mt-4 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 ml-3">Toevoegen</a>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>

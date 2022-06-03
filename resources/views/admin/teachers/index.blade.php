<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Docenten
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="w-full">
                        <thead>
                        <tr>
                            <th class="text-left">ID</th>
                            <th class="text-left">Volledige naam</th>
                            <th class="text-left">Foto</th>
                            <th class="text-left">border kleur</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($teachers as $teacher)
                            <tr>
                                <td>{{ $teacher->id }}</td>
                                <td>{{ $teacher->fullname }}</td>
                                <td>{{ $teacher->picture }}</td>

                                <td>{{ $teacher->border }}</td>
                                <td>
                                    <a href="{{route ('admin.teachers.edit', ['teacher' => $teacher])}}">Bewerken</a>
                                </td>
                                <td>
                                    <form action="{{ route('admin.teachers.destroy', ['teacher' => $teacher]) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit">Verwijderen</button>
                                    </form>
                                </td>
                            </tr>
                        </tbody>


                        @endforeach
                    </table>
                    <a href="{{ route('admin.teachers.create') }}">Toevoegen</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            studenten
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <form class="" action="" method="post" enctype="multipart/form-data">
                        @csrf

                        {{-- checkbox for user ban --}}
                        <input type="checkbox" name="banned_at" @if(!empty($users->banned_at)) checked @endif value="1">

                        {{-- Button to save ban --}}
                        <button type="submit">opslaan</button>

                    </form>

                </div>
            </div>
        </div>
    </div>

</x-app-layout>

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

                    <form class="" action="" method="post" enctype="multipart/form-data">
                        @csrf
                        <input class="" type="text" name="fullname" placeholder="volledige naam" value="{{ $teachers->fullname ??  ''}}"><br>
                        <div class="flex flex-row justify-around">
                            <img src="{{ '/storage/' . ($teachers->picture) }}" style="width:200px;"/>
                        </div>
                        <input class="" type="file" accept="image/*" name="picture" placeholder="foto" value="{{ $teachers->picture ?? ''}}">
                        <input class="" type="text" name="border" placeholder="kleur" value="{{ $teachers->border ?? ''}}">


                        <button type="submit">opslaan</button>

                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>

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
{{--                        <input class="" type="text" name="border" placeholder="kleur" value="{{ $teachers->border ?? ''}}"> --}}
                        <select id="colors" name="border">
                            <option value="darkred">donkerrood</option>
                            <option value="red">rood</option>
                            <option value="orange">oranje</option>
                            <option value="yellow">geel</option>
                            <option value="lightgreen">lichtgroen</option>
                            <option value="green">groen</option>
                            <option value="darkgreen">donkergroen</option>
                            <option value="lightblue">lichtblauw</option>
                            <option value="cyan">lichtblauw</option>
                            <option value="blue">blauw</option>
                            <option value="darkblue">donkerblauw</option>
                            <option value="purple">paars</option>
                            <option value="violet">violet</option>
                            <option value="pink">roze</option>
                        </select>

                        <button type="submit">opslaan</button>

                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="{{asset('css/app.css')}}">

    <title>Home</title>

</head>


<body class="h-[100vh] w-full">
    <div class="flex md:flex-row flex-col-reverse h-full w-full">

        {{-- Sidenav --}}
        <div class="sidenav bg-gray-600 flex flex-col md:w-full lg:w-[300px] md:h-full h-[65%] lg:block top-0 left-0  overflow-auto pt-[12px]">

            <div class="h-full flex flex-col justify-between">

                <div class="flex md:flex-col flex-row">

                    {{--  Teachers from DB --}}
                    @foreach ($teachers AS $teacher)
                        <div id="teacher-{{ $teacher->id }}"
                            class="click-teacher cursor-pointer flex items-center md:flex-row flex-col md:w-auto min-w-[170px] md:h-auto h-[200px] mx-2 mt-5 py-3 px-3 block mx-auto rounded-md bg-slate-800 leading-3 "
                            data-id="{{ $teacher->id }}">

                            <img src="{{ '/storage/' . $teacher->picture   }}"
                                 class="min-h-[60px] w-[60px] min-h-[60px] h-[60px] rounded-full bg-gray-100"/>

                            <div class="md:mt-0 mt-3 h-full pl-2 text-white ">
                                <div class="text-lg">{{ $teacher->fullname   }}</div>

                                @if($teacher->lastlocation)
                                    <div class="text-sm pr-1 created_at">Laatst gezien: <br>{{ $teacher->lastlocation->created_at->format('H:i')   }}</div>
                                @else
                                    <div class="text-sm pr-1 created_at">Nog niet gelocaliseerd</div>
                                @endif

                                @if($teacher->lastlocation)
                                <div class="text-xs">Locatie gegeven door: {{ $teacher->lastlocation->student->name }}</div>
                                    @endif
                            </div>
                        </div>
                    @endforeach


                </div>

                <div class="flex justify-start md:justify-between px-6 md:px-0 py-2">
                    {{-- Logout --}}
                    <form class="flex md:justify-center justify-start mt-5" method="POST" action="{{ route('logout') }}">
                        @csrf

                        <button :href="route('logout')"
                                class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-lg font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150"

                                onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </button>

                    </form>

                    {{-- Only shows button if user is an admin --}}
                    @if (auth()->user()->isAdmin())
                        <form class="flex justify-center mt-5 " action="{{ route('dashboard') }}">
                            @csrf

                            <button :href="route('dashboard')" class="inline-flex items-center px-4 py-2 ml-4 md:ml-0 bg-gray-800 border border-transparent rounded-lg font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                                {{ __('Admin Dashboard') }}
                            </button>

                        </form>
                    @endif
                </div>
            </div>

        </div>

        {{-- Map --}}
        <div class="flex flex-col h-full w-full">
            <div class="h-full w-full flex justify-center items-center bg-gray-200">
                @csrf
                <div id="mapid" class="center-block  md:w-[80%] w-full md:h-[70%] h-[90%] bg-white">

                </div>

            </div>
        </div>

    </div>

    {{-- Creates csrf token --}}
    <script>
        var token = "{{ csrf_token() }}";
    </script>

    <script src="{{ asset('js/app.js') }}"></script>

</body>
</html>

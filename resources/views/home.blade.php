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


<body class="h-[100vh] w-[100vh] md:w-full">


    <div class="h-full w-full m-0 flex">


        {{--  Sidenav  --}}

        <div class="sidenav h-full w-[25%] bg-gray-600 flex flex-col justify-between overflow-y-auto overflow-x-hidden">

            <div class="flex flex-col">

                {{--  Docenten  --}}
                @foreach ($teachers AS $teacher)
                    <div class="click-teacher cursor-pointer flex items-center mx-2 mt-5 py-3 px-3 block mx-auto rounded-md bg-slate-800 leading-3" data-id="{{ $teacher->id }}">

                        <img src="{{ '/storage/' . $teacher->picture   }}" class="w-[60px] h-[60px] rounded-full bg-gray-100"/>

                        <div class="h-full pl-2 text-white ">
                                <h1 class="text-lg">{{ $teacher->fullname   }}</h1>
                                <h1 class="text-sm pr-1">Laatst gezien: <br>{{ $teacher->lastlocation->created_at   }}</h1>
                        </div>
                    </div>
                @endforeach

                    <div class="h-full pl-2 text-white">


                    </div>


            </div>


            {{--  Logout  --}}
            <form class="flex justify-center mt-5" method="POST" action="{{ route('logout') }}">
                @csrf

                <button :href="route('logout')" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150"

                                 onclick="event.preventDefault();
                                                this.closest('form').submit();">
                    {{ __('Log Out') }}
                </button>

            </form>


        </div>


        {{--  Kaart  --}}

        <div class="flex flex-col h-full w-full">
            <div class="h-full w-full flex justify-center items-center bg-gray-200">
                @csrf
                    <div id="mapid" class="center-block  w-[80%] h-[70%] bg-white">

                    </div>

            </div>

            {{-- Kaart --}}


            {{--  footer  --}}
            <footer class="w-100 h-50 p-2 bg-white bg-gray-600">

                <span class="text-sm text-gray-500 sm:text-center text-gray-400">© 2022 All Rights Reserved.</span>

            </footer>

        </div>

    </div>

    <script>
        var token = "{{ csrf_token() }}";
    </script>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>

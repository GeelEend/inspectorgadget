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



        {{--  Hamburger Responsive  --}}
        <button data-collapse-toggle="mobile-menu" type="button" class="absolute inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-md lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="mobile-menu" aria-expanded="false" onclick="openNav()">
            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
        </button>

        <div class="flex flex-row h-full w-full">


            {{--  Sidenav  --}}
            <div id="mySidenav" class="sidenav bg-gray-600 flex flex-col w-[0px] lg:w-[300px] h-full  lg:block top-0 left-0 overflow-y-hidden lg:overflow-x-auto pt-[35px]">
            <a href="javascript:void(0)" class="closebtn lg:hidden" onclick="closeNav()">&times;</a>


                <div class="h-full flex flex-col justify-between">

                    <div class="flex flex-col">

                {{--  Docenten  --}}
                @foreach ($teachers AS $teacher)
                    <div class="click-teacher cursor-pointer flex items-center mx-2 mt-5 py-3 px-3 block mx-auto rounded-md bg-slate-800 leading-3" data-id="{{ $teacher->id }}">

                        <img src="{{ '/storage/' . $teacher->picture   }}" class="w-[60px] h-[60px] rounded-full bg-gray-100"/>

                        <div class="h-full pl-2 text-white ">
                                <h1 class="text-lg">{{ $teacher->fullname   }}</h1>
                                <h1 class="text-sm pr-1">Laatst gezien: <br>
                                    {{ $teacher->lastlocation->created_at ?? 'nog niet gelocaliseerd'}}
                                </h1>
                        </div>
                    </div>
                @endforeach


                            </div>

                {{--  Logout  --}}
                <form class="flex justify-center mt-5" method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button :href="route('logout')" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-lg font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150"

                                     onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </button>

                </form>


            </div>


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
            <footer class="w-100 h-50 p-2 bg-white bg-gray-600 text-center">

                <span class="text-sm text-gray-500 sm:text-center text-gray-400">© 2022 All Rights Reserved.</span>

            </footer>

        </div>
    </div>

    <script>
        var token = "{{ csrf_token() }}";
    </script>

    <script src="{{ asset('js/app.js') }}"></script>


        {{--Javascript Sidenav--}}
        <script>
            function closeNav() {
                document.getElementById("mySidenav").classList.add("w-[0px]");
                document.getElementById("mySidenav").classList.remove("w-[250px]");
            }

            function openNav() {
                document.getElementById("mySidenav").classList.remove("w-[0px]");
                document.getElementById("mySidenav").classList.add("w-[250px]");
            }
    </script>

</body>
</html>

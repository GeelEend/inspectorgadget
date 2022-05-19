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


<body class="h-[92.9vh]">


    <div class="h-full w-full m-0 flex">


        {{--  Sidenav  --}}

        <div class="h-full w-[25%] bg-gray-600 ">


            <div class="flex items-center mx-2 mt-5 py-3 px-3 block mx-auto rounded-md bg-slate-700">
                <div class="min-w-[60px] h-[60px] rounded-full bg-gray-100">

                </div>

                <div class="h-full pl-2 text-white">
                    <h1 class="text-lg">Docent</h1>
                    <h1 class="text-sm pr-1">laatst gezien 12:16</h1>
                </div>

            </div>

        </div>


        {{--  Kaart  --}}

        <div class="h-full w-full flex justify-center items-center bg-gray-200">


            <div class="h-[80%] w-[90%] bg-stone-100">

            </div>


        </div>


    </div>


    {{--  footer  --}}

    <footer class="w-100 h-100 p-4 bg-white bg-gray-800">

        <span class="text-sm text-gray-500 sm:text-center text-gray-400">© 2022 All Rights Reserved.</span>

    </footer>

</body>
</html>

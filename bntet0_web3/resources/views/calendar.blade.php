<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <title>calendar</title>
    <style>
        body {
            font-family: "Inter", sans-serif;
        }

        .background-animate {
            background-size: 400%;

            -webkit-animation: AnimationName 10s ease infinite;
            -moz-animation: AnimationName 10s ease infinite;
            animation: AnimationName 10s ease infinite;
        }

        @keyframes AnimationName {
            0%,
            100% {
            background-position: 0% 50%;
            }
            50% {
            background-position: 100% 50%;
            }
        }
    </style>  
</head>
<body class="body-bg min-h-screen  pb-6 px-2 md:px-0 bg-gradient-to-r from-red-900 via-yellow-600 to-gray-500 background-animate" style="font-family:'Lato',sans-serif;">
<?php
    $auth = Auth::user()->auth;
?>
<nav class="p-5 bg-white shadow md:flex md:items-center md:justify-between rounded-lg">
    <div class="flex justify-between items-center ">
      <span class="text-2xl font-bold cursor-pointer">
        MotoGP adatbázis
      </span>

      <span class="text-3xl cursor-pointer mx-2 md:hidden block">
        <ion-icon name="menu" onclick="Menu(this)"></ion-icon>
      </span>
    </div>

    <ul class="md:flex md:items-center z-[-1] md:z-auto md:static absolute bg-white w-full left-0 md:w-auto md:py-0 py-4 md:pl-0 pl-7 md:opacity-100 opacity-0 top-[-400px] transition-all ease-in duration-500">
      <li class="mx-4 my-6 md:my-0">
        <select onchange="window.location.href=this.value;" class="text-2xl hover:text-yellow-500 duration-500 font-bold w-52">
            <option hidden value="" disabled selected >Feladatok</option>
            <optgroup label="User felületek">
                <option value="{{route('calendar')}}">Race Calendar</option>
            </optgroup>
            @if ($user->legitimacy == 1)
                <optgroup label="Admin felületek">
                  <option value="{{route('fileupload')}}">Fájlfeltöltés és megjelenítés</option>
                  <option value="{{route('filegeneration')}}">Kimenet generálás</option>
                </optgroup>
            @endif
        </select>
      </li>
      <li>
        <a href="{{asset('logout')}}" class="text-2xl hover:text-yellow-500 duration-500 font-bold w-52">Kijelentkezés</a>
      </li>
    </ul>
</nav>

<main class="max-w-6xl mx-auto p-8 md:p-12 my-10 rounded-lg">
          <img src="https://i.imgur.com/LqjN9MU.png" class="max-w-full h-auto" alt="motogp logo" referrerpolicy="no-referrer" />
    </main>

  <script>
    function Menu(e){
      let list = document.querySelector('ul');
      e.name === 'menu' ? (e.name = "close",list.classList.add('top-[80px]') , list.classList.add('opacity-100')) :( e.name = "menu" ,list.classList.remove('top-[80px]'),list.classList.remove('opacity-100'))
    }
  </script>
</body>
</html>
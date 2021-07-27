<!-- This example requires Tailwind CSS v2.0+ -->
<head>
            <meta charset="UTF-8" />

            <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>

            <meta name="viewport" content="width=device-width, initial-scale=1.0" />

            <link href="{{ asset('css/app.css') }}" rel="stylesheet">
            <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>
<nav class="bg-gray-800">
  <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
    <div class="relative flex items-center justify-between h-16">
      <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
        <!-- Mobile menu button-->
        <button type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
          <span class="sr-only">Open main menu</span>
          <!--
            Icon when menu is closed.

            Heroicon name: outline/menu

            Menu open: "hidden", Menu closed: "block"
          -->
          <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
          </svg>
          <!--
            Icon when menu is open.

            Heroicon name: outline/x

            Menu open: "block", Menu closed: "hidden"
          -->
          <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>
      <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
        <div class="flex-shrink-0 flex items-center">
            <img class="lg:block h-8 w-auto" src="/images/elasticsearch.png" alt="Elastic">
            <h2 class="ml-4 text-white font-bold">Elastic Search</h2>
        </div>
        <div class="flex ml-auto">
                <input class="w-96 rounded-lg p-2 h-10 outline-none" type="text" placeholder="Search..." value="{{ request('query') }}" name="query">
                <button type="submit" class="mr-auto justify-end items-center text-blue-500 p-2 hover:text-blue-400 " >
                    <i class="material-icons" style="margin-left: -70px;">search</i>
                    
                </button>
        </div>
      </div>
      </div>
    </div>
  </div>
</nav>

    <head>
            <meta charset="UTF-8" />

            <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>

            <meta name="viewport" content="width=device-width, initial-scale=1.0" />

            <link href="{{ asset('css/app.css') }}" rel="stylesheet">
            <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>
    <div class="flex-col">
        <div class="card">
            <div class="card-header" style="margin-left:600px;">
                  Users <small class="ml-0">({{ count($users) }})</small>
            </div>
            <form action="{{ url('search') }}" method="get">
            <div class="flex">
                <input class="w-96 ml-auto  rounded p-2" type="text" placeholder="Search..." value="{{ request('query') }}" name="query" >
                <button type="submit" class=" w-12  mr-auto justify-end items-center text-blue-500 p-2 hover:text-blue-400" >
                    <i class="material-icons" style="margin-left: -100px;">search</i>
                    
                </button>
            </div>
            </form>
              <div class="ml-44 space-y-10 flex-col">
                @forelse ($users as $user)
                    <data class="mb-3 ">
                        <h2 class="text-xl font-bold text-blue-700">{{ $user->book_name }}</h2>
                        <p class="m-0">{{ $user->author->author_name }} price {{$user->price}}</p>
                        <p class="m-0">{{ $user->author->email }}</p>

                    </data>
                @empty
                    <p>No users found</p>
                @endforelse
              
            </div>
        </div>
    </div>

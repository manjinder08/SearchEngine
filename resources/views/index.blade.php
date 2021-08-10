<head>
@include('layouts.nav')
            <meta charset="UTF-8" />

            <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>

            <meta name="viewport" content="width=device-width, initial-scale=1.0" />

            <link href="{{ asset('css/app.css') }}" rel="stylesheet">
            <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
            <link href='https://fonts.googleapis.com/css?family=Acme' rel='stylesheet'>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>

<div class="container grid grid-cols-4 gap-10 mx-auto mt-10  ">
@forelse ($users as $user)
    <div class="transform ease-in-out duration-500 bg-gray-200 flex-col w-64 h-64  shadow-lg hover:shadow-2xl  rounded-lg" style="background-image: url('/images/book.jpg'); background-size: 200px 250px;  background-repeat: no-repeat; background-position: center;">
        <div class="grid grid-rows-3 transform origin-top-left mt-14 ml-16 -skew-y-6 flex w-44  justify-center p-2 h-48">
        <span class="transform origin-left -rotate-6 mt-2 font-bold" style="font-family: Acme;" >{{ $user->book_name }}</span>
        <span class="transform origin-left -rotate-6 -ml-4 -mt-4 text-sm"> <span class="font-bold">By-</span> &nbsp{{ $user->author->author_name }}</span>
        <span class="transform origin-left -rotate-6 mt-6 ml-16 text-sm"><span class="font-bold">Price</span>-&nbsp{{$user->price}}</span>
        </div>
            
        </div>
    @empty
        <p>No users found</p>
@endforelse

</div>
@include('layouts.footer')
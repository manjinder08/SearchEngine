<!-- component --><head>
<meta charset="UTF-8" />

<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>

<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<link href="{{ asset('css/app.css') }}" rel="stylesheet">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<form method="post" action="{{ url('registration') }}">
            @csrf
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="bg-grey-lighter min-h-screen flex flex-col">
            <div class="container max-w-sm mx-auto flex-1 flex flex-col items-center justify-center px-2">
                <div class="bg-white px-6 py-8 rounded shadow-md text-black w-full">
                    <h1 class="mb-8 text-3xl text-center">Sign up</h1>
                    @if(Session::has('success'))
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                {{Session::get('success')}}
                            </div>
                        @elseif(Session::has('failed'))
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                {{Session::get('failed')}}
                            </div>
                        @endif
                    <input 
                        type="text"
                        class="block border border-grey-light w-full p-3 rounded mb-4"
                        name="name"
                        placeholder="Full Name" />
                        {!!$errors->first("name", "<span class='text-danger'>:message</span>")!!}

                    <input 
                        type="text"
                        class="block border border-grey-light w-full p-3 rounded mb-4"
                        name="email"
                        placeholder="Email" />
                        {!!$errors->first("email", "<span class='text-danger'>:message</span>")!!}
                    <input 
                        type="password"
                        class="block border border-grey-light w-full p-3 rounded mb-4"
                        name="password"
                        placeholder="Password" />
                        {!!$errors->first("password", "<span class='text-danger'>:message</span>")!!}
                    <input 
                        type="password"
                        class="block border border-grey-light w-full p-3 rounded mb-4"
                        name="confirm_password"
                        placeholder="Confirm Password" />
                        {!!$errors->first("confirm_password", "<span class='text-danger'>:message</span>")!!}

                    <button
                        type="submit"
                        class="w-full text-center py-3 rounded bg-green-500 text-white hover:bg-green-dark focus:outline-none my-1"
                    >Create Account</button>

                </div>

                <div class="text-grey-dark mt-6">
                    Already have an account? 
                    <a class="no-underline border-b border-blue text-blue" href="/signin/">
                        Log in
                    </a>.
                </div>
            </div>
        </div>
        </form>
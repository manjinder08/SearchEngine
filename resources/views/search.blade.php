<head>
<meta charset="UTF-8" />

<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>

<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>


<div class="container">
        <div class="card">
            <div class="card-header">
            users <small>({{ $users->count() }})</small>
            </div>
            <div class="card-body">
                <form action="{{ url('search') }}" method="get">
                    <div class="form-group">
                        <input
                            type="text"
                            name="query"
                            class="form-control"
                            placeholder="Search..."
                            value="{{ request('query') }}"
                        />
                    </div>
                </form>
                @forelse ($users as $user)
                    <article class="mb-3">
                        <h2>{{ $user->name }}</h2>

                        <p class="m-0">{{ $user->email}}</body>

                    </article>
                @empty
                    <p>No articles found</p>
                @endforelse
              
            </div>
        </div>
    </div>

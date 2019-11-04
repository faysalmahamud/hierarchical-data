<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 50px;
            }
        </style>
    </head>
    <body>

        <div class="flex-center position-ref full-height">

            <h1>Hierarchical Data - Categories</h1>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('categories.store') }}" method="POST">
                @csrf
                <select name="parent_id">
                    <option value="0">Category Parent ID</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                
                <input type="text" name="name" placeholder="Category name" />
              
                <button type="submit">Save</button>
            </form>

            <ul>
            @foreach($parent_categories as $category)
                <li>
                    {{ $category->name }}</a>
                    @if(count($category->subcategories))
                        @include('include.subcategories',['subcategories' => $category->subcategories])
                    @endif
                </li>
            @endforeach
          </ul>

        </div>

    </body>
</html>

<ul>
    @foreach($subcategories as $subcategory)
    <li>
        {{ $subcategory->name }}</a>
        @if(count($subcategory->subcategories))
            @include('include.subcategories',['subcategories' => $subcategory->subcategories])
        @endif
    </li>
    @endforeach
</ul>
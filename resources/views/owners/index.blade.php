    {{-- This file contains just the contents of the <main> element --}}
    
    @extends("app")

    {{-- wonder what this is supposed to be doing? --}}
    @section("title"){{"Blah blah blah"}}@endsection 
    
    @section("content")
        <div class="list-group">

            {{-- loop over all of the owners --}}
            {{-- each owner object goes into $owner --}}
            @foreach ($owners as $owner)

                {{-- We can pass an associative-array as the second argument to @include and that
                will then be available inside the partial with the variable name that we gave it
                ("owner" in this case). --}}
                @include("_partials/owners/owner-item", ["owner" => $owner])
            
            @endforeach
            
        </div>
    @endsection

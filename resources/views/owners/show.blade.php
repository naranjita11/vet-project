    @extends("app")
    
    @section("content")
        <div class="card">
            
            <h2 class="card-header">{{ $owner->fullName() }}</h2>
            
            <article class="card-body">
                <p>{{ $owner->formattedPhoneNumber() }}</p>
                <p>{{ $owner->fullAddress() }}</p>

                <div class="list-group">
                    {{-- loop over all of the owners --}}
                    {{-- each owner object goes into $owner --}}
                    @foreach ($animals as $animal)

                        {{-- We can pass an associative-array as the second argument to @include and that will then be available inside the partial with the variable name that we gave it ("animal" in this case). --}}
                        @include("_partials/animals/animal-item", ["animal" => $animal])
            
                    @endforeach
            
                </div>
            </article>
            

        </div>

    @endsection

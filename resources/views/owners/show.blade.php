    @extends("app")
    
    @section("content")
        <div class="card">
            <h2 class="card-header">{{ $owner->fullName() }}</h2>
            <article class="card-body">
                <p>{{ $owner->formattedPhoneNumber() }}</p>
                <p>{{ $owner->fullAddress() }}</p>
            </article>
        </div>
    @endsection

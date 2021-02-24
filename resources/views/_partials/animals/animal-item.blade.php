      <a href="/animals/{{ $animal->id }}" class="list-group-item list-group-item-action">
        <div class="d-flex w-100 justify-content-between">

          <h4 class="mb-1">{{ $animal->name }}, {{ $animal->type }}</h4>

          <small>Biteyness: {{ $animal->biteyness }}</small>
        </div>
        <p class="mb-1">DOB: {{ $animal->date_of_birth }}</p>  
        <p class="mb-1">Weight: {{ $animal->formattedWeight() }}</p>
        <p class="mb-1">Height: {{ $animal->formattedHeight() }}</p>

      </a>
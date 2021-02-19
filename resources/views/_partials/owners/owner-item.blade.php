      <a href="/owners/{{ $owner->id }}" class="list-group-item list-group-item-action">
        <div class="d-flex w-100 justify-content-between">

          {{-- output the owner name --}}
          <h5 class="mb-1">{{ $owner->fullName() }}</h5>

          {{-- output the owner ID --}}
          <small>{{ $owner->formattedPhoneNumber() }}</small>
        </div>

        {{-- use the fullAddress() method --}}
        <p class="mb-1">{{ $owner->fullAddress() }}</p>
      </a>
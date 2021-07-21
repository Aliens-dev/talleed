<th wire:click="setOrderField('{{ $name }}')" >
    {{ $slot }}
    @if($visible)
        @if($direction === 'ASC')
            <img src="/assets/img/up-arrow.svg" class="ml-2" width="12" height="12" alt="Up Arrow" />
        @else
            <img src="/assets/img/down-arrow.svg" class="ml-2" width="12" height="12" alt="Up Arrow" />
        @endif
    @endif
</th>

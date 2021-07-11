<div class="more-bar">
    @if($line)
        <div class="bar"></div>
    @endif
    <div class="bar-text">
        <span>
            {{ $slot }}
        </span>
    </div>
</div>

<div class="text-capitalize">
    @foreach($items as $item)
        <div style="padding-left: 40px; font-size: 13px">
            {{ $item->name }}
        </div>
    @endforeach
</div>

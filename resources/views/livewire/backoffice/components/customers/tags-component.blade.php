<div id="app-customers-tags">
    @forelse($customer->tags as $tag)
        <span class="badge app-customer-tag" style="background-color: {{ $tag->color }}">
            {{ $tag->name }}
            <i class="ri ri-delete-bin-2-line" wire:click.prevent="delete({{ $tag->id }})"></i>
        </span>
    @empty
        <p class="text-center">Sem tags</p>
    @endforelse
    <input type="text" name="new_tag" wire:model="new_tag" @ />
</div>

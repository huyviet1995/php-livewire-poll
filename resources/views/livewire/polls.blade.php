<div>
    @forelse($polls as $poll)
        <div class="mb-4">
            <div class="mb-4 text-xl">
                {{ $poll->title }}
            </div>
            @foreach ($poll->options as $option)
                <div class="mb-1">
                    <button class="btn" wire:click="vote({{ $option->id}})">Vote</button>
                    {{ $option->name }} {{ $option->votes->count() }}
                </div>
            @endforeach
        </div>
    @empty
        <div class="text-gray-500">No polls available</div>
    @endforelse
</div>

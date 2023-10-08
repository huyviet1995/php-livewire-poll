<div>
    <form wire:submit.prevent="createPoll">
        <label for="">Title</label>
        <input type="text" wire:model.live="title" />
        <br />
        <div class="mb-4 mt-3">
            <button class="btn" wire:click.prevent="addOption">Add option</button>
        </div>
        <br />
        <h3>Current options:</h3>
        @foreach ($options as $index => $option)
        <div class="mb-4">
            <label for="">Option {{ $index + 1 }}</label>
            <div class="flex gap-3">
                <input type="text" wire:model="options.{{$index}}">
                <button class="btn bg-red-500 text-white" wire:click="deleteOption({{ $index }})">Delete</button>
            </div>
        </div>
        @endforeach
        <button type="submit" class="btn">Create Poll</button>
    </form>

</div>
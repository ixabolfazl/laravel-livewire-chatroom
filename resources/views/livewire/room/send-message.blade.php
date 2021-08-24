<form wire:submit.prevent="send" class="flex items-start space-x-3">
    <div class="flex flex-col w-full">
        <input wire:model.debounce.1000ms="message" class="rounded-md p-2 shadow-sm border-gray-500 w-full" placeholder="Your Message" >
        @error('message')
        <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
    </div>
    <button type="submit" class="bg-blue-500 text-white rounded p-2 px-4">Send</button>

</form>

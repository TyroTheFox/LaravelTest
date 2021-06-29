<div class="p-6 sm:px-20 bg-white border-b border-gray-200">
    @if ($messageSent)
        <div class="mt-6 text-sm text-gray-700">
            Message Sent
        </div>
    @endif

    <div class="mt-5 md:mt-0 md:col-span-2">
        <form wire:submit.prevent="sendEmail">
            <div class="form-group">
                <label for="exampleInputEmail">Email</label>
                <input type="text" class="form-control" id="exampleInputEmail" placeholder="Enter name" wire:model="email">
                @error('email') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="exampleInputbody">Body</label>
                <textarea class="form-control" id="exampleInputbody" placeholder="Enter Body" wire:model="message"></textarea>
                @error('body') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <button type="submit" class="btn btn-primary">Save Contact</button>
        </form>
    </div>

    <x-jet-form-section submit="sendEmail">
        <x-slot name="title">
            {{ __('Send Email') }}
        </x-slot>

        <x-slot name="description">
            {{ __('Using the form below, you can send an email. As if by magic*.') }}
        </x-slot>

        <x-slot name="form">
            <!-- Recipient Email -->
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="toaddress" value="{{ __('Recipient') }}" />
                <x-jet-input id="toaddress" type="email" class="mt-1 block w-full" wire:model.defer="address" />
                <x-jet-input-error for="toaddress" class="mt-2" />
            </div>
            <!-- Message -->
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="message" value="{{ __('Message') }}" />
                <x-jet-input id="message" type="text" class="mt-1 block w-full" wire:model.defer="message" />
                <x-jet-input-error for="message" class="mt-2" />
            </div>
        </x-slot>
        <x-slot name="actions">
            <x-jet-button>
                {{ __('Send') }}
            </x-jet-button>
        </x-slot>
    </x-jet-form-section>

    <div class="mt-6 text-sm text-gray-700">
        * Disclaimer: Presence of Magic is not guaranteed or intended. Please seek local Sorcerer or reputable practitioner of the arcane should your computer
        become haunted or exhibit strange phenomena such as vomiting ectoplasm, summoning demons or floating above any recommended heights for your device.
    </div>
</div>

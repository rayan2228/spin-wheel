<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight ">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">

            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">

                <form class="p-6 " action="{{ route('Participants.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="name" class="block mb-4 text-sm font-medium ">Name Or
                            Number</label>
                        <input type="text" id="name" name="name_or_num"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg  block w-full p-2.5 ">
                        @error('name_or_num')
                            <small class="mt-2 text-base text-red-400">
                                {{ $message }}
                            </small>
                        @enderror
                        <small class="mt-2 text-base text-red-400">
                            {{ session()->get('checkError') }}
                        </small>

                    </div>
                    <div class="mb-4">
                        <label for="position" class="block mb-4 text-sm font-medium ">Select Position</label>
                        <select name="position" id="position"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg  block w-full p-2.5">
                            <option value="normal">normal</option>
                            <option value="first">first</option>
                            <option value="second">second</option>
                            <option value="third">third</option>
                        </select>
                        @error('position')
                            <small class="mt-2 text-base text-red-400">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                    <x-primary-button>
                        {{ __('submit') }}
                    </x-primary-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

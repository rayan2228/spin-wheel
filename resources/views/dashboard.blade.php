<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight ">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">

            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">


                <div class="p-6 ">


                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500 ">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-200">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        participant name or number
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        position
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        result
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        created_at
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($participants->chunk(5) as $participants_chunk)
                                    @foreach ($participants_chunk as $participant)
                                        <tr class="bg-white border-b ">
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                                {{ $participant->name_or_num }}
                                            </th>
                                            <td class="px-6 py-4">
                                                {{ $participant->position }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $participant->result }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $participant->created_at }}
                                            </td>
                                            <td class="px-6 py-4 ">
                                                <a href="{{ route('Participants.edit', ['Participant', $participant->id]) }}"
                                                    class="font-medium text-blue-600 hover:underline">Edit</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @empty
                                @endforelse



                            </tbody>
                        </table>
                    </div>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>

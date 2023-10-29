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
                        @if (session('success'))
                            <h1 class="text-lg text-green-600">{{ session('success') }}</h1>
                        @endif

                        <table class="text-left" id="example">
                            <thead>
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        no
                                    </th>
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

                                @foreach ($participants as $participant)
                                    <tr>
                                        <td scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                            {{ $loop->iteration }}
                                        </td>
                                        <td scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                            {{ $participant->name_or_num }}
                                        </td>
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
                                            <a href="{{ route('participants.edit', ['participant' => $participant->id]) }}"
                                                class="font-medium text-blue-600 hover:underline"
                                                name="id">Edit</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>

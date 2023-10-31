<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between text-xl font-semibold leading-tight">
            <a href="{{ url('/') }}" target="_blank"
                class="inline-block px-5 py-3 text-gray-800 capitalize bg-green-400 rounded-lg">
                {{ __('go to website') }}
            </a>
            <div>
                <form action="" id="spinShow">


                    <label class="inline-block pl-[0.15rem] hover:cursor-pointer " for="flexSwitchChecked">spin</label>
                    <input
                        class="mr-2 mt-[0.3rem] h-3.5 w-8 appearance-none rounded-[0.4375rem] bg-neutral-300 before:pointer-events-none before:absolute before:h-3.5 before:w-3.5 before:rounded-full before:bg-transparent before:content-[''] after:absolute after:z-[2] after:-mt-[0.1875rem] after:h-5 after:w-5 after:rounded-full after:border-none after:bg-neutral-100 after:shadow-[0_0px_3px_0_rgb(0_0_0_/_7%),_0_2px_2px_0_rgb(0_0_0_/_4%)] after:transition-[background-color_0.2s,transform_0.2s] after:content-[''] checked:bg-primary checked:after:absolute checked:after:z-[2] checked:after:-mt-[3px] checked:after:ml-[1.0625rem] checked:after:h-5 checked:after:w-5 checked:after:rounded-full checked:after:border-none checked:after:bg-primary checked:after:shadow-[0_3px_1px_-2px_rgba(0,0,0,0.2),_0_2px_2px_0_rgba(0,0,0,0.14),_0_1px_5px_0_rgba(0,0,0,0.12)] checked:after:transition-[background-color_0.2s,transform_0.2s] checked:after:content-[''] hover:cursor-pointer focus:outline-none focus:ring-0 focus:before:scale-100 focus:before:opacity-[0.12] focus:before:shadow-[3px_-1px_0px_13px_rgba(0,0,0,0.6)] focus:before:transition-[box-shadow_0.2s,transform_0.2s] focus:after:absolute focus:after:z-[1] focus:after:block focus:after:h-5 focus:after:w-5 focus:after:rounded-full focus:after:content-[''] checked:focus:border-primary checked:focus:bg-primary checked:focus:before:ml-[1.0625rem] checked:focus:before:scale-100 checked:focus:before:shadow-[3px_-1px_0px_13px_#3b71ca] checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s]  "
                        type="checkbox" role="switch" id="flexSwitchChecked" checked
                        onchange="document.getElementById('spinShow').submit()" />
                </form>
            </div>
        </div>
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
                                        show on wheel
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
                                            {{ $participant->onSpin }}
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

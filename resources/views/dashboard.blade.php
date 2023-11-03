<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between text-xl font-semibold leading-tight">
            <a href="{{ url('/') }}" target="_blank"
                class="inline-block px-5 py-3 text-gray-800 capitalize bg-green-400 rounded-lg">
                {{ __('go to website') }}
            </a>
            <div class="flex items-center gap-x-3">
                <form action="{{ route('settings') }}" id="spinShow" method="POST">
                    @csrf
                    <label class="inline-block pl-[0.15rem] hover:cursor-pointer " for="flexSwitchChecked">spin</label>
                    <select name="spin" id="" onchange="document.getElementById('spinShow').submit()">
                        <option value="1" @selected($spin->setting_value)>on</option>
                        <option value="0" @selected($spin->setting_value == 0)>off</option>
                    </select>
                </form>
                <form action="{{ route('settingslimit') }}" method="post">
                    @csrf
                    <input type="text" name="limit">
                    <button class="px-10 py-2 text-white capitalize bg-slate-500">set limit</button>
                </form>
                <form action="{{ url('removeAll') }}" method="post">
                    @csrf
                    <button class="px-10 py-2 text-white capitalize bg-red-500">Delete All</button>
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

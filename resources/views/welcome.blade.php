<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
</head>

<body>

    <div class="container">
        <div class="flex">
            <div class="spin">
                <div class="wheel">

                    <div class="inner-wheel">

                    </div>
                    @forelse ($participants->chunk(5) as $participants_chunk)
                        @foreach ($participants_chunk as $participant)
                            <div class="section" data-win="{{ $participant->position }}">
                                <span>{{ $participant->name_or_num }}</span>
                            </div>
                        @endforeach
                    @empty
                    @endforelse


                </div>
                <div class="button-wrap">
                    <div class="button">
                        <h4>SPIN</h4>
                    </div>
                </div>
            </div>





            <div class="wrapper">
                <div class="modal">
                    <!--     <span class="emoji">👏</span> -->
                    <span class="emoji round">🏆</span>
                    <h1 class="winName"></h1>
                    <a href="#" class="modal-btn">Celebrate</a>
                </div>
                <div id="confetti-wrapper">
                </div>
            </div>

            <div class="input ">
                <button class="filter" id="shuffle"> <i class="fa-solid fa-shuffle"></i>shuffle</button>
                <button class="filter" id="sort"><i class="fa-solid fa-arrow-down-a-z"></i>sort</button>
                <button class="filter" id="numbersort"><i class="fa-solid fa-arrow-down-a-z"></i>number sort</button>
                @if (session('success'))
                    <h1 class="success">{{ session('success') }}</h1>
                @endif
                <form action="{{ route('Participants.store') }}" method="POST">
                    @csrf
                    <textarea name="name_or_num" id=""></textarea>
                    <button class="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>

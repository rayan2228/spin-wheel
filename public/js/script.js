wheel = $(".wheel");
section = $(".section");
wrapper = $(".wrapper");
winName = $(".winName");
var number = section.length;

radius = 250;
area = 2 * (Math.PI * radius);
sectionNum = area / number;
angleToFit = Math.ceil(360 / number) * 0.57;
width = 2 * 250 * Math.sin((angleToFit * Math.PI) / 360);

for (x = 0; x < number; x++) {
    $.each(section, function (index, value) {
        rotate = Math.ceil(360 / number) * index;

        $(value).css({
            "border-color": `#${Math.random()
                .toString(16)
                .slice(2, 8)} transparent`,
            transform: `rotate(${rotate}deg)`,
            "border-width": `255px ${width}px 0`,
            "transform-origin": `${parseInt(width - 1)}px 254px`,
        });
    });
}

///////////////////////////////////////////////////////////////
var sectionAngle = angleToFit * 0.33 + angleToFit;

currRot = sectionAngle;
$(".button-wrap").click(function () {
    var count = 0;

    var rng = Math.floor(Math.random() * (1000 - 500 + 1) + 500);
    setTimeout(function () {
        $(".button-wrap").addClass("tick");
    }, 425);

    var interval = setInterval(function () {
        currRot = currRot + sectionAngle / 2;

        wheel.css("transform", "rotate(" + currRot + "deg)");

        count++;

        if (count == rng) {
            clearInterval(interval);
            setTimeout(function () {
                $(".button-wrap").removeClass("tick");
                $.each(section, function (index, value) {
                    if (
                        $(value).data().win == "first" ||
                        $(value).data().win == "second" ||
                        $(value).data().win == "third"
                    ) {
                        wrapper.css({ transform: "scale(1)" });
                        winName.text(`Congratulation, ${$(value).text()}`);
                        for (i = 0; i < 100; i++) {
                            // Random rotation
                            var randomRotation = Math.floor(
                                Math.random() * currRot
                            );
                            // Random Scale
                            var randomScale = Math.random() * 1;
                            // Random width & height between 0 and viewport
                            var randomWidth = Math.floor(
                                Math.random() *
                                    Math.max(
                                        document.documentElement.clientWidth,
                                        window.innerWidth || 0
                                    )
                            );
                            var randomHeight = Math.floor(
                                Math.random() *
                                    Math.max(
                                        document.documentElement.clientHeight,
                                        window.innerHeight || 500
                                    )
                            );

                            // Random animation-delay
                            var randomAnimationDelay = Math.floor(
                                Math.random() * 15
                            );

                            // Random colors
                            var colors = [
                                "#0CD977",
                                "#FF1C1C",
                                "#FF93DE",
                                "#5767ED",
                                "#FFC61C",
                                "#8497B0",
                            ];
                            var randomColor =
                                colors[
                                    Math.floor(Math.random() * colors.length)
                                ];

                            // Create confetti piece
                            var confetti = document.createElement("div");
                            confetti.className = "confetti";
                            confetti.style.top = randomHeight + "px";
                            confetti.style.right = randomWidth + "px";
                            confetti.style.backgroundColor = randomColor;
                            // confetti.style.transform='scale(' + randomScale + ')';
                            confetti.style.obacity = randomScale;
                            confetti.style.transform =
                                "skew(15deg) rotate(" + randomRotation + "deg)";
                            confetti.style.animationDelay =
                                randomAnimationDelay + "s";
                            document
                                .getElementById("confetti-wrapper")
                                .appendChild(confetti);
                        }
                        setTimeout(function () {
                            wrapper.css({ transform: "scale(0)" });
                        }, 5000);
                    }
                });
            }, 15);
        }
    }, 15);
});

// shuffle
const shuffleElm = document.querySelector("#shuffle");
const sortElm = document.querySelector("#sort");
const numberSortElm = document.querySelector("#numbersort");
const textareaElm = document.querySelector("textarea");

shuffleElm.addEventListener("click", () => {
    let array = textareaElm.value.split("\n");

    let currentIndex = array.length;
    let randomIndex;

    // While there remain elements to shuffle.
    while (currentIndex > 0) {
        // Pick a remaining element.
        randomIndex = Math.floor(Math.random() * currentIndex);
        currentIndex--;

        // And swap it with the current element.
        [array[currentIndex], array[randomIndex]] = [
            array[randomIndex],
            array[currentIndex],
        ];
    }
    textareaElm.value = array.join("\n");
});

sortElm.addEventListener("click", () => {
    let array = textareaElm.value.split("\n").sort();
    textareaElm.value = array.join("\n");
});
numberSortElm.addEventListener("click", () => {
    let array = textareaElm.value.split("\n").sort(function (a, b) {
        return a - b;
    });

    let array2 = array.filter((value) => {
        return value != "";
    });

    textareaElm.value = array2.join("\n");
});

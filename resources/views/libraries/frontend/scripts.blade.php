
<script src="{{asset('public/assets/guests/alpinejs.min.js')}}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        let header = document.getElementById("header");
        let navcontent = document.getElementById("nav-content");
        let navaction = document.getElementById("navAction");
        let brandname = document.getElementById("brandname");
        let toToggle = document.querySelectorAll(".toggleColour");
        let fixedMainText = document.getElementById("fixedMainText");

        document.addEventListener("scroll", function () {
            let scrollpos = window.scrollY;

            if (scrollpos > 10) {
                if (fixedMainText) fixedMainText.classList.add("fixed-main-text");
                header.classList.add("bg-white", "shadow");
                navcontent.classList.replace("bg-gray-100", "bg-white");
                // navaction.classList.replace("bg-white", "gradient");
                // navaction.classList.replace("text-gray-800", "text-white");

                toToggle.forEach(el => {
                    el.classList.replace("text-white", "text-gray-800");
                });

            } else {
                if (fixedMainText) fixedMainText.classList.remove("fixed-main-text");
                header.classList.remove("bg-white", "shadow");
                navcontent.classList.replace("bg-white", "bg-gray-100");
                // navaction.classList.replace("gradient", "bg-white");
                // navaction.classList.replace("text-white", "text-gray-800");

                toToggle.forEach(el => {
                    el.classList.replace("text-gray-800", "text-white");
                });
            }
        });

        // Navigation menu toggle
        let navMenuDiv = document.getElementById("nav-content");
        let navMenu = document.getElementById("nav-toggle");

        document.addEventListener("click", function (event) {
            let target = event.target;

            if (!navMenuDiv.contains(target) && !navMenu.contains(target)) {
                navMenuDiv.classList.add("hidden");
            } else if (navMenu.contains(target)) {
                navMenuDiv.classList.toggle("hidden");
            }
        });
    });
</script>
<script>
    var navMenuDiv = document.getElementById("nav-content");
    var navMenu = document.getElementById("nav-toggle");

    document.onclick = check;
    function check(e) {
        var target = (e && e.target) || (event && event.srcElement);

        //Nav Menu
        if (!checkParent(target, navMenuDiv)) {
            if (checkParent(target, navMenu)) {
                if (navMenuDiv.classList.contains("hidden")) {
                    navMenuDiv.classList.remove("hidden");
                } else {
                    navMenuDiv.classList.add("hidden");
                }
            } else {
                navMenuDiv.classList.add("hidden");
            }
        }
    }
    function checkParent(t, elm) {
        while (t.parentNode) {
            if (t == elm) {
                return true;
            }
            t = t.parentNode;
        }
        return false;
    }
</script>

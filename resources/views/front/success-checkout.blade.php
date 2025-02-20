@extends('front.layouts.app')
@section('content')

    <body class="bg-belibang-black font-poppins text-white">
        <x-nav></x-nav>
        <section id="Success" class="container max-w-[1130px] mx-auto">
            <div class="w-full flex items-center justify-center min-h-[calc(100vh-74px)]">
                <div class="flex flex-col items-center gap-[60px]">
                    <div class="flex flex-col items-center">
                        <div class="flex shrink-0 w-[174px] h-[174px] relative -z-10">
                            <img src="assets/images/icons/check-3d.svg" alt="icon">
                            <div class="flex shrink-0 w-[644px] absolute -translate-x-1/2 left-1/2 bottom-[35px] z-0">
                                <img src="assets/images/backgrounds/glitter.svg" alt="background">
                            </div>
                        </div>
                        <div class="flex flex-col text-center gap-1">
                            <p
                                class="font-semibold text-[36px] bg-clip-text text-transparent bg-gradient-to-r from-[#B05CB0] to-[#FCB16B]">
                                Success Checkout</p>
                            <p class="text-xs text-belibang-grey">Thank you for supporting our great creators</p>
                        </div>
                    </div>
                    <a href="index.html"
                        class="w-[306px] h-12 flex items-center justify-center rounded-full text-center bg-[#2D68F8] p-[8px_18px] font-semibold hover:bg-[#083297] active:bg-[#062162] transition-all duration-300">Check
                        My Transactions</a>
                </div>
            </div>
        </section>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const menuButton = document.getElementById('menu-button');
                const dropdownMenu = document.querySelector('.dropdown-menu');

                menuButton.addEventListener('click', function() {
                    dropdownMenu.classList.toggle('hidden');
                });

                // Close the dropdown menu when clicking outside of it
                document.addEventListener('click', function(event) {
                    const isClickInside = menuButton.contains(event.target) || dropdownMenu.contains(event
                        .target);
                    if (!isClickInside) {
                        dropdownMenu.classList.add('hidden');
                    }
                });
            });
        </script>

    </body>
@endsection

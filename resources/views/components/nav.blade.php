<nav class="w-full fixed top-0 bg-[#00000010] backdrop-blur-lg z-10">
            <div class="container max-w-[1130px] mx-auto flex items-center justify-between h-[74px]">
                <div class="flex items-center gap-[26px]">
                    <a href="index.html" class="flex w-[154px] shrink-0 items-center">
                        <img src="assets/images/logos/logo.svg" alt="logo">
                    </a>
                    <ul class="flex gap-6 items-center">
                        <li class="text-belibang-grey hover:text-belibang-light-grey transition-all duration-300">
                            <a href="/">Home</a>
                        </li>
                     
                        <li class="text-belibang-grey hover:text-belibang-light-grey transition-all duration-300">
                            <a href="">Stories</a>
                        </li>
                        <li class="text-belibang-grey hover:text-belibang-light-grey transition-all duration-300">
                            <a href="">Benefits</a>
                        </li>
                        <li class="text-belibang-grey hover:text-belibang-light-grey transition-all duration-300">
                            <a href="">About</a>
                        </li>
                    </ul>
                </div>
                <div class="flex gap-6 items-center">
                    @auth
                        <a href="{{ route('dashboard') }}"
                            class="p-[8px_16px] w-fit h-fit rounded-[12px] text-belibang-grey border border-belibang-dark-grey hover:bg-[#2A2A2A] hover:text-white transition-all duration-300">
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}"
                            class="text-belibang-grey hover:text-belibang-light-grey transition-all duration-300">Log in</a>
                        <a href="{{ route('register') }}"
                            class="p-[8px_16px] w-fit h-fit rounded-[12px] text-belibang-grey border border-belibang-dark-grey hover:bg-[#2A2A2A] hover:text-white transition-all duration-300">
                            Sign up
                        </a>
                    @endauth

                </div>
            </div>
        </nav>
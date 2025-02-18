<nav class="w-full fixed top-0 bg-[#00000010] backdrop-blur-lg z-10">
            <div class="container max-w-[1130px] mx-auto flex items-center justify-between h-[74px]">
                <div class="flex items-center gap-[26px]">
                    <a href="index.html" class="flex w-[154px] shrink-0 items-center">
                        <img src="assets/images/logos/logo.svg" alt="logo">
                    </a>
                    <ul class="flex gap-6 items-center">
                        <li class="text-belibang-grey hover:text-belibang-light-grey transition-all duration-300">
                            <a href="index.html">Home</a>
                        </li>
                        <li class="text-belibang-grey hover:text-belibang-light-grey transition-all duration-300 relative">
                            <button id="menu-button" class="flex items-center gap-1 focus:text-belibang-light-grey">
                                <span>Categories</span>
                                <img src="assets/images/icons/arrow-down.svg" alt="icon">
                            </button>
                            <div
                                class="dropdown-menu hidden absolute top-[52px] grid grid-cols-2 p-4 gap-[10px] w-[526px] rounded-[20px] bg-[#1E1E1E] border border-[#414141] z-10">
                                <div
                                    class="col-span-2 flex justify-between items-center rounded-2xl p-[12px_16px] border border-[#414141] hover:bg-[#2A2A2A] transition-all duration-300">
                                    <div class="flex items-center">
                                        <a href="" class="w-[58px] h-[58px] flex shrink-0 items-center">
                                            <img src="assets/images/icons/cart.svg" alt="icon">
                                        </a>
                                        <a href="" class="flex flex-col">
                                            <p class="font-bold text-sm text-white">All Products</p>
                                            <p class="text-xs text-belibang-grey">Everything in One Place</p>
                                        </a>
                                    </div>
                                    <div class="w-6 h-6 flex shrink-0">
                                        <img src="assets/images/icons/crown.svg" alt="icon">
                                    </div>
                                </div>
                                @forelse ($categories as $category)
                                    <div
                                        class="flex justify-between items-center rounded-2xl p-[12px_16px] border border-[#414141] hover:bg-[#2A2A2A] transition-all duration-300">
                                        <div class="flex items-center">
                                            <a href="" class="w-[58px] h-[58px] flex shrink-0 items-center">
                                                <img src="{{ Storage::url($category->icon) }}" alt="icon">
                                            </a>
                                            <a href="" class="flex flex-col">
                                                <p class="font-bold text-sm text-white">{{ $category->name }}</p>
                                                <p class="text-xs text-belibang-grey">See more..</p>
                                            </a>
                                        </div>
                                    </div>
                                @empty
                                @endforelse


                            </div>
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
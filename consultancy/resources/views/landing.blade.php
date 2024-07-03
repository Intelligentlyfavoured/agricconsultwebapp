<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, viewport-fit=cover">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ isset($title) ? $title.' - '.config('app.name') : config('app.name') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div
    class="ezy__nav2 light py-6 bg-white dark:bg-[#0b1727] text-zinc-900 dark:text-white relative"
    >
    <nav>
        <div class="container px-4">
        <div class="flex justify-between items-center">
            <a class="font-black text-3xl" href="#"> AGRIK-CONSULT </a>
            <button
            class="block lg:hidden cursor-pointer h-10 z-20"
            type="button"
            id="hamburger"
            >
            <div
                class="h-0.5 w-7 bg-black dark:bg-white -translate-y-2"
            ></div>
            <div class="h-0.5 w-7 bg-black dark:bg-white"></div>
            <div class="h-0.5 w-7 bg-black dark:bg-white translate-y-2"></div>
            </button>
            <ul
            class="flex flex-col lg:flex-row justify-center items-center text-3xl gap-6 lg:text-base lg:gap-2 absolute h-screen w-screen top-0 left-full lg:left-0 lg:relative lg:h-auto lg:w-auto bg-white dark:bg-[#0b1727] lg:bg-transparent"
            id="navbar"
            >
            <li class="">
                <a class="px-4 opacity-100" href="#">Home</a>
            </li>
            <li class="">
                <a class="px-4 opacity-50 hover:opacity-100" href="#"
                >Services</a
                >
            </li>
            <li class="">
                <a class="px-4 opacity-50 hover:opacity-100" href="#"
                >Why us?</a
                >
            </li>
            <li class="">
                <a class="px-4 opacity-50 hover:opacity-100" href="#"
                >How It Works</a
                >
            </li>
            <li class="">
                <a class="px-4 opacity-50 hover:opacity-100" href="#"
                >Features</a
                >
            </li>
            <li class="">
                <a class="px-4 opacity-50 hover:opacity-100" href="#"
                >Testimonials</a
                >
            </li>
            <li>
                <a class="px-4 opacity-50 hover:opacity-100" href="/login">
                <button
                class="border border-blue-600 text-blue-600 hover:bg-blue-600 hover:text-white py-1.5 px-4 rounded"
                >
                Login
                </button></a>
            </li>
            <li>
                <a class="px-4" href="/register">
                <button
                class="border border-blue-600 bg-blue-600 text-white hover:bg-opacity-90 py-1.5 px-4 rounded"
                >
                Get Started
                </button></a>
            </li>
            </ul>
        </div>
        </div>
    </nav>
    </div>

    <section
        class="ezy__travel1 light py-20 md:p-[100px] bg-[#0b1727] text-white relative z-1 bg-cover bg-no-repeat bg-center flex justify-center items-end overflow-hidden"
        style="background-image: url(https://cdn.easyfrontend.com/pictures/hero/header35-img.png)">
        <div class="container px-4 mx-auto">
            <div class="grid grid-cols-12">
                <div class="col-span-12">
                    <div class="grid grid-cols-12 gap-4 relative">
                        <div
                            class="col-span-12 lg:col-span-10 lg:col-start-2 xl:col-span-8 xl:col-start-3 text-center mb-4">
                            <h2 class="font-bold text-[39px] lg:text-[80px] mb-4">Your Journey Begins</h2>
                            <div class="grid grid-cols-12">
                                <div class="col-span-12 lg:col-span-10 lg:col-start-2 xl:col-span-8 xl:col-start-3">
                                    <p class="text-[18px] leading-[32px] opacity-70 text-center">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla
                                        posuere ipsum molestie sem
                                        volutpat, non imperdiet leo porttitor. Nullam tortor nibh, dictum
                                        vitae porttitor eu,
                                        pharetra nec tellus.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div
                            class="absolute -bottom-[65px] lg:bottom-0 lg:top-1/2 left-1/2 lg:left-0 lg:right-0 transform -translate-x-1/2 lg:translate-x-0 lg:-translate-y-1/2 flex justify-between opacity-60">
                            <button
                                class="h-[60px] w-[60px] rounded-full border border-white hover:border-blue-500 text-white hover:text-blue-500 transition ease-in-out duration-500 flex justify-center items-center cursor-pointer mr-4 lg:mr-0">
                                <span class="fas fa-arrow-left text-xl"></span>
                            </button>
                            <button
                                class="h-[60px] w-[60px] rounded-full border border-white hover:border-blue-500 text-white hover:text-blue-500 transition ease-in-out duration-500 flex justify-center items-center cursor-pointer">
                                <span class="fas fa-arrow-right text-xl"></span>
                            </button>
                        </div>
                    </div>

                </div>
            </div>

            <!-- search bar -->
            <div class="grid grid-cols-12 gap-4 mt-20 md:mt-40 bg-white text-black px-4 rounded-md">
                <div class="col-span-12">
                    <div class="p-[24px]">
                        <form class="grid grid-cols-2 gap-4 md:grid-cols-7">
                            <!-- from -->
                            <div class="col-span-1 flex justify-center items-center">
                                <input type="text"
                                    class="h-[48px] w-full leading-[36px] border border-[#eaeaea] bg-transparent text-[#3b3b3b] rounded-md  placeholder:text-black py-[6px] px-[12px] focus:border-none focus:outline-blue-500"
                                    placeholder="From" />
                                <i class="text-black fas fa-sync ml-2"></i>
                            </div>
                            <!-- to -->
                            <div class="col-span-1">
                                <input type="text"
                                    class="h-[48px] w-full leading-[36px] border border-[#eaeaea] bg-transparent text-[#3b3b3b] rounded-md  placeholder:text-black py-[6px] px-[12px] focus:border-none focus:outline-blue-500"
                                    placeholder="To" />
                            </div>
                            <!-- depart -->
                            <div class="col-span-1">
                                <input type="date"
                                    class="h-[48px] w-full leading-[36px] border border-[#eaeaea] bg-transparent text-[#3b3b3b] rounded-md  placeholder:text-black py-[6px] px-[12px] focus:border-none focus:outline-blue-500"
                                    placeholder="depart" />
                            </div>
                            <!--  way -->
                            <div class="col-span-1">
                                <select type="inputWay"
                                    class="h-[48px] w-full leading-[36px] border border-[#eaeaea] bg-transparent text-[#3b3b3b] rounded-md  placeholder:text-black py-[6px] px-[12px] focus:border-none focus:outline-blue-500">
                                    <option selected>One Way</option>
                                    <option>Multiple Way</option>
                                </select>
                            </div>
                            <!-- passengers -->
                            <div class="col-span-1">
                                <select type="passengers"
                                    class="h-[48px] w-full leading-[36px] border border-[#eaeaea] bg-transparent text-[#3b3b3b] rounded-md  placeholder:text-black py-[6px] px-[12px] focus:border-none focus:outline-blue-500">
                                    <option selected>1 Passenger</option>
                                    <option>2 Passengers</option>
                                    <option>3 Passengers</option>
                                    <option>4 Passengers</option>
                                    <option>5 Passengers</option>
                                </select>
                            </div>

                            <!-- type -->
                            <div class="col-span-1">
                                <select type="type"
                                    class="h-[48px] w-full leading-[36px] border border-[#eaeaea] bg-transparent text-[#3b3b3b] rounded-md  placeholder:text-black py-[6px] px-[12px] focus:border-none focus:outline-blue-500">
                                    <option selected>Business</option>
                                    <option>Economy</option>
                                    <option>1st Class</option>
                                </select>
                            </div>
                            <!-- button -->
                            <div class="col-span-2 md:col-span-1">
                                <button
                                    class="text-white min-h-[48px] w-full text-[15px] py-[5px] px-[30px] bg-blue-600 hover:opacity-90 rounded-md">Search</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section
        class="ezy__featured33 light py-14 md:py-24 bg-white dark:bg-[#0b1727] text-zinc-900 dark:text-white relative overflow-hidden z-10"
        >
        <div class="container px-4 mx-auto">
            <div class="flex flex-col lg:flex-row gap-6 lg:gap-8">
            <div class="w-full lg:w-1/3">
                <div
                class="bg-blue-50 dark:bg-slate-700 dark:bg-opacity-40 rounded-b-[200px] text-center h-full -mt-24 px-4"
                >
                <img
                    src="https://cdn.easyfrontend.com/pictures/rose.png"
                    alt=""
                    class="rounded mx-auto"
                    width="250"
                />
                </div>
            </div>

            <div class="w-full lg:w-2/3">
                <div class="ezy__featured32-wrapper xl:ml-6 w-full">
                <div class="grid grid-cols-2 w-full">
                    <!-- item -->
                    <div class="col-span-2 lg:col-span-1">
                    <div class="relative p-4 md:p-10">
                        <div
                        class="h-16 w-16 bg-white dark:bg-slate-800 shadow-xl flex justify-center items-center text-blue-600 rounded-full text-3xl mb-6 mr-6"
                        >
                        <i class="fas fa-cannabis"></i>
                        </div>
                        <div>
                        <h4 class="text-2xl font-bold mb-4">Awesome Support</h4>
                        <p class="opacity-70">
                            Assumenda non repellendus distinctio nihil dicta
                            sapiente, quibusdam maiores, illum at, aliquid
                            blanditiis eligendi qui.
                        </p>
                        </div>
                    </div>
                    </div>
                    <!-- item -->
                    <div class="col-span-2 lg:col-span-1">
                    <div class="relative p-4 md:p-10">
                        <div
                        class="h-16 w-16 bg-white dark:bg-slate-800 shadow-xl flex justify-center items-center text-blue-600 rounded-full text-3xl mb-6 mr-6"
                        >
                        <i class="fas fa-random"></i>
                        </div>
                        <div>
                        <h4 class="text-2xl font-bold mb-4">
                            Get your documentation .
                        </h4>
                        <p class="opacity-70">
                            Under saying our appear Second their heaven created
                            shall darkness him great kind open creature Deep open
                            had i above.
                        </p>
                        </div>
                    </div>
                    </div>
                    <!-- item -->
                    <div class="col-span-2 lg:col-span-1">
                    <div class="relative p-4 md:p-10">
                        <div
                        class="h-16 w-16 bg-white dark:bg-slate-800 shadow-xl flex justify-center items-center text-blue-600 rounded-full text-3xl mb-6 mr-6"
                        >
                        <i class="fas fa-cannabis"></i>
                        </div>
                        <div>
                        <h4 class="text-2xl font-bold mb-4">
                            Thousands of Options
                        </h4>
                        <p class="opacity-70">
                            Male also herb fish gathered is. Without thing. Him
                            divided gathering there rule. Us. Creepeth. Over evening
                            gathered. Living be.
                        </p>
                        </div>
                    </div>
                    </div>
                    <!-- item -->
                    <div class="col-span-2 lg:col-span-1">
                    <div class="relative p-4 md:p-10">
                        <div
                        class="h-16 w-16 bg-white dark:bg-slate-800 shadow-xl flex justify-center items-center text-blue-600 rounded-full text-3xl mb-6 mr-6"
                        >
                        <i class="fas fa-random"></i>
                        </div>
                        <div>
                        <h4 class="text-2xl font-bold mb-4">
                            Pick the type of banking.
                        </h4>
                        <p class="opacity-70">
                            Bearing bearing form night spirit, for signs isn't, tree
                            fourth i there two land deep man without seasons fill
                            itself.
                        </p>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        </section>

        @if(session('success'))
                    <div class="fixed inset-x-0 top-0 flex items-end justify-right px-4 py-6 justify-end">
                        <div
                            class="max-w-sm w-full shadow-lg rounded px-4 py-3 rounded relative bg-amber-400 border-l-4 border-amber-700 text-white">
                            <div class="p-2">
                                <div class="flex items-start">
                                    <div class="ml-3 w-0 flex-1 pt-0.5">
                                        <p class="text-sm leading-5 font-medium">
                                        {{ session('success') }}
                                        </p>
                                    </div>
                                    <div class="ml-4 flex-shrink-0 flex">
                                        <button class="inline-flex text-white transition ease-in-out duration-150"
                                        onclick="return this.parentNode.parentNode.parentNode.parentNode.remove()"
                                        >
                                        <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
                                        </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif


</body>
</html>
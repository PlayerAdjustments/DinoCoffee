<span
    class="text-xs font-medium px-2 py-0.5 rounded inline-flex items-center me-2 bg-{{ $color }}-100 text-{{ $color }}-800 dark:bg-{{ $color }}-900 dark:text-{{ $color }}-300">
    @switch($type)
        @case('ING')
            <svg class="w-2.5 h-2.5 me-1.5" aria-hidden="true" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                <path
                    d="M495.9 166.6c3.2 8.7 .5 18.4-6.4 24.6l-43.3 39.4c1.1 8.3 1.7 16.8 1.7 25.4s-.6 17.1-1.7 25.4l43.3 39.4c6.9 6.2 9.6 15.9 6.4 24.6c-4.4 11.9-9.7 23.3-15.8 34.3l-4.7 8.1c-6.6 11-14 21.4-22.1 31.2c-5.9 7.2-15.7 9.6-24.5 6.8l-55.7-17.7c-13.4 10.3-28.2 18.9-44 25.4l-12.5 57.1c-2 9.1-9 16.3-18.2 17.8c-13.8 2.3-28 3.5-42.5 3.5s-28.7-1.2-42.5-3.5c-9.2-1.5-16.2-8.7-18.2-17.8l-12.5-57.1c-15.8-6.5-30.6-15.1-44-25.4L83.1 425.9c-8.8 2.8-18.6 .3-24.5-6.8c-8.1-9.8-15.5-20.2-22.1-31.2l-4.7-8.1c-6.1-11-11.4-22.4-15.8-34.3c-3.2-8.7-.5-18.4 6.4-24.6l43.3-39.4C64.6 273.1 64 264.6 64 256s.6-17.1 1.7-25.4L22.4 191.2c-6.9-6.2-9.6-15.9-6.4-24.6c4.4-11.9 9.7-23.3 15.8-34.3l4.7-8.1c6.6-11 14-21.4 22.1-31.2c5.9-7.2 15.7-9.6 24.5-6.8l55.7 17.7c13.4-10.3 28.2-18.9 44-25.4l12.5-57.1c2-9.1 9-16.3 18.2-17.8C227.3 1.2 241.5 0 256 0s28.7 1.2 42.5 3.5c9.2 1.5 16.2 8.7 18.2 17.8l12.5 57.1c15.8 6.5 30.6 15.1 44 25.4l55.7-17.7c8.8-2.8 18.6-.3 24.5 6.8c8.1 9.8 15.5 20.2 22.1 31.2l4.7 8.1c6.1 11 11.4 22.4 15.8 34.3zM256 336a80 80 0 1 0 0-160 80 80 0 1 0 0 160z" />
            </svg>
        @break

        @case('DIS')
            <svg class="w-2.5 h-2.5 me-1.5" aria-hidden="true" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 512 512">
                <path
                    d="M512 256c0 .9 0 1.8 0 2.7c-.4 36.5-33.6 61.3-70.1 61.3L344 320c-26.5 0-48 21.5-48 48c0 3.4 .4 6.7 1 9.9c2.1 10.2 6.5 20 10.8 29.9c6.1 13.8 12.1 27.5 12.1 42c0 31.8-21.6 60.7-53.4 62c-3.5 .1-7 .2-10.6 .2C114.6 512 0 397.4 0 256S114.6 0 256 0S512 114.6 512 256zM128 288a32 32 0 1 0 -64 0 32 32 0 1 0 64 0zm0-96a32 32 0 1 0 0-64 32 32 0 1 0 0 64zM288 96a32 32 0 1 0 -64 0 32 32 0 1 0 64 0zm96 96a32 32 0 1 0 0-64 32 32 0 1 0 0 64z" />
            </svg>
        @break

        @case('HUM')
            <svg class="w-2.5 h-2.5 me-1.5" aria-hidden="true" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 448 512">
                <path
                    d="M96 0C43 0 0 43 0 96L0 416c0 53 43 96 96 96l288 0 32 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l0-64c17.7 0 32-14.3 32-32l0-320c0-17.7-14.3-32-32-32L384 0 96 0zm0 384l256 0 0 64L96 448c-17.7 0-32-14.3-32-32s14.3-32 32-32zm32-240c0-8.8 7.2-16 16-16l192 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-192 0c-8.8 0-16-7.2-16-16zm16 48l192 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-192 0c-8.8 0-16-7.2-16-16s7.2-16 16-16z" />
            </svg>
        @break

        @case('ARQ')
            <svg class="w-2.5 h-2.5 me-1.5" aria-hidden="true" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 576 512">
                <path
                    d="M0 96C0 78.3 14.3 64 32 64l512 0c17.7 0 32 14.3 32 32l0 35.6c0 15.7-12.7 28.4-28.4 28.4c-37.3 0-67.6 30.2-67.6 67.6l0 124.9c-12.9 0-25.8 3.9-36.8 11.7c-18 12.4-40.1 20.3-59.2 20.3c0 0 0 0 0 0l0-.5 0-128c0-53-43-96-96-96s-96 43-96 96l0 128 0 .5c-19 0-41.2-7.9-59.1-20.3c-11.1-7.8-24-11.7-36.9-11.7l0-124.9C96 190.2 65.8 160 28.4 160C12.7 160 0 147.3 0 131.6L0 96zM306.5 389.9C329 405.4 356.5 416 384 416c26.9 0 55.4-10.8 77.4-26.1c0 0 0 0 0 0c11.9-8.5 28.1-7.8 39.2 1.7c14.4 11.9 32.5 21 50.6 25.2c17.2 4 27.9 21.2 23.9 38.4s-21.2 27.9-38.4 23.9c-24.5-5.7-44.9-16.5-58.2-25C449.5 469.7 417 480 384 480c-31.9 0-60.6-9.9-80.4-18.9c-5.8-2.7-11.1-5.3-15.6-7.7c-4.5 2.4-9.7 5.1-15.6 7.7c-19.8 9-48.5 18.9-80.4 18.9c-33 0-65.5-10.3-94.5-25.8c-13.4 8.4-33.7 19.3-58.2 25c-17.2 4-34.4-6.7-38.4-23.9s6.7-34.4 23.9-38.4c18.1-4.2 36.2-13.3 50.6-25.2c11.1-9.4 27.3-10.1 39.2-1.7c0 0 0 0 0 0C136.7 405.2 165.1 416 192 416c27.5 0 55-10.6 77.5-26.1c11.1-7.9 25.9-7.9 37 0z" />
            </svg>
        @break

        @case('CDE')
            <svg class="w-2.5 h-2.5 me-1.5" aria-hidden="true" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                <path
                    d="M186.1 52.1C169.3 39.1 148.7 32 127.5 32C74.7 32 32 74.7 32 127.5l0 6.2c0 15.8 3.7 31.3 10.7 45.5l23.5 47.1c4.5 8.9 7.6 18.4 9.4 28.2l36.7 205.8c2 11.2 11.6 19.4 22.9 19.8s21.4-7.4 24-18.4l28.9-121.3C192.2 323.7 207 312 224 312s31.8 11.7 35.8 28.3l28.9 121.3c2.6 11.1 12.7 18.8 24 18.4s20.9-8.6 22.9-19.8l36.7-205.8c1.8-9.8 4.9-19.3 9.4-28.2l23.5-47.1c7.1-14.1 10.7-29.7 10.7-45.5l0-2.1c0-55-44.6-99.6-99.6-99.6c-24.1 0-47.4 8.8-65.6 24.6l-3.2 2.8 19.5 15.2c7 5.4 8.2 15.5 2.8 22.5s-15.5 8.2-22.5 2.8l-24.4-19-37-28.8z" />
            </svg>
        @break

        @case('DER')
            <svg class="w-2.5 h-2.5 me-1.5" aria-hidden="true" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 640 512">
                <path
                    d="M384 32l128 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L398.4 96c-5.2 25.8-22.9 47.1-46.4 57.3L352 448l160 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-192 0-192 0c-17.7 0-32-14.3-32-32s14.3-32 32-32l160 0 0-294.7c-23.5-10.3-41.2-31.6-46.4-57.3L128 96c-17.7 0-32-14.3-32-32s14.3-32 32-32l128 0c14.6-19.4 37.8-32 64-32s49.4 12.6 64 32zm55.6 288l144.9 0L512 195.8 439.6 320zM512 416c-62.9 0-115.2-34-126-78.9c-2.6-11 1-22.3 6.7-32.1l95.2-163.2c5-8.6 14.2-13.8 24.1-13.8s19.1 5.3 24.1 13.8l95.2 163.2c5.7 9.8 9.3 21.1 6.7 32.1C627.2 382 574.9 416 512 416zM126.8 195.8L54.4 320l144.9 0L126.8 195.8zM.9 337.1c-2.6-11 1-22.3 6.7-32.1l95.2-163.2c5-8.6 14.2-13.8 24.1-13.8s19.1 5.3 24.1 13.8l95.2 163.2c5.7 9.8 9.3 21.1 6.7 32.1C242 382 189.7 416 126.8 416S11.7 382 .9 337.1z" />
            </svg>
        @break

        @case('NEG')
            <svg class="w-2.5 h-2.5 me-1.5" aria-hidden="true" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 640 512">
                <path
                    d="M96 96l0 224c0 35.3 28.7 64 64 64l416 0c35.3 0 64-28.7 64-64l0-224c0-35.3-28.7-64-64-64L160 32c-35.3 0-64 28.7-64 64zm64 160c35.3 0 64 28.7 64 64l-64 0 0-64zM224 96c0 35.3-28.7 64-64 64l0-64 64 0zM576 256l0 64-64 0c0-35.3 28.7-64 64-64zM512 96l64 0 0 64c-35.3 0-64-28.7-64-64zM288 208a80 80 0 1 1 160 0 80 80 0 1 1 -160 0zM48 120c0-13.3-10.7-24-24-24S0 106.7 0 120L0 360c0 66.3 53.7 120 120 120l400 0c13.3 0 24-10.7 24-24s-10.7-24-24-24l-400 0c-39.8 0-72-32.2-72-72l0-240z" />
            </svg>
        @break

        @case('SAL')
            <svg class="w-2.5 h-2.5 me-1.5" aria-hidden="true" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 640 512">
                <path
                    d="M232 0c-39.8 0-72 32.2-72 72l0 8L72 80C32.2 80 0 112.2 0 152L0 440c0 39.8 32.2 72 72 72l.2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0 .2 0s0 0 0 0l272 0 8 0s0 0 0 0l104 0c39.8 0 72-32.2 72-72l0-288c0-39.8-32.2-72-72-72l-88 0 0-8c0-39.8-32.2-72-72-72L232 0zM480 128l88 0c13.3 0 24 10.7 24 24l0 40-56 0c-13.3 0-24 10.7-24 24s10.7 24 24 24l56 0 0 48-56 0c-13.3 0-24 10.7-24 24s10.7 24 24 24l56 0 0 104c0 13.3-10.7 24-24 24l-88 0 0-128 0-208zM72 128l88 0 0 336c0 0 0 0-.1 0l-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0-.2 0c-13.2 0-24-10.7-24-24l0-104 56 0c13.3 0 24-10.7 24-24s-10.7-24-24-24l-56 0 0-48 56 0c13.3 0 24-10.7 24-24s-10.7-24-24-24l-56 0 0-40c0-13.3 10.7-24 24-24zM208 72c0-13.3 10.7-24 24-24l176 0c13.3 0 24 10.7 24 24l0 264 0 128-64 0 0-64c0-26.5-21.5-48-48-48s-48 21.5-48 48l0 64-64 0 0-392zm88 24l0 24-24 0c-8.8 0-16 7.2-16 16l0 16c0 8.8 7.2 16 16 16l24 0 0 24c0 8.8 7.2 16 16 16l16 0c8.8 0 16-7.2 16-16l0-24 24 0c8.8 0 16-7.2 16-16l0-16c0-8.8-7.2-16-16-16l-24 0 0-24c0-8.8-7.2-16-16-16l-16 0c-8.8 0-16 7.2-16 16z" />
            </svg>
        @break

        @default
        <svg xmlns="http://www.w3.org/2000/svg" class="w-2.5 h-2.5 me-1.5" aria-hidden="true" fill="currentColor" viewBox="0 0 512 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M160 96a96 96 0 1 1 192 0A96 96 0 1 1 160 96zm80 152l0 264-48.4-24.2c-20.9-10.4-43.5-17-66.8-19.3l-96-9.6C12.5 457.2 0 443.5 0 427L0 224c0-17.7 14.3-32 32-32l30.3 0c63.6 0 125.6 19.6 177.7 56zm32 264l0-264c52.1-36.4 114.1-56 177.7-56l30.3 0c17.7 0 32 14.3 32 32l0 203c0 16.4-12.5 30.2-28.8 31.8l-96 9.6c-23.2 2.3-45.9 8.9-66.8 19.3L272 512z"/></svg>
        @break
    @endswitch

    {{ $type }}
</span>

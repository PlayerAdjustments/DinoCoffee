{{-- Navbar --}}
<nav
    class="bg-white border-b border-gray-200 px-4 py-2.5 dark:bg-gray-800 dark:border-gray-700 fixed left-0 right-0 top-0 z-50">
    <div class="flex flex-wrap justify-between items-center">
        <div class="flex justify-start items-center">
            <button data-drawer-target="drawer-navigation" data-drawer-toggle="drawer-navigation"
                aria-controls="drawer-navigation"
                class="p-2 mr-2 text-gray-600 rounded-lg cursor-pointer md:hidden hover:text-gray-900 hover:bg-gray-100 focus:bg-gray-100 dark:focus:bg-gray-700 focus:ring-2 focus:ring-gray-100 dark:focus:ring-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                        clip-rule="evenodd"></path>
                </svg>
                <svg aria-hidden="true" class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Toggle sidebar</span>
            </button>
            <a href="{{ route('developer.index') }}" class="flex items-center justify-between mr-4">
                <svg xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 370 97.83"
                    class="hidden w-40 h-auto md:block">
                    <path
                        d="M49.99 0C29 0 11.95 17.06 11.95 38.04c0 6.87 1.86 13.62 5.4 19.51 1.48-.38 2.97-.71 4.48-1-3.5-5.31-5.53-11.67-5.53-18.53 0-18.63 15.06-33.7 33.7-33.7s33.7 15.06 33.7 33.7c0 6.58-1.92 13.02-5.53 18.53 1.51.29 3 .62 4.49 1 3.54-5.89 5.4-12.64 5.4-19.51C88.06 17.06 71 0 50.02 0M36.41 39.13c-2.7 0-4.89 2.18-4.89 4.88 0 2.7 2.18 4.89 4.88 4.89 2.7 0 4.89-2.18 4.89-4.88 0-2.7-2.18-4.89-4.88-4.89m27.17 0c-2.7 0-4.89 2.18-4.89 4.88 0 2.7 2.18 4.89 4.88 4.89 2.7 0 4.89-2.18 4.89-4.88a4.9 4.9 0 0 0-4.89-4.9M32.25 59.78c-8.94.03-17.86 2.3-26.7 6.73l-1.2.6V75c1.38-.58 2.85-.93 4.35-1.04v-4.09c7.91-3.77 15.75-5.71 23.57-5.74l-.02-4.34Zm.01 0v4.35c5.17-.02 10.34.88 15.55 2.49v31.21h4.35V66.62c5.2-1.61 10.38-2.51 15.55-2.49v-4.35c-5.92-.02-11.85.96-17.73 2.87-5.89-1.92-11.81-2.89-17.73-2.87h.01Zm35.47 0v4.35c7.82.03 15.66 1.96 23.57 5.74v4.09c1.5.12 2.96.47 4.35 1.06v-7.9l-1.2-.6c-8.84-4.43-17.76-6.7-26.71-6.73h-.01v-.01ZM9.79 78.26C4.41 78.26 0 82.67 0 88.05s4.41 9.79 9.79 9.79 9.79-4.41 9.79-9.79c-.01-5.38-4.41-9.79-9.79-9.79m80.42 0c-5.38 0-9.79 4.41-9.79 9.79s4.41 9.79 9.79 9.79 9.79-4.41 9.79-9.79-4.41-9.79-9.79-9.79M9.79 82.61a5.403 5.403 0 0 1 5.44 5.36v.07c.02 2.98-2.38 5.42-5.36 5.43H9.8a5.403 5.403 0 0 1-5.44-5.36v-.07a5.403 5.403 0 0 1 5.36-5.44h.07m80.42.01a5.403 5.403 0 0 1 5.44 5.36v.07c0 3.03-2.4 5.43-5.44 5.43s-5.43-2.4-5.43-5.43a5.403 5.403 0 0 1 5.36-5.44h.07"
                        class="fill-secondary-800 stroke-0" />
                    <path
                        d="M126.84 49.85c-2.18-1.12-3.86-2.71-5.06-4.77-1.19-2.06-1.79-4.46-1.79-7.2V18.72h6.98v19.16c0 1.88.41 3.39 1.21 4.53.81 1.13 1.78 1.94 2.91 2.41 1.13.47 2.26.71 3.38.71 1.09 0 2.2-.24 3.33-.71s2.1-1.27 2.89-2.41c.79-1.13 1.19-2.64 1.19-4.53V18.72h6.98v19.16c0 2.74-.59 5.14-1.77 7.2s-2.86 3.65-5.03 4.77-4.71 1.68-7.59 1.68c-2.91 0-5.46-.56-7.64-1.68Zm49.3-20.93c1.52 1.8 2.27 4.36 2.27 7.68v14.35h-6.76V36.6c0-3.27-1.56-4.9-4.68-4.9-1.21 0-2.3.48-3.27 1.43s-1.43 2.61-1.37 4.97v12.85h-6.58V26.67h6.58v2.16c.79-.79 1.8-1.43 3-1.9 1.21-.47 2.37-.71 3.49-.71 3.36 0 5.79.9 7.31 2.69Zm14.9-5.85c-.71.69-1.56 1.04-2.56 1.04s-1.91-.35-2.63-1.04c-.72-.69-1.08-1.54-1.08-2.54 0-.97.36-1.8 1.08-2.49.72-.69 1.6-1.04 2.63-1.04 1 0 1.85.35 2.56 1.04.71.69 1.06 1.52 1.06 2.49 0 1-.35 1.85-1.06 2.54Zm-5.87 3.64h6.62v24.24h-6.62V26.71Zm47.38 24.24h-7.02V35.54l-9.89 11.48-9.89-11.48v15.41h-7.02V17.66l16.91 19.07 16.91-19.08v33.29Zm12.43-1.12a12.802 12.802 0 0 1-4.79-4.62c-1.18-1.94-1.77-4.06-1.77-6.36 0-2.27.59-4.37 1.77-6.31 1.18-1.94 2.77-3.48 4.79-4.61 2.02-1.13 4.22-1.7 6.6-1.7 2.39 0 4.59.57 6.62 1.7 2.03 1.13 3.64 2.67 4.83 4.61a11.87 11.87 0 0 1 1.79 6.31c0 2.3-.6 4.42-1.79 6.36-1.19 1.94-2.8 3.48-4.83 4.61s-4.24 1.7-6.62 1.7-4.58-.57-6.6-1.7Zm3.24-16.91c-1.03.6-1.84 1.43-2.43 2.47-.59 1.04-.88 2.2-.88 3.47 0 1.32.29 2.51.86 3.56s1.37 1.87 2.38 2.47c1.02.6 2.16.9 3.42.9 1.24 0 2.36-.3 3.38-.9 1.02-.6 1.82-1.43 2.41-2.49.59-1.06.88-2.24.88-3.53 0-1.27-.29-2.42-.88-3.47a6.498 6.498 0 0 0-2.41-2.47c-1.02-.6-2.14-.9-3.38-.91-1.21 0-2.33.3-3.36.91Zm40.4 15.61c-.56.77-1.52 1.45-2.89 2.05-1.37.6-2.86.91-4.48.9-2.5 0-4.67-.56-6.51-1.68s-3.24-2.64-4.22-4.57c-.97-1.93-1.46-4.07-1.46-6.42s.49-4.5 1.46-6.42c.97-1.93 2.38-3.45 4.22-4.57s4.01-1.68 6.51-1.68c1.68 0 3.16.29 4.44.86 1.28.57 2.26 1.3 2.94 2.19V17.58h6.54v33.38h-6.54v-2.43Zm-1.54-14.68c-1.21-1.28-2.83-1.92-4.86-1.92s-3.69.64-4.88 1.92c-1.19 1.28-1.79 2.94-1.79 4.97 0 1.97.61 3.61 1.83 4.9s2.83 1.94 4.83 1.94 3.69-.61 4.88-1.83c1.19-1.22 1.79-2.89 1.79-5.01 0-2.03-.6-3.69-1.81-4.97Zm20.82 16.53c-2.02-.79-3.75-2.14-5.19-4.04-1.44-1.9-2.16-4.38-2.16-7.44s.73-5.53 2.18-7.42c1.46-1.88 3.2-3.22 5.23-4.02 2.03-.8 3.96-1.19 5.78-1.19 2.12 0 4.14.47 6.05 1.41 1.91.94 3.48 2.33 4.7 4.15 1.22 1.82 1.86 3.99 1.92 6.49 0 .77-.01 1.43-.04 1.99s-.06.91-.09 1.06h-19.16c.35 1.71 1.24 2.87 2.65 3.49s2.74.93 3.97.93c1.59 0 2.86-.29 3.8-.86s1.75-1.23 2.43-1.97l5.12 2.96c-2.77 3.77-6.55 5.65-11.35 5.65-1.88 0-3.83-.4-5.85-1.19Zm1.34-16.98c-1.15.9-1.8 1.99-1.94 3.29h12.14c-.09-.77-.38-1.5-.88-2.21s-1.17-1.29-2.01-1.74c-.84-.46-1.79-.68-2.85-.68-1.83 0-3.31.45-4.46 1.35Zm22.57-15.83h6.62v33.38h-6.62V17.57Zm18.34 32.26a12.852 12.852 0 0 1-4.79-4.61c-1.18-1.94-1.77-4.06-1.77-6.36 0-2.27.59-4.37 1.77-6.31 1.18-1.94 2.77-3.48 4.79-4.61s4.22-1.7 6.6-1.7c2.39 0 4.59.57 6.62 1.7 2.03 1.13 3.64 2.67 4.83 4.61a11.87 11.87 0 0 1 1.79 6.31c0 2.3-.6 4.42-1.79 6.36-1.19 1.94-2.8 3.48-4.83 4.61-2.03 1.13-4.24 1.7-6.62 1.7s-4.58-.57-6.6-1.7Zm3.25-16.91c-1.03.6-1.84 1.43-2.43 2.47-.59 1.04-.88 2.2-.88 3.47 0 1.32.29 2.51.86 3.56a6.308 6.308 0 0 0 2.39 2.47c1.02.6 2.16.9 3.42.9 1.24 0 2.36-.3 3.38-.9 1.02-.6 1.82-1.43 2.41-2.49s.88-2.24.88-3.53c0-1.27-.29-2.42-.88-3.47s-1.39-1.87-2.41-2.47c-1.02-.6-2.14-.9-3.38-.91-1.21 0-2.33.3-3.36.91Z"
                        class="fill-primary-950 stroke-0 dark:fill-primary-50" />
                    <path
                        d="M122.21 78.65c.53.21 1.01.32 1.45.32s.83-.09 1.1-.27.41-.39.41-.64c0-.2-.08-.36-.24-.49-.16-.13-.36-.22-.61-.28s-.57-.13-.97-.21c-.53-.09-1.02-.2-1.47-.35-.45-.14-.85-.39-1.21-.74s-.55-.82-.55-1.41c0-.88.32-1.51.96-1.89s1.4-.57 2.27-.57c.67 0 1.25.09 1.74.27.49.18.99.45 1.48.82l-.98 1.34a4.83 4.83 0 0 0-1.14-.61c-.39-.15-.78-.22-1.17-.22-.34 0-.66.06-.96.18-.3.12-.45.33-.45.62 0 .18.08.32.23.43.15.11.32.19.5.23.18.05.48.12.89.21l.4.08c.62.12 1.13.25 1.53.39.4.14.76.39 1.05.73s.45.82.44 1.43c0 .82-.29 1.45-.87 1.88-.58.43-1.37.65-2.37.64-1.46 0-2.68-.42-3.68-1.27l.94-1.35c.32.27.74.51 1.27.72Zm12.47 1.75v-8.14h1.76v8.14h-1.76Zm11.83-1.75c.53.21 1.01.32 1.45.32s.83-.09 1.1-.27.41-.39.41-.64c0-.2-.08-.36-.24-.49s-.36-.22-.61-.28c-.24-.06-.57-.13-.97-.21-.53-.09-1.02-.2-1.47-.35-.45-.14-.85-.39-1.21-.74s-.54-.82-.55-1.41c0-.88.32-1.51.96-1.89s1.4-.57 2.27-.57c.67 0 1.25.09 1.74.27.49.18.99.45 1.48.82l-.98 1.34a4.83 4.83 0 0 0-1.14-.61c-.39-.15-.78-.22-1.17-.22-.34 0-.66.06-.96.18s-.45.33-.45.62c0 .18.08.32.23.43s.32.19.5.23c.18.05.48.12.88.21l.4.08c.62.12 1.13.25 1.53.39.4.14.76.39 1.05.73s.45.82.45 1.43c0 .82-.29 1.45-.88 1.88-.58.43-1.37.65-2.37.64-1.46 0-2.68-.42-3.68-1.27l.94-1.35c.32.27.74.51 1.27.72Zm15.33-4.87v6.62h-1.77v-6.62h-2.37v-1.53h6.5v1.53h-2.36Zm11.43 1.82h3.9v1.54h-3.9v1.74h4.41v1.53h-6.17v-8.14h6.17v1.53h-4.41v1.81Zm20.55 4.8h-1.77v-3.89l-2.49 2.89-2.49-2.89v3.89h-1.77V72l4.26 4.81 4.26-4.81v8.4Zm11.67-8.4 4.47 8.4h-1.93l-.65-1.25h-3.8l-.62 1.25h-1.94l4.47-8.4Zm1.05 5.65-1.05-2.13-1.04 2.13h2.08Zm21.95 2.34c-.67-.38-1.2-.89-1.59-1.54a4.06 4.06 0 0 1-.59-2.12c0-.76.2-1.46.59-2.11.39-.65.92-1.16 1.59-1.54s1.4-.57 2.19-.57 1.53.19 2.21.57c.68.38 1.21.89 1.6 1.54.39.65.59 1.35.59 2.11s-.2 1.47-.59 2.12c-.39.65-.93 1.16-1.6 1.54-.68.38-1.41.57-2.21.57-.79 0-1.53-.19-2.19-.57Zm.88-5.92c-.4.24-.72.56-.96.96-.24.4-.36.83-.36 1.29 0 .46.12.89.36 1.3.24.4.56.73.96.97a2.518 2.518 0 0 0 2.63 0c.41-.25.73-.57.96-.97.23-.4.35-.84.35-1.3s-.12-.89-.35-1.29a2.6 2.6 0 0 0-.96-.96c-.4-.24-.84-.36-1.32-.36-.48 0-.91.12-1.31.36Zm17.11 3.24v3.08h-1.76v-3.08l-3.21-5.05h2.06l2.03 3.29 2.05-3.29h2.06l-3.23 5.05Zm12.09-1.71h3.9v1.54h-3.9v1.74h4.41v1.53h-6.17v-8.14h6.17v1.53h-4.41v1.81Zm14.04 4.8h-1.75V72l5.61 4.97v-4.7h1.76v8.39l-5.62-4.89v4.63Zm17.12-6.62v6.62h-1.77v-6.62h-2.37v-1.53h6.5v1.53h-2.36Zm11.43 1.82h3.9v1.54h-3.9v1.74h4.41v1.53h-6.17v-8.14h6.17v1.53h-4.41v1.81Zm14.13 3.06c.53.21 1.01.32 1.45.32s.83-.09 1.1-.27c.27-.18.41-.39.41-.64 0-.2-.08-.36-.24-.49-.16-.13-.36-.22-.61-.28s-.57-.13-.97-.21c-.53-.09-1.02-.2-1.47-.35s-.85-.39-1.21-.74-.54-.82-.55-1.41c0-.88.32-1.51.96-1.89.64-.38 1.4-.57 2.27-.57.67 0 1.25.09 1.74.27.49.18.99.45 1.48.82l-.98 1.34a4.83 4.83 0 0 0-1.14-.61c-.39-.15-.78-.22-1.17-.22-.34 0-.66.06-.96.18-.3.12-.45.33-.45.62 0 .18.08.32.23.43s.32.19.5.23.48.12.89.21l.4.08c.62.12 1.13.25 1.53.39.4.14.76.39 1.05.73.3.34.45.82.45 1.43 0 .82-.29 1.45-.87 1.88-.58.43-1.37.65-2.37.64-1.46 0-2.68-.42-3.67-1.27l.93-1.35c.32.27.74.51 1.27.72Z"
                        class="fill-secondary-800 stroke-0" />
                </svg>
            </a>
            <form action="#" method="GET" class="hidden md:block md:pl-2">
                <label for="topbar-search" class="sr-only">Search</label>
                <div class="relative md:w-64 md:w-96">
                    <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                        <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z">
                            </path>
                        </svg>
                    </div>
                    <input type="text" name="email" id="topbar-search"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="Search" />
                </div>
            </form>
        </div>
        <div class="flex items-center lg:order-2">
            <button type="button" data-drawer-toggle="drawer-navigation" aria-controls="drawer-navigation"
                class="p-2 mr-1 text-gray-500 rounded-lg md:hidden hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-700 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600">
                <span class="sr-only">Toggle search</span>
                <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path clip-rule="evenodd" fill-rule="evenodd"
                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z">
                    </path>
                </svg>
            </button>

            <button id="theme-toggle" type="button"
                class="text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-2.5">
                <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                </svg>
                <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                        fill-rule="evenodd" clip-rule="evenodd"></path>
                </svg>
            </button>
            <!-- Notifications -->
            <button type="button" data-dropdown-toggle="notification-dropdown"
                class="p-2 mr-1 text-gray-500 rounded-lg hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-700 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600">
                <span class="sr-only">View notifications</span>
                <!-- Bell icon -->
                <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z">
                    </path>
                </svg>
                @if (count($notifications) > 0)
                    <span class="absolute top-[1.2rem] w-[0.6rem] h-[0.6rem] me-2 bg-primary-400 rounded-full"></span>
                @endif
            </button>
            <!-- Dropdown menu -->
            <div class="hidden overflow-hidden z-50 my-4 max-w-sm text-base list-none bg-white rounded divide-y divide-gray-100 shadow-lg dark:divide-gray-600 dark:bg-gray-700 rounded-xl"
                id="notification-dropdown">
                <div
                    class="block py-2 px-4 text-base font-medium text-center text-gray-700 bg-gray-50 dark:bg-gray-600 dark:text-gray-300">
                    ({{$notifications->count()}}/{{$total_notifications}}) Notifications
                </div>
                <div>
                    @foreach ($notifications as $n)
                        <a href="{{route('notification.delete',$n)}}"
                            class="flex py-3 px-4 border-b hover:bg-gray-100 dark:hover:bg-gray-600 dark:border-gray-600">
                            <div class="flex-shrink-0">
                                <img class="w-11 h-11 rounded-full"
                                    src="{{ asset('storage/Notification_Icons/' . $n->icon) }}"
                                    alt="{{ $n->icon }}" />
                                <div
                                    class="flex absolute justify-center items-center ml-6 -mt-5 w-5 h-5 rounded-full border border-white bg-primary-700 dark:border-gray-700">
                                    <svg aria-hidden="true" class="w-3 h-3 text-white" fill="currentColor"
                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M8.707 7.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l2-2a1 1 0 00-1.414-1.414L11 7.586V3a1 1 0 10-2 0v4.586l-.293-.293z">
                                        </path>
                                        <path
                                            d="M3 5a2 2 0 012-2h1a1 1 0 010 2H5v7h2l1 2h4l1-2h2V5h-1a1 1 0 110-2h1a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V5z">
                                        </path>
                                    </svg>
                                </div>
                            </div>
                            <div class="pl-3 w-full">
                                <div class="text-gray-500 font-normal text-sm mb-1.5 dark:text-gray-400">
                                    <span
                                        class="font-semibold text-gray-900 dark:text-white">{{ $n->subject }}</span>:
                                    {{ $n->body }}
                                </div>
                                <div class="text-xs font-medium text-primary-600 dark:text-primary-500">
                                    {{ $n->created_at->diffForHumans() }}
                                </div>
                            </div>
                        </a>
                    @endforeach
                    
                    @if(count($notifications) == 0)
                    <a href="#"
                            class="flex py-3 px-4 border-b hover:bg-gray-100 dark:hover:bg-gray-600 dark:border-gray-600">
                            <div class="pl-3 w-full">
                                <div class="text-gray-500 font-normal text-sm mb-1.5 dark:text-gray-400">
                                    <span
                                        class="font-semibold text-gray-900 dark:text-white">No records</span>
                                </div>
                            </div>
                        </a>
                    @endif
                </div>
                <a href="#"
                    class="block py-2 text-md font-medium text-center text-gray-900 bg-gray-50 hover:bg-gray-100 dark:bg-gray-600 dark:text-white dark:hover:underline">
                    <div class="inline-flex items-center">
                        <svg aria-hidden="true" class="mr-2 w-4 h-4 text-gray-500 dark:text-gray-400"
                            fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                            <path fill-rule="evenodd"
                                d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                clip-rule="evenodd"></path>
                        </svg>
                        @if (count($notifications) == 0)
                            0 records
                        @else
                            Click notification to delete
                        @endif
                    </div>
                </a>
            </div>
            <!-- Apps -->
            <button type="button" data-dropdown-toggle="apps-dropdown"
                class="p-2 text-gray-500 rounded-lg hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-700 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600">
                <span class="sr-only">View notifications</span>
                <!-- Icon -->
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z">
                    </path>
                </svg>
            </button>
            <!-- Dropdown menu -->
            <div class="hidden overflow-hidden z-50 my-4 max-w-sm text-base list-none bg-white rounded divide-y divide-gray-100 shadow-lg dark:bg-gray-700 dark:divide-gray-600 rounded-xl"
                id="apps-dropdown">
                <div
                    class="block py-2 px-4 text-base font-medium text-center text-gray-700 bg-gray-50 dark:bg-gray-600 dark:text-gray-300">
                    Apps
                </div>
                <div class="grid grid-cols-3 gap-4 p-4">
                    <a href="#"
                        class="block p-4 text-center rounded-lg hover:bg-gray-100 dark:hover:bg-gray-600 group">
                        <svg aria-hidden="true"
                            class="mx-auto mb-1 w-7 h-7 text-gray-400 group-hover:text-gray-500 dark:text-gray-400 dark:group-hover:text-gray-400"
                            fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <div class="text-sm text-gray-900 dark:text-white">Sales</div>
                    </a>
                    <a href="#"
                        class="block p-4 text-center rounded-lg hover:bg-gray-100 dark:hover:bg-gray-600 group">
                        <svg aria-hidden="true"
                            class="mx-auto mb-1 w-7 h-7 text-gray-400 group-hover:text-gray-500 dark:text-gray-400 dark:group-hover:text-gray-400"
                            fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z">
                            </path>
                        </svg>
                        <div class="text-sm text-gray-900 dark:text-white">Users</div>
                    </a>
                    <a href="#"
                        class="block p-4 text-center rounded-lg hover:bg-gray-100 dark:hover:bg-gray-600 group">
                        <svg aria-hidden="true"
                            class="mx-auto mb-1 w-7 h-7 text-gray-400 group-hover:text-gray-500 dark:text-gray-400 dark:group-hover:text-gray-400"
                            fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M5 3a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2V5a2 2 0 00-2-2H5zm0 2h10v7h-2l-1 2H8l-1-2H5V5z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <div class="text-sm text-gray-900 dark:text-white">Inbox</div>
                    </a>
                    <a href="#"
                        class="block p-4 text-center rounded-lg hover:bg-gray-100 dark:hover:bg-gray-600 group">
                        <svg aria-hidden="true"
                            class="mx-auto mb-1 w-7 h-7 text-gray-400 group-hover:text-gray-500 dark:text-gray-400 dark:group-hover:text-gray-400"
                            fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <div class="text-sm text-gray-900 dark:text-white">
                            Profile
                        </div>
                    </a>
                    <a href="#"
                        class="block p-4 text-center rounded-lg hover:bg-gray-100 dark:hover:bg-gray-600 group">
                        <svg aria-hidden="true"
                            class="mx-auto mb-1 w-7 h-7 text-gray-400 group-hover:text-gray-500 dark:text-gray-400 dark:group-hover:text-gray-400"
                            fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <div class="text-sm text-gray-900 dark:text-white">
                            Settings
                        </div>
                    </a>
                    <a href="#"
                        class="block p-4 text-center rounded-lg hover:bg-gray-100 dark:hover:bg-gray-600 group">
                        <svg aria-hidden="true"
                            class="mx-auto mb-1 w-7 h-7 text-gray-400 group-hover:text-gray-500 dark:text-gray-400 dark:group-hover:text-gray-400"
                            fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M4 3a2 2 0 100 4h12a2 2 0 100-4H4z"></path>
                            <path fill-rule="evenodd"
                                d="M3 8h14v7a2 2 0 01-2 2H5a2 2 0 01-2-2V8zm5 3a1 1 0 011-1h2a1 1 0 110 2H9a1 1 0 01-1-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <div class="text-sm text-gray-900 dark:text-white">
                            Products
                        </div>
                    </a>
                    <a href="#"
                        class="block p-4 text-center rounded-lg hover:bg-gray-100 dark:hover:bg-gray-600 group">
                        <svg aria-hidden="true"
                            class="mx-auto mb-1 w-7 h-7 text-gray-400 group-hover:text-gray-500 dark:text-gray-400 dark:group-hover:text-gray-400"
                            fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M8.433 7.418c.155-.103.346-.196.567-.267v1.698a2.305 2.305 0 01-.567-.267C8.07 8.34 8 8.114 8 8c0-.114.07-.34.433-.582zM11 12.849v-1.698c.22.071.412.164.567.267.364.243.433.468.433.582 0 .114-.07.34-.433.582a2.305 2.305 0 01-.567.267z">
                            </path>
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v.092a4.535 4.535 0 00-1.676.662C6.602 6.234 6 7.009 6 8c0 .99.602 1.765 1.324 2.246.48.32 1.054.545 1.676.662v1.941c-.391-.127-.68-.317-.843-.504a1 1 0 10-1.51 1.31c.562.649 1.413 1.076 2.353 1.253V15a1 1 0 102 0v-.092a4.535 4.535 0 001.676-.662C13.398 13.766 14 12.991 14 12c0-.99-.602-1.765-1.324-2.246A4.535 4.535 0 0011 9.092V7.151c.391.127.68.317.843.504a1 1 0 101.511-1.31c-.563-.649-1.413-1.076-2.354-1.253V5z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <div class="text-sm text-gray-900 dark:text-white">
                            Pricing
                        </div>
                    </a>
                    <a href="#"
                        class="block p-4 text-center rounded-lg hover:bg-gray-100 dark:hover:bg-gray-600 group">
                        <svg aria-hidden="true"
                            class="mx-auto mb-1 w-7 h-7 text-gray-400 group-hover:text-gray-500 dark:text-gray-400 dark:group-hover:text-gray-400"
                            fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M5 2a2 2 0 00-2 2v14l3.5-2 3.5 2 3.5-2 3.5 2V4a2 2 0 00-2-2H5zm2.5 3a1.5 1.5 0 100 3 1.5 1.5 0 000-3zm6.207.293a1 1 0 00-1.414 0l-6 6a1 1 0 101.414 1.414l6-6a1 1 0 000-1.414zM12.5 10a1.5 1.5 0 100 3 1.5 1.5 0 000-3z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <div class="text-sm text-gray-900 dark:text-white">
                            Billing
                        </div>
                    </a>
                    <a href="#"
                        class="block p-4 text-center rounded-lg hover:bg-gray-100 dark:hover:bg-gray-600 group">
                        <svg aria-hidden="true"
                            class="mx-auto mb-1 w-7 h-7 text-gray-400 group-hover:text-gray-500 dark:text-gray-400 dark:group-hover:text-gray-400"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1">
                            </path>
                        </svg>
                        <div class="text-sm text-gray-900 dark:text-white">
                            Logout
                        </div>
                    </a>
                </div>
            </div>
            <button type="button"
                class="flex mx-3 text-sm bg-gray-200  dark:bg-gray-800 rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                id="user-menu-button" aria-expanded="false" data-dropdown-toggle="dropdown">
                <span class="sr-only">Open user menu</span>
                <img class="w-8 h-8 rounded-full" src="{{ asset('storage/avatars/' . $user->avatar) }}"
                    alt="user photo" />
            </button>
            <!-- Dropdown menu -->
            <div class="hidden z-50 my-4 w-56 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600 rounded-xl"
                id="dropdown">
                <div class="py-3 px-4">
                    <span
                        class="block text-sm font-semibold text-gray-900 dark:text-white">{{ $user->fullName }}</span>
                    <span class="block text-sm text-gray-900 truncate dark:text-white">{{ $user->email }}</span>
                </div>
                <ul class="py-1 text-gray-700 dark:text-gray-300" aria-labelledby="dropdown">
                    <li>
                        <a href="{{ route('developer.users.show', $user->matricula) }}"
                            class="block py-2 px-4 text-sm hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-400 dark:hover:text-white">My
                            profile</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block py-2 px-4 text-sm hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-400 dark:hover:text-white">Account
                            settings</a>
                    </li>
                </ul>
                <ul class="py-1 text-gray-700 dark:text-gray-300" aria-labelledby="dropdown">
                    <li>
                        <a href="#"
                            class="flex items-center py-2 px-4 text-sm hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"><svg
                                class="mr-2 w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            My likes</a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center py-2 px-4 text-sm hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"><svg
                                class="mr-2 w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z">
                                </path>
                            </svg>
                            Collections</a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex justify-between items-center py-2 px-4 text-sm hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                            <span class="flex items-center">
                                <svg aria-hidden="true" class="mr-2 w-5 h-5 text-primary-600 dark:text-primary-500"
                                    fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M12.395 2.553a1 1 0 00-1.45-.385c-.345.23-.614.558-.822.88-.214.33-.403.713-.57 1.116-.334.804-.614 1.768-.84 2.734a31.365 31.365 0 00-.613 3.58 2.64 2.64 0 01-.945-1.067c-.328-.68-.398-1.534-.398-2.654A1 1 0 005.05 6.05 6.981 6.981 0 003 11a7 7 0 1011.95-4.95c-.592-.591-.98-.985-1.348-1.467-.363-.476-.724-1.063-1.207-2.03zM12.12 15.12A3 3 0 017 13s.879.5 2.5.5c0-1 .5-4 1.25-4.5.5 1 .786 1.293 1.371 1.879A2.99 2.99 0 0113 13a2.99 2.99 0 01-.879 2.121z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                Pro version
                            </span>
                            <svg aria-hidden="true" class="w-5 h-5 text-gray-400" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </a>
                    </li>
                </ul>
                <ul class="py-1 text-gray-700 dark:text-gray-300" aria-labelledby="dropdown">
                    <li>
                        <a href="{{ route('auth.logout') }}"
                            class="block py-2 px-4 rounded-b rounded-b-xl text-sm hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Sign
                            out</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>

<script>
    var themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
    var themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');

    // Change the icons inside the button based on previous settings
    if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia(
            '(prefers-color-scheme: dark)').matches)) {
        themeToggleLightIcon.classList.remove('hidden');
    } else {
        themeToggleDarkIcon.classList.remove('hidden');
    }

    var themeToggleBtn = document.getElementById('theme-toggle');

    themeToggleBtn.addEventListener('click', function() {

        // toggle icons inside button
        themeToggleDarkIcon.classList.toggle('hidden');
        themeToggleLightIcon.classList.toggle('hidden');

        // if set via local storage previously
        if (localStorage.getItem('color-theme')) {
            if (localStorage.getItem('color-theme') === 'light') {
                document.documentElement.classList.add('dark');
                localStorage.setItem('color-theme', 'dark');
            } else {
                document.documentElement.classList.remove('dark');
                localStorage.setItem('color-theme', 'light');
            }

            // if NOT set via local storage previously
        } else {
            if (document.documentElement.classList.contains('dark')) {
                document.documentElement.classList.remove('dark');
                localStorage.setItem('color-theme', 'light');
            } else {
                document.documentElement.classList.add('dark');
                localStorage.setItem('color-theme', 'dark');
            }
        }

    });
</script>

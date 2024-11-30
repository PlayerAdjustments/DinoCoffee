@extends('Layouts.Developer.Dashboard')

@section('content')
    <!-- Full Screen Overlay for Spinner -->
    <div id="overlay" class="hidden fixed inset-0 bg-gray-500 bg-opacity-50 flex justify-center items-center z-50">
        <output>
            <svg aria-hidden="true" class="inline w-24 h-25 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600"
                viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                    fill="currentColor" />
                <path
                    d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                    fill="currentFill" />
            </svg>
            <span class="sr-only">Loading...</span>
        </output>
    </div>

    <div class="flex flex-wrap items-center justify-center w-full h-full gap-2">
        <section class="w-full">
            <div class="py-8 px-2 mx-auto max-w-screen-xl text-center lg:py-16">
                <h1
                    class="mb-4 tracking-tight leading-none text-xl font-black text-gray-900 md:text-5xl lg:text-6xl dark:text-white">
                    Subir usuarios con CSV</h1>
                <p class="mb-8 text-lg font-normal text-gray-500 lg:text-xl  sm:px-16  dark:text-gray-400">Llena la
                    plantilla a continuación con los datos de los usuarios y súbelo como CSV</p>
                <div class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0 mt-4">
                    <button id="download-csv"
                        class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2" fill="currentColor"
                            viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                            <path
                                d="M288 32c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 242.7-73.4-73.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0l128-128c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L288 274.7 288 32zM64 352c-35.3 0-64 28.7-64 64l0 32c0 35.3 28.7 64 64 64l384 0c35.3 0 64-28.7 64-64l0-32c0-35.3-28.7-64-64-64l-101.5 0-45.3 45.3c-25 25-65.5 25-90.5 0L165.5 352 64 352zm368 56a24 24 0 1 1 0 48 24 24 0 1 1 0-48z" />
                        </svg>
                        Descargar plantilla
                    </button>
                </div>
            </div>
        </section>

        <form id="csvUploadForm" action="{{ route('developer.users.storeCSV') }}" method="POST"
            enctype="multipart/form-data"
            class="flex flex-col items-center justify-center w-full h-96 border-2 border-gray-400 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-gray-800 dark:bg-gray-700 hover:bg-gray-300 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
            @csrf
            <label for="dropzone-file">
                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                    <svg class="w-8 h-full mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                    </svg>
                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to
                            upload</span> or drag and drop</p>
                    <p class="text-xs text-gray-500 dark:text-gray-400">CSV</p>
                    <p class="text-xs text-gray-500 dark:text-gray-400">(Max size: 8mb)</p>
                </div>
                <input id="dropzone-file" name="file" type="file" class="hidden" />
            </label>

            <!-- Submit button -->
            <button type="submit" id="submitButton"
                class="hidden mt-4 py-2 px-4 bg-blue-600 text-white rounded-lg">Upload</button>
        </form>
    </div>



    <script>
        document.getElementById('download-csv').addEventListener('click', function() {
            // Trigger the download by creating an invisible link
            const link = document.createElement('a');
            link.href = "{{ route('developer.users.downloadCSV') }}";
            link.download = 'plantilla_usuarios.xlsx'; // Optional
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        });

        document.getElementById('dropzone-file').addEventListener('change', function() {
            document.getElementById('overlay').classList.remove('hidden');
            document.getElementById('csvUploadForm').submit();
        });

        document.getElementById('csvUploadForm').addEventListener('submit', function() {
            // Show the overlay spinner when the form is submitted
        });
    </script>
@endsection

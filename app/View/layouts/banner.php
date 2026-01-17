<div class="bg-rose-900 px-4 py-3 text-white sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8">
    <p class="text-center text-sm font-medium sm:text-left">
        <!-- <span class="md:hidden">We announced a new product!</span> -->
        <span class="hidden md:inline"><?= $error_message ?></span>
        <br class="sm:hidden" />
        <!-- <a href="#" class="mt-1 inline-block text-lime-400 underline sm:mt-0 sm:ml-1">Learn more &rarr;</a> -->
    </p>
    <button type="button" class="-mr-1 flex p-2 rounded-md hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-white sm:-mr-2">
        <span class="sr-only">Dismiss</span>
        <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
            <!-- <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /> -->
        </svg>
    </button>
</div>
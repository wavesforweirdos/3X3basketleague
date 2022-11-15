<div class="col-span-6 sm:col-span-3">
    <label for="{{ $id }}" class="block text-sm font-medium text-gray-700"> {{ $message }}
    </label>
    <select id="{{ $id }}" name="{{ $id }}" autocomplete
        class="block w-full py-1 px-2 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none sm:text-sm focus:border-primary focus-visible:shadow-none  focus:ring-primary ">
        {{ $slot }}
    </select>
</div>

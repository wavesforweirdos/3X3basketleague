<div class="col-span-6 sm:col-span-3">
    <label for="{{ $id }}" class="block text-sm font-medium text-gray-700"> {{ $message }}
    </label>
    <select id="{{ $id }}" name="{{ $id }}"
        class="w-full bg-[#FCFDFE] mt-1 py-1 px-2 text-md placeholder-[#ACB6BE] outline-none transition mt-1block shadow-sm sm:text-sm rounded-md  border border-[#E9EDF4] focus:border-primary focus-visible:shadow-none  focus:ring-primary ">
        {{ $slot }}
    </select>
</div>

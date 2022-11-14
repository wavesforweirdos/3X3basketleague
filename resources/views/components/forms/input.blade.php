<div {{ $attributes->merge(['class' => 'col-span-6 sm:col-span-3'])}}>
    <label for="{{ $id }}" class="block text-sm font-medium text-gray-700"> {{ $slot }}
    </label>
    <input type="{{ $type }}" name="{{ $id }}" placeholder="{{ $placeholder }}" id="{{ $id }}"
        autocomplete min="{{ $min ?? '' }}"
        class="w-full bg-[#FCFDFE] py-1 px-2 text-base text-body-color placeholder-[#ACB6BE] outline-none transition mt-1block shadow-sm sm:text-sm rounded-md  border border-[#E9EDF4] focus:border-primary focus-visible:shadow-none  focus:ring-primary ">
</div>

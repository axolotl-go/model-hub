@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-[#00D9FF] dark:focus:border-[#00D9FF] focus:ring-[#00D9FF] dark:focus:ring-[#00D9FF] rounded-md shadow-sm']) }}>
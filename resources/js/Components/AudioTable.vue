<script setup>
</script>

<template>


<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500">
        <caption class="p-5 text-lg font-semibold text-left rtl:text-right text-gray-900 bg-white">
            Audio Records
            <p class="mt-1 text-sm font-normal text-gray-500">Record voices and sounds of phone theft.</p>
        </caption>
        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3">
                    TimeStamp
                </th>
                <th scope="col" class="px-6 py-3">
                    File
                </th>
            </tr>
        </thead>
        <tbody>
            <tr class="bg-white border-b dark:border-gray-700 border-gray-200 w-full">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap w-1/2">
                    2023-10-01 12:00:00
                </th>
                <td class="px-6 py-4 w-1/2">
                    <audio controls class="w-full">
                        <source src="/audio/2023-10-01_12-00-00.mp3" type="audio/mpeg">
                        Your browser does not support the audio element.
                    </audio>
                </td>
            </tr>
        </tbody>
    </table>
</div>

</template>

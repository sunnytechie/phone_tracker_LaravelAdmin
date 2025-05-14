<script setup>
</script>

<template>


<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500">
        <caption class="p-5 text-lg font-semibold text-left rtl:text-right text-gray-900 bg-white">
            Screenshot Records
            <p class="mt-1 text-sm font-normal text-gray-500">Get camera-shot of phone activity</p>
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
            <tr class="bg-white border-b dark:border-gray-700 border-gray-200">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                    2023-10-01 12:00:00
                </th>
                <td class="px-6 py-4">
                    <img src="/screenshots/2023-10-01_12-00-00.png" alt="Screenshot" class="w-full h-auto" />
                </td>
            </tr>
        </tbody>
    </table>
</div>

</template>

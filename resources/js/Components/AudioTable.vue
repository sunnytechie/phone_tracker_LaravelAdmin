<script setup>
import { onMounted, nextTick } from 'vue'
import L from 'leaflet'
import 'leaflet/dist/leaflet.css'
import { Head, Link, usePage, router } from '@inertiajs/vue3';

const page = usePage();
defineProps({
    audios: Object,
});



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
                    Collection TimeStamp
                </th>
                <th scope="col" class="px-6 py-3">
                    File
                </th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="(audio, index) in page.props.audios" :key="index" class="bg-white border-b dark:border-gray-700 border-gray-200 w-full">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap w-1/2">
                    {{ audio.created_at }}
                </th>
                <td class="px-6 py-4 w-1/2">
                    <audio controls class="w-full">
                        <source :src="'/storage/' + audio.file_path" type="audio/mpeg">
                        Your browser does not support the audio element.
                    </audio>
                </td>
            </tr>
        </tbody>
    </table>
</div>

</template>

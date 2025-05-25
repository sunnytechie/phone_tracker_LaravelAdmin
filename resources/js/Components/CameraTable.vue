<script setup>
import { onMounted, nextTick } from 'vue'
import L from 'leaflet'
import 'leaflet/dist/leaflet.css'
import { Head, Link, usePage, router } from '@inertiajs/vue3';

const page = usePage();
const props = defineProps({
    snapshots: Object,
});
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
                    Collection TimeStamp
                </th>
                <th scope="col" class="px-6 py-3">
                    File
                </th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="(image, index) in page.props.snapshots" :key="index" class="bg-white border-b dark:border-gray-700 border-gray-200">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                    {{ image.created_at }}
                </th>
                <td class="px-6 py-4">
                    <img :src="'/storage/' + image.file_path" alt="Camera Shot Blocked" class="w-full h-auto" />
                </td>
            </tr>
        </tbody>
    </table>
</div>

</template>

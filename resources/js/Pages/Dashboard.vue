<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, usePage, router } from '@inertiajs/vue3';
import { reactive, onMounted, ref } from 'vue';
import LocationTable from '@/Components/LocationsTable.vue';
import AudioTable from '@/Components/AudioTable.vue';
import CameraTable from '@/Components/CameraTable.vue';

const tracker = ref('location');

const page = usePage();

defineProps({
    locations: Object,
    audios: Object,
    snapshots: Object,
});




</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl flex justify-between items-center font-semibold leading-tight text-gray-800">
                Mobile Phone Track Board

                <span class="font-thin text-sm">You're logged in!</span>
            </h2>
        </template>

        <div class="lg:px-8 mx-auto max-w-7xl flex justify-start mt-4">
            <button @click="tracker = 'location'" :class="tracker == 'location' ? 'bg-white text-gray-700' : 'bg-gray-50 text-gray-600'" class="inline-flex items-center gap-1 px-4 py-2 hover:bg-white shadow hover:text-gray-700 font-medium rounded">
                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                <path fill-rule="evenodd" d="M11.906 1.994a8.002 8.002 0 0 1 8.09 8.421 7.996 7.996 0 0 1-1.297 3.957.996.996 0 0 1-.133.204l-.108.129c-.178.243-.37.477-.573.699l-5.112 6.224a1 1 0 0 1-1.545 0L5.982 15.26l-.002-.002a18.146 18.146 0 0 1-.309-.38l-.133-.163a.999.999 0 0 1-.13-.202 7.995 7.995 0 0 1 6.498-12.518ZM15 9.997a3 3 0 1 1-5.999 0 3 3 0 0 1 5.999 0Z" clip-rule="evenodd"/>
                </svg>
                Location
            </button>
            <button @click="tracker = 'audio'" :class="tracker == 'audio' ? 'bg-white text-gray-700' : 'bg-gray-50 text-gray-600'" class="inline-flex items-center gap-1 px-4 py-2 hover:bg-white shadow hover:text-gray-700 font-medium rounded ml-2">
                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                <path fill-rule="evenodd" d="M9 7V2.221a2 2 0 0 0-.5.365L4.586 6.5a2 2 0 0 0-.365.5H9Zm2 0V2h7a2 2 0 0 1 2 2v16a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V9h5a2 2 0 0 0 2-2Zm2.318.052h-.002A1 1 0 0 0 12 8v5.293A4.033 4.033 0 0 0 10.5 13C8.787 13 7 14.146 7 16s1.787 3 3.5 3 3.5-1.146 3.5-3c0-.107-.006-.211-.017-.313A1.04 1.04 0 0 0 14 15.5V9.766c.538.493 1 1.204 1 2.234a1 1 0 1 0 2 0c0-1.881-.956-3.14-1.86-3.893a6.4 6.4 0 0 0-1.636-.985 4.009 4.009 0 0 0-.165-.063l-.014-.005-.005-.001-.002-.001ZM9 16c0-.356.452-1 1.5-1s1.5.644 1.5 1-.452 1-1.5 1S9 16.356 9 16Z" clip-rule="evenodd"/>
                </svg>
                Audio
            </button>
            <button @click="tracker = 'camera'" :class="tracker == 'camera' ? 'bg-white text-gray-700' : 'bg-gray-50 text-gray-600'" class="inline-flex items-center gap-1 px-4 py-2 hover:bg-white shadow hover:text-gray-700 font-medium rounded ml-2">
                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                <path fill-rule="evenodd" d="M7.5 4.586A2 2 0 0 1 8.914 4h6.172a2 2 0 0 1 1.414.586L17.914 6H19a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h1.086L7.5 4.586ZM10 12a2 2 0 1 1 4 0 2 2 0 0 1-4 0Zm2-4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Z" clip-rule="evenodd"/>
                </svg>
                Camera
            </button>
        </div>
        <div class=" mt-2 pb-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <LocationTable :locations="page.props.locations" v-if="tracker === 'location'" />
                    <AudioTable :audios="page.props.audios" v-else-if="tracker === 'audio'" />
                    <CameraTable :snapshots="page.props.snapshots" v-else-if="tracker === 'camera'" />
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

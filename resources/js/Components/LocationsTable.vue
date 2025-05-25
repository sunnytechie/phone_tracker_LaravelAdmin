<script setup>
import { onMounted, nextTick } from 'vue'
import L from 'leaflet'
import 'leaflet/dist/leaflet.css'
import { Head, Link, usePage, router } from '@inertiajs/vue3';

const page = usePage();
defineProps({
    locations: Object,
});

onMounted(async () => {
  // Wait for the DOM to finish rendering all map containers
  await nextTick()

  page.props.locations.forEach(location => {
    const map = L.map(`map-${location.id}`).setView([location.latitude, location.longitude], 13)

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '© OpenStreetMap contributors'
    }).addTo(map)

    L.marker([location.latitude, location.longitude])
      .addTo(map)
      .bindPopup(`${location?.name}`)
      .openPopup()

    L.circle([location.latitude, location.longitude], {
      radius: location.accuracy,
      color: 'blue',
      fillColor: '#add8e6',
      fillOpacity: 0.4
    }).addTo(map)
  })
})


</script>

<style scoped>
.map-container {
  margin-bottom: 2rem;
}
.map {
  height: 300px;
  width: 100%;
  border: 1px solid #ccc;
  border-radius: 8px;
}
</style>

<template>

<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500">
        <caption class="p-5 text-lg font-semibold text-left rtl:text-right text-gray-900 bg-white">
            Screenshot Records
            <p class="mt-1 text-sm font-normal text-gray-500"> Track your phone location - Analytics </p>
        </caption>
        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
                <th class="font-[600] text-[18px] px-6 py-3">
                    Map Location  Coordinates
                </th>
                <th class="font-[600] text-[18px] px-6 py-3">
                    Map Location
                </th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="(location, index) in page.props.locations" :key="index" class="bg-white border-b dark:border-gray-700 border-gray-200">
                <td class="flex flex-col px-6 py-4 font-medium w-1/2 text-gray-900 whitespace-nowrap">
                    <span><span class="font-[500] text-[24px]">Latitude: </span> {{ location.latitude }}</span>
                    <span><span class="font-[500] text-[24px]">Longtitude: </span> {{ location.longitude }}</span>
                    <span><span class="font-[500] text-[24px]">Collection Time: </span> {{ location.created_at }}</span>
                </td>
                <td class="px-6 py-4  w-1/2">
                    <div
                        :key="location.id"
                        class="map-container"
                        >
                        <div :id="'map-' + location?.id" class="map"></div>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>

</template>

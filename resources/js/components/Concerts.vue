<template>
  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
    <!-- Loop through items to create a card for each concert -->
    <div v-for="(item, index) in items" :key="index"
      class="bg-white border shadow-md border-gray-200 rounded-lg dark:bg-gray-800 dark:border-gray-700">
      <div class="relative h-[350px] w-full overflow-hidden rounded-t-lg">
        <img class="rounded-t-lg w-full h-full object-cover" :src="assetUrl" alt="Concert Image" />
      </div>
      <div class="p-5">
        <a href="#">
          <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">
            {{ item.concertName }}
          </h5>
        </a>
        <p class="mb-3 text-md font-normal text-gray-700 dark:text-gray-400">
          {{ item.singer }}
        </p>
        <p class="mb-3 text-sm font-normal text-gray-700 dark:text-gray-400">
          {{ item.date }}, {{ item.location }}
        </p>
        <a :href="pageUrl"
          class="inline-flex justify-center w-full px-3 py-3 text-sm font-medium text-center text-white bg-primary-600 rounded-lg hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
          View Details
        </a>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  setup() {
    const items = window.cardItems || [];

    return {
      assetUrl: window.assetUrl,
      pageUrl: window.pageUrl,
      items
    };
  },
};
</script>

<style></style>
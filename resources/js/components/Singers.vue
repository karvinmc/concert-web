<template>
  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6"> <!-- Adjusted to 4 columns on larger screens -->
    <!-- Swiper Slides -->
    <div v-for="(item, index) in items" :key="index"
      class="bg-white border shadow-md border-gray-200 rounded-lg dark:bg-gray-800 dark:border-gray-700">
      <div class="relative h-[350px] w-full overflow-hidden rounded-t-lg"> <!-- Adjusted height -->
        <img class="rounded-t-lg w-full h-full object-cover" :src="assetUrl" alt="Concert Image" />
      </div>
      <div class="p-4">
        <a href="#">
          <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">
            {{ item.title }}
          </h5>
        </a>
        <a href="#"
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
    // Example data for slides
    const items = [
      { title: 'Taylor Swift' },
      { title: 'Taylor Swift' },
      { title: 'Taylor Swift' },
      { title: 'Taylor Swift' },
    ];

    return {
      assetUrl: window.assetUrl,
      items
    };
  },
};
</script>

<style></style>
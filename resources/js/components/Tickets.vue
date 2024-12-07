<template>
  <div class="grid grid-cols-1 lg:grid-cols-2 gap-6"> <!-- 2 Columns Layout -->
    <!-- Card Loop -->
    <a :href="pageUrl" v-for="(item, index) in items" :key="index"
      class="flex border-2 border-gray-200 hover:border-primary-700 rounded-lg dark:bg-gray-800 dark:border-gray-700">
      <!-- Left Side -->
      <div class="bg-primary-600 text-white flex flex-col items-center justify-center w-1/3 p-4 rounded-l-lg">
        <h5 class="text-xl font-bold">{{ item.date }}</h5>
        <h5 class="text-lg uppercase">{{ item.day }}</h5>
        <h5 class="text-lg">{{ item.time }}</h5>
      </div>
      <!-- Right Side -->
      <div class="flex flex-col justify-between p-4 w-2/3 bg-white rounded-r-lg dark:bg-gray-800 relative">
        <h5 class="mb-2 text-xl font-semibold tracking-tight text-gray-900 dark:text-white">
          {{ item.title }}
        </h5>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
          {{ item.description }}
        </p>
        <p class="text-gray-900 dark:text-white flex items-center">
          <!-- Location Icon -->
          <svg class="w-5 h-5 mr-2 text-gray-800 dark:text-gray-400" aria-hidden="true"
            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M12 13a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M17.8 13.938h-.011a7 7 0 1 0-11.464.144h-.016l.14.171c.1.127.2.251.3.371L12 21l5.13-6.248c.194-.209.374-.429.54-.659l.13-.155Z" />
          </svg>
          {{ item.location }}
        </p>
        <p class="text-gray-900 dark:text-white flex items-center">
          <!-- Tickets Icon -->
          <svg class="w-5 h-5 mr-2 text-gray-800 dark:text-gray-400" aria-hidden="true"
            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M18.5 12A2.5 2.5 0 0 1 21 9.5V7a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v2.5a2.5 2.5 0 0 1 0 5V17a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1v-2.5a2.5 2.5 0 0 1-2.5-2.5Z" />
          </svg>
          {{ item.tickets }} tickets available!
        </p>

        <!-- Price -->
        <div class="absolute bottom-4 right-4 text-lg font-semibold text-primary-600 dark:text-primary-400">
          <p>${{ item.price }} / pax</p>
        </div>
      </div>
    </a>
  </div>
</template>

<script>
export default {
  setup() {
    const items = [
      {
        title: 'Taylor Swift',
        date: '03 June',
        day: 'Sun',
        time: '10:00 AM',
        description: 'The Eras Tour',
        location: 'New York',
        tickets: '120',
        price: '100'
      },
      {
        title: 'Taylor Swift',
        date: '04 June',
        day: 'Mon',
        time: '8:00 PM',
        description: 'The Eras Tour',
        location: 'Los Angeles',
        tickets: '80',
        price: '100'
      },
      {
        title: 'Taylor Swift',
        date: '05 June',
        day: 'Wed',
        time: '7:00 PM',
        description: 'The Eras Tour',
        location: 'Orlando',
        tickets: '96',
        price: '100'
      },
    ];

    return {
      pageUrl: window.pageUrl,
      items
    };
  },
};
</script>

<style></style>

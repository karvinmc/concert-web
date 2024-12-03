<template>
  <swiper :modules="modules" :slides-per-view="3" :space-between="40" :loop="true"
    :pagination="{ el: '.swiper-pagination', clickable: true }" @swiper="onSwiper" @slideChange="onSlideChange">

    <!-- Swiper Slides -->
    <swiper-slide v-for="(item, index) in items" :key="index"
      class="bg-white border shadow border-gray-200 rounded-lg dark:bg-gray-800 dark:border-gray-700">
      <div class="relative h-[450px] w-full overflow-hidden rounded-t-lg"> <!-- Increased height -->
        <img class="rounded-t-lg w-full h-full object-cover" :src="assetUrl" alt="Concert Image" />
        <div class="absolute inset-0 bg-black bg-opacity-60 flex items-center justify-center">
          <h2 class="text-white text-2xl font-bold">Coming Soon</h2>
        </div>
      </div>
      <div class="p-5">
        <a href="#">
          <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
            {{ item.title }}
          </h5>
        </a>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
          {{ item.date }}, {{ item.location }}
        </p>
      </div>
    </swiper-slide>
    <div class="swiper-pagination"></div>
  </swiper>
</template>

<script>
// Import Swiper Vue.js
import { Swiper, SwiperSlide } from 'swiper/vue';

// Import Swiper modules
import { Navigation, Pagination } from 'swiper/modules';

// Import Swiper styles 
import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';

export default {
  components: { Swiper, SwiperSlide },
  setup() {
    const onSwiper = (swiper) => {
      console.log(swiper);
    };
    const onSlideChange = () => {
      console.log('slide change');
    };

    // Example data for slides
    const items = [
      { title: 'Taylor Swift', date: 'Date - Date', location: 'Location' },
      { title: 'Taylor Swift', date: 'Date - Date', location: 'Location' },
      { title: 'Taylor Swift', date: 'Date - Date', location: 'Location' },
      { title: 'Taylor Swift', date: 'Date - Date', location: 'Location' },
    ];

    return {
      onSwiper,
      onSlideChange,
      modules: [Navigation, Pagination],
      assetUrl: window.assetUrl,
      items
    };
  },
};
</script>

<style>
.swiper {
  padding-bottom: 50px;
}

.swiper-pagination {
  text-align: center;
  position: absolute;
}

.swiper-pagination-bullet-active {
  background-color: #7c3aed;
}

.swiper-pagination-bullet {
  width: 12px;
  height: 12px;
}
</style>
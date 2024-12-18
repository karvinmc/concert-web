<template>
  <swiper :modules="modules" :slides-per-view="3" :space-between="40" :loop="true"
    :pagination="{ el: '.swiper-pagination', clickable: true }" @swiper="onSwiper" @slideChange="onSlideChange">

    <!-- Swiper Slides -->
    <swiper-slide v-for="(item, index) in items" :key="index"
      class="bg-white border shadow border-gray-200 rounded-lg dark:bg-gray-800 dark:border-gray-700">
      <div class="relative h-[400px] w-full overflow-hidden rounded-t-lg"> <!-- Increased height -->
        <img class="rounded-t-lg w-full h-full object-cover" :src="assetUrl" alt="Concert Image" />
      </div>
      <div class="p-5">
        <a href="#">
          <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">
            {{ concert.name }}
          </h5>
        </a>
        <p class="mb-3 text-sm font-normal text-gray-700 dark:text-gray-400">
          {{ item.date }}, {{ item.location }}
        </p>
        <p class="mb-3 font-bold text-gray-700 dark:text-gray-400">
          {{ item.price }}
        </p>
        <a :href="pageUrl"
          class="inline-flex justify-center w-full px-3 py-3 text-sm font-medium text-center text-white bg-primary-600 rounded-lg hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
          Book Now
        </a>
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
  props: {
    concerts: {
      type: Array,
      required: true,
    },
  },
  setup(props) {
    const onSwiper = (swiper) => {
      console.log(swiper);
    };

    const onSlideChange = () => {
      console.log('slide change');
    };

    return {
      onSwiper,
      onSlideChange,
      modules: [Navigation, Pagination],
      assetUrl: window.assetUrl,
      pageUrl: window.pageUrl,
      concerts: props.concerts, // Access concerts passed from Laravel
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
<template>
  <swiper :slides-per-view="3" :space-between="30">
    <swiper-slide class="flex items-center justify-center text-lg bg-white border rounded shadow">Slide
      1</swiper-slide>
    <swiper-slide class="flex items-center justify-center text-lg bg-white border rounded shadow">Slide
      2</swiper-slide>
    <swiper-slide class="flex items-center justify-center text-lg bg-white border rounded shadow">Slide
      3</swiper-slide>
    <swiper-slide class="flex items-center justify-center text-lg bg-white border rounded shadow">Slide
      4</swiper-slide>
    <swiper-slide class="flex items-center justify-center text-lg bg-white border rounded shadow">Slide
      5</swiper-slide>
    <swiper-slide class="flex items-center justify-center text-lg bg-white border rounded shadow">Slide
      6</swiper-slide>
  </swiper>
</template>

<script>
import { Swiper, SwiperSlide } from 'swiper/vue';
import 'swiper/css';

export default {
  components: { Swiper, SwiperSlide },
};
</script>
import "./bootstrap";
import "flowbite";
import { createApp } from "vue";
import SwiperCarousel from "./components/SwiperCarousel.vue";

const app = createApp();

app.component("swiper-carousel", SwiperCarousel);

app.mount("#app");

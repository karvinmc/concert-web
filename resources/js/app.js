import "./bootstrap";
import "flowbite";
import { createApp } from "vue";
import SwiperUpcoming from "./components/SwiperUpcoming.vue";
import SwiperNearby from "./components/SwiperNearby.vue";

const app = createApp();

app.component("swiper-upcoming", SwiperUpcoming);
app.component("swiper-nearby", SwiperNearby);

app.mount("#app");

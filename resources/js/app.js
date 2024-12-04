import "./bootstrap";
import "flowbite";
import { createApp } from "vue";
import SwiperUpcoming from "./components/SwiperUpcoming.vue";
import SwiperNearby from "./components/SwiperNearby.vue";
import Concerts from "./components/Concerts.vue";
import Singers from "./components/Singers.vue";

const app = createApp();

app.component("swiper-upcoming", SwiperUpcoming);
app.component("swiper-nearby", SwiperNearby);
app.component("concerts", Concerts);
app.component("singers", Singers);

app.mount("#app");

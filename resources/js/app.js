import "./bootstrap";
import "flowbite";

import { createApp } from "vue";

import SwiperUpcoming from "./components/SwiperUpcoming.vue";
import SwiperNearby from "./components/SwiperNearby.vue";
import Tickets from "./components/Tickets.vue";

const app = createApp();

app.component("swiper-upcoming", SwiperUpcoming);
app.component("swiper-nearby", SwiperNearby);
app.component("concerts", Concerts);
app.component("singers", Singers);
app.component("tickets", Tickets);
app.component("seat", Seat);

app.mount("#app");

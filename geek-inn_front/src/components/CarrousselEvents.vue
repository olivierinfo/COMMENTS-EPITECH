<template>
  <div class="carroussel">
    <h3>Evènements à venir:</h3>
    <section class="carousel">
      <loader
        v-show="!this.events"
        object="#ff9633"
        color1="#ffffff"
        color2="#17fd3d"
        size="5"
        speed="2"
        bg="#343a40"
        objectbg="#999793"
        opacity="80"
        name="circular"
      ></loader>
      <ul class="carousel-items">
        <li v-for="(event, index) in events" :key="index" class="carousel-item">
          <div>
            <event-list :event="event"></event-list>
          </div>
        </li>
      </ul>
    </section>
  </div>
</template>
<script>
import EventList from "@/components/EventList.vue";
import { getAllEvents } from "@/api.js";
export default {
  components: { EventList },
  name: "CarrousselEvent",
  data() {
    return { events: null };
  },

  mounted() {
    this.getAllEvents(1, 5);
  },
  methods: {
    getAllEvents: async function (page, limit) {
      const events = await getAllEvents(page, limit);
      this.events = [...events.events];
      console.log(4, this.events);
    },
  },
};
</script>

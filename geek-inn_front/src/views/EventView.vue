<template>
  <div class="about">
    <h1>Event View</h1>
    <h3 v-show="!this.events">Loading events... please wait...</h3>
    <div v-for="(event, index) in events" :key="index">
      <event-list :event="event"></event-list>
    </div>
  </div>
</template>
<script>
import EventList from "@/components/EventList.vue";
import { getAllEvents } from "@/api.js";
export default {
  components: { EventList },
  name: "EventView",
  data() {
    return { events: null };
  },
  mounted() {
    this.getAllEvents();
  },
  methods: {
    getAllEvents: async function () {
      const events = await getAllEvents();
      this.events = [...events.events];
      console.log(4, this.events);
    },
  },
};
</script>

<template>
  <div class="about">
    <h1>Place view</h1>
    <loader
      v-show="!this.places"
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
    <div v-for="(place, index) in places" :key="index">
      <place-list :place="place"></place-list>
    </div>
  </div>
</template>
<script>
import PlaceList from "@/components/PlaceList.vue";
import { getAllPlaces } from "@/api.js";
export default {
  components: { PlaceList },
  name: "PlaceView",
  data() {
    return { places: null };
  },
  mounted() {
    this.getAllPlaces();
  },
  methods: {
    getAllPlaces: async function () {
      const places = await getAllPlaces();
      this.places = [...places.places];
      console.log(5, this.places);
    },
  },
};
</script>

<template>
  <div class="carroussel">
    <h3>Les entreprises les plus cool</h3>
    <section class="carousel">
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
      <ul class="carousel-items">
        <li v-for="(place, index) in places" :key="index" class="carousel-item">
          <div>
            <place-list :place="place"></place-list>
          </div>
        </li>
      </ul>
    </section>
  </div>
</template>
<script>
import PlaceList from "@/components/PlaceList.vue";
import { getAllCompanies } from "@/api.js";
export default {
  components: { PlaceList },
  name: "CarrousselCompanies",
  data() {
    return { places: null };
  },
  mounted() {
    this.getAllCompanies(1, 5);
  },
  methods: {
    getAllCompanies: async function (page, limit) {
      const places = await getAllCompanies(page, limit);
      this.places = [...places.places];
      console.log(5, this.places);
    },
  },
};
</script>

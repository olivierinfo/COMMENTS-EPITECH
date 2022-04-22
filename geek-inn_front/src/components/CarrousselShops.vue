<template>
  <div class="carroussel">
    <h3>Nos magasins partenaires</h3>
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
      <h3 v-show="!this.places">
        Chargement des magasins, merci de patienter...
      </h3>
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
import { getAllShops } from "@/api.js";
export default {
  components: { PlaceList },
  name: "CarrousselShops",
  data() {
    return { places: null };
  },
  mounted() {
    this.getAllShops(1, 5);
  },
  methods: {
    getAllShops: async function (page, limit) {
      const places = await getAllShops(page, limit);
      this.places = [...places.places];
      console.log(5, this.places);
    },
  },
};
</script>

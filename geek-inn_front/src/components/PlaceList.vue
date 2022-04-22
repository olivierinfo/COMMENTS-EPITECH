<template>
  <div class="card-list">
    <!-- <span>{{ place.id }} </span> -->
    <span class="card-title">{{ place.name }} </span>
    <img class="card-image" :src="place.galery_pictures" />
    <span class="card-content">{{ place.description }} </span>
    <span>{{ place.city }} {{ place.postal_code }} </span>
    <span>{{ place.adress }} </span>
    <span>{{ place.phone }} </span>
    <span> Note:{{ placeRate }} </span>
    <router-link :to="routePath" class="button"
      >Voir les commentaires</router-link
    >
  </div>
</template>
<script>
import { averageRateByPlaceId } from "@/api.js";
export default {
  name: "PlaceList",
  props: { place: Object },
  data() {
    return { routePath: "/places/" + this.place.id, placeRate: "" };
  },
  mounted() {
    this.averageRateByPlaceId(this.place.id);
  },
  methods: {
    averageRateByPlaceId: async function (id) {
      const rate = await averageRateByPlaceId(id);
      this.placeRate = rate;
      console.log(20, this.placeRate);
    },
  },
};
</script>
<style scoped>
.button {
  border: 1px solid;
  border-radius: 5px;
  /* box-shadow: 5px 5px 5px rgba(0, 0, 0, 0.7); */
  margin-bottom: 10px;
  margin-top: 10px;
  /* background: #48cae4; */
  padding: 5px;
  width: 50%;
}
.button:hover {
  -webkit-transition: all 1s ease; /* Safari et Chrome */
  -moz-transition: all 1s ease; /* Firefox */
  -ms-transition: all 1s ease; /* Internet Explorer 9 */
  -o-transition: all 1s ease; /* Opera */
  transition: all 1s ease;
  background: black;
  color: white;
}
</style>

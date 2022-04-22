<template>
  <div class="card-list">
    <!-- <span>{{ place.id }} </span> -->
    <span class="card-title">{{ place.name }} (Note {{ placeRate }}) </span>
    <img class="card-image" :src="place.galery_pictures" />
    <span class="card-content">{{ place.description }} </span>
    <span class="adresse"
      >{{ place.postal_code }} {{ place.city }} {{ place.adress }}
    </span>
    <div class="divimagetel">
      <img class="imgtel" src="../assets/tel.png" />
      <p>{{ place.phone }}</p>
    </div>
    <router-link :to="routePath" class="button"
      >Voir les commentaires</router-link
    >
  </div>
</template>
<script>
import { averageRateByPlaceId } from "@/api.js";
export default {
  name: "PlaceListAll",
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
.adresse {
  font-style: italic;
  margin-top: 5px;
}
.divimagetel {
  display: flex;
  margin-top: 5px;
}
.imgtel {
  height: 20px;
}
.card-list {
  align-items: center;
  display: flex;
  height: auto;
  margin-bottom: 30px;
}
.card-image {
  width: 100%;
  border-radius: 10px;
}
.card-title {
  font-size: auto;
  margin-bottom: 30px;
  margin-top: 30px;
}
.button {
  border: 1px solid;
  border-radius: 5px;
  /* box-shadow: 5px 5px 5px rgba(0, 0, 0, 0.7); */
  margin-bottom: 10px;
  margin-top: 10px;
  /* background: #48cae4; */
  padding: 5px;
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

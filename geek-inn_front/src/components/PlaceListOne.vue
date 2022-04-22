<template>
  <div class="bigconteneur">
    <div>
      <h1 class="card-title">{{ place.name }}</h1>
    </div>
    <div class="conteneur">
      <div class="gauche">
        <!-- <span>{{ place.id }} </span> -->
        <img class="card-image" :src="place.galery_pictures" />
      </div>
      <div class="droite">
        <div class="note">Note : {{ placeRate }}</div>
        <div class="card-content">{{ place.description }}</div>
        <div class="card-adresse">
          {{ place.postal_code }} {{ place.city }} {{ place.adress }}
        </div>
        <div class="divimagetel">
          <div><img class="imgtel" src="../assets/tel.png" /></div>
          <div>{{ place.phone }}</div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import { averageRateByPlaceId } from "@/api.js";
export default {
  name: "PlaceListOne",
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
.note {
  font-size: 30px;
}
.bigconteneur {
  display: block;
}
.card-adresse {
  margin-top: 10px;
}
.card-content {
  margin-top: 10px;
  margin-left: auto;
  margin-right: auto;
}
.card-list {
  align-items: center;
  display: flex;
  min-height: 400px;
}
.card-image {
  max-width: 100%;
  height: auto;
  border-radius: 10px;
}
.card-title {
  font-size: auto;
  margin-top: 30px;
}
.divimagetel {
  margin-top: 10px;
  text-align: center;
  display: flex;
  align-items: center;
  justify-content: center;
}
.imgtel {
  height: 20px;
}
.gauche {
  width: 100%;
  height: auto;
  align-items: center;
  text-align: center;
}
.droite {
  width: 100%;
  height: auto;
  align-items: center;
  text-align: center;
  margin-left: 10px;
}
.conteneur {
  align-items: center;
  grid-template-columns: 2fr 1fr;
  display: grid;
  margin-right: 50px;
  margin-left: 50px;
  margin-top: 20px;
  margin-bottom: 100px;

  border-radius: 10px;
  /* min-height: 500px; */
}

@media (max-width: 800px) {
  .conteneur {
    align-items: center;
    grid-template-columns: 1fr;
    display: grid;
    margin-right: 10px;
    margin-bottom: 50px;
    border-radius: 10px;
    width: 100%;
    margin-left: auto;
    margin-right: auto;
    height: auto;
    margin-top: 10px;
  }
  .card-content {
    margin-top: 0px;
  }
}
</style>

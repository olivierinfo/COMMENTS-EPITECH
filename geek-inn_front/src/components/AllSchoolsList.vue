<template>
  <div>
    <div class="titrediv">
      <h1 class="titre">Les ecoles GEEK à MARSEILLE</h1>
    </div>
    <div class="allschools">
      <div v-for="(place, index) in places" :key="index" class="schoolgrid">
        <place-list-all :place="place"></place-list-all>
      </div>
    </div>
  </div>
</template>
<script>
import PlaceListAll from "@/components/PlaceListAll.vue";
import { getAllSchools } from "@/api.js";
export default {
  components: { PlaceListAll },
  name: "CarrousselSchool",
  data() {
    return { places: null };
  },
  mounted() {
    this.getAllSchools();
  },
  methods: {
    getAllSchools: async function () {
      const places = await getAllSchools();
      this.places = [...places.places];
      console.log(5, this.places);
    },
  },
};
</script>
<style scoped>
.titrediv {
  margin-top: 10px;
}
.titre {
  color: #48cae4;
}
.allschools {
  grid-template-columns: 1fr 1fr;
  display: grid;
}
@media (max-width: 800px) {
  .allschools {
    grid-template-columns: 1fr;
    display: grid;
  }
}

.schoolgrid {
  margin: 10px;
}
</style>
<style scoped>
.titrediv {
  margin-top: 10px;
}
.titre {
  color: #48cae4;
}
.allschools {
  grid-template-columns: 1fr 1fr;
  display: grid;
}
@media (max-width: 800px) {
  .allschools {
    grid-template-columns: 1fr;
    display: grid;
  }
}

.schoolgrid {
  margin: 10px;
}
</style>

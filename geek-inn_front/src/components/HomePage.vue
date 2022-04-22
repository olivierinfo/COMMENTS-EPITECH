<template>
  <div class="hello">
    <search-bar></search-bar>
    <carroussel-school></carroussel-school>
    <carroussel-coworking></carroussel-coworking>
    <carroussel-companies></carroussel-companies>
    <carroussel-bars></carroussel-bars>
    <carroussel-shops></carroussel-shops>
    <carroussel-events></carroussel-events>
  </div>
</template>

<script>
import SearchBar from "./SearchBar.vue";
import CarrousselSchool from "./CarrousselSchool.vue";
import CarrousselCoworking from "./CarrousselCoworking.vue";
import CarrousselCompanies from "./CarrousselCompanies.vue";
import CarrousselBars from "./CarrousselBars.vue";
import CarrousselShops from "./CarrousselShops.vue";
import CarrousselEvents from "./CarrousselEvents.vue";
export default {
  components: {
    SearchBar,
    CarrousselSchool,
    CarrousselCoworking,
    CarrousselCompanies,
    CarrousselBars,
    CarrousselShops,
    CarrousselEvents,
  },
  name: "HomePage",
  props: {
    msg: String,
  },
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
h3 {
  margin: 40px 0 0;
}
ul {
  list-style-type: none;
  padding: 0;
}
li {
  display: inline-block;
  margin: 0 10px;
}
a {
  color: #42b983;
}
</style>

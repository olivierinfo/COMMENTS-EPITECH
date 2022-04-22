<template>
  <div class="search-bar"></div>
</template>
<script>
export default {
  name: "SearchBar",
};
</script>
<style scoped>
.search-bar {
  object-fit: cover;
  height: 300px;
  background-image: url("../assets/marss.jpeg");
  background-size: 100% 300px;
}
@media (max-width: 700px) {
  .search-bar {
    object-fit: cover;
    width: 100%;
    height: 150px;
    background-image: url("../assets/marss.jpeg");
    background-size: 100% 150px;
  }
}
</style>

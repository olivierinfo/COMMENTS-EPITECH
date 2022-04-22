<template>
  <div class="category-component">
    <router-link :to="routePath" class="bouttoncategory2">{{
      category.name
    }}</router-link>
  </div>
</template>
<script>
export default {
  name: "CategoryList",
  props: { category: Object },
  data() {
    return { routePath: "/place/" + this.category.id };
  },
};
</script>
<style scoped>
.category-component {
  text-align: center;
  margin: 10px;
}
.category-text {
  display: inline-block;
  vertical-align: baseline;
  line-height: normal;
}
.bouttoncategory2 {
  border-radius: 1rem;

  background-color: white;
  font-size: 30px;
  border: 1px solid;
  border-radius: 10px;
  padding: 5px;
  margin-bottom: 5px;
}

.bouttoncategory2:hover {
  background: black;
  color: white;
}

@media (max-width: 700px) {
  .bouttoncategory2 {
    border-radius: 1rem;
    width: 100px;
    height: 100px;
    font-family: open sans;
    background-color: white;
    font-size: 15px;
  }
  .category-component {
    text-align: center;
    margin: 0px;
    margin-bottom: 10px;
  }
}
</style>

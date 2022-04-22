<template>
  <div class="category-bar flex">
    <loader
      v-show="!this.categories"
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
    <h3 v-show="!this.categories">Loading categories... please wait...</h3>
    <div
      class="margin-top"
      v-for="(category, index) in categories"
      :key="index"
    >
      <category-list :category="category" class="category-list"></category-list>
    </div>
  </div>
</template>

<script>
import CategoryList from "@/components/CategoryList.vue";
import { getAllCategories } from "@/api.js";
export default {
  name: "CategoryBar",
  components: { CategoryList },
  data() {
    return { categories: null };
  },
  mounted() {
    this.getAllCategories();
  },
  methods: {
    getAllCategories: async function () {
      const categories = await getAllCategories();
      this.categories = [...categories.categories];
      console.log(3, this.categories);
    },
  },
};
</script>
<style scoped>
.margin-top {
}
.bouton {
  border: 1px solid;
  border-radius: 10px;
}
.bouton:hover {
  -webkit-transition: all 1s ease; /* Safari et Chrome */
  -moz-transition: all 1s ease; /* Firefox */
  -ms-transition: all 1s ease; /* Internet Explorer 9 */
  -o-transition: all 1s ease; /* Opera */
  transition: all 1s ease;
  background: black;
  color: white;
}
.category-bar {
  border: black;
  background-color: white;
  display: flex;
  justify-content: center;
  align-items: center;
  font-size: 20px;
  margin-bottom: 100px;
  margin-top: 20px;
  margin-left: 50px;
  margin-right: 50px;
}
.flex {
  display: flex;
  flex-wrap: wrap;
  flex-direction: row;
  min-height: 50px;
  justify-content: space-around;
  margin-top: 20px;
}

@media (max-width: 700px) {
  .bouton {
    border: 1px solid;
    border-radius: 10px;
    margin: 2px;
  }
  .category-bar {
    border: black;
    background-color: white;
    display: block;
    justify-content: center;
    align-items: center;
    font-size: 20px;
    margin-bottom: 20px;
    width: 50%;
    margin-left: auto;
    margin-right: auto;
    height: auto;
    margin-top: 20px;
  }
}
</style>

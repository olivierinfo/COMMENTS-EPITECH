<template>
  <div class="about">
    <h1>Category View</h1>
    <h3 v-show="!this.categories">Loading categories... please wait...</h3>
    <div v-for="(category, index) in categories" :key="index">
      <category-list :category="category"></category-list>
    </div>
  </div>
</template>
<script>
import CategoryList from "@/components/CategoryList.vue";

import { getAllCategories } from "@/api.js";
export default {
  components: { CategoryList },
  name: "CategoryView",
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

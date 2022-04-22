<template>
  <div class="about">
    <h1>Review View</h1>
    <loader
      v-show="!this.reviews"
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
    <div v-for="(review, index) in reviews" :key="index">
      <review-list :review="review"></review-list>
    </div>
  </div>
</template>
<script>
import ReviewList from "@/components/ReviewList.vue";
import { getAllReviews } from "@/api.js";
export default {
  components: { ReviewList },
  name: "ReviewView",
  data() {
    return { reviews: null };
  },
  mounted() {
    this.getAllReviews();
  },
  methods: {
    getAllReviews: async function () {
      const reviews = await getAllReviews();
      this.reviews = [...reviews.reviews];
      console.log(2, this.reviews);
    },
  },
};
</script>

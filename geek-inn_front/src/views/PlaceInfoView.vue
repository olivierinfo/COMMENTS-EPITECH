<template>
  <div class="place-info">
    <!-- <h1>Place Info View</h1> -->
    <loader
      v-show="!this.place"
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
    <place-list-one v-if="place" :place="place"></place-list-one>
    <h3>Les avis et notes de nos GEEK</h3>
    <div v-for="(review, index) in reviews" :key="index" class="reviewlist">
      <review-list v-if="review" :review="review"></review-list>
      <!-- <div v-for="(user, index) in review" :key="index">
        
      </div> -->
    </div>
    <section class="comment-section">
      <div class="title-div">
        <input
          type="text"
          placeholder="Titre..."
          v-model="reviewTitle"
          class="review-title"
        />
      </div>
      <div class="div-content">
        <textarea
          placeholder="Commentaire..."
          v-model="reviewContent"
          class="review-content"
        />
      </div>
      <div class="rate">
        <label for="rate-select">Laissez une note : </label>
        <select id="rate-select" v-model="reviewRate">
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
        </select>
      </div>
      <input
        type="submit"
        value="Envoyer"
        v-on:click="addReview"
        class="submit"
      />
    </section>
  </div>
</template>
<script>
import PlaceListOne from "@/components/PlaceListOne.vue";
import ReviewList from "@/components/ReviewList.vue";
import { getPlaceById, getReviewsByPlaceId, addReview } from "@/api.js";
export default {
  components: { PlaceListOne, ReviewList },
  name: "PlaceInfoView",
  props: {},
  data() {
    return {
      place: null,
      reviews: null,
      reviewTitle: "",
      reviewContent: "",
      reviewRate: "",
      place_id: this.$route.params.id,
    };
  },
  mounted() {
    this.getPlaceById(this.$route.params.id);
    this.getReviewsByPlaceId(this.$route.params.id);
  },
  methods: {
    getPlaceById: async function (id) {
      const place = await getPlaceById(id);
      this.place = place.place;
      console.log(20, place);
    },
    getReviewsByPlaceId: async function (id) {
      const reviews = await getReviewsByPlaceId(id);
      this.reviews = [...reviews.reviews];
      console.log(30, this.reviews);
    },
    addReview: async function () {
      await addReview(
        this.reviewTitle,
        this.reviewContent,
        this.reviewRate,
        this.place_id
      );
      this.getReviewsByPlaceId(this.$route.params.id);
      console.log(40, "ADD REVIEW HERE!");
      console.log(
        50,
        this.reviewTitle,
        this.reviewContent,
        this.reviewRate,
        this.place_id
      );
    },
  },
};
</script>
<style scoped>
.rate {
  margin-top: 10px;
}
.title-div {
  width: 80%;
}
.div-content {
  width: 80%;
  margin-top: 10px;
}
.submit {
  width: 20%;
  border-radius: 5px;
  min-height: 30px;
  margin-top: 10px;
}
.review-content {
  width: 80%;
  border-radius: 5px;
  min-height: 100px;
}
.review-title {
  width: 80%;
  min-height: 30px;
}
.reviewlist {
  background-color: white;
  border-bottom: 2px solid;
  border-color: grey;
}
.place-info {
  align-items: center;
}
.comment-section {
  align-items: center;
  text-align: center;
}
@media (max-width: 800px) {
  .comment-section {
    align-items: center;
    text-align: center;
    width: 100%;
  }
  .title-div {
    width: 100%;
    border-radius: 5px;
  }
  .div-content {
    width: 100%;
  }
  .submit {
    width: 40%;
    border-radius: 5px;
    min-height: 30px;
  }
  .review-content {
    width: 100%;
    border-radius: 5px;
    min-height: 100px;
  }
  .review-title {
    width: 100%;
    border-radius: 5px;
    min-height: 30px;
  }
}
</style>

<template>
  <div>
    <user-card :userId="this.review.user_id"></user-card>

    <div class="reviews">
      <div class="rate">{{ review.rate }}/5<br /><br /></div>
      <!-- <span>{{ review.user_id }} : </span> -->
      <div class="titre">{{ review.title }}</div>
      <div class="content">Comment{{ review.content }}</div>
      <div class="date">{{ review.created_at }}</div>
      <p class="texteavis">
        Cet avis est l'opinion subjective d'un membre de Geek'Inn et non l'avis
        de Geek'Inn SA.
      </p>
    </div>
  </div>
</template>
<script>
import UserCard from "@/components/UserCard.vue";

export default {
  name: "ReviewList",
  components: { UserCard },
  props: { review: Object },
};
</script>
<style scoped>
.texteavis {
  font-size: 10px;
  font-weight: 3px;
  color: grey;
}
.reviews {
  margin: 10px;
  text-align: left;
  display: block;
  margin: 10px;
}
.titre {
  font-size: 20px;
  font-weight: 5px;
}
.date {
  font-size: 10px;
  color: grey;
}
.rate {
  color: red;
  font-size: 20px;
  height: 20px;
}
.content {
  justify-content: first baseline;
}
</style>

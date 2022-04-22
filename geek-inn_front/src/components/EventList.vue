<template>
  <div class="card-list">
    <span>{{ event.id }} </span>
    <span class="card-title">{{ event.title }} </span>
    <img class="card-img" :src="event.galery_pictures" />
    <span>{{ event.content }} </span>
    <span class="price">{{ event.price }} €.TTC </span>
    <span class="date">{{ event.date }}</span>
    <router-link :to="routePath" class="button">Read more</router-link>
  </div>
</template>
<script>
export default {
  name: "EventList",
  props: { event: Object },
  data() {
    return { routePath: "/events/" + this.event.id };
  },
};
</script>

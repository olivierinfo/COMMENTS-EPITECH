<template>
  <div class="card-image-user">
    <img :src="user.picture" />
    <span>{{ user.id }} </span>
    <span> {{ user.username }} </span>
    <span> {{ user.email }} <br /><br /></span>
  </div>
</template>
<script>
export default {
  name: "UserList",
  props: { user: Object },
};
</script>
<style scoped>
img {
  width: 50px;
  height: 50px;
  border-radius: 50%;
}
.card-image-user {
  border: 1px solid black;
  background-color: blueviolet;
}
</style>

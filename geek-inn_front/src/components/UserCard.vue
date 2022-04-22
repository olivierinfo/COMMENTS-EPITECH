<template>
  <div class="card-image-user">
    <img :src="user.picture" />
    <!-- <span>{{ user.id }} </span> -->
    <div class="username">
      <p>{{ user.username }}</p>
    </div>
    <!-- <span> {{ user.email }} <br /><br /></span> -->
  </div>
</template>
<script>
import { readUser } from "@/api.js";
export default {
  name: "UserList",
  props: { userId: Number },
  data() {
    return { user: Object };
  },
  mounted() {
    this.readUser();
  },
  methods: {
    readUser: async function () {
      const userReponse = await readUser(this.userId);
      console.log(1, userReponse);
      this.user = userReponse.user;
    },
  },
};
</script>
<style scoped>
.username {
  font-size: 15px;
  color: grey;
  margin-left: 10px;
}
img {
  width: 30px;
  height: 30px;
  border-radius: 50%;
}
.card-image-user {
  margin-bottom: 20px;
  align-items: center;
  text-align: center;
  display: flex;
  margin-top: 40px;
  margin-bottom: 10px;
}
</style>

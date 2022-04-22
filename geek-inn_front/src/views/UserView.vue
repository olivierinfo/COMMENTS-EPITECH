<template>
  <div class="about">
    <h1>User View</h1>
    <h3 v-show="!this.users">Loading users... please wait...</h3>
    <div v-for="(user, index) in users" :key="index">
      <user-list :user="user"></user-list>
    </div>
  </div>
</template>
<script>
import UserList from "@/components/UserList.vue";
import { getAllUsers } from "@/api.js";
export default {
  components: { UserList },
  name: "UserView",
  data() {
    return { users: null };
  },
  mounted() {
    this.getAllUsers();
  },
  methods: {
    getAllUsers: async function () {
      const users = await getAllUsers();
      this.users = [...users.users];
      console.log(1, this.users);
    },
  },
};
</script>

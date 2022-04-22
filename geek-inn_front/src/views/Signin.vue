<template>
  <div class="form">
    <a href="/">
      <img
        src="../assets/fleche_gauche.png"
        width="50"
        style="transform: rotate(180deg)"
      />
    </a>

    <div class="head">
      <h2>CONNECTEZ-VOUS</h2>
      <h3>Formulaire de connexion</h3>
    </div>
    <br />
    <br />
    <br />
    <div class="centre">
      <div>
        <input
          type="text"
          class="btn btn-outline-primary"
          placeholder="Adresse email"
          v-model="email"
          required
        />
      </div>
      <br />
      <br />
      <div>
        <input
          type="password"
          class="btn btn-outline-primary"
          placeholder="Mot de passe"
          v-model="password"
          required
        />
      </div>
      <br />
      <br />
      <br />
      <br />
    </div>

    <div class="forgotdiv">
      <a href="forgotpass" style="text-decoration: none"
        >Mot de passe oublié ?</a
      >
    </div>

    <div class="centre">
      <button v-on:click="loginUser" class="btn btn-outline-primary btn-login">
        CONECTEZ-VOUS
      </button>
      <br />

      <h4>OU</h4>

      <button class="btn btn-outline-primary btn-google">
        Connectez-vous avec GOOGLE
      </button>
      <br />
    </div>

    <a href="signup" style="text-decoration: none">
      <footer>
        Vous n'avez pas de compte? <strong>ENREGISTREZ-VOUS</strong>
      </footer>
    </a>
    <br />
    <span>{{ response }}</span>
  </div>
</template>

<script>
import { loginUser } from "@/api.js";
export default {
  name: "sign-in",
  props: {},
  data() {
    return {
      email: "",
      password: "",
      response: "",
    };
  },
  methods: {
    loginUser: async function () {
      const responseSignIn = await loginUser(this.email, this.password);
      this.response = responseSignIn.username;
      console.log(60, responseSignIn);
      console.log(40, "LOGIN USER HERE!");
      console.log(50, this.email, this.password);
      this.$emit("welcomeUser", this.response);
      window.location.href = "/";
    },
  },
};
</script>

<style scoped>
@media (min-width: 1024px) {
  .about {
    min-height: 100vh;
    display: flex;
    align-items: center;
  }
}

.form {
  margin: 0 auto;
  width: 50%;
  height: auto;
  padding: 1em;
  border: 1px solid #ccc;
  border-radius: 1em;
  background-color: rgb(255, 255, 255);
  border-color: #e5e6e9;
  font-family: Open Sans;
  border-width: 3px;
  margin-top: 50px;
}

img {
  margin-left: 40px;
}

.centre {
  text-align: center;
  padding: 10px;
}

form div + div {
  margin-top: 1em;
}

.head {
  text-align: left;
  padding-left: 50px;
}

h2 {
  font-family: Open Sans;
}

h3 {
  color: #999b9b;
  font-weight: 100;
}

input,
textarea {
  font: 1em sans-serif;
  border-radius: 1em;
  width: 300px;
  height: 40px;
  border: none;
  background-color: #f2f3f7;
  margin: 0 auto;
  padding: 10px;
  font-family: Open Sans;
  padding-left: 20px;
}

input:hover {
  border-color: #183cdf;
  background-color: #d9dceb;
}

.forgotdiv {
  text-align: right;
  padding-right: 50px;
}

button {
  margin-left: 0.5em;
  background-color: #48cae4;
  border-radius: 1em;
  width: 320px;
  margin: 0 auto;
  height: 60px;
  border-radius: 2em;
  border: none;
  font-family: Open Sans;
}

.btn-login {
  color: rgb(252, 246, 246);
  font-weight: 600;
  font-size: 15px;
}

.btn-google {
  background-color: rgb(247, 243, 243);
  font-weight: 600;
  font-size: 15px;
}

footer {
  text-align: center;
  font-family: Open Sans;
  margin-top: 20px;
}
.search-bar {
  display: none;
}
</style>

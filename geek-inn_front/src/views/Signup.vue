<template>
  <div>
    <div class="form">
      <a href="/">
        <img
          src="../assets/fleche_gauche.png"
          width="50"
          style="transform: rotate(180deg)"
        />
      </a>

      <div class="head">
        <h2>ENREGISTREZ-VOUS</h2>
        <h3>Formulaire d'enregistrement</h3>
      </div>

      <br />
      <div class="centre">
        <div class="input">
          <input
            type="text"
            class="btn btn-outline-primary"
            placeholder="Nom"
            v-model="username"
            required
          />
        </div>

        <div class="input">
          <input
            type="text"
            class="btn btn-outline-primary"
            placeholder="Adresse email"
            v-model="email"
            required
          />
        </div>

        <div class="input">
          <input
            type="text"
            class="btn btn-outline-primary"
            placeholder="Téléphone"
            v-model="phone_number"
            required
          />
        </div>

        <div class="input">
          <input
            type="password"
            class="btn btn-outline-primary"
            placeholder="Mot de passe"
            required
          />
        </div>

        <div class="input">
          <input
            type="password"
            class="btn btn-outline-primary"
            placeholder="Confirmez votre mot de passe"
            v-model="password"
            required
          />
        </div>
      </div>

      <div class="forgotdiv">
        <a href="forgotpass" style="text-decoration: none"
          >Mot de passe oublié ?</a
        >
      </div>

      <div class="centre">
        <button
          v-on:click="registerUser"
          class="btn btn-outline-primary btn-login"
        >
          ENREGISTREZ-VOUS
        </button>
        <br /><br />

        <h4>OU</h4>
        <br />

        <button class="btn btn-outline-primary btn-google">
          Connectez-vous avec GOOGLE
        </button>
        <br /><br />
      </div>

      <a href="signin" style="text-decoration: none">
        <footer>
          Vous avez déjà un compte? <strong>CONNECTEZ-VOUS</strong>
        </footer>
        <span>{{ response }}</span>
      </a>
      <br />
    </div>
    <br />
  </div>
</template>

<script>
import { registerUser } from "@/api.js";
export default {
  name: "sign-up",
  props: {},
  data() {
    return {
      username: "",
      email: "",
      phone_number: "",
      password: "",
      response: "",
    };
  },
  methods: {
    registerUser: async function () {
      const responseSignUp = await registerUser(
        this.username,
        this.email,
        this.phone_number,
        this.password
      );
      this.response = responseSignUp.data.username;

      console.log(40, "REGISTER USER HERE!");
      console.log(
        50,
        this.username,
        this.email,
        this.phone_number,
        this.password
      );
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
  width: 400px;
  height: 900px;
  padding: 1em;
  border: 1px solid #ccc;
  border-radius: 1em;
  background-color: rgb(255, 255, 255);
  border-color: #e5e6e9;
  font-family: Open Sans;
  border-width: 3px;
  margin-top: 50px;
}
.input {
  margin-bottom: 10px;
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

button:hover {
  border-color: #183cdf;
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
}
</style>

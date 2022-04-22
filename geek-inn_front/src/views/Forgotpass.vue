<template>
  <form action="ma-page-de-traitement" method="post">
    <a href="/">
      <img
        src="../assets/fleche_gauche.png"
        width="50"
        style="transform: rotate(180deg)"
      />
    </a>
    <div class="head">
      <h2>FORGOT PASSWORD</h2>
      <h4>
        Please enter your email or phone number to verify the password reset
      </h4>
    </div>
    <br />
    <br />
    <br />
    <div class="centre">
      <div>
        <input
          type="text"
          class="btn btn-outline-primary"
          placeholder="Email Address"
          v-model="Email"
          required
        />
      </div>
      <br />
      <br />
    </div>

    <div class="centre">
      <button type="submit" class="btn btn-outline-primary btn-login">
        SEND NOW
      </button>
      <br />
    </div>

    <br />
    <br />

    <a href="#" style="text-decoration: none">
      <footer>Still in trouble? let's contact us</footer>
    </a>
  </form>
  <br />
</template>

<script>
/* ✓ GOOD */
export default {
  name: "forgot-pass",
  // ...
};
</script>

<style>
@media (min-width: 1024px) {
  .about {
    min-height: 100vh;
    display: flex;
    align-items: center;
  }
}

form {
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

h4 {
  color: #999b9b;
  font-weight: 500;
}

input,
textarea {
  font: 1em sans-serif;
  border-radius: 1em;
  width: 300px;
  height: 40px;
  border: none;
  background-color: #f1f1f1;
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
  color: #7b7b80;
  margin-bottom: 400px;
}
</style>

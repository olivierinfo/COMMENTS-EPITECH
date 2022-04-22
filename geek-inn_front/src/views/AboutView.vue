<template>
  <div class="about">
    <h1>This is an about page for testing</h1>
  </div>
</template>
<script>
var myHeaders = new Headers();
myHeaders.append(
  "Cookie",
  "XSRF-TOKEN=eyJpdiI6IlcyT2xvSE1LSjFaQjBqcFdhRXZsMVE9PSIsInZhbHVlIjoiZlpoaW44OGJrR08wMitNWlF6ZGd0MUs1cDZKRW9reFc0bXZ0ZEVmM29MME9KUmlXWDdxNlBPMldnMFpZOVgzUzJ0MVlGSUtrc1RuVGtWYVNnNDhqNlFVUG1EajhTVlFiUmY0bUwrTDNDY3ZxdzFGNkt4aVM4OHJxRHV0VGU4ZEciLCJtYWMiOiJkNjE3MWI2MzEwYTlmYmFhNjI1NDU5NjViOWJlODNkMDUzZTE5ZjkxYTI1ZWE4NTQ2MDE4MDdmZDZiYTg3OTY0IiwidGFnIjoiIn0%3D; laravel_session=eyJpdiI6IlVjRGVIM0FIZHJacnprRHp0cC9tT2c9PSIsInZhbHVlIjoiNVNka05jeGdsVWVmVHZkeUR2NzliOE02ZmxBNkE0NCtXeXZlaWwxWDU3SU9QWnlHb0dNMzlKUlNTZUR0ZCt0enJXdlZCYWwxdFB3dEZhM05ZWTZTbW5BRCtLWHQ4SWN2K3BrVldZSjF1ZlYydmpjZFg4SWFaUWlPVllqVTVTOXkiLCJtYWMiOiI0MjcxODcxMjU4YmJkNjdkZjRiYjIwMDhmMWU5NWM4ZjkwZThkOTE5MmFkNDZhNDUyYTU3YWNiYTY4N2Y5MjRjIiwidGFnIjoiIn0%3D"
);

//var formdata = new FormData();

var requestOptions = {
  method: "GET",
  headers: myHeaders,
};

fetch("http://127.0.0.1:8000/reviews/index", requestOptions)
  .then((response) => response.text())
  .then((result) => console.log(result))
  .catch((error) => console.log("error", error));
</script>

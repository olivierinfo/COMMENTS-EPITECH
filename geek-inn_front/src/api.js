import axios from "axios";

// **************
// USERS
// **************
export async function getAllUsers() {
  var config = {
    method: "get",
    url: "http://127.0.0.1:8000/users/index",
    headers: {
      "Content-Type": "application/json",
      Accept: "application/json",
      Authorization: "Bearer 18|IN9R0BdpOttnXX80bVxZbg4Rx6tQuBSnOZRVxhXl",
    },
  };
  try {
    const response = await axios(config);
    return response.data;
  } catch (error) {
    return error;
  }
}
export async function readUser(id) {
  var config = {
    method: "get",
    url: "http://127.0.0.1:8000/users/" + id,
    headers: {
      "Content-Type": "application/json",
      Accept: "application/json",
      Authorization: "Bearer 18|IN9R0BdpOttnXX80bVxZbg4Rx6tQuBSnOZRVxhXl",
    },
  };
  try {
    const response = await axios(config);
    return response.data;
  } catch (error) {
    return error;
  }
}
export async function registerUser() {
  var config = {
    method: "post",
    url: "http://127.0.0.1:8000/register",
    headers: {
      "Content-Type": "application/json",
      Accept: "application/json",
      Authorization: "Bearer 18|IN9R0BdpOttnXX80bVxZbg4Rx6tQuBSnOZRVxhXl",
      "X-CSRF-TOKEN": "d4xwYJRmw4mtlkZbWnfjurzsGmqNB26QFv4kiMpO",
      Cookie:
        "XSRF-TOKEN=eyJpdiI6IkpwRlRybjRwRWVJZjhobTVEVDFUdlE9PSIsInZhbHVlIjoiWDFvRFdFN2J4c0lOZzBlcVhHWlpNaERvTUJCd1A5dnd4ckxxSDhYd1FYdFE5MVkzK2QxQ0V5Q2lOOEZuUE5MdzRVN0tDSENpbDVrUzVTRG05bmtLSGZRREF6NW9QS2V5Z3dCMlhxS3pwY2lXczZ2dWlRTytJbG8zdlVoN0JUalkiLCJtYWMiOiJmMTg0OTI2MjYzMTgwOGY2Mjg1NTFlN2JmN2FhMjlmYmRkMjYwOWJmNTY0MmRjYzU5ZTFlYWFlMDlhOTYxMDQ2IiwidGFnIjoiIn0%3D; laravel_session=eyJpdiI6InFwRkVYNEFSUUNFNjFqenU4dUlUVEE9PSIsInZhbHVlIjoiN3lBdHZXR2RjR0tMRGgxdHQvTHVDNzNIM2l6d05XQXJOMzB1TjlJeWJ4ZHRnVlJTcmZaSVhCY0VvYnBKWGsvaVAyQmY4OEJUdXAzV0hveWNDSnFHazBUVmRqb1BWdGZxMzRpL29UekVYME00NlVVbkVzekIwWW5TM1J3cWU1enYiLCJtYWMiOiJhZjIxM2M4MTAxNWI0YTlkYjAzYWZlZTgzNjUxNDRhMDVkODVjMGRjNGUxMjQ2ZGQ2MmYxOTc3MTBlNmQ2ZTlhIiwidGFnIjoiIn0%3D",
    },
    data: {
      username: "MARTIN50",
      email: "info@martin50.com",
      phone: "+330439895649",
      password: "password",
      picture: "",
    },
  };
  try {
    const response = await axios(config);
    console.log(100, response.data);
    return response.data;
  } catch (error) {
    console.error(error);
    return error;
  }
}
export async function loginUser(email, password) {
  var config = {
    method: "post",
    url: "http://127.0.0.1:8000/login",
    headers: {
      "Content-Type": "application/json",
      Accept: "application/json",
      Authorization: "Bearer 18|IN9R0BdpOttnXX80bVxZbg4Rx6tQuBSnOZRVxhXl",
    },
    data: {
      email: email,
      password: password,
    },
  };
  try {
    const response = await axios(config);
    console.log(101, response.data);
    return response.data;
  } catch (error) {
    console.error(error);
    return error;
  }
}
// **************
// REVIEWS
// **************
export async function getAllReviews() {
  var config = {
    method: "get",
    url: "http://127.0.0.1:8000/reviews/index",
    headers: {
      "Content-Type": "application/json",
      Accept: "application/json",
      Authorization: "Bearer 18|IN9R0BdpOttnXX80bVxZbg4Rx6tQuBSnOZRVxhXl",
    },
  };
  try {
    const response = await axios(config);
    return response.data;
  } catch (error) {
    return error;
  }
}
export async function getReviewsByPlaceId(id) {
  var config = {
    method: "get",
    url: "http://127.0.0.1:8000/reviews/place/" + id,
    headers: {
      "Content-Type": "application/json",
      Accept: "application/json",
      Authorization: "Bearer 18|IN9R0BdpOttnXX80bVxZbg4Rx6tQuBSnOZRVxhXl",
    },
  };
  try {
    const response = await axios(config);
    return response.data;
  } catch (error) {
    return error;
  }
}
export async function addReview(title, content, rate, place_id) {
  var config = {
    method: "post",
    url: "http://127.0.0.1:8000/reviews/create",
    headers: {
      "Content-Type": "application/json",
      Accept: "application/json",
      Authorization: "Bearer 18|IN9R0BdpOttnXX80bVxZbg4Rx6tQuBSnOZRVxhXl",
    },
    data: {
      title: title,
      content: content,
      rate: rate,
      user_id: 1,
      place_id: place_id,
    },
  };
  try {
    const response = await axios(config);
    return response.data;
  } catch (error) {
    console.error(error);
    return error;
  }
}
export async function averageRateByPlaceId(id) {
  var config = {
    method: "get",
    url: "http://127.0.0.1:8000/dashboard/place/rateav/" + id,
    headers: {
      "Content-Type": "application/json",
      Accept: "application/json",
      Authorization: "Bearer 18|IN9R0BdpOttnXX80bVxZbg4Rx6tQuBSnOZRVxhXl",
    },
  };
  try {
    const response = await axios(config);
    return response.data;
  } catch (error) {
    return error;
  }
}
// **************
// CATEGORIES
// **************
export async function getAllCategories() {
  var config = {
    method: "get",
    url: "http://127.0.0.1:8000/categories/index",
    headers: {
      "Content-Type": "application/json",
      Accept: "application/json",
      Authorization: "Bearer 18|IN9R0BdpOttnXX80bVxZbg4Rx6tQuBSnOZRVxhXl",
    },
  };
  try {
    const response = await axios(config);
    return response.data;
  } catch (error) {
    return error;
  }
}
// **************
// EVENTS
// **************
export async function getAllEvents(page = null, limit = null) {
  var config = {
    method: "get",
    url:
      "http://127.0.0.1:8000/events/index" +
      "?page=" +
      page +
      "&limit=" +
      limit,
    headers: {
      "Content-Type": "application/json",
      Accept: "application/json",
      Authorization: "Bearer 18|IN9R0BdpOttnXX80bVxZbg4Rx6tQuBSnOZRVxhXl",
    },
  };
  try {
    const response = await axios(config);
    return response.data;
  } catch (error) {
    return error;
  }
}
// **************
// PLACES
// **************
export async function getAllPlaces() {
  var config = {
    method: "get",
    url: "http://127.0.0.1:8000/places/index",
    headers: {
      "Content-Type": "application/json",
      Accept: "application/json",
      Authorization: "Bearer 18|IN9R0BdpOttnXX80bVxZbg4Rx6tQuBSnOZRVxhXl",
    },
  };
  try {
    const response = await axios(config);
    return response.data;
  } catch (error) {
    return error;
  }
}
export async function getPlaceById(id) {
  var config = {
    method: "get",
    url: "http://127.0.0.1:8000/places/" + id,
    headers: {
      "Content-Type": "application/json",
      Accept: "application/json",
      Authorization: "Bearer 18|IN9R0BdpOttnXX80bVxZbg4Rx6tQuBSnOZRVxhXl",
    },
  };
  try {
    const response = await axios(config);
    return response.data;
  } catch (error) {
    return error;
  }
}
export async function getAllSchools(page = null, limit = null) {
  var config = {
    method: "get",
    url:
      "http://127.0.0.1:8000/places/schools" +
      "?page=" +
      page +
      "&limit=" +
      limit,
    headers: {
      "Content-Type": "application/json",
      Accept: "application/json",
      Authorization: "Bearer 18|IN9R0BdpOttnXX80bVxZbg4Rx6tQuBSnOZRVxhXl",
    },
  };
  try {
    const response = await axios(config);
    return response.data;
  } catch (error) {
    return error;
  }
}
export async function getAllCompanies(page = null, limit = null) {
  var config = {
    method: "get",
    url:
      "http://127.0.0.1:8000/places/companies" +
      "?page=" +
      page +
      "&limit=" +
      limit,
    headers: {
      "Content-Type": "application/json",
      Accept: "application/json",
      Authorization: "Bearer 18|IN9R0BdpOttnXX80bVxZbg4Rx6tQuBSnOZRVxhXl",
    },
  };
  try {
    const response = await axios(config);
    return response.data;
  } catch (error) {
    return error;
  }
}
export async function getAllCoworkings(page = null, limit = null) {
  var config = {
    method: "get",
    url:
      "http://127.0.0.1:8000/places/coworkings" +
      "?page=" +
      page +
      "&limit=" +
      limit,
    headers: {
      "Content-Type": "application/json",
      Accept: "application/json",
      Authorization: "Bearer 18|IN9R0BdpOttnXX80bVxZbg4Rx6tQuBSnOZRVxhXl",
    },
  };
  try {
    const response = await axios(config);
    return response.data;
  } catch (error) {
    return error;
  }
}
export async function getAllBars(page = null, limit = null) {
  var config = {
    method: "get",
    url:
      "http://127.0.0.1:8000/places/bars" + "?page=" + page + "&limit=" + limit,
    headers: {
      "Content-Type": "application/json",
      Accept: "application/json",
      Authorization: "Bearer 18|IN9R0BdpOttnXX80bVxZbg4Rx6tQuBSnOZRVxhXl",
    },
  };
  try {
    const response = await axios(config);
    return response.data;
  } catch (error) {
    return error;
  }
}
export async function getAllShops(page = null, limit = null) {
  var config = {
    method: "get",
    url:
      "http://127.0.0.1:8000/places/shops" +
      "?page=" +
      page +
      "&limit=" +
      limit,
    headers: {
      "Content-Type": "application/json",
      Accept: "application/json",
      Authorization: "Bearer 18|IN9R0BdpOttnXX80bVxZbg4Rx6tQuBSnOZRVxhXl",
    },
  };
  try {
    const response = await axios(config);
    return response.data;
  } catch (error) {
    return error;
  }
}

import { createRouter, createWebHistory } from "vue-router";
import HomeView from "../views/HomeView.vue";
import UserView from "../views/UserView.vue";
import ReviewView from "../views/ReviewView.vue";
import CategoryView from "../views/CategoryView.vue";
import EventView from "../views/EventView.vue";
import PlaceView from "../views/PlaceView.vue";
import AllSchoolsView from "../views/AllSchoolsView.vue";
import AllCompaniesView from "../views/AllCompaniesView.vue";
import AllBarsView from "../views/AllBarsView.vue";
import AllShopsView from "../views/AllShopsView.vue";
import AllCoworkingsView from "../views/AllCoworkingsView.vue";
import PlaceInfoView from "../views/PlaceInfoView.vue";

const routes = [
  {
    path: "/",
    name: "home",
    component: HomeView,
  },
  {
    path: "/about",
    name: "about",
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () =>
      import(/* webpackChunkName: "about" */ "../views/AboutView.vue"),
  },
  {
    path: "/users",
    name: "users",
    component: UserView,
  },
  {
    path: "/reviews",
    name: "reviews",
    component: ReviewView,
  },
  {
    path: "/categories",
    name: "categories",
    component: CategoryView,
  },
  {
    path: "/events",
    name: "events",
    component: EventView,
  },
  {
    path: "/places",
    name: "places",
    component: PlaceView,
  },
  {
    path: "/signin",
    name: "signin",
    component: () => import("../views/Signin.vue"),
  },
  {
    path: "/signup",
    name: "signup",
    component: () => import("../views/Signup.vue"),
  },
  {
    path: "/forgotpass",
    name: "forgotpass",

    component: () => import("../views/Forgotpass.vue"),
  },
  {
    path: "/place/1",
    name: "Ecole",
    component: AllSchoolsView,
  },
  {
    path: "/place/2",
    name: "Entreprises",
    component: AllCompaniesView,
  },
  {
    path: "/place/4",
    name: "Bars",
    component: AllBarsView,
  },
  {
    path: "/place/3",
    name: "Coworking",
    component: AllCoworkingsView,
  },
  {
    path: "/place/5",
    name: "Magasins",
    component: AllShopsView,
  },
  {
    path: "/places/:id",
    name: "PlaceInfoView",
    component: PlaceInfoView,
    props: true,
  },
];
const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
});
export default router;

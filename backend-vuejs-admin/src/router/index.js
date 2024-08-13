import { createRouter, createWebHistory } from "vue-router";
import AppLayout from "../components/AppLayout.vue";
import Dashboard from "../views/Dashboard.vue";
import NotFound from "../views/NotFound.vue";
import Products from "../views/Product/Products.vue";
import Login from "../views/Login.vue";
import RequestPassword from "../views/RequestPassword.vue";
import ResetPassword from "../views/ResetPassword.vue";
import store from "../store";

const routes = [
    {
        path: "/app",
        name: "app",
        component: AppLayout,
        meta: {
            requiresAuth: true,
        },
        children: [
            {
                path: "dashboard",
                name: "app.dashboard",
                component: Dashboard,
            },
            {
                path: "products",
                name: "app.products",
                component: Products,
            },
        ],
    },
    {
        path: "/login",
        name: "login",
        meta: {
            requiresGuest: true,
        },
        component: Login,
    },
    {
        path: "/request-password",
        name: "requestPassword",
        meta: {
            requiresGuest: true,
        },
        component: RequestPassword,
    },
    {
        path: "/reset-password/:token",
        name: "resetPassword",
        meta: {
            requiresGuest: true,
        },
        component: ResetPassword,
    },
    {
        path: "/:pathMatch(.*)",
        name: "notfound",
        component: NotFound,
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

router.beforeEach((to, from, next) => {
    if (to.meta.requiresAuth && !store.state.user.token) {
        next({ name: "login" });
    } else if (to.meta.requiresGuest && store.state.user.token) {
        next({ name: "app.dashboard" });
    } else {
        next();
    }
});
export default router;

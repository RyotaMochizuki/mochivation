//import {createRouter, createWebHistory} from "vue-router";
import Vue from 'vue';
import Router from 'vue-router';

import SetGoalComponent from "./components/SetGoalComponent";
import RegisterComponent from "./components/RegisterComponent";
import EditComponent from "./components/EditComponent";
import DeleteComponent from "./components/DeleteComponent";
import AchieveComponent from "./components/AchieveComponent";
import TopComponent from "./components/TopComponent";
import RegisterAchieveComponent from "./components/RegisterAchievementComponent";

Vue.use(Router);
const routes = [
    {
        path: '/setGoal',
        name: 'setGoal',
        component: SetGoalComponent,
        props: true
      },
      {
        path: '/',
        name: 'top',
        component: TopComponent,
        props: true
      },
      {
        path: '/register',
        name: 'register',
        component: RegisterComponent,
        props: true
      },
      {
        path: '/edit',
        name: 'edit',
        component: EditComponent,
        props: true
      },
      {
        path: '/delete',
        name: 'delete',
        component: DeleteComponent,
        props: true
      },
      {
        path: '/achieve',
        name: 'achieve',
        component: AchieveComponent,
        props: true
      },
      {
        path: '/registerAchieve',
        name: 'registerAchieve',
        component: RegisterAchieveComponent,
        props: true
      },
    
]

/**const router = createRouter({
    history: createWebHistory(),
    routes
})
*/
const router = new Router({routes : routes});

export default router
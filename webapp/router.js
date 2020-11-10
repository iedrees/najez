import Vue from 'vue'
import VueRouter from 'vue-router'
Vue.use(VueRouter)

const routes = [
    { 
        name: 'home', 
        path: '/', 
        component: require('./components/Pages/Home').default
    }, 
    { 
        name: 'media', 
        path: '/media', 
        component: require('./components/Pages/Media').default
    }, 
    { 
        name: 'profiles', 
        path: '/profiles', 
        component: require('./components/Pages/Profiles').default
    }, 
    { 
        name: 'settings', 
        path: '/settings', 
        component: require('./components/Pages/Settings').default
    }, 
    { 
        name: 'myProfile', 
        path: '/my-profile', 
        component: require('./components/Pages/MyProfile').default
    }, 

    { 
        name: 'showProfile', 
        path: '/profiles/:id', 
        component: require('./components/Profile/ShowProfile').default
    }, 
    { 
        path: '/projects/:id', 
        component: require('./components/Project/ProjectLayout').default,
        props: true, 
        children: [
            {
                name: 'projectIndex', 
                path: '/', 
                component: require('./components/Project/ProjectIndex').default,  
            },
            {
                name: 'projectTeam', 
                path: 'team', 
                component: require('./components/Project/ProjectTeam').default,  
            },
            {
                name: 'projectSettings', 
                path: 'settings', 
                component: require('./components/Project/ProjectSettings').default,  
            },
        ]
    },
    { path: '*', component: require('./components/Layouts/NotFound').default  }
];
   
export default new VueRouter({
    routes,
    base: '/app',
    mode: 'history',

    scrollBehavior(to, from, savedPosition) {
        if (savedPosition) {
            return savedPosition
        } else {
            return {
                x: 0,
                y: 0
            }
        }
    },
})


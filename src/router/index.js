import Vue from 'vue'
import VueRouter from 'vue-router'


// client
import clienthome from '../pages/client/home.vue'
import clientabout from '../pages/client/about.vue'
import clientcontact from '../pages/client/contact.vue'
import clientLogin from '../pages/client/login.vue'
import clientSetting from '../pages/client/setting.vue'
//////////////////////////////////////////////////////////////////////////////////////////////////////////////






// dashboard
import dashboardhome from '../pages/dashboard/home.vue'
import dashboardauth_login from '@/pages/dashboard/auth/login.vue'
import dashboardauth_forget from '@/pages/dashboard/auth/forget.vue'
import dashboardauth_reset from '@/pages/dashboard/auth/reset.vue'
import users from '@/pages/dashboard/users.vue'
import dashboardprofile from '@/pages/dashboard/profile.vue'

import setting_appearances from '../pages/dashboard/setting/appearances.vue'
import setting_metas from '@/pages/dashboard/setting/metas.vue'
import setting_socials from '@/pages/dashboard/setting/socials.vue'
import setting_contacts from '@/pages/dashboard/setting/contacts.vue'





import notFound from '@/pages/404.vue'
Vue.use(VueRouter)



const routes = [
  {
    path: '*',
    name: 'notFound',
    component: notFound,
    meta: {
      hideNavbar: true,
     }
  },
  








  

  // dashboard
  {
    path: '/dashboard/home',
    name: 'DashboardHome',
    component: dashboardhome,
    meta: {
      hideNavbar: true,
     }
  },
  {
    path: '/dashboard/',
    name: 'DashboardRootHome',
    component: dashboardhome,
    meta: {
      hideNavbar: true,
     }
  },
  {
    path: '/dashboard/auth/login',
    name: 'DashboardAuthLogin',
    component: dashboardauth_login,
    meta: {
      hideNavbar: true,
     }
  },
  {
    path: '/dashboard/auth/forget',
    name: 'DashboardAuthForget',
    component: dashboardauth_forget,
    meta: {
      hideNavbar: true,
     }
  },
  {
    path: '/dashboard/auth/reset',
    name: 'DashboardAuthReset',
    component: dashboardauth_reset,
    meta: {
      hideNavbar: true,
     }
  },
  {
    path: '/dashboard/profile',
    name: 'DashboardProfile',
    component: dashboardprofile,
    meta: {
      hideNavbar: true,
     }
  },
  {
    path: '/dashboard/users',
    name: 'DashboardUsers',
    component: users,
    meta: {
      hideNavbar: true,
     }
  },
  {
    path: '/dashboard/setting/appearances',
    name: 'DashboardSettingAppearances',
    component: setting_appearances,
    meta: {
      hideNavbar: true,
     }
  },
  {
    path: '/dashboard/setting/metas',
    name: 'DashboardSettingMetas',
    component: setting_metas,
    meta: {
      hideNavbar: true,
     }
  },
  {
    path: '/dashboard/setting/socials',
    name: 'DashboardSettingSocials',
    component: setting_socials,
    meta: {
      hideNavbar: true,
     }
  },
  {
    path: '/dashboard/setting/contacts',
    name: 'DashboardSettingContacts',
    component: setting_contacts,
    meta: {
      hideNavbar: true,
     }
  },







// client
  {
    path: '/',
    name: 'ClientHome',
    component: clienthome
  },
  {
    path: '/about',
    name: 'ClientAbout',
    component:clientabout
  },
  {
    path: '/contact',
    name: 'ClientContact',
    component:clientcontact
  },
  {
    path: '/login',
    name: 'clientLogin',
    component:clientLogin
  }, 
  {
    path: '/setting',
    name: 'clientSetting',
    component:clientSetting
  }, 
  








]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router

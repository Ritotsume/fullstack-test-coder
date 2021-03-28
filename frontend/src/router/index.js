import Vue from 'vue'
import VueRouter from 'vue-router'
import AllPosts from '@/views/AllPosts'

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'Home',
    component: AllPosts,
    meta: {
      title: 'Todas as postagens'
    }
  },
  {
    path: '/posts',
    name: 'Posts',
    component: () => import(/* webpackChunkName: "posts" */ '@/views/AllPosts'),
    meta: {
      title: 'Todas as postagens'
    }
  },
  {
    path: '/posts/:post',
    name: 'SinglePost',
    component: () => import(/* webpackChunkName: "singlepost" */ '@/views/SinglePost'),
    props: true
  },
  {
    path: '/contato',
    name: 'Contact',
    component: () => import(/* webpackChunkName: "contact" */ '@/views/Contact'),
    meta: {
      title: 'Contato'
    }
  }
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  scrollBehavior() {
    return {
      x: 0,
      y: 0
    }
  },
  routes
})

router.afterEach((to) => {
  Vue.nextTick(() => {
    window.document.title = to.meta && to.meta.title ? to.meta.title : 'Juvenal Feed'
  })
})

export default router

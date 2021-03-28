<template>
  <div id="app" class="container">
    <navbar />
    <router-view/>
    <Footer />
    <div class="background"></div>
  </div>
</template>

<script>
import Navbar from './components/Navbar'
import Footer from './components/Footer'

export default {
  name: 'App',
  components: {
    Navbar,
    Footer,
  }
}
</script>

<style>
body {
  padding-top: 60px;
}
div.background {
  position: fixed;
  height: 100%;
  width: 100%;
  top: 0;
  left: 0;
  z-index: -1;
  background: rgb(0,36,30);
  background: linear-gradient(90deg, rgba(0,36,30,1) 0%, rgba(9,121,98,1) 35%, rgba(9,121,98,1) 65%, rgba(0,36,30,1) 100%); 
}
</style>

<template>
  <b-navbar toggleable="lg" type="dark" variant="dark" fixed="top">
    <div class="container">
      <b-navbar-brand href="/">Juvenal Feed</b-navbar-brand>

      <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>
      <b-collapse id="nav-collapse" is-nav>

        <b-navbar-nav class="ml-auto">
          <b-navbar-nav right>
            <b-nav-item href="/posts">Blog</b-nav-item>
            <b-nav-item href="/contato">Contato</b-nav-item>
          </b-navbar-nav>
        </b-navbar-nav>

      </b-collapse>
    </div>
  </b-navbar>
</template>

<script>
export default {
  name: "Navbar",
};
</script>

<style lang="css" scoped>
nav.navbar {
  background: rgb(0,36,30);
  background: linear-gradient(90deg, rgba(0,36,30,1) 0%, rgba(9,121,98,1) 35%, rgba(9,121,98,1) 65%, rgba(0,36,30,1) 100%);
}
</style>

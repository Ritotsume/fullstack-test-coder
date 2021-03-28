<template>
  <div class="row">

      <div class="col-lg-12 text-dark card">

        <h1 class="mt-4">{{ post.title }}</h1>

        <p class="created">Criado {{ post.created_at | formatDate('LLLL') }}</p>

        <img class="img-fluid rounded" :src="post.image" :alt="post.title">

        <p class="lead">
          {{ post.excerpt }}
        </p>
        <div v-html="post.body"></div>

      </div>

    </div>
</template>

<script>
import axios from 'axios'

export default {
  name: 'SinglePost',
  data() {
    return {
      post: ''
    }
  },
  created() {
    let slug = this.$route.params.post

    // insira aqui a url correta antes do deploy...
    axios.get(`http://127.0.0.1:8000/api/posts/${slug}`).then(res => {
      this.post = res.data
      window.document.title = res.data.title
    })
  }
}
</script>

<style scoped>
img.img-fluid {
  margin-bottom: 50px;
}
p.created {
  margin-bottom: 30px;
}
div.card {
  padding: 2em 1.5em;
}
</style>
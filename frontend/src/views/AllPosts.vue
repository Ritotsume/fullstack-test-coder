<template>
  <div class="row">
    <div class="col-md-12">
      <h1 class="my-4 text-light">Cuidado ao ler esse conteúdo!</h1>
      <p>
        <small class="text-light">
          Pode conter spoilers (final da novela, do filme, sei lá...)
        </small>
      </p>

      <div class="row" v-if="posts && posts.length > 0">
        <div class="col-md-4" v-for="(post, index) in posts" :key="index">
          <div class="card mb-4">
            <img class="card-img-top" :src="post.image" :alt="post.title" />
            <div class="card-body">
              <h2 class="card-title">{{ post.title }}</h2>
              <p class="card-text">{{ post.excerpt }}</p>
              <router-link
                :to="{ name: 'SinglePost', params: { post: post.slug } }"
                class="btn btn-success"
              >Saiba mais &rarr;</router-link>
            </div>
            <div class="card-footer text-muted">
              Criado em {{ post.created_at | formatDate("LLL") }}
            </div>
          </div>
        </div>
      </div>
      <div class="row" v-else>
        <div class="col-md-12 no-posts text-light">
          É! Parace que o Juvenal não postou nada ainda. Talvez alguém deva fazer isso...
        </div>
      </div>

      <div class="row" v-if="loadMore">
        <div class="col-sm-12 text-center">
          <a href="#" class="btn btn-success" @click="loadMorePosts" role="button">Mostrar mais</a>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  name: "AllPosts",
  data() {
    return {
      posts: [],
      loadMore: true,
      after: null,
    };
  },
  methods: {
    loadMorePosts(e) {
      e.preventDefault()

      if(this.after) {
        // insira a url correta da aplicação antes do deploy...
        axios.get('http://127.0.0.1:8000/api/posts', {
          params: {
            page: this.after.slice(-1)
          }
        })
        .then(res => {
          this.posts = this.posts.concat(res.data.data)
          this.after = res.data.next_page_url ? res.data.next_page_url : null
        })
        .catch(() => {
          this.loadMore = false
        })
        .finally(() => {
          this.loadMore = this.after ? true : false
        })
      }
    }
  },
  created() {
    // insira a url correta da aplicação antes do deploy...
    axios.get("http://127.0.0.1:8000/api/posts").then((res) => {
      this.posts = res.data.data
      this.after = res.data.next_page_url
    }).finally(() => {
      this.loadMore = this.after ? true : false
    })
  },
};
</script>

<style scoped>
div.no-posts {
  min-height: 200px;
}
</style>

<template>
  <div class="row">
    <div class="col-md-12 card">
      <p>
        <small class="text-muted"
          >* Todos os campos são de preenchimento obrigatório.</small
        >
      </p>
      <form
        class="contact-form c-mb-15 c-gutter-15"
        method="post"
        @submit.prevent="formSubmit"
      >
        <div class="form-group">
          <label for="name">Nome</label>
          <input
            type="text"
            name="name"
            class="form-control"
            id="name"
            placeholder="Seu nome completo..."
            v-model="fields.name"
            required
          />
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input
            type="email"
            name="email"
            class="form-control"
            id="email"
            placeholder="Seu email"
            v-model="fields.email"
            required
          />
        </div>
        <div class="form-group">
          <label for="phone">Telefone</label>
          <input
            type="tel"
            name="phone"
            class="form-control"
            id="phone"
            placeholder="(99) 99999-9999"
            v-model="fields.phone"
            v-mask="'(##) #####-####'"
            required
          />
        </div>
        <div class="form-group">
          <label for="subject">Assunto</label>
          <input
            type="text"
            name="subject"
            class="form-control"
            id="subject"
            placeholder="Assunto"
            v-model="fields.subject"
            required
          />
        </div>
        <div class="form-group">
          <label for="message">Mensagem</label>
          <textarea
            class="form-control"
            id="message"
            name="message"
            rows="10"
            placeholder="Sua mensagem..."
            v-model="fields.message"
            required
          ></textarea>
          <small id="emailHelp" class="form-text text-muted"
            >We'll never share your email with anyone else.</small
          >
        </div>
        <button type="submit" class="btn btn-success">Enviar</button>
      </form>
    </div>

    <div>
      <b-modal id="responseModal" centered title="Contato Juvenal" ok-only ok-title="Fechar" ok-variant="secondary">
        <p class="my-4" v-if="response.success">{{ response.success }}</p>
        <p class="my-4" v-else>
          <span class="inline" v-for="(err,index) in response.errors" :key="index">
            <span class="inline" v-for="(err1,index1) in err" :key="index1">&raquo; {{ err1 }}</span>
          </span>
        </p>
      </b-modal>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import { mask } from "vue-the-mask";

export default {
  name: "Contact",
  data() {
    return {
      fields: {
        name: "",
        email: "",
        phone: "",
        subject: "",
        message: "",
      },
      response: {},
    };
  },
  directives: {
    mask,
  },
  methods: {
    formSubmit() {
      // mudar pela url correta antes do deploy...
      axios
        .post("http://127.0.0.1:8000/api/contacts", this.fields)
        .then((res) => {
          this.fields = {};
          this.response = res.data;
          this.$bvModal.show('responseModal')
        })
        .catch((err) => {
          this.response = err.data;
          this.$bvModal.show('responseModal')
        });
    },
  },
};
</script>

<style scoped>
div.card {
  padding: 2em 1.5em;
}
span.inline {
  display: inline-block;
}
</style>
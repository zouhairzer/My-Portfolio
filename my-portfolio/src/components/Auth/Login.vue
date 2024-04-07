<template>
  <!-- Section: Design Block -->
  <section class="text-center">
    <!-- Background image -->
    <div class="p-5 bg-image" style="
          background-image: url('https://mdbootstrap.com/img/new/textures/full/171.jpg');
          height: 300px;
          "></div>
    <!-- Background image -->

    <div class="container-fluid">
      <div class="card mx-4 mx-md-5 shadow-5-strong" style="
            margin-top: -100px;
            background: hsla(0, 0%, 100%, 0.8);
            backdrop-filter: blur(30px);
            ">
        <div class="card-body py-5 px-md-5">
          <div >
            <div class="row justify-content-center">
              <div class="col-md-8"> <!-- Utilisez col-md pour les tailles de laptops et au-dessus -->
                <h2 class="fw-bold mb-5">Sign In now</h2>
                <form @submit.prevent="login">
                  <!-- Email input -->
                  <div class="form-outline mb-4">
                      <label class="form-label" for="form3Example3">Email address</label>
                      <input type="email" v-model="email" id="form3Example3" class="form-control" />
                  </div>

                  <!-- Password input -->
                  <div class="form-outline mb-4">
                      <label class="form-label" for="form3Example4">Password</label>
                      <input type="password" v-model="password" id="form3Example4" class="form-control" />
                  </div>

                  <!-- Register buttons -->
                  <div class="form-check d-flex justify-content-center mb-4">
                    <router-link to="/register" class="form-check-label">
                      Create Account
                    </router-link>
                  </div>
                  <!-- Submit button -->
                  <button type="submit" class="btn btn-primary btn-block mb-4">
                    Sign up
                  </button>
                  <div class="form-check d-flex justify-content-center mb-4">
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import { ref } from 'vue';
import axios, { Axios } from 'axios';
import router from '../../router/index.js';

export default {
  data(){
    return {
      email: '',
      password: '',
      error: '',
    };
  },

  methods: {
    login() {
      var page = "http://127.0.0.1:8000/api/login";

      const userData = {
        email: this.email,
        password: this.password,
      }

      axios.post(page, userData)
        .then(response=>{
          console.log(response.data);
          this.result = response.data;

          router.push('/info');
          this.email = '';
          this.password = '';
        })
        .catch(error => {
          console.error('login failed', error);
          this.error = 'login failde. pleas try again';
        });
        
    }
  }

}
</script>
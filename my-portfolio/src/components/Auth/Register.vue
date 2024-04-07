<template>
  <!-- Section: Design Block -->
  <section class="text-center">
    <!-- Background image -->
    <div class="p-5 bg-image" style="
          background-image: url('https://mdbootstrap.com/img/new/textures/full/171.jpg');
          height: 300px;
          "></div>
    <!-- Background image -->

    <div class="card mx-4 mx-md-5 shadow-5-strong" style="
          margin-top: -100px;
          background: hsla(0, 0%, 100%, 0.8);
          backdrop-filter: blur(30px);
          ">
      <div class="card-body py-5 px-md-5">
        <div >
          <div class="row d-flex justify-content-center">
            <div class="col-lg-8">
              <h2 class="fw-bold mb-5">Sign up now</h2>
              <form @submit.prevent='register'>
                <!-- Name input -->
                <div class="form-outline mb-4">
                  <label class="form-label" for="form3Example1">Name</label>
                  <input type="text" v-model='name' id="form3Example1" class="form-control" />
                </div>

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

                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-block mb-4">
                  Sign up
                </button>

                <!-- Register buttons -->
                <div class="text-center">
                  <p>or <router-link to="/">sign In</router-link></p>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
  import { ref } from 'vue'; //In Vue.js, a key feature is its reactivity system, which means that when the data changes, the corresponding parts of the user interface are automatically updated to reflect those changes.
  import axios from 'axios';
  import router from '../../router/index.js';

  export default {
    data() { //fonction prédéfini le travail de DOM 
      return {
        name: '',
        email: '',
        password: '',
      };
    },
    methods: {
      register() {
        var page = "http://127.0.0.1:8000/api/register";

        // Prepare data to send in the request body

        const userData = {
          name: this.name,
          email: this.email,
          password: this.password,
        }
        axios.post(page, userData)
          .then(response=>{
           
            console.log(response.data);
            this.result = response.data;


            router.push('/');
            this.name= '';
            this.email= '';
            this.password= '';
          })
          .catch(error => {
            console.error('Registration failed:', error);
            this.error = 'Registration failed. Please try again.';
          });
          
      }
    }
  }
</script>

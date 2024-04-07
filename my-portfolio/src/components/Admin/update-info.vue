<template>
    <div class="cont">
        <form class="form-container" @submit.prevent="updateInfo">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" v-model="name" class="form-control" id="name" aria-describedby="nameHelp">
            </div>
            <div class="mb-3">
                <label for="prenom" class="form-label">Prenom</label>
                <input type="text" v-model="prenom" class="form-control" id="prenom" aria-describedby="prenomHelp">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" v-model="email" class="form-control" id="email" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="numero" class="form-label">Numero</label>
                <input type="tel" v-model="numero" class="form-control" id="numero" aria-describedby="numeroHelp">
            </div>
            <div class="mb-3">
                <label for="adresse" class="form-label">Adresse</label>
                <input type="text" v-model="adresse" class="form-control" id="adresse">
            </div>
            <div class="mb-3">
                <label for="date" class="form-label">Date</label>
                <input type="text" v-model="date" class="form-control" id="date">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</template>

<script>
import axios from 'axios';
import router from '../../router/index.js';

export default {
    data() {
        return {
            name:'',
            prenom:'',
            email:'',
            numero:'',
            adresse:'',
            date:'',
            id:'',
        };
    },
    mounted() {
        this.id = this.$route.params.id; // Fetch the ID from route parameters
        this.fetchInfo(this.id); // Fetch existing information using the ID
    },

    methods: {
        fetchInfo(id) {
      axios.get(`http://127.0.0.1:8000/api/get-info/${id}`)
        .then(response => {
          const info = response.data;
          // Populate form fields with existing information
          this.name = info.name;
          this.prenom = info.prenom;
          this.email = info.email;
          this.numero = info.numero;
          this.adresse = info.adresse;
          this.date = info.date;
        })
        .catch(error => {
          console.error('Error fetching information:', error);
        });
    },

        updateInfo() {
            var page = `http://127.0.0.1:8000/api/update-info/${this.id}`;

            const infoData = {
                name   : this.name,  
                prenom : this.prenom,
                email  : this.email, 
                numero : this.numero,
                adresse: this.adresse,
                date   : this.date,
            }
            axios.put(page, infoData)
            .then(response => {
                console.log('Information updated successfully:', response.data);
                router.push('/info');
            })
            .catch(error => {
                console.error('Error updating information:', error);
            });
        }
    }
}
</script>
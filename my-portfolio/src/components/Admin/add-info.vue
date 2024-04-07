<template>
    <div class="cont">
        <form class="form-container" @submit.prevent="addInfo">
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


<style>
.cont {
    display: flex;
    justify-content: center;
    align-items: center;
}

.form-container {
    width: 60%; 
    padding: 20px;
    background-color: #f9f9f9;
    border-radius: 10px;
}

.form-label {
    font-weight: bold;
}

.form-control {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
}

.btn {
    width: 100%;
    padding: 10px;
    background-color: #007bff;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.btn:hover {
    background-color: #0056b3;
}
</style>

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

    methods: {
        addInfo() {
            var page = "http://127.0.0.1:8000/api/add-info";

            const infoData = {
                name   : this.name,  
                prenom : this.prenom,
                email  : this.email, 
                numero : this.numero,
                adresse: this.adresse,
                date   : this.date,
            }

            axios.post(page, infoData)
                .then(response => {
                    console.log(response.data);
                    this.result = response.data;

                    router.push('/info');

                    this.name   = '';
                    this.prenom = '';
                    this.email  = '';
                    this.numero = '';
                    this.adresse = '';
                    this.date   = '';
            })
            .catch(error=>{
                console.error('the operation is failed', error);
                this.error = 'try again';
            })
        }
    }
}
</script>
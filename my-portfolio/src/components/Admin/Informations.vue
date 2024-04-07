<template>
  <div class="container">
  <router-link to="/add_info" type="button" class="btn btn-warning mb-5">Add Informations</router-link>
  <div class="table-responsive">
    <table class="table table-bordered border-primary">
  <thead>
    <tr>
      <th scope="col">name</th>
      <th scope="col">prenom</th>
      <th scope="col">email</th>
      <th scope="col">numero</th>
      <th scope="col">adresse</th>
      <th scope="col">date</th>
      <th scope="col">Action</th>
      <th scope="col">Action</th>
      
    </tr>
  </thead>
  <tbody>
    <tr v-for="info in infos" :key="info.id">
      <!-- <td>{{info._id}}</td> -->
      <th>{{info.name }}</th>
      <td>{{info.prenom }}</td>
      <td>{{info.email  }}</td>
      <td>{{info.numero}}</td>
      <td>{{info.adresse}}</td>
      <td>{{info.date}}</td>
      <td><p style="color: red; cursor: pointer" @click="deleteInfo(info._id)">Delete</p></td>
      <td><router-link :to="'/update_info/' + info._id">Update</router-link></td>
    </tr>
  </tbody>
</table>
</div>
</div>
</template>

<script>
import axios from 'axios';
import route from '../../router/index.js';
import { RouterLink } from 'vue-router';

export default {
  data(){
    return {
      infos: []
    
    };
  },

  mounted() {
    const id = this.$route.params.id;
    this.fetchInfos();
  },

  methods: {
    fetchInfos(id) {
      axios.get('http://127.0.0.1:8000/api/get-info')
        .then(response => {
          this.infos = response.data;
          console.log('Data:', this.infos);
        })
        .catch(error => {
          console.error('Error fetching information:', error);
        });
    },

    deleteInfo(id) {
      axios.delete(`http://127.0.0.1:8000/api/delete-info/${id}`, {
        data: { id: id }
      })
      .then(response => {
        console.log(response.data);
        this.infos = this.infos.filter(info => info._id !== id);
      })
      .catch(error => {
        console.error('Error deleting information:', error);
      });
    }
  }
}
</script>
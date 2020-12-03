<template>
  <div>
    <div class="title m-b-md">
                Pizzas
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Description</th>
                        <th>Photo</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="pizza in pizzas" :key="pizza.id">
                        <td>{{ pizza.id }}</td>
                        <td>{{ pizza.name }}</td>
                        <td>{{ pizza.price }}</td>
                        <td>{{ pizza.description }}</td>
                        <td><a href='#' target="_blank">Click to view</a></td>
                        <td><a href='#' @click="item = 1" class="btn btn-outline-danger">Sterge</a> <a href='#' @click="item = 2"  class="btn btn-outline-primary">Editeaza</a> <a href='#' @click="item = 3"  class="btn btn-outline-info">Detalii</a></td>
                        <!-- <td><a href='{{asset("pizzas/$pizza->image")}}' target="_blank">Click to view</a></td>
                        <td><a href='/pizzas/delete/{{$pizza->id}}' @click="item = 1" class="btn btn-outline-danger">Sterge</a> <a href='/pizzas/edit/{{$pizza->id}}' @click="item = 2"  class="btn btn-outline-primary">Editeaza</a> <a href='/pizzas/details/{{$pizza->id}}' @click="item = 3"  class="btn btn-outline-info">Detalii</a></td> -->
                    </tr>
                </tbody>
            </table> <hr>
  </div>
</template> 
 
<script>
export default {
    data:function() {
        return{
            item: 1,
            pizzas: []
        }
    },
    methods: {
        getData() {
            axios.get('./pizzasData').then((res) =>{
                    this.pizzas = res.data;
            }).catch((error) => {
                console.log(error);
            })
        },
    },
    mounted() {
        this.getData();
    }
}
</script>
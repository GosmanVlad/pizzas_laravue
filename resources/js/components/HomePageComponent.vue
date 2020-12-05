<template>
  <div>
    <div v-if="item == 1">
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
                    <td><a v-bind:href="`pizzas/`+pizza.image" target="_blank">Click to view</a></td>
                    
                    <td><button v-if="getRangID" v-on:click="deleteTodo(pizza)" class="btn btn-outline-danger">Sterge</button> 
                        <button @click="item = 3;pizzaDetailsID=pizza.id"  class="btn btn-outline-primary">Detalii</button> 
                        <button v-if="getRangID" @click="item = 4;pizzaDetailsID=pizza.id"  class="btn btn-outline-info">Editeaza</button>
                    </td>
                    <!-- <td><a href='{{asset("pizzas/$pizza->image")}}' target="_blank">Click to view</a></td>
                    <td><a href='/pizzas/delete/{{$pizza->id}}' @click="item = 1" class="btn btn-outline-danger">Sterge</a> <a href='/pizzas/edit/{{$pizza->id}}' @click="item = 2"  class="btn btn-outline-primary">Editeaza</a> <a href='/pizzas/details/{{$pizza->id}}' @click="item = 3"  class="btn btn-outline-info">Detalii</a></td> -->
                </tr>
            </tbody>
        </table> <hr>
        <button v-if="getRangID" @click="item=5" class="btn btn-primary btn-lg btn-block">Add a new pizza</button>
    </div>
    <div v-else-if="item==3">
        <pizzadetails :pizzaDetailsID="pizzaDetailsID"></pizzadetails><hr>
        <button @click="item=1" class="btn btn-success btn-lg btn-block">Back</button>
    </div>
    <div v-else-if="item==4">
        <pizzaedit :pizzaDetailsID="pizzaDetailsID"></pizzaedit><hr>
        <button @click="item=1" class="btn btn-success btn-lg btn-block">Back</button>
    </div>
    <div v-else-if="item==5">
        <addpage></addpage><hr>
        <button @click="item=1" class="btn btn-primary">Back</button>
    </div>
  </div>
</template> 
 
<script>
import DetailsPageComponent from "./DetailsPageComponent";
import EditPageComponent from "./EditPageComponent";
export default {
    props: ['rangid'],
    
    data:function() {
        return{
            item: 1,
            pizzaDetailsID: 0,
            pizzas: [],
        }
    },
    components: {
        DetailsPageComponent,
    },
    computed: {
        getRangID: function() {
            return this.rangid;
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
         deleteTodo(e){
            let data = new FormData();
            data.append('_method', 'DELETE')
            axios.post('./pizzasData/'+e.id, data).then((res) =>{
                this.pizzas = res.data
            }).catch((error) => {
                console.log("Error");
            })
        },
    },
    mounted() {
        this.getData();
    }
}
</script>
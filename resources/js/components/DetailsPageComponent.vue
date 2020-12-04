<template>
  <div>
    <div class="content">
        <div class="title m-b-md">
            {{ pizza.name }}
        </div>

        <div class="centerText">
            <img v-bind:src="`/pizzas/` + pizza.image"> <br>
            <strong>{{pizza.name}}</strong> <br>
            {{pizza.description}} <br>
            <strong>Pret:</strong> {{pizza.price}}<strong style="color:#098E05;">RON</strong> <br>
        </div>
    </div>
</div>
</template> 
 
<script>
import HomePageComponent from "./HomePageComponent";
export default {
    props:['pizzaDetailsID'],
    data:function() {
        return{
            item: 1,
            pizza: []
        }
    },
    components: {
        HomePageComponent,
    },
    mounted() {
        let data = new FormData();
        data.append('_method', 'GET');
        axios.get('/pizzas/find/'+this.pizzaDetailsID, data).then((res) => {
            this.pizza = res.data
        }).catch((error) => {
            console.log("error");
        })
    },
}
</script>
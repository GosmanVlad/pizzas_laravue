<template>
  <div>
    <div class="content">
        <div class="title m-b-md">
            Edit ' {{ pizza.name }}' pizza
        </div>
        <div v-if="success" class="alert alert-success" role="alert">
            Actualizare reusita!
        </div>
        <a href="/home">Back to home</a><hr>
    </div>

    <div class="form">
    <div class="row">
        <div class="col-sm">
            <form @submit.prevent="submit" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name"  v-model="pizza.name">
                </div>

                <div class="form-group">
                    <label for="description">Descriere pizza</label><br>
                    <textarea rows="5" type="text" class="form-control" id="description" name="description" v-model="pizza.description"></textarea>
                </div>

                <div class="form-group">
                    <label for="image">Imagine</label><br>
                    <input type="text" class="form-control" id="image" name="image"  v-model="pizza.image">
                </div>

                <div class="form-group">
                    <label for="price">Pret</label><br>
                    <input type="text" id="price" name="price" v-model="pizza.price" class="form-control">
                </div><hr>

                <input type="submit" value="Editeaza" class="btn btn-outline-primary btn-block">
            </form>
        </div>
        <div class="col-sm">
        <img v-bind:src="`/images/` + pizza.image"> 
    </div></div>
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
            pizza: [],
            success: false,
        }
    },
    components: {
        HomePageComponent,
    },
    methods: {
        async submit() {
            const datas = new FormData();
            datas.append('name', this.pizza.name);
            datas.append('description', this.pizza.description);
            datas.append('image', this.pizza.image);
            datas.append('price', this.pizza.price);
            datas.append('_method', 'PATCH');
            axios.post('./pizzasData/'+this.pizza.id, datas)
                .then(
                    response => {
                        console.log("updated");
                        this.success = true;
                    }
                ).catch((error) => {
                        if (error.response) {
                            console.log(error.response.data.errors);
                            this.errors = error.response.data.errors;
                        } else {
                        }
                    });
        }
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
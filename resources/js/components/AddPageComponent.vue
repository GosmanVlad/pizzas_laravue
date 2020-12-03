<template>
  <div>
    <div class="title m-b-md">
      Add a new pizza
    </div>
    <hr>
    <div v-if="success" class="alert alert-success" role="alert">Inregistrare efectuata!</div>
    <div class="form">
      <form @submit.prevent="submit" enctype="multipart/form-data">
        <div class="row">
            <div class="col-sm">
                <div class="form-group">
                    <label for="name">Name</label><br>
                    <input v-model="name" type="text" id="name" name="name" class="form-control"><br>
                </div>
            </div>

            <div class="col-sm">
                <div class="form-group">
                    <label for="description">Description</label><br>
                    <input v-model="description" type="text" id="description" name="description" class="form-control"><br>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm">
                <div class="form-group">
                    <label for="image">Image</label><br>
                    <input v-model="image" type="text" id="image" name="image" class="form-control"><br>
                </div>
            </div>

            <div class="col-sm">
                <div class="form-group">
                    <label for="price">Price</label><br>
                    <input v-model="price" type="text" id="price" name="price" class="form-control"><hr>
                </div>
            </div>
        </div>
        <input type="submit" value="Adauga" class="btn btn-outline-success btn-block">
    </form>
  </div>
  </div>
</template> 
 
<script>
export default {
    data: function() {
        return {
                name: '',
                description: '',
                image: '',
                price:'',
                success: false
        };
        
    },
    methods: {
        resetInput() {
            this.name = '';
            this.description = '';
            this.image = '';
            this.price = '';
        },
        async submit() {
            const datas = new FormData();
            datas.append('name', this.name);
            datas.append('description', this.description);
            datas.append('image', this.image);
            datas.append('price', this.price);

            datas.append('_method', 'POST');
            console.log("Pressed");
            axios.post('./add', datas)
                .then(
                    response => {
                        console.log("Insert in DB");
                        this.success = true;
                        this.resetInput();
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
 mounted()
 {

 }
}
</script>
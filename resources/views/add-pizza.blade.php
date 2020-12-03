
<div class="title m-b-md">
    Add a new pizza
</div>
<button @click="item=1" class="btn btn-outline-dark">Back to home</button>
<hr>
<div class="form">
    <form action="/pizzas/add" method="POST">
        @csrf
        <div class="row">
            <div class="col-sm">
                <div class="form-group">
                    <label for="name">Name</label><br>
                    <input type="text" id="name" name="name" class="form-control"><br>
                </div>
            </div>

            <div class="col-sm">
                <div class="form-group">
                    <label for="description">Description</label><br>
                    <input type="text" id="description" name="description" class="form-control"><br>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm">
                <div class="form-group">
                    <label for="image">Image</label><br>
                    <input type="text" id="image" name="image" class="form-control"><br>
                </div>
            </div>

            <div class="col-sm">
                <div class="form-group">
                    <label for="price">Price</label><br>
                    <input type="text" id="price" name="price" class="form-control"><hr>
                </div>
            </div>
        </div>
        <input type="submit" value="Adauga" class="btn btn-outline-success btn-block">
    </form>
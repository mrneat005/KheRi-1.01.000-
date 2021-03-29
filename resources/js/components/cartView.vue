<template>
    <div class="container">
 	<table id="cart" class="table table-hover table-condensed">
    				<thead>
						<tr>
							<th style="width:50%">Product</th>
							<th style="width:10%">Price</th>
							<th style="width:8%">Quantity</th>
							<th style="width:22%" class="text-center">Subtotal</th>
							<th style="width:10%"></th>
						</tr>
					</thead>
					<tbody>
						<tr v-for="cartItem in cart.data" :key="cartItem.id">
							<td data-th="Product">
								<div class="row">
									<div class="col-sm-2 hidden-xs"><img :src="getProductPhoto(cartItem.associatedModel.main_photo)" alt="..." class="img-fluid"/></div>
									<div class="col-sm-10">
										<h4 class="nomargin">{{cartItem.name}}</h4>
										<p>Quis aute iure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet.</p>
									</div>
								</div>
							</td>
							<td data-th="Price">$1.99</td>
							<td data-th="Quantity">
								<input type="number"  v-model="cartItem.quantity"  class="form-control text-center" >
							</td>
							<td data-th="Subtotal" class="text-center">1.99</td>
							<td class="actions" data-th="">
                     <a href="#" @click="updateToCart(cartItem.id)">
                     <i class="fas fa-edit fa-lg green"></i>
                     </a>
                  /
                     <a href="#" @click="deleteItem(cartItem.id)">
                     <i class="fas fa-trash red fa-lg"> </i>
                    </a>
							</td>
						</tr>
					</tbody>
					<tfoot>
						<tr class="visible-xs">
							<td class="text-center"><strong>Total </strong></td>
						</tr>
						<tr>
							<td><a href="#" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
							<td colspan="2" class="hidden-xs"></td>
							<td class="hidden-xs text-center"><strong>Total $1.99</strong></td>
							<td><a href="#" class="btn btn-success btn-block">Checkout <i class="fa fa-angle-right"></i></a></td>
						</tr>
					</tfoot>
				</table>




    </div>
</template>

<script>
    export default {
        mounted() {


            this.loadCart();

            this.form
          .get("cart")
           .then((data) => {
       
                this.cart = data;

            })
           .catch(() => {});
        },

  data() {
    return {
      whichModal: false,
      time: "",
      cart: {},
      form: new Form({
        id: "",
        qty:"",
        name: "",
        email: "",
        created_at: "",
        type: "",
        password: "",
        main_photo: "",
      }),
    };
  },
  methods: {
      loadCart() { 
if(true){
      this.$Progress.start();
      axios
        .get("cart")
        .then(({ data }) => {
          this.cart = data;
        })
        .catch(function (error) {
          // handle error
          this.$Progress.fail();
        });
      this.$Progress.finish();
      Fire.$on("cartItemDeleted", () => {
        this.loadCart();
      });
            Fire.$on("cartItemUpdated", () => {
        this.loadCart();
      });
      
      
    }
      //axios.get("api/user").then(({data}) => (this.users = data.data));
      //doing data.data because it depends on how we get data formated
      //see  XHR response
      //performence
      //setInterval(() => this.loadUsers(), 15000);
      //refreshs data after every 15 seconds
      //setInterval(()=>this.displayTime(),1000);
    },
getProductPhoto(e) {
      console.log(e);

      let photo =
        this.form.main_photo.length > 200 ? this.form.main_photo : "img/products/" + e;
      return photo;
    },
    deleteItem(id) {
      Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
      }).then((result) => {
        
         this.form
          .delete("cart/" + id)
           .then(() => {
            Fire.$emit("Cart Item");
             Swal.fire(
              "Deleted!",
              "Your Cart Item " + id + " has been deleted.",
              "success"
             );
            })
           .catch(() => {});
          Fire.$emit("cartItemDeleted");
        });
        this.reRender();
        
       },
            reRender(){
              console.log('done');
        this.$forceUpdate()
     },



    updateToCart(id) {
      
    this.form
          .put("cart/"+ id)
           .then(() => {
             Swal.fire(
              "Cart!",
              "Your Item " + id + " has been added to the cart.",
              "success"
             );
            })
           .catch(() => {});
       },

  },

    }
</script>
<style >
    .table>tbody>tr>td, .table>tfoot>tr>td{
    vertical-align: middle;
}
@media screen and (max-width: 600px) {
    table#cart tbody td .form-control{
		width:20%;
		display: inline !important;
	}
	.actions .btn{
		width:36%;
		margin:1.5em 0;
	}
	
	.actions .btn-info{
		float:left;
	}
	.actions .btn-danger{
		float:right;
	}
	
	table#cart thead { display: none; }
	table#cart tbody td { display: block; padding: .6rem; min-width:320px;}
	table#cart tbody tr td:first-child { background: #333; color: #fff; }
	table#cart tbody td:before {
		content: attr(data-th); font-weight: bold;
		display: inline-block; width: 8rem;
	}
	
	
	
	table#cart tfoot td{display:block; }
	table#cart tfoot td .btn{display:block;}
	
}
</style>
<template>
  <div class="container">



<div class="card">
<button class="btn btn-outline-success">   
   <router-link to="/becomeSeller-component" class="card-body">
        <i class="nav-icon fas fa-tachometer-alt" style="color: grey;"></i>
            Become a Seller..
    </router-link></button>
</div>

 






    <div class="row">
      <div
        class="col-lg-6 col-lg-4 col-sm-12"
        v-for="product in products.data"
        :key="product.id"
      >
        <div class="row p-2 bg-white border rounded">
          <div class="col-md-3 mt-1">
            <img
              :src="getProductPhoto(product.main_photo)"
              alt="User profile picture"
              class="img-fluid img-responsive rounded product-image"
            />
          </div>
          <div class="col-md-6 mt-1">
            <h5>{{ product.name }}</h5>
            <div class="d-flex flex-row">
              <div class="ratings mr-2">
                <i class="fa fa-star"></i><i class="fa fa-star"></i
                ><i class="fa fa-star"></i><i class="fa fa-star"></i>
              </div>
              <span>310</span>
            </div>
            <div class="mt-1 mb-1 spec-1">
              <span> Discount : {{ product.discount }} %</span><span class="dot"></span
              ><span> Featured </span><span class="dot"></span
              ><span>{{ product.discription}}<br /></span>
            </div>
            <div class="mt-1 mb-1 spec-1">
              <span>{{ product.discription}}</span
              >
            </div>
            <p class="text-justify text-truncate para mb-0">
              There are many variations of passages of Lorem Ipsum available, but the
              majority have suffered alteration in some form, by injected humour, or
              randomised words which don't look even slightly believable.<br /><br />
            </p>
          </div>
          <div class="align-items-center align-content-center col-md-3 border-left mt-1">
            <div class="d-flex flex-row align-items-center">
              <h4 class="mr-1">Price : {{ product.price }}</h4>
              <span class="strike-text">RS</span>
            </div>
            <h6 class="text-success">Free shipping</h6>
            <div class="d-flex flex-column mt-4">
              <button class="btn btn-primary btn-sm" type="button">Details</button
              ><button class="btn btn-outline-danger btn-sm mt-2" type="button">
                Add to cart
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>

  <footer id="main-footer" class="text-center p-4">
    <div class="container">
      <div class="row">
        <div class="col">
          <p>Copyright 2017 &copy; Glozzom</p>
        </div>
      </div>
    </div>
  </footer>


  </div>

  <!--/Table-->
</template>

<script>
export default {
  created() {
    this.loadUsers();
  },
  data() {
    return {
      whichModal: false,
      time: "",
      sections: {},
      catagories: {},
      products: {},
      form: new Form({
        id: "",
        name: "",
        catagory_id: "",
        section_id: "",
        code: "",
        color: "",
        price: "",
        discount: "",
        weight: "",
        main_photo: "",
        side_photo: "",
        front_photo: "",
        size: "",
        stock: "",
        url: "",
        discription: "",
        isFeatured: "",
        meta_title: "",
        meta_discription: "",
        meta_keyword: "",
        created_at: "",
        updated_at: "",
      }),
    };
  },
  methods: {
    getProductPhoto(e) {
      console.log(e);

      let photo =
        this.form.main_photo.length > 200 ? this.form.main_photo : "img/products/" + e;
      return photo;
    },
    loadUsers() {
      axios
        .get("product")
        .then(({ data }) => {
          this.products = data;
        })
        .catch(function (error) {
          // handle error
          this.$Progress.fail();
        });

      axios
        .get("catagory")
        .then(({ data }) => {
          this.catagories = data;
        })
        .catch(function (error) {
          // handle error
          this.$Progress.fail();
        });
    },
  },
};
</script>
<style>
.profile-header-img > img.img-circle {
  width: 50px;
  height: 50px;
  border: 2px solid #000000;
}






</style>

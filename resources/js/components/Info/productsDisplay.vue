<template>
  <div class="container">
    

    
  <div class="row">
      <div
        class="col-lg-6 col-lg-4 col-sm-12"
        v-for="product in products.data"
        :key="product.id"
      >
        <div class="card flex-md-row mb-4 box-shadow h-md-250 card-primary card-outline">
          <div class="card-body d-flex flex-column align-items-start">
            <strong class="d-inline-block mb-2 text-primary">{{ product.name }}</strong>
            <h3 class="mb-0">
              <a class="text-dark" href="#">Featured post</a>
            </h3>
            <div class="mb-1 text-muted">Price : {{ product.price }} RS</div>
            <p class="card-text mb-auto"> Discounr : {{ product.discount }} %</p>
            <p class="card-text mb-auto bg-dark">{{ product.discription }}</p>
            <a href="#">Details</a>
          </div>
          <img
            class="img-fluid"
            :src="getProductPhoto(product.main_photo)"
            alt="User profile picture"
          />
        </div>
      </div>
    </div>
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
        getProductPhoto(e){
       


    

  console.log(e);

          let photo = (this.form.main_photo.length > 200) ? this.form.main_photo : "img/products/"+ e ;
                return photo;
            },
                  loadUsers(){
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

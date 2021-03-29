<template>
  <div class="container">
    <div class="card card-success">
      <div class="card-header">
        <h3 class="card-title">Registration Form </h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <!-------------------------Form---------------------->
        <form @submit.prevent>
          <i class="fas fa-file-signature green"></i>
          <div class="form-group">
            <input
              v-model="form.shop_name"
              type="text"
              name="shop_name"
              class="form-control"
              placeholder="Shop Name"
              :class="{ 'is-invalid': form.errors.has('shop_name') }"
            />
            <has-error :form="form" field="shop_name"></has-error>
          </div>

          <!--Element-->
          <i class="fas fa-book orange"></i>
          <div class="form-group">
            <textarea
              v-model="form.Address"
              name="Address"
              id="Address"
              placeholder="Address"
              class="form-control"
              :class="{ 'is-invalid': form.errors.has('Adress') }"
            ></textarea>
            <has-error :form="form" field="Address"></has-error>
          </div>
          <!--/Element-->

          <!--Element-->
          <i class="fas fa-book orange"></i>
          <div class="form-group">
            <textarea
              v-model="form.Location"
              name="Location"
              id="Location"
              placeholder="Location"
              class="form-control"
              :class="{ 'is-invalid': form.errors.has('Location') }"
            ></textarea>
            <has-error :form="form" field="Location"></has-error>
          </div>
          <!--/Element-->





          <!--Element-->
          <i class="fas fa-book orange"></i>
          <div class="form-group">
            <textarea
              v-model="form.discription"
              name="discription"
              id="discription"
              placeholder="Short discription for catagory (Optional)"
              class="form-control"
              :class="{ 'is-invalid': form.errors.has('discription') }"
            ></textarea>
            <has-error :form="form" field="discription"></has-error>
          </div>
          <!--/Element-->




 

          <!--Element-->
          <i class="fas fa-file-signature green"></i>
          <div class="form-group">
            <input
              v-model="form.meta_discription"
              type="text"
              name="meta_discription"
              class="form-control"
              placeholder="meta_discription"
              :class="{ 'is-invalid': form.errors.has('meta_discription') }"
            />
            <has-error :form="form" field="meta_discription"></has-error>
          </div>
          <!--/Element-->

          <!--Element-->
          <i class="fas fa-file-signature green"></i>
          <div class="form-group">
            <input
              v-model="form.meta_title"
              type="text"
              name="meta_title"
              class="form-control"
              placeholder="meta_title"
              :class="{ 'is-invalid': form.errors.has('meta_title') }"
            />
            <has-error :form="form" field="meta_title"></has-error>
          </div>
          <!--/Element-->
<!--Element-->
          <div class="form-group">
            <label for="photo" class="col-sm-2 control-label">Some Pictures</label>
            <div class="col-sm-12">
              <input type="file" @change="updatePhotoMain" name="main_photo" class="form-input" />
              <input type="file" @change="updatePhotoSecond" name="Second_photo" class="form-input" />
              <input type="file" @change="updatePhotoThird" name="Third_photo" class="form-input" />
            </div>
          </div>

<!--/Element-->

<!--Element-->
<p class="">
<i class="fas fa-exclamation-triangle fa-2x bg-danger"></i> make sure that the document pictures are clear...!
</p>
          <div class="form-group">
            <label for="photo" class="col-sm-2 control-label">CNIC - FRONT</label>
            <div class="col-sm-12">
              <input type="file" @change="updatePhotoCnicFront" name="photo" class="form-input" />
            </div>
          </div>

<!--/Element-->

<!--Element-->
          <div class="form-group">
            <label for="photo" class="col-sm-2 control-label">CNIC - Back</label>
            <div class="col-sm-12">
              <input type="file" @change="updatePhotoCnicBack" name="photo" class="form-input" />
            </div>
          </div>

<!--/Element-->

<!--Element-->
          <div class="form-group">
            <label for="photo" class="col-sm-2 control-label">shop_reg_doc_photo</label>
            <div class="col-sm-12">
              <input type="file" @change="updatePhotoshop_reg_doc_photo" name="shop_reg_doc_photo" class="form-input" />
            </div>
          </div>

<!--/Element-->



          <i class="fas fa-list yellow"></i>
          <div class="form-group">
            <select
              name="type"
              v-model="form.plan"
              id="type"
              class="form-control"
              :class="{ 'is-invalid': form.errors.has('plan') }"
            >
              <option value="0">Select Plan</option>
              <option value="1">Three Months</option>
              <option value="2">One Year</option>
              <option value="3">Five Year</option>
        
            </select>
            <has-error :form="form" field="plan"></has-error>
          </div>

         
          <div class="container">
            <button type="submit" @click="createVendor" class="btn btn-success">
              Create
            </button>
          </div>
        </form>
        <!--/Form-->
      </div>
    </div>
  </div>
</template>

<script>
export default {
  mounted() {
    this.created();
  },
  methods: {
    updatePhotoMain(e) {
      // console.log("uploading...!");
      let file = e.target.files[0];
      let reader = new FileReader();

      let limit = 1024 * 1024 * 2;
      if (file["size"] > limit) {
        Swal({
          type: "error",
          title: "Oops...",
          text: "You are uploading a large file",
        });
        return false;
      }

      reader.onloadend = (file) => {
        this.form.main_photo = reader.result;
      };
      reader.readAsDataURL(file);
    },

 updatePhotoSecond(e) {
      // console.log("uploading...!");
      let file = e.target.files[0];
      let reader = new FileReader();

      let limit = 1024 * 1024 * 2;
      if (file["size"] > limit) {
        Swal({
          type: "error",
          title: "Oops...",
          text: "You are uploading a large file",
        });
        return false;
      }

      reader.onloadend = (file) => {
        this.form.main_photo = reader.result;
      };
      reader.readAsDataURL(file);
    },

updatePhotoThird(e) {
      // console.log("uploading...!");
      let file = e.target.files[0];
      let reader = new FileReader();

      let limit = 1024 * 1024 * 2;
      if (file["size"] > limit) {
        Swal({
          type: "error",
          title: "Oops...",
          text: "You are uploading a large file",
        });
        return false;
      }

      reader.onloadend = (file) => {
        this.form.main_photo = reader.result;
      };
      reader.readAsDataURL(file);
    },

     updatePhotoshop_reg_doc_photo(e) {
      // console.log("uploading...!");
      let file = e.target.files[0];
      let reader = new FileReader();

      let limit = 1024 * 1024 * 2;
      if (file["size"] > limit) {
        Swal({
          type: "error",
          title: "Oops...",
          text: "You are uploading a large file",
        });
        return false;
      }

      reader.onloadend = (file) => {
        this.form.main_photo = reader.result;
      };
      reader.readAsDataURL(file);
    },



     updatePhotoCnicFront(e) {
      // console.log("uploading...!");
      let file = e.target.files[0];
      let reader = new FileReader();

      let limit = 1024 * 1024 * 2;
      if (file["size"] > limit) {
        Swal({
          type: "error",
          title: "Oops...",
          text: "You are uploading a large file",
        });
        return false;
      }

      reader.onloadend = (file) => {
        this.form.main_photo = reader.result;
      };
      reader.readAsDataURL(file);
    },


     updatePhotoCnicBack(e) {
      // console.log("uploading...!");
      let file = e.target.files[0];
      let reader = new FileReader();

      let limit = 1024 * 1024 * 2;
      if (file["size"] > limit) {
        Swal({
          type: "error",
          title: "Oops...",
          text: "You are uploading a large file",
        });
        return false;
      }

      reader.onloadend = (file) => {
        this.form.main_photo = reader.result;
      };
      reader.readAsDataURL(file);
    },



            fetch(){
           //console.log(this.form.section_id);
            axios
        .get("returning/"+this.form.section_id)
        .then(({ data }) => {
         this.catagories = data;
        })
        .catch(function (error) {
          // handle error
          this.$Progress.fail();
        });

    },
    updatePhotoSide(e) {
      // console.log("uploading...!");
      let file = e.target.files[0];
      let reader = new FileReader();

      let limit = 1024 * 1024 * 2;
      if (file["size"] > limit) {
        Swal({
          type: "error",
          title: "Oops...",
          text: "You are uploading a large file",
        });
        return false;
      }

      reader.onloadend = (file) => {
        this.form.side_photo = reader.result;
      };
      reader.readAsDataURL(file);
    },
    updatePhotoFront(e) {
      // console.log("uploading...!");
      let file = e.target.files[0];
      let reader = new FileReader();

      let limit = 1024 * 1024 * 2;
      if (file["size"] > limit) {
        Swal({
          type: "error",
          title: "Oops...",
          text: "You are uploading a large file",
        });
        return false;
      }

      reader.onloadend = (file) => {
        this.form.front_photo = reader.result;
      };
      reader.readAsDataURL(file);
    },
    created() {
      axios
        .get("section")
        .then(({ data }) => {
          this.sections = data;
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
     //check.....................................................................................
    createVendor() {
     this.form
        .post("vendor")
        .then(() => {
          //this.loadUsers()
          //using custom events
            Toast.fire({
              icon: "success",
              title: "Request for " + this.form.shop_name + " submited successfully",
            });
          
          
          this.$Progress.finish();
          this.form.reset();
          //This will close the modal
          $(add).modal("hide");
        })
        .catch(() => {
          this.$Progress.fail();
        });
    },
  },
  //check....................................................................................
  data() {
    return {
      whichModal: false,
      time: "",
      form: new Form({
        id: "",
        shop_number: "",
        shop_name: "",
        Address: "",
        Location: "",
        discription: "",
        main_photo: "",
        Second_photo: "",
        Third_photo: "",
        plan: "",
        cnic_front: "",
        cnic_back: "",
        shop_reg_doc_photo: "",
        slogan: "",
        created_at: "",
        updated_at: "",

      }),
    };
  },
};
</script>

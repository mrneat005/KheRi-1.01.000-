<template>
  <div class="container">
    <!--Table-->
    <div class="row mt-5">
      <div class="col-md-12">
        <div class="card bg-dark">
          <div class="card-header">
            <h3 class="card-title">Panel</h3>

            <div class="card-tools">
              <button class="btn btn-success" @click="createModal">
                Add new<i class="fas fa-user-plus fw"></i>
              </button>
            </div>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
          <table class="table table-hover bg-dark table-striped">
            <thead>
              <tr class="bg-success">
                <th>ID</th>
                <th>shop_name</th>
                <th>shop_number</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="item in vendors.data" :key="item.id">
                <td ><p style="color:white">{{ item.id }}</p></td>
                <td><p style="color:white">{{ item.shop_name }}</p></td>
                <td><p style="color:white">{{ item.shop_number }}</p></td>
                

                <!--<td>{{user.created_at | simpleDate }}</td>-->
                <td>
                  <a href="#" @click="updateModal(item)">
                    <i class="fas fa-edit fa-lg green"></i>
                  </a>
                  /
                  <a href="#" @click="deleteUser(item.id)">
                    <i class="fas fa-trash red fa-lg"> </i>
                  </a>
                </td>
              </tr>
            </tbody>

            <pagination
              :data="vendors"
              @pagination-change-page="getResults"
            ></pagination>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>

    <!-- Modal -->
    <!-- Modal -->
    <div
      class="modal fade"
      id="add"
      tabindex="-1"
      role="dialog"
      aria-labelledby="add"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content bg-dark">
          <div class="modal-header bg-success">
            <h5 class="modal-title" v-show="whichModal" id="add">Update Catagory</h5>
            <h5 class="modal-title" v-show="!whichModal" id="add">Add Catagory</h5>
            <button type="button" class="close bg-danger" @click="closeModal">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
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
      vendors: {},
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



    created() {
      Fire.$on("search", () => {
        console.log("Executed");
      });
    },
    getResults(page = 1) {
      axios.get("api/user?page=" + page).then((response) => {
        this.users = response.data;
      });
    },
    closeModal() {
      $(add).modal("hide");
    },
    createModal() {
      this.whichModal = false;
      $(add).modal("show");
    },
    deleteUser(id) {
      Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
      }).then((result) => {
        if (result.isConfirmed) {
          this.form
            .delete("catagory/" + id)
            .then(() => {
              Fire.$emit("userDeleted");
              Swal.fire("Deleted!", "Section " + id + " has been deleted.", "success");
            })
            .catch(() => {});
        }
      });
    },
    updateModal(user) {
      this.whichModal = true;
      this.form.fill(user);
      $(add).modal("show");
    },
    fetch() {
      //console.log(this.form.section_id);
      axios
        .get("returning/" + this.form.section_id)
        .then(({ data }) => {
          this.catagories = data;
        })
        .catch(function (error) {
          // handle error
          this.$Progress.fail();
        });
    },
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
    updateUser() {
      // this.$progress.start();
      this.$Progress.start();
      this.form
        .put("catagory/" + this.form.id)
        .then(() => {
          this.$Progress.finish();
          $(add).modal("hide");
          Fire.$emit("userUpdated");
          Toast.fire({
            icon: "success",
            title: "Updated Section " + this.form.id + " successfully",
          });
          this.form.reset();
        })
        .catch(() => {
          this.$Progress.fail();
        });

      /*Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, update it!",
      }).then((result) => {
        if (result.isConfirmed) {
          Swal.fire(
            "update!",
            "Your file " + id + " has been updated.",
            "success"
          );
        }
      });*/
    },
    create() {
      if (this.form.status === "active") {
        this.form.status = 1;
      } else if (this.form.status === "inActive") {
        this.form.status = 0;
      } else {
        this.form.status = 0;
      }
      //console.log(this.form.status);
      this.$Progress.start();
      this.form
        .post("catagory")
        .then(() => {
          //this.loadUsers()
          //using custom events

          Fire.$emit("userCreated");

          Toast.fire({
            icon: "success",
            title: "Catagory" + this.form.name + " created successfully",
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
    getProfilePhoto() {
      let photo =
        this.form.photo.length > 200 ? this.form.photo : "img/profile/" + this.form.photo;
      return photo;
    },
    loadUsers() {
      axios
        .get("vendor")
        .then(({ data }) => {
          this.vendors = data;
        })
        .catch(function (error) {
          // handle error
          this.$Progress.fail();
        });

      if (true) {
        this.$Progress.start();
        axios
          .get("catagory")
          .then(({ data }) => {
            this.catagories = data;
          })
          .catch(function (error) {
            // handle error
            this.$Progress.fail();
          });
        this.$Progress.finish();
        Fire.$on("userCreated", () => {
          this.loadUsers();
        });
        Fire.$on("userDeleted", () => {
          this.loadUsers();
        });
        Fire.$on("userUpdated", () => {
          this.loadUsers();
        });
        Fire.$on("search", () => {
          //axios.get("api/user");
          let query = this.$parent.search;
          axios
            .get("findCatagory?q=" + query)

            .then((data) => {
              this.catagories = data.data;
            })
            .catch(() => {});
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
    diplayTime() {
      var time = new Date();
      time.toLocaleTimeString();
      this.time = time;
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

<template>
  <div class="container">
    <!--Table-->
    <div class="row mt-5">
      <div class="col-md-12">
        <div class="card bg-dark">
          <div class="card-header">
            <h3 class="card-title">Panel</h3>

            <div class="card-tools">
              <router-link to="/addproduct-component" class="nav-link">
                <button class="btn btn-success">
                  Add new<i class="fas fa-user-plus fw"> </i>
                </button>
              </router-link>
            </div>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
          <table class="table table-hover bg-dark table-striped">
            <thead>
              <tr class="bg-success">
                <th>ID</th>
                <th>Name</th>
                <th>type</th>
                <th>status</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="product in products.data" :key="product.id">
                <td>{{ product.id }}</td>
                <td>{{ product.name }}</td>
                <td>{{ product.type }}</td>
                <td>Status</td>
                <!--<td>{{user.created_at | simpleDate }}</td>-->
                <td>
                  <a href="#" @click="updateModal(product)">
                    <i class="fas fa-edit fa-lg green"></i>
                  </a>
                  /
                  <a href="#" @click="deleteUser(product.id)">
                    <i class="fas fa-trash red fa-lg"> </i>
                  </a>
                </td>
              </tr>
            </tbody>

            <pagination
              :data="products"
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
            <h5 class="modal-title" v-show="whichModal" id="add">Update User</h5>
            <h5 class="modal-title" v-show="!whichModal" id="add">Add User</h5>
            <button type="button" class="close bg-danger" @click="closeModal">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <!-------------------------Form---------------------->
            <form @submit.prevent="whichModal ? updateUser() : create()">
              <i class="fas fa-file-signature green"></i>
              <div class="form-group">
                <input
                  v-model="form.name"
                  type="text"
                  name="name"
                  class="form-control"
                  placeholder="name"
                  :class="{ 'is-invalid': form.errors.has('name') }"
                />
                <has-error :form="form" field="name"></has-error>
              </div>

              <!--Element-->
              <i class="fas fa-book orange"></i>
              <div class="form-group">
                <textarea
                  v-model="form.code"
                  name="code"
                  id="code"
                  placeholder="code"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('code') }"
                ></textarea>
                <has-error :form="form" field="code"></has-error>
              </div>
              <!--/Element-->

              <!--Element-->
              <i class="fas fa-book orange"></i>
              <div class="form-group">
                <textarea
                  v-model="form.color"
                  name="color"
                  id="color"
                  placeholder="Color"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('color') }"
                ></textarea>
                <has-error :form="form" field="color"></has-error>
              </div>
              <!--/Element-->

              <!--Element-->
              <i class="fas fa-book orange"></i>
              <div class="form-group">
                <textarea
                  v-model="form.price"
                  name="price"
                  id="price"
                  placeholder="Price "
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('price') }"
                ></textarea>
                <has-error :form="form" field="price"></has-error>
              </div>
              <!--/Element-->

              <!--Element-->
              <i class="fas fa-book orange"></i>
              <div class="form-group">
                <textarea
                  v-model="form.weight"
                  name="weight"
                  id="weight"
                  placeholder="weight"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('weight') }"
                ></textarea>
                <has-error :form="form" field="weight"></has-error>
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
                  v-model="form.url"
                  type="text"
                  name="url"
                  class="form-control"
                  placeholder="url"
                  :class="{ 'is-invalid': form.errors.has('url') }"
                />
                <has-error :form="form" field="url"></has-error>
              </div>
              <!--/Element-->

              <!--Element-->
              <i class="fas fa-file-signature green"></i>
              <div class="form-group">
                <input
                  v-model="form.discount"
                  type="number"
                  name="discount"
                  class="form-control"
                  placeholder="discount"
                  :class="{ 'is-invalid': form.errors.has('discount') }"
                />
                <has-error :form="form" field="discount"></has-error>
              </div>
              <!--/Element-->

              <!--Element-->
              <i class="fas fa-file-signature green"></i>
              <div class="form-group">
                <input
                  v-model="form.meta_keyword"
                  type="text"
                  name="meta_keyword"
                  class="form-control"
                  placeholder="meta_keyword"
                  :class="{ 'is-invalid': form.errors.has('meta_keyword') }"
                />
                <has-error :form="form" field="meta_keyword"></has-error>
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
<!--Working code-->
              <div class="form-group">
                <label for="photo" class="col-sm-2 control-label">Main Photo</label>
                <div class="col-sm-12">
                  <input
                    type="file"
                    @change="updatePhotoMain"
                    name="photo"
                    class="form-input"
                  />
                </div>
              </div>

              <i class="fas fa-list yellow"></i>
              <div class="form-group">
                <select
                  name="type"
                  v-model="form.section_id"
                  id="type"
                  @change="fetch()"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('section_id') }"
                >
                  <option value="0">Select Section</option>
                  <option
                    id="section.id"
                    v-for="section in sections.data"
                    :key="section.id"
                    :value="section.id"
                  >
                    {{ section.name }}
                  </option>
                </select>
                <has-error :form="form" field="type"></has-error>
              </div>

              <i class="fas fa-list yellow"></i>
              <div class="form-group">
                <select
                  name="type"
                  v-model="form.parent_id"
                  id="type"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('parent_id') }"
                >
                  <option value="0">Select Catagory</option>
                  <option
                    v-for="catagory in catagories.data"
                    :key="catagory.id"
                    :value="catagory.id"
                  >
                    <element>{{ catagory.name }}</element>
                  </option>
                </select>
                <has-error :form="form" field="type"></has-error>
              </div>
              <!--
          <div class="form-group">
            <label for="photo" class="col-sm-2 control-label">Side Photo</label>
            <div class="col-sm-12">
              <input type="file" @change="updatePhotoSide" name="photo" class="form-input" />
            </div>
          </div>

          <div class="form-group">
            <label for="photo" class="col-sm-2 control-label">Front Photo</label>
            <div class="col-sm-12">
              <input type="file" @change="updatePhotoFront" name="photo" class="form-input" />
            </div>
          </div>

-->

              <div class="container">
                <button
                  type="button"
                  class="btn btn-danger"
                  data-dismiss="modal"
                  @click="closeModal"
                >
                  Close
                </button>
                <button type="submit" v-show="!whichModal" class="btn btn-success">
                  Create
                </button>
                <button type="submit" v-show="whichModal" class="btn btn-success">
                  Update
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
            .delete("product/" + id)
            .then(() => {
              Fire.$emit("userDeleted");
              Swal.fire("Deleted!", "Your file " + id + " has been deleted.", "success");
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
    updateUser() {
      // this.$progress.start();
      this.$Progress.start();
      this.form
        .put("product/" + this.form.id)
        .then(() => {
          this.$Progress.finish();
          $(add).modal("hide");
          Fire.$emit("userUpdated");
          Toast.fire({
            icon: "success",
            title: "Updated " + this.form.id + " successfully",
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
      this.$Progress.start();
      this.form
        .post("product")
        .then(() => {
          //this.loadUsers()
          //using custom events

          Fire.$emit("userCreated");
          if (this.form.type == "user") {
            Toast.fire({
              icon: "success",
              title: "User " + this.form.name + " created successfully",
            });
          }
          if (this.form.type == "admin") {
            Toast.fire({
              icon: "success",
              title: "Admin " + this.form.name + " created successfully",
            });
          }
          if (this.form.type == "vendor") {
            Toast.fire({
              icon: "success",
              title: "Vendor " + this.form.name + " created successfully",
            });
          } else {
            Toast.fire({
              icon: "success",
              title: "User " + this.form.name + " created successfully",
            });
          }
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
        .get("section")
        .then(({ data }) => {
          this.sections = data;
        })
        .catch(function (error) {
          // handle error
          this.$Progress.fail();
        });
      axios
        .get("section")
        .then(({ data }) => {
          this.catagories = data;
        })
        .catch(function (error) {
          // handle error
          this.$Progress.fail();
        });

      if (true) {
        this.$Progress.start();
        axios
          .get("product")
          .then(({ data }) => {
            this.products = data;
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
            .get("api/findUser?q=" + query)
            .then((data) => {
              this.users = data.data;
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
body {
    background: #eee
}

.ratings i {
    font-size: 16px;
    color: red
}

.strike-text {
    color: red;
    text-decoration: line-through
}

.product-image {
    width: 100%
}

.dot {
    height: 7px;
    width: 7px;
    margin-left: 6px;
    margin-right: 6px;
    margin-top: 3px;
    background-color: blue;
    border-radius: 50%;
    display: inline-block
}

.spec-1 {
    color: #938787;
    font-size: 15px
}

h5 {
    font-weight: 400
}

.para {
    font-size: 16px
}
</style>
  
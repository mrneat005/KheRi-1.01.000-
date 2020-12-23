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
                <th>Name</th>
                <th>type</th>
                <th>status</th>
                <th>Modify</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="user in users" :key="user.id">
                <td>{{ user.id }}</td>
                <td>{{ user.name | upperCaseFirst }}</td>
                <td>{{ user.type | lowerCaseAll }}</td>
                <td>no Approved</td>
                <!--<td>{{user.created_at | simpleDate }}</td>-->
                <td>
                  <a href="#" @click="updateModal(user)">
                    <i class="fas fa-edit fa-lg green"></i>
                  </a>
                  /
                  <a href="#" @click="deleteUser(user.id)">
                    <i class="fas fa-trash red fa-lg"> </i>
                  </a>
                </td>
              </tr>
            </tbody>
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
            <form @submit.prevent=" whichModal ? updateUser() : create()">
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
              <i class="fas fa-envelope blue"></i>
              <div class="form-group">
                <input
                  v-model="form.email"
                  type="email"
                  name="email"
                  placeholder="Email Address"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('email') }"
                />
                <has-error :form="form" field="email"></has-error>
              </div>
              <i class="fas fa-book orange"></i>
              <div class="form-group">
                <textarea
                  v-model="form.bio"
                  name="bio"
                  id="bio"
                  placeholder="Short bio for user (Optional)"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('bio') }"
                ></textarea>
                <has-error :form="form" field="bio"></has-error>
              </div>
              <i class="fas fa-list yellow"></i>
              <div class="form-group">
                <select
                  name="type"
                  v-model="form.type"
                  id="type"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('type') }"
                >
                  <option value="">Select User Role</option>
                  <option value="admin">admin</option>
                  <option value="user">user</option>
                  <option value="author">vendor</option>
                </select>
                <has-error :form="form" field="type"></has-error>
              </div>
              <i class="fas fa-lock red"></i>
              <div class="form-group inline">
                <input
                  v-model="form.password"
                  type="password"
                  name="password"
                  id="password"
                  class="form-control"
                  placeholder="Password"
                  :class="{ 'is-invalid': form.errors.has('password') }"
                />

                <has-error :form="form" field="password"></has-error>
              </div>
              <div class="container">
                <button
                  type="button"
                  class="btn btn-danger"
                  data-dismiss="modal"
                  @click="closeModal"
                >
                  Close
                </button>
                <button type="submit" v-show="!whichModal" class="btn btn-success">Create</button>
                <button type="submit" v-show="whichModal" class="btn btn-success">Update</button>
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
      users: {},
      form: new Form({
        id: "",
        name: "",
        email: "",
        created_at: "",
        type: "",
        password: "",
        photo: "",
      }),
    };
  },
  methods: {
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
        if (result.isConfirmed){
         this.form
          .delete("api/user/" + id)
           .then(() => {
            Fire.$emit("userDeleted");
             Swal.fire(
              "Deleted!",
              "Your file " + id + " has been deleted.",
              "success"
             );
            })
           .catch(() => {});
          }
        });
       },
    updateModal(user){
            this.whichModal = true;
            this.form.fill(user);
            $(add).modal("show");
    },
    updateUser() {
     // this.$progress.start();
this.$Progress.start();
      this.form.put('api/user/'+this.form.id).then(()=>{
        this.$Progress.finish();
        $(add).modal("hide");
         Fire.$emit("userUpdated");
                     Toast.fire({
              icon: "success",
              title: "Updated " + this.form.id + " successfully",
            });
            this.form.reset();
      }).catch(()=>{
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
        .post("api/user")
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
    loadUsers() {
      
      this.$Progress.start();
      axios
        .get("api/user")
        .then(({ data }) => {
          this.users = data.data;
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
</style>
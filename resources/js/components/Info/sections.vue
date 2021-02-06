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
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="section in sections.data" :key="section.id">
                <td>{{ section.id }}</td>
                <td>{{ section.name  }}</td>
                <td>{{ section.status  }}</td>
            
                <!--<td>{{user.created_at | simpleDate }}</td>-->
                <td>
                  <a href="#" @click="updateModal(section)">
                    <i class="fas fa-edit fa-lg green"></i>
                  </a>
                  /
                  <a href="#" @click="deleteUser(section.id)">
                    <i class="fas fa-trash red fa-lg"> </i>
                  </a>
                </td>
              </tr>
            </tbody>
           
<pagination :data="sections" @pagination-change-page="getResults"></pagination>
            
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
              
              <i class="fas fa-list yellow"></i>
              <div class="form-group">
                <select
                  name="type"
                  v-model="form.status"
                  id="type"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('type') }"
                >
                  <option value="">Select Section Status</option>
                  <option value="active">active</option>
                  <option value="inActive">inActive</option>
                 
                </select>
                <has-error :form="form" field="type"></has-error>
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
      sections: {},
      form: new Form({
        id: "",
        name: "",
        status: "",
        created_at: "",
        updated_at: "",
        photo: "",
      }),
    };
  },
  methods: {
    created(){
            Fire.$on('search', () => {
        console.log("Executed");
      });
    },
    getResults(page = 1) {
			axios.get('api/user?page=' + page)
				.then(response => {
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
        if (result.isConfirmed){
         this.form
          .delete("section/" + id)
           .then(() => {
            Fire.$emit("userDeleted");
             Swal.fire(
              "Deleted!",
              "Section " + id + " has been deleted.",
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
      this.form.put('section/'+this.form.id).then(()=>{
        this.$Progress.finish();
        $(add).modal("hide");
         Fire.$emit("userUpdated");
                     Toast.fire({
              icon: "success",
              title: "Updated Section " + this.form.id + " successfully",
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
        
        if (this.form.status==="active") {
            this.form.status=1;
            
        } 
        else if(this.form.status==="inActive") {
            this.form.status=0;
        }else {
            this.form.status=0;
        }
        //console.log(this.form.status);
      this.$Progress.start();
      this.form
        .post("section")
        .then(() => {
          //this.loadUsers()
          //using custom events

          Fire.$emit("userCreated");
          
            Toast.fire({
              icon: "success",
              title: "Section" + this.form.name + " created successfully",
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
    getProfilePhoto(){
                let photo = (this.form.photo.length > 200) ? this.form.photo : "img/profile/"+ this.form.photo ;
                return photo;
            },
    loadUsers() { 


if(true){
      this.$Progress.start();
      axios
        .get("section")
        .then(({ data }) => {
          this.sections = data;
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
      Fire.$on('search', () => {
       //axios.get("api/user");
             let query = this.$parent.search;
                axios.get('findSection?q=' + query)


                .then((data) => {
                    this.sections = data.data
                })
                .catch(() => {

                });
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
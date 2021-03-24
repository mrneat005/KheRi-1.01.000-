<template>
  <div class="container">
    <div class="card card-success">
      <div class="card-header">
        <h3 class="card-title">Product Form</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <!-------------------------Form---------------------->
        <form @submit.prevent>
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

          <div class="form-group">
            <label for="photo" class="col-sm-2 control-label">Main Photo</label>
            <div class="col-sm-12">
              <input type="file" @change="updatePhotoMain" name="photo" class="form-input" />
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
              v-model="form.catagory_id"
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
          <div class="container">
            <button type="submit" @click="createProduct" class="btn btn-success">
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
    createProduct() {
     this.form
        .post("product")
        .then(() => {
          //this.loadUsers()
          //using custom events
            Toast.fire({
              icon: "success",
              title: "Product" + this.form.name + " created successfully",
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
      catagories: {},
      sections: {},
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
};
</script>

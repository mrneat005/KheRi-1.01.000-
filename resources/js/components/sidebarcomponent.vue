<template>



<div class="page-wrapper default-theme sidebar-bg bg1 toggled">
   <a id="show-sidebar" @click="closeMenu" class="btn btn-sm btn-dark" href="#">
            <i class="fas fa-bars fa-2x"></i>
        </a>
        <nav id="sidebar" class="sidebar-wrapper">
            <div class="sidebar-content">
                   <a id="show-sidebar" @click="closeMenu" class="btn btn-sm btn-dark" href="#">
            <i class="fas fa-times-circle fa-2x"></i>
        </a>
                <!-- sidebar-brand  -->
               
                <!-- sidebar-header  -->
            
        
                <!-- sidebar-search  -->
                <div class="sidebar-item sidebar-search">
                    <div>
                        <div class="input-group">
                            <input type="text" class="form-control search-menu" placeholder="Search...">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- sidebar-menu  -->
                <div class=" sidebar-item sidebar-menu">
                    <ul>
                        <li class="header-menu">
                            <span>General</span>
                        </li>
                        <li class="sidebar-component">
                            <router-link to="/side/overview">
                                <i class="fa fa-tachometer-alt"></i>
                                <span class="menu-text">Overview</span>
                            </router-link>
                        </li>

                                                <li class="sidebar-component">
                            <router-link to="/side/profile">
                                <i class="fa fa-tachometer-alt"></i>
                                <span class="menu-text">Profile</span>
                            </router-link>
                        </li>

                                                <li class="sidebar-component">
                            <router-link to="/side/products">
                                <i class="fa fa-tachometer-alt"></i>
                                <span class="menu-text">Products</span>
                            </router-link>
                        </li>

                                                <li class="sidebar-component">
                            <router-link to="/side/orders">
                                <i class="fa fa-tachometer-alt"></i>
                                <span class="menu-text">Orders</span>
                            </router-link>
                        </li>



                        
                       
                    
                    </ul>
                </div>
                <!-- sidebar-menu  -->
            </div>
            <!-- sidebar-footer  -->
            
        </nav>
<router-view></router-view>

        
    </div>
    <!-- page-wrapper -->



</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        methods: {
             closeMenu(){
        $(".page-wrapper").toggleClass("toggled");
      },
        },
    }
</script>

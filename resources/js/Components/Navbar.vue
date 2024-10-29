<script setup>
import { onMounted, onBeforeUnmount, ref } from 'vue';
import { Link, useForm, usePage } from '@inertiajs/vue3';
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";
import DropdownLink from '@/Components/DropdownLink.vue';
import {
    faUser,
} from "@fortawesome/free-solid-svg-icons";

const page = usePage()
const url = page.url
const auth = page.props.auth?.user
const seller = auth?.is_seller
const isAuth=ref(false)
console.log(seller);

console.log(auth);

const getRoute = () => {
    const routeArr = url.split("/");
    return routeArr[1]; // Ambil bagian kedua dari URL
};

const handleLogOut=()=>{
    isAuth.value=false
}



// const getRoute = () => {
//   const routeArr = url.split("/");
//   return routeArr[1]; // Ambil bagian kedua dari URL
// };

const isSticky = ref(false)

if(getRoute()!==''){
    isSticky==true
}
const handleScroll = () => {
    isSticky.value = window.scrollY > 45;
}
onMounted(() => {
    window.addEventListener('scroll', handleScroll);
    isAuth.value=auth
});

// Menggunakan onBeforeUnmount untuk menghapus event listener
onBeforeUnmount(() => {
    window.removeEventListener('scroll', handleScroll);
});

</script>

<template>
    <div class="container-fluid nav-bar bg-transparent" :class="{ 'sticky-top': isSticky }">
        <nav class="navbar navbar-expand-lg bg-white navbar-light py-0 px-4">
            <a href="index.html" class="navbar-brand d-flex align-items-center text-center">
                <div class="icon p-2 me-2">
                    <img class="img-fluid" src="img/icon-deal.png" alt="Icon" style="width: 30px; height: 30px;">
                </div>
                <h1 class="m-0 text-primary">Makaan</h1>
            </a>
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto">
                    <Link :href="route('home')" class="nav-item nav-link" :class="{ 'active': getRoute() == '' }">Home</Link>
                    <Link :href="route('properties.index')" class="nav-item nav-link"
                        :class="{ 'active': getRoute() == 'properti' }">Properti</Link>
                    <Link v-if="seller == 1" :href="route('properties.index')" class="nav-item nav-link"
                        :class="{ 'active': getRoute() == 'properti' }">Kelola Properti</Link>
                    <Link v-if="!isAuth" :href="route('login')" class="nav-item nav-link"
                        >Login</Link>

                    <div v-if="isAuth" class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <FontAwesomeIcon :icon="faUser" /> {{ auth.name }}
                        </a>
                        <div class="dropdown-menu rounded-0 m-0">
                            <DropdownLink :href="route('profile.edit')">
                                Profile
                            </DropdownLink>
                            <DropdownLink :href="route('logout')" method="post" as="button" @click="handleLogOut">
                                Log Out
                            </DropdownLink>
                        </div>
                    </div>
                    <!-- <a href="index.html" class="nav-item nav-link" :class="{'active':getRoute()==''}">Home</a>
                    <a href="about.html" class="nav-item nav-link" :class="{'active':getRoute()=='properti'}">Properti</a>

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Property00</a>
                        <div class="dropdown-menu rounded-0 m-0">
                            <a href="property-list.html" class="dropdown-item">Property List</a>
                            <a href="property-type.html" class="dropdown-item">Property Type</a>
                            <a href="property-agent.html" class="dropdown-item">Property Agent</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                        <div class="dropdown-menu rounded-0 m-0">
                            <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                            <a href="404.html" class="dropdown-item">404 Error</a>
                        </div>
                    </div>
                    <a href="contact.html" class="nav-item nav-link">Contact</a> -->
                </div>
                <a href="" class="btn btn-primary px-3 d-none d-lg-flex">Bergabung</a>
            </div>
        </nav>
    </div>
</template>

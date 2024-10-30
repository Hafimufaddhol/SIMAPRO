<script setup>
// import Checkbox from '@/Components/Checkbox.vue';
// import GuestLayout from '@/Layouts/GuestLayout.vue';
// import InputError from '@/Components/InputError.vue';
// import InputLabel from '@/Components/InputLabel.vue';
// import PrimaryButton from '@/Components/PrimaryButton.vue';
// import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import CustomButton from "@/Components/CustomButton.vue";
import CustomInput from "@/Components/CustomInput.vue";
import CustomCheckBox from '@/Components/CustomCheckBox.vue';

defineProps({
    canResetPassword: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <div class="backgrd">
        <main class="main-content">
            <div class="page-header align-items-start m-3 min-vh-50 pt-5 pb-10 border-radius-lg"
                style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/signup-cover.jpg'); background-position: top;">
                <span class="mask bg-gradient-dark opacity-6"></span>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5 text-center mx-auto">
                            <h1 class="text-white mb-2 mt-5">Temukan Rumah Impianmu di Sini!</h1>
                            <p class="text-lead text-white">Daftar sekarang dan dapatkan akses ke ribuan listing
                                properti terbaru, lengkap dengan foto, video, dan informasi detail</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row mt-lg-n10 mt-md-n11 mt-n10 justify-content-center">
                    <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
                        <div class="card z-index-0">
                            <div class="card-header text-center pt-4">
                                <h5>Masuk</h5>
                            </div>
                            <div class="card-body">
                                <form @submit.prevent="submit">
                                    <custom-input id="email" type="email" placeholder="Email" aria-label="Email"
                                        v-model="form.email" />
                                    <custom-input id="password" type="password" placeholder="Password"
                                        aria-label="Password" v-model="form.password" />
                                        <div class="mt-3">
                                    <custom-check-box id="remember" name="remember" :checked="form.remember === true">
                                        Ingat Saya?
                                    </custom-check-box>
                                </div>
                                    <div class="text-center">
                                        <custom-button fullWidth color="dark" variant="gradient"
                                            class="my-4 mb-2">Masuk</custom-button>
                                    </div>
                                    <p class="text-sm mt-3 mb-0">
                                        Belum Punya Akun?
                                        <Link :href="route('register')" class="text-dark font-weight-bolder">Daftar
                                        </Link>
                                    </p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</template>
<style scoped>
.main-content {
    background-color: #fff !important;

}

.backgrd {
    padding-top: 0.25rem !important;
    height: 100vh;
    background-color: #fff;

}

.container,
.container-fluid,
.container-xxl,
.container-xl,
.container-lg,
.container-md,
.container-sm {
    --bs-gutter-x: 1.5rem;
    --bs-gutter-y: 0;
    width: 100%;
    padding-right: calc(var(--bs-gutter-x) * 0.5);
    padding-left: calc(var(--bs-gutter-x) * 0.5);
    margin-right: auto;
    margin-left: auto;
}

.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid rgba(0, 0, 0, .125);
    border-radius: 1rem;
    box-shadow: 0 0 2rem 0 rgba(136, 152, 170, .15);
}

.page-header {
    align-items: start;
    min-height: 50vh;
    padding-top: 5rem;
    padding-bottom: 11rem;
    margin: 1rem;
    border-radius: 1rem;
    background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/signup-cover.jpg');
    background-position: top;
}


.text-white {
    color: #fff !important;
}

.text-dark {
    color: #344767 !important;
}

.font-weight-bolder {
    font-weight: bolder !important;
}

.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid rgba(0, 0, 0, .125);
    border-radius: 1rem;
    box-shadow: 0 0 2rem 0 rgba(136, 152, 170, .15);
}

.card-header {
    text-align: center;
    padding-top: 1rem;
}

.btn {
    width: 100%;
    padding: 0.75rem;
    border-radius: 0.375rem;
}

.btn.bg-gradient-dark {
    background: linear-gradient(90deg, #1a2035, #283044);
    color: #fff;
}

.form-check-input {
    width: 1.25rem;
    height: 1.25rem;
    border-radius: 0.25rem;
}

.form-check-label {
    color: #6c757d;
}

.form-control {
    display: block;
    width: 100%;
    padding: 0.75rem;
    font-size: 0.875rem;
    color: #67748e;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #dee2e6;
    border-radius: 0.375rem;
    transition: all 0.2s ease;
}

.form-control:focus {
    color: #67748e;
    background-color: #fff;
    border-color: #5e72e4;
    outline: 0;
    box-shadow: 0 0.125rem 0.25rem rgba(94, 114, 228, 0.15);
}

/* Typography */
h1,
.h1 {
    font-size: 3rem;
    font-weight: 700;
    font-family: 'Open Sans', sans-serif;
}

h5 {
    font-family: 'Open Sans', sans-serif;
    font-weight: 600;
}


.text-sm {
    font-size: 0.875rem;
}

/* Layout and Spacing */
.container {
    max-width: 1350px;
    padding-left: 1.5rem;
    padding-right: 1.5rem;
    margin-left: auto;
    margin-right: auto;
}
</style>

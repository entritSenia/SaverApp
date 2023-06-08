<script setup>
import { useForm } from "@inertiajs/vue3";
const login = () => form.post(route("login.store"));

const form = useForm({
    loginusername: null,
    loginpassword: null,
});
</script>

<template>
    <div class="container login-page">
        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-6 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <!-- <div
                                class="col-lg-6 d-none d-lg-block bg-login-image"
                            ></div> -->
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center form-details">
                                        <div
                                            class="row align-items-center text-center justify-content-center"
                                        >
                                            <img src="/logo.png" />
                                            <h1 class="h4 text-gray-900 mb-4">
                                                saver
                                            </h1>
                                        </div>
                                        <p>INCOMES MANAGEMENT APPLICATION</p>
                                    </div>
                                    <form @submit.prevent="login" class="user">
                                        <div class="form-group">
                                            <input
                                                v-model="form.loginusername"
                                                type="text"
                                                class="form-control form-control-user"
                                                id="loginusername"
                                                aria-describedby="emailHelp"
                                                placeholder="Enter Username..."
                                            />
                                            <p
                                                v-if="form.errors.loginusername"
                                                class="m-0 alert alert-danger shadow-sm"
                                            >
                                                {{ form.errors.loginusername }}
                                            </p>
                                        </div>
                                        <div class="form-group">
                                            <input
                                                v-model="form.loginpassword"
                                                type="password"
                                                class="form-control form-control-user"
                                                id="loginpassword"
                                                placeholder="Password"
                                            />
                                            <p
                                                v-if="form.errors.loginpassword"
                                                class="m-0 alert alert-danger shadow-sm"
                                            >
                                                {{ form.errors.loginpassword }}
                                            </p>
                                        </div>
                                        <!-- <div class="form-group">
                                            <div
                                                class="custom-control custom-checkbox small"
                                            >
                                                <input
                                                    type="checkbox"
                                                    class="custom-control-input"
                                                    id="customCheck"
                                                />
                                                <label
                                                    class="custom-control-label"
                                                    for="customCheck"
                                                    >Remember Me</label
                                                >
                                            </div>
                                        </div> -->
                                        <button
                                            type="submit"
                                            class="btn btn-primary btn-user btn-block"
                                        >
                                            Login
                                        </button>
                                        <!-- <hr /> -->
                                        <!-- <a
                                            href="index.html"
                                            class="btn btn-google btn-user btn-block"
                                        >
                                            <i class="fab fa-google fa-fw"></i>
                                            Login with Google
                                        </a>
                                        <a
                                            href="index.html"
                                            class="btn btn-facebook btn-user btn-block"
                                        >
                                            <i
                                                class="fab fa-facebook-f fa-fw"
                                            ></i>
                                            Login with Facebook
                                        </a> -->
                                    </form>
                                    <hr />
                                    <!-- <div class="text-center">
                                        <a
                                            class="small"
                                            href="forgot-password.html"
                                            >Forgot Password?</a
                                        >
                                    </div> -->
                                    <div class="text-center">
                                        <a
                                            class="small"
                                            :href="route('register')"
                                            >Create an Account!</a
                                        >
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

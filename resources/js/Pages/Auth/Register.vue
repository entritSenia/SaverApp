<script setup>
import { useForm, Link } from "@inertiajs/vue3";
const register = () => form.post(route("register.registerStore"));

const form = useForm({
    username: null,
    email: null,
    phone: null,
    password: null,
    password_confirmation: null,
});
</script>

<template>
    <div class="container register-page">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-6 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <!-- <div
                        class="col-lg-5 d-none d-lg-block bg-register-image"
                    ></div> -->
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">
                                            Create an Account!
                                        </h1>
                                    </div>
                                    <form
                                        @submit.prevent="register"
                                        class="user"
                                    >
                                        <div class="form-group">
                                            <input
                                                type="hidden"
                                                name="token"
                                                value="{{ $token }}"
                                            />
                                            <!-- csrf token protection -->
                                            <input
                                                v-model="form.username"
                                                type="text"
                                                class="form-control form-control-user"
                                                id="username"
                                                placeholder="First Name"
                                            />
                                            <p
                                                v-if="form.errors.username"
                                                class="m-0 alert alert-danger shadow-sm"
                                            >
                                                {{ form.errors.username }}
                                            </p>
                                        </div>
                                        <div class="form-group">
                                            <input
                                                v-model="form.email"
                                                type="email"
                                                class="form-control form-control-user"
                                                id="email"
                                                placeholder="Email Address"
                                            />
                                            <p
                                                v-if="form.errors.email"
                                                class="m-0 alert alert-danger shadow-sm"
                                            >
                                                {{ form.errors.email }}
                                            </p>
                                        </div>
                                        <div class="form-group">
                                            <!-- <label>Phone number</label> -->
                                            <input
                                                type="text"
                                                class="form-control form-control-user"
                                                v-model="form.phone"
                                                id="phone"
                                                placeholder="Phone Number"
                                            />
                                            <div
                                                class="m-0 alert alert-danger shadow-sm"
                                                v-if="form.errors.phone"
                                            >
                                                {{ form.errors.phone }}
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input
                                                    v-model="form.password"
                                                    type="password"
                                                    class="form-control form-control-user"
                                                    id="password"
                                                    placeholder="Password"
                                                />
                                                <p
                                                    v-if="form.errors.password"
                                                    class="m-0 alert alert-danger shadow-sm"
                                                >
                                                    {{ form.errors.password }}
                                                </p>
                                            </div>
                                            <div class="col-sm-6">
                                                <input
                                                    v-model="
                                                        form.password_confirmation
                                                    "
                                                    type="password"
                                                    class="form-control form-control-user"
                                                    id="password_confirmation"
                                                    placeholder="Confirm Password"
                                                />
                                                <p
                                                    v-if="
                                                        form.errors
                                                            .password_confirmation
                                                    "
                                                    class="m-0 alert alert-danger shadow-sm"
                                                >
                                                    {{
                                                        form.errors
                                                            .password_confirmation
                                                    }}
                                                </p>
                                            </div>
                                        </div>
                                        <button
                                            class="btn btn-primary btn-user btn-block"
                                        >
                                            Register Account
                                        </button>
                                        <!-- <hr />
                                        <a
                                            href="index.html"
                                            class="btn btn-google btn-user btn-block"
                                        >
                                            <i class="fab fa-google fa-fw"></i>
                                            Register with Google
                                        </a>
                                        <a
                                            href="index.html"
                                            class="btn btn-facebook btn-user btn-block"
                                        >
                                            <i
                                                class="fab fa-facebook-f fa-fw"
                                            ></i>
                                            Register with Facebook
                                        </a> -->
                                    </form>
                                    <hr />
                                    <div class="text-center">
                                        <!-- <Link
                                            class="small"
                                            href="forgot-password.html"
                                            >Forgot Password?</Link
                                        > -->
                                    </div>
                                    <div class="text-center">
                                        <Link
                                            class="small"
                                            :href="route('login')"
                                            >Already have an account?
                                            Login!</Link
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

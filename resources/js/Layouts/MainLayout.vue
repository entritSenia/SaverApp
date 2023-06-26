<script setup>
import { Link, usePage } from "@inertiajs/vue3";
import { computed, watch, onMounted, ref } from "vue";
import { useToast } from "vue-toastification";
import Loading from "@/Components/Loading.vue";
const username = computed(() => page.props.user?.username || "Guest");

const page = usePage();

const loggedIn = computed(() => {
    return page.props.loggedIn.user;
});

const isLoading = ref(true);

//toastify
const $toast = useToast();
watch(
    () => page.props.flash,
    (flash) => {
        if (flash.success)
            $toast.success(page.props.flash.success, {
                position: "top-right",
                timeout: 3000,
                // autoClose: 2000,
                closeOnClick: true,
                // pauseOnFocusLoss: true,
                // pauseOnHover: true,
                // draggable: true,
                // draggablePercent: 0.6,
                // showCloseButtonOnHover: false,
                hideProgressBar: false,
                closeButton: "button",
                icon: true,
                rtl: false,
            });
        if (flash.error)
            $toast.error(page.props.flash.error, {
                position: "top-right",
                timeout: 3000,
                // autoClose: 2000,
                closeOnClick: true,
                // pauseOnFocusLoss: true,
                // pauseOnHover: true,
                // draggable: true,
                // draggablePercent: 0.6,
                // showCloseButtonOnHover: false,
                hideProgressBar: false,
                closeButton: "button",
                icon: true,
                rtl: false,
            });
    }
);

onMounted(() => {
    isLoading.value = true;

    setTimeout(() => {
        isLoading.value = false;
    }, 500);
});
</script>

<template>
    <Transition v-if="isLoading">
        <Loading v-if="isLoading" />
        <!-- Page Wrapper -->
    </Transition>

    <div v-else id="wrapper">
        <!-- Sidebar -->
        <div v-if="loggedIn">
            <ul
                class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion"
                id="accordionSidebar"
            >
                <!-- Sidebar - Brand -->
                <Link
                    class="sidebar-brand d-flex align-items-center justify-content-center"
                    href="/"
                >
                    <!-- rotate-n-15 -->
                    <div class="sidebar-brand-icon">
                        <img
                            src="/logo-w.png"
                            style="width: 25px; height: 35px"
                        />
                    </div>
                    <div class="sidebar-brand-text mx-3">saver <sup></sup></div>
                </Link>

                <!-- Divider -->
                <hr class="sidebar-divider my-0" />

                <!-- Nav Item - Dashboard -->
                <li class="nav-item active">
                    <Link class="nav-link" href="/">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Dashboard</span></Link
                    >
                </li>

                <!-- Nav Item - Profile -->
                <li class="nav-item">
                    <Link class="nav-link" href="/profile">
                        <i class="fa-solid fa-user mr-2"></i>
                        <span>Profile</span></Link
                    >
                </li>

                <!-- Nav Item - Create -->
                <li class="nav-item">
                    <Link class="nav-link" href="/listing/create">
                        <i class="fas fa-fw fa-plus"></i>
                        <span>Create</span></Link
                    >
                </li>

                <!-- Nav Item - Tables -->
                <li class="nav-item">
                    <Link class="nav-link" href="/listing/table">
                        <i class="fas fa-fw fa-table"></i>
                        <span>Data</span></Link
                    >
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider d-none d-md-block" />

                <!-- Sidebar Toggler (Sidebar) -->
                <div class="text-center d-none d-md-inline">
                    <button
                        class="rounded-circle border-0"
                        id="sidebarToggle"
                    ></button>
                </div>

                <!-- Sidebar Message -->
                <!-- <div class="sidebar-card d-none d-lg-flex"></div> -->
            </ul>
        </div>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- End of Topbar -->
                <div id="content-wrapper" class="d-flex flex-column">
                    <div v-if="loggedIn">
                        <nav
                            class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow"
                        >
                            <!-- Sidebar Toggle (Topbar) -->
                            <button
                                id="sidebarToggleTop"
                                class="btn btn-link d-md-none rounded-circle mr-3"
                            >
                                <i class="fa fa-bars"></i>
                            </button>

                            <!-- Topbar Search -->
                            <form
                                class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search"
                            >
                                <div class="input-group">
                                    <input
                                        type="text"
                                        class="form-control bg-light border-0 small"
                                        placeholder="Search for..."
                                        aria-label="Search"
                                        aria-describedby="basic-addon2"
                                    />
                                    <div class="input-group-append">
                                        <button
                                            class="btn btn-primary"
                                            type="button"
                                        >
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>

                            <!-- Topbar Navbar -->
                            <ul class="navbar-nav ml-auto">
                                <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                                <li
                                    class="nav-item dropdown no-arrow d-sm-none"
                                >
                                    <a
                                        class="nav-link dropdown-toggle"
                                        href="#"
                                        id="searchDropdown"
                                        role="button"
                                        data-toggle="dropdown"
                                        aria-haspopup="true"
                                        aria-expanded="false"
                                    >
                                        <i class="fas fa-search fa-fw"></i>
                                    </a>
                                    <!-- Dropdown - Messages -->
                                    <div
                                        class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                        aria-labelledby="searchDropdown"
                                    >
                                        <form
                                            class="form-inline mr-auto w-100 navbar-search"
                                        >
                                            <div class="input-group">
                                                <input
                                                    type="text"
                                                    class="form-control bg-light border-0 small"
                                                    placeholder="Search for..."
                                                    aria-label="Search"
                                                    aria-describedby="basic-addon2"
                                                />
                                                <div class="input-group-append">
                                                    <button
                                                        class="btn btn-primary"
                                                        type="button"
                                                    >
                                                        <i
                                                            class="fas fa-search fa-sm"
                                                        ></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </li>
                                <!-- Nav Item - User Information -->
                                <li class="nav-item dropdown no-arrow">
                                    <Link
                                        class="nav-link dropdown-toggle"
                                        href="/profile"
                                        role="button"
                                    >
                                        <span
                                            class="mr-2 d-none d-lg-inline text-gray-600 small"
                                            >{{ username }}</span
                                        >
                                        <img
                                            class="img-profile rounded-circle"
                                            src="../../img/undraw_profile.svg"
                                        />
                                    </Link>
                                </li>
                                <li class="nav-item dropdown no-arrow">
                                    <Link
                                        method="DELETE"
                                        class="dropdown-item logout"
                                        :href="route('logout')"
                                        data-toggle="modal"
                                        data-target="#logoutModal"
                                        as="button"
                                    >
                                        <i
                                            class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"
                                        ></i>
                                        <!-- Logout -->
                                    </Link>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <!-- End of Topbar -->
                    <slot></slot>
                </div>
                <!-- Footer -->
                <!-- <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; Your Website 2021</span>
                        </div>
                    </div>
                </footer> -->
                <!-- End of Footer -->
            </div>
        </div>
    </div>
</template>

<style scoped>
.fade-leave-to {
    opacity: 0;
}

.fade-enter-to {
    opacity: 1;
}

.fade-enter-active {
    transition: opacity 0.5s;
}
</style>

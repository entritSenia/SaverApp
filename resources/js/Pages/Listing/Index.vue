<script setup>
import { usePage } from "@inertiajs/vue3";
import Chart from "chart.js/auto";
import { onMounted, defineProps, computed } from "vue";

// import { Link } from "@inertiajs/vue3";
const props = defineProps({
    listings: Array,
    totalPrice: String,
    homeData: Array,
    carData: Array,
    data: Array,
});
// console.log(props.homeData);
// console.log(props.electricity.price);
// console.log("housePrice = ", props.homePrice);

console.log(props.data);

const page = usePage();

const income = computed(() => page.props.user?.income || "income");

onMounted(() => {
    console.log(`the component is now mounted.`);

    const ctx = document.getElementById("barChart");
    const alldata = props.data.map(
        (data) => data.need.charAt(0).toUpperCase() + data.need.slice(1)
    );
    const label = alldata.map((item) => `${item}`);
    console.log(label);
    const alldataprice = props.data.map((data) => data.price);
    const dataprice = alldataprice.map((item) => `${item}`);

    const data = {
        labels: label,
        datasets: [
            {
                label: label,
                data: dataprice,
                borderColor: [
                    "#CB4335",
                    "#1F618D",
                    "#F1C40F",
                    "#27AE60",
                    "#884EA0",
                    "#D35400",
                ],
                backgroundColor: "#ff6666",
            },
        ],
    };

    const barChart = new Chart(ctx, {
        type: "bar",
        data: data,
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: "top",
                },
                title: {
                    display: true,
                    text: "All my Expenses",
                },
            },
        },
    });
    barChart;

    const ctx2 = document.getElementById("myChart");
    const homeData = props.homeData.map(
        (data) => data.need.charAt(0).toUpperCase() + data.need.slice(1)
    );
    const labels2 = homeData.map((item) => `${item}`);

    const homeDataPrice = props.homeData.map((data) => data.price);
    const dataPrice = homeDataPrice.map((item) => `${item}`);
    const data2 = {
        labels: labels2,

        datasets: [
            {
                label: "$",
                data: dataPrice,
                borderWidth: 1,
                backgroundColor: [
                    "#CB4335",
                    "#1F618D",
                    "#F1C40F",
                    "#27AE60",
                    "#884EA0",
                    "#D35400",
                ],
                boxWidth: 50,
            },
        ],
    };

    const myChart = new Chart(ctx2, {
        type: "pie",
        data: data2,
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: "top",
                },
                title: {
                    display: true,
                    text: "Home Expenses",
                },
            },
        },
    });
    myChart;

    const ctx3 = document.getElementById("doughnut");

    const carData = props.carData.map(
        (data) => data.need.charAt(0).toUpperCase() + data.need.slice(1)
    );
    const labels3 = carData.map((item) => `${item}`);

    const carDataPrice = props.carData.map((data) => data.price);
    const datacarPrice = carDataPrice.map((item) => `${item}`);
    const data3 = {
        labels: labels3,
        datasets: [
            {
                label: "$",
                data: datacarPrice,
                backgroundColor: [
                    "rgb(255, 99, 132)",
                    "rgb(54, 162, 235)",
                    "rgb(255, 205, 86)",
                ],
                hoverOffset: 4,
            },
        ],
    };

    const doughnut = new Chart(ctx3, {
        type: "doughnut",
        data: data3,
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: "top",
                },
                title: {
                    display: true,
                    text: "Car Expenses",
                },
            },
        },
    });
    doughnut;
});
</script>

<template>
    <!-- Content Wrapper -->
    <!-- Main Content -->
    <!-- Topbar -->

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Content Row -->
        <div class="row col-12 justify-content-center">
            <!-- Expenses (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card shadow h-100 py-2">
                    <div class="card-body align-items-center d-flex">
                        <div class="row no-gutters col-12 align-items-center">
                            <div class="col mr-2">
                                <!-- <div
                                    class="text-xs font-weight-bold text-primary text-uppercase mb-1"
                                >
                                    Expenses (Monthly)
                                </div> -->
                                <div
                                    class="row h5 mb-0 font-weight-bold text-gray-800"
                                >
                                    <i
                                        class="fa-solid fa-hand-holding-dollar text-primary mr-3"
                                        style="font-size: 36px"
                                    ></i>
                                    <div>
                                        ${{ totalPrice }}
                                        <h6 class="d-flex">(expenses)</h6>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="col-auto justify-content-end text-right"
                            >
                                <i
                                    class="fa-solid fa-arrow-down ml-2 text-primary"
                                    style="font-size: 26px"
                                ></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card shadow h-100 py-2">
                    <div class="card-body align-items-center d-flex">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <!-- <div
                                    class="text-xs font-weight-bold text-success text-uppercase mb-1"
                                >
                                    Earnings (monthly)
                                </div> -->
                                <div
                                    class="row h5 mb-0 font-weight-bold text-gray-800"
                                >
                                    <i
                                        class="fa-solid fa-dollar-sign text-gray mr-3"
                                        style="font-size: 36px"
                                    ></i>
                                    <div>
                                        ${{ income }}
                                        <h6 class="d-flex">(income)</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <!-- <i
                                    class="fas fa-dollar-sign fa-2x text-gray-300"
                                ></i> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Profit (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card shadow h-100 py-2">
                    <div class="card-body align-items-center d-flex">
                        <div class="row no-gutters col-12 align-items-center">
                            <div class="col mr-2">
                                <!-- <div
                                    class="text-xs font-weight-bold text-success text-uppercase mb-1"
                                >
                                    Profit (monthly)
                                </div> -->
                                <div
                                    class="row h5 mb-0 font-weight-bold text-gray-800"
                                >
                                    <i
                                        class="fa-solid fa-sack-dollar text-success mr-3"
                                        style="font-size: 36px"
                                    ></i>
                                    <div>
                                        ${{ income - totalPrice }}
                                        <h6 class="d-flex">(profit)</h6>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="col-auto justify-content-end text-right"
                            >
                                <i
                                    class="fa-solid fa-arrow-up ml-2 text-success"
                                    style="font-size: 26px"
                                ></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content Row -->
        <div class="row"></div>

        <!-- Content Row -->
        <div class="row col-12 d-flex pl-4 pt-1">
            <div class="col-8">
                <div class="card shadow p-4">
                    <canvas id="barChart"></canvas>
                </div>
            </div>
            <div
                class="col-lg-4 row d-flex text-right justify-content-end mb-0"
            >
                <div class="col-12 card shadow p-4">
                    <!-- <h3 class="text-center">Home Expenses ${{ totalPrice }}</h3> -->
                    <!-- Chart -->
                    <i class="fa-solid fa-house-chimney text-center"></i>
                    <canvas id="myChart"></canvas>
                </div>
            </div>
        </div>

        <div class="row col-12 d-flex pl-4 pt-2">
            <div class="col-4">
                <div class="card shadow p-4">
                    <i class="fa-solid fa-car text-center"></i>
                    <canvas id="doughnut"></canvas>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
    <!-- End of Main Content -->

    <!-- <Link href="/listing/create">Create</Link> -->
</template>

<script setup>
import Pagination from "@/Components/Pagination.vue";
import { Link } from "@inertiajs/vue3";
defineProps({ listings: Object });
</script>

<template>
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Tables</h1>
        <p class="mb-4">
            DataTables is a third party plugin that is used to generate the demo
            table below. For more information about DataTables
        </p>

        <!-- DataTales Example -->
        <div
            class="card shadow mb-4 m-auto justify-content-center col-12 col-sm-12 col-md-12 col-lg-10 col-xl-10 col-xxl-10"
        >
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    DataTables Example
                </h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table
                        class="table table-bordered"
                        id="dataTable"
                        width="100%"
                        cellspacing="0"
                    >
                        <thead>
                            <tr>
                                <th>Status</th>
                                <th>Need</th>
                                <th>Type</th>
                                <th>For</th>
                                <th>Price</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>

                        <tbody
                            v-for="listing in listings.data"
                            :key="listing.id"
                        >
                            <tr>
                                <td v-if="listing.status === 0">Not Paid</td>
                                <td v-else>Paid</td>
                                <td>{{ listing.need }}</td>
                                <td v-if="listing.type === 0">For Pleasure</td>
                                <td v-else>Necessary</td>
                                <td>{{ listing.for }}</td>
                                <td>${{ listing.price }}</td>
                                <td class="border-0">
                                    <Link
                                        :href="
                                            route('listing.edit', listing.id)
                                        "
                                        as="button"
                                        class="btn btn-info btn-circle"
                                        ><i class="fas fa-info-circle"></i
                                    ></Link>
                                </td>
                                <td class="border-0">
                                    <Link
                                        :href="
                                            route('listing.destroy', listing.id)
                                        "
                                        method="delete"
                                        as="button"
                                        class="btn btn-danger btn-circle"
                                        ><i class="fas fa-trash"></i
                                    ></Link>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div v-if="listings.data.length">
                        <Pagination :links="listings.links" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</template>

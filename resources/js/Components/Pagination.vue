<script setup>
import { Link } from "@inertiajs/vue3";
defineProps({ links: Array });
</script>

<template>
    <div class="">
        <nav aria-label="...">
            <ul class="pagination ml-1">
                <!-- <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li> -->
                <Link
                    :is="link.url ? 'li' : 'span'"
                    v-for="link in links"
                    :href="link.url"
                    v-html="link.label"
                    :class="link.url ? 'page-link' : 'span-disabled'"
                />

                <!-- <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li> -->
            </ul>
        </nav>
    </div>
</template>

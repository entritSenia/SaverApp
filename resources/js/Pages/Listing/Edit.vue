<script setup>
import { useForm } from "@inertiajs/vue3";

const props = defineProps({
    listing: Object,
});
const update = () => form.put(route("listing.update", props.listing.id));

const form = useForm({
    need: props.listing.need,
    type: props.listing.type,
    for: props.listing.for,
    status: props.listing.status,
    price: props.listing.price,
});
</script>

<template>
    <form
        class="row col-12 justify-content-start pl-5 pt-3 align-items-center"
        @submit.prevent="update"
    >
        <div class="col-4">
            <div class="form-group">
                <label>Need</label>
                <input
                    class="form-control item"
                    v-model.number="form.need"
                    type="text"
                />
                <div class="input-error" v-if="form.errors.need">
                    {{ form.errors.need }}
                </div>
            </div>

            <div class="form-group">
                <label>Type</label>
                <div>
                    <input
                        type="radio"
                        id="necessary"
                        value="1"
                        v-model="form.type"
                    />
                    <label for="necessary" class="ml-2 mr-4">Necessary</label>

                    <input
                        type="radio"
                        id="forPleasure"
                        value="0"
                        v-model="form.type"
                    />
                    <label for="forPleasure" class="ml-2">For Pleasure</label>

                    <input type="hidden" name="type" :value="form.type" />
                </div>
                <div class="input-error" v-if="form.errors.type">
                    {{ form.errors.type }}
                </div>
            </div>

            <div class="form-group">
                <label>For</label>
                <input
                    class="form-control item"
                    v-model.number="form.for"
                    type="text"
                />
                <div class="input-error" v-if="form.errors.for">
                    {{ form.errors.for }}
                </div>
            </div>

            <div class="form-group">
                <label>Status</label>
                <div>
                    <input
                        type="radio"
                        id="necessary"
                        value="1"
                        v-model="form.status"
                    />
                    <label for="necessary" class="ml-2 mr-4">Paid</label>

                    <input
                        type="radio"
                        id="forPleasure"
                        value="0"
                        v-model="form.status"
                    />
                    <label for="forPleasure" class="ml-2">Not Paid</label>

                    <input type="hidden" name="type" :value="form.satus" />
                </div>
                <div class="input-error" v-if="form.errors.type">
                    {{ form.errors.status }}
                </div>
            </div>

            <div class="form-group">
                <label>Price</label>
                <input
                    class="form-control item"
                    v-model="form.price"
                    type="text"
                />
                <div class="input-error" v-if="form.errors.price">
                    {{ form.errors.price }}
                </div>
            </div>

            <div class="form-group pt-3">
                <button class="btn btn-primary" type="submit">Edit</button>
            </div>
        </div>
    </form>
</template>

<style scoped></style>

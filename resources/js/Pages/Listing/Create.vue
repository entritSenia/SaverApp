<script setup>
import { useForm } from "@inertiajs/vue3";

const create = () => form.post(route("listing.store"));

const form = useForm({
    need: null,
    type: true,
    for: null,
    status: true,
    price: 0,
});
</script>

<template>
    <form
        class="row col-12 justify-content-start pl-5 pt-3 align-items-center"
        @submit.prevent="create"
    >
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-4 col-xxl-4">
            <div class="form-group">
                <label>Need</label>
                <input type="hidden" name="token" value="{{ $token }}" />
                <!-- csrf token protection -->
                <input
                    v-model.number="form.need"
                    class="form-control item"
                    type="text"
                    placeholder="rent..."
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
                <!-- <div class="input-error" v-if="form.errors.type">
                    {{ form.errors.type }}
                </div> -->
            </div>

            <div class="form-group">
                <label>For</label>
                <div>
                    <input
                        type="radio"
                        id="necessary"
                        value="0"
                        v-model="form.for"
                    />
                    <label for="necessary" class="ml-2 mr-4">Home</label>

                    <input
                        type="radio"
                        id="forPleasure"
                        value="1"
                        v-model="form.for"
                    />
                    <label for="forPleasure" class="ml-2 mr-4">Car</label>

                    <input
                        type="radio"
                        id="forPleasure"
                        value="2"
                        v-model="form.for"
                    />
                    <label for="forPleasure" class="ml-2 mr-4"
                        >Subscription</label
                    >

                    <input
                        type="radio"
                        id="forPleasure"
                        value="3"
                        v-model="form.for"
                    />
                    <label for="forPleasure" class="ml-2 mr-4">Food</label>

                    <input type="hidden" name="type" :value="form.type" />
                </div>
                <!-- <div class="input-error" v-if="form.errors.type">
                    {{ form.errors.type }}
                </div> -->
            </div>

            <!-- <div class="form-group">
                <label>For</label>
                <input
                    v-model="form.for"
                    class="form-control item"
                    type="text"
                />
                <div class="input-error" v-if="form.errors.for">
                    {{ form.for }}
                </div>
            </div> -->

            <div class="form-group">
                <label>Type</label>
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

                    <input type="hidden" name="type" :value="form.status" />
                </div>
                <!-- <div class="input-error" v-if="form.errors.type">
                    {{ form.errors.type }}
                </div> -->
            </div>

            <div class="form-group">
                <label>Price</label>
                <input
                    v-model.number="form.price"
                    class="form-control item"
                    type="text"
                />
                <div class="input-error" v-if="form.errors.price">
                    {{ form.errors.price }}
                </div>
            </div>

            <div class="form-group pt-3">
                <button class="btn btn-primary" type="submit">Create</button>
            </div>
        </div>
    </form>
</template>

<style scoped></style>

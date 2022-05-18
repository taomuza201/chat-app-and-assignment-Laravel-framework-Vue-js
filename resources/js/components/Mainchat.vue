<template>
    <div>
        <div class="chat-body hide-scrollbar flex-1 h-100  sc" v-chat-scroll="{always: true, smooth: true}"
            id="chat_container" ref="chat_container">
            <div class="chat-body-inner">
                <div class="py-6 py-lg-12" id="chat_container_messages">
                    <div v-for="(message, index) in messages" :key="index">

                        <div v-if="message.user.id != user.id">
                            <!-- Message -->
                            <div class="message">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#modal-user-profile"
                                    class="avatar avatar-responsive">
                                    <img class="avatar-img" v-if="message.user.profile ==null"
                                        v-bind:src="'profile_upload/profile.png'" alt="">

                                    <img class="avatar-img" v-else v-bind:src="'profile_upload/'+message.user.profile"
                                        alt=""></a>
                                <div></div>

                                <div class="message-inner">
                                    <div class="message-body">
                                        {{ message.user.name }}

                                        <div class="message-content">

                                            <div class="message-text">

                                                <div class="row align-items-center gx-4" v-if="message.type =='file'">
                                                    <div class="col-auto">
                                                        <a :href="'upload_file/'+message.message" Download
                                                            class="avatar avatar-sm">
                                                            <div class="avatar-text bg-white text-primary">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-arrow-down">
                                                                    <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                    <polyline points="19 12 12 19 5 12">
                                                                    </polyline>
                                                                </svg>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="col overflow-hidden">
                                                        <h6 class="text-truncate text-reset">
                                                            <a :href="'upload_file/'+message.message" Download
                                                                class="text-reset">{{message.message}}</a>
                                                        </h6>

                                                    </div>
                                                </div>

                                                <p v-if="message.type =='message'">
                                                    {{ message.message }}</p>
                                                <div class="message-gallery" v-if="message.type =='picture'">
                                                    <div class="row gx-3">
                                                        <div class="col">
                                                            <img class="img-fluid rounded"
                                                                :src="'upload_file/'+message.message" data-action="zoom"
                                                                alt=""></div>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                    </div>

                                    <div class="message-footer">
                                        <span class="extra-small text-muted">
                                            {{ message.created_at_chat | moment("dddd Do MMMM YYYY, H:mm:ss ")}}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div v-else>
                            <!-- Message -->
                            <div class="message message-out">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#modal-profile"
                                    class="avatar avatar-responsive">
                                    <img class="avatar-img" v-bind:src="'profile_upload/'+user.profile" alt=""></a>

                                <div class="message-inner">
                                    <div class="message-body text-right">
                                        <span class=""></span>
                                        {{ message.user.name }}
                                        <div class="message-content">
                                            <div class="message-text">

                                                <div class="row align-items-center gx-4" v-if="message.type =='file'">
                                                    <div class="col-auto">
                                                        <a :href="'upload_file/'+message.message" Download
                                                            class="avatar avatar-sm">
                                                            <div class="avatar-text bg-white text-primary">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-arrow-down">
                                                                    <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                    <polyline points="19 12 12 19 5 12">
                                                                    </polyline>
                                                                </svg>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="col overflow-hidden">
                                                        <h6 class="text-truncate text-reset">
                                                            <a :href="'upload_file/'+message.message" Download
                                                                class="text-reset">{{message.message}}</a>
                                                        </h6>

                                                    </div>
                                                </div>

                                                <p v-if="message.type =='message'">
                                                    {{ message.message }}</p>
                                                <div class="message-gallery" v-if="message.type =='picture'">
                                                    <div class="row gx-3">
                                                        <div class="col">
                                                            <img class="img-fluid rounded"
                                                                :src="'upload_file/'+message.message" data-action="zoom"
                                                                alt=""></div>
                                                    </div>
                                                </div>

                                            </div>

                                            <!-- Dropdown -->
                                            <div class="message-action">
                                                <div class="dropdown">
                                                    <a class="icon text-muted" href="#" role="button"
                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            class="feather feather-more-vertical">
                                                            <circle cx="12" cy="12" r="1"></circle>
                                                            <circle cx="12" cy="5" r="1"></circle>
                                                            <circle cx="12" cy="19" r="1"></circle>
                                                        </svg>
                                                    </a>

                                                    <ul class="dropdown-menu">

                                                        <li>
                                                            <a class="dropdown-item d-flex align-items-center text-danger"
                                                                v-on:click="delete_messages(message.ms_id)" href="#">
                                                                <span class="me-auto">Delete</span>
                                                                <div class="icon">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                                        stroke="currentColor" stroke-width="2"
                                                                        stroke-linecap="round" stroke-linejoin="round"
                                                                        class="feather feather-trash-2">
                                                                        <polyline points="3 6 5 6 21 6">
                                                                        </polyline>
                                                                        <path
                                                                            d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                                        </path>
                                                                        <line x1="10" y1="11" x2="10" y2="17"></line>
                                                                        <line x1="14" y1="11" x2="14" y2="17"></line>
                                                                    </svg>
                                                                </div>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="message-footer">
                                        <span
                                            class="extra-small text-muted">{{ message.created_at_chat | moment("dddd Do MMMM YYYY, H:mm:ss ")}}
                                        </span>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- <div v-if="index == messages.length - 1">yes</div> -->


                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['message'],
    }

</script>

<style>

</style>

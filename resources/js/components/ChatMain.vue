<template>
    <div>
        <vue-confirm-dialog></vue-confirm-dialog>
        <!-- Layout -->
        <div class="layout overflow-hidden">
            <!-- Navigation -->

            <nav class="navigation1 d-flex flex-column text-center navbar navbar-light hide-scrollbar">
                <!-- Brand -->
                <a href="/" title="Messenger" class="d-none d-xl-block mb-6">
                    <img src="icon/octopus.png" alt="" style="width=46px;height:46px;">
                </a>

                <!-- Nav items -->
                <ul class="d-flex nav navbar-nav flex-row flex-xl-column flex-grow-1 justify-content-between justify-content-xl-center align-items-center w-100 py-4 py-lg-2 px-lg-3"
                    role="tablist">
                    <!-- Invisible item to center nav vertically -->
                    <li class="nav-item d-none d-xl-block invisible flex-xl-grow-1">
                        <a class="nav-link py-0 py-lg-8" href="#" title="">
                            <div class="icon icon-xl">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-x">
                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                </svg>
                            </div>
                        </a>
                    </li>

                    <!-- New chat -->
                    <li class="nav-item">
                        <a class="nav-link py-0 py-lg-8" id="tab-create-chat" href="#tab-content-create-chat"
                            title="Create chat" data-bs-toggle="tab" role="tab">
                            <div class="icon icon-xl">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-edit-3">
                                    <path d="M12 20h9"></path>
                                    <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path>
                                </svg>
                            </div>
                        </a>
                    </li>

                    <!-- Friends -->
                    <li class="nav-item">
                        <a class="nav-link py-0 py-lg-8" id="tab-friends" href="#tab-content-friends" title="Friends"
                            data-bs-toggle="tab" role="tab">
                            <div class="icon icon-xl">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-users">
                                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="9" cy="7" r="4"></circle>
                                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                </svg>
                            </div>
                        </a>
                    </li>

                    <!-- Chats -->
                    <li class="nav-item">
                        <a class="nav-link active py-0 py-lg-8" id="tab-chats" href="#tab-content-chats" title="Chats"
                            data-bs-toggle="tab" role="tab">
                            <div class="icon icon-xl icon-badged">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-message-square">
                                    <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                                </svg>
                                <div class="badge badge-circle bg-primary">
                                    <span v-if="userread != 0 ">{{userread}}</span>
                                    <span v-else>0</span>

                                </div>
                            </div>
                        </a>
                    </li>

                    <!-- Notification -->
                    <li class="nav-item">
                        <a class="nav-link py-0 py-lg-8" id="tab-assignment" href="#tab-content-assignment"
                            title="assignment" data-bs-toggle="tab" role="tab">
                            <div class="icon icon-xl">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-layout">
                                    <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                    <line x1="3" y1="9" x2="21" y2="9"></line>
                                    <line x1="9" y1="21" x2="9" y2="9"></line>
                                </svg>
                            </div>
                        </a>
                    </li>

                    <!-- Support -->
                    <!-- <li class="nav-item d-none d-xl-block flex-xl-grow-1">
                        <a class="nav-link py-0 py-lg-8" id="tab-support" href="#tab-content-support" title="Support"
                            data-bs-toggle="tab" role="tab">
                            <div class="icon icon-xl">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-layout">
                                    <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                    <line x1="3" y1="9" x2="21" y2="9"></line>
                                    <line x1="9" y1="21" x2="9" y2="9"></line>
                                </svg>
                            </div>
                        </a>
                    </li> -->

                    <!-- Settings -->
                    <li class="nav-item ">
                        <a class="nav-link py-0 py-lg-8" id="tab-settings" href="#tab-content-settings" title="Settings"
                            data-bs-toggle="tab" role="tab">
                            <div class="icon icon-xl">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-settings">
                                    <circle cx="12" cy="12" r="3"></circle>
                                    <path
                                        d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z">
                                    </path>
                                </svg>
                            </div>
                        </a>
                    </li>

                    <!-- Profile -->
                    <li class="nav-item">
                        <a href="#" class="nav-link p-0 mt-lg-2" data-bs-toggle="modal" data-bs-target="#modal-profile">
                            <!-- <div class="avatar avatar-online mx-auto d-none d-xl-block">
                                <img class="avatar-img"  v-bind:src="'profile_upload/'+user.profile"  alt="">
                            </div> -->
                            <div class="avatar  avatar-xs mx-auto ">
                                <img class="avatar-img" v-bind:src="'profile_upload/profile.png'" alt=""
                                    v-if="user.profile==null">
                                <img class="avatar-img" v-bind:src="'profile_upload/'+user.profile" alt="" v-else></div>
                        </a>
                    </li>
                </ul>
            </nav>

            <!-- Navigation -->

            <!-- Sidebar -->
            <aside class="sidebar bg-light">
                <div class="tab-content h-100" role="tablist">
                    <!-- Create -->
                    <div class="tab-pane fade h-100" id="tab-content-create-chat" role="tabpanel">
                        <div class="d-flex flex-column h-100">
                            <div class="hide-scrollbar">

                                <div class="container py-8">

                                    <!-- Title -->
                                    <div class="mb-8">
                                        <h2 class="fw-bold m-0">Create chat</h2>
                                    </div>

                                    <!-- Search -->
                                    <div class="mb-6">
                                        <div class="mb-5">
                                            <form action="#">
                                                <div class="input-group">
                                                    <div class="input-group-text">
                                                        <div class="icon icon-lg">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-search">
                                                                <circle cx="11" cy="11" r="8"></circle>
                                                                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                                            </svg>
                                                        </div>
                                                    </div>

                                                    <input type="text" class="form-control form-control-lg ps-0"
                                                        v-model="search_user_group" placeholder="Search users"
                                                        aria-label="Search for  users...">
                                                </div>
                                            </form>
                                        </div>

                                        <ul class="nav nav-pills nav-justified" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" data-bs-toggle="pill"
                                                    href="#create-chat-info" role="tab" aria-controls="create-chat-info"
                                                    aria-selected="true">
                                                    Details
                                                </a>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link" data-bs-toggle="pill" href="#create-chat-members"
                                                    role="tab" aria-controls="create-chat-members" aria-selected="true">
                                                    People
                                                </a>
                                            </li>
                                        </ul>
                                    </div>

                                    <!-- Tabs content -->
                                    <div class="tab-content" role="tablist">
                                        <div class="tab-pane fade show active" id="create-chat-info" role="tabpanel">

                                            <div class="card border-0">
                                                <div class="profile">
                                                    <div class="profile-img text-primary rounded-top">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                            viewBox="0 0 400 140.74">

                                                            <g>
                                                                <g>
                                                                    <path
                                                                        d="M400,125A1278.49,1278.49,0,0,1,0,125V0H400Z" />
                                                                    <path class="cls-2"
                                                                        d="M361.13,128c.07.83.15,1.65.27,2.46h0Q380.73,128,400,125V87l-1,0a38,38,0,0,0-38,38c0,.86,0,1.71.09,2.55C361.11,127.72,361.12,127.88,361.13,128Z" />
                                                                    <path class="cls-2"
                                                                        d="M12.14,119.53c.07.79.15,1.57.26,2.34v0c.13.84.28,1.66.46,2.48l.07.3c.18.8.39,1.59.62,2.37h0q33.09,4.88,66.36,8,.58-1,1.09-2l.09-.18a36.35,36.35,0,0,0,1.81-4.24l.08-.24q.33-.94.6-1.9l.12-.41a36.26,36.26,0,0,0,.91-4.42c0-.19,0-.37.07-.56q.11-.86.18-1.73c0-.21,0-.42,0-.63,0-.75.08-1.51.08-2.28a36.5,36.5,0,0,0-73,0c0,.83,0,1.64.09,2.45C12.1,119.15,12.12,119.34,12.14,119.53Z" />
                                                                    <circle class="cls-2" cx="94.5" cy="57.5"
                                                                        r="22.5" />
                                                                    <path class="cls-2"
                                                                        d="M276,0a43,43,0,0,0,43,43A43,43,0,0,0,362,0Z" />
                                                                </g>
                                                            </g>
                                                        </svg>
                                                    </div>

                                                    <div class="profile-body p-0">
                                                        <div class="avatar avatar-lg">
                                                            <span class="avatar-text bg-primary"
                                                                v-if="group_profile_previre == ''">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-image">
                                                                    <rect x="3" y="3" width="18" height="18" rx="2"
                                                                        ry="2"></rect>
                                                                    <circle cx="8.5" cy="8.5" r="1.5"></circle>
                                                                    <polyline points="21 15 16 10 5 21"></polyline>
                                                                </svg>

                                                            </span>

                                                            <img :src="group_profile_previre" alt="" srcset="" v-else
                                                                class="avatar-img">

                                                            <div
                                                                class="badge badge-lg badge-circle bg-primary border-outline position-absolute bottom-0 end-0">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-plus">
                                                                    <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                                                </svg>
                                                            </div>

                                                            <input id="upload-chat-img" class="d-none" type="file"
                                                                @change="onGroup_profileChange()" ref="group_profile">
                                                            <label class="stretched-label mb-0"
                                                                for="upload-chat-img"></label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="card-body">
                                                    <form autocomplete="off">
                                                        <div class="row gy-6">
                                                            <div class="col-12">
                                                                <div class="form-floating">
                                                                    <input type="text" class="form-control"
                                                                        ref="group_name" id="floatingInput"
                                                                        placeholder="Enter a chat name">
                                                                    <label for="floatingInput">Enter group name</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-floating">
                                                                    <textarea class="form-control" ref="group_about"
                                                                        placeholder="Description" id="floatingTextarea"
                                                                        rows="8" data-autosize="true"
                                                                        style="min-height: 100px;"></textarea>
                                                                    <label for="floatingTextarea">What's your
                                                                        purpose?</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>

                                            <div class="d-flex align-items-center mt-4 px-6">
                                                <small class="text-muted me-auto">Enter chat name and add an optional
                                                    photo.</small>
                                            </div>

                                        </div>

                                        <!-- Members -->
                                        <div class="tab-pane fade" id="create-chat-members" role="tabpanel">
                                            <nav>

                                                <!-- Card -->
                                                <div class="card border-0 mt-5"
                                                    v-for="(user, index) in listFilterUserGroup" :key="index">
                                                    <div class="card-body">

                                                        <div class="row align-items-center gx-5">
                                                            <div class="col-auto">
                                                                <div class="avatar ">

                                                                    <img class="avatar-img" v-if="user.profile!= null"
                                                                        v-bind:src="'profile_upload/'+user.profile"
                                                                        alt="">
                                                                    <img class="avatar-img" v-else
                                                                        v-bind:src="'profile_upload/profile.png'"
                                                                        alt=""></div>
                                                            </div>
                                                            <div class="col">
                                                                <h5>{{ user.name }}</h5>
                                                                <!-- <p>last seen 3 days ago</p> -->
                                                            </div>
                                                            <div class="col-auto">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        :value="user.id" :id="'id-member-'+user.id"
                                                                        v-model="checkedUser_group">
                                                                    <label class="form-check-label"
                                                                        :for="'id-member-'+user.id"></label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <label class="stretched-label"
                                                            :for="'id-member-'+user.id"></label>
                                                    </div>
                                                </div>
                                                <!-- Card -->

                                            </nav>
                                        </div>
                                    </div>
                                    <!-- Tabs content -->
                                </div>

                            </div>

                            <!-- Button -->
                            <div class="container mt-n4  position-relative btn-start-chat">
                                <button class="btn btn-lg btn-primary w-100 d-flex align-items-center" type="button"
                                    v-on:click="created_group()">
                                    Start chat
                                    <span class="icon ms-auto">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-chevron-right">
                                            <polyline points="9 18 15 12 9 6"></polyline>
                                        </svg>
                                    </span>
                                </button>
                            </div>
                            <!-- Button -->
                        </div>
                    </div>

                    <!-- Friends -->
                    <div class="tab-pane fade h-100" id="tab-content-friends" role="tabpanel">
                        <div class="d-flex flex-column h-100">
                            <div class="hide-scrollbar">
                                <div class="container py-8  new-mb">

                                    <!-- Title -->
                                    <div class="mb-8">
                                        <h2 class="fw-bold m-0">Chat Group</h2>
                                    </div>

                                    <!-- Search -->
                                    <div class="mb-6">
                                        <form action="#">
                                            <div class="input-group">
                                                <div class="input-group-text">
                                                    <div class="icon icon-lg">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" class="feather feather-search">
                                                            <circle cx="11" cy="11" r="8"></circle>
                                                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                                        </svg>
                                                    </div>
                                                </div>

                                                <input type="text" class="form-control form-control-lg ps-0"
                                                    v-model="search_ChatGroup" placeholder="Search chat group"
                                                    aria-label="Search for chat group...">
                                            </div>
                                        </form>


                                    </div>

                                    <!-- List -->
                                    <div class="card-list">
                                        <!-- Card -->
                                        <div class="card border-0" v-for="(chatgroup, index) in listFilterChatGroup"
                                            :key="index">
                                            <div class="card-body"
                                                @click="ShowChatGroup(chatgroup.threads_id,chatgroup.subject,chatgroup.threads_profile,chatgroup.about)">
                                                <!-- <div class="row align-items-center gx-5">
                                                    <div class="col-auto">
                                                        <a href="#" class="avatar ">

                                                            <span class="avatar-text bg-primary"
                                                                v-if="chatgroup.threads_profile == null">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-image">
                                                                    <rect x="3" y="3" width="18" height="18" rx="2"
                                                                        ry="2"></rect>
                                                                    <circle cx="8.5" cy="8.5" r="1.5"></circle>
                                                                    <polyline points="21 15 16 10 5 21"></polyline>
                                                                </svg>

                                                            </span>

                                                            <img class="avatar-img"
                                                                v-bind:src="'profile_upload/'+chatgroup.threads_profile"
                                                                v-else alt=""></a>
                                                    </div>

                                                    <div class="col">
                                                        <h5>
                                                            <a href="#">{{chatgroup.subject}}</a>
                                                        </h5>

                                                    </div>



                                                </div> -->

                                                <div class="row gx-5">
                                                    <div class="col-auto">
                                                        <div class="avatar">
                                                            <span class="avatar-text bg-primary"
                                                                v-if="chatgroup.threads_profile == null">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-image">
                                                                    <rect x="3" y="3" width="18" height="18" rx="2"
                                                                        ry="2"></rect>
                                                                    <circle cx="8.5" cy="8.5" r="1.5"></circle>
                                                                    <polyline points="21 15 16 10 5 21"></polyline>
                                                                </svg>

                                                            </span>

                                                            <img class="avatar-img"
                                                                v-bind:src="'profile_upload/'+chatgroup.threads_profile"
                                                                v-else alt="">


                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="d-flex align-items-center mb-3">
                                                            <h5 class="me-auto mb-0">
                                                                {{chatgroup.subject}}</h5> <span
                                                                class="text-muted extra-small ms-2">
                                                                {{ chatgroup.lastms.created_at  | moment("dddd Do MMMM YYYY, H:mm:ss ")}}
                                                            </span>
                                                        </div>
                                                        <div class="d-flex align-items-center">
                                                            <div class="line-clamp me-auto">
                                                                {{chatgroup.lastms.message }}
                                                            </div>
                                                            <!-- <div class="badge badge-circle bg-primary ms-5">
                                                                <span>1</span>
                                                            </div> -->
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Chats -->
                    <div class="tab-pane fade h-100 show active" id="tab-content-chats" role="tabpanel">
                        <div class="d-flex flex-column h-100 position-relative">
                            <div class="hide-scrollbar">

                                <div class="container py-8 new-mb">
                                    <!-- Title -->
                                    <div class="mb-8">
                                        <h2 class="fw-bold m-0">Chats</h2>
                                    </div>

                                    <!-- Search -->
                                    <div class="mb-6">
                                        <form action="#">
                                            <div class="input-group">
                                                <div class="input-group-text">
                                                    <div class="icon icon-lg">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" class="feather feather-search">
                                                            <circle cx="11" cy="11" r="8"></circle>
                                                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                                        </svg>
                                                    </div>
                                                </div>

                                                <input type="text" class="form-control form-control-lg ps-0"
                                                    v-model="search_user" placeholder="Search messages or users"
                                                    aria-label="Search for messages or users...">
                                            </div>
                                        </form>
                                    </div>

                                    <!-- Chats -->
                                    <!-- showuser -->
                                    <div class="card-list" v-for="(user, index) in listFilterUser" :key="index">
                                        <!-- Card -->

                                        <a class="card border-0 text-reset mb-3"
                                            v-on:click="ShowChat(user.id,user.name,user.profile,user.email,user.tel)">
                                            <div class="card-body">
                                                <div class="row gx-5">
                                                    <div class="col-auto">

                                                        <div class="avatar " v-if="user.profile == myObjectNull">

                                                            <img v-bind:src="'profile_upload/profile.png'" alt="#"
                                                                class="avatar-img"></div>
                                                        <div class="avatar" v-else>
                                                            <img v-bind:src="'profile_upload/'+user.profile" alt="#"
                                                                class="avatar-img"></div>
                                                    </div>

                                                    <div class="col">
                                                        <div class="d-flex align-items-center mb-3">
                                                            <h5 class="me-auto mb-0">
                                                                {{ user.name }}</h5>
                                                            <span class="text-muted extra-small ms-2">
                                                                {{ user.lastupdate  | moment("dddd Do MMMM YYYY, H:mm:ss ")}}
                                                            </span>

                                                        </div>
                                                        <div class="d-flex align-items-center">
                                                            <div class="line-clamp me-auto">
                                                                {{user.last}}
                                                            </div>

                                                            <div class="badge badge-circle bg-primary ms-5"
                                                                v-if="user.seen_ms != 0">
                                                                <span>{{user.seen_ms}}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- .card-body -->
                                        </a>
                                        <!-- Card -->

                                        <!-- Card -->
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- tab-content-assignment - Notices -->
                    <div class="tab-pane fade h-100" id="tab-content-assignment" role="tabpanel">
                        <div class="d-flex flex-column h-100">
                            <div class="hide-scrollbar">
                                <div class="container py-8">

                                    <!-- Title -->
                                    <div class="mb-8">
                                        <h2 class="fw-bold m-0">Assignment</h2>
                                    </div>

                                    <!-- Search -->
                                    <div class="mb-6">
                                        <form action="#">
                                            <div class="input-group">
                                                <div class="input-group-text">
                                                    <div class="icon icon-lg">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" class="feather feather-search">
                                                            <circle cx="11" cy="11" r="8"></circle>
                                                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                                        </svg>
                                                    </div>
                                                </div>

                                                <input type="text" class="form-control form-control-lg ps-0"
                                                    v-model="search_assignment" placeholder="ค้นหางาน.."
                                                    aria-label="ค้นหางาน..">
                                            </div>
                                        </form>
                                    </div>

                                    <div class="mb-6">
                                        <ul class="nav nav-pills nav-justified" role="tablist">
                                            <li class="nav-item" @click="assignment_get_FN">
                                                <a class="nav-link active" data-bs-toggle="pill"
                                                    href="#offcanvas-tab-get" role="tab"
                                                    aria-controls="offcanvas-tab-get" aria-selected="true">
                                                    <!-- ได้รับหมอบหมาย -->
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        fill="currentColor" class="bi bi-list-ol" viewBox="0 0 16 16">
                                                        <path fill-rule="evenodd"
                                                            d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5z" />
                                                        <path
                                                            d="M1.713 11.865v-.474H2c.217 0 .363-.137.363-.317 0-.185-.158-.31-.361-.31-.223 0-.367.152-.373.31h-.59c.016-.467.373-.787.986-.787.588-.002.954.291.957.703a.595.595 0 0 1-.492.594v.033a.615.615 0 0 1 .569.631c.003.533-.502.8-1.051.8-.656 0-1-.37-1.008-.794h.582c.008.178.186.306.422.309.254 0 .424-.145.422-.35-.002-.195-.155-.348-.414-.348h-.3zm-.004-4.699h-.604v-.035c0-.408.295-.844.958-.844.583 0 .96.326.96.756 0 .389-.257.617-.476.848l-.537.572v.03h1.054V9H1.143v-.395l.957-.99c.138-.142.293-.304.293-.508 0-.18-.147-.32-.342-.32a.33.33 0 0 0-.342.338v.041zM2.564 5h-.635V2.924h-.031l-.598.42v-.567l.629-.443h.635V5z" />
                                                    </svg>
                                                </a>
                                            </li>

                                            <li class="nav-item" @click="assignment_get_succus_FN">
                                                <a class="nav-link" data-bs-toggle="pill"
                                                    href="#offcanvas-tab-get-succus" role="tab"
                                                    aria-controls="offcanvas-tab-succus" aria-selected="false">
                                                    <!-- เสร็จแล้ว -->
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        fill="currentColor" class="bi bi-list-check"
                                                        viewBox="0 0 16 16">
                                                        <path fill-rule="evenodd"
                                                            d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3.854 2.146a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708L2 3.293l1.146-1.147a.5.5 0 0 1 .708 0zm0 4a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708L2 7.293l1.146-1.147a.5.5 0 0 1 .708 0zm0 4a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 0 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0z" />
                                                    </svg>
                                                </a>
                                            </li>

                                            <li class="nav-item" @click="assignment_to_FN">
                                                <a class="nav-link" data-bs-toggle="pill" href="#offcanvas-tab-to"
                                                    role="tab" aria-controls="offcanvas-tab-to" aria-selected="true">
                                                    <!-- ที่หมอบหมาย -->
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        fill="currentColor" class="bi bi-telephone-outbound"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511zM11 .5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V1.707l-4.146 4.147a.5.5 0 0 1-.708-.708L14.293 1H11.5a.5.5 0 0 1-.5-.5z" />
                                                    </svg>
                                                </a>
                                            </li>

                                            <li class="nav-item" @click="assignment_to_succus_FN">
                                                <a class="nav-link" data-bs-toggle="pill"
                                                    href="#offcanvas-tab-to-succus" role="tab"
                                                    aria-controls="offcanvas-tab-to-succus" aria-selected="false">
                                                    <!-- เสร็จแล้ว -->
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        fill="currentColor" class="bi bi-telephone-outbound-fill"
                                                        viewBox="0 0 16 16">
                                                        <path fill-rule="evenodd"
                                                            d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511zM11 .5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V1.707l-4.146 4.147a.5.5 0 0 1-.708-.708L14.293 1H11.5a.5.5 0 0 1-.5-.5z" />
                                                    </svg>
                                                </a>
                                            </li>

                                        </ul>

                                    </div>

                                    <div class="tab-content py-2" role="tablist">
                                        <div class="tab-pane fade show active" id="offcanvas-tab-get" role="tabpanel">
                                            <div class="card-list">
                                                <!-- Card -->
                                                <div class="card border-0 mb-5"
                                                    v-for="(assignment,index) in listFilterAssignment" :key="index">
                                                    <div class="card-body">
                                                        <div class="row gx-5">
                                                            <div class="col">
                                                                <div class="d-flex align-items-center mb-2">
                                                                    <h5 class="me-auto mb-0">
                                                                        <a href="#">เรื่อง :
                                                                            {{assignment.assignments_name}}</a>
                                                                    </h5>
                                                                    <span class="extra-small text-muted ms-2">
                                                                        {{ assignment.assignments_created_at | moment("dddd Do MMMM YYYY, H:mm:ss ")}}</span>
                                                                </div>

                                                                <div class="d-flex">
                                                                    <div class="me-auto">
                                                                        {{assignment.assignments_details}} <br>

                                                                        <div v-if="assignment.files != null">
                                                                            <ul>
                                                                                <li v-for="(file,index) in assignment.files"
                                                                                    class="tag_a" :key="index">
                                                                                    <a :href="'upload_file/'+ file.assignments_file"
                                                                                        download="">
                                                                                        <span>
                                                                                            {{ file.assignments_file_name}}</span></a>
                                                                                </li>
                                                                            </ul>

                                                                        </div>

                                                                    </div>

                                                                    <div class="dropdown ms-5">
                                                                        <a class="icon text-muted" href="#"
                                                                            role="button" data-bs-toggle="dropdown"
                                                                            aria-expanded="false">
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                width="24" height="24"
                                                                                viewBox="0 0 24 24" fill="none"
                                                                                stroke="currentColor" stroke-width="2"
                                                                                stroke-linecap="round"
                                                                                stroke-linejoin="round"
                                                                                class="feather feather-more-horizontal">
                                                                                <circle cx="12" cy="12" r="1"></circle>
                                                                                <circle cx="19" cy="12" r="1"></circle>
                                                                                <circle cx="5" cy="12" r="1"></circle>
                                                                            </svg>
                                                                        </a>
                                                                        <ul class="dropdown-menu">

                                                                            <li>

                                                                                <a class="dropdown-item"
                                                                                    @click="thisAssignmentFN(assignment.assignment_users_id)"
                                                                                    href="#">ส่งงาน
                                                                                </a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="row gx-5"
                                                            v-if="assignment.assignments_repeat !=null">
                                                            <div class="col">
                                                                <h5 class="me-auto mb-0">
                                                                    กำหนดการนัดอัพเดทงาน : </h5>
                                                                {{assignment.assignments_repeat}}
                                                            </div>

                                                        </div>
                                                        <div class="row gx-5" v-if="assignment.assignments_date !=null">
                                                            <div class="col">
                                                                <h5 class="me-auto mb-0">
                                                                    กำหนดการส่งงาน :
                                                                </h5>
                                                                <p v-if="assignment.time_left <=0" class="text-danger">
                                                                    {{ assignment.assignments_date | moment("dddd Do MMMM YYYY, H:mm:ss ")}}
                                                                </p>
                                                                <p v-else-if="assignment.time_left  <=3"
                                                                    class="text-warning">
                                                                    {{ assignment.assignments_date | moment("dddd Do MMMM YYYY, H:mm:ss ")}}
                                                                </p>
                                                                <p v-else>
                                                                    {{ assignment.assignments_date | moment("dddd Do MMMM YYYY, H:mm:ss ")}}
                                                                </p>

                                                            </div>
                                                        </div>
                                                        <div class="row gx-5">
                                                            <div class="col">
                                                                <h5 class="me-auto mb-0">
                                                                    หมอบหมายงานโดย :
                                                                </h5>
                                                                {{ assignment.name }}
                                                            </div>
                                                        </div>
                                                        <div class="row gx-5" v-if="assignment.sub != ''">

                                                            <div class="col">
                                                                <center> <a href="" data-toggle="collapse"
                                                                        :data-target="'#collapse-as-'+assignment.assignment_users_id"
                                                                        aria-expanded="false"
                                                                        :aria-controls="'collapse-as-'+assignment.assignment_users_id">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="16" height="16" fill="currentColor"
                                                                            class="bi bi-caret-down"
                                                                            viewBox="0 0 16 16">
                                                                            <path
                                                                                d="M3.204 5h9.592L8 10.481 3.204 5zm-.753.659 4.796 5.48a1 1 0 0 0 1.506 0l4.796-5.48c.566-.647.106-1.659-.753-1.659H3.204a1 1 0 0 0-.753 1.659z" />
                                                                        </svg>
                                                                    </a>
                                                                </center>
                                                                <div class="collapse"
                                                                    :id="'collapse-as-'+assignment.assignment_users_id">
                                                                    <div class="card card-body">
                                                                        <div v-for="(subdata,index) in assignment.sub"
                                                                            :key="index">
                                                                            <center>
                                                                                <h5>ส่งงานครั้งที่ {{index+1}}</h5>
                                                                            </center>
                                                                            <h4 class="me-auto mb-0">สรุปรายละเอียด:
                                                                            </h4>
                                                                            {{ subdata.assignment_subs_details }}
                                                                            <ul>
                                                                                <li v-for="(subfiles,index) in subdata.subfiles"
                                                                                    :key="index">
                                                                                    <a :href="'upload_file/'+ subfiles.assignment_subs_files"
                                                                                        :download="subfiles.assignment_subs_files_name">{{ subfiles.assignment_subs_files_name}}</a>

                                                                                </li>
                                                                            </ul>

                                                                            <hr>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>


                                            </div>
                                        </div>

                                        <div class="tab-pane fade" id="offcanvas-tab-to" role="tabpanel">
                                            <div class="card-list">
                                                <!-- Card -->
                                                <div class="card border-0 mb-5"
                                                    v-for="(assignment,index) in listFilterAssignment" :key="index">
                                                    <div class="card-body">

                                                        <div class="row gx-5">
                                                            <div class="col">
                                                                <div class="d-flex align-items-center mb-2">

                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                        v-if="assignment.assignments_update < assignment.count_sub"
                                                                        height="16" fill="#2787f5"
                                                                        class="bi bi-bookmarks" viewBox="0 0 16 16">
                                                                        <path
                                                                            d="M2 4a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v11.5a.5.5 0 0 1-.777.416L7 13.101l-4.223 2.815A.5.5 0 0 1 2 15.5V4zm2-1a1 1 0 0 0-1 1v10.566l3.723-2.482a.5.5 0 0 1 .554 0L11 14.566V4a1 1 0 0 0-1-1H4z" />
                                                                        <path
                                                                            d="M4.268 1H12a1 1 0 0 1 1 1v11.768l.223.148A.5.5 0 0 0 14 13.5V2a2 2 0 0 0-2-2H6a2 2 0 0 0-1.732 1z" />
                                                                    </svg>

                                                                    <h5 class="ml-2 me-auto mb-0">
                                                                        <a href="#">เรื่อง :
                                                                            {{assignment.assignments_name}}</a>
                                                                    </h5>
                                                                    <span class="extra-small text-muted ms-2">
                                                                        {{ assignment.assignments_created_at | moment("dddd Do MMMM YYYY, H:mm:ss ")}}</span>
                                                                </div>

                                                                <div class="d-flex">
                                                                    <div class="me-auto">
                                                                        {{assignment.assignments_details}} <br>

                                                                        <div v-if="assignment.files != null">
                                                                            <ul>
                                                                                <li v-for="(file,index) in assignment.files"
                                                                                    class="tag_a" :key="index">
                                                                                    <a :href="'upload_file/'+ file.assignments_file"
                                                                                        download="">
                                                                                        <span>
                                                                                            {{ file.assignments_file_name}}</span></a>
                                                                                </li>
                                                                            </ul>

                                                                        </div>

                                                                    </div>

                                                                    <div class="dropdown ms-5">
                                                                        <a class="icon text-muted" href="#"
                                                                            role="button" data-bs-toggle="dropdown"
                                                                            aria-expanded="false">
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                width="24" height="24"
                                                                                viewBox="0 0 24 24" fill="none"
                                                                                stroke="currentColor" stroke-width="2"
                                                                                stroke-linecap="round"
                                                                                stroke-linejoin="round"
                                                                                class="feather feather-more-horizontal">
                                                                                <circle cx="12" cy="12" r="1"></circle>
                                                                                <circle cx="19" cy="12" r="1"></circle>
                                                                                <circle cx="5" cy="12" r="1"></circle>
                                                                            </svg>
                                                                        </a>
                                                                        <ul class="dropdown-menu">

                                                                            <li>
                                                                                <a class="dropdown-item" href="#"
                                                                                    @click="assignment_update_FN(assignment.assignments_chat_group_id,assignment.assignments_name,assignment.assignments_details,assignment.assignments_repeat,assignment.assignments_date,assignment.files,assignment.assignment_users,assignment.assignments_id)"
                                                                                    data-bs-toggle="modal"
                                                                                    data-bs-target="#modal-assignment">แก้ไข
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a class="dropdown-item" href="#"
                                                                                    @click="assignment_cancel_FN(assignment.assignments_id)">ยกเลิก
                                                                                </a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="row gx-5"
                                                            v-if="assignment.assignments_repeat !=null">
                                                            <div class="col">
                                                                <h5 class="me-auto mb-0">
                                                                    กำหนดการนัดอัพเดทงาน : </h5>
                                                                {{assignment.assignments_repeat}}
                                                            </div>

                                                        </div>
                                                        <div class="row gx-5" v-if="assignment.assignments_date !=null">
                                                            <div class="col">
                                                                <h5 class="me-auto mb-0">
                                                                    กำหนดการส่งงาน :
                                                                </h5>
                                                                <p v-if="assignment.time_left <=0" class="text-danger">
                                                                    {{ assignment.assignments_date | moment("dddd Do MMMM YYYY, H:mm:ss ")}}
                                                                </p>
                                                                <p v-else-if="assignment.time_left  <=3"
                                                                    class="text-warning">
                                                                    {{ assignment.assignments_date | moment("dddd Do MMMM YYYY, H:mm:ss ")}}
                                                                </p>
                                                                <p v-else>
                                                                    {{ assignment.assignments_date | moment("dddd Do MMMM YYYY, H:mm:ss ")}}
                                                                </p>

                                                            </div>
                                                        </div>
                                                        <div class="row gx-5">
                                                            <div class="col">
                                                                <h5 class="me-auto mb-0">
                                                                    หมอบหมายงานให้ :
                                                                </h5>
                                                                {{ assignment.name }}
                                                            </div>
                                                        </div>
                                                        <div class="row gx-5" v-if="assignment.sub != ''">
                                                            <div class="col">
                                                                <center> <a href="" data-toggle="collapse"
                                                                        @click="AssignmentNewUpdate(assignment.assignments_id,assignment.count_sub)"
                                                                        :data-target="'#collapse-as-to-'+assignment.assignment_users_id"
                                                                        aria-expanded="false"
                                                                        :aria-controls="'collapse-as-to-'+assignment.assignment_users_id">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="16" height="16" fill="currentColor"
                                                                            class="bi bi-caret-down"
                                                                            viewBox="0 0 16 16">
                                                                            <path
                                                                                d="M3.204 5h9.592L8 10.481 3.204 5zm-.753.659 4.796 5.48a1 1 0 0 0 1.506 0l4.796-5.48c.566-.647.106-1.659-.753-1.659H3.204a1 1 0 0 0-.753 1.659z" />
                                                                        </svg>
                                                                    </a>
                                                                </center>
                                                                <div class="collapse"
                                                                    :id="'collapse-as-to-'+assignment.assignment_users_id">
                                                                    <div class="card card-body">
                                                                        <div v-for="(subdata,index) in assignment.sub"
                                                                            :key="index">
                                                                            <center>
                                                                                <h5>ส่งงานครั้งที่ {{index+1}}</h5>
                                                                            </center>
                                                                            <h4 class="me-auto mb-0">สรุปรายละเอียด:
                                                                            </h4>
                                                                            {{ subdata.assignment_subs_details }}
                                                                            <ul>
                                                                                <li v-for="(subfiles,index) in subdata.subfiles"
                                                                                    :key="index">
                                                                                    <a :href="'upload_file/'+ subfiles.assignment_subs_files"
                                                                                        :download="subfiles.assignment_subs_files_name">{{ subfiles.assignment_subs_files_name}}</a>

                                                                                </li>
                                                                            </ul>

                                                                            <hr>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>


                                            </div>
                                        </div>



                                        <div class="tab-pane fade " id="offcanvas-tab-get-succus" role="tabpanel">
                                            <div class="card-list">
                                                <!-- Card -->
                                                <div class="card border-0 mb-5"
                                                    v-for="(assignment,index) in listFilterAssignment" :key="index">
                                                    <div class="card-body">
                                                        <div class="row gx-5">
                                                            <div class="col">
                                                                <div class="d-flex align-items-center mb-2">
                                                                    <h5 class="me-auto mb-0">
                                                                        <a href="#">เรื่อง :
                                                                            {{assignment.assignments_name}}</a>
                                                                    </h5>
                                                                    <span class="extra-small text-muted ms-2">
                                                                        {{ assignment.assignments_created_at | moment("dddd Do MMMM YYYY, H:mm:ss ")}}</span>
                                                                </div>

                                                                <div class="d-flex">
                                                                    <div class="me-auto">
                                                                        {{assignment.assignments_details}} <br>

                                                                        <div v-if="assignment.files != null">
                                                                            <ul>
                                                                                <li v-for="(file,index) in assignment.files"
                                                                                    class="tag_a" :key="index">
                                                                                    <a :href="'upload_file/'+ file.assignments_file"
                                                                                        download="">
                                                                                        <span>
                                                                                            {{ file.assignments_file_name}}</span></a>
                                                                                </li>
                                                                            </ul>

                                                                        </div>

                                                                    </div>


                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="row gx-5"
                                                            v-if="assignment.assignments_repeat !=null">
                                                            <div class="col">
                                                                <h5 class="me-auto mb-0">
                                                                    กำหนดการนัดอัพเดทงาน : </h5>
                                                                {{assignment.assignments_repeat}}
                                                            </div>

                                                        </div>
                                                        <div class="row gx-5" v-if="assignment.assignments_date !=null">
                                                            <div class="col">
                                                                <h5 class="me-auto mb-0">
                                                                    กำหนดการส่งงาน :
                                                                </h5>
                                                                {{ new Date(assignment.assignments_date).toLocaleString('Th') }}
                                                            </div>
                                                        </div>
                                                        <div class="row gx-5">
                                                            <div class="col">
                                                                <h5 class="me-auto mb-0">
                                                                    หมอบหมายงานโดย :
                                                                </h5>
                                                                {{ assignment.name }}
                                                            </div>
                                                        </div>
                                                        <div class="row gx-5" v-if="assignment.sub != ''">
                                                            <div class="col">
                                                                <center> <a href="" data-toggle="collapse"
                                                                        :data-target="'#collapse-as-ss-'+assignment.assignment_users_id"
                                                                        aria-expanded="false"
                                                                        :aria-controls="'collapse-as-ss-'+assignment.assignment_users_id">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="16" height="16" fill="currentColor"
                                                                            class="bi bi-caret-down"
                                                                            viewBox="0 0 16 16">
                                                                            <path
                                                                                d="M3.204 5h9.592L8 10.481 3.204 5zm-.753.659 4.796 5.48a1 1 0 0 0 1.506 0l4.796-5.48c.566-.647.106-1.659-.753-1.659H3.204a1 1 0 0 0-.753 1.659z" />
                                                                        </svg>
                                                                    </a>
                                                                </center>
                                                                <div class="collapse"
                                                                    :id="'collapse-as-ss-'+assignment.assignment_users_id">
                                                                    <div class="card card-body">
                                                                        <div v-for="(subdata,index) in assignment.sub"
                                                                            :key="index">
                                                                            <center>
                                                                                <h5>ส่งงานครั้งที่ {{index+1}}</h5>
                                                                            </center>
                                                                            <h4 class="me-auto mb-0">สรุปรายละเอียด:
                                                                            </h4>
                                                                            {{ subdata.assignment_subs_details }}
                                                                            <ul>
                                                                                <li v-for="(subfiles,index) in subdata.subfiles"
                                                                                    :key="index">
                                                                                    <a :href="'upload_file/'+ subfiles.assignment_subs_files"
                                                                                        :download="subfiles.assignment_subs_files_name">{{ subfiles.assignment_subs_files_name}}</a>

                                                                                </li>
                                                                            </ul>

                                                                            <hr>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>


                                            </div>
                                        </div>





                                        <div class="tab-pane fade " id="offcanvas-tab-to-succus" role="tabpanel">
                                            <div class="card-list">
                                                <!-- Card -->
                                                <div class="card border-0 mb-5"
                                                    v-for="(assignment,index) in listFilterAssignment" :key="index">
                                                    <div class="card-body"
                                                        v-bind:class="{ 'bg-secondary': assignment.assignments_status == 2 }">
                                                        <div class="row gx-5">
                                                            <div class="col">
                                                                <div class="d-flex align-items-center mb-2">

                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                        v-if="assignment.assignments_update < assignment.count_sub"
                                                                        height="16" fill="#2787f5"
                                                                        class="bi bi-bookmarks" viewBox="0 0 16 16">
                                                                        <path
                                                                            d="M2 4a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v11.5a.5.5 0 0 1-.777.416L7 13.101l-4.223 2.815A.5.5 0 0 1 2 15.5V4zm2-1a1 1 0 0 0-1 1v10.566l3.723-2.482a.5.5 0 0 1 .554 0L11 14.566V4a1 1 0 0 0-1-1H4z" />
                                                                        <path
                                                                            d="M4.268 1H12a1 1 0 0 1 1 1v11.768l.223.148A.5.5 0 0 0 14 13.5V2a2 2 0 0 0-2-2H6a2 2 0 0 0-1.732 1z" />
                                                                    </svg>

                                                                    <h5 class="ml-2 me-auto mb-0">
                                                                        <a href="#">เรื่อง :
                                                                            {{assignment.assignments_name}}</a>
                                                                    </h5>
                                                                    <span class="extra-small text-muted ms-2">
                                                                        {{ assignment.assignments_created_at | moment("dddd Do MMMM YYYY, H:mm:ss ")}}</span>
                                                                </div>


                                                                <div class="d-flex">
                                                                    <div class="me-auto">
                                                                        {{assignment.assignments_details}} <br>

                                                                        <div v-if="assignment.files != null">
                                                                            <ul>
                                                                                <li v-for="(file,index) in assignment.files"
                                                                                    class="tag_a" :key="index">
                                                                                    <a :href="'upload_file/'+ file.assignments_file"
                                                                                        download="">
                                                                                        <span>
                                                                                            {{ file.assignments_file_name}}</span></a>
                                                                                </li>
                                                                            </ul>

                                                                        </div>

                                                                    </div>


                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="row gx-5"
                                                            v-if="assignment.assignments_repeat !=null">
                                                            <div class="col">
                                                                <h5 class="me-auto mb-0">
                                                                    กำหนดการนัดอัพเดทงาน : </h5>
                                                                {{assignment.assignments_repeat}}
                                                            </div>

                                                        </div>
                                                        <div class="row gx-5" v-if="assignment.assignments_date !=null">
                                                            <div class="col">
                                                                <h5 class="me-auto mb-0">
                                                                    กำหนดการส่งงาน :
                                                                </h5>
                                                                {{ new Date(assignment.assignments_date).toLocaleString('Th') }}
                                                            </div>
                                                        </div>
                                                        <div class="row gx-5">
                                                            <div class="col">
                                                                <h5 class="me-auto mb-0">
                                                                    หมอบหมายงานโดย :
                                                                </h5>
                                                                {{ assignment.name }}
                                                            </div>
                                                        </div>
                                                        <div class="row gx-5" v-if="assignment.sub != ''">
                                                            <div class="col">
                                                                <center> <a href="" data-toggle="collapse"
                                                                        @click="AssignmentNewUpdate_SS(assignment.assignments_id,assignment.count_sub)"
                                                                        :data-target="'#collapse-as-ss-'+assignment.assignment_users_id"
                                                                        aria-expanded="false"
                                                                        :aria-controls="'collapse-as-ss-'+assignment.assignment_users_id">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="16" height="16" fill="currentColor"
                                                                            class="bi bi-caret-down"
                                                                            viewBox="0 0 16 16">
                                                                            <path
                                                                                d="M3.204 5h9.592L8 10.481 3.204 5zm-.753.659 4.796 5.48a1 1 0 0 0 1.506 0l4.796-5.48c.566-.647.106-1.659-.753-1.659H3.204a1 1 0 0 0-.753 1.659z" />
                                                                        </svg>
                                                                    </a>
                                                                </center>
                                                                <div class="collapse"
                                                                    :id="'collapse-as-ss-'+assignment.assignment_users_id">
                                                                    <div class="card card-body">
                                                                        <div v-for="(subdata,index) in assignment.sub"
                                                                            :key="index">
                                                                            <center>
                                                                                <h5>ส่งงานครั้งที่ {{index+1}}</h5>
                                                                            </center>
                                                                            <h4 class="me-auto mb-0">สรุปรายละเอียด:
                                                                            </h4>
                                                                            {{ subdata.assignment_subs_details }}
                                                                            <ul>
                                                                                <li v-for="(subfiles,index) in subdata.subfiles"
                                                                                    :key="index">
                                                                                    <a :href="'upload_file/'+ subfiles.assignment_subs_files"
                                                                                        :download="subfiles.assignment_subs_files_name">{{ subfiles.assignment_subs_files_name}}</a>

                                                                                </li>
                                                                            </ul>

                                                                            <hr>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>





                    <!-- Support -->
                    <div class="tab-pane fade h-100" id="tab-content-support" role="tabpanel">
                        <div class="d-flex flex-column h-100">
                            <div class="hide-scrollbar">
                                <div class="container py-8">

                                    <!-- Title -->
                                    <div class="mb-8">
                                        <h2 class="fw-bold m-0">Support</h2>
                                    </div>

                                    <!-- Search -->
                                    <div class="mb-6">
                                        <form action="#">
                                            <div class="input-group">
                                                <div class="input-group-text">
                                                    <div class="icon icon-lg">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" class="feather feather-search">
                                                            <circle cx="11" cy="11" r="8"></circle>
                                                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                                        </svg>
                                                    </div>
                                                </div>

                                                <input type="text" class="form-control form-control-lg ps-0"
                                                    placeholder="Search messages or users"
                                                    aria-label="Search for messages or users...">
                                            </div>
                                        </form>
                                    </div>

                                    <!-- Docs -->
                                    <div class="card border-0">
                                        <div class="card-body">

                                            <div class="row align-items-center gx-5">
                                                <div class="col-auto text-primary">
                                                    <svg version="1.1" width="46px" height="46px" fill="currentColor"
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                        viewBox="0 0 46 46" enable-background="new 0 0 46 46"
                                                        xml:space="preserve">
                                                        <polygon opacity="0.7" points="45,11 36,11 35.5,1 " />
                                                        <polygon points="35.5,1 25.4,14.1 39,21 " />
                                                        <polygon opacity="0.4" points="17,9.8 39,21 17,26 " />
                                                        <polygon opacity="0.7" points="2,12 17,26 17,9.8 " />
                                                        <polygon opacity="0.7" points="17,26 39,21 28,36 " />
                                                        <polygon points="28,36 4.5,44 17,26 " />
                                                        <polygon points="17,26 1,26 10.8,20.1 " />
                                                    </svg>

                                                </div>

                                                <div class="col">
                                                    <h4 class="mb-1">Documentation</h4>
                                                    <p>Setup and build tools</p>
                                                </div>

                                                <div class="col-auto">
                                                    <a href="docs/index.html"
                                                        class="btn btn-sm btn-icon btn-primary rounded-circle">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            class="feather feather-chevron-right">
                                                            <polyline points="9 18 15 12 9 6"></polyline>
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <!-- Docs -->

                                    <!-- Demos -->
                                    <div class="card-list mt-8">
                                        <div class="d-flex align-items-center mb-4 px-6">
                                            <small class="text-muted me-auto">Demos</small>
                                        </div>

                                        <div class="card border-0">
                                            <img src="assets/img/demos/light.jpg" class="card-img-top" alt="...">
                                            <div class="card-body">
                                                <div class="row align-items-center gx-0">
                                                    <div class="col">
                                                        <h4 class="mb-1">Light</h4>
                                                        <p>Classic light theme</p>
                                                    </div>
                                                    <div class="col-auto">
                                                        <a href="index.html"
                                                            class="btn btn-sm btn-icon btn-primary rounded-circle">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-chevron-right">
                                                                <polyline points="9 18 15 12 9 6"></polyline>
                                                            </svg>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card border-0">
                                            <img src="assets/img/demos/dark.jpg" class="card-img-top" alt="...">
                                            <div class="card-body">
                                                <div class="row align-items-center gx-0">
                                                    <div class="col">
                                                        <h4 class="mb-1">Dark</h4>
                                                        <p>Classic dark theme</p>
                                                    </div>
                                                    <div class="col-auto">
                                                        <a href="../dark/index.html"
                                                            class="btn btn-sm btn-icon btn-primary rounded-circle">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-chevron-right">
                                                                <polyline points="9 18 15 12 9 6"></polyline>
                                                            </svg>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Demos -->

                                    <!-- Account Pages -->
                                    <div class="card-list mt-8">
                                        <div class="d-flex align-items-center mb-4 px-6">
                                            <small class="text-muted me-auto">Pages</small>
                                        </div>

                                        <div class="card border-0">
                                            <div class="card-body">
                                                <div class="row align-items-center gx-0">
                                                    <div class="col">
                                                        <h4 class="mb-1">Sign In</h4>
                                                        <p>Sign in Page</p>
                                                    </div>
                                                    <div class="col-auto">
                                                        <a href="signin.html"
                                                            class="btn btn-sm btn-icon btn-primary rounded-circle">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-chevron-right">
                                                                <polyline points="9 18 15 12 9 6"></polyline>
                                                            </svg>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card border-0">
                                            <div class="card-body">
                                                <div class="row align-items-center gx-0">
                                                    <div class="col">
                                                        <h4 class="mb-1">Sign Up</h4>
                                                        <p>Sign Up Page</p>
                                                    </div>
                                                    <div class="col-auto">
                                                        <a href="signup.html"
                                                            class="btn btn-sm btn-icon btn-primary rounded-circle">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-chevron-right">
                                                                <polyline points="9 18 15 12 9 6"></polyline>
                                                            </svg>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card border-0">
                                            <div class="card-body">
                                                <div class="row align-items-center gx-0">
                                                    <div class="col">
                                                        <h4 class="mb-1">Password Reset</h4>
                                                        <p>Password Reset Page</p>
                                                    </div>
                                                    <div class="col-auto">
                                                        <a href="password-reset.html"
                                                            class="btn btn-sm btn-icon btn-primary rounded-circle">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-chevron-right">
                                                                <polyline points="9 18 15 12 9 6"></polyline>
                                                            </svg>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card border-0">
                                            <div class="card-body">
                                                <div class="row align-items-center gx-0">
                                                    <div class="col">
                                                        <h4 class="mb-1">Lock screen</h4>
                                                        <p>Lock screen Page</p>
                                                    </div>
                                                    <div class="col-auto">
                                                        <a href="lockscreen.html"
                                                            class="btn btn-sm btn-icon btn-primary rounded-circle">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-chevron-right">
                                                                <polyline points="9 18 15 12 9 6"></polyline>
                                                            </svg>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Account Pages -->
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Settings -->
                    <div class="tab-pane fade h-100" id="tab-content-settings" role="tabpanel">
                        <div class="d-flex flex-column h-100">
                            <div class="hide-scrollbar">
                                <div class="container py-8">

                                    <!-- Title -->
                                    <div class="mb-8">
                                        <h2 class="fw-bold m-0">Settings</h2>
                                    </div>

                                    <!-- Profile -->
                                    <div class="card border-0">
                                        <div class="card-body">
                                            <div class="row align-items-center gx-5">
                                                <div class="col-auto">
                                                    <div class="avatar">
                                                        <!-- <img alt="#" class="avatar-img"
                                                            v-bind:src="'profile_upload/'+user.profile"> -->

                                                        <img class="avatar-img"
                                                            v-bind:src="'profile_upload/profile.png'" alt="#"
                                                            v-if="user.profile ==null">
                                                        <img class="avatar-img"
                                                            v-bind:src="'profile_upload/'+user.profile" alt="#" v-else>


                                                        <input id="upload-profile-photo" class="d-none" type="file"
                                                            ref="file_profile" v-on:change="ProFileUpload()">
                                                        <label class="stretched-label mb-0"
                                                            for="upload-profile-photo"></label>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <h5>{{ user.name }}</h5>
                                                    <p>{{ user.email }}</p>
                                                </div>
                                                <div class="col-auto">
                                                    <a href="logout" class="text-muted">
                                                        <div class="icon">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-log-out">
                                                                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4">
                                                                </path>
                                                                <polyline points="16 17 21 12 16 7"></polyline>
                                                                <line x1="21" y1="12" x2="9" y2="12"></line>
                                                            </svg>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Profile -->

                                    <!-- Account -->
                                    <div class="mt-8">
                                        <div class="d-flex align-items-center mb-4 px-6">
                                            <small class="text-muted me-auto">Account</small>
                                        </div>

                                        <div class="card border-0">
                                            <div class="card-body py-2">
                                                <!-- Accordion -->
                                                <div class="accordion accordion-flush" id="accordion-profile">
                                                    <div class="accordion-item">
                                                        <div class="accordion-header" id="accordion-profile-1">
                                                            <a href="#" class="accordion-button text-reset collapsed"
                                                                data-bs-toggle="collapse"
                                                                data-bs-target="#accordion-profile-body-1"
                                                                aria-expanded="false"
                                                                aria-controls="accordion-profile-body-1">
                                                                <div>
                                                                    <h5>Profile settings</h5>
                                                                    <p>Change your profile settings</p>
                                                                </div>
                                                            </a>
                                                        </div>

                                                        <div id="accordion-profile-body-1"
                                                            class="accordion-collapse collapse"
                                                            aria-labelledby="accordion-profile-1"
                                                            data-parent="#accordion-profile">
                                                            <div class="accordion-body">
                                                                <div class="form-floating mb-6">
                                                                    <input type="text" class="form-control"
                                                                        v-model="user_name_me" id="profile-name"
                                                                        placeholder="Name">
                                                                    <label for="profile-name">Name</label>
                                                                </div>

                                                                <div class="form-floating mb-6">
                                                                    <input type="email" class="form-control"
                                                                        v-model="user_email_me" id="profile-email"
                                                                        placeholder="Email address">
                                                                    <label for="profile-email">Email</label>
                                                                </div>

                                                                <div class="form-floating mb-6">
                                                                    <input type="text" class="form-control"
                                                                        v-model="user_tel_me" id="profile-phone"
                                                                        placeholder="Phone">
                                                                    <label for="profile-phone">Phone</label>
                                                                </div>

                                                                <button type="button" v-on:click="SetDataUser()"
                                                                    class="btn btn-block btn-lg btn-primary w-100">Save</button>
                                                            </div>
                                                        </div>
                                                    </div>


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Account -->

                                    <!-- Security -->
                                    <div class="mt-8">
                                        <div class="d-flex align-items-center my-4 px-6">
                                            <small class="text-muted me-auto">Security</small>
                                        </div>

                                        <div class="card border-0">
                                            <div class="card-body py-2">
                                                <!-- Accordion -->
                                                <div class="accordion accordion-flush" id="accordion-security">
                                                    <div class="accordion-item">
                                                        <div class="accordion-header" id="accordion-security-1">
                                                            <a href="#" class="accordion-button text-reset collapsed"
                                                                data-bs-toggle="collapse"
                                                                data-bs-target="#accordion-security-body-1"
                                                                aria-expanded="false"
                                                                aria-controls="accordion-security-body-1">
                                                                <div>
                                                                    <h5>Password</h5>
                                                                    <p>Change your password</p>
                                                                </div>
                                                            </a>
                                                        </div>

                                                        <div id="accordion-security-body-1"
                                                            class="accordion-collapse collapse"
                                                            aria-labelledby="accordion-security-1"
                                                            data-parent="#accordion-security">
                                                            <div class="accordion-body">
                                                                <form action="#" autocomplete="on">
                                                                    <div class="form-floating mb-6">
                                                                        <input type="password" class="form-control"
                                                                            ref="profile_current_password"
                                                                            id="profile-current-password"
                                                                            placeholder="Current Password"
                                                                            autocomplete="">
                                                                        <label for="profile-current-password">Current
                                                                            Password</label>
                                                                    </div>

                                                                    <div class="form-floating mb-6">
                                                                        <input type="password" class="form-control"
                                                                            ref="profile_new_password"
                                                                            id="profile-new-password"
                                                                            placeholder="New password" autocomplete="">
                                                                        <label for="profile-new-password">New
                                                                            password</label>
                                                                    </div>

                                                                    <div class="form-floating mb-6">
                                                                        <input type="password" class="form-control"
                                                                            ref="profile_verify_password"
                                                                            id="profile-verify-password"
                                                                            placeholder="Verify Password"
                                                                            autocomplete="">
                                                                        <label for="profile-verify-password">Verify
                                                                            Password</label>
                                                                    </div>
                                                                </form>
                                                                <button type="button" v-on:click="ResetPassword()"
                                                                    class="btn btn-block btn-lg btn-primary w-100">Save</button>
                                                            </div>
                                                        </div>
                                                    </div>


                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </aside>
            <!-- Sidebar -->

            <main class="main" v-bind:class="{ 'is-visible': isActive }">
                <div class="container h-100">

                    <div class="d-flex flex-column h-100 position-relative">
                        <!-- Chat: Header -->
                        <div class="chat-header border-bottom py-4 py-lg-7">
                            <div class="row align-items-center">

                                <!-- Mobile: close -->
                                <div class="col-2 d-xl-none">
                                    <a class="icon icon-lg text-muted" href="#" data-toggle-chat=""
                                        v-on:click=" ShowChatClose()">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-chevron-left">
                                            <polyline points="15 18 9 12 15 6"></polyline>
                                        </svg>
                                    </a>
                                </div>

                                <!-- Mobile: close -->

                                <!-- Content -->
                                <div class="col-8 col-xl-12">
                                    <div class="row align-items-center text-center text-xl-start">
                                        <!-- Title -->
                                        <div class="col-12 col-xl-6">
                                            <div class="row align-items-center gx-5">
                                                <div class="col-auto">
                                                    <div class="avatar " v-if="ischatType=='chat'">
                                                        <img class="avatar-img"
                                                            v-bind:src="'profile_upload/'+user_profile_conver" alt="">
                                                    </div>

                                                    <div class="avatar d-none d-xl-inline-block" v-else>
                                                        <img class="avatar-img avatar-text bg-primary"
                                                            v-if="chat_group_profile !=null"
                                                            v-bind:src="'profile_upload/'+chat_group_profile" alt="">
                                                        <span class="avatar-text bg-primary" v-else>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-image">
                                                                <rect x="3" y="3" width="18" height="18" rx="2" ry="2">
                                                                </rect>
                                                                <circle cx="8.5" cy="8.5" r="1.5"></circle>
                                                                <polyline points="21 15 16 10 5 21"></polyline>
                                                            </svg>
                                                        </span>
                                                    </div>
                                                </div>

                                                <div class="col overflow-hidden">
                                                    <div v-if="ischatType=='chat'">
                                                        <h5 class="text-truncate">{{ user_name }}
                                                        </h5>
                                                    </div>

                                                    <div v-else>
                                                        <h5 class="text-truncate">{{ thisDataChatGroup.subject  }}</h5>
                                                        <p class="text-truncate">
                                                            {{ thisDataChatGroup.about }}
                                                        </p>
                                                    </div>


                                                </div>
                                            </div>
                                        </div>
                                        <!-- Title -->

                                        <!-- Toolbar -->
                                        <div class="col-xl-6 d-none d-xl-block">
                                            <div class="row align-items-center justify-content-end gx-6">
                                                <div class="col-auto">
                                                    <a href="#" class="icon icon-lg text-muted"
                                                        data-bs-toggle="offcanvas" data-bs-target="#offcanvas-more"
                                                        aria-controls="offcanvas-more">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            class="feather feather-more-horizontal">
                                                            <circle cx="12" cy="12" r="1"></circle>
                                                            <circle cx="19" cy="12" r="1"></circle>
                                                            <circle cx="5" cy="12" r="1"></circle>
                                                        </svg>
                                                    </a>
                                                </div>

                                                <div class="col-auto" v-if="ischatType=='group'">
                                                    <a href="#" class="avatar avatar-sm" data-bs-toggle="offcanvas"
                                                        @click="get_user_not_in_chat_groupFN(thisDataChatGroup.threads_id)"
                                                        data-bs-target="#offcanvas-add-members"
                                                        aria-controls="offcanvas-add-members">
                                                        <span class="avatar-text" data-bs-toggle="tooltip"
                                                            data-bs-placement="bottom" title=""
                                                            data-bs-original-title="<strong>Add People</strong><p>Invite friends to group</p>">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-plus">
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                        </span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Toolbar -->
                                    </div>
                                </div>
                                <!-- Content -->

                                <!-- Mobile: more -->
                                <div class="col-2 d-xl-none text-end">
                                    <a href="#" class="icon icon-lg text-muted" data-bs-toggle="offcanvas"
                                        v-if="ischatType=='chat'" data-bs-target="#offcanvas-more"
                                        aria-controls="offcanvas-more">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-more-vertical">
                                            <circle cx="12" cy="12" r="1"></circle>
                                            <circle cx="12" cy="5" r="1"></circle>
                                            <circle cx="12" cy="19" r="1"></circle>
                                        </svg>
                                    </a>

                                    <div class="dropdown" v-if="ischatType=='group'">
                                        <a class="text-muted" href="#" role="button" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            <div class="icon icon-lg">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-more-vertical">
                                                    <circle cx="12" cy="12" r="1"></circle>
                                                    <circle cx="12" cy="5" r="1"></circle>
                                                    <circle cx="12" cy="19" r="1"></circle>
                                                </svg>
                                            </div>
                                        </a>

                                        <ul class="dropdown-menu">
                                            <li>
                                                <a class="dropdown-item" href="#" data-bs-toggle="offcanvas"
                                                    @click="get_user_not_in_chat_groupFN(thisDataChatGroup.threads_id)"
                                                    data-bs-target="#offcanvas-add-members"
                                                    aria-controls="offcanvas-add-members">Add members</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="#" data-bs-toggle="offcanvas"
                                                    data-bs-target="#offcanvas-more"
                                                    aria-controls="offcanvas-more">More</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- Mobile: more -->

                            </div>
                        </div>
                        <!-- Chat: Header -->

                        <!-- Chat: Content -->
                        <div v-chat-scroll="{ image: true }" class="chat-body hide-scrollbar flex-1 h-100  sc"
                            id="chat_container" ref="chat_container">
                            <div class="chat-body-inner">
                                <div class="py-6 py-lg-12" id="chat_container_messages">
                                    <div v-for="(message, index) in messages" :key="index">
                                        <!-- Message -->
                                        <div class="message" v-if="message.user.id != user.id">
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#modal-user-profile"
                                                @click="setfriendFN(message.user.profile,message.user.name,message.user.email, message.user.tel)"
                                                class="avatar avatar-responsive">
                                                <img class="avatar-img" v-if="message.user.profile ==null"
                                                    v-bind:src="'profile_upload/profile.png'" alt="">

                                                <img class="avatar-img" v-else
                                                    v-bind:src="'profile_upload/'+message.user.profile" alt=""></a>

                                            <div class="message-inner">
                                                <div class="message-body">
                                                    {{ message.user.name }}

                                                    <div class="message-content">

                                                        <div class="message-text">

                                                            <div class="row align-items-center gx-4"
                                                                v-if="message.type =='file'">
                                                                <div class="col-auto">
                                                                    <a :href="'upload_file/'+message.message" Download
                                                                        class="avatar avatar-sm">
                                                                        <div class="avatar-text bg-white text-primary">
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                width="24" height="24"
                                                                                viewBox="0 0 24 24" fill="none"
                                                                                stroke="currentColor" stroke-width="2"
                                                                                stroke-linecap="round"
                                                                                stroke-linejoin="round"
                                                                                class="feather feather-arrow-down">
                                                                                <line x1="12" y1="5" x2="12" y2="19">
                                                                                </line>
                                                                                <polyline points="19 12 12 19 5 12">
                                                                                </polyline>
                                                                            </svg>
                                                                        </div>
                                                                    </a>
                                                                </div>
                                                                <div class="col overflow-hidden">
                                                                    <h6 class="text-truncate text-reset">
                                                                        <a :href="'upload_file/'+message.message"
                                                                            Download
                                                                            class="text-reset">{{message.message}}</a>
                                                                    </h6>

                                                                </div>
                                                            </div>

                                                            <p v-if="message.type =='message'">
                                                                {{ message.message }}</p>
                                                            <div class="message-gallery"
                                                                v-if="message.type =='picture'">
                                                                <div class="row gx-3">
                                                                    <div class="col">

>

                                                                        <a href="#" data-bs-toggle="modal"
                                                                            data-bs-target="#modal-media-preview"
                                                                            :data-theme-img-url="'upload_file/'+message.message">
                                                                            <img class="img-fluid rounded"
                                                                                :src="'upload_file/'+message.message"
                                                                                alt=""
                                                                                onerror="this.onerror=null; this.src='no-image.png'"
                                                                                @click="fetcfile_src = 'upload_file/'+message.message"></a>
                                                                    </div>
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



                                        <!-- Message -->
                                        <div class="message message-out" v-else>
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#modal-profile"
                                                class="avatar avatar-responsive">
                                                <img class="avatar-img" v-bind:src="'profile_upload/'+user.profile"
                                                    alt=""></a>

                                            <div class="message-inner">
                                                <div class="message-body text-right">
                                                    <span class=""></span>
                                                    {{ message.user.name }}
                                                    <div class="message-content">
                                                        <div class="message-text">

                                                            <div class="row align-items-center gx-4"
                                                                v-if="message.type =='file'">
                                                                <div class="col-auto">
                                                                    <a :href="'upload_file/'+message.message" Download
                                                                        class="avatar avatar-sm">
                                                                        <div class="avatar-text bg-white text-primary">
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                width="24" height="24"
                                                                                viewBox="0 0 24 24" fill="none"
                                                                                stroke="currentColor" stroke-width="2"
                                                                                stroke-linecap="round"
                                                                                stroke-linejoin="round"
                                                                                class="feather feather-arrow-down">
                                                                                <line x1="12" y1="5" x2="12" y2="19">
                                                                                </line>
                                                                                <polyline points="19 12 12 19 5 12">
                                                                                </polyline>
                                                                            </svg>
                                                                        </div>
                                                                    </a>
                                                                </div>
                                                                <div class="col overflow-hidden">
                                                                    <h6 class="text-truncate text-reset">
                                                                        <a :href="'upload_file/'+message.message"
                                                                            Download
                                                                            class="text-reset">{{message.message}}</a>
                                                                    </h6>

                                                                </div>
                                                            </div>

                                                            <p v-if="message.type =='message'">
                                                                {{ message.message }}</p>
                                                            <div class="message-gallery"
                                                                v-if="message.type =='picture'">
                                                                <div class="row gx-3">
                                                                    <div class="col">
                                                                        <!-- <img class="img-fluid rounded"
                                                                            :src="'upload_file/'+message.message"
                                                                            data-action="zoom" alt=""> -->

                                                                        <!-- <vue-load-image>
                                                                            <img slot="image" class="img-fluid rounded"
                                                                                data-action="zoom" alt=""
                                                                                :src="'upload_file/'+message.message" />
                                                                            <img slot="preloader"
                                                                                class="img-fluid rounded"
                                                                                data-action="zoom" alt=""
                                                                                src="image-loader.gif" />
                                                                            <div slot="error">error message</div>
                                                                        </vue-load-image> -->

                                                                        <a href="#" data-bs-toggle="modal"
                                                                            data-bs-target="#modal-media-preview"
                                                                            :data-theme-img-url="'upload_file/'+message.message">
                                                                            <img class="img-fluid rounded"
                                                                                :src="'upload_file/'+message.message"
                                                                                alt=""
                                                                                onerror="this.onerror=null; this.src='no-image.png'"
                                                                                @click="fetcfile_src = 'upload_file/'+message.message"></a>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>

                                                        <!-- Dropdown -->
                                                        <div class="message-action">
                                                            <div class="dropdown">
                                                                <a class="icon text-muted" href="#" role="button"
                                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                                        stroke="currentColor" stroke-width="2"
                                                                        stroke-linecap="round" stroke-linejoin="round"
                                                                        class="feather feather-more-vertical">
                                                                        <circle cx="12" cy="12" r="1"></circle>
                                                                        <circle cx="12" cy="5" r="1"></circle>
                                                                        <circle cx="12" cy="19" r="1"></circle>
                                                                    </svg>
                                                                </a>

                                                                <ul class="dropdown-menu">

                                                                    <li>
                                                                        <a class="dropdown-item d-flex align-items-center text-danger"
                                                                            v-on:click="delete_messages(message.ms_id)"
                                                                            href="#">
                                                                            <span class="me-auto">Delete</span>
                                                                            <div class="icon">
                                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                                    width="24" height="24"
                                                                                    viewBox="0 0 24 24" fill="none"
                                                                                    stroke="currentColor"
                                                                                    stroke-width="2"
                                                                                    stroke-linecap="round"
                                                                                    stroke-linejoin="round"
                                                                                    class="feather feather-trash-2">
                                                                                    <polyline points="3 6 5 6 21 6">
                                                                                    </polyline>
                                                                                    <path
                                                                                        d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                                                    </path>
                                                                                    <line x1="10" y1="11" x2="10"
                                                                                        y2="17"></line>
                                                                                    <line x1="14" y1="11" x2="14"
                                                                                        y2="17"></line>
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


                                        <!-- <div v-if="index == messages.length - 1">yes</div> -->


                                    </div>

                                </div>
                            </div>


                        </div>
                        <div id="chat_container_test"></div>

                        <!-- <mainchat :message="message"></mainchat> -->
                        <!-- Chat: Content -->
                        <div class="pt-5"></div>
                        <div class="pt-5"></div>
                        <div class="pt-5"></div>

                        <div class="pt-5"></div>
                        <div class="pt-5"></div>

                        <!-- Chat: Footer -->

                        <div class="chat-footer pb-3 pb-lg-7 position-absolute bottom-0 start-0">
                            <!-- Chat: Files -->
                            <div class="dz-preview bg-dark" id="dz-preview-row" data-horizontal-scroll=""></div>
                            <!-- Chat: Files -->

                            <!-- Chat: Form -->
                            <div class="chat-form rounded-pill bg-dark">
                                <div class="row align-items-center gx-0">

                                    <div class="col-auto" v-if="ischatType == 'group'">
                                        <a href="#" class="btn btn-icon btn-link text-body rounded-circle"
                                            @click="assignment_clear_FN" data-bs-toggle="modal"
                                            data-bs-target="#modal-assignment">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                fill="currentColor" class="bi bi-card-checklist" viewBox="0 0 16 16">
                                                <path
                                                    d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z" />
                                                <path
                                                    d="M7 5.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0zM7 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 0 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0z" />
                                            </svg>
                                        </a>
                                    </div>

                                    <div class="col-auto">
                                        <input type="file" ref="file_massage" style="display: none"
                                            v-on:change="file_massageUpload()">
                                        <a href="#" class="btn btn-icon btn-link text-body rounded-circle" id="dz-btn"
                                            @click="$refs.file_massage.click()">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-paperclip">
                                                <path
                                                    d="M21.44 11.05l-9.19 9.19a6 6 0 0 1-8.49-8.49l9.19-9.19a4 4 0 0 1 5.66 5.66l-9.2 9.19a2 2 0 0 1-2.83-2.83l8.49-8.48">
                                                </path>
                                            </svg>
                                        </a>
                                    </div>

                                    <div class="col">
                                        <div class="input-group">
                                            <textarea class="form-control px-0" placeholder="Type your message..."
                                                rows="1" @keyup.enter="sendMessage" v-model="newMessage" type="text"
                                                name="message" data-emoji-input="" data-autosize="true"></textarea>

                                            <!-- <a href="#" class="input-group-text text-body pe-0" data-emoji-btn="">
                                                <span class="icon icon-lg">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-smile">
                                                        <circle cx="12" cy="12" r="10"></circle>
                                                        <path d="M8 14s1.5 2 4 2 4-2 4-2"></path>
                                                        <line x1="9" y1="9" x2="9.01" y2="9"></line>
                                                        <line x1="15" y1="9" x2="15.01" y2="9"></line>
                                                    </svg>
                                                </span>
                                            </a> -->
                                        </div>
                                    </div>

                                    <div class="col-auto">
                                        <button class="btn btn-icon btn-primary rounded-circle ms-5"
                                            @click="sendMessage">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-send">
                                                <line x1="22" y1="2" x2="11" y2="13"></line>
                                                <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <!-- Chat: Form -->
                        </div>
                        <!-- Chat: Footer -->
                    </div>

                </div>
            </main>

            <div class="offcanvas offcanvas-end offcanvas-aside " data-bs-scroll="true" data-bs-backdrop="false"
                tabindex="-1" id="offcanvas-add-members" style="visibility: visible;" aria-modal="true" role="dialog">
                <!-- Offcanvas Header -->
                <div class="offcanvas-header py-4 py-lg-7 border-bottom ">
                    <a class="icon icon-lg text-muted" href="#" data-bs-dismiss="offcanvas">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-chevron-left">
                            <polyline points="15 18 9 12 15 6"></polyline>
                        </svg>
                    </a>

                    <div class="visibility-xl-invisible overflow-hidden text-center">
                        <h5 class="text-truncate">สมาชิก</h5>
                        <p class="text-truncate">เพิ่มสมาชิก</p>
                    </div>

                    <a class="icon icon-lg text-muted" data-bs-toggle="collapse" href="#search-members" role="button"
                        aria-expanded="false" aria-controls="search-members" onclick="event.preventDefault();">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-filter">
                            <polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"></polygon>
                        </svg>
                    </a>
                </div>
                <!-- Offcanvas Header -->

                <!-- Offcanvas Body -->
                <div class="offcanvas-body hide-scrollbar py-0 new_sc">
                    <!-- Search -->
                    <div class="collapse" id="search-members">
                        <div class="border-bottom py-6">

                            <form action="#">
                                <div class="input-group">
                                    <div class="input-group-text" id="search-user">
                                        <div class="icon icon-lg">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-search">
                                                <circle cx="11" cy="11" r="8"></circle>
                                                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                            </svg>
                                        </div>
                                    </div>

                                    <input type="text" class="form-control form-control-lg ps-0"
                                        v-model="search_user_member_add_chat" placeholder="User name"
                                        aria-label="User name" aria-describedby="search-user">
                                </div>
                            </form>

                        </div>
                    </div>
                    <!-- Search -->

                    <!-- Members -->
                    <ul class="list-group list-group-flush">

                        <li class="list-group-item" v-for="(member, index)  in listFilteruser_member_add_chat "
                            :key="index">

                            <div class="row align-items-center gx-5">
                                <div class="col-auto">
                                    <div class="avatar">

                                        <img class="avatar-img" v-if="member.profile ==null"
                                            v-bind:src="'profile_upload/profile.png'" alt="">

                                        <img class="avatar-img" v-else v-bind:src="'profile_upload/'+member.profile"
                                            alt=""></div>
                                </div>
                                <div class="col">
                                    <h5>{{member.name}}</h5>
                                </div>
                                <div class="col-auto">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" :value="member.id"
                                            :id="'id-add-user-user-'+member.id" v-model="checkedAddUser_group">
                                        <label class="form-check-label" :for="'id-add-user-user-'+member.id"></label>
                                    </div>
                                </div>
                            </div>
                            <label class="stretched-label" :for="'id-add-user-user-'+member.id"></label>
                        </li>

                    </ul>
                    <!-- Members -->
                </div>
                <!-- Offcanvas Body -->

                <!-- Offcanvas Footer -->
                <div class="offcanvas-footer border-top py-4 py-lg-7">
                    <a href="#" class="btn btn-lg btn-primary w-100 d-flex align-items-center"
                        @click="addMemberChatGroup(thisDataChatGroup.threads_id)">
                        เพิ่มสมาชิก

                        <span class="icon ms-auto">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-chevron-right">
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg>
                        </span>
                    </a>
                </div>
                <!-- Offcanvas Footer -->
            </div>






            <!-- Chat -->

            <!-- Chat: Info -->
            <div class="offcanvas offcanvas-end " data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1"
                id="offcanvas-more">
                <!-- Offcanvas Header -->
                <div class="offcanvas-header py-4 py-lg-7 border-bottom">
                    <a class="icon icon-lg text-muted" href="#" data-bs-dismiss="offcanvas">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-chevron-left">
                            <polyline points="15 18 9 12 15 6"></polyline>
                        </svg>
                    </a>

                    <div class="visibility-xl-invisible overflow-hidden text-center">
                        <!-- <h5 class="text-truncate">{{user_name}}</h5> -->

                        <h4 class="text-truncate" v-if="ischatType=='chat'">{{ user_name }}
                        </h4>
                        <h4 class="text-truncate" v-else>{{  thisDataChatGroup.subject   }}</h4>

                    </div>

                    <!-- Dropdown -->
                    <div class="dropdown"></div>
                </div>
                <!-- Offcanvas Header -->

                <!-- Offcanvas Body -->
                <div class="offcanvas-body hide-scrollbar">
                    <!-- Avatar -->
                    <div class="text-center py-10">
                        <div class="row gy-6">
                            <div class="col-12">
                                <div class="avatar avatar-xl mx-auto" v-if="ischatType=='chat'">

                                    <img v-bind:src="'profile_upload/'+user_profile_conver" alt="#" class="avatar-img"
                                        v-if="ischatType=='chat'"></div>

                                <div class="avatar avatar-xl mx-auto" v-if="ischatType=='group'">

                                    <img class="avatar-img avatar-text bg-primary" v-if="chat_group_profile !=null"
                                        v-bind:src="'profile_upload/'+chat_group_profile" alt="">

                                    <span class="avatar-text bg-primary" v-else>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-image">
                                            <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                            <circle cx="8.5" cy="8.5" r="1.5"></circle>
                                            <polyline points="21 15 16 10 5 21"></polyline>
                                        </svg>
                                    </span>





                                    <input id="upload-profile-photo-chat" class="d-none" type="file"
                                        v-if="thisDataChatGroup.created_by == user.id" ref="file_profile_chat"
                                        v-on:change="updateChatgroup_profileChange()">
                                    <label class="stretched-label mb-0" for="upload-profile-photo-chat"></label>

                                </div>
                            </div>

                            <div class="col-12">
                                <div v-if="ischatType=='chat'">
                                    <h4 class="text-truncate">{{ user_name }}
                                    </h4>
                                </div>

                                <div v-else>
                                    <h4 class="text-truncate">{{ thisDataChatGroup.subject }}</h4>
                                    <p class="text-truncate">
                                        {{ thisDataChatGroup.about }}
                                    </p>
                                </div>

                                <div class="card border-0" v-if="thisDataChatGroup.created_by == user.id">
                                    <div class="card-body py-2">
                                        <div id="accordion-profile" class="accordion accordion-flush">
                                            <div class="accordion-item">
                                                <div id="accordion-profile-1" class="accordion-header"><a href="#"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#accordion-profile-body-1" aria-expanded="false"
                                                        aria-controls="accordion-profile-body-1"
                                                        class="accordion-button text-reset collapsed">
                                                        <div>
                                                            <h5>Chat settings</h5>
                                                            <p>Change your Chat settings</p>
                                                        </div>
                                                    </a></div>
                                                <div id="accordion-profile-body-1" aria-labelledby="accordion-profile-1"
                                                    data-parent="#accordion-profile" class="accordion-collapse collapse"
                                                    style="">
                                                    <div class="accordion-body">
                                                        <div class="form-floating mb-6">
                                                            <input type="text" v-model="update_chatgroup_subject"
                                                                ref="update_chatgroup_subject" class="form-control">
                                                            <label>chat name</label>
                                                        </div>
                                                        <div class="form-floating mb-6">
                                                            <textarea placeholder="Description"
                                                                ref="update_chatgroup_about"
                                                                v-model="update_chatgroup_about" rows="8"
                                                                data-autosize="true" class="form-control"
                                                                style="min-height: 100px;"></textarea>
                                                            <label>chat details</label>
                                                        </div>
                                                        <button type="button" @click="updateChatgroup()"
                                                            class="btn btn-block btn-lg btn-primary w-100">Save</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- Avatar -->

                    <!-- Tabs -->
                    <ul class="nav nav-pills nav-justified" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="pill" href="#offcanvas-tab-profile" role="tab"
                                aria-controls="offcanvas-tab-profile" aria-selected="true">
                                Profile
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="pill" href="#offcanvas-tab-media" role="tab"
                                v-on:click="fetcFile('picture')" aria-controls="offcanvas-tab-media"
                                aria-selected="true">
                                Media
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="pill" href="#offcanvas-tab-files" role="tab"
                                aria-controls="offcanvas-tab-files" aria-selected="false" v-on:click="fetcFile('file')">
                                Files
                            </a>
                        </li>
                    </ul>
                    <!-- Tabs -->

                    <!-- Tabs: Content -->
                    <div class="tab-content py-2" role="tablist">
                        <!-- Profile -->
                        <div class="tab-pane fade show active" id="offcanvas-tab-profile" role="tabpanel">
                            <ul class="list-group list-group-flush" v-if="ischatType=='chat'">
                                <li class="list-group-item">
                                    <div class="row align-items-center gx-6">
                                        <div class="col">
                                            <h5>Phone</h5>
                                            <p>{{user_tel_conver}}</p>
                                        </div>

                                        <div class="col-auto">
                                            <div class="btn btn-sm btn-icon btn-dark">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-phone-call">
                                                    <path
                                                        d="M15.05 5A5 5 0 0 1 19 8.95M15.05 1A9 9 0 0 1 23 8.94m-1 7.98v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                                                    </path>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <li class="list-group-item">
                                    <div class="row align-items-center gx-6">
                                        <div class="col">
                                            <h5>E-mail</h5>
                                            <p>{{ user_email_conver }}</p>
                                        </div>

                                        <div class="col-auto">
                                            <div class="btn btn-sm btn-icon btn-dark">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-mail">
                                                    <path
                                                        d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z">
                                                    </path>
                                                    <polyline points="22,6 12,13 2,6"></polyline>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>

                            <ul class="list-group list-group-flush" v-if="ischatType=='group'">
                                <li class="list-group-item">
                                    <div class="row align-items-center gx-5">
                                        <!-- Avatar -->
                                        <div class="col-auto">
                                            <a href="#" class="avatar">
                                                <img class="avatar-img"
                                                    :src="'profile_upload/'+thisDataChatGroup.profile" alt=""
                                                    v-if="thisDataChatGroup.profile!=null">
                                                <img class="avatar-img" :src="'profile_upload/profile.png'" alt=""
                                                    v-else></a>
                                        </div>
                                        <!-- Avatar -->

                                        <!-- Text -->
                                        <div class="col">
                                            <h5>
                                                <a href="#">{{ thisDataChatGroup.name }}</a>
                                            </h5>

                                        </div>
                                        <!-- Text -->

                                        <!-- Owner -->
                                        <div class="col-auto">
                                            <span class="extra-small text-primary">owner</span>
                                        </div>
                                        <!-- Owner -->

                                        <!-- Dropdown -->
                                        <div class="col-auto"></div>
                                        <!-- Dropdown -->
                                    </div>
                                </li>

                                <li class="list-group-item" v-for="(member, index) in chat_group_member" :key="index"
                                    v-if="member.user_id !=thisDataChatGroup.id">
                                    <div class="row align-items-center gx-5">
                                        <!-- Avatar -->
                                        <div class="col-auto">
                                            <a href="#" class="avatar">
                                                <img class="avatar-img" :src="'profile_upload/'+member.profile" alt=""
                                                    v-if="member.profile!=null">
                                                <img class="avatar-img" :src="'profile_upload/profile.png'" alt=""
                                                    v-else></a>
                                        </div>
                                        <!-- Avatar -->

                                        <!-- Text -->
                                        <div class="col">
                                            <h5>
                                                <a href="#">{{ member.name }}</a>
                                            </h5>

                                        </div>
                                        <!-- Text -->

                                        <!-- Dropdown -->
                                        <div class="col-auto" v-if="thisDataChatGroup.created_by == user.id">
                                            <div class="dropdown">
                                                <a class="icon text-muted" href="#" role="button"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-more-vertical">
                                                        <circle cx="12" cy="12" r="1"></circle>
                                                        <circle cx="12" cy="5" r="1"></circle>
                                                        <circle cx="12" cy="19" r="1"></circle>
                                                    </svg>
                                                </a>

                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a class="dropdown-item d-flex align-items-center text-danger"
                                                            @click="deleteMemberChatGroup(member.user_id)" href="#">
                                                            Delete
                                                            <div class="icon ms-auto">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-trash-2">
                                                                    <polyline points="3 6 5 6 21 6"></polyline>
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
                                        <!-- Dropdown -->
                                    </div>
                                </li>

                            </ul>

                            <!-- <ul class="list-group list-group-flush border-top mt-8">


                                <li class="list-group-item">
                                    <a href="#" class="text-danger">Delete Chat</a>
                                </li>
                            </ul> -->
                        </div>
                        <!-- Profile -->

                        <!-- Media -->
                        <div class="tab-pane fade" id="offcanvas-tab-media" role="tabpanel">
                            <div class="row row-cols-3 g-3 py-6">
                                <div class="col" v-for="(file, index) in fetcfile" :key="index">


                                    <a href="#" data-bs-toggle="modal" data-bs-target="#modal-media-preview"
                                        :data-theme-img-url="'upload_file/'+file.message">
                                        <img class="img-fluid rounded" :src="'upload_file/'+file.message" alt=""
                                            @click="fetcfile_src = 'upload_file/'+file.message"></a>
                                </div>

                            </div>
                        </div>
                        <!-- Media -->

                        <!-- Files -->
                        <div class="tab-pane fade" id="offcanvas-tab-files" role="tabpanel">
                            <ul class="list-group list-group-flush">

                                <!-- Item -->
                                <li class="list-group-item" v-for="(file, index) in fetcfile" :key="index">
                                    <div class="row align-items-center gx-5">
                                        <!-- Icons -->
                                        <div class="col-auto">
                                            <div class="avatar-group">
                                                <!-- <a href="#" class="avatar avatar-sm">
                                                    <img src="assets/img/avatars/2.jpg" class="avatar-img" alt="#">
                                                </a> -->

                                                <a href="#" class="avatar avatar-sm">
                                                    <span class="avatar-text bg-primary">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" class="feather feather-file-text">
                                                            <path
                                                                d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z">
                                                            </path>
                                                            <polyline points="14 2 14 8 20 8"></polyline>
                                                            <line x1="16" y1="13" x2="8" y2="13"></line>
                                                            <line x1="16" y1="17" x2="8" y2="17"></line>
                                                            <polyline points="10 9 9 9 8 9"></polyline>
                                                        </svg>
                                                    </span>
                                                </a>
                                            </div>
                                        </div>
                                        <!-- Icons -->

                                        <!-- Text -->
                                        <div class="col overflow-hidden">
                                            <h5 class="text-truncate">
                                                <a :href="'upload_file/'+file.message" Download>{{ file.message }}</a>
                                            </h5>

                                        </div>

                                    </div>
                                </li>

                            </ul>
                        </div>
                        <!-- Files -->
                    </div>
                    <!-- Tabs: Content -->
                </div>
                <!-- Offcanvas Body -->
            </div>
        </div>
        <!-- Layout -->

        <!-- Modal: Invite -->
        <div class="modal fade" id="modal-invite" tabindex="-1" aria-labelledby="modal-invite" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-fullscreen-xl-down">
                <div class="modal-content">

                    <!-- Modal: Body -->
                    <div class="modal-body py-0">
                        <!-- Header -->
                        <div class="profile modal-gx-n">
                            <div class="profile-img text-primary rounded-top-xl">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 400 140.74">

                                    <g>
                                        <g>
                                            <path d="M400,125A1278.49,1278.49,0,0,1,0,125V0H400Z" />
                                            <path class="cls-2"
                                                d="M361.13,128c.07.83.15,1.65.27,2.46h0Q380.73,128,400,125V87l-1,0a38,38,0,0,0-38,38c0,.86,0,1.71.09,2.55C361.11,127.72,361.12,127.88,361.13,128Z" />
                                            <path class="cls-2"
                                                d="M12.14,119.53c.07.79.15,1.57.26,2.34v0c.13.84.28,1.66.46,2.48l.07.3c.18.8.39,1.59.62,2.37h0q33.09,4.88,66.36,8,.58-1,1.09-2l.09-.18a36.35,36.35,0,0,0,1.81-4.24l.08-.24q.33-.94.6-1.9l.12-.41a36.26,36.26,0,0,0,.91-4.42c0-.19,0-.37.07-.56q.11-.86.18-1.73c0-.21,0-.42,0-.63,0-.75.08-1.51.08-2.28a36.5,36.5,0,0,0-73,0c0,.83,0,1.64.09,2.45C12.1,119.15,12.12,119.34,12.14,119.53Z" />
                                            <circle class="cls-2" cx="94.5" cy="57.5" r="22.5" />
                                            <path class="cls-2" d="M276,0a43,43,0,0,0,43,43A43,43,0,0,0,362,0Z" />
                                        </g>
                                    </g>
                                </svg>

                                <div class="position-absolute top-0 start-0 p-5">
                                    <button type="button" class="btn-close btn-close-white btn-close-arrow opacity-100"
                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                            </div>

                            <div class="profile-body">
                                <div class="avatar avatar-lg">
                                    <span class="avatar-text bg-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-user-plus">
                                            <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                            <circle cx="8.5" cy="7" r="4"></circle>
                                            <line x1="20" y1="8" x2="20" y2="14"></line>
                                            <line x1="23" y1="11" x2="17" y2="11"></line>
                                        </svg>
                                    </span>
                                </div>

                                <h4 class="fw-bold mb-1">Invite your friends</h4>
                                <p style="font-size: 16px;">Send invitation links to your friends</p>
                            </div>
                        </div>
                        <!-- Header -->

                        <hr class="hr-bold modal-gx-n my-0">

                        <!-- Form -->
                        <div class="modal-py">
                            <form class="row gy-6">
                                <div class="col-12">
                                    <label for="invite-email" class="form-label text-muted">E-mail</label>
                                    <input type="email" class="form-control form-control-lg" id="invite-email"
                                        placeholder="name@example.com"></div>

                                <div class="col-12">
                                    <label for="invite-message" class="form-label text-muted">Message</label>
                                    <textarea class="form-control form-control-lg" id="invite-message" rows="3"
                                        placeholder="Custom message"></textarea>
                                </div>
                            </form>
                        </div>
                        <!-- Form -->

                        <hr class="hr-bold modal-gx-n my-0">

                        <!-- Button -->
                        <div class="modal-py">
                            <a href="#" class="btn btn-lg btn-primary w-100 d-flex align-items-center"
                                data-bs-toggle="modal" data-bs-target="#invite-modal">
                                Send

                                <span class="icon ms-auto">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-chevron-right">
                                        <polyline points="9 18 15 12 9 6"></polyline>
                                    </svg>
                                </span>
                            </a>
                        </div>
                        <!-- Button -->
                    </div>
                    <!-- Modal: Body -->

                </div>
            </div>
        </div>

        <!-- Modal: Profile -->
        <div class="modal fade" id="modal-profile" tabindex="-1" aria-labelledby="modal-profile" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-fullscreen-xl-down">
                <div class="modal-content">

                    <!-- Modal body -->
                    <div class="modal-body py-0">
                        <!-- Header -->
                        <div class="profile modal-gx-n">
                            <div class="profile-img text-primary rounded-top-xl">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 400 140.74">

                                    <g>
                                        <g>
                                            <path d="M400,125A1278.49,1278.49,0,0,1,0,125V0H400Z" />
                                            <path class="cls-2"
                                                d="M361.13,128c.07.83.15,1.65.27,2.46h0Q380.73,128,400,125V87l-1,0a38,38,0,0,0-38,38c0,.86,0,1.71.09,2.55C361.11,127.72,361.12,127.88,361.13,128Z" />
                                            <path class="cls-2"
                                                d="M12.14,119.53c.07.79.15,1.57.26,2.34v0c.13.84.28,1.66.46,2.48l.07.3c.18.8.39,1.59.62,2.37h0q33.09,4.88,66.36,8,.58-1,1.09-2l.09-.18a36.35,36.35,0,0,0,1.81-4.24l.08-.24q.33-.94.6-1.9l.12-.41a36.26,36.26,0,0,0,.91-4.42c0-.19,0-.37.07-.56q.11-.86.18-1.73c0-.21,0-.42,0-.63,0-.75.08-1.51.08-2.28a36.5,36.5,0,0,0-73,0c0,.83,0,1.64.09,2.45C12.1,119.15,12.12,119.34,12.14,119.53Z" />
                                            <circle class="cls-2" cx="94.5" cy="57.5" r="22.5" />
                                            <path class="cls-2" d="M276,0a43,43,0,0,0,43,43A43,43,0,0,0,362,0Z" />
                                        </g>
                                    </g>
                                </svg>

                                <div class="position-absolute top-0 start-0 py-6 px-5">
                                    <button type="button" class="btn-close btn-close-white btn-close-arrow opacity-100"
                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                            </div>

                            <div class="profile-body">
                                <div class="avatar avatar-xl">
                                    <img class="avatar-img" v-bind:src="'profile_upload/profile.png'" alt="#"
                                        v-if="user.profile ==null">
                                    <img class="avatar-img" v-bind:src="'profile_upload/'+user.profile" alt="#" v-else>
                                </div>

                                <h4 class="mb-1">{{ user.name }}</h4>
                                <!-- <p>last seen 5 minutes ago</p> -->
                            </div>
                        </div>
                        <!-- Header -->

                        <hr class="hr-bold modal-gx-n my-0">

                        <!-- List -->
                        <ul class="list-group list-group-flush">

                            <li class="list-group-item">
                                <div class="row align-items-center gx-6">
                                    <div class="col">
                                        <h5>E-mail</h5>
                                        <p>{{ user.email }}</p>
                                    </div>

                                    <div class="col-auto">
                                        <div class="btn btn-sm btn-icon btn-dark">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-mail">
                                                <path
                                                    d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z">
                                                </path>
                                                <polyline points="22,6 12,13 2,6"></polyline>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </li>

                            <li class="list-group-item">
                                <div class="row align-items-center gx-6">
                                    <div class="col">
                                        <h5>Phone</h5>
                                        <p>{{ user.tel }}</p>
                                    </div>

                                    <div class="col-auto">
                                        <div class="btn btn-sm btn-icon btn-dark">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-phone-call">
                                                <path
                                                    d="M15.05 5A5 5 0 0 1 19 8.95M15.05 1A9 9 0 0 1 23 8.94m-1 7.98v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                                                </path>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <!-- List  -->

                        <hr class="hr-bold modal-gx-n my-0">


                        <!-- List -->

                        <hr class="hr-bold modal-gx-n my-0">

                        <!-- List -->
                        <ul class="list-group list-group-flush">

                            <li class="list-group-item">
                                <a href="logout" class="text-danger">Logout</a>
                            </li>
                        </ul>
                        <!-- List -->
                    </div>
                    <!-- Modal body -->

                </div>
            </div>
        </div>

        <div class="modal fade" id="modal-assignment" tabindex="-1" aria-labelledby="modal-assignment"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-fullscreen-xl-down">
                <div class="modal-content">

                    <!-- Modal body -->
                    <div class="modal-body py-0">
                        <!-- Header -->
                        <div class="profile modal-gx-n">

                            <div class="profile-img text-primary rounded-top-xl">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 60 400 90">
                                    <g>
                                        <path d="M400,125A1278.49,1278.49,0,0,1,0,125V0H400Z" />
                                    </g>
                                </svg>

                                <div class="position-absolute top-0 start-0 py-6 px-5">
                                    <button type="button" class="btn-close btn-close-white btn-close-arrow opacity-100"
                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                            </div>

                            <div class="profile-body">
                                <div class="avatar avatar-xl mx-auto">

                                    <img class="avatar-img avatar-text bg-primary"
                                        v-if="thisDataChatGroup.threads_profile !=null"
                                        v-bind:src="'profile_upload/'+thisDataChatGroup.threads_profile" alt="">
                                    <span class="avatar-text bg-primary" v-else>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-image">
                                            <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                            <circle cx="8.5" cy="8.5" r="1.5"></circle>
                                            <polyline points="21 15 16 10 5 21"></polyline>
                                        </svg>
                                    </span>

                                </div>

                                <h4 class="mb-1">{{ thisDataChatGroup.subject }}</h4>
                                <p class="mb-1">{{ thisDataChatGroup.about }}</p>
                                <!-- <p>last seen 5 minutes ago</p> -->
                            </div>
                        </div>
                        <!-- Header -->

                        <hr class="hr-bold modal-gx-n my-0">

                        <div class="mt-5">

                            <div class="form-group mb-6">
                                <label for="assignment-name">เรื่อง :</label>
                                <input type="text" id="assignment-name" placeholder="เรื่อง ..." class="form-control"
                                    ref="assignment_name"></div>

                            <div class="form-group mb-6">
                                <label for="assignment-about">รายละเอียด :</label>
                                <textarea rows="5" id="assignment-about" placeholder="รายละเอียด ..."
                                    class="form-control" ref="assignment_about" style="height:150px;"></textarea>
                            </div>

                            <div class="form-group mb-6">
                                <label for="assignment-about">กำหนดการนัดอัพเดทงาน</label>
                                <textarea rows="5" id="assignment-repeat" placeholder="กำหนดการนัดอัพเดทงาน ..."
                                    class="form-control" ref="assignment_repeat" style="height:70px;"></textarea>
                            </div>

                            <div class="form-group mb-6 mx-auto">
                                <label for="assignment-about">กำหนดวันส่งงาน</label>
                                <!-- <v-date-picker mode="date" v-model="date" /> -->
                                <center>
                                    <v-date-picker v-model="assignment_date" mode="dateTime" locale="th" is24hr>
                                        <template v-slot="{ inputValue, inputEvents }">
                                            <input
                                                class="px-2 py-1 border rounded focus:outline-none focus:border-blue-300 form-control"
                                                :value="inputValue" v-on="inputEvents" />
                                        </template>
                                    </v-date-picker>
                                </center>
                            </div>

                            <div class="form-group mb-6">
                                <label for="assignment-about">อัพโหลดไฟล์</label>
                                <input type="file" id="assignment-file" multiple="multiple" class="form-control"
                                    ref="assignment_files" @change="File_assignment_FN($event)">

                                <ul>
                                    <li v-for="(files , index) in assignment_file_file" :key="index"
                                        v-if="assignment_status=='add'">
                                        <a v-bind:href="assignment_file_file_src[index]" download="">{{files.name}}</a>
                                    </li>

                                    <li v-for="(files , index) in assignment_file_file" :key="index"
                                        v-if="assignment_status=='update'">
                                        <a v-bind:href="'upload_file/'+files.assignments_file"
                                            download="">{{files.name}}</a>
                                    </li>
                                </ul>

                            </div>

                        </div>


                        <hr class="hr-bold modal-gx-n my-0">

                        <!-- List -->
                        <ul class="list-group list-group-flush">

                            <div class="border-bottom py-6">

                                <form action="#">
                                    <div class="input-group">
                                        <div class="input-group-text" id="search-user">
                                            <div class="icon icon-lg">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-search">
                                                    <circle cx="11" cy="11" r="8"></circle>
                                                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                                </svg>
                                            </div>
                                        </div>

                                        <input type="text" class="form-control form-control-lg ps-0"
                                            v-model="search_chat_group_member" placeholder="User name"
                                            aria-label="User name" aria-describedby="search-user">
                                    </div>
                                </form>

                            </div>

                            <li class="list-group-item new-sc" v-for="(member, index)  in listFilterchat_group_member"
                                :key="index" v-if="member.user_id != user.id">

                                <div class="row align-items-center gx-5">
                                    <div class="col-auto">
                                        <div class="avatar">

                                            <img class="avatar-img" v-if="member.profile ==null"
                                                v-bind:src="'profile_upload/profile.png'" alt="">

                                            <img class="avatar-img" v-else v-bind:src="'profile_upload/'+member.profile"
                                                alt=""></div>
                                    </div>
                                    <div class="col">
                                        <h5>{{member.name}}</h5>
                                    </div>
                                    <div class="col-auto">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" :value="member.user_id"
                                                :id="'id-add-user-assignment-'+member.user_id"
                                                v-model="user_assignment">
                                            <label class="form-check-label"
                                                :for="'id-add-user-assignment-'+member.user_id"></label>
                                        </div>
                                    </div>
                                </div>
                                <label class="stretched-label" :for="'id-add-user-assignment-'+member.user_id"></label>
                            </li>
                        </ul>
                        <!-- List  -->
                    </div>
                    <!-- Modal body -->
                    <div class="container mt-n4 mb-8 position-relative">
                        <button type="button" class="btn btn-lg btn-primary w-100 d-flex align-items-center"
                            v-if="assignment_status == 'add'" @click="Addassignment()">
                            Add assignment
                            <span class="icon ms-auto">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-chevron-right">
                                    <polyline points="9 18 15 12 9 6"></polyline>
                                </svg>
                            </span>
                        </button>

                        <button type="button" class="btn btn-lg btn-primary w-100 d-flex align-items-center"
                            v-if="assignment_status == 'update'" @click="UpdateassignmentFN()">
                            Update assignment
                            <span class="icon ms-auto">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-chevron-right">
                                    <polyline points="9 18 15 12 9 6"></polyline>
                                </svg>
                            </span>
                        </button>


                    </div>

                </div>
            </div>
        </div>


        <div class="modal fade" id="modal-assignment-send" tabindex="-1" aria-labelledby="modal-assignment-send"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-fullscreen-xl-down">
                <div class="modal-content">

                    <!-- Modal body -->
                    <div class="modal-body py-0">
                        <!-- Header -->
                        <div class="profile modal-gx-n">

                            <div class="profile-img text-primary rounded-top-xl">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 60 400 90">
                                    <g>
                                        <path d="M400,125A1278.49,1278.49,0,0,1,0,125V0H400Z" />
                                    </g>
                                </svg>

                                <div class="position-absolute top-0 start-0 py-6 px-5">
                                    <button type="button" class="btn-close btn-close-white btn-close-arrow opacity-100"
                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                            </div>


                            <!-- <div class="profile-body"> -->
                            <div class="form-group mb-6 pl-4 pr-4">

                                <div class="row gx-5">
                                    <div class="col">
                                        <div class="mb-2">
                                            <h5 class="me-auto mb-0">เรื่อง : {{ thisAssignment.assignments_name }}
                                            </h5>
                                        </div>

                                    </div>
                                </div>
                                <div class="row gx-5">
                                    <div class="col">
                                        <div class="mb-2">
                                            <h5 class="me-auto mb-0">รายละเอียด : </h5>
                                            {{ thisAssignment.assignments_details }}
                                            <ul>
                                                <li v-for="(thisfile,index) in thisAssignment.files  " :key="index">
                                                    <a :href="'upload_file/'+thisfile.assignments_file" download="">
                                                        {{ thisfile.assignments_file_name }}</a>
                                                </li>
                                            </ul>
                                        </div>

                                    </div>
                                </div>
                                <div class="row gx-5">
                                    <div class="col">
                                        <h5 class="me-auto mb-0">
                                            กำหนดการนัดอัพเดทงาน : </h5>
                                        {{ thisAssignment.assignments_repeat }}
                                    </div>
                                </div>
                                <div class="row gx-5">
                                    <div class="col">
                                        <h5 class="me-auto mb-0">
                                            กำหนดการส่งงาน :
                                        </h5>
                                        {{ thisAssignment.assignments_date }}
                                    </div>
                                </div>
                            </div>


                        </div>
                        <!-- Header -->

                        <hr class="hr-bold modal-gx-n my-0">

                        <div class="mt-5">

                            <div class="form-group mb-6">
                                <label for="assignment-about">สรุปรายละเอียดการส่งงาน:</label>
                                <textarea rows="5" id="assignment-about" placeholder="รายละเอียด ..." :maxlength="300"
                                    class="form-control" ref="assignment_details_send" style="height:150px;"></textarea>
                            </div>


                            <div class="form-group mb-6">
                                <label for="assignment-about">อัพโหลดไฟล์</label>
                                <input type="file" id="assignment-file" multiple="multiple" class="form-control"
                                    ref="assignment_files_sub" @change="File_assignment_sub_FN($event)">

                                <ul>
                                    <li v-for="(files , index) in assignment_file_file" :key="index">
                                        <a v-bind:href="assignment_file_file_src[index]" download="">{{files.name}}</a>
                                    </li>
                                </ul>

                            </div>

                        </div>


                        <hr class="hr-bold modal-gx-n my-0">
                        <div class="mt-5 pl-4 pr-4 mb-7">
                            <div class="form-group mb-6">
                                <div class="row ">
                                    <div class="col">
                                        <input class="form-check-input" type="radio" name="checksend" value="update"
                                            v-model="checksend">
                                        <label class="form-check-label">
                                            อัพเดทงาน
                                        </label>
                                    </div>
                                    <div class="col">
                                        <input class="form-check-input" type="radio" name="checksend" value="send"
                                            v-model="checksend" checked>
                                        <label class="form-check-label">
                                            ส่งาน
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>



                    </div>
                    <!-- Modal body -->
                    <div class="container mt-n4 mb-8 position-relative">
                        <button type="button" class="btn btn-lg btn-primary w-100 d-flex align-items-center"
                            @click="thisAssignmentSendFN">
                            ส่งงาน
                            <span class="icon ms-auto">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-chevron-right">
                                    <polyline points="9 18 15 12 9 6"></polyline>
                                </svg>
                            </span>
                        </button>

                    </div>

                </div>
            </div>
        </div>



        <!-- Modal: User profile -->
        <div class="modal fade" id="modal-user-profile" tabindex="-1" aria-labelledby="modal-user-profile"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-fullscreen-xl-down">
                <div class="modal-content">

                    <!-- Modal body -->
                    <div class="modal-body py-0">
                        <!-- Header -->
                        <div class="profile modal-gx-n">
                            <div class="profile-img text-primary rounded-top-xl">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 400 140.74">

                                    <g>
                                        <g>
                                            <path d="M400,125A1278.49,1278.49,0,0,1,0,125V0H400Z" />
                                            <path class="cls-2"
                                                d="M361.13,128c.07.83.15,1.65.27,2.46h0Q380.73,128,400,125V87l-1,0a38,38,0,0,0-38,38c0,.86,0,1.71.09,2.55C361.11,127.72,361.12,127.88,361.13,128Z" />
                                            <path class="cls-2"
                                                d="M12.14,119.53c.07.79.15,1.57.26,2.34v0c.13.84.28,1.66.46,2.48l.07.3c.18.8.39,1.59.62,2.37h0q33.09,4.88,66.36,8,.58-1,1.09-2l.09-.18a36.35,36.35,0,0,0,1.81-4.24l.08-.24q.33-.94.6-1.9l.12-.41a36.26,36.26,0,0,0,.91-4.42c0-.19,0-.37.07-.56q.11-.86.18-1.73c0-.21,0-.42,0-.63,0-.75.08-1.51.08-2.28a36.5,36.5,0,0,0-73,0c0,.83,0,1.64.09,2.45C12.1,119.15,12.12,119.34,12.14,119.53Z" />
                                            <circle class="cls-2" cx="94.5" cy="57.5" r="22.5" />
                                            <path class="cls-2" d="M276,0a43,43,0,0,0,43,43A43,43,0,0,0,362,0Z" />
                                        </g>
                                    </g>
                                </svg>

                                <div class="position-absolute top-0 start-0 p-5">
                                    <button type="button" class="btn-close btn-close-white btn-close-arrow opacity-100"
                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                            </div>

                            <div class="profile-body">
                                <div class="avatar avatar-xl">
                                    <img class="avatar-img" v-if="setfriend.profile ==null"
                                        v-bind:src="'profile_upload/profile.png'" alt="">

                                    <img class="avatar-img" v-else v-bind:src="'profile_upload/'+setfriend.profile"
                                        alt="">
                                </div>

                                <h4 class="mb-1">{{ setfriend.name}}t</h4>
                                <!-- <p>last seen 5 minutes ago</p> -->
                            </div>
                        </div>
                        <!-- Header -->

                        <hr class="hr-bold modal-gx-n my-0">

                        <!-- List -->
                        <ul class="list-group list-group-flush">

                            <li class="list-group-item">
                                <div class="row align-items-center gx-6">
                                    <div class="col">
                                        <h5>E-mail</h5>
                                        <p>{{ setfriend.email}}</p>
                                    </div>

                                    <div class="col-auto">
                                        <div class="btn btn-sm btn-icon btn-dark">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-mail">
                                                <path
                                                    d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z">
                                                </path>
                                                <polyline points="22,6 12,13 2,6"></polyline>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </li>

                            <li class="list-group-item">
                                <div class="row align-items-center gx-6">
                                    <div class="col">
                                        <h5>Phone</h5>
                                        <p>{{ setfriend.tel}}</p>
                                    </div>

                                    <div class="col-auto">
                                        <div class="btn btn-sm btn-icon btn-dark">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-phone-call">
                                                <path
                                                    d="M15.05 5A5 5 0 0 1 19 8.95M15.05 1A9 9 0 0 1 23 8.94m-1 7.98v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                                                </path>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <!-- List -->

                        <hr class="hr-bold modal-gx-n my-0">

                        <!-- List -->

                        <!-- List -->

                        <hr class="hr-bold modal-gx-n my-0">


                    </div>
                    <!-- Modal body -->

                </div>
            </div>
        </div>

        <!-- Modal: Media Preview -->
        <div class="modal fade" id="modal-media-preview" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-centered modal-fullscreen-xl-down">
                <div class="modal-content">

                    <!-- Modal: Header -->
                    <div class="modal-header">
                        <button type="button" class="btn-close btn-close-arrow" data-bs-dismiss="modal"
                            aria-label="Close"></button>


                        <!-- Dropdown -->
                        <div class="dropdown">
                            <a class="icon text-muted" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-more-vertical">
                                    <circle cx="12" cy="12" r="1"></circle>
                                    <circle cx="12" cy="5" r="1"></circle>
                                    <circle cx="12" cy="19" r="1"></circle>
                                </svg>
                            </a>

                            <ul class="dropdown-menu">

                                <li>
                                    <a class="dropdown-item d-flex align-items-center text-danger" :href="fetcfile_src"
                                        download="">
                                        <span class="me-auto">Download</span>
                                        <div class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-cloud-arrow-down" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd"
                                                    d="M7.646 10.854a.5.5 0 0 0 .708 0l2-2a.5.5 0 0 0-.708-.708L8.5 9.293V5.5a.5.5 0 0 0-1 0v3.793L6.354 8.146a.5.5 0 1 0-.708.708l2 2z" />
                                                <path
                                                    d="M4.406 3.342A5.53 5.53 0 0 1 8 2c2.69 0 4.923 2 5.166 4.579C14.758 6.804 16 8.137 16 9.773 16 11.569 14.502 13 12.687 13H3.781C1.708 13 0 11.366 0 9.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383zm.653.757c-.757.653-1.153 1.44-1.153 2.056v.448l-.445.049C2.064 6.805 1 7.952 1 9.318 1 10.785 2.23 12 3.781 12h8.906C13.98 12 15 10.988 15 9.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 4.825 10.328 3 8 3a4.53 4.53 0 0 0-2.941 1.1z" />
                                            </svg>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- Dropdown -->

                    </div>
                    <!-- Modal: Header -->

                    <!-- Modal: Body -->
                    <div class="modal-body p-0">
                        <div class="d-flex align-items-center justify-content-center h-100">
                            <img class="img-fluid modal-preview-url" :src="fetcfile_src" alt="#"></div>
                    </div>
                    <!-- Modal: Body -->

                    <!-- Modal: Footer -->
                    <!-- <div class="modal-footer">
                        <div class="w-100 text-center">
                            <h6><a href="#">Marshall Wallaker</a></h6>
                            <p class="small">Today at 14:43</p>
                        </div>
                    </div> -->
                    <!-- Modal: Footer -->
                </div>
            </div>
        </div>

    </div>

</template>
<style></style>

<script>
    import VueLoadImage from 'vue-load-image'
    window.csrf_token = "{{ csrf_token() }}"
    export default {
        props: ['user'],
        components: {
            'vue-load-image': VueLoadImage
        },
        data() {
            return {

                // date: new Date(),
                messages: [],
                fetcfile: [],
                fetcfile_src: '',
                newMessage: '',
                users: [],
                activeUser: false,
                typingTimer: false,
                isActive: false,
                users_id: '',
                alluser: [],
                alluser_group: [],
                checkedUser_group: [],
                checkedAddUser_group: [],
                ChatGroup: [],
                user_name: '',
                user_profile: '',
                user_profile_conver: '',
                user_email_conver: '',
                user_tel_conver: '',
                myObjectNull: null,
                search_user: '',
                search_user_group: '',
                user_name_me: '',
                user_email_me: '',
                user_tel_me: '',
                file_profile: '',
                file_massage: '',
                group_profile_previre: '',
                search_ChatGroup: '',
                ischatType: '',
                chat_group_id: '',
                chat_group_name: '',
                chat_group_profile: 'profile.png',
                search_user_member_add_chat: '',
                chat_group_member: [],
                chat_group_member_assignment: [],
                thisDataChatGroup: [],
                user_member_add_chat: [],
                user_assignment: [],
                search_chat_group_member: '',
                assignment_name: '',
                assignment_about: '',
                assignment_repeat: '',
                assignment_date: new Date(),
                assignment_file_file: [],
                assignment_file_file_src: [],
                assignment_get: [],
                assignment_to: [],
                assignment_succus: [],
                assignment_work: [],
                search_assignment: '',
                assignments_id: '',
                assignment_status: 'add',
                thisAssignment: [],
                checksend: 'send',
                userread: 0,
                update_chatgroup_subject: '',
                update_chatgroup_about: '',
                setfriend: [],

            }
        },
        created() {


            if (process.client) {
                document.addEventListener('visibilitychange', (event) => {
                    if (document.visibilityState != 'visible') {
                        alert('Tab Changed')
                    }
                })

                document.addEventListener('contextmenu', (event) => {
                    event.preventDefault()
                    alert('Right Click Disabled')
                })

                document.onkeydown = function (event) {
                    if (event.keyCode == 123) {
                        // Prevent F12
                        return false
                    } else if (event.ctrlKey && event.shiftKey && event.keyCode == 73) {
                        // Prevent Ctrl+Shift+I
                        return false
                    }
                }
            }

            this.user_name_me = this.user.name;
            this.user_email_me = this.user.email;
            this.user_tel_me = this.user.tel;

            // this.fetchMessages();
            // this.startListening();

            this.GetUser();
            this.GetUserGroup();
            this.getChatGroup();

            setInterval(() => {
                this.fetchMessages()
                this.GetUser();
                this.getChatGroup();
            }, 2000)

            if (this.user_profile_conver == '') {
                this.user_profile_conver = 'profile.png';
            }

            this.assignment_get_FN();
        },
        computed: {
            listFilterUser() {
                let text = this.search_user.trim()
                return this.alluser.filter(item => {
                    return item.name.indexOf(text) > -1
                })
            },
            listFilterUserGroup() {
                let text = this
                    .search_user_group
                    .trim()
                return this
                    .alluser_group
                    .filter(item => {
                        return item
                            .name
                            .indexOf(text) > -1
                    })
            },
            listFilterChatGroup() {
                let text = this
                    .search_ChatGroup
                    .trim()
                return this
                    .ChatGroup
                    .filter(item => {
                        return item
                            .subject
                            .indexOf(text) > -1
                    })
            },
            listFilteruser_member_add_chat() {
                let text = this
                    .search_user_member_add_chat
                    .trim()
                return this
                    .user_member_add_chat
                    .filter(item => {
                        return item
                            .name
                            .indexOf(text) > -1
                    })
            },
            listFilterchat_group_member() {
                let text = this
                    .search_chat_group_member
                    .trim()
                return this
                    .chat_group_member_assignment
                    .filter(item => {
                        return item
                            .name
                            .indexOf(text) > -1
                    })
            },
            listFilterAssignment() {
                let text = this.search_assignment.trim()
                return this.assignment_work.filter(item => {
                    return item.assignments_name.indexOf(text) > -1
                })
            },


        },
        methods: {

            setfriendFN(profile, name, email, tel) {
                this.setfriend = [];
                this.setfriend = {
                    'profile': profile,
                    'name': name,
                    'email': email,
                    'tel': tel
                };
            },

            updateChatgroup_profileChange(e) {

                const file = this.$refs.file_profile_chat.files[0];

                let formData = new FormData();
                formData.append('file', file);
                formData.append('threads_id', this.thisDataChatGroup.threads_id);
                axios
                    .post('updatgroup_profile', formData, {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    })
                    .then(response => {
                        this.chat_group_profile = response.data.threads_profile;

                        // console.log( response.data.threads_profile);
                    })

            },
            updateChatgroup() {

                let update_chatgroup_subject = this.$refs.update_chatgroup_subject.value;
                let update_chatgroup_about = this.$refs.update_chatgroup_about.value;

                this.$confirm({
                    message: `Are you sure?`,
                    button: {
                        no: 'No',
                        yes: 'Yes'
                    },
                    /**
                     * Callback Function
                     * @param {Boolean} confirm
                     */
                    callback: confirm => {

                        axios.get('updatgroup', {
                            params: {
                                threads_id: this.thisDataChatGroup.threads_id,
                                update_chatgroup_subject: update_chatgroup_subject,
                                update_chatgroup_about: update_chatgroup_about,
                            }
                        }).then(response => {
                            this.thisDataChatGroupFN(this.chat_group_id);
                        })

                    }

                })


            },

            AssignmentNewUpdate(assignments_id, count_sub) {


                axios.get('AssignmentNewUpdate', {
                    params: {
                        assignments_id: assignments_id,
                        count_sub: count_sub,
                    }
                }).then(response => {
                    this.assignment_to_FN();
                })


            },

            AssignmentNewUpdate_SS(assignments_id, count_sub) {


                axios.get('AssignmentNewUpdate', {
                    params: {
                        assignments_id: assignments_id,
                        count_sub: count_sub,
                    }
                }).then(response => {
                    this.assignment_to_succus_FN();
                })


            },



            thisAssignmentSendFN() {

                this.$confirm({
                    message: `คุณต้องการส่งงาน?`,
                    button: {
                        no: 'No',
                        yes: 'Yes'
                    },
                    /**
                     * Callback Function
                     * @param {Boolean} confirm
                     */
                    callback: confirm => {
                        if (confirm) {
                            let assignment_details_send = this.$refs.assignment_details_send.value;


                            if (assignment_details_send == '') {
                                this.$msg({
                                    position: 'center',

                                    text: 'กรุณากรอกสรุปรายละเอียดการส่งงาน !',
                                    duration: 3000
                                })
                            } else {


                                let formData = new FormData();
                                if (this.$refs.assignment_files_sub.files.length != 0) {
                                    this.assignment_file_file.forEach(function (value, i) {
                                        formData.append('assignment_file_file[]', value);
                                    });
                                }
                                formData.append('assignment_details_send', assignment_details_send);
                                formData.append('checksend', this.checksend);
                                formData.append('assignment_users_id', this.thisAssignment
                                    .assignment_users_id);

                                axios.post('assignment_subs', formData, {
                                    headers: {
                                        'Content-Type': 'multipart/form-data'
                                    }
                                }).then(response => {

                                    this.$msg({
                                        position: 'center',
                                        background: 'radial-gradient(#41C3D0, #1CD980);',
                                        text: 'ส่งงานสำเร็จ !',
                                        duration: 1000
                                    })
                                    this.$refs.assignment_details_send.value = null;

                                    this.$refs.assignment_files_sub.value = null;

                                    this.assignment_file_file = [];
                                    this.assignment_file_file_src = [];



                                    this.assignment_get_FN();
                                    $("#modal-assignment-send").modal('hide');
                                })
                            }

                        }
                    }

                })

            },
            thisAssignmentFN(assignment_users_id) {

                this.assignment_file_file = [];
                this.assignment_file_file_src = [];
                this.$refs.assignment_details_send.value = null;

                axios.get('assignment_this', {
                    params: {
                        assignment_users_id: assignment_users_id
                    }
                }).then(response => {
                    this.thisAssignment = response.data;
                })
                $('#modal-assignment-send').modal('toggle');
            },

            assignment_cancel_FN(assignment_id) {

                this.$confirm({
                    message: `คุณต้องการยกเลิก?`,
                    button: {
                        no: 'No',
                        yes: 'Yes'
                    },
                    /**
                     * Callback Function
                     * @param {Boolean} confirm
                     */
                    callback: confirm => {
                        if (confirm) {
                            let formData = new FormData();
                            formData.append('assignment_id', assignment_id);
                            axios
                                .post('assignment_cancel', formData, {
                                    headers: {
                                        'Content-Type': 'multipart/form-data'
                                    }
                                })
                                .then(response => {
                                    this.assignment_to_FN();
                                    this.$msg({
                                        position: 'center',
                                        background: 'radial-gradient(#41C3D0, #1CD980);',
                                        text: 'ยกเลิกสำเร็จ !',
                                        duration: 1000
                                    })

                                })
                        }
                    }
                })

            },

            assignment_clear_FN() {
                this.$refs.assignment_files.value = null;
                this.assignment_status = 'add';
                this.$refs.assignment_name.value = '';
                this.$refs.assignment_about.value = '';
                this.$refs.assignment_repeat.value = '';
                this.search_chat_group_member = '';
                this.assignment_file_file = [];
                this.assignment_file_file_src = [];
                this.user_assignment = [];
                this.thisDataChatGroupFN(this.chat_group_id);
                // this.getMemberChatGroup();
                this.chat_group_member_assignment = this.chat_group_member;
            },

            UpdateassignmentFN() {

                this.$confirm({
                    message: `คุณต้องการแก้ไขข้อมูล ?`,
                    button: {
                        no: 'No',
                        yes: 'Yes'
                    },
                    /**
                     * Callback Function
                     * @param {Boolean} confirm
                     */
                    callback: confirm => {
                        if (confirm) {

                            var now = new Date(this.assignment_date);
                            const month = now.getMonth() + 1;
                            const day = String(now.getDate()).padStart(2, '0');
                            const year = now.getFullYear();
                            const output = year + '-' + month + '-' + day + ' ' + now
                                .toLocaleTimeString();

                            let assignment_name = this.$refs.assignment_name.value;
                            let assignment_about = this.$refs.assignment_about.value;
                            let assignment_repeat = this.$refs.assignment_repeat.value;

                            let formData = new FormData();
                            formData.append('user_assignment', this.user_assignment);

                            if (this.$refs.assignment_files.files.length != 0) {
                                this.assignment_file_file.forEach(function (value, i) {
                                    formData.append('assignment_file_file[]', value);
                                });
                            }

                            formData.append('assignment_name', assignment_name);
                            formData.append('assignment_about', assignment_about);
                            // formData.append('chat_group_id', this.chat_group_id);
                            formData.append('assignment_date', output);

                            formData.append('assignment_repeat', assignment_repeat);
                            formData.append('assignments_id', this.assignments_id);

                            if (assignment_name == '' || assignment_about == '') {
                                this.$msg({
                                    position: 'center',
                                    // background: 'radial-gradient(#41C3D0, #1CD980);',
                                    text: 'กรุณากรอกข้อมูลให้ครบถ้วน !',
                                    duration: 1000
                                })
                            } else {

                                if (this.user_assignment == '') {
                                    this.$msg({
                                        position: 'center',
                                        // background: 'radial-gradient(#41C3D0, #1CD980);',
                                        text: 'กรุณาเลือกสมาชิกแชท !',
                                        duration: 1000
                                    })

                                } else {
                                    axios
                                        .post('updatessignment', formData, {
                                            headers: {
                                                'Content-Type': 'multipart/form-data'
                                            }
                                        })
                                        .then(response => {

                                            console.log(response.data)
                                            this.$refs.assignment_files.value = null;
                                            this.assignment_status = 'add';
                                            this.$refs.assignment_name.value = '';
                                            this.$refs.assignment_about.value = '';
                                            this.$refs.assignment_repeat.value = '';
                                            this.search_chat_group_member = '';
                                            this.assignment_file_file = [];
                                            this.assignment_file_file_src = [];
                                            this.user_assignment = [];
                                            $("#modal-assignment").modal('hide');
                                            this.assignment_to_FN();
                                            this.$msg({
                                                position: 'center',
                                                background: 'radial-gradient(#41C3D0, #1CD980);',
                                                text: 'แก้ไขข้อมูลสำเร็จ !',
                                                duration: 1000
                                            })

                                        })
                                }

                            }
                        }
                    }
                })

            },
            assignment_update_FN(assignments_chat_group_id, assignments_name, assignments_details,
                assignments_repeat,
                assignments_date, files, assignment_users, assignments_id) {
                this.assignments_id = assignments_id;
                this.assignment_status = 'update';
                this.$refs.assignment_files.value = null;


                axios.get('getMemberChatGroup', {
                        params: {
                            chat_group_id: assignments_chat_group_id
                        }
                    })
                    .then(response => {
                        this.chat_group_member_assignment = response.data;
                    })


                this.user_assignment = [];
                // เซตรายละเอียดของการสั่งงาน
                this.thisDataChatGroupFN(assignments_chat_group_id);

                this.get_user_not_in_chat_groupFN(assignments_chat_group_id);

                this.$refs.assignment_name.value = assignments_name;
                this.$refs.assignment_about.value = assignments_details;
                this.$refs.assignment_repeat.value = assignments_repeat;
                this.assignment_date = assignments_date;

                this.assignment_file_file = [];
                this.assignment_file_file = files;
                this.user_assignment = assignment_users;
            },



            assignment_to_succus_FN() {
                axios.get('assignment_to_succus')
                    .then(response => {
                        this.assignment_work = response.data;
                    })
            },
            assignment_to_FN() {
                axios.get('assignment_to')
                    .then(response => {
                        this.assignment_work = response.data;
                    })
            },

            assignment_get_succus_FN() {

                axios.get('assignment_succus')
                    .then(response => {
                        this.assignment_work = response.data;
                    })
            },

            assignment_get_FN() {
                axios.get('assignment_get')
                    .then(response => {
                        this.assignment_work = response.data;
                    })
            },
            Addassignment() {

                this.$confirm({
                    message: `Are you sure?`,
                    button: {
                        no: 'No',
                        yes: 'Yes'
                    },
                    /**
                     * Callback Function
                     * @param {Boolean} confirm
                     */
                    callback: confirm => {
                        if (confirm) {

                            var now = new Date(this.assignment_date);
                            const month = now.getMonth() + 1;
                            const day = String(now.getDate()).padStart(2, '0');
                            const year = now.getFullYear();
                            const output = year + '-' + month + '-' + day + ' ' + now
                                .toLocaleTimeString();

                            let assignment_name = this.$refs.assignment_name.value;
                            let assignment_about = this.$refs.assignment_about.value;
                            let assignment_repeat = this.$refs.assignment_repeat.value;

                            let formData = new FormData();
                            formData.append('user_assignment', this.user_assignment);

                            this
                                .assignment_file_file
                                .forEach(function (value, i) {
                                    formData.append('assignment_file_file[]', value);

                                });

                            formData.append('assignment_name', assignment_name);
                            formData.append('assignment_about', assignment_about);
                            formData.append('chat_group_id', this.chat_group_id);
                            formData.append('assignment_date', output);
                            // formData.append('assignment_date', mydate.toDateString().split('
                            // ').slice(1).join('-')+ ' '+ mydate.toTimeString());
                            formData.append('assignment_repeat', assignment_repeat);

                            if (assignment_name == '' || assignment_about == '') {
                                this.$msg({
                                    position: 'center',
                                    // background: 'radial-gradient(#41C3D0, #1CD980);',
                                    text: 'กรุณากรอกข้อมูลให้ครบถ้วน !',
                                    duration: 1000
                                })
                            } else {

                                if (this.user_assignment == '') {
                                    this.$msg({
                                        position: 'center',
                                        // background: 'radial-gradient(#41C3D0, #1CD980);',
                                        text: 'กรุณาเลือกสมาชิกแชท !',
                                        duration: 1000
                                    })

                                } else {
                                    axios
                                        .post('addassignment', formData, {
                                            headers: {
                                                'Content-Type': 'multipart/form-data'
                                            }
                                        })
                                        .then(response => {

                                            this.$refs.assignment_name.value = '';
                                            this.$refs.assignment_about.value = '';
                                            this.$refs.assignment_repeat.value = '';
                                            this.$refs.assignment_files.value = '';
                                            this.search_chat_group_member = '';
                                            this.assignment_file_file = [];
                                            this.user_assignment = [];
                                            this.assignment_status = 'add';
                                            $("#modal-assignment").modal('hide');

                                            this.$msg({
                                                position: 'center',
                                                background: 'radial-gradient(#41C3D0, #1CD980);',
                                                text: 'ทำการหมอบหมายงานสำเร็จ !',
                                                duration: 1000
                                            })

                                        })
                                }

                            }
                        }
                    }
                })

            },

            File_assignment_sub_FN(event) {


                let limit = 0;
                let maximum = 0;

                this.assignment_file_file = [];
                this.assignment_file_file_src = [];

                for (var i = 0; i < this.$refs.assignment_files_sub.files.length; i++) {

                    if (i < 10) {
                        if (this.$refs.assignment_files_sub.files[i].size > 1024 * 1024 * 10) {
                            console.log(this.$refs.assignment_files_sub.files[i].size);
                            limit = 1;
                        } else {
                            const src = URL.createObjectURL(event.target.files[0]);
                            this
                                .assignment_file_file
                                .push(this.$refs.assignment_files_sub.files[i]);
                            this
                                .assignment_file_file_src
                                .push(src);
                        }
                    } else {
                        maximum = 1;
                    }
                }

                if (limit == 1) {
                    this.$msg({
                        position: 'center',
                        text: 'ไม่สามรถทำการเลือกไฟล์ขนาดเกิน 10MB !',
                        duration: 2000
                    })

                    this.$refs.assignment_files_sub.value = '';
                }
                if (maximum == 1) {
                    this.$msg({
                        position: 'center',
                        text: 'สามารถทำการเลือกไฟล์ได้สูงสุด 10 ไฟล์ !',
                        duration: 2000
                    })
                    this.$refs.assignment_files_sub.value = '';
                }

            },
            File_assignment_FN(event) {


                let limit = 0;
                let maximum = 0;

                this.assignment_file_file = [];
                this.assignment_file_file_src = [];

                for (var i = 0; i < this.$refs.assignment_files.files.length; i++) {

                    if (i < 10) {
                        if (this.$refs.assignment_files.files[i].size > 1024 * 1024 * 10) {
                            console.log(this.$refs.assignment_files.files[i].size);
                            limit = 1;
                        } else {
                            const src = URL.createObjectURL(event.target.files[0]);
                            this
                                .assignment_file_file
                                .push(this.$refs.assignment_files.files[i]);
                            this
                                .assignment_file_file_src
                                .push(src);
                        }
                    } else {
                        maximum = 1;
                    }
                }

                if (limit == 1) {
                    this.$msg({
                        position: 'center',
                        text: 'ไม่สามรถทำการเลือกไฟล์ขนาดเกิน 10MB !',
                        duration: 2000
                    })

                    this.$refs.assignment_files.value = '';
                }
                if (maximum == 1) {
                    this.$msg({
                        position: 'center',
                        text: 'สามารถทำการเลือกไฟล์ได้สูงสุด 10 ไฟล์ !',
                        duration: 2000
                    })
                    this.$refs.assignment_files.value = '';
                }

            },

            ShowChatGroup: function (group_id, group_name, group_profile, about) {

                //   this.messages ='';

                this.$refs.assignment_name.value = '';
                this.$refs.assignment_about.value = '';
                this.$refs.assignment_repeat.value = '';
                this.$refs.assignment_files.value = '';
                this.search_chat_group_member = '';
                this.assignment_file_file = [];
                this.user_assignment = [];
                this.assignment_status = 'add';
                this.assignment_date = new Date();



                this.chat_group_id = group_id;
                this.ischatType = 'group';
                this.chat_group_name = group_name;
                this.chat_group_profile = group_profile;

                this.thisDataChatGroupFN(group_id);

                if (this.isActive == true) {
                    this.isActive = false;

                } else {
                    this.isActive = true;
                }
                this.fetchMessages();
                this.getMemberChatGroup();
                this.get_user_not_in_chat_groupFN(group_id);

                this.update_chatgroup_subject = group_name;
                this.update_chatgroup_about = about;


            },
            onGroup_profileChange(e) {

                const file = this.$refs.group_profile.files[0];
                this.group_profile_previre = URL.createObjectURL(file);

            },
            created_group() {

                this.$confirm({
                    message: `Are you sure?`,
                    button: {
                        no: 'No',
                        yes: 'Yes'
                    },
                    /**
                     * Callback Function
                     * @param {Boolean} confirm
                     */
                    callback: confirm => {
                        if (confirm) {
                            let group_profile = this.$refs.group_profile.files[0];
                            let group_name = this.$refs.group_name.value;
                            let group_about = this.$refs.group_about.value;
                            let formData = new FormData();
                            if (this.group_profile_previre != '') {
                                formData.append('group_profile', group_profile);
                            }

                            formData.append('group_name', group_name);
                            formData.append('group_about', group_about);
                            formData.append('group_user', this.checkedUser_group);

                            if (group_name == '' || group_about == '') {
                                this.$msg({
                                    position: 'center',
                                    // background: 'radial-gradient(#41C3D0, #1CD980);',
                                    text: 'กรุณากรอกข้อมูลให้ครบถ้วน !',
                                    duration: 1000
                                })
                            } else {

                                if (this.checkedUser_group == '') {
                                    this.$msg({
                                        position: 'center',
                                        // background: 'radial-gradient(#41C3D0, #1CD980);',
                                        text: 'กรุณาเลือกสมาชิกแชท !',
                                        duration: 1000
                                    })
                                } else {
                                    axios
                                        .post('created_group', formData, {
                                            headers: {
                                                'Content-Type': 'multipart/form-data'
                                            }
                                        })
                                        .then(response => {
                                            this.$refs.group_name.value = '';
                                            this.$refs.group_about.value = '';
                                            this.checkedUser_group = [];
                                            this.group_profile_previre = '';

                                            this.GetUserGroup();
                                            this.getChatGroup();

                                            this.$msg({
                                                position: 'center',
                                                background: 'radial-gradient(#41C3D0, #1CD980);',
                                                text: 'สร้างแชทกรุ๊ปสำเร็จ !',
                                                duration: 1000
                                            })

                                        })
                                }

                            }

                        }
                    }
                })

            },
            fetcFile(type) {
                axios
                    .get('fetcFile', {
                        params: {
                            type: type,
                            to_id: this.users_id,
                            chat_group_id: this.chat_group_id,
                            ischatType: this.ischatType
                        }
                    })
                    .then(response => {

                        this.fetcfile = response.data;

                    })
            },
            delete_messages(ms_id) {

                axios
                    .get('delete_messages', {
                        params: {
                            ms_id: ms_id
                        }
                    })
                    .then(response => {

                        this.fetchMessages()

                    })
            },
            ResetPassword() {
                axios
                    .post("reset_password", {
                        profile_current_password: this.$refs.profile_current_password.value,
                        profile_new_password: this.$refs.profile_new_password.value,
                        profile_verify_password: this.$refs.profile_verify_password.value
                    })
                    .then(response => {

                        alert(response.data);
                    })
            },
            ProFileUpload() {

                this.file_profile = this.$refs.file_profile.files[0];
                let formData = new FormData();
                formData.append('file', this.file_profile);
                axios
                    .post('edit_profile_picture', formData, {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    })
                    .then(response => {

                        this.user = response.data;
                    })

            },

            file_massageUpload() {

                this.file_massage = this.$refs.file_massage.files[0];


                if (this.$refs.file_massage.files[0].size > 1024 * 1024 * 10) {
                    this.$msg({
                        position: 'center',
                        text: 'ไม่สามรถทำการอัพโหลกไฟล์ขนาดเกิน 10MB  ได้!',
                        duration: 3000
                    })
                } else {
                    let formData = new FormData();
                    formData.append('file', this.file_massage);
                    formData.append('to_id', this.users_id);
                    formData.append('chat_group_id', this.chat_group_id);
                    formData.append('ischatType', this.ischatType);
                    axios
                        .post('MessageUploadFile', formData, {
                            headers: {
                                'Content-Type': 'multipart/form-data'
                            }
                        })
                        .then(response => {
                            this.fetchMessages()
                            this.newMessage = '';
                            this.file_massage = '';
                            this.$refs.file_massage.value = null;

                        })
                }







            },
            SetDataUser: function () {
                axios
                    .post("edit_profile", {
                        name: this.user_name_me,
                        email: this.user_email_me,
                        tel: this.user_tel_me
                    })
                    .then(response => {

                        this.user = response.data;
                    })
            },
            ShowChat: function (id, name, user_profile_conver, user_email_conver, user_tel_conver) {

                this.messages = [];
                this.ischatType = 'chat';

                if (this.isActive == true) {
                    this.isActive = false;

                } else {
                    this.isActive = true;
                }
                if (id != '') {
                    this.users_id = id;
                    this.user_name = name;
                }

                if (this.user.profile == null) {
                    this.user_profile = 'profile.png'
                } else {
                    this.user_profile = this.user.profile;
                }
                if (user_profile_conver == null) {
                    this.user_profile_conver = 'profile.png'
                } else {
                    this.user_profile_conver = user_profile_conver;
                }
                this.user_email_conver = user_email_conver;
                this.user_tel_conver = user_tel_conver;

                this.fetchMessages();
                this.SeenMessages();

            },
            ShowChatClose: function () {
                if (this.isActive == true) {
                    this.isActive = false;

                } else {
                    this.isActive = true;
                }
            },

            toButton: function () {
                var objDiv = document.getElementById("chat_container");
                objDiv.scrollTop = objDiv.scrollHeight;
            },
            startListening() {
                // var self = this;
                // Echo
                //     .join(`chat`)
                //     .here(user => {
                //         self.users = user;
                //     })
                //     .joining(user => {
                //         self
                //             .users
                //             .push(user);
                //     })
                //     .leaving(user => {
                //         self.users = self
                //             .users
                //             .filter(u => u.id != user.id);
                //     })
                // .listen('ChatSent', (event) => {     self.messages.push(event.chat); })
                // .listenForWhisper('typing', user => {     self.activeUser = user;     if
                // (self.typingTimer) {         clearTimeout(self.typingTimer);     }
                // self.typingTimer = setTimeout(() => {         self.activeUser = false;     },
                // 200); });

            },
            GetUser() {
                axios
                    .get('getUser')
                    .then(response => {
                        this.alluser = response.data[0];
                        this.userread = response.data[1];

                    })
            },
            GetUserGroup() {
                axios
                    .get('GetUserGroup')
                    .then(response => {
                        this.alluser_group = response.data;
                    })
            },
            getChatGroup() {
                axios
                    .get('getChatGroup')
                    .then(response => {
                        this.ChatGroup = response.data;
                    })
            },
            getMemberChatGroup() {
                axios
                    .get('getMemberChatGroup', {
                        params: {
                            chat_group_id: this.chat_group_id
                        }
                    })
                    .then(response => {
                        this.chat_group_member = response.data;
                    })
            },
            deleteMemberChatGroup(member_id) {
                axios
                    .get('deleteMemberChatGroup', {
                        params: {
                            member_id: member_id,
                            chat_group_id: this.chat_group_id
                        }
                    })
                    .then(response => {
                        this.getMemberChatGroup();
                    })
            },
            addMemberChatGroup(threads_id) {

                let formData = new FormData();
                formData.append('threads_id', threads_id);
                formData.append('checkedAddUser_group', this.checkedAddUser_group);

                if (this.checkedAddUser_group == '') {
                    alert('กรุณาเลือกสมาชิกแชท');
                } else {
                    axios
                        .post('addMemberChatGroup', formData, {
                            headers: {
                                'Content-Type': 'multipart/form-data'
                            }
                        })
                        .then(response => {
                            this.checkedAddUser_group = [];
                            this.get_user_not_in_chat_groupFN(threads_id);
                            this.getMemberChatGroup();
                        })
                }

            },
            thisDataChatGroupFN(threads_id) {
                axios
                    .get('thisDataChatGroup', {
                        params: {
                            threads_id: threads_id
                        }
                    })
                    .then(response => {
                        this.thisDataChatGroup = response.data;
                    })
            },
            get_user_not_in_chat_groupFN(threads_id) {
                axios
                    .get('get_user_not_in_chat_group', {
                        params: {
                            threads_id: threads_id
                        }
                    })
                    .then(response => {
                        this.user_member_add_chat = response.data;
                    })
            },
            fetchMessages() {
                axios
                    .get('messages', {
                        params: {
                            to_id: this.users_id,
                            chat_group_id: this.chat_group_id,
                            ischatType: this.ischatType,
                        }
                    })
                    .then(response => {
                        this.messages = response.data;
                    })
            },
            SeenMessages() {
                axios
                    .get('SeenMessages', {
                        params: {
                            to_id: this.users_id
                        }
                    })
                    .then(response => {})
            },
            sendMessage() {
                axios.post('messages', {
                    message: this.newMessage,
                    to_id: this.users_id,
                    chat_group_id: this.chat_group_id,
                    ischatType: this.ischatType
                });
                // this.messages.push({     user: this.user,     message: this.newMessage });
                this.fetchMessages()
                this.newMessage = '';

                if (this.ischatType == 'chat') {
                    this.GetUser();
                }




            },
            sendTypingEvent() {
                Echo
                    .join('chat')
                    .whisper('typing', this.user);
            }
        }
    }

</script>

<style>
    img {
        width: 100%;
        height: 100%;
    }

    .sc {
        display: block;
        flex-direction: column-reverse;
        overflow-y: auto;
        overflow: auto;

    }

    .new_sc {
        height: 500px;
        overflow: scroll;
        /* showing scrollbars */
    }

    .offcanvas-end-assignment {
        top: 0;
        right: 0;
        width: 500px;
        border-left: 2px solid #f5f8fb;
        -webkit-transform: translateX(100%);
        transform: translateX(100%);
    }

    .main {
        z-index: 999;
    }

    .navigation1 {


        border-top: 2px solid #f5f8fb;
        padding: 0 1.25rem;
        -ms-flex-wrap: nowrap;
        flex-wrap: nowrap;
        min-height: 58px;

        display: block;
        overflow: hidden;
        position: fixed;
        bottom: 0;
        width: 100%;
        z-index: 888;
        background-color: #f5f8fb;

    }


    @media (min-width:1200px) {


        .navigation1 {
            width: 100px;
            padding: 1.5rem 0;
            border: 0;
            height: 100vh;
            position: static;

        }

    }

    @media (max-width:1199.98px) {

        .navigation1 {
            -webkit-box-ordinal-group: 3;
            -ms-flex-order: 2;
            order: 2;
            padding: 0 1.25rem;
        }

    }

    .btn-start-chat {
        margin-bottom: 5% !important;
    }

    .new-mb {
        margin-bottom: 35px;
    }

    .new-mb-group {
        margin-bottom: 35px;
    }

    .tag_a {
        max-width: 200px;

    }


    a span {

        overflow-wrap: break-word;

    }

</style>

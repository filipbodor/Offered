@auth()
    @php
        $currentUserId = auth()->id();
        $users = \App\Http\Controllers\ChatController::getUserList($currentUserId);
        //$users = \App\Models\User::all();
    @endphp

    <div class="modal fade" id="chatModal" tabindex="-1" aria-labelledby="chatModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content chat-modal-container">

                <!-- Page header start -->
                <div class="page-title">
                    <div class="row gutters">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                            <h5 class="title">Chat App</h5>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12"> </div>
                    </div>
                </div>
                <!-- Page header end -->

                <!-- Content wrapper start -->
                <div class="content-wrapper">

                    <!-- Row start -->
                    <div class="row gutters">

                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                            <div class="chat-card m-0">

                                <!-- Row start -->
                                <div class="row no-gutters">
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-3 col-3">
                                        <div class="users-container">
                                            <div class="chat-search-box">
                                                <div class="input-group">
                                                    <input class="form-control" placeholder="Search">
                                                    <div class="input-group-btn">
                                                        <button type="button" class="btn btn-info">
                                                            <i class="fa fa-search"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <ul class="users">
                                                @foreach($users as $user)
                                                    <li class="person" data-user-id="{{ $user->id }}">
                                                        <div class="user">
                                                            <img class="chat-list-profile-picture" src="{{ $user->profile_photo_url }}" alt="Profile Picture">
                                                            <span class="status busy"></span>
                                                        </div>
                                                        <p class="name-time">
                                                            <span class="name">{{ $user->name }}</span>
                                                            <span class="time">15/02/2019</span>
                                                        </p>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-xl-8 col-lg-8 col-md-8 col-sm-9 col-9 chat" id="chatContainer">

                                    </div>
                                </div>
                                <!-- Row end -->
                            </div>

                        </div>

                    </div>
                    <!-- Row end -->

                </div>
                <!-- Content wrapper end -->

            </div>
        </div>
    </div>
@endauth
@include('partials._chat_script')

@auth()
    @php
        $currentUserId = auth()->id();
        //$users = \App\Http\Controllers\ChatController::getUserList($currentUserId);
        $users = \App\Models\User::all();
    @endphp

    <!-- Chat Modal -->
    <div class="modal fade" id="chatModal" tabindex="-1" aria-labelledby="chatModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content chat-modal-container">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h5 class="modal-title" id="chatModalLabel">Chat</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body col-lg-12 chat-container">
                    <div class="row">
                        <!-- User List -->
                        <div class="chat-user-list col-lg-4 col-md-4 col-sm-4">
                            <ul id="userList">
                                @foreach($users as $user)
                                <li class="chat-user" data-user-id="{{ $user->id }}">
                                    <img class="chat-list-profile-picture" src="{{ $user->profile_photo_url }}" alt="Profile Picture">
                                    {{ $user->name }}
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <!-- End User List -->

                        <!-- Chat Container -->
                        <div class="col-lg-8 col-md-8 col-sm-8 chat" id="chatContainer">
                            <!-- Chat messages will be loaded here dynamically -->
                        </div>
                        <!-- End Chat Container -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endauth

@include('partials._chat_script')

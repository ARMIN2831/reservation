@extends('admin.admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- لیست کاربران -->
            <div class="col-md-4 bg-light p-0 border-right">
                <div class="list-group" id="userList">
                    <!-- محتوای این بخش با AJAX پر میشود -->
                    <div class="text-center py-5">
                        <div class="spinner-border text-primary" role="status">
                            <span class="sr-only">در حال بارگذاری...</span>
                        </div>
                        <p class="mt-2">در حال دریافت لیست کاربران</p>
                    </div>
                </div>
            </div>

            <!-- پنجره چت -->
            <div class="col-md-8 p-0">
                <div class="d-flex flex-column h-100">
                    <div class="p-3 border-bottom text-center bg-light" id="chatHeader">
                        <p class="mb-0 text-muted">لطفاً یک کاربر را انتخاب کنید</p>
                    </div>

                    <div class="flex-grow-1 overflow-auto p-3" id="chatMessages">
                        <div class="text-center py-5 text-muted">
                            <i class="far fa-comments fa-3x mb-3"></i>
                            <p>هیچ گفتگویی انتخاب نشده است</p>
                        </div>
                    </div>

                    <div class="p-3 border-top" id="messageForm" style="display: none;">
                        <form id="sendMessageForm">
                            @csrf
                            <input type="hidden" id="selectedUserId" name="user_id">
                            <div class="input-group">
                                <input type="text" name="message" class="form-control" placeholder="پیام خود را بنویسید..." required>
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit">
                                        <i class="far fa-paper-plane"></i> ارسال
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset("plugins/jquery/jquery.min.js") }}"></script>
    <script>
        $(document).ready(function() {
            let selectedUserId = null;
            let lastMessageId = 0;
            let pollingInterval;

            // تابع برای بارگذاری لیست کاربران
            function loadUserList() {
                $.ajax({
                    url: "{{ route('admin.support.users') }}",
                    method: "GET",
                    success: function(response) {
                        let html = '';

                        // کاربران با پیام خوانده نشده
                        response.users_with_unread.forEach(user => {
                            html += `
                    <a href="#" onclick="selectUser(${user.id})"
                       class="list-group-item list-group-item-action user-item ${selectedUserId == user.id ? 'active' : ''}">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="mb-1">${user.name}</h6>
                                <small class="text-muted">${user.last_message && user.last_message.text ? user.last_message.text.substring(0, 30) + '...' : 'بدون پیام'}</small>
                            </div>
                            <span class="badge badge-danger">${user.unread_count}</span>
                        </div>
                    </a>`;
                        });

                        // سایر کاربران
                        response.other_users.forEach(user => {
                            html += `
                    <a href="#" onclick="selectUser(${user.id})"
                       class="list-group-item list-group-item-action user-item ${selectedUserId == user.id ? 'active' : ''}">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h6 class="mb-1">${user.people.firstName +" "+user.people.lastName}</h6>
                                <small class="text-muted">${user.last_message && user.last_message.text ? user.last_message.text.substring(0, 30) + '...' : 'بدون پیام'}</small>
                            </div>
                        </div>
                    </a>`;
                        });

                        $('#userList').html(html || '<div class="p-3 text-center text-muted">هیچ کاربری یافت نشد</div>');
                    },
                    error: function() {
                        $('#userList').html('<div class="p-3 text-center text-danger">خطا در دریافت لیست کاربران</div>');
                    }
                });
            }

            // تابع برای انتخاب کاربر
            window.selectUser = function(userId) {
                selectedUserId = userId;
                $('#selectedUserId').val(userId);
                $('.user-item').removeClass('active');
                $(`.user-item[onclick="selectUser(${userId})"]`).addClass('active');
                $('#messageForm').show();
                $('#chatHeader').html(`
            <h6 class="mb-0">${$(`.user-item[onclick="selectUser(${userId})"] h6`).text()}</h6>
        `);

                // بارگذاری اولیه پیام‌ها
                loadMessages(true);
            }

            // تابع برای بارگذاری پیام‌ها
            function loadMessages(reset = false) {
                if (!selectedUserId) return;

                if (reset) {
                    lastMessageId = 0;
                    $('#chatMessages').html('<div class="text-center py-3"><div class="spinner-border spinner-border-sm"></div></div>');
                }

                $.ajax({
                    url: "{{ route('admin.support.messages') }}",
                    method: "GET",
                    data: {
                        user_id: selectedUserId,
                        last_message_id: lastMessageId
                    },
                    success: function(response) {
                        if (reset) {
                            $('#chatMessages').empty();
                        }

                        if (response.messages.length > 0) {
                            lastMessageId = response.messages[response.messages.length - 1].id;
                            console.log(lastMessageId);

                            response.messages.forEach(message => {
                                const isAdmin = message.sender_id === {{ \Illuminate\Support\Facades\Auth::guard('admin')->user()->id }};
                                $('#chatMessages').append(`
                            <div class="mb-3 d-flex ${isAdmin ? 'justify-content-start' : 'justify-content-end'}">
                                <div class="p-3 rounded ${isAdmin ? 'bg-light' : 'bg-primary text-white'}">
                                    <p class="mb-1">${message.text}</p>
                                    <small class="d-block text-right ${isAdmin ? 'text-muted' : 'text-white-50'}">
                                        ${new Date(message.created_at).toLocaleTimeString('fa-IR')}
                                    </small>
                                </div>
                            </div>
                        `);
                            });

                            // اسکرول به پایین
                            $('#chatMessages').scrollTop($('#chatMessages')[0].scrollHeight);
                        }

                        if (reset && response.messages.length === 0) {
                            $('#chatMessages').html('<div class="text-center py-5 text-muted">هیچ پیامی یافت نشد</div>');
                        }
                    }
                });
            }

            // ارسال پیام جدید
            $('#sendMessageForm').submit(function(e) {
                e.preventDefault();

                const form = $(this);
                const formData = form.serialize();

                $.ajax({
                    url: "{{ route('admin.support.send') }}",
                    method: "POST",
                    data: formData,
                    success: function() {
                        form.find('input[name="message"]').val('');
                        loadMessages();
                    },
                    error: function() {
                        alert('خطا در ارسال پیام');
                    }
                });
            });

            // بارگذاری اولیه لیست کاربران
            loadUserList();

            // تنظیم پولینگ هر 3 ثانیه
            pollingInterval = setInterval(function() {
                loadUserList();
                if (selectedUserId) {
                    loadMessages();
                }
            }, 3000);

            // توقف پولینگ هنگام بسته شدن صفحه
            $(window).on('beforeunload', function() {
                clearInterval(pollingInterval);
            });
        });
    </script>

    <style>
        .user-item {
            transition: all 0.2s;
            border-left: 3px solid transparent;
        }
        .user-item:hover {
            background-color: #f8f9fa !important;
        }
        .user-item.active {
            border-left-color: #007bff;
            background-color: #f8f9fa !important;
        }
        #chatMessages {
            height: 70vh;
            overflow-y: auto;
        }
    </style>
@endsection

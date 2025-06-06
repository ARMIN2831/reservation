@extends('layouts.userHotel')
@section('content')
    <title>صفحه اصلی</title>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <main class=" w-full flex flex-col items-center gap-20 pb-8">
        @if(isset($userSharedData))
            <!-- چت باکس پشتیبانی -->
            <div style="position: fixed; bottom: 24px; right: 24px; z-index: 50;">
                <!-- دکمه شناور چت -->
                <button id="chatToggleButton" style="width: 64px; height: 64px; border-radius: 50%; background: linear-gradient(to bottom right, #48bb78, #38a169); display: flex; align-items: center; justify-content: center; box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05); transition: all 0.3s ease; transform: scale(1);"
                        onmouseover="this.style.transform='scale(1.1)'; this.style.boxShadow='0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04)'"
                        onmouseout="this.style.transform='scale(1)'; this.style.boxShadow='0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05)'">
                    <svg style="width: 32px; height: 32px; color: white;" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8 10H8.01M12 10H12.01M16 10H16.01M9 16H5C3.89543 16 3 15.1046 3 14V6C3 4.89543 3.89543 4 5 4H19C20.1046 4 21 4.89543 21 6V14C21 15.1046 20.1046 16 19 16H14L9 21V16Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <span id="unreadBadge" style="position: absolute; top: -8px; right: -8px; width: 24px; height: 24px; border-radius: 50%; background-color: #f56565; color: white; font-size: 12px; display: flex; align-items: center; justify-content: center; animation: pulse 1.5s infinite; display: none;">0</span>
                </button>

                <!-- پنجره چت -->
                <div id="chatWindow" style="position: fixed; bottom: 96px; right: 24px; width: 320px; height: 500px; background-color: white; border-radius: 12px; box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25); overflow: hidden; display: none; flex-direction: column; border: 1px solid #e2e8f0;">
                    <!-- هدر چت -->
                    <div style="background: linear-gradient(to right, #2f855a, #38a169); padding: 16px; color: white; display: flex; justify-content: space-between; align-items: center;">
                        <div style="display: flex; align-items: center;">
                            <div style="width: 40px; height: 40px; border-radius: 50%; background-color: rgba(255, 255, 255, 0.2); display: flex; align-items: center; justify-content: center; margin-right: 12px;">
                                <svg style="width: 24px; height: 24px; color: white;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <div>
                                <h3 style="font-weight: bold; margin: 0;">پشتیبانی آنلاین</h3>
                            </div>
                        </div>
                        <button id="closeChat" style="color: white; background: none; border: none; cursor: pointer; transition: color 0.2s ease;"
                                onmouseover="this.style.color='#edf2f7'"
                                onmouseout="this.style.color='white'">
                            <svg style="width: 20px; height: 20px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>
                    </div>

                    <!-- بدنه چت -->
                    <div id="chatBody" style="flex: 1; padding: 16px; overflow-y: auto; background-color: #f7fafc;">
                        <!-- پیام های چت -->
                        <div id="messagesContainer" style="display: flex; flex-direction: column; gap: 12px;">

                        </div>
                    </div>

                    <!-- فوتور چت -->
                    <div style="border-top: 1px solid #e2e8f0; background-color: white; padding: 12px;">
                        <div style="position: relative;">
                            <input type="text" id="messageInput" placeholder="پیام خود را بنویسید..."
                                   style="width: 100%; padding: 12px 16px 12px 48px;border: 1px solid #cbd5e0; border-radius: 9999px; outline: none;">
                            <button id="sendButton" style="position: absolute; left: 12px; top: 50%; transform: translateY(-50%); color: #38a169; background: none; border: none; cursor: pointer;"
                                    onmouseover="this.style.color='#2f855a'"
                                    onmouseout="this.style.color='#38a169'">
                                <svg style="width: 24px; height: 24px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                                </svg>
                            </button>
                            {{--<div style="position: absolute; right: 12px; top: 50%; transform: translateY(-50%); display: flex; gap: 8px;">
                                <button style="color: #718096; background: none; border: none; cursor: pointer;"
                                        onmouseover="this.style.color='#4a5568'"
                                        onmouseout="this.style.color='#718096'">
                                    <svg style="width: 20px; height: 20px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"/>
                                    </svg>
                                </button>
                                <button style="color: #718096; background: none; border: none; cursor: pointer;"
                                        onmouseover="this.style.color='#4a5568'"
                                        onmouseout="this.style.color='#718096'">
                                    <svg style="width: 20px; height: 20px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </button>
                            </div>--}}
                        </div>
                    </div>
                </div>
            </div>

            <style>
                @keyframes pulse {
                    0% { opacity: 1; }
                    50% { opacity: 0.5; }
                    100% { opacity: 1; }
                }
            </style>
            <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
            <script>
                // عناصر DOM
                const chatToggleButton = document.getElementById('chatToggleButton');
                const chatWindow = document.getElementById('chatWindow');
                const closeChat = document.getElementById('closeChat');
                const sendButton = document.getElementById('sendButton');
                const messageInput = document.getElementById('messageInput');
                const messagesContainer = document.getElementById('messagesContainer');
                const unreadBadge = document.getElementById('unreadBadge');
                const chatBody = document.getElementById('chatBody');

                // متغیرهای حالت
                let isChatOpen = false;
                let unreadCount = 0;
                let lastMessageId = 0;

                // رویدادها
                chatToggleButton.addEventListener('click', toggleChat);
                closeChat.addEventListener('click', closeChatWindow);
                sendButton.addEventListener('click', sendMessage);
                messageInput.addEventListener('keypress', function(e) {
                    if(e.key === 'Enter') sendMessage();
                });

                // توابع
                function toggleChat() {
                    isChatOpen = !isChatOpen;
                    if(isChatOpen) {
                        chatWindow.style.display = 'flex';
                        unreadCount = 0;
                        unreadBadge.style.display = 'none';
                        fetchMessages();
                        axios.get(`/support/readMessages`)
                            .then(response => {
                                unreadCount = response.data.unread;
                            });
                    } else {
                        chatWindow.style.display = 'none';
                    }
                }

                function closeChatWindow() {
                    chatWindow.style.display = 'none';
                    isChatOpen = false;
                }

                function fetchMessages() {
                    axios.get(`/support/messages`,{
                        params: {
                            last_message_id: lastMessageId
                        }
                    })
                        .then(response => {
                            console.log(lastMessageId)
                            if(response.data.messages.length > 0) {
                                lastMessageId = response.data.messages[response.data.messages.length - 1].id;
                                appendMessages(response.data.messages);
                            }
                            unreadCount = response.data.unread;
                            if (unreadCount > 0) {
                                unreadBadge.style.display = 'block';
                            }
                            unreadBadge.textContent = unreadCount
                        });
                }

                function appendMessages(messages) {
                    messages.forEach(message => {
                        const messageElement = document.createElement('div');
                        messageElement.style.display = 'flex';
                        messageElement.style.justifyContent = message.sender_id === {{ $userSharedData->id }} ? 'flex-start' : 'flex-end';

                        messageElement.innerHTML = `
                <div style="max-width: 240px; ${message.sender_id === {{ $userSharedData->id }} ?
                            'background-color: #f0fff4; border-radius: 16px; border-top-right-radius: 0;' :
                            'background-color: white; border: 1px solid #e2e8f0; border-radius: 16px; border-top-left-radius: 0;'}
                    padding: 12px; color: #2d3748;">
                    <p style="margin: 0;">${message.text}</p>
                    <p style="font-size: 11px; color: #718096; ${message.sender_id === {{ $userSharedData->id }} ? 'text-align: right;' : 'text-align: left;'} margin-top: 4px; margin-bottom: 0;">
                        ${new Date(message.created_at).toLocaleTimeString('fa-IR', {hour: '2-digit', minute:'2-digit'})}
                    </p>
                </div>
            `;

                        messagesContainer.appendChild(messageElement);
                    });
                    chatBody.scrollTop = chatBody.scrollHeight;
                }

                function sendMessage() {
                    const messageInput = document.getElementById('messageInput');
                    axios.post('/support/send', {
                        message: messageInput.value
                    }).then(() => {
                        messageInput.value = '';
                        fetchMessages();
                    });
                }

                // بررسی دوره‌ای پیام‌های جدید هر 3 ثانیه
                setInterval(fetchMessages, 3000);
            </script>
        @endif
        <section class="bannerSection flex w-full max-w-[1440px] h-[400px] items-center justify-between px-[210px] 512max:h-[310px] 512max:px-[28px] 1024max:px-[36px] 1150max:px-[64px] 1150max:justify-center">
            <div class="flex flex-col gap-3 mb-[100px] 1150max:items-center">
                <img class=" hidden w-[300px] 512max:w-[200px] 768max:block" src="{{ asset('public/icons/chademon.svg') }}" alt="#">
                <h6 class=" text-[38px] text-light font-extrabold font-farsi-extraBold drop-shadow-textDropShdow1 768max:hidden">
                    با سفری نو بار سفر رو ببند!
                </h6>
                <span class=" text-[22px] text-green-600 font-medium drop-shadow-textDropShdow2 768max:text-green-300 512max:text-base">
                    سفر راحت و بی‌دغدغه با سفری نو
                </span>
            </div>
            <img class=" h-full 1150max:hidden" src="{{ asset('public/images/chademanImh.png') }}" alt="#">
        </section>
        <section class=" w-full flex max-w-[1440px] px-[100px] -mt-[206px] justify-center drop-shadow-materialShadow1 512max:px-[28px] 1024max:px-[36px] 1280max:px-[64px]">
            <div class="w-full flex flex-col 768max:p-4 768max:rounded-xl 768max:bg-light 768max:drop-shadow-none">
                <div class="w-full flex flex-col 768max:drop-shadow-materialShadow1">
                    <!-- top buttons -->
                    <div class="travelTypeButtonContainer flex items-end 1024max:grid 1024max:grid-cols-5 1024max:w-full 1024max:items-start 1024max:bg-green-600 1024max:bg-50/50Gradient 1024max:rounded-t-xl 1024max:overflow-hidden 768max:grid-cols-4 768max:h-[75px]">
                        <button onclick="tabContentControler(event, 'travelTypeSelectionTabContent1')" class="travelTypeButton active h-[54px] px-10 flex items-center justify-center gap-[6px] 1024max:px-2 1024max:w-full 768max:flex-col  768max:h-[75px]">
                            <svg class=" w-6 text-inherit" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_2001_102)">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M24 22.6489C24.0235 22.3974 23.8659 22.2457 23.6169 22.2439C23.6169 22.2439 23.4397 22.2298 22.267 22.2228L22.2668 1.95502C22.2666 1.61597 22.162 1.50651 21.8387 1.50649C17.1839 1.50622 12.5292 1.50619 7.87443 1.50658C7.57057 1.50661 7.46154 1.62064 7.46127 1.93992C7.46079 2.51408 7.46078 3.08824 7.46077 3.66239C7.46076 4.21253 7.46076 4.76266 7.46033 5.3128C7.46029 5.37271 7.45658 5.43263 7.45263 5.49631C7.45073 5.52713 7.44876 5.55883 7.44714 5.59183L2.25661 5.59189C1.87575 5.59191 1.79297 5.68193 1.79297 6.09556L1.79294 21.9079V22.2435L1.53601 22.2434C1.35176 22.2433 1.17946 22.2433 1.00717 22.2436C0.810236 22.244 0.661016 22.3629 0.650766 22.5518C0.643459 22.6865 0.729012 22.8703 0.829719 22.9558C0.926198 23.0378 1.09567 23.0448 1.23308 23.0448C8.24439 23.0477 15.2557 23.0481 22.267 23.0482L23.4674 23.0482C23.5155 23.0482 23.5641 23.0522 23.6119 23.0475C23.8395 23.0251 23.9781 22.8829 24 22.6489ZM21.5151 2.32875V15.7128V22.2257H18.8547V21.9019L18.8547 20.3162V20.2839C18.8547 18.894 18.8547 17.5042 18.8546 16.1143C18.8545 15.5766 18.7214 15.4343 18.2182 15.4343C15.9819 15.4341 13.7457 15.4341 11.5095 15.4343C11.0067 15.4344 10.8734 15.5769 10.8733 16.1146C10.8732 17.5943 10.8732 19.074 10.8732 20.5606L10.8732 22.2255H8.2293V2.32875H21.5151ZM2.54481 22.2257V11.5654V6.4143H7.44445V22.2257H2.54481ZM18.088 22.2435H17.7789H11.6402V18.1739H18.088V22.2435ZM18.0879 17.3532H17.7789H11.6402V16.2549H18.0879V17.3532Z" fill="currentColor"/>
                                    <path d="M18.1653 11.9325C18.5355 11.6841 18.848 11.852 18.853 12.2829C18.8597 12.8598 18.8605 13.437 18.8515 14.0139C18.8484 14.2132 18.8209 14.4496 18.5941 14.4812C18.458 14.5003 18.3041 14.4073 18.1653 14.3462C18.1304 14.3308 18.1057 14.2443 18.1055 14.1904C18.1025 13.4692 18.1044 12.748 18.1077 12.0268C18.1078 12.002 18.1351 11.9773 18.1653 11.9325Z" fill="currentColor"/>
                                    <path d="M18.1028 5.40628C18.1028 5.1287 18.1113 4.88159 18.1004 4.63547C18.0897 4.39313 18.1484 4.20893 18.3967 4.17034C18.6346 4.13337 18.8412 4.29783 18.8487 4.57282C18.8661 5.20952 18.8624 5.84732 18.85 6.48428C18.8456 6.70948 18.6156 6.92091 18.431 6.88755C18.2151 6.84854 18.0827 6.72814 18.0982 6.45443C18.1174 6.1165 18.1028 5.77637 18.1028 5.40628Z" fill="currentColor"/>
                                    <path d="M11.0341 14.4003C10.9697 14.2455 10.8841 14.1106 10.8799 13.9729C10.8636 13.4386 10.8663 12.9033 10.8767 12.3687C10.8809 12.1526 10.8878 11.9233 11.1489 11.8408C11.3874 11.7654 11.6196 11.9134 11.6226 12.1801C11.6302 12.8382 11.631 13.4966 11.6227 14.1548C11.6185 14.4867 11.3528 14.6032 11.0341 14.4003Z" fill="currentColor"/>
                                    <path d="M11.4925 4.24411C11.5484 4.3589 11.6184 4.45542 11.6199 4.5532C11.63 5.18032 11.6132 5.8081 11.6306 6.43486C11.6382 6.70783 11.4827 6.84821 11.3002 6.87087C11.1315 6.89181 10.9274 6.8018 10.9138 6.53456C10.9093 6.44636 10.8757 6.35927 10.8751 6.27152C10.8713 5.73679 10.8685 5.20196 10.8748 4.66729C10.8793 4.27895 11.1317 4.09884 11.4925 4.24411Z" fill="currentColor"/>
                                    <path d="M13.4274 6.74626C13.3754 6.61961 13.3092 6.51224 13.3073 6.40359C13.297 5.80603 13.3141 5.20777 13.2973 4.61054C13.2892 4.32038 13.422 4.19463 13.656 4.17253C13.9075 4.14879 14.0352 4.36479 14.0436 4.56801C14.071 5.22631 14.0671 5.88718 14.0476 6.54613C14.0395 6.82002 13.7009 6.9287 13.4274 6.74626Z" fill="currentColor"/>
                                    <path d="M15.6737 5.28336C15.6737 5.04688 15.6679 4.8409 15.6751 4.63544C15.6841 4.37783 15.871 4.16054 16.0654 4.16814C16.3079 4.17762 16.4252 4.32817 16.4254 4.63267C16.4258 5.22935 16.4264 5.82603 16.4251 6.42271C16.4246 6.64234 16.2275 6.89438 16.0655 6.8891C15.8625 6.88248 15.6754 6.6637 15.6742 6.42514C15.6722 6.0548 15.6737 5.68444 15.6737 5.28336Z" fill="currentColor"/>
                                    <path d="M13.3659 8.15545C13.5283 8.10125 13.7014 8.00074 13.8139 8.05217C13.9258 8.1033 14.038 8.30437 14.0436 8.44453C14.0681 9.06199 14.063 9.68141 14.0498 10.2997C14.0445 10.5504 13.8851 10.6655 13.6532 10.6685C13.4492 10.6711 13.3112 10.5605 13.3075 10.3524C13.2952 9.65174 13.3041 8.95062 13.3075 8.24967C13.3076 8.22495 13.3353 8.20037 13.3659 8.15545Z" fill="currentColor"/>
                                    <path d="M13.985 11.9987C14.0147 12.6961 14.0416 13.3692 14.0473 14.0425C14.0482 14.1552 13.9843 14.3071 13.9025 14.3723C13.8017 14.4528 13.6209 14.5295 13.5294 14.4834C13.4228 14.4297 13.3173 14.244 13.3123 14.1112C13.2896 13.5047 13.3117 12.8965 13.2971 12.2895C13.2922 12.088 13.3558 11.9087 13.5069 11.8713C13.6479 11.8364 13.8178 11.9348 13.985 11.9987Z" fill="currentColor"/>
                                    <path d="M15.6737 12.8978C15.7078 12.5803 15.7319 12.2916 15.7792 12.0073C15.8194 11.7656 16.0264 11.8175 16.1473 11.8577C16.2573 11.8944 16.4095 12.0428 16.4131 12.147C16.4368 12.8344 16.4375 13.5236 16.4175 14.2112C16.4118 14.4059 16.2617 14.5316 16.0571 14.5042C15.8367 14.4747 15.6884 14.3364 15.6782 14.0993C15.6615 13.7098 15.6737 13.3188 15.6737 12.8978Z" fill="currentColor"/>
                                    <path d="M16.1245 10.6677C15.8272 10.6728 15.6748 10.5385 15.6741 10.2369C15.6727 9.65119 15.6546 9.06427 15.6861 8.48045C15.6947 8.31984 15.8252 8.12082 15.9551 8.03089C16.0326 7.97722 16.227 8.08289 16.3498 8.15443C16.4007 8.18411 16.4216 8.31152 16.4224 8.39484C16.4282 9.02164 16.4207 9.64859 16.4282 10.2753C16.4308 10.4965 16.33 10.609 16.1245 10.6677Z" fill="currentColor"/>
                                    <path d="M18.1028 8.75404C18.1028 8.63134 18.1071 8.5385 18.102 8.44626C18.0881 8.1974 18.1725 8.03553 18.4221 8.00551C18.7044 7.97155 18.8342 8.17933 18.8446 8.40827C18.8726 9.02396 18.8662 9.64243 18.8489 10.259C18.8409 10.5418 18.6444 10.7009 18.3999 10.6656C18.1507 10.6297 18.095 10.4465 18.1 10.2035C18.1096 9.73059 18.1028 9.25729 18.1028 8.75404Z" fill="currentColor"/>
                                    <path d="M11.528 10.5562C11.208 10.7743 10.8871 10.6061 10.8772 10.2207C10.8622 9.63532 10.8677 9.04907 10.8757 8.46336C10.8795 8.19408 11.0787 7.99072 11.3023 8.00716C11.5754 8.02722 11.6306 8.21849 11.6274 8.47304C11.6201 9.05877 11.6289 9.64473 11.6215 10.2305C11.6202 10.3334 11.5723 10.4358 11.528 10.5562Z" fill="currentColor"/>
                                    <path d="M4.04855 17.3579C4.04856 17.1943 4.04042 17.0602 4.05031 16.9276C4.0704 16.6582 4.22252 16.5407 4.46544 16.5493C4.69789 16.5575 4.80206 16.6951 4.80108 16.9398C4.79894 17.4735 4.80135 18.0072 4.80003 18.5409C4.79937 18.8049 4.63667 19.0233 4.44657 19.0216C4.23479 19.0197 4.05296 18.7998 4.0497 18.5273C4.04515 18.1476 4.04855 17.7678 4.04855 17.3579Z" fill="currentColor"/>
                                    <path d="M4.18281 14.6172C4.14447 14.5657 4.10698 14.5322 4.10641 14.4979C4.0954 13.839 4.06811 13.1792 4.09143 12.5215C4.1006 12.2629 4.35572 12.2181 4.53449 12.2925C4.64985 12.3405 4.78102 12.5263 4.78852 12.6579C4.81775 13.1705 4.76983 13.689 4.81017 14.1999C4.84217 14.6053 4.52275 14.8187 4.18281 14.6172Z" fill="currentColor"/>
                                    <path d="M4.04894 8.35249C4.11818 8.04721 4.2996 7.94643 4.54379 8.01145C4.77986 8.07431 4.80928 8.28037 4.80389 8.51384C4.79253 9.00674 4.79593 9.50022 4.8023 9.99332C4.80557 10.2463 4.72129 10.4073 4.4692 10.4192C4.19501 10.4321 4.05254 10.2871 4.04988 9.9828C4.04519 9.44855 4.04859 8.91422 4.04894 8.35249Z" fill="currentColor"/>
                                    <path d="M5.89933 12.9059C5.89934 12.3926 5.97031 12.2896 6.27034 12.274C6.53428 12.2602 6.63905 12.4294 6.64582 12.6581C6.66223 13.212 6.66163 13.7671 6.64658 14.3211C6.63934 14.5877 6.46874 14.7045 6.22587 14.6905C5.99279 14.677 5.89616 14.5337 5.89823 14.2908C5.90207 13.8391 5.89933 13.3873 5.89933 12.9059Z" fill="currentColor"/>
                                    <path d="M5.89963 16.8354C5.99297 16.572 6.16885 16.4956 6.38414 16.5618C6.60932 16.6311 6.6587 16.8265 6.65395 17.0606C6.64457 17.5228 6.65179 17.9854 6.65099 18.4477C6.65036 18.8113 6.5416 18.9612 6.28021 18.9627C5.99612 18.9642 5.89945 18.8383 5.89935 18.4658C5.89921 17.9314 5.89934 17.3971 5.89963 16.8354Z" fill="currentColor"/>
                                    <path d="M6.59776 8.20831C6.61908 8.39259 6.64663 8.55057 6.649 8.70898C6.65542 9.14008 6.65568 9.57143 6.64956 10.0025C6.64572 10.2731 6.50187 10.4228 6.27038 10.4202C6.03325 10.4174 5.90043 10.2689 5.89973 9.99943C5.89837 9.47583 5.91008 8.95183 5.89402 8.42879C5.88763 8.22079 5.97028 8.07053 6.12247 8.022C6.28544 7.97003 6.49061 7.94851 6.59776 8.20831Z" fill="currentColor"/>
                                </g>
                                <defs>
                                    <clipPath id="clip0_2001_102">
                                        <rect width="24" height="24" fill="currentColor"/>
                                    </clipPath>
                                </defs>
                            </svg>
                            <span class=" text-base text-inherit font-medium text-nowrap 640max:text-sm">
                                هتل
                            </span>
                        </button>
                        {{--<button onclick="tabContentControler(event, 'travelTypeSelectionTabContent2')" class="travelTypeButton nextElem h-[54px] px-10 hidden items-center justify-center gap-[6px] 1024max:px-2 1024max:w-full 768max:flex-col  768max:h-[75px] 768max:flex">
                            <svg class=" w-6 text-inherit" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M19.1119 10.5C18.9525 10.5 18.4186 10.5047 18.2681 10.5141L15.2259 10.5938C15.2101 10.5947 15.1944 10.5913 15.1804 10.5838C15.1664 10.5764 15.1547 10.5652 15.1467 10.5516L9.07265 3.16687C9.03581 3.11811 8.98881 3.07792 8.93491 3.04911C8.88101 3.0203 8.82148 3.00354 8.76047 3H7.5L10.9219 10.5469C10.93 10.5642 10.9336 10.5833 10.9321 10.6023C10.9307 10.6214 10.9243 10.6397 10.9136 10.6555C10.9029 10.6714 10.8883 10.6842 10.8712 10.6926C10.854 10.7011 10.835 10.705 10.8159 10.7039L5.11172 10.7883C5.05236 10.7901 4.99341 10.7779 4.93966 10.7526C4.8859 10.7274 4.83886 10.6898 4.80234 10.643L3.06797 8.53359C2.92734 8.35078 2.6639 8.25234 2.43469 8.25234H1.55062C1.49015 8.25234 1.49906 8.30906 1.51547 8.36625L2.44547 11.7141C2.51577 11.8934 2.51577 12.0926 2.44547 12.2719L1.51453 15.6094C1.48687 15.7008 1.49015 15.75 1.5975 15.75H2.4375C2.81906 15.75 2.87109 15.7003 3.06609 15.4547L4.83328 13.3125C4.87012 13.266 4.91723 13.2287 4.9709 13.2035C5.02458 13.1783 5.08337 13.1659 5.14265 13.1672L10.7995 13.2938C10.8201 13.2942 10.8403 13.2997 10.8583 13.3097C10.8763 13.3198 10.8916 13.334 10.9028 13.3513C10.914 13.3686 10.9208 13.3884 10.9227 13.4089C10.9246 13.4294 10.9214 13.4501 10.9134 13.4691L7.5 21H8.74875C8.80965 20.9964 8.86905 20.9797 8.92287 20.951C8.97668 20.9223 9.02363 20.8822 9.06047 20.8336L15.1472 13.4531C15.1655 13.425 15.2409 13.4109 15.2733 13.4109L18.2686 13.4906C18.4233 13.5 18.9525 13.5047 19.1123 13.5047C21.1875 13.5047 22.5 12.9342 22.5 12C22.5 11.0658 21.1931 10.5 19.1119 10.5Z" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <span class=" text-base text-inherit font-medium text-nowrap 640max:text-sm">
                                پرواز
                            </span>
                        </button>
                        <button onclick="tabContentControler(event, 'travelTypeSelectionTabContent2')" class="travelTypeButton nextElem h-[54px] px-10 flex items-center justify-center gap-[6px] 1024max:px-2 1024max:w-full 768max:flex-col  768max:h-[75px] 768max:hidden">
                            <svg class=" w-6 text-inherit" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M19.1119 10.5C18.9525 10.5 18.4186 10.5047 18.2681 10.5141L15.2259 10.5938C15.2101 10.5947 15.1944 10.5913 15.1804 10.5838C15.1664 10.5764 15.1547 10.5652 15.1467 10.5516L9.07265 3.16687C9.03581 3.11811 8.98881 3.07792 8.93491 3.04911C8.88101 3.0203 8.82148 3.00354 8.76047 3H7.5L10.9219 10.5469C10.93 10.5642 10.9336 10.5833 10.9321 10.6023C10.9307 10.6214 10.9243 10.6397 10.9136 10.6555C10.9029 10.6714 10.8883 10.6842 10.8712 10.6926C10.854 10.7011 10.835 10.705 10.8159 10.7039L5.11172 10.7883C5.05236 10.7901 4.99341 10.7779 4.93966 10.7526C4.8859 10.7274 4.83886 10.6898 4.80234 10.643L3.06797 8.53359C2.92734 8.35078 2.6639 8.25234 2.43469 8.25234H1.55062C1.49015 8.25234 1.49906 8.30906 1.51547 8.36625L2.44547 11.7141C2.51577 11.8934 2.51577 12.0926 2.44547 12.2719L1.51453 15.6094C1.48687 15.7008 1.49015 15.75 1.5975 15.75H2.4375C2.81906 15.75 2.87109 15.7003 3.06609 15.4547L4.83328 13.3125C4.87012 13.266 4.91723 13.2287 4.9709 13.2035C5.02458 13.1783 5.08337 13.1659 5.14265 13.1672L10.7995 13.2938C10.8201 13.2942 10.8403 13.2997 10.8583 13.3097C10.8763 13.3198 10.8916 13.334 10.9028 13.3513C10.914 13.3686 10.9208 13.3884 10.9227 13.4089C10.9246 13.4294 10.9214 13.4501 10.9134 13.4691L7.5 21H8.74875C8.80965 20.9964 8.86905 20.9797 8.92287 20.951C8.97668 20.9223 9.02363 20.8822 9.06047 20.8336L15.1472 13.4531C15.1655 13.425 15.2409 13.4109 15.2733 13.4109L18.2686 13.4906C18.4233 13.5 18.9525 13.5047 19.1123 13.5047C21.1875 13.5047 22.5 12.9342 22.5 12C22.5 11.0658 21.1931 10.5 19.1119 10.5Z" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <span class=" text-base text-inherit font-medium text-nowrap 640max:text-sm">
                                پرواز داخلی
                            </span>
                        </button>
                        <button onclick="tabContentControler(event, 'travelTypeSelectionTabContent3')" class="travelTypeButton h-[54px] px-10 flex items-center justify-center gap-[6px] 1024max:px-2 1024max:w-full 768max:flex-col  768max:h-[75px] 768max:hidden">
                            <svg class=" w-6 text-inherit" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M19.1119 10.5C18.9525 10.5 18.4186 10.5047 18.2681 10.5141L15.2259 10.5938C15.2101 10.5947 15.1944 10.5913 15.1804 10.5838C15.1664 10.5764 15.1547 10.5652 15.1467 10.5516L9.07265 3.16687C9.03581 3.11811 8.98881 3.07792 8.93491 3.04911C8.88101 3.0203 8.82148 3.00354 8.76047 3H7.5L10.9219 10.5469C10.93 10.5642 10.9336 10.5833 10.9321 10.6023C10.9307 10.6214 10.9243 10.6397 10.9136 10.6555C10.9029 10.6714 10.8883 10.6842 10.8712 10.6926C10.854 10.7011 10.835 10.705 10.8159 10.7039L5.11172 10.7883C5.05236 10.7901 4.99341 10.7779 4.93966 10.7526C4.8859 10.7274 4.83886 10.6898 4.80234 10.643L3.06797 8.53359C2.92734 8.35078 2.6639 8.25234 2.43469 8.25234H1.55062C1.49015 8.25234 1.49906 8.30906 1.51547 8.36625L2.44547 11.7141C2.51577 11.8934 2.51577 12.0926 2.44547 12.2719L1.51453 15.6094C1.48687 15.7008 1.49015 15.75 1.5975 15.75H2.4375C2.81906 15.75 2.87109 15.7003 3.06609 15.4547L4.83328 13.3125C4.87012 13.266 4.91723 13.2287 4.9709 13.2035C5.02458 13.1783 5.08337 13.1659 5.14265 13.1672L10.7995 13.2938C10.8201 13.2942 10.8403 13.2997 10.8583 13.3097C10.8763 13.3198 10.8916 13.334 10.9028 13.3513C10.914 13.3686 10.9208 13.3884 10.9227 13.4089C10.9246 13.4294 10.9214 13.4501 10.9134 13.4691L7.5 21H8.74875C8.80965 20.9964 8.86905 20.9797 8.92287 20.951C8.97668 20.9223 9.02363 20.8822 9.06047 20.8336L15.1472 13.4531C15.1655 13.425 15.2409 13.4109 15.2733 13.4109L18.2686 13.4906C18.4233 13.5 18.9525 13.5047 19.1123 13.5047C21.1875 13.5047 22.5 12.9342 22.5 12C22.5 11.0658 21.1931 10.5 19.1119 10.5Z" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <span class=" text-base text-inherit font-medium text-nowrap 640max:text-sm">
                                پرواز خارجی
                            </span>
                        </button>
                        <button onclick="tabContentControler(event, 'travelTypeSelectionTabContent4')" class="travelTypeButton h-[54px] px-10 flex items-center justify-center gap-[6px] 1024max:px-2 1024max:w-full 768max:flex-col  768max:h-[75px]">
                            <svg class=" w-6 text-inherit" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M18.2082 2.29106C18.7264 2.50644 19.1727 2.78977 19.5555 3.17105C20.0649 3.6784 20.4028 4.27152 20.5606 4.95409C20.6176 5.20063 20.6448 5.45847 20.6452 5.71122C20.6509 8.68305 20.6477 11.6549 20.652 14.6267C20.6522 14.7918 20.5991 14.9106 20.4773 15.0252C19.8667 15.5999 19.263 16.1813 18.6393 16.7771C18.9017 17.1469 19.165 17.5167 19.427 17.8873C20.069 18.7954 20.7103 19.704 21.3521 20.6122C21.5257 20.8577 21.7013 21.1019 21.8737 21.3482C21.9673 21.4819 22.0496 21.6384 21.9641 21.7858C21.8752 21.9392 21.7151 22.0055 21.5106 21.9996C21.0096 21.9852 20.5077 21.9917 20.0063 21.9965C19.7901 21.9985 19.634 21.9266 19.5161 21.7449C19.3421 21.4765 19.1502 21.2185 18.9584 20.9612C18.927 20.9191 18.859 20.8845 18.8044 20.8791C18.6803 20.867 18.554 20.8753 18.4287 20.8753C14.0476 20.8753 9.66651 20.8762 5.28544 20.8717C5.13073 20.8715 5.04931 20.9144 4.96895 21.0424C4.79902 21.3131 4.61747 21.5807 4.40708 21.8228C4.32501 21.9172 4.15408 21.9828 4.02086 21.9874C3.48523 22.0057 2.9485 21.9965 2.41219 21.9944C2.07747 21.993 1.892 21.7153 2.06729 21.444C2.33624 21.0277 2.63384 20.6283 2.91989 20.2221C3.60507 19.2493 4.28967 18.2761 4.97688 17.3046C5.09407 17.1389 5.22299 16.9808 5.35323 16.8104C4.71107 16.1985 4.07161 15.5855 3.42605 14.9783C3.3342 14.892 3.29799 14.8076 3.29992 14.6854C3.3073 14.219 3.3029 13.7525 3.3029 13.2861C3.3029 11.1949 3.3029 9.10362 3.3029 7.01238C3.3029 6.53366 3.29336 6.05472 3.30509 5.57626C3.32369 4.81746 3.58841 4.13549 4.06664 3.53426C4.43429 3.07204 4.87789 2.68458 5.42887 2.42889C5.89828 2.21105 6.38799 2.05246 6.91897 2.04083C7.29872 2.03251 7.67824 2.00411 8.0579 2.00362C10.6838 2.00024 13.3096 2.00467 15.9355 2.00008C16.7028 1.99874 17.4653 2.01079 18.2082 2.29106ZM19.5428 4.28216C19.3273 4.02268 19.1388 3.73612 18.8907 3.50918C18.3179 2.98525 17.6082 2.69433 16.8236 2.68964C13.6064 2.6704 10.3889 2.68099 7.17152 2.68338C7.00808 2.6835 6.84002 2.69063 6.682 2.72641C5.74238 2.93911 4.96649 3.38448 4.45746 4.19611C4.05598 4.83626 3.95649 5.53864 3.97789 6.27186C9.31678 6.27186 14.6409 6.27186 19.9788 6.27186C19.9841 5.58232 19.9123 4.91849 19.5428 4.28216ZM14.024 17.9563C14.7622 17.9563 15.5005 17.9605 16.2386 17.9513C16.3342 17.9501 16.4526 17.9032 16.5206 17.8389C17.4568 16.9539 18.3862 16.0623 19.3167 15.1718C19.5378 14.9603 19.8425 14.7807 19.9527 14.5249C20.0633 14.2683 19.9795 13.9349 19.98 13.6351C19.9805 13.3183 19.9801 13.0014 19.9801 12.6891C14.6301 12.6891 9.30599 12.6891 3.97166 12.6891C3.97166 13.2586 3.96634 13.8174 3.97696 14.3758C3.97871 14.4676 4.02634 14.5812 4.09353 14.646C5.20129 15.7154 6.31413 16.7801 7.43198 17.8398C7.49978 17.9041 7.61897 17.9513 7.71443 17.9515C9.80366 17.9578 11.8929 17.9563 14.024 17.9563ZM15.1107 6.96013C14.0618 6.96013 13.0129 6.96013 11.967 6.96013C11.967 8.65197 11.967 10.3209 11.967 11.9869C14.643 11.9869 17.307 11.9869 19.9681 11.9869C19.9681 10.3065 19.9681 8.63766 19.9681 6.96013C18.3549 6.96013 16.7537 6.96013 15.1107 6.96013ZM5.74806 11.9984C7.5771 11.9984 9.40615 11.9984 11.2325 11.9984C11.2325 10.3067 11.2325 8.63781 11.2325 6.97153C8.80733 6.97153 6.39414 6.97153 3.98361 6.97153C3.98361 8.65183 3.98361 10.3207 3.98361 11.9984C4.56576 11.9984 5.13601 11.9984 5.74806 11.9984ZM6.2195 19.5158C6.15232 19.531 6.0551 19.5246 6.02307 19.5652C5.87091 19.7581 5.73651 19.9639 5.5843 20.1814C9.86893 20.1814 14.1274 20.1814 18.4112 20.1814C18.2837 20.0019 18.1569 19.8504 18.0626 19.6822C17.9882 19.5492 17.8998 19.512 17.7457 19.5122C13.9167 19.5168 10.0878 19.5158 6.2195 19.5158ZM19.3126 20.2493C19.5474 20.573 19.7793 20.8986 20.0201 21.218C20.0558 21.2653 20.1325 21.3085 20.1921 21.3108C20.4477 21.321 20.7041 21.3152 20.9889 21.3152C20.028 19.9571 19.0798 18.617 18.1494 17.302C17.9628 17.4775 17.7857 17.6442 17.6065 17.8128C17.8916 18.2186 18.1833 18.6361 18.4775 19.052C18.7536 19.4422 19.0324 19.8307 19.3126 20.2493ZM4.60001 19.0609C4.07338 19.8064 3.54675 20.5518 3.0075 21.3152C3.29535 21.3152 3.55818 21.3202 3.82046 21.3109C3.87333 21.3091 3.94129 21.2643 3.97324 21.2201C4.37201 20.6685 4.7668 20.1142 5.15981 19.5587C5.57063 18.9781 5.97841 18.3955 6.36958 17.8393C6.19116 17.6627 6.01839 17.4917 5.84372 17.3188C5.4364 17.89 5.02741 18.4634 4.60001 19.0609ZM9.84421 18.836C12.3723 18.836 14.9004 18.836 17.4581 18.836C17.3123 18.6267 17.1938 18.4566 17.0581 18.262C17.0171 18.3118 16.9755 18.3571 16.9399 18.4064C16.7951 18.6077 16.5956 18.6421 16.3485 18.6414C13.4646 18.6331 10.5807 18.6315 7.69676 18.6427C7.38267 18.644 7.12788 18.5994 6.94466 18.3428C6.93811 18.3336 6.9235 18.3297 6.90087 18.3164C6.78612 18.4797 6.67132 18.6432 6.53582 18.836C7.64923 18.836 8.72582 18.836 9.84421 18.836Z" fill="currentColor"/>
                                <path d="M16.3106 15.973C16.0093 15.9442 15.771 15.8255 15.5482 15.6427C15.1951 15.3531 15.0249 14.9739 15.0021 14.5387C14.986 14.2311 15.0635 13.9148 15.2521 13.6667C15.579 13.2369 16.0155 12.9764 16.577 13.0017C17.1725 13.0285 17.7592 13.4633 17.9296 14.0552C18.1634 14.8675 17.7891 15.5106 17.187 15.8355C16.9273 15.9757 16.6302 16.0408 16.3106 15.973ZM15.6746 14.5949C15.7766 15.2234 16.369 15.4433 16.7494 15.2965C17.2556 15.1012 17.395 14.7672 17.3283 14.3303C17.2607 13.8878 16.8207 13.6267 16.4406 13.6668C15.9863 13.7146 15.6913 14.0109 15.6746 14.5949Z" fill="currentColor"/>
                                <path d="M8.39109 15.6939C7.74941 16.1355 7.05778 16.0968 6.49061 15.594C5.89767 15.0683 5.83553 14.2037 6.34051 13.5739C6.65843 13.1774 7.07158 12.9887 7.57426 13.0005C8.22867 13.0159 8.86345 13.5939 8.97484 14.2264C9.0662 14.7452 8.90301 15.1623 8.57889 15.5422C8.53069 15.5987 8.46081 15.6368 8.39109 15.6939ZM6.86192 13.9584C6.8549 13.9756 6.85134 13.9955 6.84035 14.0096C6.50356 14.4418 6.69023 14.9084 6.9749 15.1341C7.45927 15.5183 7.96657 15.3019 8.20501 14.9441C8.45525 14.5685 8.37163 14.0975 7.97579 13.821C7.6096 13.5652 7.2675 13.6049 6.86192 13.9584Z" fill="currentColor"/>
                                <path d="M12.4752 16.0002C12.8595 16.0002 13.2231 16.0001 13.5867 16.0003C13.8624 16.0004 14.0004 16.1675 14 16.4999C13.9996 16.7667 13.8144 16.9947 13.5819 16.9959C12.8135 16.9996 12.0451 16.9973 11.2766 16.9973C10.9816 16.9973 10.6865 17.005 10.3916 16.9945C10.1999 16.9877 10.0476 16.8496 10.0094 16.5794C9.97808 16.3583 10.0211 16.1334 10.2015 16.0447C10.2627 16.0146 10.3312 16.0023 10.3964 16.002C11.0825 15.9991 11.7686 16.0002 12.4752 16.0002Z" fill="currentColor"/>
                                <path d="M13.2535 14.0093C13.434 14.0294 13.5979 14.0271 13.7537 14.0761C13.9102 14.1253 14.0272 14.3998 13.9945 14.5947C13.9517 14.8496 13.8515 15.0012 13.6447 15C12.5748 14.9936 11.5049 14.9971 10.435 14.997C10.1386 14.997 10.0046 14.8532 10.0001 14.5378C9.99575 14.232 10.1403 14.0588 10.4354 14.0151C10.6389 13.9849 10.8465 14.0093 11.0522 14.0093C11.7792 14.0093 12.5062 14.0093 13.2535 14.0093Z" fill="currentColor"/>
                            </svg>
                            <span class=" text-base text-inherit font-medium text-nowrap 640max:text-sm">
                                قطار
                            </span>
                        </button>
                        <button onclick="tabContentControler(event, 'travelTypeSelectionTabContent5')" class="travelTypeButton h-[54px] px-10 flex items-center justify-center gap-[6px] 1024max:px-2 1024max:w-full 768max:flex-col  768max:h-[75px]">
                            <svg class=" w-6 text-inherit" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <mask id="path-1-outside-1_2001_95" maskUnits="userSpaceOnUse" x="0.871628" y="-0.0129776" width="22" height="24" fill="currentColor">
                                    <rect fill="currentColor" x="0.871628" y="-0.0129776" width="22" height="24"/>
                                    <path d="M7.91249 1.35937C8.57948 1.28142 9.2238 1.2013 9.86876 1.12677C10.075 1.10294 10.2826 1.08482 10.49 1.07974C11.2908 1.06015 12.0926 1.01748 12.8924 1.04013C13.5891 1.05986 14.2847 1.1466 14.9789 1.2208C15.7777 1.30616 16.5757 1.41682 17.3801 1.35306C17.6863 1.32879 17.9863 1.23022 18.2901 1.17108C18.5506 1.12038 18.8114 1.04786 19.0742 1.03697C19.8354 1.00543 20.5976 0.99608 21.3595 0.987132C21.5586 0.984793 21.7578 1.02068 21.9574 1.02978C22.136 1.03791 22.2195 1.12593 22.2188 1.30107C22.2186 1.34013 22.2187 1.3792 22.2187 1.41826C22.2188 3.23854 22.2188 5.05881 22.2187 6.87909C22.2187 7.2289 22.2051 7.24788 21.8689 7.26475C21.3361 7.29148 20.803 7.31244 20.25 7.33672C20.25 7.9055 20.25 8.48133 20.25 9.05716C20.25 9.4634 20.2361 9.87022 20.2529 10.2758C20.288 11.1238 19.9197 11.7758 19.3029 12.3172C19.2651 12.3504 19.2228 12.405 19.2224 12.45C19.2168 12.9959 19.2188 13.5418 19.2188 14.086C20.2548 14.2121 21.0932 15.01 21.1839 15.9697C21.2246 16.4005 21.2236 16.8356 21.2329 17.269C21.2402 17.6126 21.2329 17.9564 21.2346 18.3002C21.2408 19.498 20.4353 20.3916 19.2705 20.596C19.2634 21.0595 19.2104 21.5129 18.9875 21.938C18.5846 22.7065 17.9383 23.0991 17.0944 23.103C13.7117 23.1184 10.3288 23.1202 6.94618 23.1028C5.93485 23.0976 5.18557 22.4356 4.92719 21.4748C4.85249 21.197 4.84141 20.9022 4.79786 20.5916C4.29839 20.4933 3.81786 20.2928 3.45016 19.8803C3.08435 19.4699 2.87164 18.992 2.86241 18.4414C2.85011 17.7072 2.84845 16.9725 2.86208 16.2384C2.87995 15.2754 3.57813 14.3882 4.53253 14.157C4.64122 14.1306 4.7521 14.1133 4.87499 14.0893C4.87499 13.5433 4.89084 12.9967 4.86227 12.4523C4.8562 12.3366 4.70215 12.2128 4.59253 12.1211C4.19763 11.7908 3.93507 11.3633 3.90317 10.8676C3.8438 9.94491 3.8585 9.0174 3.84433 8.09186C3.84051 7.84241 3.84375 7.59285 3.84375 7.32885C3.7877 7.32308 3.73647 7.3146 3.68503 7.313C3.15778 7.29656 2.63058 7.27592 2.10319 7.26851C1.91883 7.26592 1.88935 7.1476 1.87759 7.01511C1.8659 6.88334 1.875 6.74972 1.875 6.61691C1.875 4.87475 1.87489 3.1326 1.8751 1.39044C1.87514 1.08153 1.92543 1.03672 2.23448 1.03023C2.80888 1.01816 3.38317 0.986533 3.95747 0.987511C4.8318 0.988999 5.69172 1.12161 6.5421 1.31981C6.61554 1.33692 6.69066 1.35684 6.76518 1.35761C7.1401 1.36146 7.51509 1.35937 7.91249 1.35937ZM6.30868 7.03136C5.66628 7.14335 5.02388 7.25533 4.35937 7.37117C4.35937 7.40938 4.35937 7.48592 4.35937 7.56246C4.35937 8.50773 4.34996 9.45312 4.36245 10.3982C4.37186 11.1102 4.71391 11.6379 5.31971 12.004C5.64799 12.2023 6.00064 12.2883 6.38275 12.2829C6.86313 12.2761 7.34368 12.2812 7.82812 12.2812C7.82812 11.5225 7.82801 10.7962 7.82818 10.07C7.82825 9.79242 7.91637 9.70444 8.20071 9.70348C8.61474 9.70209 9.02879 9.7031 9.44283 9.70313C9.8185 9.70316 9.89057 9.77356 9.8906 10.1409C9.89067 10.8493 9.89062 11.5576 9.89062 12.2703C11.3375 12.2703 12.7627 12.2703 14.2031 12.2703C14.2031 11.5111 14.2083 10.7628 14.1999 10.0146C14.1974 9.80027 14.3175 9.71231 14.4906 9.70773C14.9824 9.69471 15.475 9.69584 15.9669 9.70688C16.1544 9.7111 16.2751 9.80488 16.2687 10.0268C16.2576 10.4171 16.2656 10.808 16.2656 11.1986C16.2656 11.5551 16.2656 11.9117 16.2656 12.2344C16.9089 12.2344 17.5319 12.2784 18.1461 12.2239C19.0116 12.147 19.7286 11.282 19.7337 10.4176C19.7373 9.79268 19.7344 9.16769 19.7344 8.54272C19.7344 8.13837 19.7344 7.73401 19.7344 7.32705C19.5114 7.30541 19.3057 7.29049 19.1015 7.26444C18.8072 7.22689 18.5094 7.20084 18.2211 7.13473C17.7211 7.02004 17.2266 6.88809 16.7055 6.93669C16.1632 6.98727 15.6206 7.03631 15.0775 7.07726C14.1949 7.1438 13.3125 7.22627 12.4284 7.25797C11.7774 7.28132 11.1236 7.24206 10.4715 7.216C10.049 7.19911 9.62291 7.18427 9.20643 7.11808C8.44406 6.99692 7.68202 6.89999 6.9092 6.94067C6.72146 6.95055 6.53581 6.99991 6.30868 7.03136ZM18.7031 20.6945C18.7031 19.6589 18.7031 18.6234 18.7031 17.5909C14.2513 17.5909 9.82673 17.5909 5.39062 17.5909C5.39062 18.7351 5.39124 19.8665 5.39042 20.9978C5.38981 21.8246 6.10726 22.59 6.99641 22.5915C10.3473 22.5971 13.6981 22.5927 17.049 22.5949C17.507 22.5952 17.8961 22.426 18.2152 22.1144C18.5971 21.7416 18.7485 21.2727 18.7031 20.6945ZM5.39062 15.8203C5.39062 16.2311 5.39062 16.6418 5.39062 17.0505C9.84158 17.0505 14.2658 17.0505 18.6928 17.0505C18.6928 15.5694 18.6928 14.1004 18.6928 12.6405C17.8955 12.8778 17.08 12.7643 16.2656 12.8063C16.2656 13.5544 16.2646 14.2872 16.2663 15.02C16.2668 15.2303 16.1676 15.3298 15.9572 15.3288C15.4964 15.3266 15.0356 15.3283 14.5749 15.3281C14.2764 15.328 14.2033 15.257 14.2032 14.9661C14.203 14.3023 14.2035 13.6385 14.2025 12.9746C14.2024 12.9159 14.1935 12.8572 14.1899 12.8135C12.7442 12.8135 11.3192 12.8135 9.89062 12.8135C9.89062 13.5563 9.89123 14.2825 9.89026 15.0086C9.88996 15.231 9.79309 15.3272 9.5701 15.3278C9.10151 15.3289 8.63292 15.3286 8.16433 15.3279C7.91843 15.3275 7.82935 15.2409 7.82839 15.0009C7.82726 14.7197 7.82812 14.4386 7.82812 14.1574C7.82812 13.7075 7.82812 13.2576 7.82812 12.7999C6.99759 12.7854 6.18724 12.8421 5.39062 12.644C5.39062 13.6806 5.39062 14.727 5.39062 15.8203ZM15.75 5.60153C15.75 4.34619 15.75 3.09085 15.75 1.83151C13.267 1.45484 10.8065 1.50055 8.35134 1.83601C8.35134 3.39449 8.35134 4.92347 8.35134 6.46903C10.8197 6.82137 13.2801 6.86377 15.75 6.47155C15.75 6.17799 15.75 5.91318 15.75 5.60153ZM4.66543 6.75C5.20449 6.68054 5.74356 6.61109 6.27422 6.54272C6.27422 4.92194 6.27422 3.36093 6.27422 1.80154C4.99498 1.48099 3.70617 1.43793 2.40118 1.566C2.40118 3.30538 2.40118 5.04309 2.40118 6.75C3.14841 6.75 3.88482 6.75 4.66543 6.75ZM17.8125 4.57031C17.8125 5.2167 17.8125 5.86309 17.8125 6.50726C19.1028 6.82913 20.3959 6.80122 21.6918 6.7944C21.6918 5.03631 21.6918 3.29875 21.6918 1.56658C20.3814 1.43677 19.0931 1.48315 17.8125 1.80246C17.8125 2.71269 17.8125 3.61806 17.8125 4.57031ZM4.87499 14.7564C4.89544 14.6087 4.8092 14.6039 4.70648 14.6367C3.91203 14.891 3.38686 15.4959 3.37634 16.3576C3.36929 16.9353 3.38091 17.5132 3.37278 18.0909C3.36789 18.4385 3.41082 18.771 3.56064 19.0893C3.82244 19.6457 4.26985 19.9421 4.875 20.0725C4.875 18.297 4.875 16.5488 4.87499 14.7564ZM19.2187 16.4766C19.2187 17.6692 19.2187 18.8618 19.2187 20.057C20.1464 19.9158 20.6739 19.1778 20.7122 18.3824C20.7441 17.7207 20.7269 17.0561 20.7162 16.393C20.7075 15.854 20.5182 15.3802 20.1045 15.0239C19.8573 14.811 19.5728 14.6514 19.2187 14.6246C19.2187 15.2448 19.2187 15.8372 19.2187 16.4766ZM6.79687 3.96094C6.79687 4.77785 6.79687 5.59477 6.79687 6.40838C7.15529 6.40838 7.4868 6.40838 7.81476 6.40838C7.81476 4.89169 7.81476 3.38853 7.81476 1.88849C7.46973 1.88849 7.13818 1.88849 6.79687 1.88849C6.79687 2.57264 6.79687 3.24335 6.79687 3.96094ZM16.2656 5.50779C16.2656 5.80926 16.2656 6.11074 16.2656 6.40827C16.6243 6.40827 16.9558 6.40827 17.2834 6.40827C17.2834 4.89147 17.2834 3.38831 17.2834 1.8886C16.9382 1.8886 16.6067 1.8886 16.2656 1.8886C16.2656 3.08843 16.2656 4.27468 16.2656 5.50779ZM8.60615 10.2187C8.52301 10.2187 8.43986 10.2187 8.35572 10.2187C8.35572 10.9178 8.35572 11.593 8.35572 12.2691C8.69928 12.2691 9.03073 12.2691 9.36283 12.2691C9.36283 11.5818 9.36283 10.9066 9.36283 10.2187C9.11787 10.2187 8.88487 10.2187 8.60615 10.2187ZM15.7473 10.2537C15.4108 10.2372 15.0742 10.2206 14.7285 10.2036C14.7285 10.9132 14.7285 11.5884 14.7285 12.2714C15.0697 12.2714 15.4012 12.2714 15.7498 12.2714C15.7498 11.6074 15.7498 10.9533 15.7473 10.2537ZM8.46925 12.7969C8.42744 12.8334 8.34962 12.8694 8.34918 12.9063C8.34171 13.5364 8.34382 14.1667 8.34382 14.8017C8.69663 14.8017 9.02809 14.8017 9.36411 14.8017C9.36411 14.1313 9.36411 13.4718 9.36411 12.7969C9.07397 12.7969 8.79443 12.7969 8.46925 12.7969ZM15.75 14.1326C15.75 13.6906 15.75 13.2486 15.75 12.8104C15.3915 12.8104 15.0599 12.8104 14.7322 12.8104C14.7322 13.4835 14.7322 14.143 14.7322 14.799C15.0773 14.799 15.4088 14.799 15.75 14.799C15.75 14.5834 15.75 14.3814 15.75 14.1326Z"/>
                                </mask>
                                <path d="M7.91249 1.35937C8.57948 1.28142 9.2238 1.2013 9.86876 1.12677C10.075 1.10294 10.2826 1.08482 10.49 1.07974C11.2908 1.06015 12.0926 1.01748 12.8924 1.04013C13.5891 1.05986 14.2847 1.1466 14.9789 1.2208C15.7777 1.30616 16.5757 1.41682 17.3801 1.35306C17.6863 1.32879 17.9863 1.23022 18.2901 1.17108C18.5506 1.12038 18.8114 1.04786 19.0742 1.03697C19.8354 1.00543 20.5976 0.99608 21.3595 0.987132C21.5586 0.984793 21.7578 1.02068 21.9574 1.02978C22.136 1.03791 22.2195 1.12593 22.2188 1.30107C22.2186 1.34013 22.2187 1.3792 22.2187 1.41826C22.2188 3.23854 22.2188 5.05881 22.2187 6.87909C22.2187 7.2289 22.2051 7.24788 21.8689 7.26475C21.3361 7.29148 20.803 7.31244 20.25 7.33672C20.25 7.9055 20.25 8.48133 20.25 9.05716C20.25 9.4634 20.2361 9.87022 20.2529 10.2758C20.288 11.1238 19.9197 11.7758 19.3029 12.3172C19.2651 12.3504 19.2228 12.405 19.2224 12.45C19.2168 12.9959 19.2188 13.5418 19.2188 14.086C20.2548 14.2121 21.0932 15.01 21.1839 15.9697C21.2246 16.4005 21.2236 16.8356 21.2329 17.269C21.2402 17.6126 21.2329 17.9564 21.2346 18.3002C21.2408 19.498 20.4353 20.3916 19.2705 20.596C19.2634 21.0595 19.2104 21.5129 18.9875 21.938C18.5846 22.7065 17.9383 23.0991 17.0944 23.103C13.7117 23.1184 10.3288 23.1202 6.94618 23.1028C5.93485 23.0976 5.18557 22.4356 4.92719 21.4748C4.85249 21.197 4.84141 20.9022 4.79786 20.5916C4.29839 20.4933 3.81786 20.2928 3.45016 19.8803C3.08435 19.4699 2.87164 18.992 2.86241 18.4414C2.85011 17.7072 2.84845 16.9725 2.86208 16.2384C2.87995 15.2754 3.57813 14.3882 4.53253 14.157C4.64122 14.1306 4.7521 14.1133 4.87499 14.0893C4.87499 13.5433 4.89084 12.9967 4.86227 12.4523C4.8562 12.3366 4.70215 12.2128 4.59253 12.1211C4.19763 11.7908 3.93507 11.3633 3.90317 10.8676C3.8438 9.94491 3.8585 9.0174 3.84433 8.09186C3.84051 7.84241 3.84375 7.59285 3.84375 7.32885C3.7877 7.32308 3.73647 7.3146 3.68503 7.313C3.15778 7.29656 2.63058 7.27592 2.10319 7.26851C1.91883 7.26592 1.88935 7.1476 1.87759 7.01511C1.8659 6.88334 1.875 6.74972 1.875 6.61691C1.875 4.87475 1.87489 3.1326 1.8751 1.39044C1.87514 1.08153 1.92543 1.03672 2.23448 1.03023C2.80888 1.01816 3.38317 0.986533 3.95747 0.987511C4.8318 0.988999 5.69172 1.12161 6.5421 1.31981C6.61554 1.33692 6.69066 1.35684 6.76518 1.35761C7.1401 1.36146 7.51509 1.35937 7.91249 1.35937ZM6.30868 7.03136C5.66628 7.14335 5.02388 7.25533 4.35937 7.37117C4.35937 7.40938 4.35937 7.48592 4.35937 7.56246C4.35937 8.50773 4.34996 9.45312 4.36245 10.3982C4.37186 11.1102 4.71391 11.6379 5.31971 12.004C5.64799 12.2023 6.00064 12.2883 6.38275 12.2829C6.86313 12.2761 7.34368 12.2812 7.82812 12.2812C7.82812 11.5225 7.82801 10.7962 7.82818 10.07C7.82825 9.79242 7.91637 9.70444 8.20071 9.70348C8.61474 9.70209 9.02879 9.7031 9.44283 9.70313C9.8185 9.70316 9.89057 9.77356 9.8906 10.1409C9.89067 10.8493 9.89062 11.5576 9.89062 12.2703C11.3375 12.2703 12.7627 12.2703 14.2031 12.2703C14.2031 11.5111 14.2083 10.7628 14.1999 10.0146C14.1974 9.80027 14.3175 9.71231 14.4906 9.70773C14.9824 9.69471 15.475 9.69584 15.9669 9.70688C16.1544 9.7111 16.2751 9.80488 16.2687 10.0268C16.2576 10.4171 16.2656 10.808 16.2656 11.1986C16.2656 11.5551 16.2656 11.9117 16.2656 12.2344C16.9089 12.2344 17.5319 12.2784 18.1461 12.2239C19.0116 12.147 19.7286 11.282 19.7337 10.4176C19.7373 9.79268 19.7344 9.16769 19.7344 8.54272C19.7344 8.13837 19.7344 7.73401 19.7344 7.32705C19.5114 7.30541 19.3057 7.29049 19.1015 7.26444C18.8072 7.22689 18.5094 7.20084 18.2211 7.13473C17.7211 7.02004 17.2266 6.88809 16.7055 6.93669C16.1632 6.98727 15.6206 7.03631 15.0775 7.07726C14.1949 7.1438 13.3125 7.22627 12.4284 7.25797C11.7774 7.28132 11.1236 7.24206 10.4715 7.216C10.049 7.19911 9.62291 7.18427 9.20643 7.11808C8.44406 6.99692 7.68202 6.89999 6.9092 6.94067C6.72146 6.95055 6.53581 6.99991 6.30868 7.03136ZM18.7031 20.6945C18.7031 19.6589 18.7031 18.6234 18.7031 17.5909C14.2513 17.5909 9.82673 17.5909 5.39062 17.5909C5.39062 18.7351 5.39124 19.8665 5.39042 20.9978C5.38981 21.8246 6.10726 22.59 6.99641 22.5915C10.3473 22.5971 13.6981 22.5927 17.049 22.5949C17.507 22.5952 17.8961 22.426 18.2152 22.1144C18.5971 21.7416 18.7485 21.2727 18.7031 20.6945ZM5.39062 15.8203C5.39062 16.2311 5.39062 16.6418 5.39062 17.0505C9.84158 17.0505 14.2658 17.0505 18.6928 17.0505C18.6928 15.5694 18.6928 14.1004 18.6928 12.6405C17.8955 12.8778 17.08 12.7643 16.2656 12.8063C16.2656 13.5544 16.2646 14.2872 16.2663 15.02C16.2668 15.2303 16.1676 15.3298 15.9572 15.3288C15.4964 15.3266 15.0356 15.3283 14.5749 15.3281C14.2764 15.328 14.2033 15.257 14.2032 14.9661C14.203 14.3023 14.2035 13.6385 14.2025 12.9746C14.2024 12.9159 14.1935 12.8572 14.1899 12.8135C12.7442 12.8135 11.3192 12.8135 9.89062 12.8135C9.89062 13.5563 9.89123 14.2825 9.89026 15.0086C9.88996 15.231 9.79309 15.3272 9.5701 15.3278C9.10151 15.3289 8.63292 15.3286 8.16433 15.3279C7.91843 15.3275 7.82935 15.2409 7.82839 15.0009C7.82726 14.7197 7.82812 14.4386 7.82812 14.1574C7.82812 13.7075 7.82812 13.2576 7.82812 12.7999C6.99759 12.7854 6.18724 12.8421 5.39062 12.644C5.39062 13.6806 5.39062 14.727 5.39062 15.8203ZM15.75 5.60153C15.75 4.34619 15.75 3.09085 15.75 1.83151C13.267 1.45484 10.8065 1.50055 8.35134 1.83601C8.35134 3.39449 8.35134 4.92347 8.35134 6.46903C10.8197 6.82137 13.2801 6.86377 15.75 6.47155C15.75 6.17799 15.75 5.91318 15.75 5.60153ZM4.66543 6.75C5.20449 6.68054 5.74356 6.61109 6.27422 6.54272C6.27422 4.92194 6.27422 3.36093 6.27422 1.80154C4.99498 1.48099 3.70617 1.43793 2.40118 1.566C2.40118 3.30538 2.40118 5.04309 2.40118 6.75C3.14841 6.75 3.88482 6.75 4.66543 6.75ZM17.8125 4.57031C17.8125 5.2167 17.8125 5.86309 17.8125 6.50726C19.1028 6.82913 20.3959 6.80122 21.6918 6.7944C21.6918 5.03631 21.6918 3.29875 21.6918 1.56658C20.3814 1.43677 19.0931 1.48315 17.8125 1.80246C17.8125 2.71269 17.8125 3.61806 17.8125 4.57031ZM4.87499 14.7564C4.89544 14.6087 4.8092 14.6039 4.70648 14.6367C3.91203 14.891 3.38686 15.4959 3.37634 16.3576C3.36929 16.9353 3.38091 17.5132 3.37278 18.0909C3.36789 18.4385 3.41082 18.771 3.56064 19.0893C3.82244 19.6457 4.26985 19.9421 4.875 20.0725C4.875 18.297 4.875 16.5488 4.87499 14.7564ZM19.2187 16.4766C19.2187 17.6692 19.2187 18.8618 19.2187 20.057C20.1464 19.9158 20.6739 19.1778 20.7122 18.3824C20.7441 17.7207 20.7269 17.0561 20.7162 16.393C20.7075 15.854 20.5182 15.3802 20.1045 15.0239C19.8573 14.811 19.5728 14.6514 19.2187 14.6246C19.2187 15.2448 19.2187 15.8372 19.2187 16.4766ZM6.79687 3.96094C6.79687 4.77785 6.79687 5.59477 6.79687 6.40838C7.15529 6.40838 7.4868 6.40838 7.81476 6.40838C7.81476 4.89169 7.81476 3.38853 7.81476 1.88849C7.46973 1.88849 7.13818 1.88849 6.79687 1.88849C6.79687 2.57264 6.79687 3.24335 6.79687 3.96094ZM16.2656 5.50779C16.2656 5.80926 16.2656 6.11074 16.2656 6.40827C16.6243 6.40827 16.9558 6.40827 17.2834 6.40827C17.2834 4.89147 17.2834 3.38831 17.2834 1.8886C16.9382 1.8886 16.6067 1.8886 16.2656 1.8886C16.2656 3.08843 16.2656 4.27468 16.2656 5.50779ZM8.60615 10.2187C8.52301 10.2187 8.43986 10.2187 8.35572 10.2187C8.35572 10.9178 8.35572 11.593 8.35572 12.2691C8.69928 12.2691 9.03073 12.2691 9.36283 12.2691C9.36283 11.5818 9.36283 10.9066 9.36283 10.2187C9.11787 10.2187 8.88487 10.2187 8.60615 10.2187ZM15.7473 10.2537C15.4108 10.2372 15.0742 10.2206 14.7285 10.2036C14.7285 10.9132 14.7285 11.5884 14.7285 12.2714C15.0697 12.2714 15.4012 12.2714 15.7498 12.2714C15.7498 11.6074 15.7498 10.9533 15.7473 10.2537ZM8.46925 12.7969C8.42744 12.8334 8.34962 12.8694 8.34918 12.9063C8.34171 13.5364 8.34382 14.1667 8.34382 14.8017C8.69663 14.8017 9.02809 14.8017 9.36411 14.8017C9.36411 14.1313 9.36411 13.4718 9.36411 12.7969C9.07397 12.7969 8.79443 12.7969 8.46925 12.7969ZM15.75 14.1326C15.75 13.6906 15.75 13.2486 15.75 12.8104C15.3915 12.8104 15.0599 12.8104 14.7322 12.8104C14.7322 13.4835 14.7322 14.143 14.7322 14.799C15.0773 14.799 15.4088 14.799 15.75 14.799C15.75 14.5834 15.75 14.3814 15.75 14.1326Z" fill="currentColor"/>
                                <path d="M7.91249 1.35937C8.57948 1.28142 9.2238 1.2013 9.86876 1.12677C10.075 1.10294 10.2826 1.08482 10.49 1.07974C11.2908 1.06015 12.0926 1.01748 12.8924 1.04013C13.5891 1.05986 14.2847 1.1466 14.9789 1.2208C15.7777 1.30616 16.5757 1.41682 17.3801 1.35306C17.6863 1.32879 17.9863 1.23022 18.2901 1.17108C18.5506 1.12038 18.8114 1.04786 19.0742 1.03697C19.8354 1.00543 20.5976 0.99608 21.3595 0.987132C21.5586 0.984793 21.7578 1.02068 21.9574 1.02978C22.136 1.03791 22.2195 1.12593 22.2188 1.30107C22.2186 1.34013 22.2187 1.3792 22.2187 1.41826C22.2188 3.23854 22.2188 5.05881 22.2187 6.87909C22.2187 7.2289 22.2051 7.24788 21.8689 7.26475C21.3361 7.29148 20.803 7.31244 20.25 7.33672C20.25 7.9055 20.25 8.48133 20.25 9.05716C20.25 9.4634 20.2361 9.87022 20.2529 10.2758C20.288 11.1238 19.9197 11.7758 19.3029 12.3172C19.2651 12.3504 19.2228 12.405 19.2224 12.45C19.2168 12.9959 19.2188 13.5418 19.2188 14.086C20.2548 14.2121 21.0932 15.01 21.1839 15.9697C21.2246 16.4005 21.2236 16.8356 21.2329 17.269C21.2402 17.6126 21.2329 17.9564 21.2346 18.3002C21.2408 19.498 20.4353 20.3916 19.2705 20.596C19.2634 21.0595 19.2104 21.5129 18.9875 21.938C18.5846 22.7065 17.9383 23.0991 17.0944 23.103C13.7117 23.1184 10.3288 23.1202 6.94618 23.1028C5.93485 23.0976 5.18557 22.4356 4.92719 21.4748C4.85249 21.197 4.84141 20.9022 4.79786 20.5916C4.29839 20.4933 3.81786 20.2928 3.45016 19.8803C3.08435 19.4699 2.87164 18.992 2.86241 18.4414C2.85011 17.7072 2.84845 16.9725 2.86208 16.2384C2.87995 15.2754 3.57813 14.3882 4.53253 14.157C4.64122 14.1306 4.7521 14.1133 4.87499 14.0893C4.87499 13.5433 4.89084 12.9967 4.86227 12.4523C4.8562 12.3366 4.70215 12.2128 4.59253 12.1211C4.19763 11.7908 3.93507 11.3633 3.90317 10.8676C3.8438 9.94491 3.8585 9.0174 3.84433 8.09186C3.84051 7.84241 3.84375 7.59285 3.84375 7.32885C3.7877 7.32308 3.73647 7.3146 3.68503 7.313C3.15778 7.29656 2.63058 7.27592 2.10319 7.26851C1.91883 7.26592 1.88935 7.1476 1.87759 7.01511C1.8659 6.88334 1.875 6.74972 1.875 6.61691C1.875 4.87475 1.87489 3.1326 1.8751 1.39044C1.87514 1.08153 1.92543 1.03672 2.23448 1.03023C2.80888 1.01816 3.38317 0.986533 3.95747 0.987511C4.8318 0.988999 5.69172 1.12161 6.5421 1.31981C6.61554 1.33692 6.69066 1.35684 6.76518 1.35761C7.1401 1.36146 7.51509 1.35937 7.91249 1.35937ZM6.30868 7.03136C5.66628 7.14335 5.02388 7.25533 4.35937 7.37117C4.35937 7.40938 4.35937 7.48592 4.35937 7.56246C4.35937 8.50773 4.34996 9.45312 4.36245 10.3982C4.37186 11.1102 4.71391 11.6379 5.31971 12.004C5.64799 12.2023 6.00064 12.2883 6.38275 12.2829C6.86313 12.2761 7.34368 12.2812 7.82812 12.2812C7.82812 11.5225 7.82801 10.7962 7.82818 10.07C7.82825 9.79242 7.91637 9.70444 8.20071 9.70348C8.61474 9.70209 9.02879 9.7031 9.44283 9.70313C9.8185 9.70316 9.89057 9.77356 9.8906 10.1409C9.89067 10.8493 9.89062 11.5576 9.89062 12.2703C11.3375 12.2703 12.7627 12.2703 14.2031 12.2703C14.2031 11.5111 14.2083 10.7628 14.1999 10.0146C14.1974 9.80027 14.3175 9.71231 14.4906 9.70773C14.9824 9.69471 15.475 9.69584 15.9669 9.70688C16.1544 9.7111 16.2751 9.80488 16.2687 10.0268C16.2576 10.4171 16.2656 10.808 16.2656 11.1986C16.2656 11.5551 16.2656 11.9117 16.2656 12.2344C16.9089 12.2344 17.5319 12.2784 18.1461 12.2239C19.0116 12.147 19.7286 11.282 19.7337 10.4176C19.7373 9.79268 19.7344 9.16769 19.7344 8.54272C19.7344 8.13837 19.7344 7.73401 19.7344 7.32705C19.5114 7.30541 19.3057 7.29049 19.1015 7.26444C18.8072 7.22689 18.5094 7.20084 18.2211 7.13473C17.7211 7.02004 17.2266 6.88809 16.7055 6.93669C16.1632 6.98727 15.6206 7.03631 15.0775 7.07726C14.1949 7.1438 13.3125 7.22627 12.4284 7.25797C11.7774 7.28132 11.1236 7.24206 10.4715 7.216C10.049 7.19911 9.62291 7.18427 9.20643 7.11808C8.44406 6.99692 7.68202 6.89999 6.9092 6.94067C6.72146 6.95055 6.53581 6.99991 6.30868 7.03136ZM18.7031 20.6945C18.7031 19.6589 18.7031 18.6234 18.7031 17.5909C14.2513 17.5909 9.82673 17.5909 5.39062 17.5909C5.39062 18.7351 5.39124 19.8665 5.39042 20.9978C5.38981 21.8246 6.10726 22.59 6.99641 22.5915C10.3473 22.5971 13.6981 22.5927 17.049 22.5949C17.507 22.5952 17.8961 22.426 18.2152 22.1144C18.5971 21.7416 18.7485 21.2727 18.7031 20.6945ZM5.39062 15.8203C5.39062 16.2311 5.39062 16.6418 5.39062 17.0505C9.84158 17.0505 14.2658 17.0505 18.6928 17.0505C18.6928 15.5694 18.6928 14.1004 18.6928 12.6405C17.8955 12.8778 17.08 12.7643 16.2656 12.8063C16.2656 13.5544 16.2646 14.2872 16.2663 15.02C16.2668 15.2303 16.1676 15.3298 15.9572 15.3288C15.4964 15.3266 15.0356 15.3283 14.5749 15.3281C14.2764 15.328 14.2033 15.257 14.2032 14.9661C14.203 14.3023 14.2035 13.6385 14.2025 12.9746C14.2024 12.9159 14.1935 12.8572 14.1899 12.8135C12.7442 12.8135 11.3192 12.8135 9.89062 12.8135C9.89062 13.5563 9.89123 14.2825 9.89026 15.0086C9.88996 15.231 9.79309 15.3272 9.5701 15.3278C9.10151 15.3289 8.63292 15.3286 8.16433 15.3279C7.91843 15.3275 7.82935 15.2409 7.82839 15.0009C7.82726 14.7197 7.82812 14.4386 7.82812 14.1574C7.82812 13.7075 7.82812 13.2576 7.82812 12.7999C6.99759 12.7854 6.18724 12.8421 5.39062 12.644C5.39062 13.6806 5.39062 14.727 5.39062 15.8203ZM15.75 5.60153C15.75 4.34619 15.75 3.09085 15.75 1.83151C13.267 1.45484 10.8065 1.50055 8.35134 1.83601C8.35134 3.39449 8.35134 4.92347 8.35134 6.46903C10.8197 6.82137 13.2801 6.86377 15.75 6.47155C15.75 6.17799 15.75 5.91318 15.75 5.60153ZM4.66543 6.75C5.20449 6.68054 5.74356 6.61109 6.27422 6.54272C6.27422 4.92194 6.27422 3.36093 6.27422 1.80154C4.99498 1.48099 3.70617 1.43793 2.40118 1.566C2.40118 3.30538 2.40118 5.04309 2.40118 6.75C3.14841 6.75 3.88482 6.75 4.66543 6.75ZM17.8125 4.57031C17.8125 5.2167 17.8125 5.86309 17.8125 6.50726C19.1028 6.82913 20.3959 6.80122 21.6918 6.7944C21.6918 5.03631 21.6918 3.29875 21.6918 1.56658C20.3814 1.43677 19.0931 1.48315 17.8125 1.80246C17.8125 2.71269 17.8125 3.61806 17.8125 4.57031ZM4.87499 14.7564C4.89544 14.6087 4.8092 14.6039 4.70648 14.6367C3.91203 14.891 3.38686 15.4959 3.37634 16.3576C3.36929 16.9353 3.38091 17.5132 3.37278 18.0909C3.36789 18.4385 3.41082 18.771 3.56064 19.0893C3.82244 19.6457 4.26985 19.9421 4.875 20.0725C4.875 18.297 4.875 16.5488 4.87499 14.7564ZM19.2187 16.4766C19.2187 17.6692 19.2187 18.8618 19.2187 20.057C20.1464 19.9158 20.6739 19.1778 20.7122 18.3824C20.7441 17.7207 20.7269 17.0561 20.7162 16.393C20.7075 15.854 20.5182 15.3802 20.1045 15.0239C19.8573 14.811 19.5728 14.6514 19.2187 14.6246C19.2187 15.2448 19.2187 15.8372 19.2187 16.4766ZM6.79687 3.96094C6.79687 4.77785 6.79687 5.59477 6.79687 6.40838C7.15529 6.40838 7.4868 6.40838 7.81476 6.40838C7.81476 4.89169 7.81476 3.38853 7.81476 1.88849C7.46973 1.88849 7.13818 1.88849 6.79687 1.88849C6.79687 2.57264 6.79687 3.24335 6.79687 3.96094ZM16.2656 5.50779C16.2656 5.80926 16.2656 6.11074 16.2656 6.40827C16.6243 6.40827 16.9558 6.40827 17.2834 6.40827C17.2834 4.89147 17.2834 3.38831 17.2834 1.8886C16.9382 1.8886 16.6067 1.8886 16.2656 1.8886C16.2656 3.08843 16.2656 4.27468 16.2656 5.50779ZM8.60615 10.2187C8.52301 10.2187 8.43986 10.2187 8.35572 10.2187C8.35572 10.9178 8.35572 11.593 8.35572 12.2691C8.69928 12.2691 9.03073 12.2691 9.36283 12.2691C9.36283 11.5818 9.36283 10.9066 9.36283 10.2187C9.11787 10.2187 8.88487 10.2187 8.60615 10.2187ZM15.7473 10.2537C15.4108 10.2372 15.0742 10.2206 14.7285 10.2036C14.7285 10.9132 14.7285 11.5884 14.7285 12.2714C15.0697 12.2714 15.4012 12.2714 15.7498 12.2714C15.7498 11.6074 15.7498 10.9533 15.7473 10.2537ZM8.46925 12.7969C8.42744 12.8334 8.34962 12.8694 8.34918 12.9063C8.34171 13.5364 8.34382 14.1667 8.34382 14.8017C8.69663 14.8017 9.02809 14.8017 9.36411 14.8017C9.36411 14.1313 9.36411 13.4718 9.36411 12.7969C9.07397 12.7969 8.79443 12.7969 8.46925 12.7969ZM15.75 14.1326C15.75 13.6906 15.75 13.2486 15.75 12.8104C15.3915 12.8104 15.0599 12.8104 14.7322 12.8104C14.7322 13.4835 14.7322 14.143 14.7322 14.799C15.0773 14.799 15.4088 14.799 15.75 14.799C15.75 14.5834 15.75 14.3814 15.75 14.1326Z" stroke="currentColor" stroke-width="0.2" mask="url(#path-1-outside-1_2001_95)"/>
                            </svg>
                            <span class=" text-base text-inherit font-medium text-nowrap 640max:text-sm">
                                تور
                            </span>
                        </button>--}}
                    </div>
                    <div class="w-full min-h-[200px] rounded-xl rounded-tr-none bg-light relative p-10 768max:px-4.5 768max:py-[30px] 1024max:rounded-t-none">
                        <!-- content -->
                        <div class="w-full h-full">
                            <!-- هتل -->
                            <form action="{{ route('hotelBooking.results') }}" method="get">
                                @csrf
                                <div id="travelTypeSelectionTabContent1" class="travelTypeSelectionTabContents w-full h-full ">
                                    <div class="w-full h-full flex flex-col justify-end gap-[22px]">
                                        <div class="w-full grid grid-cols-[1fr_340px_0.5fr_0.5fr] gap-5 items-end 1150max:grid-cols-2 1150max:content-start 640max:justify-items-center 640max:grid-cols-1 512max:gap-[14px]">
                                            <div class="w-full flex flex-col gap-[6px] relative" x-data="{ destination: '', suggestions: [], showSuggestions: false }">
                                                <label for="destination" class="text-sm text-[#A8A8A8] font-normal 512max:text-xs">
                                                    مقصد:
                                                </label>
                                                <input
                                                    id="destination"
                                                    type="text"
                                                    name="destination"
                                                    placeholder="مقصد یا نام هتل (داخلی یا خارجی)"
                                                    class="h-[60px] w-full px-5 text-sm text-neutral-700 font-normal placeholder:text-neutral-700 rounded-[6px] bg-neutral-50 focus:outline-none 768max:h-12"
                                                    oninput="fetchSuggestions(this.value)"
                                                    onfocusout="setTimeout(() => toggleSuggestion('none'), 200)"
                                                    onfocusin="toggleSuggestion('block')"
                                                />
                                                <input id="hotel_id" type="hidden" name="hotel_id">
                                                <ul id="suggestions-list" class="suggestions-list mt-2 bg-neutral-50 text-neutral-700 text-sm w-full absolute" style="top: 90px;display: none"></ul>
                                            </div>


                                            <div class="w-full flex flex-col gap-[6px]">
                                                <label for="dateRange" class="text-sm text-[#A8A8A8] font-normal 512max:text-xs">
                                                    تاریخ سفر:
                                                </label>
                                                <input
                                                    id="dateRange"
                                                    type="text"
                                                    name="dates"
                                                    placeholder="تاریخ ورود و خروج"
                                                    onchange="convertDateRange(this.value)"
                                                    class="h-[60px] w-full px-5 text-sm text-neutral-700 font-normal placeholder:text-neutral-700 rounded-[6px] bg-neutral-50 focus:outline-none 768max:h-12 text-right rtl"
                                                />
                                            </div>
                                            <style>
                                                .flatpickr-calendar.rtl {
                                                    direction: rtl;
                                                    text-align: right;
                                                }

                                                /* برای راستچین کردن input */
                                                .rtl {
                                                    direction: rtl;
                                                    text-align: right;
                                                }

                                                /* برای راستچین کردن ماه و سال در هدر تقویم */
                                                .flatpickr-current-month {
                                                    text-align: right;
                                                    padding-right: 10px;
                                                }

                                                /* برای راستچین کردن روزهای هفته */
                                                .flatpickr-weekdays {
                                                    text-align: right;
                                                    direction: rtl !important;
                                                }

                                                /* برای راستچین کردن اعداد روزها */
                                                .flatpickr-days {
                                                    direction: rtl;
                                                }
                                            </style>


                                            <div class="w-full flex flex-col gap-[6px]" x-data="passengerModal()">
                                                <label for="passengers" class="text-sm text-[#A8A8A8] font-normal 512max:text-xs">
                                                    مسافران:
                                                </label>
                                                <input
                                                    id="passengers"
                                                    type="text"
                                                    placeholder="1 بزرگسال، 1 اتاق"
                                                    class="h-[60px] w-full px-5 text-sm text-neutral-700 font-normal placeholder:text-neutral-700 rounded-[6px] bg-neutral-50 focus:outline-none 768max:h-12"
                                                    x-model="passengerText"
                                                    @click="isPassengerModalOpen = true"
                                                    readonly
                                                />

                                                <!-- Hidden Input برای ذخیره اطلاعات اتاق‌ها -->
                                                <input
                                                    type="hidden"
                                                    name="rooms_data"
                                                    x-model="roomsJSON"
                                                />

                                                <!-- Modal -->
                                                <div x-show="isPassengerModalOpen" @click.away="isPassengerModalOpen = false" class="passenger-modal-overlay" style="display: none">
                                                    <div class="passenger-modal-container">
                                                        <div class="passenger-modal-content">
                                                            <!-- Room List -->
                                                            <template x-for="(room, index) in rooms" :key="index">
                                                                <div class="room-card">
                                                                    <div class="room-header">
                                                                        <h3 class="room-title">اتاق <span x-text="index + 1"></span></h3>
                                                                        <a @click="removeRoom(index)" class="delete-room-btn">حذف اتاق</a>
                                                                    </div>
                                                                    <div class="room-controls">
                                                                        <div class="persons-control">
                                                                            <span class="control-label">تعداد نفر:</span>
                                                                            <div class="counter">
                                                                                <a @click="decrementPersons(index)" class="counter-btn decrement">-</a>
                                                                                <span class="counter-value" x-text="room.persons"></span>
                                                                                <a @click="incrementPersons(index)" class="counter-btn increment">+</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </template>

                                                            <!-- Add Room Button -->
                                                            <a @click="addRoom" class="add-room-btn">
                                                                افزودن اتاق
                                                            </a>

                                                            <!-- Close Modal Button -->
                                                            <a @click="isPassengerModalOpen = false" class="close-modal-btn">
                                                                بستن
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>

                                                <style>
                                                    /* استایل کلی مودال */
                                                    .passenger-modal-overlay {
                                                        position: fixed;
                                                        top: 0;
                                                        left: 0;
                                                        right: 0;
                                                        bottom: 0;
                                                        display: flex;
                                                        align-items: center;
                                                        justify-content: center;
                                                        z-index: 1000;
                                                        padding: 20px;
                                                    }

                                                    .passenger-modal-container {
                                                        background-color: white;
                                                        border-radius: 12px;
                                                        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
                                                        width: 100%;
                                                        max-width: 420px;
                                                        overflow: hidden;
                                                    }

                                                    .passenger-modal-content {
                                                        padding: 24px;
                                                        display: flex;
                                                        flex-direction: column;
                                                        gap: 16px;
                                                    }

                                                    /* استایل کارت اتاق */
                                                    .room-card {
                                                        border: 1px solid #e0e0e0;
                                                        border-radius: 8px;
                                                        padding: 16px;
                                                        background-color: #f9f9f9;
                                                        transition: all 0.3s ease;
                                                    }

                                                    .room-card:hover {
                                                        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
                                                    }

                                                    .room-header {
                                                        display: flex;
                                                        justify-content: space-between;
                                                        align-items: center;
                                                        margin-bottom: 12px;
                                                    }

                                                    .room-title {
                                                        font-size: 16px;
                                                        font-weight: 600;
                                                        color: #333;
                                                        margin: 0;
                                                    }

                                                    .delete-room-btn {
                                                        background: none;
                                                        border: none;
                                                        color: #e74c3c;
                                                        font-size: 14px;
                                                        cursor: pointer;
                                                        padding: 4px 8px;
                                                        border-radius: 4px;
                                                        transition: all 0.2s ease;
                                                    }

                                                    .delete-room-btn:hover {
                                                        background-color: #fde8e6;
                                                    }

                                                    /* استایل کنترل تعداد نفرات */
                                                    .persons-control {
                                                        display: flex;
                                                        justify-content: space-between;
                                                        align-items: center;
                                                    }

                                                    .control-label {
                                                        font-size: 14px;
                                                        color: #555;
                                                    }

                                                    .counter {
                                                        display: flex;
                                                        align-items: center;
                                                        gap: 8px;
                                                    }

                                                    .counter-btn {
                                                        width: 28px;
                                                        height: 28px;
                                                        border-radius: 50%;
                                                        border: 1px solid #ddd;
                                                        background-color: white;
                                                        font-size: 14px;
                                                        cursor: pointer;
                                                        display: flex;
                                                        align-items: center;
                                                        justify-content: center;
                                                        transition: all 0.2s ease;
                                                    }

                                                    .counter-btn:hover {
                                                        background-color: #f0f0f0;
                                                    }

                                                    .counter-value {
                                                        min-width: 20px;
                                                        text-align: center;
                                                        font-weight: 500;
                                                    }

                                                    /* استایل دکمه‌ها */
                                                    .add-room-btn, .close-modal-btn {
                                                        width: 100%;
                                                        padding: 12px;
                                                        border-radius: 8px;
                                                        border: none;
                                                        font-size: 14px;
                                                        font-weight: 500;
                                                        cursor: pointer;
                                                        transition: all 0.2s ease;
                                                    }

                                                    .add-room-btn {
                                                        background-color: #3498db;
                                                        color: white;
                                                    }

                                                    .add-room-btn:hover {
                                                        background-color: #2980b9;
                                                    }

                                                    .close-modal-btn {
                                                        background-color: #95a5a6;
                                                        color: white;
                                                        margin-top: 8px;
                                                    }

                                                    .close-modal-btn:hover {
                                                        background-color: #7f8c8d;
                                                    }
                                                </style>
                                            </div>


                                            <button class="w-full h-[60px] flex items-center justify-center flex-grow-[1] px-4 text-light text-[18px] font-medium text-center rounded-[6px] bg-green-600 transition-all duration-500 ease-out hover:bg-green-300 hover:transition-none 640max:max-w-[200px] 640max:mt-4 640max:self-center 768max:h-12">
                                                جستجو
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <!-- پرواز داخلی -->
                            <div id="travelTypeSelectionTabContent2" class="travelTypeSelectionTabContents w-full h-full hidden">
                                <div class="w-full h-full flex flex-col items-center gap-5">
                                    <!-- tab buttons -->
                                    <div class="w-full p-1 rounded-[6px] hidden grid-cols-2 items-center content-start bg-[#DBF0DD] max-w-[600px] 768max:grid">
                                        <button onclick="airplaneParttabContentControler(event, 'travelTypeSelectionTabContentAirplanePart1')" class="travelTypeSelectionTabContentAirplanePartButton active w-full flex items-center justify-center text-xs text-light font-normal text-center rounded-[4px] h-8">
                                            پرواز داخلی
                                        </button>
                                        <button onclick="airplaneParttabContentControler(event, 'travelTypeSelectionTabContentAirplanePart2')" class="travelTypeSelectionTabContentAirplanePartButton w-full flex items-center justify-center text-xs text-light font-normal text-center rounded-[4px] h-8">
                                            پرواز خارجی
                                        </button>
                                    </div>
                                    <div class="travelTypeSelectionTabContentAirplaneParts w-full h-full">
                                        <div id="travelTypeSelectionTabContentAirplanePart1" class="travelTypeSelectionTabContentAirplanePart w-full h-full hidden">
                                            <div class="w-full h-full flex flex-col justify-end gap-[22px]">
                                                <!-- top -->
                                                <div class="w-full flex items-center content-start gap-x-[60px] gap-y-3 flex-wrap 640max:flex-col">
                                                    <div class="flex items-center gap-5 640max:flex-col 640max:items-start 640max:gap-[14px] 640max:w-full">
                                                        <span class=" text-sm text-neutral-400 font-normal">
                                                            نوع بلیط:
                                                        </span>
                                                        <div class="flex items-center gap-5 640max:flex-col">
                                                            <div class="flex items-center gap-[12px]">
                                                                <input class="hidden" type="radio" id="blitType-1-1" name="blitType-1">
                                                                <label for="blitType-1-1" class="radio-label flex items-center justify-center w-5 aspect-square rounded-full bg-[#DBF0DD80]">
                                                                    <div class="icon w-[10px] aspect-square rounded-full bg-green-600 transition-all duration-200 ease-out">
                                                                    </div>
                                                                </label>
                                                                <label for="blitType-1-1" class=" text-base text-neutral-700 font-normal">
                                                                    یک طرفه
                                                                </label>
                                                            </div>
                                                            <div class="flex items-center gap-[12px]">
                                                                <input class="hidden" type="radio" id="blitType-1-2" name="blitType-1">
                                                                <label for="blitType-1-2" class="radio-label flex items-center justify-center w-5 aspect-square rounded-full bg-[#DBF0DD80]">
                                                                    <div class="icon w-[10px] aspect-square rounded-full bg-green-600 transition-all duration-200 ease-out">
                                                                    </div>
                                                                </label>
                                                                <label for="blitType-1-2" class=" text-base text-neutral-700 font-normal">
                                                                    دو طرفه
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="flex items-center gap-5 640max:flex-col 640max:items-start 640max:gap-[14px] 640max:w-full">
                                                        <span class=" text-sm text-neutral-400 font-normal">
                                                            نوع صندلی:
                                                        </span>
                                                        <div class="flex items-center gap-5 640max:flex-col">
                                                            <div class="flex items-center gap-[12px]">
                                                                <input class="hidden" type="radio" id="chairType-1-1" name="chairType-1">
                                                                <label for="chairType-1-1" class="radio-label flex items-center justify-center w-5 aspect-square rounded-full bg-[#DBF0DD80]">
                                                                    <div class="icon w-[10px] aspect-square rounded-full bg-green-600 transition-all duration-200 ease-out">
                                                                    </div>
                                                                </label>
                                                                <label for="chairType-1-1" class=" text-base text-neutral-700 font-normal">
                                                                    اقتصادی
                                                                </label>
                                                            </div>
                                                            <div class="flex items-center gap-[12px]">
                                                                <input class="hidden" type="radio" id="chairType-1-2" name="chairType-1">
                                                                <label for="chairType-1-2" class="radio-label flex items-center justify-center w-5 aspect-square rounded-full bg-[#DBF0DD80]">
                                                                    <div class="icon w-[10px] aspect-square rounded-full bg-green-600 transition-all duration-200 ease-out">
                                                                    </div>
                                                                </label>
                                                                <label for="chairType-1-2" class=" text-base text-neutral-700 font-normal">
                                                                    بیزینسی
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- bottom -->
                                                <div class="w-full grid grid-cols-[1fr_340px_0.5fr_0.5fr] gap-5 items-end 1150max:grid-cols-2 1150max:content-start 640max:justify-items-center 640max:grid-cols-1 512max:gap-[14px]">
                                                    <div class="w-full flex flex-col gap-[6px]">
                                                        <label for="" class=" text-sm text-[#A8A8A8] font-normal 512max:text-xs">
                                                            مقصد:
                                                        </label>
                                                        <div class="w-full grid grid-cols-2">
                                                            <input placeholder="مبدا" type="text" class=" h-[60px] w-full px-5 text-sm text-neutral-700 font-normal placeholder:text-neutral-700 rounded-r-[6px] bg-neutral-50 focus:outline-none 768max:h-12">
                                                            <input placeholder="مقصد" type="text" class=" h-[60px] w-full px-5 text-sm text-neutral-700 font-normal placeholder:text-neutral-700 rounded-l-[6px] bg-neutral-50 focus:outline-none 768max:h-12">
                                                        </div>
                                                    </div>
                                                    <div class="w-full flex flex-col gap-[6px]">
                                                        <label for="" class=" text-sm text-[#A8A8A8] font-normal 512max:text-xs">
                                                            تاریخ سفر:
                                                        </label>
                                                        <div class="w-full grid grid-cols-2">
                                                            <input data-jdp="" placeholder="تاریخ رفت" type="text" class=" h-[60px] w-full px-5 text-sm text-neutral-700 font-normal placeholder:text-neutral-700 rounded-r-[6px] bg-neutral-50 focus:outline-none 768max:h-12">
                                                            <input data-jdp="" placeholder="تاریخ برگشت" type="text" class=" h-[60px] w-full px-5 text-sm text-neutral-700 font-normal placeholder:text-neutral-700 rounded-l-[6px] bg-neutral-50 focus:outline-none 768max:h-12">
                                                        </div>
                                                    </div>
                                                    <div class="w-full flex flex-col gap-[6px]">
                                                        <label for="" class=" text-sm text-[#A8A8A8] font-normal 512max:text-xs">
                                                            مسافران:
                                                        </label>
                                                        <div class="w-full flex items-center justify-center h-[60px] bg-neutral-50 rounded-[6px] px-2 768max:h-12">
                                                            <button onclick="changePassengerCount('internalAirTravelerAmount', 1)" class=" w-5 h-full flex items-center justify-center text-sm text-neutral-700 font-medium">
                                                                <svg class=" w-full text-inherit" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                                                </svg>
                                                            </button>
                                                            <input id="internalAirTravelerAmount" placeholder="1 مسافر"  type="text" class="travelerAmountInput w-full flex-grow-[1] h-full text-base text-neutral-700 text-center font-normal focus:outline-none bg-transparent">
                                                            <button onclick="changePassengerCount('internalAirTravelerAmount', -1)" class=" w-5 h-full flex items-center justify-center text-sm text-neutral-700 font-medium">
                                                                <svg class=" w-full text-inherit" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14" />
                                                                </svg>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <button class=" w-full h-[60px] flex items-center justify-center flex-grow-[1] px-4 text-light text-[18px] font-medium text-center rounded-[6px] bg-green-600 transition-all duration-500 ease-out hover:bg-green-300 hover:transition-none 640max:max-w-[200px] 640max:mt-4 640max:self-center 768max:h-12">
                                                        جستجو
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="travelTypeSelectionTabContentAirplanePart2" class="travelTypeSelectionTabContentAirplanePart w-full h-full">
                                            <div class="w-full h-full flex flex-col justify-end gap-[22px]">
                                                <!-- top -->
                                                <div class="w-full flex items-center content-start gap-x-[60px] gap-y-3 flex-wrap 640max:flex-col">
                                                    <div class="flex items-center gap-5 640max:flex-col 640max:items-start 640max:gap-[14px] 640max:w-full">
                                                        <span class=" text-sm text-neutral-400 font-normal">
                                                            نوع بلیط:
                                                        </span>
                                                        <div class="flex items-center gap-5 640max:flex-col">
                                                            <div class="flex items-center gap-[12px]">
                                                                <input class="hidden" type="radio" id="blitType-1-1" name="blitType-1">
                                                                <label for="blitType-1-1" class="radio-label flex items-center justify-center w-5 aspect-square rounded-full bg-[#DBF0DD80]">
                                                                    <div class="icon w-[10px] aspect-square rounded-full bg-green-600 transition-all duration-200 ease-out">
                                                                    </div>
                                                                </label>
                                                                <label for="blitType-1-1" class=" text-base text-neutral-700 font-normal">
                                                                    یک طرفه
                                                                </label>
                                                            </div>
                                                            <div class="flex items-center gap-[12px]">
                                                                <input class="hidden" type="radio" id="blitType-1-2" name="blitType-1">
                                                                <label for="blitType-1-2" class="radio-label flex items-center justify-center w-5 aspect-square rounded-full bg-[#DBF0DD80]">
                                                                    <div class="icon w-[10px] aspect-square rounded-full bg-green-600 transition-all duration-200 ease-out">
                                                                    </div>
                                                                </label>
                                                                <label for="blitType-1-2" class=" text-base text-neutral-700 font-normal">
                                                                    دو طرفه
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="flex items-center gap-5 640max:flex-col 640max:items-start 640max:gap-[14px] 640max:w-full">
                                                        <span class=" text-sm text-neutral-400 font-normal">
                                                            نوع صندلی:
                                                        </span>
                                                        <div class="flex items-center gap-5 640max:flex-col">
                                                            <div class="flex items-center gap-[12px]">
                                                                <input class="hidden" type="radio" id="chairType-1-1" name="chairType-1">
                                                                <label for="chairType-1-1" class="radio-label flex items-center justify-center w-5 aspect-square rounded-full bg-[#DBF0DD80]">
                                                                    <div class="icon w-[10px] aspect-square rounded-full bg-green-600 transition-all duration-200 ease-out">
                                                                    </div>
                                                                </label>
                                                                <label for="chairType-1-1" class=" text-base text-neutral-700 font-normal">
                                                                    اقتصادی
                                                                </label>
                                                            </div>
                                                            <div class="flex items-center gap-[12px]">
                                                                <input class="hidden" type="radio" id="chairType-1-2" name="chairType-1">
                                                                <label for="chairType-1-2" class="radio-label flex items-center justify-center w-5 aspect-square rounded-full bg-[#DBF0DD80]">
                                                                    <div class="icon w-[10px] aspect-square rounded-full bg-green-600 transition-all duration-200 ease-out">
                                                                    </div>
                                                                </label>
                                                                <label for="chairType-1-2" class=" text-base text-neutral-700 font-normal">
                                                                    بیزینسی
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- bottom -->
                                                <div class="w-full grid grid-cols-[1fr_340px_0.5fr_0.5fr] gap-5 items-end 1150max:grid-cols-2 1150max:content-start 640max:justify-items-center 640max:grid-cols-1 512max:gap-[14px]">
                                                    <div class="w-full flex flex-col gap-[6px]">
                                                        <label for="" class=" text-sm text-[#A8A8A8] font-normal 512max:text-xs">
                                                            مقصد:
                                                        </label>
                                                        <div class="w-full grid grid-cols-2">
                                                            <input placeholder="مبدا" type="text" class=" h-[60px] w-full px-5 text-sm text-neutral-700 font-normal placeholder:text-neutral-700 rounded-r-[6px] bg-neutral-50 focus:outline-none 768max:h-12">
                                                            <input placeholder="مقصد" type="text" class=" h-[60px] w-full px-5 text-sm text-neutral-700 font-normal placeholder:text-neutral-700 rounded-l-[6px] bg-neutral-50 focus:outline-none 768max:h-12">
                                                        </div>
                                                    </div>
                                                    <div class="w-full flex flex-col gap-[6px]">
                                                        <label for="" class=" text-sm text-[#A8A8A8] font-normal 512max:text-xs">
                                                            تاریخ سفر:
                                                        </label>
                                                        <div class="w-full grid grid-cols-2">
                                                            <input data-jdp="" placeholder="تاریخ رفت" type="text" class=" h-[60px] w-full px-5 text-sm text-neutral-700 font-normal placeholder:text-neutral-700 rounded-r-[6px] bg-neutral-50 focus:outline-none 768max:h-12">
                                                            <input data-jdp="" placeholder="تاریخ برگشت" type="text" class=" h-[60px] w-full px-5 text-sm text-neutral-700 font-normal placeholder:text-neutral-700 rounded-l-[6px] bg-neutral-50 focus:outline-none 768max:h-12">
                                                        </div>
                                                    </div>
                                                    <div class="w-full flex flex-col gap-[6px]">
                                                        <label for="" class=" text-sm text-[#A8A8A8] font-normal 512max:text-xs">
                                                            مسافران:
                                                        </label>
                                                        <div class="w-full flex items-center justify-center h-[60px] bg-neutral-50 rounded-[6px] px-2 768max:h-12">
                                                            <button onclick="changePassengerCount('externalAirTravelerAmountMobile', 1)" class=" w-5 h-full flex items-center justify-center text-sm text-neutral-700 font-medium">
                                                                <svg class=" w-full text-inherit" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                                                </svg>
                                                            </button>
                                                            <input id="externalAirTravelerAmountMobile" placeholder="1 مسافر"  type="text" class="travelerAmountInput w-full flex-grow-[1] h-full text-base text-neutral-700 text-center font-normal focus:outline-none bg-transparent">
                                                            <button onclick="changePassengerCount('externalAirTravelerAmountMobile', -1)" class=" w-5 h-full flex items-center justify-center text-sm text-neutral-700 font-medium">
                                                                <svg class=" w-full text-inherit" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14" />
                                                                </svg>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <button class=" w-full h-[60px] flex items-center justify-center flex-grow-[1] px-4 text-light text-[18px] font-medium text-center rounded-[6px] bg-green-600 transition-all duration-500 ease-out hover:bg-green-300 hover:transition-none 640max:max-w-[200px] 640max:mt-4 640max:self-center 768max:h-12">
                                                        جستجو
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- پرواز خارجی -->
                            <div id="travelTypeSelectionTabContent3" class="travelTypeSelectionTabContents w-full h-full hidden">
                                <div class="w-full h-full flex flex-col justify-end gap-[22px]">
                                    <!-- top -->
                                    <div class="w-full flex items-center content-start gap-x-[60px] gap-y-3 flex-wrap 640max:flex-col">
                                        <div class="flex items-center gap-5 640max:flex-col 640max:items-start 640max:gap-[14px] 640max:w-full">
                                            <span class=" text-sm text-neutral-400 font-normal">
                                                نوع بلیط:
                                            </span>
                                            <div class="flex items-center gap-5 640max:flex-col">
                                                <div class="flex items-center gap-[12px]">
                                                    <input class="hidden" type="radio" id="blitType-2-1" name="blitType-2">
                                                    <label for="blitType-2-1" class="radio-label flex items-center justify-center w-5 aspect-square rounded-full bg-[#DBF0DD80]">
                                                        <div class="icon w-[10px] aspect-square rounded-full bg-green-600 transition-all duration-200 ease-out">
                                                        </div>
                                                    </label>
                                                    <label for="blitType-2-1" class=" text-base text-neutral-700 font-normal">
                                                        یک طرفه
                                                    </label>
                                                </div>
                                                <div class="flex items-center gap-[12px]">
                                                    <input class="hidden" type="radio" id="blitType-2-2" name="blitType-2">
                                                    <label for="blitType-2-2" class="radio-label flex items-center justify-center w-5 aspect-square rounded-full bg-[#DBF0DD80]">
                                                        <div class="icon w-[10px] aspect-square rounded-full bg-green-600 transition-all duration-200 ease-out">
                                                        </div>
                                                    </label>
                                                    <label for="blitType-2-2" class=" text-base text-neutral-700 font-normal">
                                                        دو طرفه
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex items-center gap-5 640max:flex-col 640max:items-start 640max:gap-[14px] 640max:w-full">
                                            <span class=" text-sm text-neutral-400 font-normal">
                                                نوع صندلی:
                                            </span>
                                            <div class="flex items-center gap-5 640max:flex-col">
                                                <div class="flex items-center gap-[12px]">
                                                    <input class="hidden" type="radio" id="chairType-2-1" name="chairType-2">
                                                    <label for="chairType-2-1" class="radio-label flex items-center justify-center w-5 aspect-square rounded-full bg-[#DBF0DD80]">
                                                        <div class="icon w-[10px] aspect-square rounded-full bg-green-600 transition-all duration-200 ease-out">
                                                        </div>
                                                    </label>
                                                    <label for="chairType-2-1" class=" text-base text-neutral-700 font-normal">
                                                        اقتصادی
                                                    </label>
                                                </div>
                                                <div class="flex items-center gap-[12px]">
                                                    <input class="hidden" type="radio" id="chairType-2-2" name="chairType-2">
                                                    <label for="chairType-2-2" class="radio-label flex items-center justify-center w-5 aspect-square rounded-full bg-[#DBF0DD80]">
                                                        <div class="icon w-[10px] aspect-square rounded-full bg-green-600 transition-all duration-200 ease-out">
                                                        </div>
                                                    </label>
                                                    <label for="chairType-2-2" class=" text-base text-neutral-700 font-normal">
                                                        بیزینسی
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- bottom -->
                                    <div class="w-full grid grid-cols-[1fr_340px_0.5fr_0.5fr] gap-5 items-end 1150max:grid-cols-2 1150max:content-start 640max:justify-items-center 640max:grid-cols-1 512max:gap-[14px]">
                                        <div class="w-full flex flex-col gap-[6px]">
                                            <label for="" class=" text-sm text-[#A8A8A8] font-normal 512max:text-xs">
                                                مقصد:
                                            </label>
                                            <div class="w-full grid grid-cols-2">
                                                <input placeholder="مبدا" type="text" class=" h-[60px] w-full px-5 text-sm text-neutral-700 font-normal placeholder:text-neutral-700 rounded-r-[6px] bg-neutral-50 focus:outline-none 768max:h-12">
                                                <input placeholder="مقصد" type="text" class=" h-[60px] w-full px-5 text-sm text-neutral-700 font-normal placeholder:text-neutral-700 rounded-l-[6px] bg-neutral-50 focus:outline-none 768max:h-12">
                                            </div>
                                        </div>
                                        <div class="w-full flex flex-col gap-[6px]">
                                            <label for="" class=" text-sm text-[#A8A8A8] font-normal 512max:text-xs">
                                                تاریخ سفر:
                                            </label>
                                            <div class="w-full grid grid-cols-2">
                                                <input data-jdp="" placeholder="تاریخ رفت" type="text" class=" h-[60px] w-full px-5 text-sm text-neutral-700 font-normal placeholder:text-neutral-700 rounded-r-[6px] bg-neutral-50 focus:outline-none 768max:h-12">
                                                <input data-jdp="" placeholder="تاریخ برگشت" type="text" class=" h-[60px] w-full px-5 text-sm text-neutral-700 font-normal placeholder:text-neutral-700 rounded-l-[6px] bg-neutral-50 focus:outline-none 768max:h-12">
                                            </div>
                                        </div>
                                        <div class="w-full flex flex-col gap-[6px]">
                                            <label for="" class=" text-sm text-[#A8A8A8] font-normal 512max:text-xs">
                                                مسافران:
                                            </label>
                                            <div class="w-full flex items-center justify-center h-[60px] bg-neutral-50 rounded-[6px] px-2 768max:h-12">
                                                <button onclick="changePassengerCount('externalAirTravelerAmount', 1)" class=" w-5 h-full flex items-center justify-center text-sm text-neutral-700 font-medium">
                                                    <svg class=" w-full text-inherit" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                                    </svg>
                                                </button>
                                                <input id="externalAirTravelerAmount" placeholder="1 مسافر" type="text" class="travelerAmountInput w-full flex-grow-[1] h-full text-base text-neutral-700 text-center font-normal focus:outline-none bg-transparent">
                                                <button onclick="changePassengerCount('externalAirTravelerAmount', -1)" class=" w-5 h-full flex items-center justify-center text-sm text-neutral-700 font-medium">
                                                    <svg class=" w-full text-inherit" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                        <button class=" w-full h-[60px] flex items-center justify-center flex-grow-[1] px-4 text-light text-[18px] font-medium text-center rounded-[6px] bg-green-600 transition-all duration-500 ease-out hover:bg-green-300 hover:transition-none 640max:max-w-[200px] 640max:mt-4 640max:self-center 768max:h-12">
                                            جستجو
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <!-- قطار -->
                            <div id="travelTypeSelectionTabContent4" class="travelTypeSelectionTabContents w-full h-full hidden">
                                <div class="w-full h-full flex flex-col justify-end gap-[22px]">
                                    <!-- top -->
                                    <div class="w-full flex items-center content-start gap-x-[60px] gap-y-3 flex-wrap 640max:flex-col">
                                        <div class="flex items-center gap-5 640max:flex-col 640max:items-start 640max:gap-[14px] 640max:w-full">
                                            <span class=" text-sm text-neutral-400 font-normal">
                                                نوع بلیط:
                                            </span>
                                            <div class="flex items-center gap-5 640max:flex-col">
                                                <div class="flex items-center gap-[12px]">
                                                    <input class="hidden" type="radio" id="blitType-1-1" name="blitType-1">
                                                    <label for="blitType-1-1" class="radio-label flex items-center justify-center w-5 aspect-square rounded-full bg-[#DBF0DD80]">
                                                        <div class="icon w-[10px] aspect-square rounded-full bg-green-600 transition-all duration-200 ease-out">
                                                        </div>
                                                    </label>
                                                    <label for="blitType-1-1" class=" text-base text-neutral-700 font-normal">
                                                        یک طرفه
                                                    </label>
                                                </div>
                                                <div class="flex items-center gap-[12px]">
                                                    <input class="hidden" type="radio" id="blitType-1-2" name="blitType-1">
                                                    <label for="blitType-1-2" class="radio-label flex items-center justify-center w-5 aspect-square rounded-full bg-[#DBF0DD80]">
                                                        <div class="icon w-[10px] aspect-square rounded-full bg-green-600 transition-all duration-200 ease-out">
                                                        </div>
                                                    </label>
                                                    <label for="blitType-1-2" class=" text-base text-neutral-700 font-normal">
                                                        دو طرفه
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex items-center gap-5 640max:flex-col 640max:items-start 640max:gap-[14px] 640max:w-full">
                                            <span class=" text-sm text-neutral-400 font-normal">
                                                نوع صندلی:
                                            </span>
                                            <div class="flex items-center gap-5 640max:flex-col">
                                                <div class="flex items-center gap-[12px]">
                                                    <input class="hidden" type="radio" id="chairType-1-1" name="chairType-1">
                                                    <label for="chairType-1-1" class="radio-label flex items-center justify-center w-5 aspect-square rounded-full bg-[#DBF0DD80]">
                                                        <div class="icon w-[10px] aspect-square rounded-full bg-green-600 transition-all duration-200 ease-out">
                                                        </div>
                                                    </label>
                                                    <label for="chairType-1-1" class=" text-base text-neutral-700 font-normal">
                                                        اقتصادی
                                                    </label>
                                                </div>
                                                <div class="flex items-center gap-[12px]">
                                                    <input class="hidden" type="radio" id="chairType-1-2" name="chairType-1">
                                                    <label for="chairType-1-2" class="radio-label flex items-center justify-center w-5 aspect-square rounded-full bg-[#DBF0DD80]">
                                                        <div class="icon w-[10px] aspect-square rounded-full bg-green-600 transition-all duration-200 ease-out">
                                                        </div>
                                                    </label>
                                                    <label for="chairType-1-2" class=" text-base text-neutral-700 font-normal">
                                                        بیزینسی
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex items-center gap-5 640max:hidden">
                                            <div class="flex items-center gap-[9px]">
                                                <input class=" hidden" type="checkbox" id="isFullRequest" name="">
                                                <label for="isFullRequest" class=" w-4.5 aspect-square bg-green-100 rounded-[2px] flex items-center justify-center" style="box-shadow: 0px 0px 10px 0px #8CB3984D;">
                                                    <svg class=" w-[14px] text-green-600" viewBox="0 0 12 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M0.75 4.75L4.25 8.25L11.25 0.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    </svg>
                                                </label>
                                                <label for="isFullRequest" class=" text-base text-black font-normal font-farsi-regular">
                                                    دربست میخام
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- bottom -->
                                    <div class="w-full grid grid-cols-[1fr_340px_0.5fr_0.5fr] gap-5 items-end 1150max:grid-cols-2 1150max:content-start 640max:justify-items-center 640max:grid-cols-1 512max:gap-[14px]">
                                        <div class="w-full flex flex-col gap-[6px]">
                                            <label for="" class=" text-sm text-[#A8A8A8] font-normal 512max:text-xs">
                                                مقصد:
                                            </label>
                                            <div class="w-full grid grid-cols-2">
                                                <input placeholder="مبدا" type="text" class=" h-[60px] w-full px-5 text-sm text-neutral-700 font-normal placeholder:text-neutral-700 rounded-r-[6px] bg-neutral-50 focus:outline-none 768max:h-12">
                                                <input placeholder="مقصد" type="text" class=" h-[60px] w-full px-5 text-sm text-neutral-700 font-normal placeholder:text-neutral-700 rounded-l-[6px] bg-neutral-50 focus:outline-none 768max:h-12">
                                            </div>
                                        </div>
                                        <div class="w-full flex flex-col gap-[6px]">
                                            <label for="" class=" text-sm text-[#A8A8A8] font-normal 512max:text-xs">
                                                تاریخ سفر:
                                            </label>
                                            <div class="w-full grid grid-cols-2">
                                                <input data-jdp="" placeholder="تاریخ رفت" type="text" class=" h-[60px] w-full px-5 text-sm text-neutral-700 font-normal placeholder:text-neutral-700 rounded-r-[6px] bg-neutral-50 focus:outline-none 768max:h-12">
                                                <input data-jdp="" placeholder="تاریخ برگشت" type="text" class=" h-[60px] w-full px-5 text-sm text-neutral-700 font-normal placeholder:text-neutral-700 rounded-l-[6px] bg-neutral-50 focus:outline-none 768max:h-12">
                                            </div>
                                        </div>
                                        <div class="w-full flex flex-col gap-[6px]">
                                            <label for="" class=" text-sm text-[#A8A8A8] font-normal 512max:text-xs">
                                                مسافران:
                                            </label>
                                            <div class="w-full flex items-center justify-center h-[60px] bg-neutral-50 rounded-[6px] px-2 768max:h-12">
                                                <button onclick="changePassengerCount('trainTravelerAmount', 1)" class=" w-5 h-full flex items-center justify-center text-sm text-neutral-700 font-medium">
                                                    <svg class=" w-full text-inherit" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                                    </svg>
                                                </button>
                                                <input id="trainTravelerAmount" placeholder="1 مسافر"  type="text" class="travelerAmountInput w-full flex-grow-[1] h-full text-base text-neutral-700 text-center font-normal focus:outline-none bg-transparent">
                                                <button onclick="changePassengerCount('trainTravelerAmount', -1)" class=" w-5 h-full flex items-center justify-center text-sm text-neutral-700 font-medium">
                                                    <svg class=" w-full text-inherit" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="hidden items-center gap-5 640max:flex 640max:w-full">
                                            <div class="flex items-center gap-[9px]">
                                                <input class=" hidden" type="checkbox" id="isFullRequest2" name="">
                                                <label for="isFullRequest2" class=" w-4.5 aspect-square bg-green-100 rounded-[2px] flex items-center justify-center" style="box-shadow: 0px 0px 10px 0px #8CB3984D;">
                                                    <svg class=" w-[14px] text-green-600" viewBox="0 0 12 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M0.75 4.75L4.25 8.25L11.25 0.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    </svg>
                                                </label>
                                                <label for="isFullRequest2" class=" text-base text-black font-normal font-farsi-regular">
                                                    دربست میخام
                                                </label>
                                            </div>
                                        </div>
                                        <button class=" w-full h-[60px] flex items-center justify-center flex-grow-[1] px-4 text-light text-[18px] font-medium text-center rounded-[6px] bg-green-600 transition-all duration-500 ease-out hover:bg-green-300 hover:transition-none 640max:max-w-[200px] 640max:mt-4 640max:self-center 768max:h-12">
                                            جستجو
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <!-- تور -->
                            <div id="travelTypeSelectionTabContent5" class="travelTypeSelectionTabContents w-full h-full hidden">
                                <div class="w-full h-full flex flex-col justify-end gap-[22px]">
                                    <!-- top -->
                                    <div class="w-full flex items-center content-start gap-x-[60px] gap-y-3 flex-wrap 640max:flex-col">
                                        <div class="flex items-center gap-5 640max:flex-col 640max:items-start 640max:gap-[14px] 640max:w-full">
                                            <span class=" text-sm text-neutral-400 font-normal">
                                                نوع بلیط:
                                            </span>
                                            <div class="flex items-center gap-5 640max:flex-col">
                                                <div class="flex items-center gap-[12px]">
                                                    <input class="hidden" type="radio" id="blitType-3-1" name="blitType-3">
                                                    <label for="blitType-3-1" class="radio-label flex items-center justify-center w-5 aspect-square rounded-full bg-[#DBF0DD80]">
                                                        <div class="icon w-[10px] aspect-square rounded-full bg-green-600 transition-all duration-200 ease-out">
                                                        </div>
                                                    </label>
                                                    <label for="blitType-3-1" class=" text-base text-neutral-700 font-normal">
                                                        تور هتل+بلیط
                                                    </label>
                                                </div>
                                                <div class="flex items-center gap-[12px]">
                                                    <input class="hidden" type="radio" id="blitType-3-2" name="blitType-3">
                                                    <label for="blitType-3-2" class="radio-label flex items-center justify-center w-5 aspect-square rounded-full bg-[#DBF0DD80]">
                                                        <div class="icon w-[10px] aspect-square rounded-full bg-green-600 transition-all duration-200 ease-out">
                                                        </div>
                                                    </label>
                                                    <label for="blitType-3-2" class=" text-base text-neutral-700 font-normal">
                                                        تور گردشگری
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- bottom -->
                                    <div class="w-full grid grid-cols-[1fr_340px_0.5fr_0.5fr] gap-5 items-end 1150max:grid-cols-2 1150max:content-start 640max:justify-items-center 640max:grid-cols-1 512max:gap-[14px]">
                                        <div class="w-full flex flex-col gap-[6px]">
                                            <label for="" class=" text-sm text-[#A8A8A8] font-normal 512max:text-xs">
                                                مقصد:
                                            </label>
                                            <div class="w-full grid grid-cols-2">
                                                <input placeholder="مبدا" type="text" class=" h-[60px] w-full px-5 text-sm text-neutral-700 font-normal placeholder:text-neutral-700 rounded-r-[6px] bg-neutral-50 focus:outline-none 768max:h-12">
                                                <input placeholder="مقصد" type="text" class=" h-[60px] w-full px-5 text-sm text-neutral-700 font-normal placeholder:text-neutral-700 rounded-l-[6px] bg-neutral-50 focus:outline-none 768max:h-12">
                                            </div>
                                        </div>
                                        <div class="w-full flex flex-col gap-[6px]">
                                            <label for="" class=" text-sm text-[#A8A8A8] font-normal 512max:text-xs">
                                                تاریخ سفر:
                                            </label>
                                            <div class="w-full grid grid-cols-2">
                                                <input data-jdp="" placeholder="تاریخ رفت" type="text" class=" h-[60px] w-full px-5 text-sm text-neutral-700 font-normal placeholder:text-neutral-700 rounded-r-[6px] bg-neutral-50 focus:outline-none 768max:h-12">
                                                <input data-jdp="" placeholder="تاریخ برگشت" type="text" class=" h-[60px] w-full px-5 text-sm text-neutral-700 font-normal placeholder:text-neutral-700 rounded-l-[6px] bg-neutral-50 focus:outline-none 768max:h-12">
                                            </div>
                                        </div>
                                        <div class="w-full flex flex-col gap-[6px]">
                                            <label for="" class=" text-sm text-[#A8A8A8] font-normal 512max:text-xs">
                                                مسافران:
                                            </label>
                                            <input type="text" placeholder="1 بزرگسال، 1 اتاق" class=" h-[60px] w-full px-5 text-sm text-neutral-700 font-normal placeholder:text-neutral-700 rounded-[6px] bg-neutral-50 focus:outline-none 768max:h-12">
                                        </div>
                                        <button class=" w-full h-[60px] flex items-center justify-center flex-grow-[1] px-4 text-light text-[18px] font-medium text-center rounded-[6px] bg-green-600 transition-all duration-500 ease-out hover:bg-green-300 hover:transition-none 640max:max-w-[200px] 640max:mt-4 640max:self-center 768max:h-12">
                                            جستجو
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="w-full max-w-[1440px] px-[100px] flex flex-col gap-[22px] 512max:px-[28px] 768max:gap-6 1024max:px-[36px] 1280max:px-[64px]">
            <!-- header -->
            <div class="w-full flex items-center justify-center">
                <h5 class="hidden text-[20px] text-black font-bold">
                    خدمات سفری نو برای سفری راحت
                </h5>
            </div>
            <!-- body -->
            <div class="w-full flex items-center justify-between gap-4.5 768max:grid 768max:grid-cols-3">
                <!-- item -->
                <div class="flex flex-col items-center gap-[6px] max-w-[350px] 768max:max-w-max">
                    <!-- content -->
                    <div class="flex items-center gap-4 1024max:flex-col-reverse 768max:w-full">
                        <!-- texts -->
                        <div class="w-full flex flex-col gap-4 768max:hidden">
                            <span class=" text-[18px] text-neutral-700 font-bold">
                                رزرو بلیط هواپیما و قطار
                            </span>
                            <span class=" text-[12px] text-neutral-700 font-normal">
                                با سفری نو، بلیط هواپیما و قطار را سریع و آسان رزرو کنید و سفری راحت را تجربه کنید!
                            </span>
                        </div>
                        <!-- image -->
                        <div class=" 768max:flex 768max:items-center 768max:justify-center 768max:p-3 768max:w-full 768max:h-full 768max:!aspect-square 768max:rounded-[8px] 768max:bg-green-100">
                            <img class="w-[185px] 768max:h-full 768max:object-contain 1024max:w-auto 1024max:h-[120px]" src="{{ asset('public/images/airplaneBig.png') }}" alt="#">
                        </div>
                    </div>
                    <!-- title in mobile -->
                    <span class="hidden text-sm text-green-600 font-medium text-center 768max:inline">
                        خرید بلیط
                    </span>
                </div>
                <div class="flex flex-col items-center gap-[6px] max-w-[350px] 768max:max-w-max">
                    <!-- content -->
                    <div class="flex items-center gap-4 1024max:flex-col-reverse 768max:w-full">
                        <!-- texts -->
                        <div class="w-full flex flex-col gap-4 768max:hidden">
                            <span class=" text-[18px] text-neutral-700 font-bold">
                                رزرو بروزترین هتل ها
                            </span>
                            <span class=" text-[12px] text-neutral-700 font-normal">
                                با سفری نو، بلیط هواپیما و قطار را سریع و آسان رزرو کنید و سفری راحت را تجربه کنید!
                            </span>
                        </div>
                        <!-- image -->
                        <div class=" 768max:flex 768max:items-center 768max:justify-center 768max:p-3 768max:w-full 768max:h-full 768max:!aspect-square 768max:rounded-[8px] 768max:bg-green-100">
                            <img class="w-[100px] 768max:h-full 768max:object-contain 1024max:w-auto 1024max:h-[120px]" src="{{ asset('public/images/hotelBig.png') }}" alt="#">
                        </div>
                    </div>
                    <!-- title in mobile -->
                    <span class="hidden text-sm text-green-600 font-medium text-center 768max:inline">
                        رزرو هتل
                    </span>
                </div>
                <div class="flex flex-col items-center gap-[6px] max-w-[350px] 768max:max-w-max">
                    <!-- content -->
                    <div class="flex items-center gap-4 1024max:flex-col-reverse 768max:w-full">
                        <!-- texts -->
                        <div class="w-full flex flex-col gap-4 768max:hidden">
                            <span class=" text-[18px] text-neutral-700 font-bold">
                                رزرو بهترین تورها
                            </span>
                            <span class=" text-[12px] text-neutral-700 font-normal">
                                با سفری نو، تورهای متنوع را آسان رزرو کنید و سفری به‌یادماندنی داشته باشید!
                            </span>
                        </div>
                        <!-- image -->
                        <div class=" 768max:flex 768max:items-center 768max:justify-center 768max:p-3 768max:w-full 768max:h-full 768max:!aspect-square 768max:rounded-[8px] 768max:bg-green-100">
                            <img class="w-[110px] 768max:h-full 768max:object-contain 1024max:w-auto 1024max:h-[120px]" src="{{ asset('public/images/backPackBig.png') }}" alt="#">
                        </div>
                    </div>
                    <!-- title in mobile -->
                    <span class="hidden text-sm text-green-600 font-medium text-center 768max:inline">
                        رزرو تور
                    </span>
                </div>
            </div>
            <!-- footer -->
            <div class="w-full hidden 768max:block">
                <p class=" text-xs font-normal text-neutral-700 text-center">
                    <span class=" text-xs font-bold text-green-300">
                        سایت سفری نو
                    </span>
                    یک پلتفرم جامع گردشگری است که امکان خرید بلیط هواپیما، قطار، رزرو هتل و انواع تورهای مسافرتی را با قیمت‌های رقابتی و خدمات مطمئن فراهم می‌کند و تجربه‌ای راحت و سریع برای برنامه‌ریزی سفر به کاربران ارائه می‌دهد.
                </p>
            </div>
        </section>
        @if(count($suggestionsOne) > 3)
        <section class=" w-full max-w-[1440px] px-[100px] flex flex-col gap-10 mb-[73px] 512max:px-[0px] 1024max:px-[0px] 1280max:px-[64px]">
            <!-- header -->
            <div class="w-full flex flex-col gap-[6px] 640max:items-center 512max:px-7 640max:gap-2 1024max:px-[36px]">
                <!-- top -->
                <div class="w-full flex items-baseline justify-between gap-4.5 640max:justify-center">
                    <h5 class=" text-[24px] text-green-600 font-bold flex-shrink-[0] 640max:text-[20px]">
                        پیشنهادات برتر
                    </h5>
                    <div class=" w-full h-[1px] flex-grow-[1] border-[1px] border-dashed border-green-300 640max:hidden"></div>
                    <a href="#" class="flex items-center text-green-300 text-sm font-normal flex-shrink-[0] 640max:hidden">
                        <span>
                            مشاهده همه
                        </span>
                        <svg class=" w-4 text-inherit" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                            <path fill-rule="evenodd" d="M7.72 12.53a.75.75 0 0 1 0-1.06l7.5-7.5a.75.75 0 1 1 1.06 1.06L9.31 12l6.97 6.97a.75.75 0 1 1-1.06 1.06l-7.5-7.5Z" clip-rule="evenodd" />
                        </svg>
                    </a>
                </div>
                <!-- bottom -->
                <span class=" text-sm text-neutral-400 font-normal 512max:text-[10px]">
                    در این بخش بهترین پیشنهادات سفر سایت سفری نو را مشاهده می کنید
                </span>
            </div>
            <!-- body -->
            <div class="w-full relative grid grid-cols-220-1fr 1024max:flex 1024max:flex-col-reverse 1024max:items-center 1024max:gap-5" style="height: min-content;">
                <!-- img -->
                <div class="w-full flex items-center 512max:px-7 1024max:px-9">
                    <img src="{{ asset('public/images/bag2.png') }}" alt="#" class=" 512max:h-[158px] 640max:h-[200px] 1024max:h-[300px]">
                    <span class="hidden text-sm text-light font-bold drop-shadow-txtLightShadow 1024max:inline">
                        یک بلیط تا مقصد رویایی تو فاصله است!
                    </span>
                </div>
                <!-- slider -->
                <div class="w-full px-10 512max:px-7 1024max:px-[36px]">
                    <div class="w-full relative">
                        <div class="swiper bestSuggestSlider w-full">
                            <div class="swiper-wrapper">
                                @foreach($suggestionsOne as $suggestionHotel)
                                    <div class="swiper-slide">
                                    <div class="w-full bg-light rounded-[6px] flex flex-col overflow-hidden">
                                        <!-- image -->
                                        <div class="w-full relative h-[206px] 640max:h-[117px] 850max:h-[140px]">
                                            <img src="{{ asset('storage/' . @$suggestionHotel->hotel->banner) }}" alt="#" class="w-full h-full object-cover">
                                            <!-- cover -->
                                            <div class="w-full h-full flex flex-col justify-end p-3 absolute z-[2] top-0 left-0" style="background: linear-gradient(180deg, rgba(36, 82, 72, 0) 47.82%, #245248 96.96%);">
                                                <div class="w-full flex items-center justify-between 850max:justify-start">
                                                    <span class=" text-sm text-light font-medium 512max:text-xs">
                                                        {{ $suggestionHotel->title }}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- content -->
                                        <div class="w-full px-4 pb-4 pt-4.5 flex items-center gap-[6px] 850max:flex-col-reverse 850max:px-[11px] 850max:pb-[9px] 850max:pt-[12px] 850max:gap-[14px]">
                                            <!-- button -->
                                            <form method="get" action="{{ route('hotelBooking.showDescription') }}">
                                                <input type="hidden" name="destination" value="{{ $suggestionHotel->city }}">
                                                <input type="hidden" name="hotel_id" value="{{ $suggestionHotel->hotel_id }}">
                                                <input type="hidden" name="dates" value="{{ $today->format('Y/m/d') }} تا {{ $tomorrow->format('Y/m/d') }}">
                                                <input type="hidden" name="rooms_data" value='[{"persons":1}]'>
                                                <input type="hidden" name="hotelId" value="{{ $suggestionHotel->hotel_id }}">
                                                <button class=" flex items-center justify-center flex-grow-[1] px-4 h-10 text-light text-xs font-bold text-center rounded-[6px] bg-green-600 transition-all duration-500 ease-out hover:bg-green-300 hover:transition-none 512max:text-[10px] 768nax:text-[10px] 768max:h-[30px] 850max:w-full">
                                                    جزئیات و رزرو
                                                </button>
                                            </form>

                                            <div class="flex items-center gap-[6px] 850max:justify-between 850max:w-full">
                                                <div class="w-[150px] flex items-center gap-3 p-2 rounded-[6px] bg-neutral-50 512max:min-w-[79px] 512max:p-[6px] 512max:gap-[6px]">
                                                    <svg class=" w-6 text-green-600 512max:w-[14px] 640max:w-[14px]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
                                                    </svg>
                                                    <span class=" text-neutral-700 text-sm 640max:text-[8px] text-nowrap">
                                                        <span class=" font-medium text-nowrap">
                                                            {{ \Morilog\Jalali\Jalalian::now()->format('%d %B') }}
                                                        </span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <button onclick="bestSuggestSlider.slidePrev()" class="absolute top-0 bottom-0 -right-5 my-auto z-[5] bg-[#F2F2F280] w-10 aspect-square rounded-full flex items-center justify-center backdrop-blur-md 512max:w-[30px] 512max:h-[30px] 512max:right-[-15px]">
                            <svg class=" w-5 text-light 512max:w-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                            </svg>
                        </button>
                        <!-- nextButton -->
                        <button onclick="bestSuggestSlider.slideNext()" class="absolute top-0 bottom-0 -left-5 my-auto z-[5] bg-[#F2F2F280] w-10 aspect-square rounded-full flex items-center justify-center backdrop-blur-md 512max:w-[30px] 512max:h-[30px] 512max:left-[-15px]">
                            <svg class=" w-5 text-light 512max:w-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                            </svg>
                        </button>
                    </div>
                </div>
                <!-- background -->
                <div class="w-full h-full absolute z-[-1] rounded-xl top-[73px] 1024max:h-[73%] 1024max:top-[80px]" style="background: radial-gradient(92.58% 169.6% at 92.58% 36.27%, #DBF0DD 0%, #8CB398 72.8%);">

                </div>
            </div>
        </section>
        @endif
        @if(count($suggestionsTwo) > 3)
        <section class=" w-full max-w-[1440px] px-[100px] flex flex-col gap-10 512max:px-[28px] 1024max:px-[36px] 1280max:px-[64px]">
            <!-- header -->
            <div class="w-full flex flex-col gap-[6px] 640max:items-center 640max:gap-2">
                <!-- top -->
                <div class="w-full flex items-baseline justify-between gap-4.5 640max:justify-center">
                    <h5 class=" text-[24px] text-green-600 font-bold flex-shrink-[0] 640max:text-[20px]">
                        پیشنهادات برتر
                    </h5>
                    <div class=" w-full h-[1px] flex-grow-[1] border-[1px] border-dashed border-green-300 640max:hidden"></div>
                    <a href="#" class="flex items-center text-green-300 text-sm font-normal flex-shrink-[0] 640max:hidden">
                        <span>
                            مشاهده همه
                        </span>
                        <svg class=" w-4 text-inherit" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                            <path fill-rule="evenodd" d="M7.72 12.53a.75.75 0 0 1 0-1.06l7.5-7.5a.75.75 0 1 1 1.06 1.06L9.31 12l6.97 6.97a.75.75 0 1 1-1.06 1.06l-7.5-7.5Z" clip-rule="evenodd" />
                        </svg>
                    </a>
                </div>
                <!-- bottom -->
                <span class=" text-sm text-neutral-400 font-normal 512max:text-[10px]">
                    در این بخش بهترین پیشنهادات سفر سایت سفری نو را مشاهده می کنید
                </span>
            </div>
            <!-- body -->
            <div class="w-full">
                <!-- slider in desktop -->
                <div class="swiper readyToursSlider w-full 640max:hidden">
                    <div class="swiper-wrapper">
                        @foreach($suggestionsTwo as $suggestionHotel)
                            <div class="swiper-slide">
                                <div class="w-full bg-light rounded-[6px] flex flex-col overflow-hidden">
                                    <!-- image -->
                                    <div class="w-full relative h-[206px] 640max:h-[117px] 850max:h-[140px]">
                                        <img src="{{ asset('storage/' . @$suggestionHotel->hotel->banner) }}" alt="#" class="w-full h-full object-cover">
                                        <!-- cover -->
                                        <div class="w-full h-full flex flex-col justify-end p-3 absolute z-[2] top-0 left-0" style="background: linear-gradient(180deg, rgba(36, 82, 72, 0) 47.82%, #245248 96.96%);">
                                            <div class="w-full flex items-center justify-between 850max:justify-start">
                                                    <span class=" text-sm text-light font-medium 512max:text-xs">
                                                        {{ $suggestionHotel->title }}
                                                    </span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- content -->
                                    <div class="w-full px-4 pb-4 pt-4.5 flex items-center gap-[6px] 850max:flex-col-reverse 850max:px-[11px] 850max:pb-[9px] 850max:pt-[12px] 850max:gap-[14px]">
                                        <!-- button -->
                                        <form method="get" action="{{ route('hotelBooking.showDescription') }}">
                                            <input type="hidden" name="destination" value="{{ $suggestionHotel->city }}">
                                            <input type="hidden" name="hotel_id" value="{{ $suggestionHotel->hotel_id }}">
                                            <input type="hidden" name="dates" value="{{ $today->format('Y/m/d') }} تا {{ $tomorrow->format('Y/m/d') }}">
                                            <input type="hidden" name="rooms_data" value='[{"persons":1}]'>
                                            <input type="hidden" name="hotelId" value="{{ $suggestionHotel->hotel_id }}">
                                            <button class=" flex items-center justify-center flex-grow-[1] px-4 h-10 text-light text-xs font-bold text-center rounded-[6px] bg-green-600 transition-all duration-500 ease-out hover:bg-green-300 hover:transition-none 512max:text-[10px] 768nax:text-[10px] 768max:h-[30px] 850max:w-full">
                                                جزئیات و رزرو
                                            </button>
                                        </form>

                                        <div class="flex items-center gap-[6px] 850max:justify-between 850max:w-full">
                                            <div class="w-[150px] flex items-center gap-3 p-2 rounded-[6px] bg-neutral-50 512max:min-w-[79px] 512max:p-[6px] 512max:gap-[6px]">
                                                <svg class=" w-6 text-green-600 512max:w-[14px] 640max:w-[14px]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
                                                </svg>
                                                <span class=" text-neutral-700 text-sm 640max:text-[8px] text-nowrap">
                                                        <span class=" font-medium text-nowrap">
                                                            {{ \Morilog\Jalali\Jalalian::now()->format('%d %B') }}
                                                        </span>
                                                    </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- prevButton -->
                    <button onclick="readyToursSlider.slidePrev()" class="absolute top-0 bottom-0 right-0 my-auto z-[5] bg-[#F2F2F280] w-10 aspect-square rounded-full flex items-center justify-center backdrop-blur-md">
                        <svg class=" w-5 text-light" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                        </svg>
                    </button>
                    <!-- nextButton -->
                    <button onclick="readyToursSlider.slideNext()" class="absolute top-0 bottom-0 left-0 my-auto z-[5] bg-[#F2F2F280] w-10 aspect-square rounded-full flex items-center justify-center backdrop-blur-md">
                        <svg class=" w-5 text-light" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                        </svg>
                    </button>
                </div>
                <!-- items container in mobile -->
                <div class="w-full hidden flex-col items-center gap-[30px] 640max:flex">
                    <div class="w-full grid grid-cols-2 gap-y-5 gap-x-2">
                        <div class="w-full bg-light rounded-[6px] flex flex-col overflow-hidden drop-shadow-materialShadow3">
                            <!-- image -->
                            <div class="w-full relative h-[206px] 640max:h-[117px] 850max:h-[140px]">
                                <img src="{{ asset('public/images/slideImage.png') }}" alt="#" class="w-full h-full object-cover">
                                <!-- cover -->
                                <div class="w-full h-full flex flex-col justify-end p-3 absolute z-[2] top-0 left-0" style="background: linear-gradient(180deg, rgba(36, 82, 72, 0) 47.82%, #245248 96.96%);">
                                    <div class="w-full flex items-center justify-between 850max:justify-start">
                                        <span class=" text-sm text-light font-medium 512max:text-xs">
                                            روستای پلکانی ماسوله VIP
                                        </span>
                                        <span class=" flex items-center gap-[2px] 850max:hidden">
                                            <span class=" text-sm text-light font-bold">
                                                1,550,000
                                            </span>
                                            <span class=" text-[10px] text-light font-bold">
                                                تومان
                                            </span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <!-- content -->
                            <div class="w-full px-4 pb-4 pt-4.5 flex items-center gap-[6px] 850max:flex-col-reverse 850max:px-[11px] 850max:pb-[9px] 850max:pt-[12px] 850max:gap-[14px]">
                                <!-- button -->
                                <button class=" flex items-center justify-center flex-grow-[1] px-4 h-10 text-light text-xs font-bold text-center rounded-[6px] bg-green-600 transition-all duration-500 ease-out hover:bg-green-300 hover:transition-none 512max:text-[10px] 768nax:text-[10px] 768max:h-[30px] 850max:w-full">
                                    جزئیات و رزرو
                                </button>
                                <div class="flex items-center gap-[6px] 850max:justify-between 850max:w-full">
                                    <div class="w-[150px] flex items-center gap-3 p-2 rounded-[6px] bg-neutral-50 512max:min-w-[79px] 512max:p-[6px] 512max:gap-[6px]">
                                        <svg class=" w-6 text-green-600 512max:w-[14px] 640max:w-[14px]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
                                        </svg>
                                        <span class=" text-neutral-700 text-sm 640max:text-[8px] text-nowrap">
                                            <span class=" font-medium text-nowrap">
                                                12 بهمن
                                            </span>
                                            <span class=" font-normal text-nowrap">
                                                (1 روزه)
                                            </span>
                                        </span>
                                    </div>
                                    <span class=" hidden items-center gap-[2px] 850max:flex">
                                        <span class=" text-xs text-neutral-700 font-bold">
                                            1,550,000
                                        </span>
                                        <span class=" text-[6px] text-neutral-700 font-bold">
                                            تومان
                                        </span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="w-full bg-light rounded-[6px] flex flex-col overflow-hidden drop-shadow-materialShadow3">
                            <!-- image -->
                            <div class="w-full relative h-[206px] 640max:h-[117px] 850max:h-[140px]">
                                <img src="{{ asset('public/images/slideImage.png') }}" alt="#" class="w-full h-full object-cover">
                                <!-- cover -->
                                <div class="w-full h-full flex flex-col justify-end p-3 absolute z-[2] top-0 left-0" style="background: linear-gradient(180deg, rgba(36, 82, 72, 0) 47.82%, #245248 96.96%);">
                                    <div class="w-full flex items-center justify-between 850max:justify-start">
                                        <span class=" text-sm text-light font-medium 512max:text-xs">
                                            روستای پلکانی ماسوله VIP
                                        </span>
                                        <span class=" flex items-center gap-[2px] 850max:hidden">
                                            <span class=" text-sm text-light font-bold">
                                                1,550,000
                                            </span>
                                            <span class=" text-[10px] text-light font-bold">
                                                تومان
                                            </span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <!-- content -->
                            <div class="w-full px-4 pb-4 pt-4.5 flex items-center gap-[6px] 850max:flex-col-reverse 850max:px-[11px] 850max:pb-[9px] 850max:pt-[12px] 850max:gap-[14px]">
                                <!-- button -->
                                <button class=" flex items-center justify-center flex-grow-[1] px-4 h-10 text-light text-xs font-bold text-center rounded-[6px] bg-green-600 transition-all duration-500 ease-out hover:bg-green-300 hover:transition-none 512max:text-[10px] 768nax:text-[10px] 768max:h-[30px] 850max:w-full">
                                    جزئیات و رزرو
                                </button>
                                <div class="flex items-center gap-[6px] 850max:justify-between 850max:w-full">
                                    <div class="w-[150px] flex items-center gap-3 p-2 rounded-[6px] bg-neutral-50 512max:min-w-[79px] 512max:p-[6px] 512max:gap-[6px]">
                                        <svg class=" w-6 text-green-600 512max:w-[14px] 640max:w-[14px]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
                                        </svg>
                                        <span class=" text-neutral-700 text-sm 640max:text-[8px] text-nowrap">
                                            <span class=" font-medium text-nowrap">
                                                12 بهمن
                                            </span>
                                            <span class=" font-normal text-nowrap">
                                                (1 روزه)
                                            </span>
                                        </span>
                                    </div>
                                    <span class=" hidden items-center gap-[2px] 850max:flex">
                                        <span class=" text-xs text-neutral-700 font-bold">
                                            1,550,000
                                        </span>
                                        <span class=" text-[6px] text-neutral-700 font-bold">
                                            تومان
                                        </span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="w-full bg-light rounded-[6px] flex flex-col overflow-hidden drop-shadow-materialShadow3">
                            <!-- image -->
                            <div class="w-full relative h-[206px] 640max:h-[117px] 850max:h-[140px]">
                                <img src="{{ asset('public/images/slideImage.png') }}" alt="#" class="w-full h-full object-cover">
                                <!-- cover -->
                                <div class="w-full h-full flex flex-col justify-end p-3 absolute z-[2] top-0 left-0" style="background: linear-gradient(180deg, rgba(36, 82, 72, 0) 47.82%, #245248 96.96%);">
                                    <div class="w-full flex items-center justify-between 850max:justify-start">
                                        <span class=" text-sm text-light font-medium 512max:text-xs">
                                            روستای پلکانی ماسوله VIP
                                        </span>
                                        <span class=" flex items-center gap-[2px] 850max:hidden">
                                            <span class=" text-sm text-light font-bold">
                                                1,550,000
                                            </span>
                                            <span class=" text-[10px] text-light font-bold">
                                                تومان
                                            </span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <!-- content -->
                            <div class="w-full px-4 pb-4 pt-4.5 flex items-center gap-[6px] 850max:flex-col-reverse 850max:px-[11px] 850max:pb-[9px] 850max:pt-[12px] 850max:gap-[14px]">
                                <!-- button -->
                                <button class=" flex items-center justify-center flex-grow-[1] px-4 h-10 text-light text-xs font-bold text-center rounded-[6px] bg-green-600 transition-all duration-500 ease-out hover:bg-green-300 hover:transition-none 512max:text-[10px] 768nax:text-[10px] 768max:h-[30px] 850max:w-full">
                                    جزئیات و رزرو
                                </button>
                                <div class="flex items-center gap-[6px] 850max:justify-between 850max:w-full">
                                    <div class="w-[150px] flex items-center gap-3 p-2 rounded-[6px] bg-neutral-50 512max:min-w-[79px] 512max:p-[6px] 512max:gap-[6px]">
                                        <svg class=" w-6 text-green-600 512max:w-[14px] 640max:w-[14px]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
                                        </svg>
                                        <span class=" text-neutral-700 text-sm 640max:text-[8px] text-nowrap">
                                            <span class=" font-medium text-nowrap">
                                                12 بهمن
                                            </span>
                                            <span class=" font-normal text-nowrap">
                                                (1 روزه)
                                            </span>
                                        </span>
                                    </div>
                                    <span class=" hidden items-center gap-[2px] 850max:flex">
                                        <span class=" text-xs text-neutral-700 font-bold">
                                            1,550,000
                                        </span>
                                        <span class=" text-[6px] text-neutral-700 font-bold">
                                            تومان
                                        </span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="w-full bg-light rounded-[6px] flex flex-col overflow-hidden drop-shadow-materialShadow3">
                            <!-- image -->
                            <div class="w-full relative h-[206px] 640max:h-[117px] 850max:h-[140px]">
                                <img src="{{ asset('public/images/slideImage.png') }}" alt="#" class="w-full h-full object-cover">
                                <!-- cover -->
                                <div class="w-full h-full flex flex-col justify-end p-3 absolute z-[2] top-0 left-0" style="background: linear-gradient(180deg, rgba(36, 82, 72, 0) 47.82%, #245248 96.96%);">
                                    <div class="w-full flex items-center justify-between 850max:justify-start">
                                        <span class=" text-sm text-light font-medium 512max:text-xs">
                                            روستای پلکانی ماسوله VIP
                                        </span>
                                        <span class=" flex items-center gap-[2px] 850max:hidden">
                                            <span class=" text-sm text-light font-bold">
                                                1,550,000
                                            </span>
                                            <span class=" text-[10px] text-light font-bold">
                                                تومان
                                            </span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <!-- content -->
                            <div class="w-full px-4 pb-4 pt-4.5 flex items-center gap-[6px] 850max:flex-col-reverse 850max:px-[11px] 850max:pb-[9px] 850max:pt-[12px] 850max:gap-[14px]">
                                <!-- button -->
                                <button class=" flex items-center justify-center flex-grow-[1] px-4 h-10 text-light text-xs font-bold text-center rounded-[6px] bg-green-600 transition-all duration-500 ease-out hover:bg-green-300 hover:transition-none 512max:text-[10px] 768nax:text-[10px] 768max:h-[30px] 850max:w-full">
                                    جزئیات و رزرو
                                </button>
                                <div class="flex items-center gap-[6px] 850max:justify-between 850max:w-full">
                                    <div class="w-[150px] flex items-center gap-3 p-2 rounded-[6px] bg-neutral-50 512max:min-w-[79px] 512max:p-[6px] 512max:gap-[6px]">
                                        <svg class=" w-6 text-green-600 512max:w-[14px] 640max:w-[14px]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
                                        </svg>
                                        <span class=" text-neutral-700 text-sm 640max:text-[8px] text-nowrap">
                                            <span class=" font-medium text-nowrap">
                                                12 بهمن
                                            </span>
                                            <span class=" font-normal text-nowrap">
                                                (1 روزه)
                                            </span>
                                        </span>
                                    </div>
                                    <span class=" hidden items-center gap-[2px] 850max:flex">
                                        <span class=" text-xs text-neutral-700 font-bold">
                                            1,550,000
                                        </span>
                                        <span class=" text-[6px] text-neutral-700 font-bold">
                                            تومان
                                        </span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- view more button -->
                    <a href="#" class="rounded-[6px] flex items-center justify-center py-2 px-4 h-10 min-w-[148px] text-[14px] text-light font-bold                      bg-green-300 transition-all duration-400 ease-out hover:bg-green-100 hover:text-green-600">
                        مشاهده همه
                    </a>
                </div>
            </div>
        </section>
        @endif
        <section class=" w-full max-w-[1440px] px-[100px] flex flex-col gap-10 512max:px-[28px] 1024max:px-[36px] 1280max:px-[64px]">
            <div class="w-full flex flex-col gap-[57px]">
                <!-- top -->
                <div class="w-full flex items-center justify-between gap-[58px] 850max:flex-col 850max:gap-[63px]">
                    <!-- content -->
                    <div class="w-full flex-grow-[1] flex flex-col gap-10 850max:items-center">
                        <!-- title -->
                        <h6 class=" text-[24px] text-black font-medium 850max:text-green-600 640max:text-[20px]">
                            بخش همکاری با هتل‌ها و آژانس‌ها
                        </h6>
                        <!-- body -->
                        <div class="w-full">
                            <p class=" text-sm text-neutral-700 font-normal leading-[21px]">
                                همکاری هتل‌ها و آژانس‌های مسافرتی با سایت سفری نو فرصتی ایده‌آل برای افزایش دیده‌شدن و جذب مشتریان بیشتر است. این سایت به‌عنوان یک پلتفرم جامع رزرو بلیط هواپیما، قطار، هتل و تور، با ارائه خدمات یکپارچه و دسترسی آسان، امکان معرفی هتل‌ها و تورهای مسافرتی را به کاربران گسترده‌ای فراهم می‌کند.
                            </p>
                            <p class=" text-sm text-neutral-700 font-normal leading-[21px]">
                                مزایای این همکاری شامل نمایش بهتر در نتایج جستجو، مدیریت آسان رزروها، ارائه پیشنهادهای ویژه و تخفیف‌های هدفمند به مشتریان، و بهره‌مندی از تبلیغات گسترده در فضای دیجیتال است. این تعامل سازنده به هتل‌ها و آژانس‌ها کمک می‌کند تا بازاریابی خود را تقویت کنند و سهم بیشتری از بازار گردشگری را به دست آورند.
                            </p>
                        </div>
                    </div>
                    <!-- image -->
                    <img src="{{ asset('public/images/worldHotels.png') }}" alt="#" class='w-[556px] 1024max:w-[420px] 850max:w-full'>
                </div>
                <!-- bottom -->
                <form action="#" class="w-full flex flex-col items-center gap-10 p-7 rounded-xl bg-green-600 640max:px-5 640max:py-[30px] 640max:gap-11">
                    <span class="text-sm text-light font-normal text-center 640max:text-xs 640max:leading-[21px]">
                        اگر علاقه‌مند به شروع همکاری با سایت سفری نو هستید، لطفاً فرم زیر را با دقت تکمیل کنید. ما مشتاقانه منتظر ایجاد یک همکاری موفق و پایدار با شما هستیم.
                    </span>
                    <!-- inputs -->
                    <div class="w-full flex items-center justify-center gap-2 512max:gap-5 512max:flex-col">
                        <input placeholder="نام و نام خانوادگی" type="text" class="w-full h-10 max-w-[265px] bg-[#ffffffd1] text-xs text-black font-normal px-[26px] placeholder:text-neutral-400 rounded-[6px] focus:outline-none focus:bg-light 512max:max-w-[265px]">
                        <input placeholder="شماره موبایل" type="text" class="w-full h-10 max-w-[265px] bg-[#ffffffd1] text-xs text-black font-normal px-[26px] placeholder:text-neutral-400 rounded-[6px] focus:outline-none focus:bg-light 512max:max-w-[265px]">
                        <button class=" h-10 w-full max-w-[148px] rounded-md text-[14px] text-light font-medium font-farsi-medium bg-green-300 transition-all duration-400 ease-out hover:bg-green-100 hover:text-green-600 512max:max-w-[265px]">
                            ارسال
                        </button>
                    </div>
                </form>
            </div>
        </section>




                <section class=" w-full max-w-[1440px] px-[100px] flex flex-col gap-10 512max:px-[28px] 1024max:px-[36px] 1280max:px-[64px]">
            <!-- header -->
            <div class="w-full flex flex-col gap-[6px] 640max:items-center 640max:gap-2">
                <!-- top -->
                <div class="w-full flex items-baseline justify-between gap-4.5 640max:justify-center">
                    <h5 class=" text-[24px] text-green-600 font-bold flex-shrink-[0] 640max:text-[20px]">
                        مجله سفری نو
                    </h5>
                    <div class=" w-full h-[1px] flex-grow-[1] border-[1px] border-dashed border-green-300 640max:hidden"></div>
                    <a href="#" class="flex items-center text-green-300 text-sm font-normal flex-shrink-[0] 640max:hidden">
                        <span>
                            مشاهده همه
                        </span>
                        <svg class=" w-4 text-inherit" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                            <path fill-rule="evenodd" d="M7.72 12.53a.75.75 0 0 1 0-1.06l7.5-7.5a.75.75 0 1 1 1.06 1.06L9.31 12l6.97 6.97a.75.75 0 1 1-1.06 1.06l-7.5-7.5Z" clip-rule="evenodd" />
                        </svg>
                    </a>
                </div>
                <!-- bottom -->
                <span class=" text-sm text-neutral-400 font-normal 512max:text-[10px]">
با سفری نو همراه باشید تا به روز ترین اخبار سفر و اقامت مطلع شوید
                </span>
            </div>
            <!-- body -->
<div class="w-full grid grid-cols-3 gap-4.5 640max:grid-cols-1 1024max:grid-cols-2 1024max:gap-y-10">
    @foreach($blogs as $blog)
        <!-- item -->
        <div class="w-full websiteWeblogItem flex flex-col gap-[26px]">
            <img class="websiteWeblogItemImg w-full h-[218px] rounded-xl object-cover" src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}">
            <div class="w-full flex flex-col gap-5">
                <a href="{{ route('blog',$blog->id) }}" class="websiteWeblogItemTitle text-base text-green-600 font-bold whitespace-nowrap overflow-hidden text-ellipsis">
                    {{ $blog->title }}
                </a>
                <div style="    grid-template-columns: 84px 1fr;" class="w-full grid grid-cols-[54px_1fr] gap-4 items-center">
                    <!-- date -->
                    <div style="width: 84px; height: 54px" class="websiteWeblogItemِDate w-[54px] aspect-square rounded-[7px] flex flex-col items-center justify-center bg-green-600 text-center text-[18px] text-light font-bold leading-[18px]">
                        <span>
    {{ jdate($blog->created_at)->format('d') }}
</span>
                        <span>
    {{ jdate($blog->created_at)->format('%B') }}
</span>
                    </div>
                    <!-- text -->
                    <p class="w-full text-sm text-neutral-400 font-normal leading-[24.5px] line-clamp-2">
                        {{ Str::limit(preg_replace('/\s+/', ' ', trim(html_entity_decode(strip_tags($blog->content)))), 100) }}

                    </p>
                </div>
            </div>
        </div>
    @endforeach
</div>

        </section>










        <section class=" w-full max-w-[1440px] flex flex-col gap-10 pt-[75px] pb-[69px] pr-[100px] overflow-hidden 512max:px-7 1024max:px-[36px] 1280max:pr-[64px]" style="background: linear-gradient(270deg, #8CB398 47.83%, #245248 164.22%);">
            <!-- header -->
            <div class="w-full flex flex-col gap-4 pr-[152px] 1024max:items-center 1024max:px-[0px] 1280max:pr-[100px]">
                <!-- top -->
                <div class="w-full flex items-baseline justify-between gap-4.5 1024max:justify-center">
                    <h5 class=" text-[24px] text-light font-bold flex-shrink-[0] 640max:text-[20px]">
                        تجربه کاربران
                    </h5>
                </div>
                <!-- bottom -->
                <span class=" text-base text-light font-medium 1024max:text-center 768max:text-sm 640max:text-xs">
                    در این بخش بهترین پیشنهادات سفر سایت سفری نو را مشاهده می کنید
                </span>
            </div>
            <!-- body -->
            <div class="w-full flex flex-col gap-[76px]">
                <!-- slider -->
                <div class="w-full flex items-center gap-[92px] 1280max:gap-[42px]">
                    <!-- buttons -->
                    <div class="flex flex-col w-[60px] gap-[23px] 1024max:hidden">
                        <button onclick="userCommentsSlider.slidePrev()" class=" flex items-center justify-center w-[60px] aspect-square rounded-full text-light bg-green-600 transition-all duration-500 ease-out hover:bg-green-100 hover:text-green-600 hover:transition-none">
                            <svg class=" w-5 text-inherit" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                            </svg>
                        </button>
                        <button onclick="userCommentsSlider.slideNext()" class=" flex items-center justify-center w-[60px] aspect-square rounded-full bg-[#f2f2f270] text-light transition-all duration-500 ease-out hover:bg-green-100 hover:text-green-600 hover:transition-none">
                            <svg class=" w-5 text-inherit" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                            </svg>
                        </button>
                    </div>
                    <div class="w-full flex-grow-[1] pl-[100px] 1024max:pl-[0px] 1280max:pl-[64px]">
                        <div class="swiper userCommentsSlider w-full 1024max:overflow-visible">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="w-full flex flex-col gap-10 bg-light h-[286px] rounded-xl p-[38px] relative 640max:p-7">
                                        <!-- top -->
                                        <div class="w-full flex items-center gap-3">
                                            <!-- image -->
                                            <img src="{{ asset('public/images/banner.png') }}" alt="#" class=" w-[48px] aspect-square rounded-full object-cover 640max:w-9">
                                            <!-- name and stars -->
                                            <div class="flex flex-col gap-[6px] 640max:gap-1">
                                                <span class=" text-base text-black font-medium 768max:text-start 640max:text-xs">
                                                    علی رادمرد
                                                </span>
                                                <div class="flex items-center gap-[6px]">
                                                    <svg class=" w-3 text-green-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                                        <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd" />
                                                    </svg>
                                                    <svg class=" w-3 text-green-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                                        <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd" />
                                                    </svg>
                                                    <svg class=" w-3 text-green-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                                        <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd" />
                                                    </svg>
                                                    <svg class=" w-3 text-green-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                                        <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd" />
                                                    </svg>
                                                    <svg class=" w-3 text-green-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                                        <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd" />
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- content -->
                                        <p class=" w-full text-xs text-black font-normal leading-[21px] 512max:text-[9px]">
                                            رزرو تور از سفری نو تجربه‌ای عالی بود! انتخاب‌های متنوع، اطلاعات شفاف و قیمت‌های مناسب باعث شد بدون هیچ دغدغه‌ای تور دلخواهم رو پیدا کنم. همه چیز منظم و طبق برنامه بود، و از خدمات و پشتیبانی عالی‌شون کاملاً رضایت دارم.
                                        </p>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="w-full flex flex-col gap-10 bg-light h-[286px] rounded-xl p-[38px] relative 640max:p-7">
                                        <!-- top -->
                                        <div class="w-full flex items-center gap-3">
                                            <!-- image -->
                                            <img src="{{ asset('public/images/banner.png') }}" alt="#" class=" w-[48px] aspect-square rounded-full object-cover 640max:w-9">
                                            <!-- name and stars -->
                                            <div class="flex flex-col gap-[6px] 640max:gap-1">
                                                <span class=" text-base text-black font-medium 768max:text-start 640max:text-xs">
                                                    علی رادمرد
                                                </span>
                                                <div class="flex items-center gap-[6px]">
                                                    <svg class=" w-3 text-green-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                                        <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd" />
                                                    </svg>
                                                    <svg class=" w-3 text-green-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                                        <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd" />
                                                    </svg>
                                                    <svg class=" w-3 text-green-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                                        <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd" />
                                                    </svg>
                                                    <svg class=" w-3 text-green-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                                        <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd" />
                                                    </svg>
                                                    <svg class=" w-3 text-green-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                                        <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd" />
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- content -->
                                        <p class=" w-full text-xs text-black font-normal leading-[21px] 512max:text-[9px]">
                                            رزرو تور از سفری نو تجربه‌ای عالی بود! انتخاب‌های متنوع، اطلاعات شفاف و قیمت‌های مناسب باعث شد بدون هیچ دغدغه‌ای تور دلخواهم رو پیدا کنم. همه چیز منظم و طبق برنامه بود، و از خدمات و پشتیبانی عالی‌شون کاملاً رضایت دارم.
                                        </p>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="w-full flex flex-col gap-10 bg-light h-[286px] rounded-xl p-[38px] relative 640max:p-7">
                                        <!-- top -->
                                        <div class="w-full flex items-center gap-3">
                                            <!-- image -->
                                            <img src="{{ asset('public/images/banner.png') }}" alt="#" class=" w-[48px] aspect-square rounded-full object-cover 640max:w-9">
                                            <!-- name and stars -->
                                            <div class="flex flex-col gap-[6px] 640max:gap-1">
                                                <span class=" text-base text-black font-medium 768max:text-start 640max:text-xs">
                                                    علی رادمرد
                                                </span>
                                                <div class="flex items-center gap-[6px]">
                                                    <svg class=" w-3 text-green-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                                        <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd" />
                                                    </svg>
                                                    <svg class=" w-3 text-green-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                                        <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd" />
                                                    </svg>
                                                    <svg class=" w-3 text-green-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                                        <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd" />
                                                    </svg>
                                                    <svg class=" w-3 text-green-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                                        <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd" />
                                                    </svg>
                                                    <svg class=" w-3 text-green-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                                        <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd" />
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- content -->
                                        <p class=" w-full text-xs text-black font-normal leading-[21px] 512max:text-[9px]">
                                            رزرو تور از سفری نو تجربه‌ای عالی بود! انتخاب‌های متنوع، اطلاعات شفاف و قیمت‌های مناسب باعث شد بدون هیچ دغدغه‌ای تور دلخواهم رو پیدا کنم. همه چیز منظم و طبق برنامه بود، و از خدمات و پشتیبانی عالی‌شون کاملاً رضایت دارم.
                                        </p>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="w-full flex flex-col gap-10 bg-light h-[286px] rounded-xl p-[38px] relative 640max:p-7">
                                        <!-- top -->
                                        <div class="w-full flex items-center gap-3">
                                            <!-- image -->
                                            <img src="{{ asset('public/images/banner.png') }}" alt="#" class=" w-[48px] aspect-square rounded-full object-cover 640max:w-9">
                                            <!-- name and stars -->
                                            <div class="flex flex-col gap-[6px] 640max:gap-1">
                                                <span class=" text-base text-black font-medium 768max:text-start 640max:text-xs">
                                                    علی رادمرد
                                                </span>
                                                <div class="flex items-center gap-[6px]">
                                                    <svg class=" w-3 text-green-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                                        <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd" />
                                                    </svg>
                                                    <svg class=" w-3 text-green-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                                        <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd" />
                                                    </svg>
                                                    <svg class=" w-3 text-green-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                                        <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd" />
                                                    </svg>
                                                    <svg class=" w-3 text-green-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                                        <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd" />
                                                    </svg>
                                                    <svg class=" w-3 text-green-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                                        <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd" />
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- content -->
                                        <p class=" w-full text-xs text-black font-normal leading-[21px] 512max:text-[9px]">
                                            رزرو تور از سفری نو تجربه‌ای عالی بود! انتخاب‌های متنوع، اطلاعات شفاف و قیمت‌های مناسب باعث شد بدون هیچ دغدغه‌ای تور دلخواهم رو پیدا کنم. همه چیز منظم و طبق برنامه بود، و از خدمات و پشتیبانی عالی‌شون کاملاً رضایت دارم.
                                        </p>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="w-full flex flex-col gap-10 bg-light h-[286px] rounded-xl p-[38px] relative 640max:p-7">
                                        <!-- top -->
                                        <div class="w-full flex items-center gap-3">
                                            <!-- image -->
                                            <img src="{{ asset('public/images/banner.png') }}" alt="#" class=" w-[48px] aspect-square rounded-full object-cover 640max:w-9">
                                            <!-- name and stars -->
                                            <div class="flex flex-col gap-[6px] 640max:gap-1">
                                                <span class=" text-base text-black font-medium 768max:text-start 640max:text-xs">
                                                    علی رادمرد
                                                </span>
                                                <div class="flex items-center gap-[6px]">
                                                    <svg class=" w-3 text-green-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                                        <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd" />
                                                    </svg>
                                                    <svg class=" w-3 text-green-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                                        <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd" />
                                                    </svg>
                                                    <svg class=" w-3 text-green-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                                        <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd" />
                                                    </svg>
                                                    <svg class=" w-3 text-green-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                                        <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd" />
                                                    </svg>
                                                    <svg class=" w-3 text-green-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                                        <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd" />
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- content -->
                                        <p class=" w-full text-xs text-black font-normal leading-[21px] 512max:text-[9px]">
                                            رزرو تور از سفری نو تجربه‌ای عالی بود! انتخاب‌های متنوع، اطلاعات شفاف و قیمت‌های مناسب باعث شد بدون هیچ دغدغه‌ای تور دلخواهم رو پیدا کنم. همه چیز منظم و طبق برنامه بود، و از خدمات و پشتیبانی عالی‌شون کاملاً رضایت دارم.
                                        </p>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="w-full flex flex-col gap-10 bg-light h-[286px] rounded-xl p-[38px] relative 640max:p-7">
                                        <!-- top -->
                                        <div class="w-full flex items-center gap-3">
                                            <!-- image -->
                                            <img src="{{ asset('public/images/banner.png') }}" alt="#" class=" w-[48px] aspect-square rounded-full object-cover 640max:w-9">
                                            <!-- name and stars -->
                                            <div class="flex flex-col gap-[6px] 640max:gap-1">
                                                <span class=" text-base text-black font-medium 768max:text-start 640max:text-xs">
                                                    علی رادمرد
                                                </span>
                                                <div class="flex items-center gap-[6px]">
                                                    <svg class=" w-3 text-green-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                                        <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd" />
                                                    </svg>
                                                    <svg class=" w-3 text-green-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                                        <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd" />
                                                    </svg>
                                                    <svg class=" w-3 text-green-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                                        <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd" />
                                                    </svg>
                                                    <svg class=" w-3 text-green-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                                        <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd" />
                                                    </svg>
                                                    <svg class=" w-3 text-green-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                                        <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd" />
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- content -->
                                        <p class=" w-full text-xs text-black font-normal leading-[21px] 512max:text-[9px]">
                                            رزرو تور از سفری نو تجربه‌ای عالی بود! انتخاب‌های متنوع، اطلاعات شفاف و قیمت‌های مناسب باعث شد بدون هیچ دغدغه‌ای تور دلخواهم رو پیدا کنم. همه چیز منظم و طبق برنامه بود، و از خدمات و پشتیبانی عالی‌شون کاملاً رضایت دارم.
                                        </p>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="w-full flex flex-col gap-10 bg-light h-[286px] rounded-xl p-[38px] relative 640max:p-7">
                                        <!-- top -->
                                        <div class="w-full flex items-center gap-3">
                                            <!-- image -->
                                            <img src="{{ asset('public/images/banner.png') }}" alt="#" class=" w-[48px] aspect-square rounded-full object-cover 640max:w-9">
                                            <!-- name and stars -->
                                            <div class="flex flex-col gap-[6px] 640max:gap-1">
                                                <span class=" text-base text-black font-medium 768max:text-start 640max:text-xs">
                                                    علی رادمرد
                                                </span>
                                                <div class="flex items-center gap-[6px]">
                                                    <svg class=" w-3 text-green-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                                        <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd" />
                                                    </svg>
                                                    <svg class=" w-3 text-green-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                                        <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd" />
                                                    </svg>
                                                    <svg class=" w-3 text-green-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                                        <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd" />
                                                    </svg>
                                                    <svg class=" w-3 text-green-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                                        <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd" />
                                                    </svg>
                                                    <svg class=" w-3 text-green-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                                        <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd" />
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- content -->
                                        <p class=" w-full text-xs text-black font-normal leading-[21px] 512max:text-[9px]">
                                            رزرو تور از سفری نو تجربه‌ای عالی بود! انتخاب‌های متنوع، اطلاعات شفاف و قیمت‌های مناسب باعث شد بدون هیچ دغدغه‌ای تور دلخواهم رو پیدا کنم. همه چیز منظم و طبق برنامه بود، و از خدمات و پشتیبانی عالی‌شون کاملاً رضایت دارم.
                                        </p>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="w-full flex flex-col gap-10 bg-light h-[286px] rounded-xl p-[38px] relative 640max:p-7">
                                        <!-- top -->
                                        <div class="w-full flex items-center gap-3">
                                            <!-- image -->
                                            <img src="{{ asset('public/images/banner.png') }}" alt="#" class=" w-[48px] aspect-square rounded-full object-cover 640max:w-9">
                                            <!-- name and stars -->
                                            <div class="flex flex-col gap-[6px] 640max:gap-1">
                                                <span class=" text-base text-black font-medium 768max:text-start 640max:text-xs">
                                                    علی رادمرد
                                                </span>
                                                <div class="flex items-center gap-[6px]">
                                                    <svg class=" w-3 text-green-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                                        <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd" />
                                                    </svg>
                                                    <svg class=" w-3 text-green-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                                        <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd" />
                                                    </svg>
                                                    <svg class=" w-3 text-green-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                                        <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd" />
                                                    </svg>
                                                    <svg class=" w-3 text-green-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                                        <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd" />
                                                    </svg>
                                                    <svg class=" w-3 text-green-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                                        <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd" />
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- content -->
                                        <p class=" w-full text-xs text-black font-normal leading-[21px] 512max:text-[9px]">
                                            رزرو تور از سفری نو تجربه‌ای عالی بود! انتخاب‌های متنوع، اطلاعات شفاف و قیمت‌های مناسب باعث شد بدون هیچ دغدغه‌ای تور دلخواهم رو پیدا کنم. همه چیز منظم و طبق برنامه بود، و از خدمات و پشتیبانی عالی‌شون کاملاً رضایت دارم.
                                        </p>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="w-full flex flex-col gap-10 bg-light h-[286px] rounded-xl p-[38px] relative 640max:p-7">
                                        <!-- top -->
                                        <div class="w-full flex items-center gap-3">
                                            <!-- image -->
                                            <img src="{{ asset('public/images/banner.png') }}" alt="#" class=" w-[48px] aspect-square rounded-full object-cover 640max:w-9">
                                            <!-- name and stars -->
                                            <div class="flex flex-col gap-[6px] 640max:gap-1">
                                                <span class=" text-base text-black font-medium 768max:text-start 640max:text-xs">
                                                    علی رادمرد
                                                </span>
                                                <div class="flex items-center gap-[6px]">
                                                    <svg class=" w-3 text-green-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                                        <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd" />
                                                    </svg>
                                                    <svg class=" w-3 text-green-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                                        <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd" />
                                                    </svg>
                                                    <svg class=" w-3 text-green-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                                        <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd" />
                                                    </svg>
                                                    <svg class=" w-3 text-green-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                                        <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd" />
                                                    </svg>
                                                    <svg class=" w-3 text-green-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                                        <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd" />
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- content -->
                                        <p class=" w-full text-xs text-black font-normal leading-[21px] 512max:text-[9px]">
                                            رزرو تور از سفری نو تجربه‌ای عالی بود! انتخاب‌های متنوع، اطلاعات شفاف و قیمت‌های مناسب باعث شد بدون هیچ دغدغه‌ای تور دلخواهم رو پیدا کنم. همه چیز منظم و طبق برنامه بود، و از خدمات و پشتیبانی عالی‌شون کاملاً رضایت دارم.
                                        </p>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="w-full flex flex-col gap-10 bg-light h-[286px] rounded-xl p-[38px] relative 640max:p-7">
                                        <!-- top -->
                                        <div class="w-full flex items-center gap-3">
                                            <!-- image -->
                                            <img src="{{ asset('public/images/banner.png') }}" alt="#" class=" w-[48px] aspect-square rounded-full object-cover 640max:w-9">
                                            <!-- name and stars -->
                                            <div class="flex flex-col gap-[6px] 640max:gap-1">
                                                <span class=" text-base text-black font-medium 768max:text-start 640max:text-xs">
                                                    علی رادمرد
                                                </span>
                                                <div class="flex items-center gap-[6px]">
                                                    <svg class=" w-3 text-green-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                                        <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd" />
                                                    </svg>
                                                    <svg class=" w-3 text-green-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                                        <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd" />
                                                    </svg>
                                                    <svg class=" w-3 text-green-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                                        <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd" />
                                                    </svg>
                                                    <svg class=" w-3 text-green-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                                        <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd" />
                                                    </svg>
                                                    <svg class=" w-3 text-green-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                                        <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd" />
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- content -->
                                        <p class=" w-full text-xs text-black font-normal leading-[21px] 512max:text-[9px]">
                                            رزرو تور از سفری نو تجربه‌ای عالی بود! انتخاب‌های متنوع، اطلاعات شفاف و قیمت‌های مناسب باعث شد بدون هیچ دغدغه‌ای تور دلخواهم رو پیدا کنم. همه چیز منظم و طبق برنامه بود، و از خدمات و پشتیبانی عالی‌شون کاملاً رضایت دارم.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <button onclick="userCommentsSlider.slidePrev()" class=" absolute z-[3] top-0 bottom-0 right-0 my-auto hidden items-center justify-center w-[40px] h-[40px] aspect-square rounded-full text-light bg-green-600 transition-all duration-500 ease-out hover:bg-green-100 hover:text-green-600 hover:transition-none 1024max:flex">
                                <svg class=" w-5 text-inherit" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                                </svg>
                            </button>
                            <button onclick="userCommentsSlider.slideNext()" class=" absolute z-[3] top-0 bottom-0 left-0 my-auto hidden items-center justify-center w-[40px] h-[40px] aspect-square rounded-full text-light bg-green-600 transition-all duration-500 ease-out hover:bg-green-100 hover:text-green-600 hover:transition-none 1024max:flex">
                                <svg class=" w-5 text-inherit" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
                <!-- bottom -->
                <div class="w-full flex items-center pr-[152px] pl-[100px] gap-4.5 justify-between 1024max:flex-col 1024max:gap-5 1024max:pr-[0px] 1024max:pl-[0px] 1280max:pl-[64px] 1280max:pr-[100px]">
                    <p class=" text-[18px] text-light font-bold drop-shadow-txtLightShadow 1024max:text-center 1024max:text-base 768max:text-sm">
                        نظرات شما برای ما ارزشمند است! لطفا نظر خود را ثبت کنید و به ما کمک کنید تا بهتر خدمت‌رسانی کنیم.
                    </p>
                    <a href="#" class=" w-full max-w-[200px] h-[60px] flex items-center justify-center px-4 text-light text-[18px] font-medium text-center rounded-[6px] bg-green-600 transition-all duration-500 ease-out hover:bg-green-300 hover:transition-none 768max:text-sm 768max:max-w-[148px] 1024max:text-base 1024max:h-10">
                        جزئیات و رزرو
                    </a>
                </div>
            </div>
        </section>
        {{--<section class=" w-full max-w-[1440px] px-[100px] flex flex-col gap-10 512max:px-[28px] 1024max:px-[36px] 1280max:px-[64px]">
            <!-- header -->
            <div class="w-full flex flex-col gap-[6px] 640max:items-center 640max:gap-2">
                <!-- top -->
                <div class="w-full flex items-baseline justify-between gap-4.5 640max:justify-center">
                    <h5 class=" text-[24px] text-green-600 font-bold flex-shrink-[0] 640max:text-[20px]">
                        وبلاگ
                    </h5>
                    <div class=" w-full h-[1px] flex-grow-[1] border-[1px] border-dashed border-green-300 640max:hidden"></div>
                    <a href="#" class="flex items-center text-green-300 text-sm font-normal flex-shrink-[0] 640max:hidden">
                        <span>
                            مشاهده همه
                        </span>
                        <svg class=" w-4 text-inherit" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                            <path fill-rule="evenodd" d="M7.72 12.53a.75.75 0 0 1 0-1.06l7.5-7.5a.75.75 0 1 1 1.06 1.06L9.31 12l6.97 6.97a.75.75 0 1 1-1.06 1.06l-7.5-7.5Z" clip-rule="evenodd" />
                        </svg>
                    </a>
                </div>
                <!-- bottom -->
                <span class=" text-sm text-neutral-400 font-normal 512max:text-[10px]">
                    در این بخش بهترین پیشنهادات سفر سایت سفری نو را مشاهده می کنید
                </span>
            </div>
            <!-- body -->
            <div class="w-full grid grid-cols-3 gap-4.5 640max:grid-cols-1 1024max:grid-cols-2 1024max:gap-y-10">
                <!-- item -->
                <div class="w-full websiteWeblogItem flex flex-col gap-[26px]">
                    <img class="websiteWeblogItemImg w-full h-[218px] rounded-xl object-cover" src="{{ asset('public/images/weblog1.jpg') }}" alt="#">
                    <div class="w-full flex flex-col gap-5">
                        <a href="#" class="websiteWeblogItemTitle text-base text-green-600 font-bold whitespace-nowrap overflow-hidden text-ellipsis">
                            ۱۰ مقصد بی‌نظیر برای طبیعت‌گردی در ایران: تجربه‌ای به یادماندنی
                        </a>
                        <div class="w-full grid grid-cols-[54px_1fr] gap-4 items-center">
                            <!-- date -->
                            <div class="websiteWeblogItemِDate w-[54px] aspect-square rounded-[7px] flex flex-col items-center justify-center bg-green-600 text-center text-[18px] text-light font-bold leading-[18px]">
                                <span>
                                    2
                                </span>
                                <span>
                                    دی
                                </span>
                            </div>
                            <!-- text -->
                            <p class="websiteWeblogItemِBodyText w-full text-sm text-neutral-400 font-normal leading-[24.5px] line-clamp-2">
                                ایران با طبیعت متنوع و بکر خود، مقصدی فوق‌العاده برای عاشقان طبیعت‌گردی است. در این مقاله، ۱۰ مکان شگفت‌انگیز...
                            </p>
                        </div>
                    </div>
                </div>
                <!-- item -->
                <div class="w-full websiteWeblogItem flex flex-col gap-[26px]">
                    <img class="websiteWeblogItemImg w-full h-[218px] rounded-xl object-cover" src="{{ asset('public/images/weblog2.jpg') }}" alt="#">
                    <div class="w-full flex flex-col gap-5">
                        <a href="#" class="websiteWeblogItemTitle text-base text-green-600 font-bold whitespace-nowrap overflow-hidden text-ellipsis">
                            ۱۰ مقصد بی‌نظیر برای طبیعت‌گردی در ایران: تجربه‌ای به یادماندنی
                        </a>
                        <div class="w-full grid grid-cols-[54px_1fr] gap-4 items-center">
                            <!-- date -->
                            <div class="websiteWeblogItemِDate w-[54px] aspect-square rounded-[7px] flex flex-col items-center justify-center bg-green-600 text-center text-[18px] text-light font-bold leading-[18px]">
                                <span>
                                    2
                                </span>
                                <span>
                                    دی
                                </span>
                            </div>
                            <!-- text -->
                            <p class="w-full text-sm text-neutral-400 font-normal leading-[24.5px] line-clamp-2">
                                ایران با طبیعت متنوع و بکر خود، مقصدی فوق‌العاده برای عاشقان طبیعت‌گردی است. در این مقاله، ۱۰ مکان شگفت‌انگیز...
                            </p>
                        </div>
                    </div>
                </div>
                <!-- item -->
                <div class="w-full websiteWeblogItem flex flex-col gap-[26px]">
                    <img class="websiteWeblogItemImg w-full h-[218px] rounded-xl object-cover" src="{{ asset('public/images/weblog3.jpg') }}" alt="#">
                    <div class="w-full flex flex-col gap-5">
                        <a href="#" class="websiteWeblogItemTitle text-base text-green-600 font-bold whitespace-nowrap overflow-hidden text-ellipsis">
                            ۱۰ مقصد بی‌نظیر برای طبیعت‌گردی در ایران: تجربه‌ای به یادماندنی
                        </a>
                        <div class="w-full grid grid-cols-[54px_1fr] gap-4 items-center">
                            <!-- date -->
                            <div class="websiteWeblogItemِDate w-[54px] aspect-square rounded-[7px] flex flex-col items-center justify-center bg-green-600 text-center text-[18px] text-light font-bold leading-[18px]">
                                <span>
                                    2
                                </span>
                                <span>
                                    دی
                                </span>
                            </div>
                            <!-- text -->
                            <p class="w-full text-sm text-neutral-400 font-normal leading-[24.5px] line-clamp-2">
                                ایران با طبیعت متنوع و بکر خود، مقصدی فوق‌العاده برای عاشقان طبیعت‌گردی است. در این مقاله، ۱۰ مکان شگفت‌انگیز...
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>--}}
        <section class=" w-full max-w-[1440px] px-[100px] 768max:px-[0px] 1024max:px-[36px] 1280max:px-[64px]">
            <div class="w-full overflow-hidden flex flex-col h-[200px] bg-green-600 rounded-xl relative 768max:h-[370px]">
                <!-- content -->
                <div class=" absolute z-[3] top-0 left-0 w-full h-full px-[60px] py-[63px] flex flex-col justify-center 768max:items-center 768max:justify-start 768max:py-10 768max:px-[51px]">
                    <p class=" text-xl text-light font-normal leading-[42px] drop-shadow-txtLightShadow max-w-[528px] 768max:text-center 768max:flex 768max:flex-col 768max:items-center 768max:gap-5">
                        <span class=" text-[24px] text-light font-extrabold font-farsi-extraBold 640max:text-[20px] 768max:text-center 768max:block">
                            سفر راحت و بی‌دغدغه با سفری نو!
                        </span>
                        <span class=" 768max:block 640max:text-base">
                            بهترین قیمت‌ها برای هتل، بلیط هواپیما و قطار در سایت ما منتظر شماست.
                        </span>
                    </p>
                </div>
                <!-- cover -->
                <img class=" absolute z-[2] left-3 top-0 bottom-0 w-[654px] my-auto object-cover 768max:w-[120%] 768max:right-0 768max:left-auto 768max:top-[50%] 768max:bottom-auto" src="{{ asset('public/images/sectionCover.png') }}" alt="#">
            </div>
        </section>
    </main>

    <script src="{{ asset('src/user-part-scripts/script.js') }}"></script>
    <link href="https://bgsrb.github.io/flatpickr-jalali/dist/flatpickr.min.css" rel="stylesheet">
    <script src="https://bgsrb.github.io/flatpickr-jalali/examples/jalali/jdate.min.js"></script>
    <script>window.Date=window.JDate;</script>
    <script src="https://bgsrb.github.io/flatpickr-jalali/dist/flatpickr.min.js"></script>
    <script src="https://bgsrb.github.io/flatpickr-jalali/dist/plugins/rangePlugin.js"></script>
    <script src="https://bgsrb.github.io/flatpickr-jalali/dist/l10n/fa.js"></script>

    <style>
        .suggestions-list {
            list-style: none;
            padding: 0;
            margin: 0;
            border: 1px solid #e0e0e0;
            border-radius: 6px;
            background-color: #fff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            max-height: 200px;
            overflow-y: auto;
        }

        .destination-item {
            display: flex;
            align-items: center;
            border: 0 solid rgba(0, 0, 0, .12);
            border-top-width: 1px;
            height: 56px;
            margin: 0 .875rem;
            font-size: .875rem;
            cursor: pointer;
        }
        .destination-item:hover {
            background-color: #f2f9ff;
        }
        .suggestions-list .destination-item:first-child {
            border-top: 0;
        }
        .suggestions-list li:hover {
            background-color: #f5f5f5;
        }

        .suggestions-list li.no-results {
            color: #757575;
            cursor: default;
        }

        .suggestions-list li.no-results:hover {
            background-color: transparent;
        }
    </style>

    <script>
        function changeDestination(value,id){
            document.getElementById('destination').value = value;
            document.getElementById('hotel_id').value = id;
        }

        function toggleSuggestion(dis) {
            const suggestionsList = document.getElementById('suggestions-list');
            suggestionsList.style.display = dis;
        }
        // تابع برای دریافت پیشنهادات از API
        function fetchSuggestions(destination) {
            const suggestionsList = document.getElementById('suggestions-list');
            suggestionsList.style.display = 'block';

            // اگر کمتر از ۲ کاراکتر وارد شده باشد، لیست را خالی کنید
            if (destination.length < 2) {
                suggestionsList.innerHTML = '';
                return;
            }

            // درخواست به API
            fetch(`/api/hotelSearchDestination/${destination}`)
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    // نمایش داده‌ها در صفحه
                    displaySuggestions(data.hotels,data.cities);
                })
                .catch(error => {
                    console.error('Error fetching suggestions:', error);
                    suggestionsList.innerHTML = '<div class="flex items-center justify-center gap-2" style="padding: 1rem;font-weight: 400;line-height: 180%; font-size: 1.2rem">خطا در دریافت داده‌ها</div>';
                });
        }

        // تابع برای نمایش پیشنهادات در صفحه
        function displaySuggestions(hotels,cities) {
            const suggestionsList = document.getElementById('suggestions-list');

            // اگر داده‌ای وجود نداشته باشد
            if (hotels.length === 0 && cities.length === 0) {
                suggestionsList.innerHTML = '<div class="flex items-center justify-center gap-2" style="padding: 1rem;font-weight: 400;line-height: 180%; font-size: 1.2rem"><svg style="margin-top: 3px" viewBox="0 0 24 24" width="16px" height="16px" fill="currentColor"><path d="M12 1.5c5.799 0 10.5 4.701 10.5 10.5S17.799 22.5 12 22.5 1.5 17.799 1.5 12 6.201 1.5 12 1.5ZM12 3a9 9 0 1 0 0 18 9 9 0 0 0 0-18Zm0 6a.75.75 0 0 1 .745.663l.005.087v7.5a.75.75 0 0 1-1.495.087l-.005-.087v-7.5A.75.75 0 0 1 12 9Zm0-3a.75.75 0 0 1 .745.663l.005.087v.75a.75.75 0 0 1-1.495.087L11.25 7.5v-.75A.75.75 0 0 1 12 6Z"></path></svg> نتیجه‌ای یافت نشد </div>';
                return;
            }

            // ایجاد لیست پیشنهادات
            suggestionsList.innerHTML = cities
                .map(suggestion => `
<span class="destination-item" onclick="changeDestination('${suggestion.city}',0)">
<svg viewBox="0 0 24 24" width="24px" height="24px" fill="currentColor" class="ml-2 shrink-0"><path d="M11.28 1.534c4.437-.419 8.22 3.11 8.22 7.59 0 4.053-1.89 7.941-6.398 12.888-.593.65-1.62.651-2.212 0-4.219-4.628-6.14-8.33-6.374-12.09-.263-4.237 2.701-8.005 6.765-8.388ZM18 9.124c0-3.604-3.031-6.432-6.579-6.097C8.192 3.332 5.8 6.374 6.013 9.83c.21 3.37 1.977 6.775 5.982 11.17l.531-.59c3.803-4.306 5.402-7.66 5.471-11.054L18 9.124ZM12 5.25a3.75 3.75 0 1 1 0 7.5 3.75 3.75 0 0 1 0-7.5Zm0 1.5a2.25 2.25 0 1 0 0 4.5 2.25 2.25 0 0 0 0-4.5Z" fill-rule="evenodd"></path></svg>
<span>
<span class="font-medium">${suggestion.city}</span>
<span class="block text-1">${suggestion.province}</span>
</span>
</span>
`)

            // ایجاد لیست پیشنهادات
            suggestionsList.innerHTML += hotels
                .map(suggestion => `
<span class="destination-item" onclick="changeDestination('${suggestion.title}','${suggestion.id}')">
<svg viewBox="0 0 24 24" width="24px" height="24px" fill="currentColor" class="ml-2"><path d="M14.655 3.75a.675.675 0 0 1 .67.59l.005.085h2.595A2.175 2.175 0 0 1 20.1 6.6v12.067a1.425 1.425 0 0 1-1.425 1.425H5.107c-.75 0-1.357-.607-1.357-1.357v-7.966a2.228 2.228 0 0 1 2.047-2.242v-.015a.675.675 0 0 1 1.345-.085l.005.085v.007h2.738v-1.92a2.175 2.175 0 0 1 2.047-2.17v-.004a.675.675 0 0 1 1.345-.085l.006.085h.697a.674.674 0 0 1 .675-.675Zm-4.77 6.12H5.97a.877.877 0 0 0-.545.196l-.073.067a.879.879 0 0 0-.251.63v7.972c0 .003.003.007.007.007h4.778V9.87h-.001Zm2.712-4.096h-.537a.825.825 0 0 0-.825.826v12.142h2.063v-1.305a1.425 1.425 0 0 1 1.313-1.42l.111-.005h.548c.788 0 1.425.638 1.425 1.425v1.304l1.98.001a.07.07 0 0 0 .052-.022l.017-.023.006-.03V6.6a.825.825 0 0 0-.825-.825h-3.27l-.01-.001h-2.048Zm2.673 11.588h-.547a.075.075 0 0 0-.075.075v1.304h.697v-1.304a.075.075 0 0 0-.023-.052l-.023-.017-.029-.006Zm-6.758-.99a.675.675 0 0 1 .085 1.345l-.085.005h-2.04a.676.676 0 0 1-.084-1.345l.084-.005h2.04Zm0-2.76a.675.675 0 0 1 .085 1.345l-.085.005h-2.04a.676.676 0 0 1-.084-1.345l.084-.005h2.04Zm5.46-.322a.675.675 0 0 1 .085 1.345l-.085.005h-1.364a.676.676 0 0 1-.085-1.345l.085-.005h1.364Zm3.406 0a.675.675 0 0 1 .084 1.345l-.084.005h-1.366a.676.676 0 0 1-.084-1.345l.084-.005h1.366Zm-8.866-2.438a.675.675 0 0 1 .085 1.345l-.085.005h-2.04a.676.676 0 0 1-.084-1.345l.084-.005h2.04Zm5.46-.292a.675.675 0 0 1 .085 1.345l-.085.005h-1.364a.676.676 0 0 1-.085-1.345l.085-.005h1.364Zm3.406 0a.675.675 0 0 1 .084 1.345l-.084.005h-1.366a.676.676 0 0 1-.084-1.345l.084-.005h1.366Zm-3.405-2.723a.675.675 0 0 1 .084 1.345l-.085.005h-1.364a.675.675 0 0 1-.085-1.344l.085-.006h1.364Zm3.405 0a.675.675 0 0 1 .084 1.345l-.084.005h-1.366a.675.675 0 0 1-.084-1.344l.084-.006h1.366Z" fill-rule="evenodd"></path></svg>
<span>
<span class="font-medium">${suggestion.title}</span>
<span class="block text-1">${suggestion.province}</span>
</span>
</span>
`)
                .join('');
        }
    </script>

    <script>
        flatpickr("#dateRange", {
            mode: 'range',
            locale: {
                ...flatpickr.l10ns.fa,
                firstDayOfWeek: 6,
            },
            calendar: "jalali",
            dateFormat: 'Y/m/d',
        });
        function convertDateRange(dateRange) {
            const [startDate, endDate] = dateRange.split(' to ');
            document.getElementById('dateRange').value = `${startDate} تا ${endDate}`;
        }
    </script>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('passengerModal', () => ({
                isPassengerModalOpen: false,
                rooms: [{ persons: 1 }],

                get totalPersons() {
                    return this.rooms.reduce((sum, room) => sum + room.persons, 0);
                },

                get passengerText() {
                    const personsText = this.totalPersons === 1 ? '1 نفر' : `${this.totalPersons} نفر`;
                    return `${personsText}`;
                },

                get roomsJSON() {
                    return JSON.stringify(this.rooms); // تبدیل اطلاعات اتاق‌ها به JSON
                },

                addRoom() {
                    this.rooms.push({ persons: 1});
                },

                removeRoom(index) {
                    if (this.rooms.length > 1) {
                        this.rooms.splice(index, 1);
                    }
                },

                incrementPersons(index) {
                    this.rooms[index].persons++;
                },

                decrementPersons(index) {
                    if (this.rooms[index].persons > 1) {
                        this.rooms[index].persons--;
                    }
                },
            }));
        });
    </script>
@endsection

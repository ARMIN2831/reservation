<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ورود و ثبت نام</title>
    <!-- Tailwind CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Alpine.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Custom Styles -->
    <style>
        .fade-enter-active, .fade-leave-active {
            transition: opacity 0.3s ease, transform 0.3s ease;
        }
        .fade-enter-from, .fade-leave-to {
            opacity: 0;
            transform: translateY(10px);
        }
        .slide-enter-active, .slide-leave-active {
            transition: opacity 0.3s ease, transform 0.3s ease;
        }
        .slide-enter-from {
            opacity: 0;
            transform: translateX(20px);
        }
        .slide-leave-to {
            opacity: 0;
            transform: translateX(-20px);
        }
        .otp-input {
            width: 3rem;
            height: 3rem;
            text-align: center;
            font-size: 1.2rem;
            margin: 0 0.25rem;
        }
    </style>
</head>
<body class="bg-gradient-to-r from-blue-50 to-purple-50" x-data="loginApp()">
<div class="min-h-screen flex items-center justify-center p-4">
    <div class="bg-white p-8 rounded-2xl shadow-2xl w-full max-w-md transform transition-all duration-300 hover:shadow-3xl">
        <!-- Tabs -->
        <div class="flex justify-center mb-6">
            <button
                @click="switchTab('login')"
                :class="{ 'bg-gradient-to-r from-blue-500 to-purple-500 text-white shadow-lg': activeTab === 'login', 'bg-gray-100 text-gray-700 hover:bg-gray-200': activeTab !== 'login' }"
                class="px-6 py-2 rounded-l-full focus:outline-none transition-all duration-300"
            >
                ورود
            </button>
        </div>

        <!-- Login Form -->
        <div x-show="activeTab === 'login'" x-transition:enter="fade-enter-active">
            <!-- Step 1: Mobile -->
            <div x-show="loginStep === 1" x-transition:enter="slide-enter-active">
                <h2 class="text-center text-xl font-bold text-gray-800 mb-4">ورود با شماره موبایل</h2>
                <label for="login-mobile" class="block text-sm font-medium text-gray-700">شماره موبایل</label>
                <div class="mt-1 relative rounded-md shadow-sm">
                    <input
                        type="text"
                        id="login-mobile"
                        x-model="loginMobile"
                        class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300"
                        placeholder="09123456789"
                    >
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-mobile-alt text-gray-400"></i>
                    </div>
                </div>
                <button
                    @click="sendOTP"
                    :disabled="isSendingOTP"
                    class="mt-4 w-full bg-gradient-to-r from-blue-500 to-purple-500 text-white py-2 rounded-md hover:from-blue-600 hover:to-purple-600 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all duration-300 disabled:opacity-50"
                >
                    <span x-show="!isSendingOTP">دریافت کد تایید</span>
                    <span x-show="isSendingOTP">در حال ارسال...</span>
                </button>
            </div>

            <!-- Step 2: OTP Verification -->
            <div x-show="loginStep === 2" x-transition:enter="slide-enter-active">
                <h2 class="text-center text-xl font-bold text-gray-800 mb-4">تایید شماره موبایل</h2>
                <p class="text-sm text-gray-600 mb-4">کد ۵ رقمی ارسال شده به شماره <span x-text="loginMobile" class="font-semibold"></span> را وارد کنید</p>

                <div style="direction: ltr" class="flex justify-center space-x-2 mb-6">
                    <template x-for="(digit, index) in otpDigits" :key="index">
                        <input
                            type="text"
                            maxlength="1"
                            x-model="otpDigits[index]"
                            @input="moveToNext(index, $event)"
                            @keydown.delete="moveToPrev(index, $event)"
                            class="otp-input border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        >
                    </template>
                </div>

                <div class="text-center mb-4">
                    <button
                        @click="resendOTP"
                        :disabled="resendDisabled"
                        class="text-blue-500 hover:text-blue-700 text-sm disabled:text-gray-400"
                    >
                        <span x-show="!resendDisabled">ارسال مجدد کد</span>
                        <span x-show="resendDisabled">ارسال مجدد (<span x-text="countdown"></span> ثانیه)</span>
                    </button>
                </div>

                <button
                    @click="verifyOTP"
                    :disabled="isVerifying"
                    class="w-full bg-gradient-to-r from-blue-500 to-purple-500 text-white py-2 rounded-md hover:from-blue-600 hover:to-purple-600 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all duration-300 disabled:opacity-50"
                >
                    <span x-show="!isVerifying">تایید و ادامه</span>
                    <span x-show="isVerifying">در حال بررسی...</span>
                </button>

                <button
                    @click="loginStep = 1"
                    class="mt-2 w-full bg-gray-100 text-gray-700 py-2 rounded-md hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-500 transition-all duration-300"
                >
                    بازگشت
                </button>
            </div>
        </div>

        <!-- Messages -->
        <div x-show="message" x-transition:enter="fade-enter-active" x-transition:leave="fade-leave-active"
             class="mt-4 p-4 rounded"
             :class="{
                 'bg-green-100 text-green-700': messageSuccess,
                 'bg-red-100 text-red-700': !messageSuccess
             }">
            <span x-text="message"></span>
        </div>
    </div>
</div>
<script>
    function loginApp() {
        return {
            activeTab: 'login',
            loginStep: 1,
            loginMobile: '',

            // OTP related
            otpDigits: Array(5).fill(''),
            isSendingOTP: false,
            isVerifying: false,
            resendDisabled: true,
            countdown: 120,

            message: '',
            messageSuccess: false,

            init() {
                // بازیابی زمان باقیمانده از localStorage
                const savedTime = localStorage.getItem('otpCountdown');
                const savedTimestamp = localStorage.getItem('otpCountdownTimestamp');

                if (savedTime && savedTimestamp) {
                    const elapsed = Math.floor((Date.now() - savedTimestamp) / 1000);
                    this.countdown = Math.max(0, savedTime - elapsed);
                }
            },

            switchTab(tab) {
                this.activeTab = tab;
                this.loginStep = 1;
                this.message = '';
                this.resetOTP();
            },

            resetOTP() {
                this.otpDigits = Array(5).fill('');
            },

            runCountdown() {
                console.log('s');
                const timer = setInterval(() => {
                    this.countdown--;
                    localStorage.setItem('otpCountdown', this.countdown);
                    localStorage.setItem('otpCountdownTimestamp', Date.now());

                    if (this.countdown <= 0) {
                        clearInterval(timer);
                        this.resendDisabled = false;
                        localStorage.removeItem('otpCountdown');
                        localStorage.removeItem('otpCountdownTimestamp');
                    }
                }, 1000);
            },
            startCountdown() {
                this.resendDisabled = true;
                localStorage.setItem('otpCountdown', this.countdown);
                localStorage.setItem('otpCountdownTimestamp', Date.now());
                this.runCountdown();
            },

            moveToNext(index, event) {
                const value = event.target.value;
                if (value && index < 4) {
                    const nextInput = event.target.nextElementSibling;
                    if (nextInput) nextInput.focus();
                }

                // Auto submit if last digit entered
                if (index === 4 && value) {
                    this.verifyOTP();
                }
            },

            moveToPrev(index, event) {
                if (event.key === 'Backspace' && index > 0 && !event.target.value) {
                    const prevInput = event.target.previousElementSibling;
                    if (prevInput) prevInput.focus();
                }
            },

            async sendOTP() {
                if (!this.loginMobile || !this.loginMobile.match(/^09\d{9}$/)) {
                    this.showMessage('لطفاً شماره موبایل معتبر وارد کنید', false);
                    return;
                }

                this.isSendingOTP = true;
                this.message = '';

                try {
                    const response = await fetch('{{ route('api.sendOtp') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            mobile: this.loginMobile
                        }),
                    });

                    const data = await response.json();
                    if (data.success) {
                        this.loginStep = 2;
                        this.countdown = 300;
                        clearInterval(timer);
                        if (data.remaining_time) this.countdown = data.remaining_time;
                        this.startCountdown();
                        this.showMessage('کد تایید به شماره شما ارسال شد', true);
                    } else {
                        this.showMessage(data.message || 'خطا در ارسال کد تایید', false);
                    }
                } catch (error) {
                    this.showMessage('خطا در ارتباط با سرور', false);
                } finally {
                    this.isSendingOTP = false;
                }
            },

            async resendOTP() {
                if (this.resendDisabled) return;

                this.resetOTP();
                this.resendDisabled = true;
                await this.sendOTP();
            },

            async verifyOTP() {
                const otpCode = this.otpDigits.join('');

                if (otpCode.length !== 5) {
                    this.showMessage('لطفاً کد ۵ رقمی را کامل وارد کنید', false);
                    return;
                }

                this.isVerifying = true;

                try {
                    const response = await fetch('{{ route('api.verifyOtp') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            mobile: this.loginMobile,
                            otp: otpCode,
                        }),
                    });

                    const data = await response.json();

                    if (data.success) {
                        this.showMessage('ورود با موفقیت انجام شد', true);
                        // Redirect to dashboard or home page
                        window.location.href = data.redirect || '/userDashboard';
                    } else {
                        let errorMsg = 'کد تایید نامعتبر است';
                        if (data.error === 'expired') {
                            errorMsg = 'کد تایید منقضی شده است. لطفاً کد جدید دریافت کنید';
                        }
                        this.showMessage(errorMsg, false);
                    }
                } catch (error) {
                    this.showMessage('خطا در ارتباط با سرور', false);
                } finally {
                    this.isVerifying = false;
                }
            },

            showMessage(msg, isSuccess) {
                this.message = msg;
                this.messageSuccess = isSuccess;

                // Auto hide message after 5 seconds
                setTimeout(() => {
                    this.message = '';
                }, 5000);
            }
        };
    }
</script>
</body>
</html>

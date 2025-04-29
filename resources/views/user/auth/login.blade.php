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
            <button
                @click="switchTab('register')"
                :class="{ 'bg-gradient-to-r from-blue-500 to-purple-500 text-white shadow-lg': activeTab === 'register', 'bg-gray-100 text-gray-700 hover:bg-gray-200': activeTab !== 'register' }"
                class="px-6 py-2 rounded-r-full focus:outline-none transition-all duration-300"
            >
                ثبت نام
            </button>
        </div>

        <!-- Login Form -->
        <div x-show="activeTab === 'login'" x-transition:enter="fade-enter-active">
            <!-- Step 1: Mobile -->
            <div x-show="loginStep === 1" x-transition:enter="slide-enter-active">
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
                    @click="loginStep = 2"
                    class="mt-4 w-full bg-gradient-to-r from-blue-500 to-purple-500 text-white py-2 rounded-md hover:from-blue-600 hover:to-purple-600 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all duration-300"
                >
                    بعدی
                </button>
            </div>

            <!-- Step 2: Password -->
            <div x-show="loginStep === 2" x-transition:enter="slide-enter-active">
                <label for="login-password" class="block text-sm font-medium text-gray-700">رمز عبور</label>
                <div class="mt-1 relative rounded-md shadow-sm">
                    <input
                        type="password"
                        id="login-password"
                        x-model="loginPassword"
                        class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300"
                        placeholder="********"
                    >
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-lock text-gray-400"></i>
                    </div>
                </div>
                <button
                    @click="submitLogin"
                    class="mt-4 w-full bg-gradient-to-r from-blue-500 to-purple-500 text-white py-2 rounded-md hover:from-blue-600 hover:to-purple-600 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all duration-300"
                >
                    ورود
                </button>
                <button
                    @click="loginStep = 1"
                    class="mt-2 w-full bg-gray-100 text-gray-700 py-2 rounded-md hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-500 transition-all duration-300"
                >
                    بازگشت
                </button>
            </div>
        </div>

        <!-- Register Form -->
        <div x-show="activeTab === 'register'" x-transition:enter="fade-enter-active">
            <div class="space-y-4">
                <div class="relative rounded-md shadow-sm">
                    <input
                        type="text"
                        id="register-firstName"
                        x-model="registerFirstName"
                        class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300"
                        placeholder="نام"
                    >
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-user text-gray-400"></i>
                    </div>
                </div>
                <div class="relative rounded-md shadow-sm">
                    <input
                        type="text"
                        id="register-lastName"
                        x-model="registerLastName"
                        class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300"
                        placeholder="نام خانوادگی"
                    >
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-user text-gray-400"></i>
                    </div>
                </div>
                <div class="relative rounded-md shadow-sm">
                    <input
                        type="text"
                        id="register-mobile"
                        x-model="registerMobile"
                        class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300"
                        placeholder="شماره موبایل"
                    >
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-mobile-alt text-gray-400"></i>
                    </div>
                </div>
                <div class="relative rounded-md shadow-sm">
                    <input
                        type="text"
                        id="register-nationalCode"
                        x-model="registerNationalCode"
                        class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300"
                        placeholder="کدملی"
                    >
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-id-card text-gray-400"></i>
                    </div>
                </div>
                <div class="relative rounded-md shadow-sm">
                    <input
                        type="password"
                        id="register-password"
                        x-model="registerPassword"
                        class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300"
                        placeholder="رمز عبور"
                    >
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-lock text-gray-400"></i>
                    </div>
                </div>
                <div class="relative rounded-md shadow-sm">
                    <input
                        type="password"
                        id="register-confirm"
                        x-model="registerConfirm"
                        class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300"
                        placeholder="تایید رمز عبور"
                    >
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-lock text-gray-400"></i>
                    </div>
                </div>
                <button
                    @click="submitRegister"
                    class="w-full bg-gradient-to-r from-blue-500 to-purple-500 text-white py-2 rounded-md hover:from-blue-600 hover:to-purple-600 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all duration-300"
                >
                    ثبت نام
                </button>
            </div>
        </div>

        <!-- Messages -->
        <div x-show="message" x-transition:enter="fade-enter-active" x-transition:leave="fade-leave-active" class="mt-4 p-4 rounded" :class="{ 'bg-green-100 text-green-700': messageSuccess, 'bg-red-100 text-red-700': !messageSuccess }">
            <span x-text="message"></span>
        </div>
    </div>
</div>
<script>
    function loginApp() {
        return {
            activeTab: 'login', // 'login' or 'register'
            loginStep: 1, // 1 or 2
            loginMobile: '',
            loginPassword: '',

            registerFirstName: '',
            registerLastName: '',
            registerMobile: '',
            registerNationalCode: '',
            registerPassword: '',
            registerConfirm: '',

            message: '',
            messageSuccess: false,

            switchTab(tab) {
                this.activeTab = tab;
                this.loginStep = 1; // Reset login step when switching tabs
                this.message = ''; // Clear messages
            },

            async submitLogin() {
                try {
                    const response = await fetch('/doLogin', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            mobile: this.loginMobile,
                            password: this.loginPassword,
                        }),
                    });

                    const data = await response.json();

                    if (data.success) {
                        this.message = data.message;
                        this.messageSuccess = true;
                        window.location.href = '/userDashboard';
                    } else {
                        this.message = data.message;
                        this.messageSuccess = false;
                    }
                } catch (error) {
                    this.message = 'خطا در ارتباط با سرور';
                    this.messageSuccess = false;
                }
            },

            async submitRegister() {
                try {
                    const urlParams = new URLSearchParams(window.location.search);
                    const codeParam = urlParams.get('code');
                    const response = await fetch('/doRegister', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            firstName: this.registerFirstName,
                            lastName: this.registerLastName,
                            mobile: this.registerMobile,
                            nationalCode: this.registerNationalCode,
                            password: this.registerPassword,
                            confirm: this.registerConfirm,
                            code: codeParam,
                        }),
                    });

                    const data = await response.json();

                    if (data.success) {
                        this.message = data.message;
                        this.messageSuccess = true;
                        window.location.href = '/userDashboard';
                    } else {
                        this.message = data.message;
                        this.messageSuccess = false;
                    }
                } catch (error) {
                    this.message = 'خطا در ارتباط با سرور';
                    this.messageSuccess = false;
                }
            }
        };
    }
</script>
</body>
</html>

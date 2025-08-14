@extends('layouts.auth-layout')
@section('content')
<div class="max-w-5xl w-full rounded-xl overflow-hidden shadow-xl flex flex-col md:flex-row">
    <!-- Visualization Side - Dark -->
    <div class="md:w-1/2 h-64 md:h-auto relative bg-gray-900" id="vanta-canvas">
        <div class="absolute inset-0 bg-gradient-to-r from-transparent to-gray-900/90 md:via-transparent md:to-gray-900 z-10"></div>
        <div class="absolute top-8 left-8 z-20">
            <div class="flex items-center mb-6">
                <div class="w-8 h-8 rounded-full bg-blue-500 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                    </svg>
                </div>
                <span class="ml-2 text-sm font-light tracking-tight text-blue-200">NETGUARD</span>
            </div>
            <span class="px-2 py-1 bg-blue-900/80 rounded-full text-xs text-blue-200 mb-2 inline-block tracking-tight">SECURE ACCESS</span>
            <h2 class="text-3xl font-light text-white tracking-tighter">Welcome<br>Back</h2>
            <div class="h-0.5 w-16 bg-blue-400 mt-3 rounded-full"></div>

            <div class="mt-8 grid grid-cols-2 gap-4 max-w-xs">
                <div class="bg-black/30 backdrop-blur-sm rounded-lg p-3">
                    <div class="text-xs text-gray-400 mb-1">UPTIME</div>
                    <div class="text-white text-lg font-light">99.9%</div>
                </div>
                <div class="bg-black/30 backdrop-blur-sm rounded-lg p-3">
                    <div class="text-xs text-gray-400 mb-1">TRAFFIC</div>
                    <div class="text-white text-lg font-light">12.4 TB</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Login Form Side - Light -->
    <div class="md:w-1/2 p-8 flex flex-col justify-center bg-white">
        <div>
            <div class="mb-2 flex items-center justify-between">
                <h3 class="text-xl font-light text-gray-800 tracking-tight">Login</h3>
                <div class="text-sm text-gray-500 font-light">Need help?</div>
            </div>
            <p class="text-gray-500 text-sm font-light mb-6">Access your BMS dashboard with enhanced security protocols.</p>
            <form action="{{ route('signin') }}" method="POST" class="space-y-5">
                @csrf
                <div class="space-y-2">
                    <label for="email" class="block text-sm font-light text-gray-700">Employee ID</label>
                    <div class="relative">
                        <div class="absolute left-3 input-icon text-gray-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <input type="text" id="userId" name="userId" placeholder="Employee ID" class="w-full pl-10 pr-3 py-2.5 bg-gray-50 border border-gray-300 rounded-lg text-gray-700 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>
                </div>

                <div class="space-y-2">
                    <div class="flex justify-between">
                        <label for="password" class="block text-sm font-light text-gray-700">Password</label>
                    </div>
                    <div class="relative">
                        <div class="absolute left-3 input-icon text-gray-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <input type="password" id="password" name="password" placeholder="••••••••" class="w-full pl-10 pr-3 py-2.5 bg-gray-50 border border-gray-300 rounded-lg text-gray-700 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>
                </div>
                <div class="pt-2">
                    <button type="submit" class="w-full px-4 py-2.5 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition flex items-center justify-center font-light">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M3 3a1 1 0 011 1v12a1 1 0 11-2 0V4a1 1 0 011-1zm7.707 3.293a1 1 0 010 1.414L9.414 9H17a1 1 0 110 2H9.414l1.293 1.293a1 1 0 01-1.414 1.414l-3-3a1 1 0 010-1.414l3-3a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                        Sign In
                    </button>
                </div>
            </form>

            <div class="mt-8 pt-6 border-t border-gray-200">
                <div class="flex justify-between items-center">
                    <p class="text-sm text-gray-500 font-light">
                        Forgot Employee ID / Password? <a href="#" class="text-blue-600 hover:text-blue-800">Click Here</a>
                    </p>
                    <div class="flex items-center text-xs text-gray-500 font-light">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1 text-green-500" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                        SSL Secured
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        VANTA.HALO({
            el: "#vanta-canvas",
            mouseControls: true,
            touchControls: true,
            gyroControls: false,
            minHeight: 200,
            minWidth: 200,
            baseColor: 0x3b82f6,
            backgroundColor: 0x111827,
            amplitudeFactor: 1.5,
            size: 1.5
        });
    });
</script>
@endpush
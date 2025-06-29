<!DOCTYPE html>
<html lang="es" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'CyberVault')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=JetBrains+Mono:wght@400;500;600&display=swap" rel="stylesheet">
    
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: {
                        'sans': ['Inter', 'system-ui', 'sans-serif'],
                        'mono': ['JetBrains Mono', 'monospace'],
                    },
                    colors: {
                        cyber: {
                            50: '#0a0a0f',
                            100: '#111122',
                            200: '#1a1a2e',
                            300: '#16213e',
                            400: '#0f4c75',
                            500: '#3282f6',
                            600: '#00d4ff',
                            700: '#7c3aed',
                            800: '#a855f7',
                            900: '#c084fc',
                        },
                        neon: {
                            green: '#39ff14',
                            blue: '#00d4ff',
                            purple: '#bf00ff',
                            pink: '#ff0080',
                            yellow: '#ffff00',
                        }
                    },
                    animation: {
                        'glow': 'glow 2s ease-in-out infinite alternate',
                        'pulse-slow': 'pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                        'float': 'float 6s ease-in-out infinite',
                    },
                    keyframes: {
                        glow: {
                            '0%': { 
                                'box-shadow': '0 0 5px #00d4ff, 0 0 10px #00d4ff, 0 0 15px #00d4ff',
                            },
                            '100%': { 
                                'box-shadow': '0 0 10px #00d4ff, 0 0 20px #00d4ff, 0 0 30px #00d4ff',
                            }
                        },
                        float: {
                            '0%, 100%': { transform: 'translateY(0px)' },
                            '50%': { transform: 'translateY(-10px)' },
                        }
                    }
                }
            }
        }
    </script>
    
    <style>
        .cyber-grid {
            background-image: 
                radial-gradient(circle at 1px 1px, rgba(0, 212, 255, 0.15) 1px, transparent 0);
            background-size: 20px 20px;
        }
        
        .neon-text {
            text-shadow: 
                0 0 5px currentColor,
                0 0 10px currentColor,
                0 0 15px currentColor,
                0 0 20px currentColor;
        }
        
        .cyber-border {
            background: linear-gradient(45deg, #00d4ff, #7c3aed, #00d4ff);
            background-size: 300% 300%;
            animation: gradient 6s ease infinite;
        }
        
        @keyframes gradient {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        
        .glass-morphism {
            background: rgba(26, 26, 46, 0.3);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(0, 212, 255, 0.2);
        }
        
        /* Mobile-specific optimizations */
        @media (max-width: 640px) {
            .cyber-grid {
                background-size: 15px 15px;
            }
            
            .glass-morphism {
                backdrop-filter: blur(8px);
            }
        }
        
        /* Hamburger menu animation */
        .menu-open #line1 {
            transform: rotate(45deg) translate(2px, 2px);
        }
        .menu-open #line2 {
            opacity: 0;
        }
        .menu-open #line3 {
            transform: rotate(-45deg) translate(2px, -2px);
        }
        
        /* Mobile nav actions styling */
        .mobile-nav-actions a {
            display: block !important;
            width: 100% !important;
            text-align: center !important;
            margin: 0 !important;
        }
    </style>
</head>

<body class="bg-gradient-to-br from-cyber-50 via-cyber-100 to-cyber-200 min-h-screen text-white font-sans cyber-grid">
    <!-- Navigation -->
    <nav class="relative z-50 bg-cyber-100/80 backdrop-blur-md border-b border-neon-blue/20 shadow-lg">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-4">
                <!-- Logo Section -->
                <div class="flex items-center space-x-2 sm:space-x-3">
                    <div class="relative">
                        <div class="w-8 h-8 sm:w-10 sm:h-10 bg-gradient-to-r from-neon-blue to-cyber-700 rounded-lg flex items-center justify-center animate-glow">
                            <i class="fas fa-shield-halved text-white text-sm sm:text-lg"></i>
                        </div>
                        <div class="absolute -top-1 -right-1 w-2 h-2 sm:w-3 sm:h-3 bg-neon-green rounded-full animate-pulse"></div>
                    </div>
                    <div class="hidden sm:block">
                        <h1 class="text-lg sm:text-2xl font-bold bg-gradient-to-r from-neon-blue via-cyber-800 to-neon-purple bg-clip-text text-transparent neon-text">
                            {{ config('app.name', 'CyberVault') }}
                        </h1>
                        <p class="text-xs text-cyan-400 font-mono hidden lg:block">Security & Product Management</p>
                    </div>
                    <!-- Mobile Logo Text -->
                    <div class="sm:hidden">
                        <h1 class="text-lg font-bold bg-gradient-to-r from-neon-blue to-neon-purple bg-clip-text text-transparent">
                            CyberVault
                        </h1>
                    </div>
                </div>
                
                <!-- Desktop Navigation -->
                <div class="hidden md:flex items-center space-x-4">
                    @yield('nav-actions')
                    
                    <div class="flex items-center space-x-2 text-sm">
                        <div class="w-2 h-2 bg-neon-green rounded-full animate-pulse"></div>
                        <span class="text-green-400 font-mono hidden lg:inline">ONLINE</span>
                        <span class="text-green-400 font-mono lg:hidden">ON</span>
                    </div>
                </div>

                <!-- Mobile Menu Button -->
                <div class="md:hidden">
                    <button id="mobile-menu-btn" 
                            class="relative w-8 h-8 bg-cyber-200/50 rounded-lg border border-neon-blue/30 flex items-center justify-center focus:outline-none focus:ring-2 focus:ring-neon-blue">
                        <div class="space-y-1">
                            <div class="w-4 h-0.5 bg-neon-blue transition-all duration-300" id="line1"></div>
                            <div class="w-4 h-0.5 bg-neon-blue transition-all duration-300" id="line2"></div>
                            <div class="w-4 h-0.5 bg-neon-blue transition-all duration-300" id="line3"></div>
                        </div>
                    </button>
                </div>
            </div>

            <!-- Mobile Menu -->
            <div id="mobile-menu" class="md:hidden hidden border-t border-neon-blue/20 mt-4 pt-4 pb-4">
                <div class="space-y-4">
                    <div class="mobile-nav-actions">
                        @yield('nav-actions')
                    </div>
                    
                    <div class="flex items-center justify-center space-x-2 text-sm pt-2 border-t border-cyber-200/50">
                        <div class="w-2 h-2 bg-neon-green rounded-full animate-pulse"></div>
                        <span class="text-green-400 font-mono">SISTEMA ONLINE</span>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="relative z-10 container mx-auto px-4 sm:px-6 lg:px-8 py-6 sm:py-8">
        @if(session('success'))
            <div class="mb-6 glass-morphism rounded-xl p-4 border-l-4 border-neon-green animate-float">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <i class="fas fa-check-circle text-neon-green text-lg sm:text-xl"></i>
                    </div>
                    <div class="ml-3">
                        <p class="text-green-300 font-medium text-sm sm:text-base">{{ session('success') }}</p>
                    </div>
                </div>
            </div>
        @endif

        @if(session('error'))
            <div class="mb-6 glass-morphism rounded-xl p-4 border-l-4 border-red-500 animate-float">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <i class="fas fa-exclamation-triangle text-red-400 text-lg sm:text-xl"></i>
                    </div>
                    <div class="ml-3">
                        <p class="text-red-300 font-medium text-sm sm:text-base">{{ session('error') }}</p>
                    </div>
                </div>
            </div>
        @endif

        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="relative z-10 mt-8 sm:mt-16 border-t border-neon-blue/20 bg-cyber-100/50 backdrop-blur-sm">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-4 sm:py-6">
            <div class="flex flex-col sm:flex-row justify-between items-center space-y-4 sm:space-y-0">
                <div class="flex items-center space-x-2">
                    <i class="fas fa-code text-neon-blue"></i>
                    <span class="text-xs sm:text-sm text-gray-400 font-mono text-center sm:text-left">
                        Powered by Laravel & CyberSecurity
                    </span>
                </div>
                <div class="flex items-center space-x-2 sm:space-x-4 text-xs sm:text-sm text-gray-400">
                    <span class="font-mono">{{ date('Y') }}</span>
                    <div class="w-1 h-1 bg-neon-blue rounded-full"></div>
                    <span class="font-mono">v2.1.0</span>
                    <div class="w-1 h-1 bg-neon-blue rounded-full sm:hidden"></div>
                    <span class="font-mono sm:hidden">Mobile</span>
                </div>
            </div>
        </div>
    </footer>

    <!-- Background Effects -->
    <div class="fixed inset-0 pointer-events-none overflow-hidden">
        <div class="absolute top-20 left-10 w-32 h-32 bg-neon-blue/10 rounded-full blur-3xl animate-pulse-slow"></div>
        <div class="absolute bottom-20 right-10 w-40 h-40 bg-cyber-700/10 rounded-full blur-3xl animate-pulse-slow"></div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-gradient-to-r from-neon-purple/5 to-neon-blue/5 rounded-full blur-3xl animate-float"></div>
    </div>

    @yield('scripts')
    
    <!-- Mobile Menu JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuBtn = document.getElementById('mobile-menu-btn');
            const mobileMenu = document.getElementById('mobile-menu');
            const body = document.body;
            
            if (mobileMenuBtn && mobileMenu) {
                mobileMenuBtn.addEventListener('click', function() {
                    const isOpen = mobileMenu.classList.contains('hidden');
                    
                    if (isOpen) {
                        // Abrir menú
                        mobileMenu.classList.remove('hidden');
                        mobileMenuBtn.classList.add('menu-open');
                        
                        // Animación de entrada
                        mobileMenu.style.opacity = '0';
                        mobileMenu.style.transform = 'translateY(-10px)';
                        
                        setTimeout(() => {
                            mobileMenu.style.transition = 'all 0.3s ease';
                            mobileMenu.style.opacity = '1';
                            mobileMenu.style.transform = 'translateY(0)';
                        }, 10);
                        
                    } else {
                        // Cerrar menú
                        mobileMenu.style.transition = 'all 0.3s ease';
                        mobileMenu.style.opacity = '0';
                        mobileMenu.style.transform = 'translateY(-10px)';
                        
                        setTimeout(() => {
                            mobileMenu.classList.add('hidden');
                            mobileMenuBtn.classList.remove('menu-open');
                        }, 300);
                    }
                });
                
                // Cerrar menú al hacer clic en un enlace
                const mobileLinks = mobileMenu.querySelectorAll('a');
                mobileLinks.forEach(link => {
                    link.addEventListener('click', () => {
                        mobileMenu.classList.add('hidden');
                        mobileMenuBtn.classList.remove('menu-open');
                    });
                });
            }
            
            // Responsive optimizations
            function handleResize() {
                if (window.innerWidth >= 768) {
                    mobileMenu?.classList.add('hidden');
                    mobileMenuBtn?.classList.remove('menu-open');
                }
            }
            
            window.addEventListener('resize', handleResize);
            
            // Touch optimizations for mobile
            if ('ontouchstart' in window) {
                document.body.classList.add('touch-device');
            }
        });
    </script>
</body>
</html>

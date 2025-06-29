@extends('layouts.app')

@section('title', 'Gestión de Productos - CyberVault')

@section('nav-actions')
    <a href="{{ route('productos.crear') }}" 
       class="group relative px-4 sm:px-6 py-2 sm:py-3 bg-gradient-to-r from-neon-green to-green-500 rounded-xl font-semibold text-black hover:from-green-400 hover:to-neon-green transition-all duration-300 transform hover:scale-105 hover:shadow-lg hover:shadow-neon-green/25 text-sm sm:text-base">
        <i class="fas fa-plus mr-1 sm:mr-2"></i>
        <span class="hidden sm:inline">Nuevo Producto</span>
        <span class="sm:hidden">Nuevo</span>
        <div class="absolute inset-0 rounded-xl bg-neon-green/20 blur opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
    </a>
@endsection

@section('content')
<div class="space-y-8">
    <!-- Header Section -->
    <div class="text-center space-y-4">
        <div class="inline-flex items-center space-x-2 sm:space-x-3 glass-morphism rounded-xl sm:rounded-2xl px-4 sm:px-8 py-3 sm:py-4">
            <div class="w-8 h-8 sm:w-12 sm:h-12 bg-gradient-to-r from-cyber-500 to-cyber-700 rounded-lg sm:rounded-xl flex items-center justify-center animate-glow">
                <i class="fas fa-cube text-white text-lg sm:text-xl"></i>
            </div>
            <div>
                <h1 class="text-xl sm:text-2xl lg:text-3xl font-bold bg-gradient-to-r from-neon-blue via-cyber-600 to-neon-purple bg-clip-text text-transparent">
                    Gestión de Productos
                </h1>
                <p class="text-cyan-400 font-mono text-xs sm:text-sm hidden sm:block">Sistema de Control de Inventario</p>
            </div>
        </div>
    </div>

    <!-- Filter Section -->
    <div class="glass-morphism rounded-xl sm:rounded-2xl p-4 sm:p-6 lg:p-8 cyber-border relative overflow-hidden">
        <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-neon-blue via-cyber-700 to-neon-purple"></div>
        
        <div class="flex items-center space-x-2 sm:space-x-3 mb-4 sm:mb-6">
            <div class="w-6 h-6 sm:w-8 sm:h-8 bg-gradient-to-r from-neon-blue to-cyber-600 rounded-lg flex items-center justify-center">
                <i class="fas fa-filter text-white text-xs sm:text-sm"></i>
            </div>
            <h2 class="text-lg sm:text-xl font-bold text-neon-blue">Filtros Avanzados</h2>
        </div>
        
        <form action="{{ route('productos.filtrar') }}" method="POST" class="space-y-4 lg:space-y-0 lg:flex lg:items-end lg:space-x-6">
            @csrf
            <div class="flex-1 space-y-2">
                <label for="id_categoria" class="block text-sm font-medium text-cyan-300 mb-2">
                    <i class="fas fa-tags mr-2 text-neon-blue"></i>Categoría del Producto
                </label>
                <select name="id_categoria" 
                        class="w-full bg-cyber-200/50 border border-neon-blue/30 rounded-xl px-3 sm:px-4 py-2 sm:py-3 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-neon-blue focus:border-transparent transition-all duration-300 backdrop-blur-sm text-sm sm:text-base"
                        required>
                    <option value="" class="bg-cyber-200 text-gray-300">[- SELECCIONAR CATEGORÍA -]</option>
                    @foreach($categorias as $item)
                        <option value="{{ $item->id_categoria }}" class="bg-cyber-200 text-white">
                            {{ $item->descripcion }}
                        </option>
                    @endforeach
                </select>
            </div>
            
            <button type="submit" 
                    class="w-full lg:w-auto group relative px-4 sm:px-6 lg:px-8 py-2 sm:py-3 bg-gradient-to-r from-cyber-500 to-cyber-700 rounded-xl font-semibold text-white hover:from-cyber-400 hover:to-cyber-600 transition-all duration-300 transform hover:scale-105 hover:shadow-lg hover:shadow-cyber-500/25 text-sm sm:text-base">
                <i class="fas fa-search mr-1 sm:mr-2"></i>
                <span class="hidden sm:inline">Ejecutar Búsqueda</span>
                <span class="sm:hidden">Buscar</span>
                <div class="absolute inset-0 rounded-xl bg-cyber-500/20 blur opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
            </button>
        </form>
    </div>

    <!-- Results Section -->
    @isset($productos)
        <div class="glass-morphism rounded-2xl overflow-hidden">
            <div class="bg-gradient-to-r from-cyber-500/20 to-cyber-700/20 px-8 py-6 border-b border-neon-blue/20">
                <div class="flex items-center space-x-3">
                    <div class="w-8 h-8 bg-gradient-to-r from-neon-green to-green-500 rounded-lg flex items-center justify-center">
                        <i class="fas fa-database text-black text-sm"></i>
                    </div>
                    <h3 class="text-xl font-bold text-neon-green">Resultados de la Búsqueda</h3>
                    <div class="flex-1"></div>
                    <span class="bg-cyber-600/50 text-neon-blue px-3 py-1 rounded-full text-sm font-mono">
                        {{ count($productos) }} productos encontrados
                    </span>
                </div>
            </div>
            
            <div class="p-8 space-y-4">
                @forelse($productos as $index => $item)
                    <div class="group relative bg-cyber-200/30 rounded-xl p-6 border border-neon-blue/20 hover:border-neon-blue/40 transition-all duration-300 hover:shadow-lg hover:shadow-neon-blue/10 hover:transform hover:scale-[1.02]">
                        <div class="absolute top-2 right-2 w-2 h-2 bg-neon-green rounded-full animate-pulse"></div>
                        
                        <div class="flex flex-col md:flex-row md:items-center md:justify-between space-y-4 md:space-y-0">
                            <div class="flex-1 space-y-2">
                                <div class="flex items-center space-x-3">
                                    <div class="w-10 h-10 bg-gradient-to-r from-neon-blue to-cyber-600 rounded-lg flex items-center justify-center text-white font-bold">
                                        {{ $index + 1 }}
                                    </div>
                                    <div>
                                        <h4 class="text-lg font-bold text-white group-hover:text-neon-blue transition-colors duration-300">
                                            {{ $item->nombre }}
                                        </h4>
                                        <p class="text-cyan-400 font-mono text-sm">ID: #{{ str_pad($item->id_producto, 4, '0', STR_PAD_LEFT) }}</p>
                                    </div>
                                </div>
                                
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-4">
                                    <div class="flex items-center space-x-2">
                                        <i class="fas fa-copyright text-neon-purple"></i>
                                        <span class="text-gray-300 text-sm">Marca:</span>
                                        <span class="text-white font-medium">{{ $item->marca }}</span>
                                    </div>
                                    
                                    <div class="flex items-center space-x-2">
                                        <i class="fas fa-boxes text-neon-yellow"></i>
                                        <span class="text-gray-300 text-sm">Stock:</span>
                                        <span class="text-white font-medium">{{ $item->stock }} unidades</span>
                                    </div>
                                    
                                    <div class="flex items-center space-x-2">
                                        <i class="fas fa-tags text-neon-pink"></i>
                                        <span class="text-gray-300 text-sm">Categoría:</span>
                                        <span class="text-white font-medium">{{ $item->categoria->descripcion ?? 'N/A' }}</span>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="text-center md:text-right space-y-2">
                                <div class="text-3xl font-bold bg-gradient-to-r from-neon-green to-green-400 bg-clip-text text-transparent font-mono">
                                    ${{ number_format($item->precio, 2) }}
                                </div>
                                <div class="text-xs text-gray-400 font-mono">Precio unitario</div>
                            </div>
                        </div>
                        
                        <!-- Hover Effect -->
                        <div class="absolute inset-0 rounded-xl bg-gradient-to-r from-neon-blue/5 to-cyber-700/5 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </div>
                @empty
                    <div class="text-center py-16 space-y-4">
                        <div class="w-24 h-24 mx-auto bg-gradient-to-r from-cyber-600 to-cyber-800 rounded-full flex items-center justify-center">
                            <i class="fas fa-search text-3xl text-neon-blue"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-300">Sin Resultados</h3>
                        <p class="text-gray-400 max-w-md mx-auto">
                            No se encontraron productos en la categoría seleccionada. 
                            Prueba con otra categoría o verifica que existan productos registrados.
                        </p>
                        <div class="flex justify-center mt-6">
                            <a href="{{ route('productos.crear') }}" 
                               class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-neon-green to-green-500 rounded-xl font-semibold text-black hover:from-green-400 hover:to-neon-green transition-all duration-300 transform hover:scale-105">
                                <i class="fas fa-plus mr-2"></i>Agregar Primer Producto
                            </a>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    @else
        <!-- Welcome Section -->
        <div class="text-center py-8 sm:py-12 lg:py-16 space-y-6 sm:space-y-8">
            <div class="glass-morphism rounded-2xl sm:rounded-3xl p-6 sm:p-8 lg:p-12 max-w-2xl mx-auto">
                <div class="w-20 h-20 sm:w-24 sm:h-24 lg:w-32 lg:h-32 mx-auto bg-gradient-to-r from-neon-blue to-cyber-700 rounded-full flex items-center justify-center mb-6 sm:mb-8 animate-float">
                    <i class="fas fa-rocket text-2xl sm:text-3xl lg:text-4xl text-white"></i>
                </div>
                
                <h2 class="text-2xl sm:text-3xl font-bold mb-4 bg-gradient-to-r from-neon-blue via-cyber-600 to-neon-purple bg-clip-text text-transparent">
                    Bienvenido a CyberVault
                </h2>
                
                <p class="text-gray-300 text-base sm:text-lg mb-6 sm:mb-8 leading-relaxed px-4">
                    Sistema avanzado de gestión de productos con tecnología de vanguardia. 
                    Selecciona una categoría para comenzar la exploración del inventario.
                </p>
                
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6 mt-6 sm:mt-8">
                    <div class="bg-cyber-200/20 rounded-xl p-4 sm:p-6 border border-neon-blue/20">
                        <i class="fas fa-shield-alt text-xl sm:text-2xl text-neon-blue mb-3"></i>
                        <h4 class="font-semibold text-white mb-2 text-sm sm:text-base">Seguridad</h4>
                        <p class="text-gray-400 text-xs sm:text-sm">Protección avanzada de datos</p>
                    </div>
                    
                    <div class="bg-cyber-200/20 rounded-xl p-4 sm:p-6 border border-neon-purple/20">
                        <i class="fas fa-lightning-bolt text-xl sm:text-2xl text-neon-purple mb-3"></i>
                        <h4 class="font-semibold text-white mb-2 text-sm sm:text-base">Velocidad</h4>
                        <p class="text-gray-400 text-xs sm:text-sm">Consultas ultra rápidas</p>
                    </div>
                    
                    <div class="bg-cyber-200/20 rounded-xl p-4 sm:p-6 border border-neon-green/20 sm:col-span-2 lg:col-span-1">
                        <i class="fas fa-chart-line text-xl sm:text-2xl text-neon-green mb-3"></i>
                        <h4 class="font-semibold text-white mb-2 text-sm sm:text-base">Analytics</h4>
                        <p class="text-gray-400 text-xs sm:text-sm">Inteligencia de negocio</p>
                    </div>
                </div>
            </div>
        </div>
    @endisset
</div>
@endsection

@section('scripts')
<script>
    // Efectos adicionales de interactividad
    document.addEventListener('DOMContentLoaded', function() {
        // Agregar efectos de hover dinámicos a las cards de productos
        const productCards = document.querySelectorAll('.group');
        
        productCards.forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-5px) scale(1.02)';
                this.style.transition = 'all 0.3s ease';
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0) scale(1)';
            });
        });
        
        // Efecto de typing para el título
        const titles = document.querySelectorAll('.neon-text');
        titles.forEach(title => {
            title.style.animation = 'glow 2s ease-in-out infinite alternate';
        });
    });
</script>
@endsection
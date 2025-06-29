@extends('layouts.app')

@section('title', 'Crear Producto - CyberVault')

@section('nav-actions')
    <a href="{{ route('productos.index') }}" 
       class="group relative px-4 sm:px-6 py-2 sm:py-3 bg-gradient-to-r from-gray-600 to-gray-700 rounded-xl font-semibold text-white hover:from-gray-500 hover:to-gray-600 transition-all duration-300 transform hover:scale-105 hover:shadow-lg hover:shadow-gray-600/25 text-sm sm:text-base">
        <i class="fas fa-arrow-left mr-1 sm:mr-2"></i>
        <span class="hidden sm:inline">Volver al Panel</span>
        <span class="sm:hidden">Volver</span>
        <div class="absolute inset-0 rounded-xl bg-gray-500/20 blur opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
    </a>
@endsection

@section('content')
<div class="max-w-2xl mx-auto space-y-6 sm:space-y-8">
    <!-- Header Section -->
    <div class="text-center space-y-4">
        <div class="inline-flex items-center space-x-2 sm:space-x-3 glass-morphism rounded-xl sm:rounded-2xl px-4 sm:px-8 py-3 sm:py-4">
            <div class="w-8 h-8 sm:w-12 sm:h-12 bg-gradient-to-r from-neon-green to-green-500 rounded-lg sm:rounded-xl flex items-center justify-center animate-glow">
                <i class="fas fa-plus-circle text-black text-lg sm:text-xl"></i>
            </div>
            <div>
                <h1 class="text-xl sm:text-2xl lg:text-3xl font-bold bg-gradient-to-r from-neon-green via-green-400 to-neon-green bg-clip-text text-transparent">
                    Crear Nuevo Producto
                </h1>
                <p class="text-cyan-400 font-mono text-xs sm:text-sm hidden sm:block">Registro en Base de Datos</p>
            </div>
        </div>
    </div>

    <!-- Form Section -->
    <div class="glass-morphism rounded-xl sm:rounded-2xl p-4 sm:p-6 lg:p-8 cyber-border relative overflow-hidden">
        <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-neon-green via-green-500 to-neon-green"></div>
        
        @if($errors->any())
            <div class="mb-6 sm:mb-8 bg-red-900/30 border border-red-500/50 rounded-xl p-4 sm:p-6 backdrop-blur-sm">
                <div class="flex items-center space-x-2 sm:space-x-3 mb-3 sm:mb-4">
                    <div class="w-6 h-6 sm:w-8 sm:h-8 bg-red-500 rounded-lg flex items-center justify-center">
                        <i class="fas fa-exclamation-triangle text-white text-xs sm:text-sm"></i>
                    </div>
                    <h3 class="text-base sm:text-lg font-semibold text-red-300">Errores de Validación</h3>
                </div>
                <ul class="space-y-2">
                    @foreach($errors->all() as $error)
                        <li class="flex items-center space-x-2 text-red-300 text-sm sm:text-base">
                            <i class="fas fa-times-circle text-red-400 text-xs sm:text-sm"></i>
                            <span>{{ $error }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('productos.guardar') }}" method="POST" class="space-y-4 sm:space-y-6">
            @csrf
            
            <!-- Nombre del Producto -->
            <div class="space-y-2">
                <label for="nombre" class="block text-sm font-medium text-cyan-300 mb-2">
                    <i class="fas fa-tag mr-2 text-neon-green"></i>Nombre del Producto
                </label>
                <input type="text" 
                       name="nombre" 
                       id="nombre" 
                       value="{{ old('nombre') }}"
                       class="w-full bg-cyber-200/50 border border-neon-blue/30 rounded-xl px-4 py-3 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-neon-green focus:border-transparent transition-all duration-300 backdrop-blur-sm"
                       placeholder="Ej: iPhone 15 Pro Max"
                       required>
                <div class="flex items-center space-x-2 mt-1">
                    <div class="w-1 h-1 bg-neon-green rounded-full"></div>
                    <span class="text-xs text-gray-400 font-mono">Ingresa un nombre descriptivo para el producto</span>
                </div>
            </div>

            <!-- Marca -->
            <div class="space-y-2">
                <label for="marca" class="block text-sm font-medium text-cyan-300 mb-2">
                    <i class="fas fa-copyright mr-2 text-neon-blue"></i>Marca
                </label>
                <input type="text" 
                       name="marca" 
                       id="marca" 
                       value="{{ old('marca') }}"
                       class="w-full bg-cyber-200/50 border border-neon-blue/30 rounded-xl px-4 py-3 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-neon-blue focus:border-transparent transition-all duration-300 backdrop-blur-sm"
                       placeholder="Ej: Apple, Samsung, Sony"
                       required>
                <div class="flex items-center space-x-2 mt-1">
                    <div class="w-1 h-1 bg-neon-blue rounded-full"></div>
                    <span class="text-xs text-gray-400 font-mono">Especifica la marca del producto</span>
                </div>
            </div>

            <!-- Precio y Stock en Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Precio -->
                <div class="space-y-2">
                    <label for="precio" class="block text-sm font-medium text-cyan-300 mb-2">
                        <i class="fas fa-dollar-sign mr-2 text-neon-yellow"></i>Precio (USD)
                    </label>
                    <input type="number" 
                           name="precio" 
                           id="precio" 
                           step="0.01"
                           min="0"
                           value="{{ old('precio') }}"
                           class="w-full bg-cyber-200/50 border border-neon-blue/30 rounded-xl px-4 py-3 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-neon-yellow focus:border-transparent transition-all duration-300 backdrop-blur-sm"
                           placeholder="0.00"
                           required>
                    <div class="flex items-center space-x-2 mt-1">
                        <div class="w-1 h-1 bg-neon-yellow rounded-full"></div>
                        <span class="text-xs text-gray-400 font-mono">Precio en dólares americanos</span>
                    </div>
                </div>

                <!-- Stock -->
                <div class="space-y-2">
                    <label for="stock" class="block text-sm font-medium text-cyan-300 mb-2">
                        <i class="fas fa-boxes mr-2 text-neon-purple"></i>Stock Disponible
                    </label>
                    <input type="number" 
                           name="stock" 
                           id="stock"
                           min="0"
                           value="{{ old('stock') }}"
                           class="w-full bg-cyber-200/50 border border-neon-blue/30 rounded-xl px-4 py-3 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-neon-purple focus:border-transparent transition-all duration-300 backdrop-blur-sm"
                           placeholder="0"
                           required>
                    <div class="flex items-center space-x-2 mt-1">
                        <div class="w-1 h-1 bg-neon-purple rounded-full"></div>
                        <span class="text-xs text-gray-400 font-mono">Cantidad disponible en inventario</span>
                    </div>
                </div>
            </div>

            <!-- Categoría -->
            <div class="space-y-2">
                <label for="id_categoria" class="block text-sm font-medium text-cyan-300 mb-2">
                    <i class="fas fa-list mr-2 text-neon-pink"></i>Categoría del Producto
                </label>
                <select name="id_categoria" 
                        class="w-full bg-cyber-200/50 border border-neon-blue/30 rounded-xl px-4 py-3 text-white focus:outline-none focus:ring-2 focus:ring-neon-pink focus:border-transparent transition-all duration-300 backdrop-blur-sm"
                        required>
                    <option value="" class="bg-cyber-200 text-gray-300">[- SELECCIONAR CATEGORÍA -]</option>
                    @foreach($categorias as $item)
                        <option value="{{ $item->id_categoria }}" 
                                {{ old('id_categoria') == $item->id_categoria ? 'selected' : '' }}
                                class="bg-cyber-200 text-white">
                            {{ $item->descripcion }}
                        </option>
                    @endforeach
                </select>
                <div class="flex items-center space-x-2 mt-1">
                    <div class="w-1 h-1 bg-neon-pink rounded-full"></div>
                    <span class="text-xs text-gray-400 font-mono">Clasificación del producto por tipo</span>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="pt-6">
                <button type="submit" 
                        class="w-full group relative py-4 bg-gradient-to-r from-neon-green to-green-500 rounded-xl font-bold text-black text-lg hover:from-green-400 hover:to-neon-green transition-all duration-300 transform hover:scale-105 hover:shadow-lg hover:shadow-neon-green/25">
                    <div class="flex items-center justify-center space-x-3">
                        <i class="fas fa-save text-xl"></i>
                        <span>Crear Producto en Base de Datos</span>
                        <div class="w-2 h-2 bg-black rounded-full animate-pulse"></div>
                    </div>
                    <div class="absolute inset-0 rounded-xl bg-neon-green/20 blur opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                </button>
            </div>
        </form>

        <!-- Additional Info -->
        <div class="mt-8 pt-6 border-t border-neon-blue/20">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-center">
                <div class="space-y-2">
                    <div class="w-8 h-8 mx-auto bg-gradient-to-r from-neon-green to-green-500 rounded-lg flex items-center justify-center">
                        <i class="fas fa-shield-check text-black text-sm"></i>
                    </div>
                    <h4 class="text-sm font-semibold text-neon-green">Validación Segura</h4>
                    <p class="text-xs text-gray-400">Datos protegidos</p>
                </div>
                
                <div class="space-y-2">
                    <div class="w-8 h-8 mx-auto bg-gradient-to-r from-neon-blue to-cyber-600 rounded-lg flex items-center justify-center">
                        <i class="fas fa-database text-white text-sm"></i>
                    </div>
                    <h4 class="text-sm font-semibold text-neon-blue">Base de Datos</h4>
                    <p class="text-xs text-gray-400">MySQL cifrado</p>
                </div>
                
                <div class="space-y-2">
                    <div class="w-8 h-8 mx-auto bg-gradient-to-r from-neon-purple to-purple-500 rounded-lg flex items-center justify-center">
                        <i class="fas fa-rocket text-white text-sm"></i>
                    </div>
                    <h4 class="text-sm font-semibold text-neon-purple">Alta Performance</h4>
                    <p class="text-xs text-gray-400">Respuesta instantánea</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Efectos de validación en tiempo real
        const inputs = document.querySelectorAll('input, select');
        
        inputs.forEach(input => {
            input.addEventListener('focus', function() {
                this.style.transform = 'scale(1.02)';
                this.style.transition = 'all 0.3s ease';
            });
            
            input.addEventListener('blur', function() {
                this.style.transform = 'scale(1)';
            });
            
            // Validación visual
            input.addEventListener('input', function() {
                if (this.value.length > 0) {
                    this.style.borderColor = '#39ff14';
                    this.style.boxShadow = '0 0 0 2px rgba(57, 255, 20, 0.2)';
                } else {
                    this.style.borderColor = 'rgba(0, 212, 255, 0.3)';
                    this.style.boxShadow = 'none';
                }
            });
        });
        
        // Efecto de contador de caracteres para el nombre
        const nombreInput = document.getElementById('nombre');
        if (nombreInput) {
            nombreInput.addEventListener('input', function() {
                const length = this.value.length;
                const maxLength = 100;
                const percentage = (length / maxLength) * 100;
                
                if (length > 0) {
                    console.log(`Caracteres: ${length}/${maxLength} (${percentage.toFixed(1)}%)`);
                }
            });
        }
    });
</script>
@endsection
@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="space-y-8">
 
    <!-- Rejilla de Tarjetas de Estadísticas  -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
        <!-- Services Card (Servicios) -->
        <x-stat-card title="Servicios" value="3" subtext="3 Servicios Activos" illustration="images/cloud-server-svgrepo-com.svg">
            <!-- Icono Cubo/Servicios -->
            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
            </svg>
        </x-stat-card>

        <!-- Invoices Due Card (Facturas Pendientes) -->
        <x-stat-card title="Facturas Pendientes" value="1" subtext="1 Factura Pendiente" illustration="images/bill-svgrepo-com.svg">
            <!-- Icono Factura/Documento -->
            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
            </svg>
        </x-stat-card>

        <!-- Domains Card (Dominios) -->
        <x-stat-card title="Dominios" value="2" subtext="2 Dominios Registrados" illustration="images/cloud-database-svgrepo-com.svg">
            <!-- Icono Globo -->
            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 008.716-6.747M12 21a9.004 9.004 0 01-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 017.843 4.582M12 3a8.997 8.997 0 00-7.843 4.582m15.686 0A11.953 11.953 0 0112 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0121 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0112 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 013 12c0-.778.099-1.533.284-2.253" />
            </svg>
        </x-stat-card>

        <!-- Support Tickets Card (Tickets de Soporte) -->
        <x-stat-card title="Tickets de Soporte" value="3" subtext="3 Tickets Abiertos" illustration="images/disk1-svgrepo-com.svg">
            <!-- Icono Auriculares/Soporte -->
            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2zM12 11a3 3 0 100-6 3 3 0 000 6z" />
            </svg>
        </x-stat-card>
    </div>

    <!-- FASE 5: Tabla de Servicios Activos -->
    <div class="bg-white rounded-[20px] p-6 shadow-[0px_18px_40px_rgba(112,144,176,0.06)] border border-white/50">
        <!-- Encabezado de la Tabla -->
        <div class="flex items-center justify-between mb-6">
            <div class="flex flex-col">
                <h3 class="text-lg font-extrabold text-[#1B254B] tracking-tight">Servicios Activos</h3>
                <span class="text-[10px] text-[#A3AED0] font-bold mt-0.5">Lista de servicios activos asociados a tu cuenta</span>
            </div>
            <!-- Botón de Opciones (Venus Style) -->
            <button class="h-9 w-9 rounded-xl bg-[#F4F7FE] text-[#4318FF] hover:bg-[#E0E5F2] transition-colors flex items-center justify-center cursor-pointer" title="Ver todos los servicios">
                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 12.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 18.75a.75.75 0 110-1.5.75.75 0 010 1.5z" />
                </svg>
            </button>
        </div>

        <!-- Contenedor Responsive para Tabla -->
        <div class="overflow-x-auto">
            <table class="w-full min-w-[600px] border-collapse">
                <thead>
                    <tr class="border-b border-[#F4F7FE] text-left">
                        <th class="text-[10px] font-bold text-[#A3AED0] uppercase tracking-wider pb-3 pl-2">Servicio</th>
                        <th class="text-[10px] font-bold text-[#A3AED0] uppercase tracking-wider pb-3">Dominio</th>
                        <th class="text-[10px] font-bold text-[#A3AED0] uppercase tracking-wider pb-3">Precio</th>
                        <th class="text-[10px] font-bold text-[#A3AED0] uppercase tracking-wider pb-3">Próximo Pago</th>
                        <th class="text-[10px] font-bold text-[#A3AED0] uppercase tracking-wider pb-3 pr-2 text-right">Estado</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-[#F4F7FE] align-middle">
                    <!-- Fila 1: Cloud Hosting -->
                    <tr class="hover:bg-[#F4F7FE]/20 transition-colors duration-150">
                        <td class="py-4 pl-2 flex items-center gap-3">
                            <!-- Miniatura Icono de Nube/Servicio -->
                            <div class="h-9 w-9 rounded-lg bg-[#4318FF]/5 text-[#4318FF] flex items-center justify-center shrink-0">
                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5.25 14.25h13.5m-13.5 0a3 3 0 01-3-3V7.5a3 3 0 013-3h13.5a3 3 0 013 3v3.75a3 3 0 01-3 3zm-13.5 0v3.75a3 3 0 003 3h13.5a3 3 0 003-3v-3.75m-16.5-3h16.5" />
                                </svg>
                            </div>
                            <div class="flex flex-col">
                                <span class="text-xs font-bold text-[#1B254B]">Cloud VPS Premium</span>
                                <span class="text-[9px] text-[#A3AED0] font-semibold">2 vCPU / 4 GB RAM</span>
                            </div>
                        </td>
                        <td class="py-4">
                            <span class="text-xs font-bold text-[#1B254B]">nebulix.io</span>
                        </td>
                        <td class="py-4">
                            <span class="text-xs font-bold text-[#1B254B]">$29.00 USD <span class="text-[9px] text-[#A3AED0] font-semibold">/mes</span></span>
                        </td>
                        <td class="py-4">
                            <span class="text-xs font-bold text-[#1B254B]">28 de Julio, 2026</span>
                        </td>
                        <td class="py-4 pr-2 text-right">
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg text-[10px] font-bold bg-emerald-50 text-emerald-500">
                                <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>
                                Activo
                            </span>
                        </td>
                    </tr>

                    <!-- Fila 2: Database -->
                    <tr class="hover:bg-[#F4F7FE]/20 transition-colors duration-150">
                        <td class="py-4 pl-2 flex items-center gap-3">
                            <!-- Miniatura DB -->
                            <div class="h-9 w-9 rounded-lg bg-[#4318FF]/5 text-[#4318FF] flex items-center justify-center shrink-0">
                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 6.375c0 2.278-3.694 4.125-8.25 4.125S3.75 8.653 3.75 6.375m16.5 0c0-2.278-3.694-4.125-8.25-4.125S3.75 4.097 3.75 6.375m16.5 0v11.25c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125V6.375m16.5 0v3.75m-16.5-3.75v3.75m16.5 0v3.75C20.25 16.153 16.556 18 12 18s-8.25-1.847-8.25-4.125v-3.75" />
                                </svg>
                            </div>
                            <div class="flex flex-col">
                                <span class="text-xs font-bold text-[#1B254B]">Base de Datos Dedicada</span>
                                <span class="text-[9px] text-[#A3AED0] font-semibold">PostgreSQL v16</span>
                            </div>
                        </td>
                        <td class="py-4">
                            <span class="text-xs font-bold text-[#1B254B]">db.nebulix.io</span>
                        </td>
                        <td class="py-4">
                            <span class="text-xs font-bold text-[#1B254B]">$89.00 USD <span class="text-[9px] text-[#A3AED0] font-semibold">/mes</span></span>
                        </td>
                        <td class="py-4">
                            <span class="text-xs font-bold text-[#1B254B]">02 de Agosto, 2026</span>
                        </td>
                        <td class="py-4 pr-2 text-right">
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg text-[10px] font-bold bg-emerald-50 text-emerald-500">
                                <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>
                                Activo
                            </span>
                        </td>
                    </tr>

                    <!-- Fila 3: SSL Certificate -->
                    <tr class="hover:bg-[#F4F7FE]/20 transition-colors duration-150">
                        <td class="py-4 pl-2 flex items-center gap-3">
                            <!-- Miniatura Certificado -->
                            <div class="h-9 w-9 rounded-lg bg-[#4318FF]/5 text-[#4318FF] flex items-center justify-center shrink-0">
                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.57-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z" />
                                </svg>
                            </div>
                            <div class="flex flex-col">
                                <span class="text-xs font-bold text-[#1B254B]">Certificado SSL Wildcard</span>
                                <span class="text-[9px] text-[#A3AED0] font-semibold">Sectigo Let's Encrypt</span>
                            </div>
                        </td>
                        <td class="py-4">
                            <span class="text-xs font-bold text-[#1B254B]">*.nebulix.io</span>
                        </td>
                        <td class="py-4">
                            <span class="text-xs font-bold text-[#1B254B]">$12.00 USD <span class="text-[9px] text-[#A3AED0] font-semibold">/año</span></span>
                        </td>
                        <td class="py-4">
                            <span class="text-xs font-bold text-[#1B254B]">14 de Junio, 2027</span>
                        </td>
                        <td class="py-4 pr-2 text-right">
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg text-[10px] font-bold bg-emerald-50 text-emerald-500">
                                <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>
                                Activo
                            </span>
                        </td>
                    </tr>

                    <!-- Fila 4: Professional Email -->
                    <tr class="hover:bg-[#F4F7FE]/20 transition-colors duration-150">
                        <td class="py-4 pl-2 flex items-center gap-3">
                            <!-- Miniatura Correo -->
                            <div class="h-9 w-9 rounded-lg bg-[#4318FF]/5 text-[#4318FF] flex items-center justify-center shrink-0">
                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                                </svg>
                            </div>
                            <div class="flex flex-col">
                                <span class="text-xs font-bold text-[#1B254B]">Correo Profesional</span>
                                <span class="text-[9px] text-[#A3AED0] font-semibold">10 Buzones Personalizados</span>
                            </div>
                        </td>
                        <td class="py-4">
                            <span class="text-xs font-bold text-[#1B254B]">mail.nebulix.io</span>
                        </td>
                        <td class="py-4">
                            <span class="text-xs font-bold text-[#1B254B]">$5.00 USD <span class="text-[9px] text-[#A3AED0] font-semibold">/mes</span></span>
                        </td>
                        <td class="py-4">
                            <span class="text-xs font-bold text-[#1B254B]">10 de Julio, 2026</span>
                        </td>
                        <td class="py-4 pr-2 text-right">
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg text-[10px] font-bold bg-amber-50 text-amber-500">
                                <span class="h-1.5 w-1.5 rounded-full bg-amber-500"></span>
                                Pendiente
                            </span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

<div>
    <div class="p-5 h-screen bg-gray-100">
        <h1 class="text-xl mb-2">Your orders</h1>

        <!-- Conteúdo da tabela para telas maiores -->
        <div class="overflow-auto rounded-lg shadow hidden md:block">
            <table class="w-full">
                <!-- Cabeçalho da tabela -->
                <thead class="bg-gray-50 border-b-2 border-gray-200">
                    <!-- Cabeçalho das colunas -->
                    <tr>
                        <th class="w-20 p-3 text-sm font-semibold tracking-wide text-left">No.</th>
                        <th class="p-3 text-sm font-semibold tracking-wide text-left">Details</th>
                        <th class="w-24 p-3 text-sm font-semibold tracking-wide text-left">Status</th>
                        <th class="w-24 p-3 text-sm font-semibold tracking-wide text-left">Date</th>
                        <th class="w-32 p-3 text-sm font-semibold tracking-wide text-left">Total</th>
                    </tr>
                </thead>
                <!-- Corpo da tabela -->
                <tbody class="divide-y divide-gray-100">
                    <!-- Aqui você irá iterar sobre os pedidos e criar as linhas da tabela -->
                    @foreach ($orders as $order)
                    <tr class="{{ $loop->odd ? 'bg-white' : 'bg-gray-50' }}">
                        <td class="p-3 text-sm text-gray-700 whitespace-nowrap">
                            <a href="#" class="font-bold text-blue-500 hover:underline">#{{ $order->order_number }}</a>
                        </td>
                        <td class="p-3 text-sm text-gray-700 whitespace-nowrap">
                            {{ $order->details }}
                        </td>
                        <td class="p-3 text-sm text-gray-700 whitespace-nowrap">
                            <span class="p-1.5 text-xs font-medium uppercase tracking-wider
                                @if($order->status == 'Delivered') text-green-800 bg-green-200
                                @elseif($order->status == 'Shipped') text-yellow-800 bg-yellow-200
                                @elseif($order->status == 'Cancelled') text-gray-800 bg-gray-200
                                @endif rounded-lg bg-opacity-50">
                                {{ $order->status }}
                            </span>
                        </td>
                        <td class="p-3 text-sm text-gray-700 whitespace-nowrap">
                            {{ $order->date }}
                        </td>
                        <td class="p-3 text-sm text-gray-700 whitespace-nowrap">
                            ${{ number_format($order->total, 2) }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Conteúdo da tabela para telas menores -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 md:hidden">
            <!-- Aqui você irá iterar sobre os pedidos e criar os blocos para cada pedido -->
            @foreach ($orders as $order)
            <div class="bg-white space-y-3 p-4 rounded-lg shadow">
                <div class="flex items-center space-x-2 text-sm">
                    <div>
                        <a href="#" class="text-blue-500 font-bold hover:underline">#{{ $order->order_number }}</a>
                    </div>
                    <div class="text-gray-500">{{ $order->date }}</div>
                    <div>
                        <span class="p-1.5 text-xs font-medium uppercase tracking-wider
                            @if($order->status == 'Delivered') text-green-800 bg-green-200
                            @elseif($order->status == 'Shipped') text-yellow-800 bg-yellow-200
                            @elseif($order->status == 'Cancelled') text-gray-800 bg-gray-200
                            @endif rounded-lg bg-opacity-50">
                            {{ $order->status }}
                        </span>
                    </div>
                </div>
                <div class="text-sm text-gray-700">
                    {{ $order->details }}
                </div>
                <div class="text-sm font-medium text-black">
                    ${{ number_format($order->total, 2) }}
                </div>
            </div>
            @endforeach
        </div>
        <div class="col-12">
            <!-- Links de paginação -->
            {{-- {{ $orders->links() }} --}}
        </div>
    </div>
</div>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.4.1/dist/tailwind.min.css" rel="stylesheet">


        <!-- Styles -->
        <style>
            body {
                background-color: #f3f4f6;
                font-family: 'Roboto', sans-serif;
            }
            .container {
                max-width: 600px;
                margin: 0 auto;
            }
            .card {
                background-color: #ffffff;
                border-radius: 10px;
                box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
                padding: 30px;
                margin-bottom: 30px;
            }
            .btn {
                display: inline-block;
                background-color: #4f46e5;
                color: #ffffff;
                font-weight: 600;
                padding: 10px 20px;
                border-radius: 5px;
                transition: background-color 0.3s ease;
            }
            .btn:hover {
                background-color: #4338ca;
            }
            .footer {
                padding-top: 2rem;
                text-align: center;
                font-size: 0.875rem;
                color: #000000;
                opacity: 0.7;
            }
        </style>
    </head>
    <body class="bg-gray-100 font-sans">
        <div class="container mx-auto px-4">
            <br>
            <div class="card bg-white rounded-lg shadow-md p-8 mb-8">
                <h1 class="text-3xl font-bold mb-5 text-center">Interfaces com Tailwind CSS e Livewire</h1>
            </div>
            <div class="card bg-white rounded-lg shadow-md p-8 mb-8">
                <h1 class="text-3xl font-bold mb-5 text-center">Bem-vindo</h1>
                <div class="flex justify-center">
                    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4">
                        <!-- Botões para as rotas -->
                        <a href="{{ route('gemini.create') }}" class="btn">Criar Gemini</a>
                        <a href="{{ route('gemini.index') }}" class="btn">Índice Gemini</a>
                        <a href="{{ route('table') }}" class="btn">Tabela</a>
                        <a href="{{ route('show.books') }}" class="btn">Show Books</a>
                        <a href="{{ route('import') }}" class="btn">Ex:.Import CSV</a>
                        <a href="{{ route('product') }}" class="btn">Add Product</a>
                        <a href="{{ route('users') }}" class="btn">Delete Users Bootstrap</a>
                    </div>
                </div>

            </div>
        </div>
        <!-- Footer -->
        <footer class="footer bg-white text-center py-4">
            Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
        </footer>
    </body>
    </html>
